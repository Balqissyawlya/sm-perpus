<?php
session_start();

include 'koneksi.php'; // menyisipkan file koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lindungi dari serangan SQL Injection
    $username = mysqli_real_escape_string($mysqli, $username);
    $password = mysqli_real_escape_string($mysqli, $password);

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT * FROM anggota WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika data cocok, set session dan redirect ke halaman anggota
        $_SESSION['username'] = $username;
        header("Location: halaman_anggota.php");
    } else {
        // Jika data tidak cocok, tampilkan pesan error
        echo "Username atau password salah.";
    }
}
?>
