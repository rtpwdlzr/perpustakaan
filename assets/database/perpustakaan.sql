-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2016 pada 18.45
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `NO_INDUK` varchar(10) NOT NULL,
  `NAMA_SISWA` varchar(50) DEFAULT NULL,
  `ALAMAT_SISWA` varchar(100) DEFAULT NULL,
  `JENKEL_SISWA` char(2) DEFAULT NULL,
  `NOTLP_SISWA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`NO_INDUK`, `NAMA_SISWA`, `ALAMAT_SISWA`, `JENKEL_SISWA`, `NOTLP_SISWA`) VALUES
('10923', 'Putra', 'Surabaya', 'L', ' 62 (874) 5316 '),
('12354', 'Putri', 'Surabaya', 'P', ' 62 (956) 000 '),
('12901', 'Geo', 'Surabaya', 'L', ' 62 (899) 8366 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `ID_BUKU` varchar(10) NOT NULL,
  `ID_JENISBUKU` varchar(10) DEFAULT NULL,
  `JUDUL_BUKU` varchar(50) DEFAULT NULL,
  `PENGARANG_BUKU` varchar(50) DEFAULT NULL,
  `PENERBIT_BUKU` varchar(50) DEFAULT NULL,
  `TAHUNTERBIT_BUKU` varchar(4) DEFAULT NULL,
  `TANGGALMASUK_BUKU` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `JUMLAH_BUKU` int(11) DEFAULT NULL,
  `TOTAL_BUKU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `ID_JENISBUKU`, `JUDUL_BUKU`, `PENGARANG_BUKU`, `PENERBIT_BUKU`, `TAHUNTERBIT_BUKU`, `TANGGALMASUK_BUKU`, `JUMLAH_BUKU`, `TOTAL_BUKU`) VALUES
