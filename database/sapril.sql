-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2020 pada 14.11
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapril`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `alamat` text NOT NULL,
  `foto` text DEFAULT NULL,
  `hak_akses` enum('admin','manager','','') NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `email`, `password`, `jk`, `alamat`, `foto`, `hak_akses`, `tanggal_update`) VALUES
(2, 'Sapril', 'sapril', 'saprillah@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'Laki-Laki', 'Sekumpul', 'DSC_0004.JPG', 'manager', '2020-09-10 03:01:17'),
(4, 'Saza Nurhaliza', 'saza', 'nurhalizasaza@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'Perempuan', 'Jl. Monjali ', 'woman.png', 'admin', '2020-09-15 01:44:42'),
(5, 'Onny Maylita', 'onnym', 'onnymaylita@gmail.com', 'b523038a65d51dbf41ef27a1344e95bf7a0a4d34', 'Perempuan', 'Jl. Pandega Marta', 'admin.png', 'admin', '2020-08-29 12:19:00'),
(6, 'baiq nurul', 'baiqnurul', 'baiqazmi@gmail.com', '40ea8f5c5ba881b58185d95739a375fbebd87d8e', '', 'lombok', NULL, 'admin', '2020-09-11 04:06:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `foto_bank` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama`, `bank`, `no_rek`, `foto_bank`, `tanggal_update`) VALUES
(6, 'Aneka', 'BNI', '0254520043', '20191208bni.png', '2020-07-16 15:10:32'),
(8, 'Aneka', 'BRI', '0504 01 000398 56 3', '20200829bri.png', '2020-08-29 13:46:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul_gambar` varchar(150) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_ongkirket` int(11) NOT NULL,
  `kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_ongkirket`, `kabupaten`) VALUES
