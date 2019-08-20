-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2019 pada 09.11
-- Versi server: 10.1.29-MariaDB
-- Versi PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesan_tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` varchar(10) NOT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `nama_kereta`, `kelas`) VALUES
('ADP-A', 'ARGO DWIPANGGA', 'Eksekutif'),
('AGL-A', 'ARGO LAWU', 'Eksekutif'),
('AGW-A', 'ARGO WILIS', 'Eksekutif'),
('BM-A', 'BIMA', 'Eksekutif'),
('GJN-A', 'GAJAYANA', 'Eksekutif'),
('LDY-B', 'LODAYA', 'Bisnis'),
('MLB-A', 'MALABAR', 'Eksekutif'),
('MLB-B', 'MALABAR', 'Bisnis'),
('MLB-C', 'MALABAR', 'Ekonomi'),
('MLE-A', 'MALIOBORO EKSPRES', 'Eksekutif'),
('MLE-C', 'MALIOBORO EKSPRES', 'Ekonomi'),
('MTS-A', 'MUTIARA SELATAN', 'Eksekutif'),
('PRM-C', 'PRAMEKS', 'Ekonomi'),
('SNC-A', 'SANCAKA', 'Eksekutif'),
('SNC-C', 'SANCAKA', 'Ekonomi'),
('TRG-A', 'TURANGGA', 'Eksekutif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `memesan`
--

CREATE TABLE `memesan` (
  `id_memesan` int(10) NOT NULL,
  `id_pemesan` int(10) NOT NULL,
  `id_tiket` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `memesan`
--

INSERT INTO `memesan` (`id_memesan`, `id_pemesan`, `id_tiket`, `jumlah`, `status`) VALUES
(54, 52, 'YS0C', 1, 'Not Verified'),
(55, 53, 'YS0C', 1, 'Not Verified'),
(68, 66, 'SS0A', 1, 'Not Verified'),
(69, 67, 'SS0C', 1, 'Not Verified'),
(70, 67, 'SS0C', 1, 'Not Verified'),
(71, 67, 'SB0A', 1, 'Not Verified'),
(72, 68, 'ABC123', 1, 'Not Verified'),
(73, 68, 'ABC123', 1, 'Not Verified'),
(74, 68, 'ABC123', 1, 'Verified'),
(75, 69, 'MLB102', 1, 'Verified'),
(76, 70, 'MLB102', 1, 'Verified');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `NIK` int(30) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `nama`, `NIK`, `total_bayar`, `gambar`) VALUES
(52, 'Wahid Fathul Rizki', 2147483647, 0, '52-blue-moon-march-2018jpg-c587711153df3d88.jpg'),
(53, 'Wahid ', 2147483647, 8000, '53-blue-moon-march-2018jpg-c587711153df3d88.jpg'),
(63, 'wedadsd', 2147483647, 8000, ''),
(64, 'wedadsd', 1231, 8000, ''),
(65, 'Wahid Fathul Rizki', 2147483647, 8000, ''),
(66, 'Wahid Fathul Rizki', 1231, 350000, '66-blue-moon-march-2018jpg-c587711153df3d88.jpg'),
(67, 'Wahid Fathul Rizki', 2147483647, 670000, '67-blue-moon-march-2018jpg-c587711153df3d88.jpg'),
(68, 'Wahid Fathul Rizki', 123, 60, ''),
(69, 'wads', 0, 125000, '69-760447.jpg'),
(70, 'wahidaa', 0, 125000, '70-760447.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` varchar(10) NOT NULL,
  `asal_setasiun` varchar(30) NOT NULL,
  `tujuan_setasiun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `asal_setasiun`, `tujuan_setasiun`) VALUES
('BDSLO', 'Bandung (BD)', 'Solo Balapan (SLO)'),
('GMRSLO', 'Jakarta Gambir (GMR)', 'Solo Balapan (SLO)'),
('MLGSLO', 'Malang (MLG)', 'Solo Balapan (SLO)'),
('SGUSLO', 'Surabaya Gubeng (SGU)', 'Solo Balapan (SLO)'),
('SLOBD', 'Solo Balapan (SLO)', 'Bandung (BD)'),
('SLOGMR', 'Solo Balapan (SLO)', 'Jakarta Gambir (GMR)'),
('SLOMLG', 'Solo Balapan (SLO)', 'Malang (MLG)'),
('SLOSGU', 'Solo Balapan (SLO)', 'Surabaya Gubeng (SGU)'),
('SLOSM', 'Solo Balapan (SLO)', 'Semarang (SM)'),
('SLOYGY', 'Solo Balapan (SLO)', 'Yogyakarta Tugu (YK)'),
('YGYSLO', 'Yogyakarta Tugu (YK)', 'Solo Balapan (SLO)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(10) NOT NULL,
  `id_rute` varchar(10) NOT NULL,
  `id_kereta` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_rute`, `id_kereta`, `jam`, `tanggal`, `stok`, `harga`) VALUES
('ABC123', 'BDSLO', 'ADP-A', '23:04:00', '2019-07-09', 7, '20'),
('JS0A', 'GMRSLO', 'BM-A', '20:58:00', '2018-07-03', 10, '424000'),
('JS1A', 'GMRSLO', 'GJN-A', '19:35:00', '2018-07-04', 10, '435000'),
('JS2A', 'GMRSLO', 'AGL-A', '08:00:00', '2018-07-04', 10, '285000'),
('JS3A', 'GMRSLO', 'ADP-A', '20:00:00', '2018-07-04', 10, '285000'),
('MLB102', 'BDSLO', 'MLB-C', '01:00:00', '2019-08-19', 10, '125000'),
('MS0A', 'MLGSLO', 'MLB-C', '17:00:00', '2018-07-04', 18, '120000'),
('SB0A', 'SLOBD', 'TRG-A', '07:20:00', '2018-07-04', 29, '650000'),
('SJ01A', 'SLOGMR', 'GJN-A', '16:40:00', '2018-07-04', 10, '535000'),
('SJ0A', 'SLOGMR', 'BM-A', '16:30:00', '2018-07-04', 10, '495000'),
('SJ2A', 'SLOGMR', 'AGL-A', '12:00:00', '2018-07-04', 13, '280000'),
('SS0A', 'SGUSLO', 'MTS-A', '10:00:00', '2018-07-04', 3, '350000'),
('SS0C', 'BDSLO', 'GJN-A', '18:09:00', '2018-07-03', 98, '10000'),
('SY0C', 'SLOYGY', 'PRM-C', '07:15:00', '2018-07-04', 1, '8000'),
('YS0C', 'YGYSLO', 'PRM-C', '06:13:00', '2019-07-09', 10, '8000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `Nama`) VALUES
(1, 'admin', 'admin', 'admin1'),
(3, 'wahid', 'wahid', 'Wahid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indeks untuk tabel `memesan`
--
ALTER TABLE `memesan`
  ADD PRIMARY KEY (`id_memesan`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indeks untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_kereta` (`id_kereta`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `memesan`
--
ALTER TABLE `memesan`
  MODIFY `id_memesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `memesan`
--
ALTER TABLE `memesan`
  ADD CONSTRAINT `memesan_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `pemesan` (`id_pemesan`) ON DELETE NO ACTION,
  ADD CONSTRAINT `memesan_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`) ON DELETE NO ACTION,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
