-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 05:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baruqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `kode` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `namaProduct` varchar(200) NOT NULL,
  `oleh` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `size` text NOT NULL,
  `jumlah` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`kode`, `tgl`, `namaProduct`, `oleh`, `warna`, `size`, `jumlah`) VALUES
('BRG004', '2024-03-05', 'kerudung elor', 'gunawan', 'hijau', 'S', 50),
('BRG004', '2024-03-05', 'kerudung elor', 'hulk', 'hijau', 'XL', 40),
('BRG004', '2024-03-05', 'kerudung elor', 'dindin', 'hijau', 'XL', 10),
('BRG003', '2024-03-05', 'kerudung turky', 'Binka', 'dongker', 'L', 30),
('BRG003', '2024-03-05', 'kerudung turky', 'dindin', 'dongker', 'L', 20);

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `Tambahstok` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
     UPDATE stok SET jumlah = jumlah + NEW.jumlah 
     WHERE kode = NEW.kode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(200) NOT NULL,
  `nik` int(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `noHp` int(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `noHp`, `jabatan`, `username`, `password`) VALUES
(10024, 223300445, 'Gunawan Jaya', 'Jepara', 858907643, 'Packing', 'gunawan', 'gunawan123');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode` varchar(200) NOT NULL,
  `namaProduct` varchar(200) NOT NULL,
  `jumlah` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode`, `namaProduct`, `jumlah`) VALUES
('BRG003', 'kerudung turky', 50),
('BRG004', 'kerudung elor', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
