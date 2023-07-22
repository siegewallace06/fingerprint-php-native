<!-- VALIDATED -->
<!-- Connection to Database -->

<?php
/**
 * using mysqli_connect for database connection
 */


$databaseHost = 'localhost';
$databaseName = 'fingerprint_test';
$databaseUsername = 'root';
$databasePassword = '';

// Add Try Catch to handle error
try {
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
} catch (Exception $e) {
    echo "Failed to connect to MySQL: " . $e->getMessage();
    exit();
}



?>