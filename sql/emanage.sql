-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 09:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `d_penarikan`
--

CREATE TABLE `d_penarikan` (
  `id_dpenarikan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `keperluan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_penarikan`
--

INSERT INTO `d_penarikan` (`id_dpenarikan`, `id_user`, `jumlah`, `tanggal`, `keperluan`) VALUES
(19, 11, 20000, '2017-12-25', 'Beli Beras'),
(20, 11, 5000, '2017-12-25', 'Beli sayur rames'),
(21, 11, 20000, '2017-12-31', 'Makan'),
(23, 11, 22000, '2018-01-02', 'Ongkos naik bus'),
(24, 11, 8000, '2018-01-02', 'Beli Nasi'),
(26, 11, 20000, '2018-01-02', 'Beli paketan internet'),
(27, 11, 50000, '2018-01-02', 'Bayar modul'),
(29, 11, 10000, '2018-01-03', 'Tuku pentol'),
(33, 11, 10000, '2018-01-04', 'Mangan'),
(34, 11, 30000, '2018-01-07', 'Makan Hari Ini'),
(35, 11, 10000, '2018-01-09', 'Beli ayam geprek'),
(36, 11, 3000, '2018-01-09', 'Beli sayur'),
(40, 11, 7000, '2018-01-10', 'Beli Sayur'),
(41, 11, 10000, '2018-01-10', 'Naik Gojek'),
(42, 11, 5000, '2018-01-12', 'Suambangan'),
(43, 11, 10000, '2018-01-14', 'Beli Makan'),
(44, 11, 50000, '2018-01-15', 'Ngurus passport'),
(45, 11, 5000, '2018-01-15', 'Beli Sayur'),
(46, 16, 5000, '2018-01-16', 'Beli sayur rames'),
(47, 11, 10000, '2018-01-22', 'Beli mie goreng'),
(48, 11, 50000, '2018-01-26', 'Bayar Remidi'),
(49, 11, 22000, '2018-01-26', 'Bayar ongkos naik bus'),
(50, 11, 10000, '2018-02-01', 'Main PS'),
(51, 11, 10000, '2018-02-01', 'Makan salak'),
(52, 11, 30000, '2018-02-03', 'Beli bensin'),
(53, 11, 10000, '2018-02-03', 'Makan'),
(54, 11, 30000, '2018-02-10', 'Beli sabun muka'),
(55, 11, 10000, '2018-02-10', 'Beli bensin'),
(56, 16, 10000, '2018-02-10', 'Beli Boneka'),
(57, 16, 5000, '2018-02-10', 'Beli Pentol'),
(58, 11, 10000, '2018-03-02', 'Makan'),
(59, 11, 20000, '2018-08-29', 'Isi Bensin'),
(60, 11, 50000, '2018-08-29', 'Beli Perlengkapan Dinus Inside'),
(63, 11, 10000, '2018-10-08', 'Makan Geprek'),
(64, 11, 10000, '2018-10-08', 'Beli Bensin'),
(65, 17, 10000, '2018-10-08', 'Beli Bensin');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_p` int(10) NOT NULL,
  `id_saldo` int(10) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `tanggal_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_p`, `id_saldo`, `kode`, `jumlah`, `tanggal_in`) VALUES
(32, 10, 'PMSKN001', 100000, '2017-12-25'),
(38, 10, 'PMSKN007', 300000, '2018-01-04'),
(42, 10, 'PMSKN011', 10000, '2018-01-14'),
(43, 10, 'PMSKN012', 200000, '2018-01-26'),
(44, 10, 'PMSKN013', 100000, '2018-01-30'),
(45, 10, 'PMSKN014', 10000, '2018-02-03'),
(46, 15, 'PMSKN015', 50000, '2018-02-10'),
(47, 10, 'PMSKN016', 92000, '2018-08-29'),
(48, 16, 'PMSKN017', 10000, '2018-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_user`, `tanggal`, `jumlah`) VALUES
(6, 11, '2017-12-25', 25000),
(8, 11, '2018-01-01', 5000),
(9, 11, '2017-12-31', 20000),
(11, 11, '2018-01-02', 100000),
(14, 11, '2018-01-03', 10000),
(17, 11, '2018-01-04', 10000),
(18, 11, '2018-01-07', 30000),
(19, 11, '2018-01-09', 13000),
(22, 11, '2018-01-10', 17000),
(23, 11, '2018-01-12', 5000),
(24, 11, '2018-01-14', 10000),
(25, 11, '2018-01-15', 55000),
(26, 16, '2018-01-16', 5000),
(27, 11, '2018-01-22', 10000),
(28, 11, '2018-01-26', 72000),
(29, 11, '2018-02-01', 20000),
(30, 11, '2018-02-03', 40000),
(31, 11, '2018-02-10', 40000),
(32, 16, '2018-02-10', 15000),
(33, 11, '2018-03-02', 10000),
(34, 11, '2018-08-29', 80000),
(35, 11, '2018-08-30', 10000),
(36, 11, '2018-10-08', 20000),
(37, 17, '2018-10-08', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `jml_saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_user`, `jml_saldo`) VALUES
(10, 11, 320000),
(15, 16, 40000),
(16, 17, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `tgl_lahir`, `foto`, `username`, `password`) VALUES
(11, 'Muhammad Izza Lutfi', 'Desa Mlagen, Kec. Pamotan, Kab. Rembang', '1998-10-15', 'sumbing_bg.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(16, 'Ilfa Lathifah', 'Desa Mlagen, Kec. Pamotan, Kab. Rembang', '2006-05-26', 'page1-img7.jpg', 'ilfa', '8ba20a588da71148c5f54589b4f0b900'),
(17, 'Murti', 'Semarang', '2018-02-01', 'whatsapp.PNG', 'murti', 'c0ceb3959ef27a73cda5563b844011f7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_penarikan`
--
ALTER TABLE `d_penarikan`
  ADD PRIMARY KEY (`id_dpenarikan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_saldo` (`id_saldo`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_penarikan`
--
ALTER TABLE `d_penarikan`
  MODIFY `id_dpenarikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_penarikan`
--
ALTER TABLE `d_penarikan`
  ADD CONSTRAINT `d_penarikan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `penarikan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `saldo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
