<!-- VALIDATED -->
<!-- Connection to Database -->

<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'fingerprint';
$databaseUsername = 'mysql';
$databasePassword = 'mysql';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);



?>