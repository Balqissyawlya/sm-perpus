<?php
include 'koneksi.php';

if (!empty($_POST['nama_jenis']) || !empty($_POST['keterangan']) || !empty($_GET['id'])) {
    // Skrip untuk form tambah
    if (isset($_GET['skrip']) && $_GET['skrip'] == 'tambah') {
        $mysqli->query("INSERT INTO jenis_buku(nama_jenis,keterangan) VALUES ('$_POST[nama_jenis]','$_POST[keterangan]')");
        echo "<div class=tambah>Satu Jenis Buku Baru Telah Ditambahkan!</div>";
    }
    // Skrip untuk form ubah
    if (isset($_GET['skrip']) && $_GET['skrip'] == 'ubah') {
        $mysqli->query("UPDATE jenis_buku SET nama_jenis='$_POST[nama_jenis]', keterangan='$_POST[keterangan]' WHERE kode_jenis='$_POST[id]'");
        echo "<div class=ubah>Perubahan Telah Disimpan!</div>";
    }
    // Skrip untuk aksi hapus
    if (isset($_GET['skrip']) && $_GET['skrip'] == 'hapus') {
        $mysqli->query("DELETE FROM jenis_buku WHERE kode_jenis='$_GET[id]'");
        echo "<div class=hapus>Satu Jenis Buku Baru Telah Dikeluarkan!</div>";
    }
} else {
    echo "<div class=pesan>Melakukan Perubahan Data, ";
    echo "Harap masukkan data dengan teliti!</div>";
}
?>
