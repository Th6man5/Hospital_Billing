-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 11:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `spesialis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_telepon`, `email`, `alamat`, `spesialis`) VALUES
(1, 'Dr. Andi', 'L', '1980-06-15', '081234567890', 'andi.pratama@gmail.com', 'Jl. Merpati No. 12, Jakarta', 'Bedah Umum'),
(2, 'Dr. Siti Aminah', 'P', '1985-03-22', '089876543210', 'siti.aminah@gmail.com', 'Jl. Melati No. 5, Bandung', 'Pediatri'),
(3, 'Dr. Budi Santoso', 'L', '1978-10-10', '082233445566', 'budi.santoso@gmail.com', 'Jl. Kenanga No. 7, Surabaya', 'THT'),
(4, 'Dr. Dewi Lestari', 'P', '1990-12-05', '087654321009', 'dewi.lestari@gmail.com', 'Jl. Kamboja No. 9, Medan', 'Dermatologi'),
(5, 'Dr. Rudi Prasetyo', 'L', '1987-08-25', '081122334455', 'rudi.prasetyo@gmail.com', 'Jl. Anggrek No. 3, Semarang', 'Ortopedi');

-- --------------------------------------------------------

--
-- Table structure for table `insuransi`
--

CREATE TABLE `insuransi` (
  `id_insuransi` int(11) NOT NULL,
  `no_polis` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `tanggal_polis` date DEFAULT NULL,
  `no_telepon_perusahaan` varchar(11) DEFAULT NULL,
  `tanggal_polis_awal` date DEFAULT NULL,
  `tanggal_polis_akhir` date DEFAULT NULL,
  `jenis_pertanggungan` varchar(255) DEFAULT NULL,
  `potongan_harga` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insuransi`
--

INSERT INTO `insuransi` (`id_insuransi`, `no_polis`, `nama_perusahaan`, `alamat_perusahaan`, `tanggal_polis`, `no_telepon_perusahaan`, `tanggal_polis_awal`, `tanggal_polis_akhir`, `jenis_pertanggungan`, `potongan_harga`) VALUES
(1, 1001, 'Asuransi coba', 'Jl. Sehat No. 1, Jakarta', '2023-01-15', '08123456789', '2023-01-15', '2024-01-15', 'Kesehatan', 10),
(2, 1002, 'Asuransi Keluarga', 'Jl. Keluarga No. 5, Bandung', '2022-03-20', '08987654321', '2022-03-20', '2023-03-20', 'Keluarga', 20),
(4, 1004, 'Asuransi Properti', 'Jl. Properti No. 2, Medan', '2022-06-25', '08765432100', '2022-06-25', '2023-06-25', 'Kesehatan', 30);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga`, `id_dokter`) VALUES
(3, 'Rawat Jalan', '300000.00', 1),
(9, 'Lab', '1000000.00', 5),
(10, 'Radiologi', '500000.00', 4),
(11, 'THT', '800000.00', 3),
(12, 'Pemeriksaan Jantung', '10000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_eksternal` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(11) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `ras` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kode_negara` varchar(255) DEFAULT NULL,
  `bahasa_utama` varchar(255) DEFAULT NULL,
  `status_pernikahan` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `indikator_meninggal` varchar(255) DEFAULT NULL,
  `id_insuransi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_eksternal`, `nama_lengkap`, `nama_panggilan`, `no_telpon`, `jenis_kelamin`, `ras`, `alamat`, `kode_negara`, `bahasa_utama`, `status_pernikahan`, `kewarganegaraan`, `tempat_lahir`, `tanggal_lahir`, `indikator_meninggal`, `id_insuransi`) VALUES
(1, 'P001', 'John Doe', 'John', '08123456789', 'L', 'Asia', 'Jl. Mawar No. 1', 'ID', 'Bahasa Indonesia', 'Belum Menikah', 'Indonesia', 'Jakarta', '1980-01-01', 'Tidak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `biaya_layanan` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pasien`, `jenis_pembayaran`, `biaya_layanan`, `tanggal`, `waktu`, `nama_layanan`) VALUES
(20, 1, 'Tunai', 720000, '2024-10-17', '15:39:00', 'Rawat Jalan, Radiologi'),
(21, 1, 'Tunai', 880000, '2024-10-24', '19:14:00', 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_diag`
--

CREATE TABLE `transaksi_diag` (
  `id_transaksi_diag` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL,
  `jenis_pemeriksaan` varchar(255) NOT NULL,
  `kode_diagnosis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `total_harga` int(100) NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `id_diagnosa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `insuransi`
--
ALTER TABLE `insuransi`
  ADD PRIMARY KEY (`id_insuransi`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `fk_insuransi` (`id_insuransi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `transaksi_diag`
--
ALTER TABLE `transaksi_diag`
  ADD PRIMARY KEY (`id_transaksi_diag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insuransi`
--
ALTER TABLE `insuransi`
  MODIFY `id_insuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi_diag`
--
ALTER TABLE `transaksi_diag`
  MODIFY `id_transaksi_diag` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE SET NULL;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_insuransi` FOREIGN KEY (`id_insuransi`) REFERENCES `insuransi` (`id_insuransi`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_insuransi_claims` FOREIGN KEY (`id_insuransi`) REFERENCES `insuransi` (`id_insuransi`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
