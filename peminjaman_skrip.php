<?php
include 'koneksi.php';

// Skrip untuk form tambah
if (!empty($_POST['tgl_pinjam']) && !empty($_POST['kode_buku']) && !empty($_POST['kode_anggota']) && !empty($_POST['pengembalian']) || !empty($_GET['id'])) {
    if (isset($_GET['skrip']) && $_GET['skrip'] == 'tambah') {
        $mysqli->query("INSERT INTO peminjaman
                            (tgl_pinjam,
                            kode_buku,
                            kode_anggota,
                            pengembalian) 
                        VALUES ('$_POST[tgl_pinjam]',
                                '$_POST[kode_buku]',
                                '$_POST[kode_anggota]',
                                '$_POST[pengembalian]')");
        echo "<div class='tambah'>Satu peminjaman baru telah ditambahkan!</div>";
    }
}

// Skrip untuk form status
if (isset($_GET['skrip']) && $_GET['skrip'] == 'status') {
    $mysqli->query("UPDATE peminjaman SET 
                        pengembalian='$_POST[pengembalian]'
                    WHERE kode_pinjam='$_POST[id]'");
    echo "<div class='ubah'>Perubahan telah disimpan!</div>";
}

// Skrip untuk aksi hapus
if (isset($_GET['skrip']) && $_GET['skrip'] == 'hapus') {
    $mysqli->query("DELETE FROM peminjaman WHERE kode_pinjam='$_GET[id]'");
    echo "<div class='hapus'>Satu peminjaman telah dihapus!</div>";
}
?>
