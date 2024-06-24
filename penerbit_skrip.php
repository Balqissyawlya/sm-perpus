<?php
include 'koneksi.php';

// Ensure that $_GET['opsi'] and $_GET['skrip'] are set
$opsi = isset($_GET['opsi']) ? $_GET['opsi'] : "";
$skrip = isset($_GET['skrip']) ? $_GET['skrip'] : "";

// Validate form data or script actions
if (!empty($_POST['nama_penerbit']) &&
    !empty($_POST['alamat']) &&
    !empty($_POST['telepon']) &&
    !empty($_POST['email']) ||
    !empty($skrip))
{
    // Skrip untuk form tambah
    if ($skrip == 'tambah') {
        $stmt = $mysqli->prepare("INSERT INTO penerbit (nama_penerbit, alamat, telepon, email, keterangan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $_POST['nama_penerbit'], $_POST['alamat'], $_POST['telepon'], $_POST['email'], $_POST['keterangan']);
        $stmt->execute();
        echo "<div class='tambah'>Satu penerbit Baru Telah Ditambahkan!</div>";
    }
    // Skrip untuk form ubah
    if ($skrip == 'ubah' && isset($_POST['id'])) {
        $stmt = $mysqli->prepare("UPDATE penerbit SET nama_penerbit = ?, alamat = ?, telepon = ?, email = ?, keterangan = ? WHERE kode_penerbit = ?");
        $stmt->bind_param('sssssi', $_POST['nama_penerbit'], $_POST['alamat'], $_POST['telepon'], $_POST['email'], $_POST['keterangan'], $_POST['id']);
        $stmt->execute();
        echo "<div class='ubah'>Perubahan Telah Disimpan!</div>";
    }
    // Skrip untuk aksi hapus
    if ($skrip == 'hapus' && isset($_GET['id'])) {
        $stmt = $mysqli->prepare("DELETE FROM penerbit WHERE kode_penerbit = ?");
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        echo "<div class='hapus'>Satu penerbit Baru Telah Dikeluarkan!</div>";
    }
}
else {
    echo "<div class='pesan'>Melakukan Perubahan Data, Harap masukkan data dengan teliti!</div>";
}
?>
