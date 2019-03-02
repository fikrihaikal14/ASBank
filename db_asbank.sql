-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 10:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `pin` int(6) NOT NULL,
  `status` set('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `password`, `pin`, `status`) VALUES
(10160574, 'Dou', '482c811da5d5b4bc6d497ffa98491e38', 333333, 'aktif'),
(10160575, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 111111, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktifitas`
--

CREATE TABLE `tb_aktifitas` (
  `id_aktifis` int(10) NOT NULL,
  `id_admin` varchar(30) DEFAULT NULL,
  `nis` varchar(8) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aktifitas`
--

INSERT INTO `tb_aktifitas` (`id_aktifis`, `id_admin`, `nis`, `keterangan`, `tanggal`) VALUES
(1803190014, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:15:53'),
(1803190015, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:19:37'),
(1803190016, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:20:17'),
(1803190017, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:20:45'),
(1803190018, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:22:58'),
(1803190019, NULL, '10160582', 'User 10160582() Login', '2018-03-19 12:23:58'),
(1803190020, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-03-19 12:25:21'),
(1803190021, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 10.000.000', '2018-03-19 12:31:44'),
(1803190022, NULL, '10160582', '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 10.000', '2018-03-19 12:32:36'),
(1803190023, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 10.000', '2018-03-19 12:36:32'),
(1803190024, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 990.000', '2018-03-19 12:36:53'),
(1803190025, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 100.000', '2018-03-19 12:37:53'),
(1803190026, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 100.000', '2018-03-19 12:47:41'),
(1803190027, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 200.000', '2018-03-19 12:48:11'),
(1803190028, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 200.000', '2018-03-19 12:48:30'),
(1803190029, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 200.000', '2018-03-19 12:49:08'),
(1803190030, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 800.000', '2018-03-19 12:50:49'),
(1803190031, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 9.000.000', '2018-03-19 12:51:07'),
(1803190032, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-03-19 13:34:58'),
(1803200033, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-03-20 16:52:54'),
(1803200034, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-03-20 16:53:47'),
(1804010035, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-01 20:54:08'),
(1804010036, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:29:11'),
(1804010037, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:29:43'),
(1804010038, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:30:55'),
(1804010039, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:31:21'),
(1804010040, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:32:08'),
(1804010041, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:32:20'),
(1804010042, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:37:16'),
(1804010043, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:38:42'),
(1804010044, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:39:01'),
(1804010045, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:40:17'),
(1804010046, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:40:35'),
(1804010047, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:41:20'),
(1804010048, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-01 21:41:46'),
(1804010049, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-01 21:45:06'),
(1804040050, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-04 10:29:44'),
(1804040051, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-04 14:07:10'),
(1804040052, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-04 14:28:45'),
(1804040053, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-04 18:29:32'),
(1804040054, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 200.000', '2018-04-04 18:30:52'),
(1804040055, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 300.000', '2018-04-04 18:31:16'),
(1804040056, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 100.000', '2018-04-04 18:31:40'),
(1804040057, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 30.000', '2018-04-04 18:32:00'),
(1804040058, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 50.000', '2018-04-04 18:32:48'),
(1804040059, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 600.000', '2018-04-04 18:33:46'),
(1804060060, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-06 07:28:56'),
(1804060061, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-06 07:44:32'),
(1804060062, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160574(Dou)', '2018-04-06 07:45:33'),
(1804060063, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 20.000', '2018-04-06 07:47:06'),
(1804070064, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-07 20:59:40'),
(1804070065, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 200.000', '2018-04-07 21:02:21'),
(1804070066, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 30.000', '2018-04-07 22:35:26'),
(1804070067, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 30.000', '2018-04-07 22:54:59'),
(1804070068, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 0', '2018-04-07 22:58:25'),
(1804070069, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-07 22:59:33'),
(1804070070, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 30.000', '2018-04-07 23:15:03'),
(1804070071, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 30.000', '2018-04-07 23:15:22'),
(1804070072, '10160574', NULL, 'akun 10160547(Fikri Haikal) di unBlok oleh 10160574', '2018-04-07 23:51:52'),
(1804070073, '10160574', NULL, 'akun 10160547(Fikri Haikal) di unBlok oleh 10160574', '2018-04-07 23:53:19'),
(1804070074, '10160574', NULL, 'akun 10160547(Fikri Haikal) di unBlok oleh 10160574', '2018-04-07 23:54:32'),
(1804070075, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-08 00:20:40'),
(1804080076, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160574(Dou)', '2018-04-08 08:43:19'),
(1804080077, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-08 08:51:30'),
(1804080078, NULL, '10160612', 'User 10160612(Sugih Ilmi Kalih Putra) Login', '2018-04-08 09:32:03'),
(1804080079, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160574(Dou)', '2018-04-08 09:58:03'),
(1804080080, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-08 09:58:23'),
(1804080081, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-08 10:52:58'),
(1804080082, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160574(Dou)', '2018-04-08 10:59:30'),
(1804080083, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-08 10:59:53'),
(1804080084, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) dihapus oleh 10160574(Dou)', '2018-04-08 11:02:27'),
(1804080085, '10160574', NULL, '10160582(Muhammad Fakhrullah) bergabung melalui Tata Usaha(TU)', '2018-04-08 11:13:21'),
(1804080086, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) dihapus oleh 10160574(Dou)', '2018-04-08 11:14:52'),
(1804080087, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-08 11:19:59'),
(1804080088, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-08 11:27:31'),
(1804080089, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-08 11:27:37'),
(1804080090, '10160574', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160574(Dou)', '2018-04-08 11:43:58'),
(1804080091, '10160574', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-08 11:53:50'),
(1804080092, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 1.000.000', '2018-04-08 11:55:34'),
(1804080093, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-08 12:43:04'),
(1804080094, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) Setor tunai sejumlah Rp. 200.000', '2018-04-08 12:43:22'),
(1804080095, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160612(Sugih Ilmi Kalih Putra) sejumlah Rp. 100.000', '2018-04-08 12:43:47'),
(1804080096, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-08 13:48:18'),
(1804080097, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 30.000', '2018-04-08 13:58:48'),
(1804080098, NULL, '10160547', 'User 10160547(Fikri Haikal) Logout', '2018-04-08 14:11:23'),
(1804080099, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 30.000', '2018-04-08 14:12:20'),
(1804080100, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160588(Muhammad Faisal) sejumlah Rp. 40.000', '2018-04-08 14:13:07'),
(1804080101, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-08 20:50:39'),
(1804090102, '10160575', NULL, 'admin 10160575(Admin) Login', '2018-04-09 07:45:52'),
(1804090103, '10160575', NULL, 'admin 10160575(Admin) Logout', '2018-04-09 07:52:52'),
(1804090104, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-09 13:15:13'),
(1804090105, '10160575', NULL, 'admin 10160575(Admin) Login', '2018-04-09 13:45:41'),
(1804090106, '10160575', NULL, '10160528(Awaludin Fazrin) bergabung melalui Tata Usaha(TU)', '2018-04-09 13:56:09'),
(1804090107, '10160575', NULL, 'akun 10160528(Awaludin Fazrin) dihapus oleh 10160575(Admin)', '2018-04-09 13:56:58'),
(1804090108, '10160575', NULL, 'admin 10160575(Admin) Logout', '2018-04-09 13:57:02'),
(1804090109, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-09 14:21:44'),
(1804090110, '10160574', NULL, '10160528(Awaludin Fazrin) bergabung melalui Tata Usaha(TU)', '2018-04-09 14:21:54'),
(1804090111, '10160574', NULL, 'akun 10160528(Awaludin Fazrin) Setor tunai sejumlah Rp. 100.000', '2018-04-09 14:22:12'),
(1804090112, '10160574', NULL, '10160582(Muhammad Fakhrullah) bergabung melalui Tata Usaha(TU)', '2018-04-09 15:02:39'),
(1804090113, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) dihapus oleh 10160574(Dou)', '2018-04-09 15:03:28'),
(1804090114, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-09 15:03:48'),
(1804090115, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-09 15:08:39'),
(1804120116, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-12 16:10:59'),
(1804120117, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-12 16:24:49'),
(1804130118, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-13 13:17:21'),
(1804140119, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-14 07:24:41'),
(1804140120, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-14 08:53:08'),
(1804150121, '10160575', NULL, 'admin 10160575(Admin) Login', '2018-04-15 12:04:33'),
(1804150122, '10160575', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160575(Admin)', '2018-04-15 12:06:00'),
(1804150123, '10160575', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160575(Admin)', '2018-04-15 12:06:21'),
(1804150124, '10160575', NULL, 'akun 10160528(Awaludin Fazrin) dihapus oleh 10160575(Admin)', '2018-04-15 12:06:51'),
(1804150125, '10160575', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-15 12:44:21'),
(1804150126, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah email', '2018-04-15 12:46:05'),
(1804150127, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah email', '2018-04-15 12:47:32'),
(1804150128, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah email', '2018-04-15 12:48:17'),
(1804150129, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah email', '2018-04-15 12:48:45'),
(1804150130, '10160575', NULL, 'akun 10160547(Fikri Haikal) dihapus oleh 10160575(Admin)', '2018-04-15 12:53:07'),
(1804150131, '10160575', NULL, '10160582(Muhammad Fakhrullah) bergabung melalui Tata Usaha(TU)', '2018-04-15 12:53:14'),
(1804150132, '10160575', NULL, '10160547(Fikri Haikal) bergabung melalui Tata Usaha(TU)', '2018-04-15 12:55:25'),
(1804150133, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 12:57:53'),
(1804150134, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:11:37'),
(1804150135, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:16:12'),
(1804150136, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:17:21'),
(1804150137, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:18:40'),
(1804150138, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:21:12'),
(1804150139, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:22:45'),
(1804150140, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:23:32'),
(1804150141, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-15 13:25:41'),
(1804150142, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah password', '2018-04-15 13:33:58'),
(1804150143, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah password', '2018-04-15 13:34:46'),
(1804150144, '10160575', NULL, 'akun 10160547(Fikri Haikal) merubah password', '2018-04-15 13:36:19'),
(1804150145, '10160575', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-15 13:54:13'),
(1804150146, '10160575', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 200.000', '2018-04-15 13:56:27'),
(1804150147, '10160575', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) dihapus oleh 10160575(Admin)', '2018-04-15 14:02:06'),
(1804150148, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 2.000.000', '2018-04-15 14:02:34'),
(1804150149, '10160575', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 200.000', '2018-04-15 14:12:58'),
(1804150150, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-15 17:08:37'),
(1804160151, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-16 11:15:47'),
(1804160152, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 800.000', '2018-04-16 11:18:52'),
(1804160153, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-16 11:45:36'),
(1804160154, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-16 11:54:27'),
(1804160155, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-16 18:18:51'),
(1804160156, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 20.000', '2018-04-16 18:19:43'),
(1804160157, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-16 18:20:13'),
(1804160158, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 2.000.000', '2018-04-16 18:31:28'),
(1804160159, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 70.000', '2018-04-16 18:43:50'),
(1804160160, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-16 18:59:45'),
(1804170161, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-17 09:48:47'),
(1804170162, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 100.000', '2018-04-17 10:23:33'),
(1804170163, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 20.000', '2018-04-17 10:24:33'),
(1804170164, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 20.000', '2018-04-17 10:27:18'),
(1804170165, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 20.000', '2018-04-17 11:21:03'),
(1804170166, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-17 16:24:31'),
(1804170167, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-17 20:32:07'),
(1804170168, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-17 20:34:48'),
(1804170169, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-17 20:35:53'),
(1804180170, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-18 12:32:28'),
(1804180171, NULL, '10160582', '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 30.000', '2018-04-18 12:56:20'),
(1804180172, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-18 13:02:28'),
(1804180173, '10160575', NULL, 'admin 10160575(Admin) Login', '2018-04-18 13:04:11'),
(1804180174, '10160575', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 230.000', '2018-04-18 13:10:10'),
(1804180175, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 50.000', '2018-04-18 13:15:41'),
(1804180176, '10160575', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 50.000', '2018-04-18 13:16:15'),
(1804180177, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-18 13:22:17'),
(1804180178, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-18 13:25:30'),
(1804180179, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-18 13:37:04'),
(1804180180, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-18 13:40:33'),
(1804180181, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-18 13:48:26'),
(1804180182, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-18 16:11:55'),
(1804180183, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-18 16:43:55'),
(1804180184, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 10.000', '2018-04-18 16:46:27'),
(1804180185, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-18 16:47:42'),
(1804180186, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-18 16:48:36'),
(1804180187, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 20.000', '2018-04-18 16:50:46'),
(1804180188, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-18 17:06:11'),
(1804180189, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-18 19:54:42'),
(1804190190, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-19 10:45:38'),
(1804190191, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) bergabung melalui Tata Usaha(TU)', '2018-04-19 11:33:53'),
(1804190192, NULL, '10160612', 'User 10160612(Sugih Ilmi Kalih Putra) Login', '2018-04-19 11:34:44'),
(1804190193, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 30.000', '2018-04-19 11:35:13'),
(1804190194, NULL, '10160612', 'User 10160612(Sugih Ilmi Kalih Putra) Login', '2018-04-19 11:40:34'),
(1804190195, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-19 13:15:38'),
(1804190196, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-19 13:19:43'),
(1804190197, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-19 13:36:17'),
(1804190198, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 60.000', '2018-04-19 13:37:31'),
(1804190199, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah email', '2018-04-19 13:39:02'),
(1804190200, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) Setor tunai sejumlah Rp. 5.000.000', '2018-04-19 13:58:05'),
(1804190201, '10160574', NULL, '10160612(Sugih Ilmi Kalih Putra) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 4.500.000', '2018-04-19 13:58:51'),
(1804190202, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 100.000', '2018-04-19 17:17:02'),
(1804190203, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-19 17:18:05'),
(1804190204, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-19 17:27:07'),
(1804200205, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-20 15:04:18'),
(1804200206, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-20 15:05:15'),
(1804200207, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-20 15:12:46'),
(1804200208, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) merubah password', '2018-04-20 15:13:18'),
(1804200209, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-20 15:13:41'),
(1804200210, NULL, '10160582', '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 10.000', '2018-04-20 15:18:09'),
(1804200211, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 500', '2018-04-20 15:36:20'),
(1804200212, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-20 15:36:59'),
(1804200213, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160612(Sugih Ilmi Kalih Putra) sejumlah Rp. 410.000', '2018-04-20 15:37:40'),
(1804200214, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-20 17:29:22'),
(1804200215, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 1.100.000', '2018-04-20 18:26:26'),
(1804200216, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 2.000', '2018-04-20 18:30:52'),
(1804200217, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-20 18:55:00'),
(1804200218, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-20 18:59:41'),
(1804200219, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-20 19:10:29'),
(1804200220, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-20 19:16:55'),
(1804210221, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-21 10:55:00'),
(1804210222, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-21 10:56:20'),
(1804210223, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-21 10:56:33'),
(1804210224, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-21 10:57:28'),
(1804210225, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-21 12:03:54'),
(1804220226, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-22 15:42:22'),
(1804220227, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 20.000', '2018-04-22 15:48:31'),
(1804220228, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-22 16:01:57'),
(1804220229, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-22 21:03:39'),
(1804220230, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-22 21:03:58'),
(1804220231, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 8.000', '2018-04-22 21:08:10'),
(1804220232, '10160574', NULL, 'akun 10160612(Sugih Ilmi Kalih Putra) Tarik tunai sejumlah Rp. 10.000', '2018-04-22 21:08:54'),
(1804220233, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 70.000', '2018-04-22 21:09:24'),
(1804220234, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-22 21:09:53'),
(1804220235, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-22 21:21:23'),
(1804230236, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-23 08:24:51'),
(1804230237, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-23 08:58:39'),
(1804230238, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-23 09:01:20'),
(1804230239, '10160574', NULL, '10160598(Ridho Arsyandi) bergabung melalui Tata Usaha(TU)', '2018-04-23 09:08:19'),
(1804230240, '10160574', NULL, 'akun 10160598(Ridho Arsyandi) dihapus oleh 10160574(Dou)', '2018-04-23 09:08:51'),
(1804230241, '10160574', NULL, '10160598(Ridho Arsyandi) bergabung melalui Tata Usaha(TU)', '2018-04-23 09:09:01'),
(1804230242, '10160574', NULL, 'akun 10160598(Ridho Arsyandi) Setor tunai sejumlah Rp. 20.000', '2018-04-23 09:11:16'),
(1804230243, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-23 09:44:31'),
(1804230244, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-23 10:25:36'),
(1804230245, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-23 11:45:12'),
(1804240246, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-24 11:51:11'),
(1804240247, '10160574', NULL, '10160598(Ridho Arsyandi) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 20.000', '2018-04-24 11:53:02'),
(1804240248, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-24 12:58:38'),
(1804240249, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 2.000.000', '2018-04-24 12:59:24'),
(1804240250, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 3.920.000', '2018-04-24 13:21:46'),
(1804240251, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-24 13:27:08'),
(1804240252, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-24 13:27:21'),
(1804240253, NULL, '10160598', 'User 10160598(Ridho Arsyandi) Login', '2018-04-24 13:29:27'),
(1804240254, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-24 13:59:47'),
(1804240255, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-24 19:19:51'),
(1804240256, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-24 19:24:08'),
(1804250257, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 10:37:46'),
(1804250258, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-25 10:49:27'),
(1804250259, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 11:46:10'),
(1804250260, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 80.000', '2018-04-25 11:47:06'),
(1804250261, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 11:57:17'),
(1804250262, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:09:07'),
(1804250263, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 200.500', '2018-04-25 14:18:36'),
(1804250264, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 1.000', '2018-04-25 14:22:14'),
(1804250265, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-25 14:23:18'),
(1804250266, '0', NULL, 'admin () Logout', '2018-04-25 14:23:22'),
(1804250267, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:24:00'),
(1804250268, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-25 14:24:15'),
(1804250269, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:41:10'),
(1804250270, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:42:07'),
(1804250271, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:44:24'),
(1804250272, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-25 14:46:22'),
(1804250273, '0', NULL, 'admin () Logout', '2018-04-25 14:46:25'),
(1804250274, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:46:33'),
(1804250275, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:47:26'),
(1804250276, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-25 14:48:54'),
(1804250277, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 14:49:02'),
(1804250278, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 14:56:51'),
(1804250279, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-25 17:23:24'),
(1804250280, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-25 17:26:06'),
(1804250281, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-25 17:26:42'),
(1804250282, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 71.500', '2018-04-25 17:40:02'),
(1804250283, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 500.000', '2018-04-25 17:42:04'),
(1804250284, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 17:56:31'),
(1804250285, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 18:14:07'),
(1804250286, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 18:54:12'),
(1804250287, '10160574', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 8.500', '2018-04-25 19:37:04'),
(1804250288, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 8.500', '2018-04-25 19:41:00'),
(1804250289, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 19:41:47'),
(1804250290, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 19:46:19'),
(1804250291, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 21:10:10'),
(1804250292, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 21:18:31'),
(1804250293, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 21:32:25'),
(1804250294, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 21:33:24'),
(1804250295, '10160574', NULL, '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 21:34:05'),
(1804250296, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-25 21:43:09'),
(1804250297, '10160574', NULL, 'akun 10160588(Muhammad Faisal) merubah email', '2018-04-25 21:44:18'),
(1804250298, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-25 21:44:38'),
(1804250299, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 500', '2018-04-25 22:02:25'),
(1804250300, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 2.000', '2018-04-25 22:03:05'),
(1804250301, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-25 22:15:12'),
(1804250302, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 100.000', '2018-04-25 22:16:16'),
(1804250303, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 100.000', '2018-04-25 22:16:37'),
(1804250304, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 100.000', '2018-04-25 22:17:20'),
(1804250305, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 10.000', '2018-04-25 22:24:14'),
(1804250306, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 10.000', '2018-04-25 22:48:24'),
(1804250307, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 1.000', '2018-04-25 22:50:18'),
(1804250308, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 1.000', '2018-04-25 23:00:49'),
(1804250309, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-25 23:09:39'),
(1804250310, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-25 23:22:05'),
(1804250311, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-25 23:23:40'),
(1804250312, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-25 23:24:42'),
(1804250313, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-25 23:30:00'),
(1804250314, NULL, '10160582', '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 12.000', '2018-04-25 23:30:53'),
(1804250315, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 10.000', '2018-04-25 23:34:37'),
(1804250316, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 10.000', '2018-04-25 23:35:18'),
(1804260317, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-26 11:28:48'),
(1804260318, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:11:52'),
(1804260319, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:12:11'),
(1804260320, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:12:26'),
(1804260321, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:12:37'),
(1804260322, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:13:15'),
(1804260323, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:13:24'),
(1804260324, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:14:08'),
(1804260325, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:14:19'),
(1804260326, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:14:39'),
(1804260327, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:14:49'),
(1804260328, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:15:48'),
(1804260329, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:15:57'),
(1804260330, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-26 12:18:16'),
(1804260331, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-26 12:18:35'),
(1804260332, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-26 12:23:08'),
(1804260333, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-26 12:23:25'),
(1804260334, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-26 13:13:29'),
(1804260335, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-26 13:29:16'),
(1804260336, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-26 13:35:26'),
(1804260337, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-26 13:36:00'),
(1804260338, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-26 13:36:35'),
(1804260339, NULL, '10160547', '10160547(Fikri Haikal) transfer saldo ke 10160582(Muhammad Fakhrullah) sejumlah Rp. 1.000', '2018-04-26 14:06:26'),
(1804260340, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 10.000', '2018-04-26 14:32:28'),
(1804260341, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 1.000', '2018-04-26 14:34:45'),
(1804260342, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 1.000', '2018-04-26 14:35:04'),
(1804260343, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 1.000', '2018-04-26 14:35:21'),
(1804260344, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 21.000', '2018-04-26 14:39:42'),
(1804260345, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 21.000', '2018-04-26 14:40:04'),
(1804260346, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-26 14:43:25'),
(1804260347, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 10.000', '2018-04-26 14:46:49'),
(1804260348, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 100.000', '2018-04-26 14:48:00'),
(1804260349, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-26 14:52:32'),
(1804260350, '10160574', NULL, 'akun 10160547(Fikri Haikal) Tarik tunai sejumlah Rp. 10.000', '2018-04-26 14:57:25'),
(1804260351, '10160574', NULL, '10160528(Awaludin Fazrin) bergabung melalui Tata Usaha(TU)', '2018-04-26 14:58:12'),
(1804260352, NULL, '10160528', 'User 10160528(Awaludin Fazrin) Login', '2018-04-26 14:59:01'),
(1804260353, '10160574', NULL, 'akun 10160528(Awaludin Fazrin) Setor tunai sejumlah Rp. 500.000', '2018-04-26 15:03:58'),
(1804260354, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 20.000', '2018-04-26 15:24:03'),
(1804270355, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-27 13:17:16'),
(1804270356, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-27 13:17:26'),
(1804270357, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-27 13:17:35'),
(1804270358, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 100.000', '2018-04-27 13:40:14'),
(1804270359, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-27 13:40:56'),
(1804270360, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 8.000', '2018-04-27 13:45:04'),
(1804270361, NULL, '10160547', 'User 10160547(Fikri Haikal) Login', '2018-04-27 17:59:14'),
(1804270362, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-27 18:13:28'),
(1804270363, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-27 18:57:29'),
(1804270364, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-27 18:57:33'),
(1804270365, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-27 18:58:00'),
(1804270366, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-27 19:03:48'),
(1804270367, '10160574', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 1.000', '2018-04-27 19:07:22'),
(1804270368, '10160574', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 10.000', '2018-04-27 19:08:55'),
(1804270369, NULL, '10160582', 'User 10160582(Muhammad Fakhrullah) Login', '2018-04-27 19:14:44'),
(1804270370, NULL, '10160582', '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 60.000', '2018-04-27 19:20:30'),
(1804270371, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-27 21:47:19'),
(1804270372, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-27 22:19:59'),
(1804270373, '10160575', NULL, 'admin 10160575(Admin) Login', '2018-04-27 22:20:09'),
(1804270374, '10160575', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 30.000', '2018-04-27 22:49:13'),
(1804270375, '10160575', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 1.000', '2018-04-27 22:51:12'),
(1804270376, '10160575(Admin)', NULL, 'akun 10160582(Muhammad Fakhrullah) Setor tunai sejumlah Rp. 10.000', '2018-04-27 22:53:16'),
(1804270377, '10160575(Admin)', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 10.000', '2018-04-27 22:56:01'),
(1804270378, 'Admin(10160575)', NULL, 'akun 10160547(Fikri Haikal) Setor tunai sejumlah Rp. 2.000', '2018-04-27 23:05:52'),
(1804270379, 'Admin(10160575)', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 2.000', '2018-04-27 23:06:23'),
(1804270380, 'Admin(10160575)', NULL, 'akun 10160582(Muhammad Fakhrullah) Tarik tunai sejumlah Rp. 10.000', '2018-04-27 23:07:27'),
(1804270381, 'Admin(10160575)', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 10.000', '2018-04-27 23:08:11'),
(1804270382, '10160575', NULL, 'admin 10160575(Admin) Logout', '2018-04-27 23:18:14'),
(1804270383, '10160574', NULL, 'admin 10160574(Dou) Login', '2018-04-27 23:19:01'),
(1804270384, '10160574', NULL, 'admin 10160574(Dou) Logout', '2018-04-27 23:24:14'),
(1804270385, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Login', '2018-04-27 23:26:01'),
(1804270386, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Logout', '2018-04-27 23:26:51'),
(1804270387, 'Admin(10160575)', NULL, 'admin 10160575(Admin) Login', '2018-04-27 23:27:10'),
(1804270388, 'Admin(10160575)', NULL, 'admin 10160575(Admin) Logout', '2018-04-27 23:27:22'),
(1804270389, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Login', '2018-04-27 23:36:35'),
(1804270390, '10160574', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-27 23:36:58'),
(1804270391, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-27 23:40:04'),
(1804270392, 'Dou(10160574)', NULL, 'akun 10160588(Muhammad Faisal) merubah email', '2018-04-27 23:40:50'),
(1804270393, 'Dou(10160574)', NULL, 'akun 10160588(Muhammad Faisal) merubah password', '2018-04-27 23:41:20'),
(1804270394, 'Dou(10160574)', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-27 23:41:38'),
(1804270395, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Logout', '2018-04-27 23:44:19'),
(1804280396, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Login', '2018-04-28 16:12:18'),
(1804280397, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-28 16:14:30'),
(1804280398, 'Dou(10160574)', NULL, 'akun 10160588(Muhammad Faisal) dihapus oleh 10160574(Dou)', '2018-04-28 16:35:16'),
(1804280399, '10160574', NULL, '10160588(Muhammad Faisal) bergabung melalui Tata Usaha(TU)', '2018-04-28 16:35:22'),
(1804280400, 'Dou(10160574)', NULL, '10160582(Muhammad Fakhrullah) transfer saldo ke 10160547(Fikri Haikal) sejumlah Rp. 70.000', '2018-04-28 16:37:49'),
(1804280401, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Logout', '2018-04-28 17:50:46'),
(1804290402, 'Dou(10160574)', NULL, 'admin 10160574(Dou) Login', '2018-04-29 13:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `id_fb` int(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `masukan` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_fb`, `nis`, `masukan`, `tanggal`) VALUES
(1803140001, '10160547', 'Test', '2018-03-14 16:21:30'),
(1803190005, '10160582', 'Testing', '2018-03-19 12:42:50'),
(1803190006, '10160582', 'Testing2', '2018-03-19 12:44:07'),
(1804180009, '10160547', 'testing feedback', '2018-04-18 13:18:57'),
(1804180011, '10160582', 'testing feedback', '2018-04-18 13:40:50'),
(1804190013, '10160612', 'ini masukan', '2018-04-19 11:40:49'),
(1804190014, '10160612', 'test', '2018-04-19 13:47:23'),
(1804250015, '10160547', 'ini masukan untuk developer agar lebih focus di ui/ux .', '2018-04-25 17:44:22'),
(1804250016, '10160582', 'click here for more info please refresh this email and download using the ini bibi yang akan datang akan berjuang lebih', '2018-04-25 23:33:31'),
(1804270017, '10160582', 'Testing', '2018-04-27 19:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `keterangan` set('kredit','debit') NOT NULL,
  `nominal` int(10) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nis` int(8) NOT NULL,
  `sandi` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` int(3) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `saldo` int(11) NOT NULL,
  `email` text NOT NULL,
  `tgl_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `akses` set('1','0') NOT NULL,
  `token` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nis`, `sandi`, `nama`, `kelas`, `jurusan`, `saldo`, `email`, `tgl_join`, `akses`, `token`) VALUES
(10160528, '$2y$10$9TlpKaz/mCklFZBIVdk3QOKZ8Rws.VYlD8ByeQUF6McQaVegw0BzS', 'Awaludin Fazrin', 11, 'rekayasa perangkat lunak', 500000, 'awaluddin.fazrin99@gmail.com', '2018-04-26 14:58:11', '1', '7vAIcskOxt'),
(10160547, '$2y$10$KAGmxr5F9F6GAmQp6JPBwO2nSV53AN6pz7OB.NY7tIDbyI7KIZiEy', 'Fikri Haikal', 11, 'rekayasa perangkat lunak', 480000, 'fikal1410@gmail.com', '2018-04-15 12:55:25', '1', 'u)8@4Owj6v'),
(10160582, '$2y$10$mwQuf466q6jPjWWeRK9q6eXKjTeDC7eLCpLbi7n2Z7g4.SkPZdm42', 'Muhammad Fakhrullah', 11, 'rekayasa perangkat lunak', 400000, 'muhammadfakhrul79@gmail.com', '2018-04-15 12:53:14', '1', 'TK1wMDUWb@'),
(10160588, '$2y$10$zIkb7qrm2F7GzDvra5nhD.fQdF17cVAO0wp9p/VXOaSQwZroAULdi', 'Muhammad Faisal', 11, 'geomatika', 0, 'faisal11@gmail.com', '2018-04-28 16:35:22', '0', '1zmo05882804'),
(10160598, '$2y$10$37Dn0OHj2PbrVM0LtO7Qs.EgxFKU0qt8LVNnYFwpt8lnXgya8bkDu', 'Ridho Arsyandi', 11, 'rekayasa perangkat lunak', 0, 'arsyandi.ridho@gmail.com', '2018-04-23 09:09:00', '0', '6fmXR8nox3'),
(10160612, '$2y$10$HO3JxsnDcuce0KpBiyM/TeyO.ncB7M1/yEUqW9U1nO3j26XITHJwC', 'Sugih Ilmi Kalih Putra', 11, 'rekayasa perangkat lunak', 900000, 'sugih.ikp@gmail.com', '2018-04-19 11:33:52', '1', 'sGuY9eg6PO');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `kredit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_admin`, `nis`, `kredit`, `debit`, `saldo`, `tanggal`, `keterangan`) VALUES
(1804150001, 10160575, '10160547', 200000, 0, 200000, '2018-04-15 13:56:27', 'Setor Tunai'),
(1804150002, 10160575, '10160582', 2000000, 0, 2000000, '2018-04-15 14:02:34', 'Setor Tunai'),
(1804150003, 10160575, '10160582', 0, 200000, 1800000, '2018-04-15 14:12:58', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804150004, 10160575, '10160547', 200000, 0, 400000, '2018-04-15 14:12:58', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804160005, 10160574, '10160582', 0, 800000, 1000000, '2018-04-16 11:18:52', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804160006, 10160574, '10160547', 800000, 0, 1200000, '2018-04-16 11:18:52', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804160007, 0, '10160547', 0, 10000, 1190000, '2018-04-16 11:45:36', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Pulsa'),
(1804160008, 0, '10160582', 10000, 0, 1010000, '2018-04-16 11:45:36', 'Transfer Dari 10160547(Fikri Haikal) Bayar Pulsa'),
(1804160009, 0, '10160547', 0, 10000, 1180000, '2018-04-16 11:54:27', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Pulsa'),
(1804160010, 0, '10160582', 10000, 0, 1020000, '2018-04-16 11:54:27', 'Transfer Dari 10160547(Fikri Haikal) Bayar Pulsa'),
(1804160011, 10160574, '10160582', 0, 20000, 1000000, '2018-04-16 18:19:43', 'Tarik Tunai'),
(1804160012, 10160574, '10160547', 0, 10000, 1170000, '2018-04-16 18:20:13', 'Tarik Tunai'),
(1804160013, 10160574, '10160547', 2000000, 0, 3170000, '2018-04-16 18:31:28', 'Setor Tunai'),
(1804160014, 0, '10160547', 0, 70000, 3100000, '2018-04-16 18:43:50', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Pajak'),
(1804160015, 0, '10160582', 70000, 0, 1070000, '2018-04-16 18:43:50', 'Transfer Dari 10160547(Fikri Haikal) Bayar Pajak'),
(1804170016, 10160574, '10160547', 100000, 0, 3200000, '2018-04-17 10:23:33', 'Setor Tunai'),
(1804170017, 10160574, '10160582', 0, 20000, 1050000, '2018-04-17 10:24:33', 'Tarik Tunai'),
(1804170018, 10160574, '10160582', 0, 20000, 1030000, '2018-04-17 10:27:18', 'Tarik Tunai'),
(1804170019, 10160574, '10160582', 0, 20000, 1010000, '2018-04-17 11:21:03', 'Tarik Tunai'),
(1804180020, 0, '10160582', 0, 30000, 980000, '2018-04-18 12:56:19', 'Transfer Ke 10160547(Fikri Haikal) Bayar Utang'),
(1804180021, 0, '10160547', 30000, 0, 3230000, '2018-04-18 12:56:20', 'Transfer Dari 10160582(Muhammad Fakhrullah) Bayar Utang'),
(1804180022, 10160575, '10160547', 0, 230000, 3000000, '2018-04-18 13:10:10', 'Tarik Tunai'),
(1804180023, 0, '10160547', 0, 50000, 2950000, '2018-04-18 13:15:41', 'Transfer Ke 10160582(Muhammad Fakhrullah) bayar pulsa'),
(1804180024, 0, '10160582', 50000, 0, 1030000, '2018-04-18 13:15:41', 'Transfer Dari 10160547(Fikri Haikal) bayar pulsa'),
(1804180025, 10160575, '10160547', 50000, 0, 3000000, '2018-04-18 13:16:15', 'Setor Tunai'),
(1804180026, 10160574, '10160582', 0, 10000, 1020000, '2018-04-18 16:46:27', 'Tarik Tunai'),
(1804180027, 10160574, '10160547', 0, 10000, 2990000, '2018-04-18 16:48:36', 'Tarik Tunai'),
(1804180028, 0, '10160547', 0, 20000, 2970000, '2018-04-18 16:50:46', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804180029, 0, '10160582', 20000, 0, 1040000, '2018-04-18 16:50:46', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804190030, 10160574, '10160547', 30000, 0, 3000000, '2018-04-19 11:35:13', 'Setor Tunai'),
(1804190031, 10160574, '10160582', 60000, 0, 1100000, '2018-04-19 13:37:31', 'Setor Tunai'),
(1804190032, 10160574, '10160612', 5000000, 0, 5000000, '2018-04-19 13:58:04', 'Setor Tunai'),
(1804190033, 10160574, '10160612', 0, 4500000, 500000, '2018-04-19 13:58:50', 'Transfer Ke 10160547(Fikri Haikal) Bayar Pulsa'),
(1804190034, 10160574, '10160547', 4500000, 0, 7500000, '2018-04-19 13:58:50', 'Transfer Dari 10160612(Sugih Ilmi Kalih Putra) Bayar Pulsa'),
(1804190035, 0, '10160547', 0, 100000, 7400000, '2018-04-19 17:17:02', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804190036, 0, '10160582', 100000, 0, 1200000, '2018-04-19 17:17:02', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804200037, 0, '10160582', 0, 10000, 1190000, '2018-04-20 15:18:09', 'Transfer Ke 10160547(Fikri Haikal) bayar pulsa'),
(1804200038, 0, '10160547', 10000, 0, 7410000, '2018-04-20 15:18:09', 'Transfer Dari 10160582(Muhammad Fakhrullah) bayar pulsa'),
(1804200039, 10160574, '10160582', 500, 0, 1190500, '2018-04-20 15:36:20', 'Setor Tunai'),
(1804200040, 0, '10160547', 0, 410000, 7000000, '2018-04-20 15:37:40', 'Transfer Ke 10160612(Sugih Ilmi Kalih Putra) '),
(1804200041, 0, '10160612', 410000, 0, 910000, '2018-04-20 15:37:40', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804200042, 10160574, '10160582', 0, 1100000, 90500, '2018-04-20 18:26:25', 'Tarik Tunai'),
(1804200043, 10160574, '10160582', 0, 2000, 88500, '2018-04-20 18:30:52', 'Transfer Ke 10160547(Fikri Haikal) Bayar kas'),
(1804200044, 10160574, '10160547', 2000, 0, 7002000, '2018-04-20 18:30:52', 'Transfer Dari 10160582(Muhammad Fakhrullah) Bayar kas'),
(1804210045, 0, '10160547', 0, 10000, 6992000, '2018-04-21 10:56:33', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804210046, 0, '10160582', 10000, 0, 98500, '2018-04-21 10:56:33', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804210047, 10160574, '10160547', 0, 10000, 6982000, '2018-04-21 10:57:28', 'Tarik Tunai'),
(1804220048, 0, '10160547', 0, 20000, 6962000, '2018-04-22 15:48:31', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804220049, 0, '10160582', 20000, 0, 118500, '2018-04-22 15:48:31', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804220050, 10160574, '10160547', 8000, 0, 6970000, '2018-04-22 21:08:10', 'Setor Tunai'),
(1804220051, 10160574, '10160612', 0, 10000, 900000, '2018-04-22 21:08:54', 'Tarik Tunai'),
(1804220052, 10160574, '10160547', 0, 70000, 6900000, '2018-04-22 21:09:24', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Baju'),
(1804220053, 10160574, '10160582', 70000, 0, 188500, '2018-04-22 21:09:24', 'Transfer Dari 10160547(Fikri Haikal) Bayar Baju'),
(1804230054, 10160574, '10160598', 20000, 0, 20000, '2018-04-23 09:11:16', 'Setor Tunai'),
(1804240055, 10160574, '10160598', 0, 20000, 0, '2018-04-24 11:53:02', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804240056, 10160574, '10160547', 20000, 0, 6920000, '2018-04-24 11:53:02', 'Transfer Dari 10160598(Ridho Arsyandi) '),
(1804240057, 10160574, '10160547', 0, 2000000, 4920000, '2018-04-24 12:59:24', 'Tarik Tunai'),
(1804240058, 10160574, '10160547', 0, 3920000, 1000000, '2018-04-24 13:21:46', 'Tarik Tunai'),
(1804240059, 10160574, '10160547', 0, 10000, 990000, '2018-04-24 19:24:08', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804240060, 10160574, '10160582', 10000, 0, 198500, '2018-04-24 19:24:08', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250061, 10160574, '10160547', 0, 10000, 980000, '2018-04-25 10:37:45', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250062, 10160574, '10160582', 10000, 0, 208500, '2018-04-25 10:37:46', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250063, 10160574, '10160547', 0, 80000, 900000, '2018-04-25 11:47:06', 'Tarik Tunai'),
(1804250064, 0, '10160547', 0, 10000, 890000, '2018-04-25 11:57:17', 'Transfer Ke 10160582(Muhammad Fakhrullah) \n\n\n\n\n\n'),
(1804250065, 0, '10160582', 10000, 0, 218500, '2018-04-25 11:57:17', 'Transfer Dari 10160547(Fikri Haikal) \n\n\n\n\n\n'),
(1804250066, 10160574, '10160582', 0, 200500, 18000, '2018-04-25 14:18:36', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804250067, 10160574, '10160547', 200500, 0, 1090500, '2018-04-25 14:18:36', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804250068, 10160574, '10160582', 0, 1000, 17000, '2018-04-25 14:22:14', 'Transfer Ke 10160547(Fikri Haikal) Bayar uang kas'),
(1804250069, 10160574, '10160547', 1000, 0, 1091500, '2018-04-25 14:22:14', 'Transfer Dari 10160582(Muhammad Fakhrullah) Bayar uang kas'),
(1804250070, 10160574, '10160547', 0, 10000, 1081500, '2018-04-25 14:56:51', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250071, 10160574, '10160582', 10000, 0, 27000, '2018-04-25 14:56:51', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250072, 10160574, '10160547', 0, 10000, 1071500, '2018-04-25 17:26:42', 'Tarik Tunai'),
(1804250073, 0, '10160547', 0, 71500, 1000000, '2018-04-25 17:40:01', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250074, 0, '10160582', 71500, 0, 98500, '2018-04-25 17:40:01', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250075, 10160574, '10160547', 0, 500000, 500000, '2018-04-25 17:42:04', 'Tarik Tunai'),
(1804250076, 0, '10160547', 0, 10000, 490000, '2018-04-25 17:56:31', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250077, 0, '10160582', 10000, 0, 108500, '2018-04-25 17:56:31', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250078, 0, '10160547', 0, 10000, 480000, '2018-04-25 18:14:06', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250079, 0, '10160582', 10000, 0, 118500, '2018-04-25 18:14:07', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250080, 0, '10160547', 0, 10000, 470000, '2018-04-25 18:54:12', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250081, 0, '10160582', 10000, 0, 128500, '2018-04-25 18:54:12', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250082, 10160574, '10160582', 0, 8500, 120000, '2018-04-25 19:37:04', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804250083, 10160574, '10160547', 8500, 0, 478500, '2018-04-25 19:37:04', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804250084, 10160574, '10160547', 0, 8500, 470000, '2018-04-25 19:41:00', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250085, 10160574, '10160582', 8500, 0, 128500, '2018-04-25 19:41:00', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250086, 10160574, '10160547', 0, 10000, 460000, '2018-04-25 19:41:47', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250087, 10160574, '10160582', 10000, 0, 138500, '2018-04-25 19:41:47', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250088, 10160574, '10160547', 0, 10000, 450000, '2018-04-25 19:46:19', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250089, 10160574, '10160582', 10000, 0, 148500, '2018-04-25 19:46:19', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250090, 10160574, '10160547', 0, 10000, 440000, '2018-04-25 21:10:10', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250091, 10160574, '10160582', 10000, 0, 158500, '2018-04-25 21:10:10', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250092, 10160574, '10160547', 0, 10000, 430000, '2018-04-25 21:18:31', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250093, 10160574, '10160582', 10000, 0, 168500, '2018-04-25 21:18:31', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250094, 10160574, '10160547', 0, 10000, 420000, '2018-04-25 21:32:24', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250095, 10160574, '10160582', 10000, 0, 178500, '2018-04-25 21:32:25', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250096, 10160574, '10160547', 0, 10000, 410000, '2018-04-25 21:33:24', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250097, 10160574, '10160582', 10000, 0, 188500, '2018-04-25 21:33:24', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250098, 10160574, '10160547', 0, 10000, 400000, '2018-04-25 21:34:05', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250099, 10160574, '10160582', 10000, 0, 198500, '2018-04-25 21:34:05', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250100, 10160574, '10160582', 0, 500, 198000, '2018-04-25 22:02:25', 'Tarik Tunai'),
(1804250101, 10160574, '10160582', 2000, 0, 200000, '2018-04-25 22:03:05', 'Setor Tunai'),
(1804250102, 0, '10160547', 0, 100000, 300000, '2018-04-25 22:16:05', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250103, 0, '10160582', 100000, 0, 300000, '2018-04-25 22:16:05', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250104, 0, '10160547', 0, 100000, 200000, '2018-04-25 22:16:27', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250105, 0, '10160582', 100000, 0, 400000, '2018-04-25 22:16:28', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250106, 0, '10160547', 0, 100000, 100000, '2018-04-25 22:17:06', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250107, 0, '10160582', 100000, 0, 500000, '2018-04-25 22:17:08', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250108, 0, '10160547', 0, 10000, 90000, '2018-04-25 22:24:02', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250109, 0, '10160582', 10000, 0, 510000, '2018-04-25 22:24:02', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250110, 10160574, '10160547', 10000, 0, 100000, '2018-04-25 22:48:24', 'Setor Tunai'),
(1804250111, 0, '10160547', 0, 1000, 99000, '2018-04-25 22:50:03', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250112, 0, '10160582', 1000, 0, 511000, '2018-04-25 22:50:03', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250113, 0, '10160547', 0, 1000, 98000, '2018-04-25 23:00:37', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804250114, 0, '10160582', 1000, 0, 512000, '2018-04-25 23:00:37', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804250115, 0, '10160582', 0, 12000, 500000, '2018-04-25 23:30:38', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804250116, 0, '10160547', 12000, 0, 110000, '2018-04-25 23:30:38', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804250117, 10160574, '10160582', 10000, 0, 510000, '2018-04-25 23:34:37', 'Setor Tunai'),
(1804250118, 10160574, '10160582', 0, 10000, 500000, '2018-04-25 23:35:18', 'Tarik Tunai'),
(1804260119, 0, '10160547', 0, 10000, 100000, '2018-04-26 13:55:49', 'Transfer Ke 10160582(Muhammad Fakhrullah) bayar pulsa'),
(1804260120, 0, '10160582', 10000, 0, 510000, '2018-04-26 13:55:49', 'Transfer Dari 10160547(Fikri Haikal) bayar pulsa'),
(1804260121, 0, '10160547', 0, 10000, 90000, '2018-04-26 13:59:58', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804260122, 0, '10160582', 10000, 0, 520000, '2018-04-26 13:59:58', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804260123, 0, '10160547', 0, 1000, 89000, '2018-04-26 14:05:57', 'Transfer Ke 10160582(Muhammad Fakhrullah) '),
(1804260124, 0, '10160582', 1000, 0, 521000, '2018-04-26 14:05:58', 'Transfer Dari 10160547(Fikri Haikal) '),
(1804260125, 10160574, '10160547', 10000, 0, 99000, '2018-04-26 14:32:28', 'Setor Tunai'),
(1804260126, 10160574, '10160547', 1000, 0, 100000, '2018-04-26 14:34:45', 'Setor Tunai'),
(1804260127, 10160574, '10160547', 1000, 0, 100000, '2018-04-26 14:35:04', 'Setor Tunai'),
(1804260128, 10160574, '10160547', 1000, 0, 100000, '2018-04-26 14:35:21', 'Setor Tunai'),
(1804260129, 10160574, '10160582', 21000, 0, 542000, '2018-04-26 14:39:41', 'Setor Tunai'),
(1804260130, 10160574, '10160582', 21000, 0, 542000, '2018-04-26 14:40:04', 'Setor Tunai'),
(1804260131, 10160574, '10160547', 0, 10000, 90000, '2018-04-26 14:43:25', 'Tarik Tunai'),
(1804260132, 10160574, '10160547', 10000, 0, 100000, '2018-04-26 14:46:49', 'Setor Tunai'),
(1804260133, 10160574, '10160547', 100000, 0, 200000, '2018-04-26 14:48:00', 'Setor Tunai'),
(1804260134, 10160574, '10160547', 0, 10000, 190000, '2018-04-26 14:52:32', 'Tarik Tunai'),
(1804260135, 10160574, '10160547', 0, 10000, 180000, '2018-04-26 14:57:25', 'Tarik Tunai'),
(1804260136, 10160574, '10160528', 500000, 0, 500000, '2018-04-26 15:03:58', 'Setor Tunai'),
(1804260137, 10160574, '10160547', 20000, 0, 200000, '2018-04-26 15:24:03', 'Setor Tunai'),
(1804270138, 10160574, '10160547', 100000, 0, 300000, '2018-04-27 13:40:14', 'Setor Tunai'),
(1804270139, 10160574, '10160582', 8000, 0, 550000, '2018-04-27 13:45:04', 'Setor Tunai'),
(1804270140, 10160574, '10160582', 0, 1000, 549000, '2018-04-27 19:07:22', 'Tarik Tunai'),
(1804270141, 10160574, '10160547', 10000, 0, 310000, '2018-04-27 19:08:55', 'Setor Tunai'),
(1804270142, 0, '10160582', 0, 60000, 489000, '2018-04-27 19:20:19', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804270143, 0, '10160547', 60000, 0, 370000, '2018-04-27 19:20:19', 'Transfer Dari 10160582(Muhammad Fakhrullah) '),
(1804270144, 10160575, '10160547', 30000, 0, 400000, '2018-04-27 22:49:13', 'Setor Tunai'),
(1804270145, 10160575, '10160582', 1000, 0, 490000, '2018-04-27 22:51:12', 'Setor Tunai'),
(1804270146, 10160575, '10160582', 10000, 0, 500000, '2018-04-27 22:53:16', 'Setor Tunai'),
(1804270147, 10160575, '10160582', 0, 10000, 490000, '2018-04-27 22:56:01', 'Tarik Tunai'),
(1804270148, 10160575, '10160547', 0, 1000, 399000, '2018-04-27 23:01:47', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Renang'),
(1804270149, 10160575, '10160582', 1000, 0, 491000, '2018-04-27 23:01:47', 'Transfer Dari 10160547(Fikri Haikal) Bayar Renang'),
(1804270150, 10160575, '10160547', 0, 1000, 398000, '2018-04-27 23:05:08', 'Transfer Ke 10160582(Muhammad Fakhrullah) Bayar Uang Kas'),
(1804270151, 10160575, '10160582', 1000, 0, 492000, '2018-04-27 23:05:08', 'Transfer Dari 10160547(Fikri Haikal) Bayar Uang Kas'),
(1804270152, 10160575, '10160547', 2000, 0, 400000, '2018-04-27 23:05:52', 'Setor Tunai'),
(1804270153, 10160575, '10160582', 0, 2000, 490000, '2018-04-27 23:06:23', 'Tarik Tunai'),
(1804270154, 10160575, '10160582', 0, 10000, 480000, '2018-04-27 23:07:27', 'Tarik Tunai'),
(1804270155, 10160575, '10160582', 0, 10000, 470000, '2018-04-27 23:08:11', 'Transfer Ke 10160547(Fikri Haikal) Bayar Voucher'),
(1804270156, 10160575, '10160547', 10000, 0, 410000, '2018-04-27 23:08:11', 'Transfer Dari 10160582(Muhammad Fakhrullah) Bayar Voucher'),
(1804280157, 10160574, '10160582', 0, 70000, 400000, '2018-04-28 16:37:49', 'Transfer Ke 10160547(Fikri Haikal) '),
(1804280158, 10160574, '10160547', 70000, 0, 480000, '2018-04-28 16:37:49', 'Transfer Dari 10160582(Muhammad Fakhrullah) ');

-- --------------------------------------------------------

--
-- Table structure for table `user_tmp`
--

CREATE TABLE `user_tmp` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` set('10','11','12') NOT NULL,
  `jurusan` set('geomatika','rekayasa perangkat lunak','teknik komputer dan jaringan','geologi pertambangan','tata busana','mekatronika') NOT NULL,
  `email` text,
  `akses` set('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tmp`
--

INSERT INTO `user_tmp` (`nis`, `nama`, `kelas`, `jurusan`, `email`, `akses`) VALUES
('10160521', 'Melati Indriani', '11', 'mekatronika', 'melati1121@gmail.com', '0'),
('10160528', 'Awaludin Fazrin', '11', 'rekayasa perangkat lunak', 'awaluddin.fazrin99@gmail.com', '1'),
('10160547', 'Fikri Haikal', '11', 'rekayasa perangkat lunak', 'fikal1410@gmail.com', '1'),
('10160582', 'Muhammad Fakhrullah', '11', 'rekayasa perangkat lunak', 'm.fakhrul17@gmail.com', '1'),
('10160588', 'Muhammad Faisal', '11', 'geomatika', 'faisal11@gmail.com', '1'),
('10160598', 'Ridho Arsyandi', '11', 'rekayasa perangkat lunak', 'arsyandi.ridho@gmail.com', '1'),
('10160612', 'Sugih Ilmi Kalih Putra', '11', 'rekayasa perangkat lunak', 'sugih.ikp@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aktifitas`
--
ALTER TABLE `tb_aktifitas`
  ADD PRIMARY KEY (`id_aktifis`);

--
-- Indexes for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`id_fb`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `user_tmp`
--
ALTER TABLE `user_tmp`
  ADD PRIMARY KEY (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
