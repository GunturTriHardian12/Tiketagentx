<?php
// edit-tiket.php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticketId = $_POST["ticket_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Query SQL untuk mengupdate data tiket
    $sql = "UPDATE tickets SET name='$name', email='$email' WHERE id=$ticketId";

    if (mysqli_query($conn, $sql)) {
        echo "Data tiket berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