(1, 2, 'Sleman'),
(2, 2, 'Bantul'),
(3, 2, 'Gunung Kidul'),
(4, 2, 'Kulon Progo'),
(5, 2, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `uraian` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `uraian`, `gambar`, `tanggal_update`) VALUES
(13, 'MANDARIN', 'Kue basah yang ditengahnya dilapis dengan selai nanas', '2020080920200711mandarjin.jpg', '2020-08-09 00:57:57'),
(14, 'TART', 'Kue ulang tahun atau birthday cake dihias dengan berbagai layer dan dekorasi topping', '2020080920200711tartt.jpg', '2020-08-09 00:57:38'),
(15, 'CUPCAKE', 'Kue yang berukuran kecil dilapisi kertas atau bahasa pasaran di Indonesia yakni kue cangkir', '2020080920200711cupcakess.jpg', '2020-08-09 00:57:30'),
(16, 'BOLU', 'Kue yang dibuat dengan cara dipanggang atau dikukus, kedua cara itu sama-sama memiliki rasa yang enak.', '2020080920200711bolu.jpg', '2020-08-09 05:33:01'),
(17, 'BIKA AMBON', 'Kue yang memiliki ciri khas dengan warnanya yang kuning dan memiliki rongga-rongga di bagian dalamnya.', '2020080920200711bikaambon.jpg', '2020-08-09 05:33:48'),
(18, 'LAIN-LAIN', 'Aneka menu lainnya seperti jajanan pasar', '2020080920200714menu lain.jpg', '2020-08-09 05:34:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_web` varchar(40) NOT NULL,
  `nama_instansi` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `pemilik` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `logo` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_web`, `nama_instansi`, `alamat`, `pemilik`, `email`, `logo`, `tanggal_update`) VALUES
(1, 'https://anekaroti.site', 'Roti Aneka', 'JL. Menulis, Sumbersari, Kec. Moyudan, Kab. Sleman, Yogyakarta, 55563', 'Rini Herawati', 'info@rotianeka.com', '20200711anekanota.png', '2020-08-29 13:40:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `gambar_menu` text NOT NULL,
  `views_menu` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `harga_menu`, `deskripsi_menu`, `gambar_menu`, `views_menu`, `terjual`, `tanggal_update`) VALUES
(31, 15, 'Cupcake Paket', 12000, '', '202008092020080920200711cupcakess.jpg', 62, 101, '2020-09-13 12:04:35'),
(32, 17, 'Bika Ambon Panjang', 26500, '', '2020080920200715bika_ambon_panjang.jpg', 24, 0, '2020-09-11 04:31:20'),
(33, 17, 'Bika Ambon Bulat', 37000, '', '2020080920200715bika_ambon_bulat.jpg', 19, 15, '2020-09-10 01:57:12'),
(34, 14, 'Tart Anak', 45000, '', '2020080920200715tart birthday.jpg', 3, 0, '2020-09-10 02:29:08'),
(35, 14, 'Tart Cheese ', 33000, '', '2020080920200715tart.jpeg', 14, 15, '2020-08-31 05:27:56'),
(36, 16, 'Cake Banana', 30000, '', '2020080920200716WhatsApp Image 2020-07-04 at 17.14.42 (5).jpeg', 17, 0, '2020-08-29 14:11:23'),
(37, 16, 'Bolu Batik Pandan', 22500, '', '2020080920200715WhatsApp Image 2020-07-04 at 17.14.42 (7).jpeg', 21, 25, '2020-09-09 23:36:32'),
(38, 16, 'Chiffon Coklat', 30000, '', '20200909rsz_1whatsapp_image_2020-07-04_at_171440_2.jpg', 10, 0, '2020-09-10 02:56:11'),
(39, 13, 'Mandarin', 33000, '', '20200909mndarin.jpg', 17, 15, '2020-09-15 01:51:53'),
(40, 14, 'Tart Dark Chocolate', 45000, '', '202009099a14034ee47e76f55663113785e4fd0b.jpg', 10, 0, '2020-09-11 04:38:31'),
(41, 16, 'Chiffon Keju', 30000, '', '20200909WhatsApp Image 2020-07-04 at 17.14.39 (1).jpeg', 8, 0, '2020-09-10 02:55:56'),
(42, 18, 'Baby Donat', 15000, '<p>Terdiri atas 10 donat dalam satu box, yang memiliki aneka varian toping</p>\r\n', '20200909WhatsApp Image 2020-07-04 at 17.14.42 (9).jpeg', 2, 0, '2020-09-10 02:41:29'),
(43, 18, 'Roti Manis Pisang Coklat', 4500, '', '20200909roti piscok.jpg', 4, 0, '2020-09-10 01:57:39'),
(44, 18, 'Pastel', 2500, '', '20200909rsz_pastel.jpg', 5, 0, '2020-09-10 01:57:36'),
(45, 18, 'Kue Sus', 2500, '<p>Kue sus terbagi atas dua varian rasa, vanilla dan cokelat</p>\r\n', '20200910kue sus.jpg', 4, 0, '2020-09-10 01:57:30'),
(46, 16, 'Roll Rainbow', 31000, '', '20200910WhatsApp Image 2020-07-04 at 17.14.42 (6).jpeg', 6, 0, '2020-09-10 02:27:54'),
(47, 16, 'Lapis Legit', 33000, '', '20200910WhatsApp Image 2020-07-04 at 17.14.42 (3).jpeg', 4, 0, '2020-09-10 02:28:32'),
(48, 16, 'Lapis Legit Besar', 37000, '', '20200910WhatsApp Image 2020-07-04 at 17.14.40.jpeg', 5, 0, '2020-09-10 02:28:13'),
(49, 16, 'Cake Tape', 31000, '', '20200910rsz_whatsapp_image_2020-07-04_at_171406_2.jpg', 8, 0, '2020-09-10 12:32:54'),
(51, 18, 'Snack Dus Paket A', 5000, '<p>Snack dus cocok untuk acara kampus, seminar dll. Terdiri atas 3 macam isian</p>\r\n', '20200910rsz_snack_dus.jpg', 4, 20, '2020-09-10 02:47:02'),
(52, 18, 'Snack Dus Paket B', 10000, '<p>Snack dus cocok untuk acara kampus, seminar dll. Terdiri atas 6&nbsp;macam isian</p>\r\n', '20200910rsz_snack_dus.jpg', 7, 50, '2020-09-11 04:13:24'),
(53, 18, 'pastell', 3000, '', '20200911pastel.jpg', 0, 0, '2020-09-11 04:02:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pesanan`, `id_pelanggan`, `status`) VALUES
(3, 3, 7, 1),
(5, 5, 7, 1),
(6, 6, 7, 1),
(7, 7, 15, 1),
(8, 8, 16, 1),
(9, 9, 17, 1),
(10, 10, 20, 1),
(11, 11, 17, 0),
(12, 14, 26, 0),
(13, 16, 26, 0),
(14, 22, 15, 0),
(15, 23, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_kabupaten`, `kecamatan`, `ongkos_kirim`) VALUES
(1, 2, 'Bambanglipuro', 40000),
(2, 2, 'Banguntapan', 40000),
(3, 2, 'Bantul', 35000),
(4, 2, 'Dlingo', 35000),
(5, 2, 'Imogiri', 25000),
(14, 2, 'Jetis', 39000),
(15, 2, 'Kasihan', 35000),
(16, 2, 'Kretek', 34000),
(17, 2, 'Pajangan', 35000),
(18, 2, 'Pandak', 30000),
(19, 2, 'Piyungan', 36600),
(20, 2, 'Pleret', 35700),
(21, 2, 'Pundong', 40500),
(22, 2, 'Sanden', 36400),
(23, 2, 'Sedayu', 34600),
(24, 2, 'Sewon', 36400),
(25, 2, 'Srandakan', 40600),
(26, 1, 'Berbah', 34000),
(27, 1, 'Cangkringan', 30000),
(28, 1, 'Depok', 29600),
(29, 1, 'Gamping', 30000),
(30, 1, 'Godean', 24700),
(31, 1, 'Kalasan', 29500),
(32, 1, 'Minggir', 23000),
(33, 1, 'Mlati', 20000),
(34, 1, 'Moyudan', 22000),
(35, 1, 'Ngaglik', 25500),
(36, 1, 'Ngemplak', 30500),
(37, 1, 'Pakem', 32000),
(38, 1, 'Prambanan', 40000),
(39, 1, 'Seyegan', 24700),
(40, 1, 'Sleman', 27800),
(41, 1, 'Tempel', 40000),
(42, 1, 'Turi', 34400),
(43, 3, 'Gedangsari', 50000),
(44, 3, 'Girisubo', 47700),
(45, 3, 'Karangmojo', 43600),
(46, 3, 'Ngawen', 45600),
(47, 3, 'Nglipar', 52300),
(48, 3, 'Paliyan', 41200),
(49, 3, 'Panggang', 39000),
(50, 3, 'Patuk', 44800),
(51, 3, 'Playen', 45000),
(52, 3, 'Ponjong', 37600),
(53, 3, 'Purwosari', 45100),
(54, 3, 'Rongkop', 39800),
(55, 3, 'Saptosari', 45600),
(56, 3, 'Semanu', 41900),
(57, 3, 'Semin', 37400),
(58, 3, 'Tanjungsari', 45230),
(59, 3, 'Tepus', 36500),
(60, 3, 'Wonosari', 39000),
(61, 4, ' Galur', 34900),
(62, 4, 'Girimulyo', 37200),
(63, 4, 'Kalibawang', 31500),
(64, 4, 'Kokap', 29800),
(65, 4, 'Lendah', 38000),
(66, 4, 'Nanggulan', 23600),
(67, 4, 'Panjatan', 34600),
(68, 4, 'Pengasih', 29000),
(69, 4, 'Samigaluh', 32500),
(70, 4, 'Sentolo', 33400),
(71, 4, 'Temon', 34700),
(72, 4, 'Wates', 39000),
(73, 5, 'Danurejan', 34400),
(74, 5, 'Gedongtengen', 37000),
(75, 5, 'Gondokusuman', 36500),
(76, 5, 'Gondomanan', 29500),
(77, 5, 'Jetis', 31000),
(78, 5, 'Kotagede', 39000),
(79, 5, 'Kraton', 29000),
(80, 5, 'Mantrijeron', 30400),
(81, 5, 'Mergangsan', 29600),
(82, 5, 'Ngampilan', 34200),
(83, 5, 'Pakualaman', 30000),
(84, 5, 'Tegalrejo', 29800),
(85, 5, 'Umbulharjo', 31400),
(86, 5, 'Wirobrajan', 32000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkirket`
--

CREATE TABLE `ongkirket` (
  `id_ongkirket` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkirket`
--

INSERT INTO `ongkirket` (`id_ongkirket`, `keterangan`, `tanggal_update`) VALUES
(1, 'Diambil', '2020-08-12 01:30:10'),
(2, 'Diantar', '2020-08-12 01:30:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('0','1','','') NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `email`, `password`, `telepon`, `alamat`, `foto`, `token`, `aktif`, `tanggal_update`) VALUES
(7, 'saprillah', 'saprillah', 'saprilshake@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '082292492', 'Jl. Plemburan No.2, Kec. Ngaglik', '', '22fb0dc3397dcdedd4a3569a9c6e0612e18637981de122e57ca09b29ea6d2ccd', '1', '2020-09-15 01:20:33'),
(15, 'indah febrina ', 'indahfeb', 'jejeturtle5@gmail.com', 'b1760bd722b751e71da10c7e9d571a817812dc49', '082189003811', 'Jl. Gabus Ii No. 6, Ngaglik', '', '2ee1928778b2306c222a731a83f74b089be79362802694aed6ed252efcf0ddc1', '1', '2020-09-09 14:38:53'),
(16, 'Suryo Amin', 'suryoamin', 'aminsuryo20@gmail.com', 'b1760bd722b751e71da10c7e9d571a817812dc49', '082385027444', 'Jl. Imogiri Barat Km.5, Tanjung, Sewon', '', '2ee1928778b2306c222a731a83f74b089be79362802694aed6ed252efcf0ddc1', '1', '2020-09-09 14:48:58'),
(17, 'Tedi Azhari Erland', 'tediazer', 'fitriantotedi@gmail.com', 'b1760bd722b751e71da10c7e9d571a817812dc49', '089668482857', 'Jl. Sewu Galur Pedukuhan XII, Galur', '', '2ee1928778b2306c222a731a83f74b089be79362802694aed6ed252efcf0ddc1', '1', '2020-09-09 14:53:42'),
(18, 'Agus Cahya Panutun', 'aguscapa', 'riyansyahpanuntun@gmail.com', 'b1760bd722b751e71da10c7e9d571a817812dc49', '081345822887', 'Jl. TImoho No. 3, Umbulharjo', '', '2ee1928778b2306c222a731a83f74b089be79362802694aed6ed252efcf0ddc1', '1', '2020-09-09 15:04:25'),
(19, 'Pablos Cobar', 'pabloscobar', 'cobarp99@gmail.com', '884e707995ebe4423f5c987690175195eb420483', '082221230665', 'Yogyakarta', '', '5d1a165816e2d46679c71cfcce13c9d90bf4b735269731bdb058effb0dc35ecc', '1', '2020-09-10 11:53:49'),
(20, 'Wawan Apri', 'wawanaja', 'wawantester@gmail.com', 'da19b333fdd6b66023d385fadc0525f6143fc5ce', '081217893030', 'Yogyakarta', '20200910Revisi Pendadaran (1).pdf', '5d1a165816e2d46679c71cfcce13c9d90bf4b735269731bdb058effb0dc35ecc', '1', '2020-09-10 12:34:15'),
(21, 'asdqwewqeqwe', 'aaaaaaaa', 'tilmonipsi@enayu.com', '5cec175b165e3d5e62c9e13ce848ef6feac81bff', 'qweqweqweqwe', 'asdasdasdasdasd', '', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:03:16'),
(22, 'keydinirde@enayu.com', 'keydinirde@enayu.com', 'keydinirde@enayu.com', '5cec175b165e3d5e62c9e13ce848ef6feac81bff', 'Harus Angka', 'keydinirde@enayu.com', '', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:03:16'),
(23, 'zilmokikku@enayu.com', 'zilmokikku@enayu.com', 'zilmokikku@enayu.com', 'e0a08184274cebba1f9960d54cd49748772419fd', '', 'zilmokikku@enayu.com', '20200911semantic.json', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:23:05'),
(24, 'APEPEPEPEP', 'pendekarCinta', 'pertamapetra@gmail.com', 'aa0b8d80e49aaaa75f86b166325a66e1014a5933', 'Harus Angka', 'PEasdasdasdasd', '', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:03:48'),
(25, 'Qwertyui', 'Qwertyui', 'wertyui@kfif.com', '7c222fb2927d828af22f592134e8932480637c0d', '586868', 'Hxuxjx', '', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:03:16'),
(26, 'salsabila vera', 'salsabila', 'saprillah02@gmail.com', 'b523038a65d51dbf41ef27a1344e95bf7a0a4d34', '082929492665', 'jakal, ngaglik', '', '875c42935d5ecbe0fcfd323cd01a1cd090f633615c79027099f1bfa6c3074596', '1', '2020-09-11 04:08:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  `tanggal_verifikasi` datetime NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keperluan` enum('DP','Pelunasan','Pembayaran Ulang DP','Pembayaran Ulang Pelunasan') NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `id_pelanggan`, `tanggal_konfirmasi`, `tanggal_verifikasi`, `tanggal_bayar`, `atas_nama`, `bank`, `jumlah`, `keperluan`, `bukti`) VALUES
(4, 3, 7, '2020-08-21 14:15:11', '2020-08-21 14:17:39', '0000-00-00', 'saprillah', 'Bank Rakyat Indonesi', 578750, 'DP', ''),
(5, 3, 7, '2020-08-21 14:17:13', '2020-08-21 14:17:39', '2020-08-22', 'saprillah', 'Bank Rakyat Indonesi', 578750, 'Pelunasan', ''),
(8, 5, 7, '2020-08-29 13:57:18', '2020-08-29 13:58:36', '0000-00-00', 'saprillah', 'Bank Negara Indonesi', 498750, 'DP', ''),
(9, 5, 7, '2020-08-29 13:58:22', '2020-08-29 13:58:36', '2020-08-31', 'saprillah', 'Bank Rakyat Indonesi', 498750, 'Pelunasan', ''),
(10, 6, 7, '2020-08-29 14:30:53', '2020-08-29 14:41:04', '0000-00-00', 'saprillah', 'Bank Negara Indonesi', 237750, 'DP', ''),
(11, 7, 15, '2020-09-10 02:46:27', '2020-09-10 02:47:02', '0000-00-00', 'indah febrina ', 'Bank Central Asia', 312750, 'DP', ''),
(12, 7, 15, '2020-09-10 02:46:52', '2020-09-10 02:47:02', '2020-09-11', 'indah febrina ', 'Bank Central Asia', 312750, 'Pelunasan', ''),
(13, 8, 16, '2020-09-10 02:51:14', '2020-09-10 02:51:32', '0000-00-00', 'Suryo Amin', 'Bank Negara Indonesi', 1420700, 'DP', ''),
(14, 9, 17, '2020-09-10 02:57:41', '2020-09-10 02:57:53', '0000-00-00', 'Tedi Azhari Erland', 'Bank Mandiri', 467450, 'DP', ''),
(15, 10, 20, '2020-09-10 12:00:54', '0000-00-00 00:00:00', '0000-00-00', 'Wawan Apri', 'Bank Rakyat Indonesi', 1840750, 'DP', ''),
(16, 11, 17, '2020-09-11 03:57:12', '2020-09-11 03:59:08', '0000-00-00', 'Tedi Azhari Erland', 'Bank Negara Indonesi', 137450, 'DP', ''),
(17, 11, 17, '2020-09-11 03:58:47', '2020-09-11 03:59:08', '2020-09-14', 'Tedi Azhari Erland', 'Bank Negara Indonesi', 137450, 'Pelunasan', ''),
(18, 16, 26, '2020-09-11 04:14:21', '2020-09-11 04:15:59', '0000-00-00', 'salsabila vera', 'Bank Rakyat Indonesi', 112750, 'DP', ''),
(19, 13, 23, '2020-09-11 04:15:44', '0000-00-00 00:00:00', '0000-00-00', 'zilmokikku@enayu.com', 'Bank CIMB Niaga', 0, 'DP', ''),
(20, 12, 23, '2020-09-11 04:17:19', '0000-00-00 00:00:00', '0000-00-00', 'zilmokikku@enayu.com', 'Bank Negara Indonesi', 0, 'DP', ''),
(21, 15, 23, '2020-09-11 04:29:53', '0000-00-00 00:00:00', '0000-00-00', 'SELECT * FROM pesanan_detail; DROP TABLE', 'Bank Mandiri', 346500, 'DP', ''),
(22, 21, 23, '2020-09-11 04:42:16', '0000-00-00 00:00:00', '0000-00-00', '31; DROP TABLE ongkirket;', 'Bank Mandiri', 523500, 'DP', ''),
(23, 22, 15, '2020-09-13 12:05:38', '0000-00-00 00:00:00', '0000-00-00', 'indah febrina ', 'Bank Mandiri', 102750, 'DP', ''),
(26, 23, 7, '2020-09-15 03:43:37', '2020-09-15 03:51:53', '2020-09-15', 'saprillah', 'Bank Negara Indonesi', 264950, 'DP', '6144013_40f87e77-55ec-4487-bd12-eaa44ee51efb_1080_1080 (1).jpg'),
(27, 23, 7, '2020-09-15 03:51:38', '2020-09-15 03:51:53', '2020-09-17', 'saprillah', 'Bank Negara Indonesi', 264950, 'Pelunasan', '10801072_img-20200724-wa0012_768x1024.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkirket` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `deadline_dp` datetime NOT NULL,
  `deadline_lunas` datetime NOT NULL,
  `tanggal_pengiriman` datetime NOT NULL,
  `jam_pengiriman` time NOT NULL,
  `tgl_konfirmasi_pesanan` datetime NOT NULL,
  `status_pesanan` varchar(32) NOT NULL,
  `status_pembayaran` text NOT NULL,
  `alasan_tolak` text DEFAULT NULL,
  `dp` int(11) DEFAULT NULL,
  `lunas` int(11) DEFAULT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_ongkir` int(11) DEFAULT NULL,
  `total_pesanan` int(11) NOT NULL,
  `nama_penerima` varchar(40) NOT NULL,
  `telepon_penerima` varchar(14) NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_ongkirket`, `tanggal_pesanan`, `deadline_dp`, `deadline_lunas`, `tanggal_pengiriman`, `jam_pengiriman`, `tgl_konfirmasi_pesanan`, `status_pesanan`, `status_pembayaran`, `alasan_tolak`, `dp`, `lunas`, `total_belanja`, `total_ongkir`, `total_pesanan`, `nama_penerima`, `telepon_penerima`, `alamat_penerima`) VALUES
(3, 7, 2, '2020-08-21 19:13:37', '2020-08-22 19:13:37', '2020-08-22 01:01:01', '2020-08-23 01:01:01', '09:30:00', '2020-08-23 03:02:26', 'Selesai', 'Diterima', NULL, 578750, 578750, 1117500, 40000, 1157500, 'saprillah', '082292492', 'Jl. Plemburan No.2'),
(4, 7, 2, '2020-08-27 16:25:03', '2020-08-28 16:25:03', '2020-08-30 01:01:01', '2020-08-31 01:01:01', '09:00:00', '2020-08-29 12:21:22', 'Selesai', 'Diterima', NULL, 267500, 267500, 495000, 40000, 535000, 'saprillah', '082292492', 'Jl. Plemburan No.2'),
(5, 7, 2, '2020-08-29 19:40:26', '2020-08-30 19:40:26', '2020-08-31 01:01:01', '2020-09-01 01:01:01', '15:30:00', '2020-08-29 13:59:00', 'Selesai', 'Diterima', NULL, 498750, 498750, 972000, 25500, 997500, 'saprillah', '082292492', 'Jl. Plemburan No.2'),
(6, 7, 2, '2020-08-29 21:13:52', '2020-08-30 21:13:52', '2020-08-30 01:01:01', '2020-08-31 01:01:01', '14:00:00', '0000-00-00 00:00:00', 'Menunggu Pelunasan', 'Menunggu Pelunasan', NULL, 237750, 237750, 450000, 25500, 475500, 'saprillah', '082292492', 'Jl. Plemburan No.2, Kec. Ngaglik'),
(7, 15, 2, '2020-09-10 09:45:32', '2020-09-11 09:45:32', '2020-09-11 01:01:01', '2020-09-12 01:01:01', '08:30:00', '2020-09-10 02:47:45', 'Selesai', 'Diterima', NULL, 312750, 312750, 600000, 25500, 625500, 'indah febrina ', '082189003811', 'Jl. Gabus Ii No. 6, Ngaglik'),
(8, 16, 2, '2020-09-10 09:51:03', '2020-09-11 09:51:03', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '15:00:00', '0000-00-00 00:00:00', 'Menunggu Pelunasan', 'Menunggu Pelunasan', NULL, 1420700, 1420700, 2805000, 36400, 2841400, 'Suryo Amin', '082385027444', 'Jl. Imogiri Barat Km.5, Tanjung, Sewon'),
(9, 17, 2, '2020-09-10 09:56:51', '2020-09-11 09:56:51', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '14:30:00', '0000-00-00 00:00:00', 'Menunggu Pelunasan', 'Menunggu Pelunasan', NULL, 467450, 467450, 900000, 34900, 934900, 'Tedi Azhari Erland', '089668482857', 'Jl. Sewu Galur Pedukuhan XII, Galur'),
(10, 20, 2, '2020-09-10 18:59:27', '2020-09-11 18:59:27', '2020-09-11 01:01:01', '2020-09-12 01:01:01', '17:00:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 1840750, 1840750, 3645000, 36500, 3681500, 'Wawan Apri', '081217893030', 'Yogyakarta'),
(11, 17, 2, '2020-09-11 10:56:45', '2020-09-12 10:56:45', '2020-09-14 01:01:01', '2020-09-15 01:01:01', '09:30:00', '2020-09-11 04:00:19', 'Selesai', 'Diterima', NULL, 137450, 137450, 240000, 34900, 274900, 'Tedi Azhari Erland', '089668482857', 'Jl. Sewu Galur Pedukuhan XII, Galur'),
(12, 23, 1, '2020-09-11 11:07:35', '2020-09-12 11:07:35', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '14:22:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 0, 0, 0, 0, 0, 'zilmokikku@enayu.com', '12312312312312', 'zilmokikku@enayu.com'),
(13, 23, 1, '2020-09-11 11:08:39', '2020-09-12 11:08:39', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '23:12:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 0, 0, 0, 0, 0, 'zilmokikku@enayu.com', '12312312312312', 'zilmokikku@enayu.com'),
(14, 26, 2, '2020-09-11 11:10:35', '2020-09-12 11:10:35', '2020-09-15 01:01:01', '2020-09-16 01:01:01', '10:00:00', '0000-00-00 00:00:00', 'Belum Bayar', 'Belum Bayar', NULL, 260250, 260250, 495000, 25500, 520500, 'salsabila vera', '082929492665', 'jakal, ngaglik'),
(15, 23, 1, '2020-09-11 11:11:24', '2020-09-12 11:11:24', '2020-09-18 01:01:01', '2020-09-19 01:01:01', '14:22:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 346500, 346500, 693000, 0, 693000, 'zilmokikku@enayu.com', '21312312333', 'zilmokikku@enayu.com'),
(16, 26, 2, '2020-09-11 11:13:49', '2020-09-12 11:13:49', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '11:11:00', '0000-00-00 00:00:00', 'Menunggu Pelunasan', 'Menunggu Pelunasan', NULL, 112750, 112750, 200000, 25500, 225500, 'salsabila vera', '082929492665', 'jakal, ngaglik'),
(17, 23, 1, '2020-09-11 11:15:03', '2020-09-12 11:15:03', '2020-09-18 01:01:01', '2020-09-19 01:01:01', '14:22:00', '0000-00-00 00:00:00', 'Belum Bayar', 'Belum Bayar', NULL, 346500, 346500, 693000, 0, 693000, 'zilmokikku@enayu.com', '21312312333', 'zilmokikku@enayu.com'),
(18, 23, 1, '2020-09-11 11:37:34', '2020-09-12 11:37:34', '2020-09-18 01:01:01', '2020-09-19 01:01:01', '21:09:00', '0000-00-00 00:00:00', 'Belum Bayar', 'Belum Bayar', NULL, 186000, 186000, 372000, 0, 372000, '31; DROP TABLE pesanan_detail', '324234234234', '31; DROP TABLE pesanan_detail'),
(20, 23, 1, '2020-09-11 11:40:19', '2020-09-12 11:40:19', '2020-09-18 01:01:01', '2020-09-19 01:01:01', '12:12:00', '0000-00-00 00:00:00', 'Belum Bayar', 'Belum Bayar', NULL, 523500, 523500, 1047000, 0, 1047000, 'zilmokikku@enayu.com', '123123123123', '31; DROP TABLE ongkirket'),
(21, 23, 2, '2020-09-11 11:41:27', '2020-09-12 11:41:27', '2020-09-12 01:01:01', '2020-09-13 01:01:01', '14:22:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 523500, 523500, 1047000, 0, 1047000, 'zilmokikku@enayu.com', '08123456782', '31; DROP TABLE ongkirket'),
(22, 15, 2, '2020-09-13 19:05:26', '2020-09-14 19:05:26', '2020-09-14 01:01:01', '2020-09-15 01:01:01', '10:00:00', '0000-00-00 00:00:00', 'Menunggu Konfirmasi', 'Menunggu Konfirmasi', NULL, 102750, 102750, 180000, 25500, 205500, 'indah febrina ', '082189003811', 'Jl. Gabus Ii No. 6, Ngaglik'),
(23, 7, 2, '2020-09-15 08:25:21', '2020-09-16 08:25:21', '2020-09-17 01:01:01', '2020-09-18 01:01:01', '12:00:00', '2020-09-15 03:52:00', 'Selesai', 'Diterima', NULL, 264950, 264950, 495000, 34900, 529900, 'saprillah', '082292492', 'Jl. Plemburan No.2, Kec. Ngaglik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_pesanan_detail` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `subharga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_pesanan_detail`, `id_pesanan`, `id_pelanggan`, `id_menu`, `nama_menu`, `harga_menu`, `jumlah_menu`, `subharga_menu`) VALUES
(4, 3, 7, 37, 'Bolu Batik Pandan', 22500, 25, 562500),
(5, 3, 7, 33, 'Bika Ambon Bulat', 37000, 15, 555000),
(6, 4, 7, 35, 'Tart Cheese ', 33000, 15, 495000),
(7, 5, 7, 31, 'Cupcake Paket', 12000, 81, 972000),
(8, 6, 7, 36, 'Cake Banana', 30000, 15, 450000),
(9, 7, 15, 52, 'Snack Dus Paket B', 10000, 50, 500000),
(10, 7, 15, 51, 'Snack Dus Paket A', 5000, 20, 100000),
(11, 8, 16, 39, 'Mandarin', 33000, 85, 2805000),
(12, 9, 17, 41, 'Chiffon Keju', 30000, 15, 450000),
(13, 9, 17, 38, 'Chiffon Coklat', 30000, 15, 450000),
(14, 10, 20, 40, 'Tart Dark Chocolate', 45000, 81, 3645000),
(15, 11, 17, 31, 'Cupcake Paket', 12000, 20, 240000),
(18, 14, 26, 39, 'Mandarin', 33000, 15, 495000),
(20, 16, 26, 52, 'Snack Dus Paket B', 10000, 20, 200000),
(25, 22, 15, 31, 'Cupcake Paket', 12000, 15, 180000),
(26, 23, 7, 39, 'Mandarin', 33000, 15, 495000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_pesanan`, `id_pelanggan`, `testimoni`) VALUES
(1, 3, 7, 'Alhamdulillah, pesanannya sesuai, rasanya pun juga enak dan dijamin higienis'),
(2, 11, 17, 'Sangat berkualitas '),
(3, 7, 15, 'alhamdulillah, makanannya higienis serta murah-murah, lezatt juga bun');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `ongkirket`
--
ALTER TABLE `ongkirket`
  ADD PRIMARY KEY (`id_ongkirket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkirket` (`id_ongkirket`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `ongkirket`
--
ALTER TABLE `ongkirket`
  MODIFY `id_ongkirket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_ongkirket`) REFERENCES `ongkirket` (`id_ongkirket`);

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pesanan_detail_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testimoni_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
