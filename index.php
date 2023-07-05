<?php

function connectDB()
{
    $host = "localhost";
    $username = "username";
    $password = "password";
    $database = "database_name";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

// Fungsi untuk memesan tiket konser
function orderTicket($name, $email)
{
    $conn = connectDB();

    // Generate nomor ID unik
    $ticketNumber = uniqid();

    // Insert data tiket ke database
    $sql = "INSERT INTO tickets (name, email, ticket_number, status) VALUES ('$name', '$email', '$ticketNumber', 'unpaid')";
    if (mysqli_query($conn, $sql)) {
        // Tampilkan tiket yang telah dipesan
        echo "Tiket Anda:<br>";
        echo "Nomor ID Tiket: " . $ticketNumber . "<br>";
        echo "Nama: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Form pemesanan tiket
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    orderTicket($name, $email);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket
