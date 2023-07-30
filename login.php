<?php
session_start();

include_once("config.php");

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql_query = "SELECT * FROM user 
              WHERE username='$username' AND password='$password'
              LIMIT 1";


	$result = $mysqli->query($sql_query);

	// If result matched $username and $password, table row must be 1 row
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['umur'] = $row['umur'];
		$_SESSION['kelas'] = $row['kelas'];
		$_SESSION['tanggalTes'] = $row['tanggalTes'];
		$_SESSION['tanggalLahir'] = $row['tanggalLahir'];
		$_SESSION['orangTua'] = $row['orangTua'];
		$_SESSION['is_logged_in'] = 1;
		header('location:main_pages/');
		exit();
	} else {
		echo "<script>alert('Username atau Password salah!'); window.location.href='index.php';</script>";
	}
} else {
	header('location:index.php');
	exit();
}
