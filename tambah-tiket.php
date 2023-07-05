<?php
// tambah-tiket.php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Generate nomor ID unik
    $ticketNumber = uniqid();

    // Query SQL untuk menambahkan tiket baru ke dalam database
    $sql = "INSERT INTO tickets (name, email, ticket_number, status) VALUES ('$name', '$email', '$ticketNumber', 'unpaid')";

    if (mysqli_query($conn, $sql)) {
        echo "Tiket berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
