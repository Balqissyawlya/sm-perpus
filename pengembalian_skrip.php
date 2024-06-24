<?php
include 'koneksi.php';

// Skrip untuk form tambah
if ((!empty($_POST['tgl_kembali']) && !empty($_POST['kode_buku']) && !empty($_POST['kode_anggota']) && !empty($_POST['denda'])) || !empty($_GET['id'])) {
    if (isset($_GET['skrip']) && $_GET['skrip'] == 'tambah') {
        $mysqli->query("INSERT INTO pengembalian (tgl_kembali, kode_buku, kode_anggota, denda) VALUES ('$_POST[tgl_kembali]', '$_POST[kode_buku]', '$_POST[kode_anggota]', '$_POST[denda]')");
        echo "<div class='tambah'>Satu penerbit Baru Telah Ditambahkan!</div>";
    }
}

// Skrip untuk form status
if (isset($_GET['skrip']) && $_GET['skrip'] == 'status') {
    $mysqli->query("UPDATE pengembalian SET denda='$_POST[denda]' WHERE kode_pinjam='$_POST[id]'");
    echo "<div class='ubah'>Perubahan Telah Disimpan!</div>";
}

// Skrip untuk aksi hapus
if (isset($_GET['skrip']) && $_GET['skrip'] == 'hapus') {
    $mysqli->query("DELETE FROM pengembalian WHERE kode_pinjam='$_GET[id]'");
    echo "<div class='hapus'>Satu pengembali Telah Dihapus!</div>";
}
?>