('MBK0000001', 'MJB0000001', 'Akuntansi 1', 'Erlamgga', 'Erlagga', '2000', '2016-06-05 09:28:52', 14, 14),
('MBK0000002', 'MJB0000002', 'Akuntansi 2', 'Erlamgga', 'Erlamgga', '2004', '2016-06-05 09:29:11', 12, 12),
('MBK0000003', 'MJB0000002', 'Multimedia 1', 'Multimedia', 'Multimedia', '2005', '2016-06-05 09:29:38', 13, 13),
('MBK0000004', 'MJB0000002', 'Multimedia 2', 'Multimedia', 'Multimedia', '2010', '2016-06-05 09:29:59', 13, 13),
('MBK0000005', 'MJB0000002', 'AHJDHJAS', 'ASDASDAS', 'ASDASDASD', '2006', '2016-06-09 18:20:20', 8, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hilangbuku`
--

CREATE TABLE IF NOT EXISTS `hilangbuku` (
  `ID_HILANGBUKU` varchar(10) NOT NULL,
  `ID_BUKU` varchar(10) DEFAULT NULL,
  `NO_INDUK` varchar(10) DEFAULT NULL,
  `KETERANGAN_HILANGBUKU` varchar(500) DEFAULT NULL,
  `SOLUSI_HILANGBUKU` varchar(500) DEFAULT NULL,
  `TGL_HILANGBUKU` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hilangbuku`
--

INSERT INTO `hilangbuku` (`ID_HILANGBUKU`, `ID_BUKU`, `NO_INDUK`, `KETERANGAN_HILANGBUKU`, `SOLUSI_HILANGBUKU`, `TGL_HILANGBUKU`) VALUES
('SBH0000001', 'MBK0000001', '12354', 'lkjklj', 'jjgjghj', '2016-06-09 20:37:14'),
('SBH0000002', 'MBK0000002', '10923', '65456464', 'hjgjhgj', '2016-06-09 20:37:29'),
('SBH0000003', 'MBK0000002', '10923', '', '', '2016-06-10 08:56:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_buku`
--

CREATE TABLE IF NOT EXISTS `jenis_buku` (
  `ID_JENISBUKU` varchar(10) NOT NULL,
  `NAMA_JENISBUKU` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_buku`
--

INSERT INTO `jenis_buku` (`ID_JENISBUKU`, `NAMA_JENISBUKU`) VALUES
('MJB0000001', 'Fiksi'),
('MJB0000002', 'Non-Fiksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `ID_PETUGAS` varchar(10) NOT NULL,
  `NAMA_PETUGAS` varchar(50) DEFAULT NULL,
  `ALAMAT_PETUGAS` varchar(100) DEFAULT NULL,
  `JENKEL_PETUGAS` varchar(2) DEFAULT NULL,
  `NOTLP_PETUGAS` varchar(15) DEFAULT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `NAMA_PETUGAS`, `ALAMAT_PETUGAS`, `JENKEL_PETUGAS`, `NOTLP_PETUGAS`, `USERNAME`, `PASSWORD`) VALUES
('MPT0000001', 'Rizal Dwi Putra', 'Taman Sidoarjo', 'L', '08989231740', 'rizal', 'rizal'),
('MPT0000002', 'Putra R', 'Putra R', 'Pi', ' 62 (981) 7391 ', 'putra', 'putra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksikembali`
--

CREATE TABLE IF NOT EXISTS `transaksikembali` (
  `ID_TRANSAKSIKEMBALI` varchar(10) NOT NULL,
  `ID_TRANSAKSIPINJAM` varchar(10) DEFAULT NULL,
  `TGL_TRANSAKSIKEMBALI` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `JUMLAHDENDA_TRANSAKSIKEMBALI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksikembali`
--

INSERT INTO `transaksikembali` (`ID_TRANSAKSIKEMBALI`, `ID_TRANSAKSIPINJAM`, `TGL_TRANSAKSIKEMBALI`, `JUMLAHDENDA_TRANSAKSIKEMBALI`) VALUES
('TRK0000001', 'TRP0000001', '2016-06-05 17:00:00', 131),
('TRK0000002', 'TRP0000003', '2016-06-05 14:35:54', 2222),
('TRK0000003', 'TRP0000005', '2016-06-09 18:10:44', 0),
('TRK0000004', 'TRP0000002', '2016-06-09 18:24:31', 3000),
('TRK0000005', 'TRP0000015', '2016-06-09 18:25:21', 0),
('TRK0000006', 'TRP0000016', '2016-06-09 18:27:23', 0),
('TRK0000007', 'TRP0000018', '2016-06-14 19:40:51', 0),
('TRK0000008', 'TRP0000019', '2016-06-14 19:41:46', 0),
('TRK0000009', 'TRP0000024', '2016-06-17 07:40:11', 0),
('TRK0000010', 'TRP0000025', '2016-06-17 07:41:01', 0),
('TRK0000011', 'TRP0000026', '2016-06-17 07:46:04', 0),
('TRK0000012', 'TRP0000017', '2016-06-17 07:49:31', 800),
('TRK0000013', 'TRP0000027', '2016-06-17 07:53:06', 0),
('TRK0000014', 'TRP0000022', '2016-06-17 07:53:24', 0),
('TRK0000015', 'TRP0000028', '2016-06-17 07:54:35', 0),
('TRK0000016', 'TRP0000029', '2016-06-17 07:57:19', 0),
('TRK0000017', 'TRP0000030', '2016-06-17 08:11:46', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksipinjam`
--

CREATE TABLE IF NOT EXISTS `transaksipinjam` (
  `ID_TRANSAKSIPINJAM` varchar(10) NOT NULL,
  `NO_INDUK` varchar(10) DEFAULT NULL,
  `ID_PETUGAS` varchar(10) DEFAULT NULL,
  `ID_BUKU` varchar(10) DEFAULT NULL,
  `TGL_PINJAM` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TGL_KEMBALI` date DEFAULT NULL,
  `STATUS_TRANSAKSIPINJAM` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksipinjam`
--

INSERT INTO `transaksipinjam` (`ID_TRANSAKSIPINJAM`, `NO_INDUK`, `ID_PETUGAS`, `ID_BUKU`, `TGL_PINJAM`, `TGL_KEMBALI`, `STATUS_TRANSAKSIPINJAM`) VALUES
('TRP0000001', '10923', 'MPT0000001', 'MBK0000001', '2016-05-30 09:51:06', '2016-06-01', 1),
('TRP0000002', '12354', 'MPT0000001', 'MBK0000002', '2016-06-05 09:53:10', '2016-06-10', 1),
('TRP0000003', '12901', 'MPT0000001', 'MBK0000003', '2016-06-05 09:53:26', '2016-06-08', 1),
('TRP0000004', '12354', 'MPT0000001', 'MBK0000002', '2016-06-05 09:57:06', '2016-06-09', 1),
('TRP0000005', '12354', 'MPT0000001', 'MBK0000002', '2016-06-05 11:09:59', '2016-06-15', 1),
('TRP0000006', '10923', 'MPT0000001', 'MBK0000001', '2016-05-30 14:18:49', '2016-06-02', 1),
('TRP0000007', '10923', 'MPT0000001', 'MBK0000002', '2016-06-05 14:56:00', '2016-06-07', 1),
('TRP0000008', '10923', 'MPT0000001', 'MBK0000001', '2016-06-06 05:26:16', '2016-06-08', 1),
('TRP0000009', '12354', 'MPT0000001', 'MBK0000002', '2016-06-17 08:46:20', '2016-06-21', 1),
('TRP0000010', '12354', 'MPT0000001', 'MBK0000002', '2016-06-09 18:06:09', '2016-06-17', 1),
('TRP0000011', '10923', 'MPT0000001', 'MBK0000001', '2016-06-09 18:07:11', '2016-06-10', 1),
('TRP0000012', '12354', 'MPT0000001', 'MBK0000001', '2016-06-09 18:08:22', '2016-06-11', 1),
('TRP0000013', '12901', 'MPT0000001', 'MBK0000002', '2016-06-09 18:17:31', '2016-06-18', 1),
('TRP0000014', '12354', 'MPT0000001', 'MBK0000005', '2016-06-09 18:20:38', '2016-06-25', 1),
('TRP0000015', '12354', 'MPT0000001', 'MBK0000003', '2016-06-09 18:25:15', '2016-06-15', 1),
('TRP0000016', '10923', 'MPT0000001', 'MBK0000003', '2016-06-09 18:27:16', '2016-06-17', 1),
('TRP0000017', '12354', 'MPT0000001', 'MBK0000002', '2016-06-14 18:53:03', '2016-06-13', 1),
('TRP0000018', '12354', 'MPT0000001', 'MBK0000003', '2016-06-14 19:32:41', '2016-06-17', 1),
('TRP0000019', '12354', 'MPT0000001', 'MBK0000002', '2016-06-14 19:41:34', '2016-06-16', 1),
('TRP0000020', '10923', 'MPT0000001', 'MBK0000003', '2016-06-14 19:49:50', '2016-06-23', 2),
('TRP0000021', '12901', 'MPT0000001', 'MBK0000002', '2016-06-14 20:14:32', '2016-06-16', 0),
('TRP0000022', '10923', 'MPT0000001', 'MBK0000003', '2016-06-17 06:48:12', '2016-06-17', 1),
('TRP0000024', '10923', 'MPT0000001', 'MBK0000005', '2016-06-17 07:39:14', '2016-06-23', 1),
('TRP0000025', '12354', 'MPT0000001', 'MBK0000005', '2016-06-17 07:40:37', '2016-06-17', 1),
('TRP0000026', '12354', 'MPT0000001', 'MBK0000005', '2016-06-17 07:45:47', '2016-06-17', 1),
('TRP0000027', '12354', 'MPT0000001', 'MBK0000005', '2016-06-17 07:52:47', '2016-06-17', 1),
('TRP0000028', '12901', 'MPT0000001', 'MBK0000005', '2016-06-17 07:54:18', '2016-06-17', 1),
('TRP0000029', '10923', 'MPT0000001', 'MBK0000005', '2016-06-17 07:57:06', '2016-06-17', 1),
('TRP0000030', '12354', 'MPT0000001', 'MBK0000005', '2016-06-17 08:11:14', '2016-06-17', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulanbuku`
--

CREATE TABLE IF NOT EXISTS `usulanbuku` (
  `ID_USULBUKU` varchar(10) NOT NULL,
  `ID_PETUGAS` varchar(10) DEFAULT NULL,
  `JUDUL_USULBUKU` varchar(50) DEFAULT NULL,
  `PENGARANG_USULBUKU` varchar(50) DEFAULT NULL,
  `PENERBIT_USULBUKU` varchar(50) DEFAULT NULL,
  `TAHUNTERBIT_USULBUKU` date DEFAULT NULL,
  `KETERANGAN_USULBUKU` varchar(500) DEFAULT NULL,
  `PERKIRAANHARGA_USULBUKU` int(11) DEFAULT NULL,
  `TGL_USULBUKU` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulanbuku`
--

INSERT INTO `usulanbuku` (`ID_USULBUKU`, `ID_PETUGAS`, `JUDUL_USULBUKU`, `PENGARANG_USULBUKU`, `PENERBIT_USULBUKU`, `TAHUNTERBIT_USULBUKU`, `KETERANGAN_USULBUKU`, `PERKIRAANHARGA_USULBUKU`, `TGL_USULBUKU`) VALUES
('SUB0000001', 'MPT0000001', 'Matematika', '-', '-', '0000-00-00', '-', 25000, '2016-06-14 21:03:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`NO_INDUK`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`),
  ADD KEY `FK_MEMPUNYAI` (`ID_JENISBUKU`);

--
-- Indexes for table `hilangbuku`
--
ALTER TABLE `hilangbuku`
  ADD PRIMARY KEY (`ID_HILANGBUKU`),
  ADD KEY `FK_myKey` (`NO_INDUK`),
  ADD KEY `FK_myKeyBuku` (`ID_BUKU`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`ID_JENISBUKU`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`);

--
-- Indexes for table `transaksikembali`
--
ALTER TABLE `transaksikembali`
  ADD PRIMARY KEY (`ID_TRANSAKSIKEMBALI`),
  ADD KEY `FK_MEMILIKI` (`ID_TRANSAKSIPINJAM`);

--
-- Indexes for table `transaksipinjam`
--
ALTER TABLE `transaksipinjam`
  ADD PRIMARY KEY (`ID_TRANSAKSIPINJAM`),
  ADD KEY `FK_MELAYANIPINJAM` (`ID_PETUGAS`),
  ADD KEY `FK_MEMINJAM` (`NO_INDUK`),
  ADD KEY `FK_MEMINJAMBUKU` (`ID_BUKU`);

--
-- Indexes for table `usulanbuku`
--
ALTER TABLE `usulanbuku`
  ADD PRIMARY KEY (`ID_USULBUKU`),
  ADD KEY `FK_MENGUSULKAN` (`ID_PETUGAS`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_JENISBUKU`) REFERENCES `jenis_buku` (`ID_JENISBUKU`);

--
-- Ketidakleluasaan untuk tabel `hilangbuku`
--
ALTER TABLE `hilangbuku`
  ADD CONSTRAINT `FK_myKey` FOREIGN KEY (`NO_INDUK`) REFERENCES `anggota` (`NO_INDUK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_myKeyBuku` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksikembali`
--
ALTER TABLE `transaksikembali`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_TRANSAKSIPINJAM`) REFERENCES `transaksipinjam` (`ID_TRANSAKSIPINJAM`);

--
-- Ketidakleluasaan untuk tabel `transaksipinjam`
--
ALTER TABLE `transaksipinjam`
  ADD CONSTRAINT `FK_MELAYANIPINJAM` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `petugas` (`ID_PETUGAS`),
  ADD CONSTRAINT `FK_MEMINJAM` FOREIGN KEY (`NO_INDUK`) REFERENCES `anggota` (`NO_INDUK`),
  ADD CONSTRAINT `FK_MEMINJAMBUKU` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);

--
-- Ketidakleluasaan untuk tabel `usulanbuku`
--
ALTER TABLE `usulanbuku`
  ADD CONSTRAINT `FK_MENGUSULKAN` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `petugas` (`ID_PETUGAS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;