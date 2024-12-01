-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2024 pada 12.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tititss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesanan` varchar(50) NOT NULL,
  `nomor_identitas` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesanan`, `nomor_identitas`, `jenis_kelamin`, `tipe_kamar`, `durasi_menginap`, `diskon`, `total_harga`, `tanggal`) VALUES
(1, 'ashdhasjdh', '1111111111111111', 'Laki-Laki', 'Deluxe', 4, 10, 2880000, '2090-09-08'),
(2, 'User', '1234567891231234', 'Laki-Laki', 'Family', 10, 10, 10080000, '2024-12-22'),
(3, 'TESTER AJA', '1234568911113245', 'Laki-Laki', 'Standar', 3, 10, 1580000, '2024-12-01'),
(4, 'Syahrul', '1234567891111111', 'Laki-Laki', 'Standar', 3, 10, 1580000, '2024-12-01'),
(5, 'syahrul', '1234567891111111', 'Laki-Laki', 'Family', 5, 10, 5080000, '2024-12-05'),
(6, 'tester1', '1234567891234516', 'Laki-Laki', 'Family', 4, 10, 4080000, '2024-12-03'),
(7, 'syahrul', '1234567890123456', 'Laki-Laki', 'Family', 3, 10, 2772000, '2024-12-03'),
(8, 'syahrul ramlan', '1234567891012345', 'Laki-Laki', 'Family', 5, 10, 4572000, '2024-12-05'),
(9, 'reset', '1234567890101111', 'Laki-Laki', 'Deluxe', 6, 10, 3852000, '2024-12-25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
