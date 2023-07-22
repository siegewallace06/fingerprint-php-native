<!-- VALIDATED -->
<!-- Connection to Database -->

<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'fingerprint_test';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);



?>