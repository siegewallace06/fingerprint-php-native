<?php
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

// Array to hold the response data
$data = [];

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

if ($httpcode === 200) {
    $data = json_decode($response, true);
} else {
    $data['error'] = 'Failed to fetch prediction data.';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Button Click POST Request</title>
</head>

<body>

    <!-- HTML button -->
    <form method="post">
        <button type="submit" name="submit">Click Me</button>
    </form>

    <!-- HTML div to display the response data -->
    <div id="output">
        <?php
        if (!empty($data)) {
            $predictionResults = $data['prediction_results'];
            foreach ($predictionResults as $result) {
                echo "<p><strong>Desc:</strong> " . $result['Desc'] . "</p>";
                echo "<p><strong>Model:</strong> " . $result['model'] . "</p>";
            }
        } else {
            echo "Error: Failed to fetch prediction data.";
        }
        ?>
    </div>

    <!-- Test echo $data variable from php -->
    <?php echo $data; ?>

</body>

</html>