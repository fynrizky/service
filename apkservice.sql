-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2020 pada 13.27
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apkservice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datservice`
--

CREATE TABLE `datservice` (
  `id_data_service` int(11) NOT NULL,
  `kode_service` varchar(15) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` varchar(30) NOT NULL,
  `harga_part` int(15) NOT NULL,
  `total_pembayaran` int(15) NOT NULL,
  `status_service` varchar(20) NOT NULL,
  `tgl_service` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datservice`
--

INSERT INTO `datservice` (`id_data_service`, `kode_service`, `id_pelanggan`, `id_mesin`, `id_teknisi`, `id_part`, `nama_part`, `harga_part`, `total_pembayaran`, `status_service`, `tgl_service`) VALUES
(1, 'SV221', 2, 2, 1, 0, 'tidak ada', 0, 125000, 'menunggu', '2020-07-20'),
(2, 'SV112', 1, 1, 2, 3, 'part 3', 155000, 330000, 'selesai', '2020-07-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_mesin` varchar(30) NOT NULL,
  `type_mesin` varchar(20) NOT NULL,
  `tgl_penerimaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `id_pelanggan`, `nama_mesin`, `type_mesin`, `tgl_penerimaan`) VALUES
(1, 1, 'mesin 1', 'type a', '2020-07-20'),
(2, 2, 'mesin 2', 'type b', '2020-07-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part`
--

CREATE TABLE `part` (
  `id_part` int(11) NOT NULL,
  `nama_part` varchar(30) NOT NULL,
  `type_part` varchar(20) NOT NULL,
  `harga_part` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `part`
--

INSERT INTO `part` (`id_part`, `nama_part`, `type_part`, `harga_part`) VALUES
(1, 'part 1', 'type 1', 225000),
(2, 'part 2', 'type 2', 150000),
(3, 'part 3', 'type 3', 155000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telp_pelanggan`) VALUES
(1, 'apri suandi', 'penjaringan', 'suandi@gmail.com', '087772727288'),
(2, 'hafiz', 'tanah merah', 'hafiz@gmail.com', '087383832333'),
(3, 'ucup', 'pluit', 'ucup123@gmail.com', '087827272222'),
(4, 'muhafid', 'telukgong', 'apid12@gmail.com', '087772737321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_data_service` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_data_service`, `status_pembayaran`, `tgl_pembayaran`) VALUES
(1, 2, 1, 'lunas', '2020-07-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `nama_teknisi` varchar(30) NOT NULL,
  `email_teknisi` varchar(255) NOT NULL,
  `telp_teknisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`, `email_teknisi`, `telp_teknisi`) VALUES
(1, 'fiyannur', 'rizky12plo@gmail.com', '087772890325'),
(2, 'dedi', 'dedi90@gmail.com', '087772456221');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$5CCZIOyZz1QuW30fh0YXD.nr6x89zAZw1Ajjkz3IhmYsi6rGYI47K', 1),
(2, 'teknisi', '$2y$10$Ya2T2jP/0G11ndqgVJqWpeI/zamuBba/47S.djg.LZPCT53OhCtEm', 2),
(3, 'pimpinan', '$2y$10$WwLT16/sxjYRW2MkrdxRT.FRTKtiPzUjYr3ccj5.C66BQJHlbYgY6', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datservice`
--
ALTER TABLE `datservice`
  ADD PRIMARY KEY (`id_data_service`);

--
-- Indeks untuk tabel `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indeks untuk tabel `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id_part`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datservice`
--
ALTER TABLE `datservice`
  MODIFY `id_data_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `part`
--
ALTER TABLE `part`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
