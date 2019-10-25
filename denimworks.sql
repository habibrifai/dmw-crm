-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2018 pada 21.12
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denimworks`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `idorder` varchar(30) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `idpelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`idorder`, `product_name`, `quantity`, `order_date`, `pickup_date`, `cost`, `status`, `idpelanggan`) VALUES
('O001', 'Jaket Dilan', 1, '2018-05-22', '2018-05-28', 350000, 'dalam antrian', 1),
('O002', 'Jaket Denim', 1, '2018-05-21', '2018-05-28', 350000, 'dalam antrian', 2),
('O003', 'Jaket Milea', 1, '2018-05-21', '2018-05-28', 350000, 'dalam antrian', 3),
('O004', 'Jaket Kang Adi', 1, '2018-05-21', '2018-05-28', 350000, 'dalam antrian', 4),
('O005', 'Jaket Kulit', 1, '2018-05-21', '2018-05-28', 350000, 'dalam antrian', 5),
('O006', 'Jeans Dilan', 1, '2018-05-21', '2018-05-28', 285000, 'dalam antrian', 2),
('O007', 'Jeans Milea', 1, '2018-05-21', '2018-05-28', 290000, 'dalam antrian', 3),
('O008', 'Jeans Sobek', 1, '2018-05-21', '2018-05-28', 300000, 'dalam antrian', 4),
('O009', 'Jeans Tentara', 1, '2018-05-21', '2018-05-28', 285000, 'dalam antrian', 5),
('O333', 'Jaket Jaketan', 1, '2018-05-21', '2018-05-29', 350000, 'dalam antrian', 3),
('O888', 'Jaket Jaketan', 1, '2018-05-21', '2018-05-29', 350000, 'dalam antrian', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `prioritas` varchar(30) NOT NULL,
  `birthday` date DEFAULT NULL,
  `ucapan` date NOT NULL,
  `disc_birthday` int(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `transaction_count` int(11) DEFAULT NULL,
  `disc_counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `name`, `prioritas`, `birthday`, `ucapan`, `disc_birthday`, `email`, `transaction_count`, `disc_counter`) VALUES
(1, 'Pelanggan 1', 'Tinggi', '2018-05-22', '2018-05-22', 30000, 'pelanggan1@gmail.com', 12, NULL),
(2, 'Pelanggan 2', 'Tinggi', '2018-05-10', '0000-00-00', 0, 'pelanggan2@gmail.com', 15, NULL),
(3, 'Pelanggan 3', 'Sedang', '2018-05-11', '0000-00-00', 0, 'pelanggan3@gmail.com', 16, NULL),
(4, 'Pelanggan 4', 'Rendah', '2018-05-12', '0000-00-00', 0, 'pelanggan4@gmail.com', 13, NULL),
(5, 'Pelanggan 5', 'Rendah', '2018-05-22', '0000-00-00', 0, 'pelanggan5@gmail.com', 18, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_celana`
--

CREATE TABLE `ukuran_celana` (
  `lingkar_pinggul` int(11) NOT NULL,
  `lingkar_pinggang` int(11) NOT NULL,
  `lingkar_paha` int(11) NOT NULL,
  `panjang_celana` int(11) NOT NULL,
  `lingkar_lutut` int(11) NOT NULL,
  `lingkar_pergelangan_kaki` int(11) NOT NULL,
  `pinggang_celana` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_jaket`
--

CREATE TABLE `ukuran_jaket` (
  `panjang_badan` int(11) NOT NULL,
  `lingkar_dada` int(11) NOT NULL,
  `lingkar_ketak` int(11) NOT NULL,
  `lingkar_tangan` int(11) NOT NULL,
  `lebar_punggung` int(11) NOT NULL,
  `panjang_tangan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `usercol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `usercol`) VALUES
(1, 'habib', 'habib', NULL),
(2, 'rifai', 'rifai', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idpelanggan_idx` (`idpelanggan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `idpelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
