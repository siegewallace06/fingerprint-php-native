<?php
// Check if the user is already logged in, if no then redirect him to index page (login)


session_start();
if (!isset($_SESSION["is_logged_in"])) {
    header("location: ../index.php");
    exit;
}
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$kelas = $_SESSION['kelas'];
$umur = $_SESSION['umur'];
$tanggalLahir = $_SESSION['tanggalLahir'];
$tanggalTes = $_SESSION['tanggalTes'];

if (isset($_POST['update_date'])) {

    // Prepare the payload with the $username variable
    $payload = json_encode(array('user_id' => $username));

    $url = 'https://flaskbackend.adaptivenetlab.site/predict';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    // Check if the response is successful by checking if prediction_results is present
    if ($httpcode == 200) {
        // Get "prediction_results from the response
        $data = json_decode($response, true);
        $data = $data['prediction_results'];
        // =====================================================================================================================

        // There is a table called "prediction" where it stores the response to a field called "prediction_results" in JSON format from the Flask API
        // The table has 2 columns: user_id and prediction_results
        // First, run a SELECT query with the user_id to check if the user_id already exists in the table
        // If it exists, get the prediction_results from the table and overwrite the $data variable (It is array of JSON objects)
        // If it doesn't exist, run an INSERT query to insert the user_id and prediction_results to the table
        try {
            // Include Database Connection File
            include_once("../config.php");
            // Execute the query
            $sql_query = "SELECT * FROM prediction WHERE user_id = '" . $id . "'";
            $result = mysqli_query($mysqli, $sql_query);

            // Check if the query was executed successfully
            if (!$result) {
                throw new Exception("Failed to execute SELECT query");
            }

            // Check if the user_id already exists in the table
            if (mysqli_num_rows($result) > 0) {
                // Get the prediction_results from the table
                $row = mysqli_fetch_assoc($result);
                // Update the prediction_results in the table
                $sql_query = "UPDATE prediction SET prediction_results = '" . json_encode($data) . "' WHERE user_id = '" . $id . "'";
                $result = mysqli_query($mysqli, $sql_query);
                // Check if the query was executed successfully
                if (!$result) {
                    throw new Exception("Failed to execute UPDATE query");
                }
                // Overwrite the $data variable with the prediction_results from the table that just got updated
                $data = json_decode($row['prediction_results'], true);
                // Print the data to the alert and say that the data is from the database ("Data from DB: ")
                // echo "<script>alert('Data from DB: " . json_encode($data) . "');</script>";
            } else {
                // Execute the query
                $sql_query = "INSERT INTO prediction (user_id, prediction_results) VALUES ('" . $id . "', '" . json_encode($data) . "')";
                $result = mysqli_query($mysqli, $sql_query);

                // Check if the query was executed successfully
                if (!$result) {
                    throw new Exception("Failed to execute INSERT query");
                }
                // Print the data to the alert and say that the data is from the API ("Data from API: ")
                // echo "<script>alert('Data from API: " . json_encode($data) . "');</script>";
            }
        } catch (Exception $e) {
            echo "Failed to execute query: " . $e->getMessage();
            exit();
        }


        // =====================================================================================================================

        // Count the length of the data array
        // echo "<script>alert('Data length: " . count($data) . "');</script>";
        // // Check the data type of the data
        // echo "<script>alert('Data length: " . gettype($data) . "');</script>";
        // // Print the data to the alert
        // echo "<script>alert('Data: " . json_encode($data) . "');</script>";
    } else {
        $data['error'] = 'Failed to fetch prediction data.';
        echo "<script>alert('Mohon Maaf Test gagal dilakukan!'); window.location.href='index.php';</script>";
    }



    // Set the default timezone to Jakarta (UTC + 7)
    date_default_timezone_set('Asia/Jakarta');

    // Get the current date and time in Bangkok time
    $_SESSION['tanggalTes'] = date('Y-m-d');


    // Add the data to SESSION
    $_SESSION['prediction_results'] = $data;

    // Update tanggalTes in DB from NULL to current date
    try {
        // Include Database Connection File
        include_once("../config.php");
        // Execute the query
        $sql_query = "UPDATE user SET tanggalTes = '" . $_SESSION['tanggalTes'] . "' WHERE username = '" . $_SESSION['username'] . "'";
        $result = mysqli_query($mysqli, $sql_query);

        // Check if the query was executed successfully
        if (!$result) {
            throw new Exception("Failed to update tanggalTes in DB");
        }
    } catch (Exception $e) {
        echo "Failed to update tanggalTes in DB: " . $e->getMessage();
        exit();
    }

    echo "<script>alert('Selamat Anda Telah Tes! Silahkan Cek hasil'); window.location.href='index.php';</script>";
}
