<?php

//Deklarasi
$host = "localhost";
$user = "root";
$password = "";
$database = "go_laundry";

// Ke Database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa 
if (mysqli_connect_errno()) {
	echo "Gagal Terhubung ke database : " . mysqli_connect_error();
}


$db_user = "root";
$db_pass = "";
$db_name = "go_laundry";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>