-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 04.54
-- Versi server: 10.4.18-MariaDB-log
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat`, `no_telepon`) VALUES
(3, 'mas alfi', 'semarang', '0123456'),
(4, 'al', 'kendal', '2763827632');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun-terbit` varchar(255) NOT NULL,
  `total_buku` int(11) NOT NULL,
  `rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_kategori`, `nama_buku`, `penerbit`, `tahun-terbit`, `total_buku`, `rak`) VALUES
(5, 8, 'Matahari Sudah Dekat', 'Elex Media Komputindo', '2017-10-10', 12, 1),
(6, 13, 'Sejarah Perang Dunia Ke-1', 'Gramedia Pustaka Utama', '2021-11-11', 52, 1),
(7, 12, 'kemajuan teknologi 4.0', 'Elex Media Komputindo', '2021-12-21', 34, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `jenis`) VALUES
(8, 'science'),
(12, 'teknologi'),
(13, 'sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pnjam`
--

CREATE TABLE `pnjam` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `denda` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pnjam`
--

INSERT INTO `pnjam` (`id`, `anggota_id`, `buku_id`, `tanggal_pinjam`, `tanggal_pengembalian`, `denda`) VALUES
(3, 3, 5, '2021-12-11', '2021-12-25', 0),
(4, 4, 6, '2021-12-18', '2021-12-30', 0),
(5, 3, 5, '2021-12-16', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak_buku`
--

CREATE TABLE `rak_buku` (
  `id` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak_buku`
--

INSERT INTO `rak_buku` (`id`, `no_rak`, `nama_rak`, `tempat`) VALUES
(1, 2, 'Rak Sains', 'lantai 2'),
(3, 1, 'mawar', 'lantai 1'),
(4, 3, 'melati', 'lantai 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_induk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `no_induk`, `nama`, `username`, `password`) VALUES
(1, 1234, 'admin', 'admin@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_fk0` (`id_kategori`),
  ADD KEY `buku_fk1` (`rak`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pnjam`
--
ALTER TABLE `pnjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pnjam_fk0` (`anggota_id`),
  ADD KEY `pnjam_fk1` (`buku_id`);

--
-- Indeks untuk tabel `rak_buku`
--
ALTER TABLE `rak_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pnjam`
--
ALTER TABLE `pnjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rak_buku`
--
ALTER TABLE `rak_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_fk0` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id`),
  ADD CONSTRAINT `buku_fk1` FOREIGN KEY (`rak`) REFERENCES `rak_buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `pnjam`
--
ALTER TABLE `pnjam`
  ADD CONSTRAINT `pnjam_fk0` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`),
  ADD CONSTRAINT `pnjam_fk1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
