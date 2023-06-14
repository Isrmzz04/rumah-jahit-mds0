-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 05:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dafitosz`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `price`, `kategori_barang`, `deskripsi`, `image`, `stok`) VALUES
(1, 'Sepatu Bayi 1', 300000, 'Sepatu', 'ini sepatu bayi trifthing', 'sepatu1.jpg', 1),
(2, 'Sepatu Bayi 2', 300000, 'Sepatu', 'ini sepatu bayi trifthing', 'sepatu2.jpg', 1),
(3, 'Sendal Kodok', 300000, 'Sendal', 'ini sendal bayi trifthing', 'sendal1.jpg', 1),
(4, 'Sweeter bayi 1', 300000, 'Crewneck', 'ini sweeter bayi trifthing', 'sweeter1.jpg', 1),
(5, 'Sweeter bayi 2', 300000, 'Crewneck', 'ini sweeter bayi trifthing', 'sweeter2.jpg', 1),
(6, 'Kemeja bayi 1', 300000, 'Kemeja', 'ini kemeja bayi trifthing', 'kemeja1.jpg', 1),
(7, 'Kemeja bayi 2', 300000, 'Kemeja', 'ini kemeja bayi trifthing', 'kemeja2.jpg', 1),
(8, 'Celana Bayi 1', 300000, 'Celana', 'ini celana bayi trifthing', 'celana1.jpg', 1),
(9, 'Celana Bayi 2', 300000, 'Celana', 'ini celana bayi trifthing', 'celana2.jpg', 1),
(10, 'Celana Bayi 3', 300000, 'Celana', 'ini celana bayi trifthing', 'celana3.jpg', 1),
(11, 'Celana Bayi 4', 300000, 'Celana', 'ini celana bayi trifthing', 'celana4.jpg', 1),
(12, 'Kaos Bayi 1', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos1.jpg', 1),
(13, 'Kaos Bayi 2', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos2.jpg', 1),
(14, 'Kaos Bayi 3', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos3.jpg', 1),
(15, 'Kaos Bayi 4', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos4.jpg', 1),
(16, 'Kaos Bayi 5', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos5.jpg', 1),
(17, 'Kaos Bayi 6', 300000, 'Kaos', 'ini kaos bayi trifthing', 'kaos6.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
