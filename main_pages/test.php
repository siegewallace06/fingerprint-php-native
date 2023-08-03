<?php
// Check if the user is already logged in, if no then redirect him to index page (login)
session_start();
if (!isset($_SESSION["is_logged_in"])) {
    header("location: ../index.php");
    exit;
}
$username = $_SESSION['username'];
$kelas = $_SESSION['kelas'];
$umur = $_SESSION['umur'];
$tanggalLahir = $_SESSION['tanggalLahir'];
$tanggalTes = $_SESSION['tanggalTes'];

if (isset($_POST['update_date'])) {

    // Prepare the payload with the $username variable
    $payload = json_encode(array('user_id' => $username));

    $url = 'https://com-copy.runblade.host/predict';
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
        // Count the length of the data array
        // echo "<script>alert('Data length: " . count($data) . "');</script>";
        // Print the data to the alert
        // echo "<script>alert('Data: " . json_encode($data) . "');</script>";
    } else {
        $data['error'] = 'Failed to fetch prediction data.';
        echo "<script>alert('Mohon Maaf Test gagal dilakukan!'); window.location.href='index.php';</script>";
    }

    // Include Database Connection File
    include_once("../config.php");

   // Set the default timezone to Jakarta (UTC + 7)
    date_default_timezone_set('Asia/Jakarta');

    // Get the current date and time in Bangkok time
    $_SESSION['tanggalTes'] = date('Y-m-d');


    // Add the data to SESSION
    $_SESSION['prediction_results'] = $data;

    // Update tanggalTes in DB from NULL to current date
    try {
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
