-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 01:39 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lampu_kreatif`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapemesanan`
--

CREATE TABLE `datapemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `produk_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `alamat_kirim` varchar(75) NOT NULL,
  `no_telp_penerima` varchar(15) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `status_konfirm` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapemesanan`
--

INSERT INTO `datapemesanan` (`id_pemesanan`, `produk_id`, `user_id`, `keterangan`, `alamat_kirim`, `no_telp_penerima`, `tgl_pengiriman`, `status_konfirm`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'barang harus oke sip markosip', 'demak', '9876543467', '2016-07-27', 'Y', '2016-07-25 01:52:47', '2016-07-25 01:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'SMALL'),
(2, 'MEDIUM'),
(3, 'LARGE'),
(4, 'HOT');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `keterangan_produk` varchar(150) NOT NULL,
  `kode_produk` int(5) NOT NULL,
  `harga_produk` int(6) NOT NULL,
  `img` varchar(50) NOT NULL,
  `kategori_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan_produk`, `kode_produk`, `harga_produk`, `img`, `kategori_id`, `created_at`, `updated_at`) VALUES
(2, 'Lampion Wisuda Hitam', 'Berbentuk Karakter Wisuda', 500, 100000, '1469155816.jpg', 2, '2016-07-21 19:50:16', '2016-07-21 19:50:16'),
(3, 'Lampion Wisuda Pink', 'Berbentuk Karakter Wisuda', 501, 120000, '1469155864.jpg', 2, '2016-07-21 19:51:04', '2016-07-21 19:51:04'),
(4, 'Lampion Karakter Hewan', 'Berbentuk Karakter Hewan', 400, 50000, '1469155928.jpg', 1, '2016-07-21 19:52:08', '2016-07-21 19:52:08'),
(5, 'Lampion Karakter Hewan 2', 'Berbentuk Karakter Hewan', 401, 75000, '1469155965.jpg', 1, '2016-07-21 19:52:45', '2016-07-21 19:52:45'),
(6, 'Lampion Kartun', 'Berbentuk Karakter Kartun', 300, 120000, '1469156039.jpg', 3, '2016-07-21 19:53:59', '2016-07-21 19:53:59'),
(7, 'Lampion Kartun 2', 'Berbentuk Karakter Kartun', 301, 120000, '1469156124.jpg', 3, '2016-07-21 19:55:24', '2016-07-21 19:55:24'),
(8, 'Lampion Wisuda Hitam', 'Berbentuk Karakter Wisuda', 500, 100000, '1469156401.jpg', 4, '2016-07-21 20:00:01', '2016-07-21 20:00:01'),
(9, 'Lampion Karakter Hewan', 'Berbentuk Karakter Hewan', 400, 100000, '1469156472.jpg', 4, '2016-07-21 20:01:12', '2016-07-21 20:01:12'),
(10, 'Lampion Kartun', 'Berbentuk Karakter Kartun', 300, 120000, '1469156541.jpg', 4, '2016-07-21 20:02:21', '2016-07-21 20:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `user_level` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_level`, `name`, `email`, `password`, `remember_token`, `kota`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 2, 'Eko', 'eko@gmail.com', '$2y$10$.Php4p3AkD0R3XqbZuPHsOKwWXxXF1Xrypv/ekP5FpFsD1hn/PA6W', 'R6d8NQuSfG6FTZ76PnA4uZzBWFaOIacCFF31tVitudOg8S3ytvnL7iO1KOux', 'Demak', 'Karang Tengah, Demak', '0897654321', '2016-07-22 01:33:40', '2016-07-21 19:43:30'),
(2, 1, 'Roisul Asolole', 'rois@gmail.com', '$2y$10$aD3myy6YCzwLVeVGWfgsa.MbLL2nZMGSjAuDIR9jNiw8usXhTfDXm', 'BkKJnIjSSf7S14Kas1WOriItu5SpYADkTlySE9jRqt99W1gyt3J2KjYxCrKN', 'Demak', 'Mburi Pasar', '0987654323', '2016-07-25 01:48:51', '2016-07-25 01:53:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapemesanan`
--
ALTER TABLE `datapemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `FK_datapemesanan_produk` (`produk_id`),
  ADD KEY `FK_datapemesanan_users` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_produk_kategori` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapemesanan`
--
ALTER TABLE `datapemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `datapemesanan`
--
ALTER TABLE `datapemesanan`
  ADD CONSTRAINT `FK_datapemesanan_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_datapemesanan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_produk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
