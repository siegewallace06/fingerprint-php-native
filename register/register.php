<!-- VALIDATED -->
<!-- Register Landing Page -->

<!-- Register Backend Logic -->
<?php


if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $umur = $_POST['umur'];
    $orangTua = $_POST['orangTua'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];


    // Display the user's information
    echo "Username: " . $username . "<br>";
    echo "Kelas: " . $kelas . "<br>";
    echo "Password: " . $password . "<br>";
    echo "orangTua: " . $orangTua . "<br>";
    echo "umur: " . $password . "<br>";

    // // Include Database Connection File
    include_once("../config.php");

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO user(username,umur,orangTua,kelas,password,fullname) VALUES('$username','$umur','$orangTua',$kelas','$password','$fullname')");

    header("Location: ../index.php");
}


?>