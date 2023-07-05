<?php
// koneksi.php

$host = "localhost";
$username = "username";
$password = "password";
$database = "database_name";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
