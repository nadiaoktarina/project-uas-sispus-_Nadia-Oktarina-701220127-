-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 05:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahunterbit` varchar(50) NOT NULL,
  `stokbuku` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `title`, `isbn`, `penerbit`, `tahunterbit`, `stokbuku`, `dipinjam`, `tanggalmasuk`, `gambar`) VALUES
(1, 'Kumpulan Cerpen Terbaik', '132-123-234-231', 'Informatika Bandung', '2012', 23, 2, '2015-04-01', 'cover2.jpg'),
(3, 'Fokus SBNT', '123-234-224-456', 'Airlangga', '2005', 23, 4, '2023-12-08', 'cover5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_tetap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `harga_denda`, `status`, `tanggal_tetap`) VALUES
(2, '90000', 'Hilang', '2023-12-15'),
(3, '3000', 'Terlambat Mengembalikan', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_pinjam` int(11) NOT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `nama_anggota` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `lama_pinjam` int(11) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kembali`
--

INSERT INTO `kembali` (`id_pinjam`, `nama_buku`, `nama_anggota`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_kembali`, `denda`) VALUES
(1, 'Impian 100 cahaya', 'nadia', 'belum dikembalikan', '2023-12-11', 7, '2023-12-18', '5000'),
(2, 'seribu janji', 'haikal', 'sudah dikembalikan', '2023-12-26', 3, '2023-12-28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `jurusan`, `no_hp`, `kelas`, `gambar`) VALUES
(1, '7011220024', 'Nadia Oktarina', 'Palembang sumsel', 'wanita', '2003-10-01', 'Sistem Informasi', '085234565680', '3F', 'siswa1.jpg'),
(6, '7011220025', 'jojo', 'jambi', 'pria', '2006-12-06', 'Fisika', '085234567868', '3B', 'siswa2.jpg'),
(11, '7011220027', 'Rama', 'palembang', 'pria', '2004-10-06', 'teknik kimia', '081532659739', '3D', 'siswa3.jpg'),
(20, '701220253', 'Caca Sintya', 'jateng', 'wanita', '2003-12-15', 'teknik kimia', '087956859079', '2D', 'IMG_20190901_095632.jpg'),
(21, '701220123', 'sasa', 'jakarta', 'wanita', '2006-12-04', 'teknik informatika', '085232679735', '4D', 'IMG_20191229_074042.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nama_anggota` varchar(255) DEFAULT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `lama_pinjam` varchar(11) DEFAULT NULL,
  `tgl_balik` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `nama_anggota`, `nama_buku`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`) VALUES
(1, 'Nadia', 'cara cepat menguasai pemrograman java', '2023-12-11', '3 hari', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Miya', 'miya', 'miya123', 'kepala perpus'),
(2, 'Nadia Oktarina', 'nadia', 'nadia123', 'admin'),
(3, 'Haikal', 'haikal', 'haikal123', 'mahasiswa'),
(4, 'Caca sintya', 'caca', 'caca123', 'mahasiswa'),
(5, 'muhammad rafi', 'rafi', 'rafi123', 'admin'),
(6, 'jihan safitri', 'jihan', 'jihan123', 'mahasiswa'),
(7, 'mario saputra', 'mario', 'mario123', 'mahasiswa'),
(8, 'zahra', 'zahra', 'zahra123', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
