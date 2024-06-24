<?php
include 'koneksi.php';

// Membuat koneksi ke database
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil input dari form dengan menggunakan prepared statement untuk menghindari SQL Injection
$stmt = $koneksi->prepare("SELECT * FROM pengelola WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $_POST['username'], $_POST['password']);
$stmt->execute();
$result = $stmt->get_result();

// Mengecek jumlah baris hasil query
$sukses = $result->num_rows;
$r = $result->fetch_assoc();

if ($sukses > 0) {
    session_start();
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['nama_peng'] = $r['nama_peng'];
    header('Location: index.php');
} else {
    header('Location: index.php');
}

// Menutup statement dan koneksi
$stmt->close();
$koneksi->close();
?>
