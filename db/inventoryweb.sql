-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2023 pada 05.48
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventoryweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(60) DEFAULT NULL,
  `tanggal` varchar(50) NOT NULL,
  `id_cabang` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'draf',
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `nama_barang`, `tanggal`, `id_cabang`, `lokasi`, `status`, `foto`) VALUES
(1, 'BRG-0005', 'TV', '11/25/2023', '8', 'Admin 1', 'draf', 'coba.jpg'),
(2, '', NULL, '', '', '', 'Aktif', NULL),
(3, '', NULL, '', '', '', 'Aktif', NULL),
(4, 'BRG-0006', 'Mouse', '11/25/2023', '5', 'Admin 1', 'draf', 'ID_Card_MHC_Fin-09.jpg'),
(5, '', NULL, '', '', '', 'Aktif', NULL),
(6, '', NULL, '', '', '', 'Aktif', NULL),
(7, '', NULL, '', '', '', 'Aktif', NULL),
(8, '', NULL, '', '', '', 'Aktif', NULL),
(9, '', NULL, '', '', '', 'Aktif', NULL),
(10, '', NULL, '', '', '', 'Aktif', NULL),
(11, '', NULL, '', '', '', 'Aktif', NULL),
(12, '', NULL, '', '', '', 'aktif', NULL),
(13, '', NULL, '', '', '', 'aktif', NULL),
(14, '', NULL, '', '', '', 'aktif', NULL),
(15, '', NULL, '', '', '', 'aktif', NULL),
(16, '', NULL, '', '', '', 'aktif', NULL),
(17, '', NULL, '', '', '', 'aktif', NULL),
(18, '', NULL, '', '', '', 'aktif', NULL),
(19, '', NULL, '', '', '', 'aktif', NULL),
(20, '', NULL, '', '', '', 'aktif', NULL),
(21, '', NULL, '', '', '', 'aktif', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(30) NOT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_keluar` varchar(5) DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_cabang` char(50) NOT NULL,
  `cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang`, `id_user`, `jumlah_keluar`, `tgl_keluar`, `lokasi`, `id_cabang`, `cabang`) VALUES
('2023-11-BRG-K-0001', 'BRG-0003', 'USR-004', '1', '2023-11-24', 'Server', '7', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(40) NOT NULL,
  `id_supplier` varchar(30) DEFAULT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_masuk` int(10) DEFAULT NULL,
  `tgl_masuk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_supplier`, `id_barang`, `id_user`, `jumlah_masuk`, `tgl_masuk`) VALUES
('BRG-M-0002', 'SPLY-0001', 'BRG-0001', 'USR-001', 3, '2023-11-09'),
('BRG-M-0003', 'SPLY-0003', 'BRG-0003', 'USR-001', 11, '2023-11-09'),
('BRG-M-0004', 'SPLY-0001', 'BRG-0004', 'USR-001', 10, '2023-11-22'),
('BRG-M-0005', 'SPLY-0003', 'BRG-0004', 'USR-004', 25, '2023-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ket` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `no`, `nama`, `ket`) VALUES
(5, 0, 'Gamsungi', 'Jl. Yasin Gamsungi No.2, Kec. ternate tengah, Kel. kampung makasar Timur, Makassar Tim., Ternate, Kota Ternate, Maluku Utara 97724'),
(7, 1, 'Jambula', 'Jambula, Kec. Pulau Ternate, Kota Ternate, Maluku Utara'),
(8, 3, 'Tobelo', 'as;ldjkakd'),
(9, 4, 'Jemberr', 'Jl. Letjen S.Parman No.91, Kali Oktak, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `ket`) VALUES
(1, 'Minuman', ''),
(3, 'Kemasan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(11) NOT NULL,
  `ket` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `ket`) VALUES
(1, 'kemasan', ''),
(2, 'karton', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `notelp`, `alamat`) VALUES
('SPLY-0001', 'Radhian Sobarna', '087817379229', 'Sumedang'),
('SPLY-0002', 'Heri Perdiansyah', '089829128118', 'Sumedang'),
('SPLY-0003', 'Widi Priansyah', '089876261556', 'Sumedang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `level` enum('gudang','admin','manajer') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `notelp`, `level`, `password`, `foto`, `status`) VALUES
('USR-001', 'Administrasi', 'admin', 'admin@admin.com', '087856123445', 'admin', '0192023a7bbd73250516f069df18b500', 'user.png', 'Aktif'),
('USR-004', 'Andre', 'moch', 'andremoch077@gmail.com', '088585758', 'admin', '4297f44b13955235245b2497399d7a93', 'mouse.jpeg', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
