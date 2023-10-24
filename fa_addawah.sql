-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2023 pada 11.49
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fa_addawah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `nisn_siswa` varchar(15) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk_siswa` varchar(3) NOT NULL,
  `tplahir_siswa` varchar(50) NOT NULL,
  `tglahir_siswa` date NOT NULL,
  `alamat_siswa` varchar(200) DEFAULT NULL,
  `ibu_siswa` varchar(50) DEFAULT NULL,
  `ayah_siswa` varchar(50) DEFAULT NULL,
  `tlp_siswa` varchar(15) DEFAULT NULL,
  `email_siswa` varchar(50) DEFAULT NULL,
  `status_siswa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis_siswa`, `nisn_siswa`, `nama_siswa`, `jk_siswa`, `tplahir_siswa`, `tglahir_siswa`, `alamat_siswa`, `ibu_siswa`, `ayah_siswa`, `tlp_siswa`, `email_siswa`, `status_siswa`) VALUES
(1, '20.2732', '0051890141', 'Siti Fadiyah', 'P', 'Jakarta', '2005-01-16', 'Jl.Pondok Randu', 'Maspiyah', 'Sa\'adi', '081319854208', 'fadiyah@gmail.com', 'aktif'),
(2, '20.2705', '0044859288', 'Hani Muhfidah', 'P', 'Jakarta', '2004-09-12', 'Kp. Tanah Tinggi', 'Rustini', 'Engkos Kosasish', '081319854178', 'hani@gmail.com', 'aktif'),
(6, '16.0001', '0032004010', 'Wahid Prayogo', 'L', 'Jogjakarta', '2001-06-05', 'Jl. Kembangan Utara', 'Wartini', 'Mustiko', '082123287245', 'wahid@gmail.com', 'aktif'),
(7, '16.0020', '0030990021', 'Rivansyah', 'L', 'Tangerang', '2001-07-16', 'Kp.Can Tiga Petir', 'Murni', 'Abdul Kodir', '085817547801', 'rivansyah@gmail.com', 'aktif'),
(8, '16.0030', '0030300032', 'Nayla Faizah', 'P', 'Jakarta', '2001-06-20', 'Jl. Raya Duri Kosambi', 'Nayla', 'Firdaus', '082123287245', 'nayla@gmail.com', 'aktif'),
(9, '16.0073', '0034487773', 'Revih Tri', 'L', 'Tangerang', '2000-03-09', 'Jl. Gondrong Petir', 'Yeni', 'Wahyu', '082223758428', 'reviih@gmail.com', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
