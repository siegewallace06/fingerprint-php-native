<!-- VALIDATED -->
<!-- Register Landing Page -->

<!-- Register Backend Logic -->
<?php


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $umur = $_POST['umur'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];


    // Display the user's information
    echo "Username: " . $username . "<br>";
    echo "Kelas: " . $kelas . "<br>";
    echo "Password: " . $password . "<br>";
    echo "umur: " . $password . "<br>";

    // // Include Database Connection File
    include_once("../config.php");

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO user(username,umur,kelas,password) VALUES('$username','$umur','$kelas','$password')");

    header("Location: ../index.php");
}


?>