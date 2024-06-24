-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jun 2024 pada 15.31
-- Versi server: 10.9.2-MariaDB-log
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `kode_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(35) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`kode_anggota`, `nama_anggota`, `tgl_masuk`, `alamat`, `telepon`, `keterangan`) VALUES
(1, 'Yudha ', '2013-01-16', 'Jl.Bumi Raya,RT01 RW02-Ciomas', '085759965394', 'Kelas XI RPL 1'),
(2, 'Ade Indra', '2013-01-17', 'Jl.Bumi Putra,RT02RW04-Sukasari', '085315721521', 'Kelas XII RPL 3'),
(3, 'Ade Maelani', '2013-01-18', 'Jl.Bumi Graha,RT02RW02-Banjaran', '087122676786', 'Kelas XI RPL 2'),
(4, 'Agus Nugraha', '2013-01-19', 'Jl.Bumi Jaya,RT01RW01-Basuki', '085797339927', 'Kelas XI RPL 1'),
(5, 'Alis Trikandari', '2013-01-20', 'Jl.Bukit Bungur,Blok Selasa', '081234567887', 'Kelas XII RPL 4'),
(6, 'Aldyana', '2013-01-21', 'Jl.Mekarrahayu,RT01RW01-Langgeng', '085224196197', 'Kelas XII RPL 3'),
(7, 'Alinka Dwiyana Putri', '2013-01-22', 'Jl.Prabu Raya,RT04RW02-Sindangkerta', '081234777889', 'Kelas XI RPL 2'),
(8, 'Arif Syamsul', '2013-01-23', 'Jl.Prabu Putra,RT01RW02-Calingcing', '0812345678901', 'Kelas XII RPL 4'),
(9, 'Bangkit Munggaran', '2012-03-02', 'Jl.Prabu Graha,RT1RW02-Malongpong', '085322103277', 'Kelas XI RPL 3'),
(10, 'Cici Herliani Anwar', '2013-01-24', 'Jl.Prabu Jaya,RT05RW06-Tegalsari', '081234567712', 'Kelas XI RPL 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `tgl_entri` date NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `kode_jenis` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kode_penulis` int(11) NOT NULL,
  `kode_penerbit` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `nomor_rak` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `tgl_entri`, `ISBN`, `kode_jenis`, `judul`, `kode_penulis`, `kode_penerbit`, `tahun_terbit`, `jumlah_buku`, `nomor_rak`) VALUES
(10, '2013-01-18', '111-222-333-444-3 	', 5, 'Desain Rumah Idaman Menggunakan Auto CAD', 8, 4, 1998, 10, 3),
(9, '2013-01-18', '111-222-333-444-2', 9, 'Web Canggih dengan PHP dan MySql', 13, 2010, 2006, 10, 2),
(8, '2013-01-17', ' 	111-222-333-444-1', 10, 'Trik-trik MS Office 2010', 9, 5, 2009, 10, 1),
(11, '2013-01-19', '111-222-333-444-4', 7, 'Cara Cepat Mendownload File', 10, 3, 2006, 10, 4),
(12, '2013-01-20', '111-222-333-444-5', 9, 'Membuat Aplikasi Windows Phone', 12, 6, 2002, 10, 5),
(13, '2013-01-04', '111-222-333-444-6', 15, 'Pengolahan Ubi Merah', 14, 5, 2000, 2, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskripsi_buku`
--

CREATE TABLE `deskripsi_buku` (
  `kode_deskripsi` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `kode_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_buku`
--

INSERT INTO `jenis_buku` (`kode_jenis`, `nama_jenis`, `keterangan`) VALUES
(3, 'Buku Teks Umum', ''),
(5, 'Desain Grafis', ''),
(6, 'Jaringan Komputer', ''),
(7, 'Website & Internet', ''),
(8, 'Sistem Operasi', ''),
(9, 'Pemrograman', ''),
(10, 'Elekronika & Komputer', ''),
(11, 'Lainnya', ''),
(12, 'Sains', ''),
(13, 'Novel & Majalah', ''),
(14, 'Agribisnis', ''),
(15, 'Pertanian Dan Peternakan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_anggota` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `pengembalian` enum('YA','TIDAK') NOT NULL,
  `Batas Waktu` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`kode_pinjam`, `tgl_pinjam`, `kode_anggota`, `kode_buku`, `pengembalian`, `Batas Waktu`) VALUES
