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
    $tanggalLahir = $_POST['tanggalLahir'];
    // convert date to mysql date format
    $tanggalLahir = date('Y-m-d', strtotime($tanggalLahir));
    $password = $_POST['password'];


    // Display the user's information
    echo "Username: " . $username . "<br>";
    echo "Kelas: " . $kelas . "<br>";
    echo "Password: " . $password . "<br>";
    echo "orangTua: " . $orangTua . "<br>";
    echo "tanggalLahir: " . $tanggalLahir . "<br>";
    echo "umur: " . $password . "<br>";

    // Include Database Connection File
    include_once("../config.php");

    // Insert user data into table with Try Catch
    try {
        // Execute the query
        $result = $mysqli->query("INSERT INTO user (username, password, umur, kelas, orangTua, tanggalLahir, fullname) VALUES('$username', '$password', '$umur', '$kelas', '$orangTua', '$tanggalLahir', '$fullname')");
        if (!$result) {
            throw new Exception($mysqli->error);
        }
        echo "<script>alert('Register Berhasil!'); window.location.href='../index.php';</script>";
        // header("Location: ../index.php");
    } catch (Exception $e) {
        // Show Error Pop Up
        echo "<script>alert('Terjadi Kesalahan pada proses register!'); window.location.href='index.html';</script>";
        // echo "Terjadi Kesalahan pada proses register!";
        // Redirect to Register Page
    }
}


?>