<?php
include 'koneksi2.php';

// Ambil data dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// Query untuk menyimpan data ke database
$sql = "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";

if ($conn->query($sql) === TRUE) {
    echo header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>