(9, '2013-03-01', 7, 10, 'YA', '2013-03-08'),
(16, '2013-03-01', 3, 12, 'YA', '2013-03-08'),
(11, '2013-03-01', 1, 10, 'YA', '2013-03-08'),
(18, '2013-03-05', 8, 10, 'YA', '2013-03-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `kode_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`kode_penerbit`, `nama_penerbit`, `alamat`, `telepon`, `email`, `keterangan`) VALUES
(101112001, 'Kompas Gramedia', 'Gedung Kompas Gramedia Jl.Palmerah 29 Jakpus 10270', '021-53650110', 'cs@gramediashop.com', '-'),
(101112002, 'Media Kita', 'Jl.Haji Montong 57 Ciganjur Jagakarsa.Jaksel', '021-78881000', 'redaksi@mediakita.com', ''),
(101112003, 'Gava Media', 'Jl.Klitren Lor GK III/15 Yogyakarta', '081225972214', 'infogavamedia@yahoo.com', '-'),
(101112004, 'Elek Media Komputindo', 'Jl.Palmerah Selatan 22,Jakarta 10270', '0215483008', 'elekmedia@yahoo.com', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `kode_peng` int(11) NOT NULL,
  `nama_peng` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`kode_peng`, `nama_peng`, `username`, `password`) VALUES
(1, 'Rani Yuliani', 'rani_yuliani@rocketmail.com', '12345678'),
(2, 'Nia Pitaloka', 'nia_p@live.com', '87654321'),
(3, 'Perdianto', 'perdianto27', '101112171');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kode_anggota` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `denda` enum('ya','tidak') NOT NULL,
  `nominal` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kode_pinjam`, `tgl_kembali`, `kode_anggota`, `kode_buku`, `denda`, `nominal`) VALUES
(9, '2013-03-13', 7, 10, 'ya', '2.500,00'),
(16, '2013-03-12', 3, 12, 'tidak', '0'),
(11, '2013-03-07', 1, 10, 'tidak', '0'),
(18, '2013-03-19', 8, 10, 'ya', '3.500,00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `kode_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`kode_penulis`, `nama_penulis`, `alamat`, `email`, `keterangan`) VALUES
(1, 'Hendri Hendratman,ST', 'Jl.Mentor 59 Lanud Husein Sastranegara,Bandung', 'hendihen@gmail.com', '-'),
(2, 'Deden N', 'Lengkong,Bandung', 'deden_n@gmail.com', '-'),
(3, 'Desi S', 'Buah Batu,Bandung', 'desi_s@gmail.com', '-'),
(4, 'Dian E', 'Yogyakarta', 'dian_e@ymail.com', '-'),
(5, 'Didin S', 'Jatinangor,Sumedang', 'didin_s@gmail.com', '-'),
(6, 'Egis S', 'Majalaya', 'egis_s@gmail.com', '-'),
(7, 'Eriga A', 'Jakarta', 'eriga_s_a@yahoo.com', '-'),
(8, 'Eva S L A', 'Surabaya', 'eva_sla@yahoo.com', '-'),
(9, 'Idad A', 'Sumedang', 'idad_a@ymail.com', '-'),
(10, 'Kokom M', 'Tanggerang', 'kokom_m@yahoo.com', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `deskripsi_buku`
--
ALTER TABLE `deskripsi_buku`
  ADD PRIMARY KEY (`kode_deskripsi`);

--
-- Indeks untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`kode_penerbit`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`kode_peng`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`kode_penulis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `kode_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `deskripsi_buku`
--
ALTER TABLE `deskripsi_buku`
  MODIFY `kode_deskripsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `kode_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `kode_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `kode_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101112005;

--
-- AUTO_INCREMENT untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `kode_peng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `kode_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `kode_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
