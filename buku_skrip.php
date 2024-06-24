<?php
include 'koneksi.php';

// Check if 'skrip' parameter is set in the URL
$skrip = isset($_GET['skrip']) ? $_GET['skrip'] : '';

// Skrip untuk form tambah
if ($skrip == 'tambah') {
    $mysqli->query("INSERT INTO buku
                    (ISBN,
                    judul,
                    tgl_entri,
                    kode_jenis,
                    kode_penulis,
                    kode_penerbit,
                    tahun_terbit,
                    jumlah_buku,
                    nomor_rak) 
                VALUES ('$_POST[ISBN]',
                        '$_POST[judul]',
                        '$_POST[tgl_entri]',
                        '$_POST[kode_jenis]',
                        '$_POST[kode_penulis]',
                        '$_POST[kode_penerbit]',
                        '$_POST[tahun_terbit]',
                        '$_POST[jumlah_buku]',
                        '$_POST[nomor_rak]')");
    echo "<div class=tambah>Satu Buku Baru Telah Ditambahkan!</div>";
}

// Skrip untuk form ubah
if ($skrip == 'ubah') {
    $mysqli->query("UPDATE buku SET 
                    ISBN='$_POST[ISBN]',
                    judul='$_POST[judul]',
                    tgl_entri='$_POST[tgl_entri]',
                    kode_jenis='$_POST[kode_jenis]',
                    kode_penulis='$_POST[kode_penulis]',
                    kode_penerbit='$_POST[kode_penerbit]',
                    tahun_terbit='$_POST[tahun_terbit]',
                    jumlah_buku='$_POST[jumlah_buku]',
                    nomor_rak='$_POST[nomor_rak]' 
                WHERE kode_buku='$_POST[id]'");
    echo "<div class=ubah>Perubahan Telah Disimpan!</div>";
}

// Skrip untuk aksi hapus
if ($skrip == 'hapus') {
    $mysqli->query("DELETE FROM buku WHERE kode_buku='$_GET[id]'");
    echo "<div class=hapus>Satu Buku Baru Telah Dikeluarkan!</div>";
}

// Skrip untuk form deskripsi
if ($skrip == 'deskripsi') {
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];
    move_uploaded_file($lokasi_file, "pratinjau/$nama_file");
    $mysqli->query("INSERT INTO deskripsi_buku
                    (kode_buku,
                    gambar,
                    keterangan) 
                VALUES ('$_POST[kode_buku]',
                        '$nama_file',
                        '$_POST[keterangan]')");
    echo "<div class=tambah>Satu Deskripsi Baru Telah Ditambahkan!</div>";
}

// Skrip untuk aksi hapus deskripsi
if ($skrip == 'hapus_deskripsi') {
    $mysqli->query("DELETE FROM deskripsi_buku WHERE kode_deskripsi='$_GET[id]'");
    echo "<div class=hapus>Satu Deskripsi Baru Telah Dikeluarkan!</div>";
}
?>
