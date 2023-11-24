-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2023 pada 18.02
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(2, 'BR002', 5, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '20', '6 October 2020, 0:41', '6 October 2020, 0:54'),
(3, 'BR003', 1, 'Pulpen', 'Standard', '1500', '2000', 'PCS', '70', '6 October 2020, 1:34', NULL),
(4, 'BR004', 7, 'FANTA', 'NESTLE', '4000', '5000', 'PCS', '25', '22 November 2023, 10:44', NULL),
(5, 'BR005', 6, 'TARO', 'INDOFOOD', '2000', '3000', 'PCS', '45', '22 November 2023, 10:45', NULL),
(6, 'BR006', 5, 'Lifebouy Mint', 'Uniliver', '2000', '2500', 'PCS', '28', '22 November 2023, 14:40', NULL),
(7, 'BR007', 5, 'Lux Rose', 'Uniliver', '2000', '2500', 'PCS', '30', '22 November 2023, 14:42', NULL),
(8, 'BR008', 5, 'Shinzui Putih', 'Jepang', '3000', '4000', 'PCS', '40', '22 November 2023, 14:43', NULL),
(9, 'BR009', 9, 'Makarizo Hair Spray', 'Makarizo', '20000', '23500', 'PCS', '25', '22 November 2023, 14:43', NULL),
(10, 'BR010', 9, 'Nivea Men Cool Kick', 'Nivea', '25000', '27000', 'PCS', '40', '22 November 2023, 14:44', NULL),
(11, 'BR011', 1, 'Buku AA 60Lbr', 'AA', '9000', '10000', 'PCS', '50', '22 November 2023, 17:34', '23 November 2023, 22:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20'),
(9, 'Kosmetik', '22 November 2023, 10:47'),
(10, 'Underwear', '23 November 2023, 22:40'),
(11, 'Obat-obatan', '23 November 2023, 22:41'),
(12, 'Peralatan Dapur', '23 November 2023, 22:41'),
(13, 'Peralatan Bayi', '23 November 2023, 22:42'),
(14, 'Tools', '23 November 2023, 22:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `role_id` enum('1','2','3') NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `role_id`, `user`, `pass`, `is_active`, `id_member`) VALUES
(1, '1', 'admin', '202cb962ac59075b964b07152d234b70', '1', 1),
(2, '2', 'kasir', '202cb962ac59075b964b07152d234b70', '1', 2),
(5, '3', 'apit', 'c5d2ce527f3ce5477dfb27304200ba27', '1', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `id_login`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 1, 'Ishlahul Lana Putri', 'Geudong', '081263638585', 'ishlahullana@gmail.com', '1700641688putri.jpeg', '20175020011'),
(2, 2, 'Atharzaka', 'Peusnagan Siblah Krueng', '081263132787', 'armstrongaceh@gmail.com', '1700753882IMG_20211208_195141_990.jpg', '1111150303980001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(1, 'BR001', 1, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(2, 'BR001', 1, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(3, 'BR001', 1, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(4, 'BR001', 1, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(5, 'BR001', 1, '2', '6000', '6 October 2020, 0:49', '10-2020'),
(6, 'BR001', 1, '2', '6000', '6 October 2020, 0:49', '10-2020'),
(7, 'BR001', 1, '2', '6000', '6 October 2020, 1:15', '10-2020'),
(8, 'BR002', 1, '2', '6000', '6 October 2020, 1:17', '10-2020'),
(9, 'BR001', 1, '2', '6000', '6 October 2020, 1:20', '10-2020'),
(10, 'BR001', 1, '2', '6000', '6 October 2020, 1:51', '11-2023'),
(11, 'BR006', 1, '1', '2500', '22 November 2023, 14:41', '11-2023'),
(12, 'BR001', 1, '2', '6000', '6 October 2020, 1:51', '11-2023'),
(13, 'BR006', 1, '1', '2500', '22 November 2023, 14:41', '11-2023'),
(14, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023'),
(15, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023'),
(16, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023'),
(17, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023'),
(18, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023'),
(19, 'BR002', 0, '3', '9000', '23 November 2023, 23:04', '11-2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`) VALUES
(25, 'BR002', 0, '3', '9000', '23 November 2023, 23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV HUSADA NIAGA', 'BIREUEN', '0811677068', 'HUSNI M.NOER');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
