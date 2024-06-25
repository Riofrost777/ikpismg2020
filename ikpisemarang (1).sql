-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2020 pada 02.18
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
-- Database: `ikpisemarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_category` enum('Seminar','Workshop','Shortcourse') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Seminar',
  `price_int` int(11) NOT NULL,
  `price_ext` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_category`, `price_int`, `price_ext`, `quota`, `event_start`, `event_end`, `description`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 'Event 1', 'Seminar', 100000, 200000, 200, '2020-02-01 00:00:00', '2020-02-02 00:00:00', 'Deskripsi event 1', NULL, '2020-01-30 01:15:39', '2020-01-30 01:15:39'),
(2, 'Event 2', 'Workshop', 50000, 100000, 100, '2020-02-05 00:00:00', '2020-02-06 00:00:00', 'Deskripsi event 2', NULL, '2020-01-30 01:15:39', '2020-01-30 01:15:39'),
(3, 'Event 3', 'Seminar', 150000, 300000, 150, '2020-02-09 00:00:00', '2020-02-10 00:00:00', 'Deskripsi event 3', NULL, '2020-01-30 01:15:39', '2020-01-30 01:15:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `joinedevents`
--

CREATE TABLE `joinedevents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(227, '2014_10_12_000000_create_users_table', 1),
(228, '2014_10_12_100000_create_password_resets_table', 1),
(229, '2019_12_02_150442_create_events_table', 1),
(230, '2020_01_06_235235_create_joinedevents_table', 1),
(231, '2020_01_08_074940_create_registermember_table', 1),
(232, '2020_01_13_121453_create_roles_table', 1),
(233, '2020_01_13_121543_create_permissions_table', 1),
(234, '2020_01_13_121603_create_permission_role_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registermember`
--

CREATE TABLE `registermember` (
  `id` int(10) UNSIGNED NOT NULL,
  `NRA` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerFlag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijin_praktek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `NPWP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NRA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brevet` enum('A','B','C') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('TETAP','TERBATAS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TERBATAS',
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MEMBER',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `work_phonenumber`, `work_address`, `home_phonenumber`, `home_address`, `no_ijin_praktek`, `birthdate`, `year`, `NPWP`, `NRA`, `username`, `brevet`, `status`, `whatsapp`, `facebook`, `twitter`, `instagram`, `linkedin`, `position`, `avatar`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ikpisemarang.or.id', '2019-12-31 17:00:00', '$2y$10$/nwovvdW/4DMnjKGUiapZeas96GZCMX8BlBnMRXpqNGPtF/VWR4wW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '000000', '000000', NULL, 'TETAP', NULL, NULL, NULL, NULL, NULL, 'ADMIN', 'user.jpg', NULL, 1, '2019-12-31 17:00:00', '2020-01-30 01:15:18'),
(2, 'Rio Rizki Rahardjo', 'rizkyrio777@gmail.com', '2019-12-31 17:00:00', '$2y$10$6qDdugB4WWhan90F3wbv2eE.sm0AzojlUtyVQ05hh6qr1T5BadhSi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999999', '999999', NULL, 'TETAP', NULL, NULL, NULL, NULL, NULL, 'ADMIN', 'user.jpg', NULL, 1, '2019-12-31 17:00:00', '2020-01-30 01:15:18'),
(3, 'A BUDIDARMODJO', 'budidarmodjo@budidarmodjo.com', NULL, '$2y$10$xZD04D5nUGVljoaB7KwcweqWj52LxDL3JsO.edSR9Equ5L6duWtxW', '024-7600-690', NULL, '081-665-8308', NULL, 'KEP-987/IP.C/PJ/2015', NULL, 2015, NULL, '501', '501', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(4, 'A HARIYANTO NOTOSOEBAGIJO', 'support@budidarmodjo.com', NULL, '$2y$10$J802C4r2jPW1t3/B/n/Xcemv.fIwaLduMPmbr91tm506FffZsgrza', '024-7600-690', NULL, '0812-2559-5957', NULL, 'KEP-1482/WPJ.IP.C/PJ/2015', NULL, 2015, NULL, '1287', '1287', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(5, 'ABDUL ROCHIM', 'pajakgmataram@yahoo.com', NULL, '$2y$10$ZN95sINFaYh6v8fu.bJ.GOXLX3QipMJRc4joufweOKdA6oSgbGuty', '024-8500-899', NULL, '0815-7515-6078', NULL, 'KEP-5208/IP.B/PJ/2019', NULL, 2015, NULL, '3736', '3736', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(6, 'ADITYA WIDIYANTO', 'adityawidiyanto_ikpi@ymail.com', NULL, '$2y$10$96l.5wQwLYuduiiIKZ47dO6MvEKlT6Mst3Ujo./dDk0e2DPhEQWNW', '024-7640-3403', NULL, '08222-7585-800', NULL, '', NULL, 2019, NULL, '5456', '5456', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(7, 'ADRIAN PRIYANTO', 'adrian_tax@yahoo.com', NULL, '$2y$10$8JwG5SF5BE59hY4s2nLFIOEDeMoPSm5PDXt3TYaL/er4BPQvEub0i', '024-6725-624', NULL, '081-829-2939', NULL, 'KEP-1742/IP.B/PJ/2015', NULL, 2015, NULL, '1354', '1354', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(8, 'ADYUTA PURI PRANA', 'adyutapuriprana@yahoo.com', NULL, '$2y$10$UU/cQsHIyHPI36Rxor7igexUwcbNzvauK2IztY06eMYiIi2Cp.QZ2', '024-6715-656', NULL, '0812-2442-2592', NULL, 'KEP-5025/IP.B/PJ/2019', NULL, 2015, NULL, '2760', '2760', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(9, 'AGNES ARIE MIENTARRY CHRISTIE', 'mientarry@yahoo.com', NULL, '$2y$10$VW4KrecMYrXPJ9ggW2GeFe32hQTdYVt/ncSI6FWw2PLSaAt8igFea', '-', NULL, '0812-277-8997', NULL, 'KEP-2433/IP.B/PJ/2015', NULL, 2015, NULL, '4033', '4033', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(10, 'AGUNG MOELYONO', 'agung.moelyono@yahoo.com', NULL, '$2y$10$I86LpxRME13SYlfpMIcYiOYVh8GFS9CAKXjUDxpAw3M8FZ4PkcGZm', '024-7463877/7463778', NULL, '081-829-2184', NULL, 'KEP-3529/IP.A/PJ/2018', NULL, 2017, NULL, '4583', '4583', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(11, 'AGUNG SANTOSO', 'agungsant.18@gmail.com', NULL, '$2y$10$yIkeJrOCUZcpCsj8wLMRRugGpKyHWoLgNHnaiQXb7XbTZE9vU1yhe', '', NULL, '0812-2888-8712', NULL, '', NULL, 2019, NULL, '6041', '6041', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(12, 'AGUS CAHYO SAPUTRO', 'aguscsaputro@yahoo.com', NULL, '$2y$10$i6jQ12Q85QiVyIADb.6j.u5af.9/EoM.FXORwsUZweQ6ZmwUMjuWq', '024-659-3838', NULL, '0852-9066-9998', NULL, 'KEP-2836/IP.A/PJ/2015', NULL, 2015, NULL, '3202', '3202', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(13, 'AGUS RIARTONO', 'agusriartono17@gmail.com', NULL, '$2y$10$IyRfCtzHeGdZpJ43gcIkFu5ytCDf9LQexW.n3sjNKQWG63oiHdnq2', '024-7667-0084', NULL, '081-2293-4223', NULL, 'KEP-1267/IP.A/PJ/2015', NULL, 2015, NULL, '3203', '3203', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(14, 'AGUS SUPRIJONO', 'agussuprijono71@gmail.com', NULL, '$2y$10$J2nWuM9USq3p5M4ZGF8oJurevH6KgwCoPMFV6gElScOIz8f64hQ3G', '024-354-9719', NULL, '081-665-5584', NULL, 'KEP-1470/IP.A/PJ/2015', NULL, 2015, NULL, '2748', '2748', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(15, 'AGUS TRI ANGGORO', 'trianggoro_aa@yahoo.com', NULL, '$2y$10$tJNLg6a4n3CeaAxCVfGs0.NSWK1gz.7WvS/1sFprS/4MB9X3r0ECa', '', NULL, '0823-1311-9288', NULL, 'KEP-5765/IP.A/PJ/2019', NULL, 2019, NULL, '5979', '5979', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(16, 'AGUSTIN FITRIANI DJINARWAN', 'ay_liang@yahoo.com', NULL, '$2y$10$AleNpkSt4O5BwBFyJiGBJuOVW21mgPkkvwUcj25CYQBvlTKi4Z4Om', '024-762-6130', NULL, '0813-2500-1500', NULL, 'KEP-2133/IP.A/PJ/2015', NULL, 2015, NULL, '2014', '2014', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(17, 'AGUSTINUS MUJIANTO', 'agustinomuji@gmail.com', NULL, '$2y$10$HQ9xtbDPPAQ2wsdPjC008..SGmHKWV/7jsxGEH8H/ddk6PFbWKXki', '0298-522-580', NULL, '081-129-9307', NULL, 'KEP-1877/IP.C/PJ/2015', NULL, 2015, NULL, '1958', '1958', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(18, 'AKHMAD SOKHEH', 'sokheh.ikpi@gmail.com', NULL, '$2y$10$sIPNVzSw0muIQQXQH.jrmO26y4TrWcZPi.8tvtxt9TV9Qg7S0cZDe', '-', NULL, '0813-9058-6456', NULL, 'KEP-308/IP.A/PJ/2015', NULL, 2015, NULL, '2966', '2966', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(19, 'AMELIA LISTIANI HALIM', 'amelia_listiani@yahoo.com', NULL, '$2y$10$IFpRFFdlQPyKQ0ZhTTtlte02bKS4ogYH8sJvXfbzTRmTgPMQV.wTa', '024-831-7235', NULL, '085-6268-1058', NULL, 'KEP-2330/IP.A/PJ/2015', NULL, 2015, NULL, '2759', '2759', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(20, 'ANDI SULISTIJO JUSUP', 'andisulistijo@yahoo.com', NULL, '$2y$10$OChk4ql2SLvrirQR8ft6HONktvvcHBgz5CNF0WBlqBnamTEeKwC66', '024-762-5154', NULL, '081-2281-5859', NULL, 'KEP- 4518/IP.C/PJ/2019', NULL, 2015, NULL, '2749', '2749', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(21, 'ANDY DARMAWAN', 'andy.darmawan.dc2@gmail.com', NULL, '$2y$10$PlE6f.4siC/W8EJdfPpXZ.MAUJaQ8Qe9IrYENZ9YdqFasCUuJ6lw6', '021-5033-8899', NULL, '088-1123-5053', NULL, 'KEP-1249/IP.B/PJ/2015', NULL, 2015, NULL, '3988', '3988', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(22, 'ANGGRIANI MALAKA', 'pakarpenatausaha@yahoo.co.uk', NULL, '$2y$10$vYdgcBaN48c9QzvQxHgmAOuG4c06/J2RtmYxxVNMcYXCuaStiasI.', '024-746-3739', NULL, '0815-7579-8989', NULL, 'KEP-837/IP.C/PJ/2015', NULL, 2015, NULL, '1519', '1519', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(23, 'ANITA SUSANTI', 'susanti.anita.susanti@gmail.com', NULL, '$2y$10$yw1o44ts2bmXkvtttvYut.2ZhrNRGZfT380pxMaMJQ598wRsz8Xei', '024-761-8260', NULL, '081-2290-1982', NULL, 'KEP-5058/IP.B/PJ/2019', NULL, 2015, NULL, '4334', '4334', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(24, 'ANNAS GALIGO', 'andika5253@ymail.com', NULL, '$2y$10$rJOxlO6UAsM9qCu5WTQLlO/9ILZEDfBRhE4MAMyRXkIHkg1WWtPem', '024-355-3922', NULL, '0851-7515-4563', NULL, 'KEP-1690/IP.A/PJ/2015', NULL, 2015, NULL, '3041', '3041', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(25, 'ANTONIUS PRIYO PURNOMO', 'antonius_kkp@yahoo.com', NULL, '$2y$10$HWFt1S2rag4z.qOOSeq0BOOMWOJIu7cnnLjGz5ToqMaAHVbLPzsTe', '-', NULL, '081-666-3543', NULL, 'KEP-1289/IP.B/PJ/2015', NULL, 2015, NULL, '2349', '2349', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(26, 'ANUGRAHENI KUS KELANAWATI', 'anugraheni_kk@yahoo.co.id', NULL, '$2y$10$MuCogoM.bH.hMGuHzNbwBuoiu7inKhVHF.GJZW3qVVKN6Wp5dkm7m', '024-7061-8589', NULL, '0818-0590-3499', NULL, 'KEP-1322/IP.B/PJ/2015', NULL, 2015, NULL, '2921', '2921', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(27, 'ANWAR SADAT', 'anwarsadat104@gmail.com', NULL, '$2y$10$RHFb5i50Z.4YigjkRy4Kwuaiqj.b7RNOLQJ6dnV3Yx7mV/Rlc0pBG', '', NULL, '0813-9095-4090', NULL, 'KEP-5660/IP.A/PJ/2019', NULL, 2019, NULL, '5881', '5881', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(28, 'ARDIANTO BAGUS PRAKOSO', 'ardibg.tax@gmail.com', NULL, '$2y$10$Rmn2rn.uaC1fFt3NB5woKO6V.kV2X8sI/bxoWlMkbJ3LG/b0L/fPO', '024-762-2720', NULL, '089-620-304-164', NULL, 'KEP-4485/IP.A/PJ/2019', NULL, 2018, NULL, '5294', '5294', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(29, 'ARDY SANTOSO', 'ardysantoso93@gmail.com', NULL, '$2y$10$PajG88SrPiWgLaXTtqlkWuKBqUnUysd89Pcw8Cz1AsNs/AcsS8nOG', '-', NULL, '0856-876-0599', NULL, 'KEP-4140/IP.B/PJ/2018', NULL, 2017, NULL, '1865', '1865', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(30, 'ARIE SANDY RACHIM', 'asrachim@gmail.com', NULL, '$2y$10$mjbYN0k724l6kncdOCf7X.iAK4NSzHl3nrM6PRkHgYJ/ke/LUorm.', '024-4016-4266', NULL, '081-6425-3866', NULL, 'KEP-1073/IP.C/PJ/2015', NULL, 2015, NULL, '1425', '1425', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(31, 'ARLIA NUGRAHAWULAN', 'arlianugrahawulan80@gmail.com', NULL, '$2y$10$BO.stxp4t4xjsm3I6HuCgOz.3EWeLhXr0.DsX5nFx5yc27vkm8WQ6', '', NULL, '0852-0171-5550', NULL, '', NULL, 2019, NULL, '5956', '5956', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(32, 'ARYA YOGA PRAMANA', 'aryayp16@gmail.com', NULL, '$2y$10$SIdmd6diRohG6fZtO3nEe.JXeOgJP9GdjevincG/Ch7o0SK3THGcS', '024-760-8789', NULL, '0856-4033-9310', NULL, 'KEP-2749/IP.A/PJ/2015', NULL, 2015, NULL, '4177', '4177', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(33, 'BAMBANG EDY SOEGIJANTO', 'bambangedys22@gmail.com', NULL, '$2y$10$NQF7582DbVD0oCVqUA9pm.zmPNIpNqluVahlaBuEvLX4k21QggZOi', '-', NULL, '081-127-7494', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '4513', '4513', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(34, 'BAMBANG YULIANTO', 'bambang_yulianto@yahoo.com', NULL, '$2y$10$NKUdaL0V5tcJHCeJ/O5q5OBoZhoJurN90v16AgAAmVz0Zb7AgcZWq', '024-3555293', NULL, '081-2288-3269', NULL, '', NULL, 2019, NULL, '6056', '6056', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(35, 'BEATRICE RETNO HASTUTI S.', 'beatrice.retno@gmail.com', NULL, '$2y$10$KSl4.M6CKr2iocaXB.fcduEjfRIW.e86cQXWvgeeH2/dD1lIokTbG', '-', NULL, '081-1277-7918', NULL, 'KEP-2119/IP.A/PJ/2015', NULL, 2016, NULL, '3817', '3817', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(36, 'BENNY GUNAWAN', 'kapbgsmg@yahoo.com', NULL, '$2y$10$pz.RiUNTeEyeJftezThp7.tQpAAaeK05ZNPdcIBXATd2DZRyNgi6S', '024-760-6011', NULL, '081-2282-1842', NULL, 'KEP-693/IP.C/PJ/2015', NULL, 2016, NULL, '1654', '1654', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(37, 'BRIAN', 'brianbribro@gmail.com', NULL, '$2y$10$X.ykUsocUH/8haroN1bX5.ymlBlX8jdonW3E9iNBC7h.SWX7aF44S', '', NULL, '0818-0268-1718', NULL, '', NULL, 2019, NULL, '5524', '5524', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(38, 'BUDIMAN', 'budiman_sby11@yahoo.com', NULL, '$2y$10$ZM54rCBP/UD2OK8s3.W.DOT5KzBTYzHPDmLy8QJLSdsV7ikqklQDi', '024-354-8172', NULL, '081-5650-3020', NULL, 'KEP-2489/IP.B/PJ/2015', NULL, 2016, NULL, '2750', '2750', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(39, 'BUDY SANTOSO', 'budysnts@yahoo.com', NULL, '$2y$10$CxoeRb9aboV4NURJmdUXJOd428e7I25LL9pmtYeZ2DAfQWWgAHnp.', '024-760-6311', NULL, '081-2289-9593', NULL, 'KEP-1790/IP.B/PJ/2015', NULL, 2016, NULL, '1109', '1109', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(40, 'CAMELIA DEWI', 'maria_angela_lia@yahoo.co.id', NULL, '$2y$10$jUwuOdn3y13p4ClJk1s9OeYcPqPv2kc/6G3z5WNB3yBQ3xo2mLTtq', '-', NULL, '081-2280-4873', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '4475', '4475', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(41, 'CANDRA SAFITRI', 'casa_fitri@yahoo.com', NULL, '$2y$10$62NvNGzODp.xSWlhmtvTxeYJxjNV0IJOQc.i37EZl.pdx97vhMHvC', '024-7626-130', NULL, '0856-4297-7612', NULL, 'KEP-2526/IP.A/PJ/2015', NULL, 2016, NULL, '4403', '4403', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(42, 'CITRA ANDRIANI KUSUMAWATI', 'citrakusuma1329@gmail.com', NULL, '$2y$10$6O.ktBNgBUCaPXAjLd2bL.sk3lm7Dw0ijGGPIGeO5nvagUoz/PQrm', '-', NULL, '0818-0580-0900', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(43, 'CHRIS RAHADIAN', 'chris.rahadian@gmail.com', NULL, '$2y$10$fPWXHFx5Fazq2GhXFKMOouGnZ0y0geDTxU3v/vHX/YUl9QWA2DADy', '024-356-2234', NULL, '081-1278-8810', NULL, 'KIP-5340/IP.B/PJ/2019', NULL, 2016, NULL, '2931', '2931', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(44, 'CHRISTIAN HADI SOEMARSONO', 'christ_koga@yahoo.co.id', NULL, '$2y$10$mJjyTc/YFpHGCOr0mjrlwuw/W6KzBMdN4MOUyMdC/6jhtdg.AiVW2', '024-356-7752', NULL, '0815-666-666-5', NULL, 'KEP-4404/IP.A/PJ/2019', NULL, 2018, NULL, '5306', '5306', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(45, 'DANA DARSONO', 'rapidsejatimandiri@gmail.com', NULL, '$2y$10$qX250S2kioVWL5/RQ.fRz.wB1jv2ZFSX0xsNbMWerRU4hlqZuCtJe', '024-354-5813', NULL, '081-5760-2982', NULL, 'KEP-582/IPB/PJ.2015', NULL, 2016, NULL, '1423', '1423', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(46, 'DANIEL WIDJI PRASETYO', 'pelitamugas800@yahoo.com', NULL, '$2y$10$iAtjUqVgrCjt3K6DHkwew.ltih7Whj2GT4JvIKp/7HnCKu70XvvXW', '-', NULL, '0813-2663-1200', NULL, 'SI-156/PJ/1996', NULL, 2016, NULL, '504', '504', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(47, 'DARMAWAN', 'darmawanpajak68@gmail.com', NULL, '$2y$10$ZunpQbop0PdAsZ8vR/eXTuD/JEqbIoqzs1/RzGTkF33QFqM/cDtSi', '-', NULL, '0813-2560-1686', NULL, 'KEP-641/IP.A/PJ/2015', NULL, 2016, NULL, '2967', '2967', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(48, 'DARRIONO PRAJETNO', 'darriono_taxconsultant@yahoo.co.id', NULL, '$2y$10$dKOlATdDd3XcK/poB1e6VOgkVuwfsw6n4gM/WDGT8/kWskb8NMUe6', '024-351-7211', NULL, '081-6488-2155', NULL, 'KEP-339/IP.C/PJ/2015', NULL, 2016, NULL, '517', '517', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(49, 'DEVINA YUNIATI', 'devinayuniati207@gmail.com', NULL, '$2y$10$mEplul/vkB3rhuchaZ8tFu1yHGlDY6uVAVSSLxgQwJ4lRo6kXmRoO', '', NULL, '0896-0650-8668', NULL, '', NULL, 2019, NULL, '6084', '6084', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(50, 'DEVITA TRIANA PUTRI', 'devita.vit@gmail.com', NULL, '$2y$10$Yfhr6lvtDZNI.o422UQ8O.udJnIclT/nspe.kDTwlCApQf0xNO6SO', '-', NULL, '0856-4393-3987', NULL, 'KEP-2440/IP.A/PJ/2015', NULL, 2015, NULL, '3818', '3818', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(51, 'DIAH FITRIYASARI', 'diah_kkp@yahoo.co.id', NULL, '$2y$10$tpTw41EEOSe7FvcqLfRq3u6FijWTxji1u2ysJxTJsEavsn3BAZpiW', '', NULL, '0857-2719-4996', NULL, 'KEP-5648/IP.B/PJ/2019', NULL, 2018, NULL, '5008', '5008', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(52, 'DIAN SOEKA TIARSA', 'soekatiarsa@gmail.com', NULL, '$2y$10$B7os8P0s4vWljvmTPuCmaehC3Heg94Tt8xXOyZ6LxF6uu/DfurO66', '024-671-7271', NULL, '0858-6672-4666', NULL, 'KEP-391/IP.B/PJ/2015', NULL, 2015, NULL, '2768', '2768', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(53, 'DINA AGUSTINA', 'dyna@chatura-indonesia.com', NULL, '$2y$10$1RvV5ZkjJcWzEeqJarMRoO94awo5NKR4lTA2b5g/iE6Itl2k0ivZS', '021-29110015', NULL, '0852-7903-5349', NULL, 'KIP-4472/IP.A/PJ/2019', NULL, 2019, NULL, '5348', '5348', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(54, 'DJATMIKO', 'djatmikokkp@yahoo.co.id', NULL, '$2y$10$Z9HmePJrfM3AnQMd8xSYB.Ts76BXW9nV8Lfepwfl8Z3.b26gRDL4G', '0295-692-615', NULL, '081-2859-5424', NULL, 'KEP-262/IP.B/PJ/2015', NULL, 2015, NULL, '1006', '1006', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(55, 'DJOENAIDHI SARWONO', 'djoensarwono@gmail.com', NULL, '$2y$10$EeE5IqT64/hScGM7VMA9N.SR2jYENfQFFD8XU52mtOVOJOgnykgYa', '024-3555-293', NULL, '081-128-0259', NULL, 'KEP-812/IP.A/PJ/2015', NULL, 2015, NULL, '503', '503', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(56, 'DJUWARIAH', 'budjuk@gmail.com', NULL, '$2y$10$aXkYu0PSytqXRJNi6rEJOOOafraEi4BFRDWw8ePmO786FB5gSjh42', '024-3511-253', NULL, '0813-9064-5358', NULL, 'KEP-1420/IP.B/PJ/2015', NULL, 2015, NULL, '2922', '2922', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(57, 'DOMO SENO SETIAWAN', 'omah.pajak@gmail.com', NULL, '$2y$10$DVqfc49g5wwW37Ht0p.TGOdeTzPHU/mr8qZOJ9og6sC78S.XTrcAu', '', NULL, '0822-2021-6012', NULL, 'KEP-4886/IP.A/PJ/2019', NULL, 2019, NULL, '5595', '5595', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(58, 'DWI ARDI WICAKSANA', 'ardydw@gmail.com', NULL, '$2y$10$jyrK7mYEhR4BJqxKINxCnOshMKYpa1TfH6JIp34fk/yp3jOGx5ZEO', '024-7614-839', NULL, '081-6488-3299', NULL, 'KEP-2146/IP.A/PJ/2015', NULL, 2015, NULL, '2650', '2650', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(59, 'DWI BERDI KARYANI', 'dwiberdikaryani@yahoo.com', NULL, '$2y$10$3iOjw5QLE78YRAMg1MaVAO/jfj3mJMz5KPs6iaM7IMOomvPC77xUS', '021-5289-5020', NULL, '0878-7556-5757', NULL, 'KEP-5273/IP.B/PJ/2019', NULL, 2015, NULL, '4000', '4000', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(60, 'EDDY PRASETYO', 'praseddy@gmail.com', NULL, '$2y$10$lpdApGNvHVay33MqhwsbPe0JWhbhvEFKDXNN2pKvTzbRniza702lq', '024-7600-690', NULL, '081-5779-1243', NULL, 'KEP-842/IP.B/PJ/2015', NULL, 2015, NULL, '3947', '3947', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(61, 'EDI WICAKSONO ABDURROSID', 'edikkp5@yahoo.com', NULL, '$2y$10$HNKY7MhxN6LWuvIAFWv6Le87QySDBpDZAn7Obx9gKjKkFt9Fvif/6', '0291-4247-496', NULL, '0821-1122-5276', NULL, 'KEP- 3461/IP.B/PJ/2017', NULL, 2015, NULL, '3373', '3373', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(62, 'EDOARDUS SATYA ADHIWARDANA', 'edoardusa@gmail.com', NULL, '$2y$10$l9GeGPcojKDDxvHkXxlBJe4LZNEde60aOw46lywn49W/VDxDud55y', '', NULL, '081-1951-0053', NULL, 'KEP-5151/IP.A/PJ/2019', NULL, 2019, NULL, '5675', '5675', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(63, 'EDWIN SUWANDHY', 'edwinsuwandhy@yahoo.com', NULL, '$2y$10$WKrgw7.UhBMMxyL4eCB2gOS.CrTwdmVDTzJ//DKpM3Os7Aw1b7RH2', '024-671-2445', NULL, '081-666-6508', NULL, 'KEP-1177/IP.B/PJ/2015', NULL, 2015, NULL, '1029', '1029', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(64, 'EKA MAYASARI', 'ekamayasari@ymail.com', NULL, '$2y$10$S7Ryfdl6sZrym/s6pTiw9eYSx1SSp0M.ZmS7WRVXHQL1Dqx2h4M2e', '-', NULL, '0818-0588-2884', NULL, 'KEP-1092/IP.A/PJ/2015', NULL, 2015, NULL, '3521', '3521', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(65, 'EKO BUDI SARWONO', 'eko_ebek@yahoo.com', NULL, '$2y$10$fNDYgbw6nvRR0SaYzFoPw.lqPEhnxfo2x4GtpLLpgykWYTyk6i.cu', '024-850-1829', NULL, '081-5653-2790', NULL, 'KEP-773/IP.B/PJ/2015', NULL, 2015, NULL, '1916', '1916', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(66, 'ELING RI KURNIATI', 'elingri78@gmail.com', NULL, '$2y$10$C9xZtBH4FMP8Sd486KLJ.urNiC5cWoWAruZbIM9vVj8rq56e9rcCG', '0286-595-043', NULL, '0853-8596-9632', NULL, 'KEP-1266/IP.A/PJ/2015', NULL, 2015, NULL, '4487', '4487', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(67, 'ENDANG DEWIWATI', 'ipm_smg@yahoo.co.id', NULL, '$2y$10$RE1jSxzGDJO0eSXKwGiVQeVk3r8eAknz3Ytlc61z.nRtg8J0m2dl6', '024-355-8248', NULL, '081-665-8945', NULL, 'KEP-5051/IP.A/PJ/2019', NULL, 2015, NULL, '1765', '1765', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(68, 'ENDI ROHENDI', 'rohendiendi59@yahoo.co.id', NULL, '$2y$10$f/vGB0EO/t./1t0oVE7SJeSx7qL9VlKVVeWttLkfnnIkaooaH5d.G', '0298-592-177', NULL, '0812-2854-3025', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2015, NULL, '2720', '2720', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(69, 'ENGGAR SULISTIYONO', 'mbahe1986@gmail.com', NULL, '$2y$10$KJimCrTbhorJ2kOxIy14wO/DCeelJxYlJdCc6yD78tFm.rB81HbtK', '', NULL, '0822-1448-1223', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(70, 'ERLINA SETYAWATI', 'erlinasetyawati@gmail.com', NULL, '$2y$10$MguxMiv2jsJLASHOo0LJaelqbOnEFuIEDTT1j.YeEkeZdYal.hKRy', '-', NULL, '081-776-4093', NULL, 'KEP-1063/IP.B/PJ/2015', NULL, 2015, NULL, '2923', '2923', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(71, 'ERU SETIAWAN', 'eru.setiawan@gmail.com', NULL, '$2y$10$BCeuAsljoOXnZfY0DeCsqOnGm8fvijvaibLbe7J1pkFewVDbIwsKy', '', NULL, '0812-287-8284', NULL, 'KEP-4824/IP.A/PJ/2019', NULL, 2018, NULL, '5295', '5295', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(72, 'ETI YUNIARTI', 'niar_ade@yahoo.com', NULL, '$2y$10$nlML6VSh5oPHuG9TGhdAS.Ug4S/Oyd/d7/n176nfEk3bE1TtY08JG', '0291-429-8377', NULL, '0815-7520-2942', NULL, 'KEP-1093/IP.A/PJ/2015', NULL, 2015, NULL, '4488', '4488', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(73, 'FERRY HABIBIE FATMAMURNI', 'ferry_habibie@yahoo.com', NULL, '$2y$10$DC2XcMwZhfCksbrc48xgQeV7GbVhQVhPealNP9h8rLO4tWnxW/l8O', '024-355-0907', NULL, '088-8213-9000', NULL, 'KEP-2731/IP.C/PJ/2015', NULL, 2015, NULL, '1405', '1405', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(74, 'FERRYANTO ADINUGROHO', 'antoniusferry2011@yahoo.com', NULL, '$2y$10$P/Xu6cCzg2lbYqch9SOASO1ITcSs7khT6YwgaZDGaUc28XDUE/uuG', '024-351-3402', NULL, '081-5663-7009', NULL, 'KEP-2541/IP.A/PJ/2015', NULL, 2015, NULL, '3426', '3426', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(75, 'FRANS SUDIRJO', 'frans_sudirjo@yahoo.co.uk', NULL, '$2y$10$niikRK8pYd/.CXJi73SgTOk.aeRyWwaN34laYSoGUCXqclkynOUFC', '024-356-1509', NULL, '0813-2577-4200', NULL, 'KEP-1336/IP.B/PJ/2015', NULL, 2015, NULL, '2106', '2106', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(76, 'FS BAHARI NUSANTARA', 'fsbahari@gmail.com', NULL, '$2y$10$ezQEwtnjFq0XLfzhQkpCAO3SIv2uAHYc9jA5U//RWiQZX6waAyej.', '024-7600-690', NULL, '081-129-6764', NULL, 'KEP-1727/IP.B/PJ/2015', NULL, 2015, NULL, '1288', '1288', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(77, 'FX BUDHY SANTOSO', 'fxbudhy@gmail.com', NULL, '$2y$10$SS4BRIiHmHt5DfqBdCmYeuKx7AVdSRyCuyJyVqYNJ8cqhlzFwShNa', '024-850-2241', NULL, '081-5764-5884', NULL, 'KEP-2134/IP.B/PJ/2015', NULL, 2015, NULL, '1915', '1915', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(78, 'GALUH NUKETHA ARDIANI', 'galuhnuketha@yahoo.com', NULL, '$2y$10$jLGLRnxPkkzMm3frdpmaFuq.DxjRDTDlYlC1hB6LIxR0DpS7oAr7y', '0298-521-446', NULL, '0812-2804-8989', NULL, 'KEP-2846/IP.A/PJ/2015', NULL, 2015, NULL, '3137', '3137', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(79, 'H MOEBASRI', 'konsultanmoebasrish@gmail.com', NULL, '$2y$10$IVP/5wFnH1LQ7y17MHOdju5xwDrj5DSLqgeA22Loyh5ILCnXc6ULC', '024-355-2914', NULL, '0813-2571-1952', NULL, 'KEP-633/IP.B/PJ/2015', NULL, 2015, NULL, '1134', '1134', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(80, 'H SOENARTO BS', 'soenartobs@yahoo.com', NULL, '$2y$10$d1.dClj1wcAGj4t/ZEAdCOLcv7XOh/jCX/ihZAweBq9qGeNOUAc.y', '024-7022-5818', NULL, '0813-2579-3848', NULL, 'KEP-1239/IP.B/PJ/2015', NULL, 2015, NULL, '514', '514', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(81, 'HADI SUSANTO', 'hadi_hasanjoli@yahoo.com', NULL, '$2y$10$G69R/WXyqATx1hAzhbLYS.dC3am86ZRGkwok9EoNCcLr4t/jI3fQu', '024-351-3402', NULL, '081-5655-4476', NULL, 'KEP-2796/IP.A/PJ/2015', NULL, 2015, NULL, '4303', '4303', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(82, 'HADIDTYA SURYA NUGRAHA', 'hadidt08@gmail.com', NULL, '$2y$10$6/jbNBv4z7ANgq7nRyHY0O14.ItCdiYpODrkjPsVjSXCHJ3a7.7we', '024-6700345', NULL, '08122-511-6499', NULL, 'KEP-3744/IP.A/PJ/2018', NULL, 2018, NULL, '4770', '4770', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(83, 'HANDOKO ADIPRASETYO', 'handokoadi1608@gmail.com', NULL, '$2y$10$Yq4mO8Izicv5W4HBR0/5HOsM137gTK.Mou4Y0M9rR0Jk./dqZIefu', '024-354-7668', NULL, '081-6488-1708', NULL, 'KEP-1016/IP.C/PJ/2015', NULL, 2015, NULL, '562', '562', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(84, 'HANDOKO SULISTYOWEDI', 'tyo_wedys@yahoo.co.id', NULL, '$2y$10$Kz.OmBkgt7wIKBggrxIEhedTzFj726OK0kX.2dSe6dM2p4pCSY0be', '024-760-7603', NULL, '081-2293-1734', NULL, 'KEP-3115/IP.C/PJ/2015', NULL, 2015, NULL, '1478', '1478', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(85, 'HARHINTO TEGUH', 'harhintoteguh@yahoo.co.id', NULL, '$2y$10$pnqNRdNL6tbiFWcLNxb5.epTgm.TKffFaN/uPev0XsDOGmN0AimHW', '024-845-6408', NULL, '081-129-7525', NULL, 'KEP-1161/IP.B/PJ/2015', NULL, 2015, NULL, '3384', '3384', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(86, 'HARTANTO PRAWIRO', 'frank.tanto@gmail.com', NULL, '$2y$10$FvrMONict/W8O8JTy92WauUHIgF44.ty2scl8gZG6w.QcKCdq5xYS', '024-7600-690', NULL, '081-5764-0066', NULL, 'KEP-1145/IP.B/PJ/2015', NULL, 2015, NULL, '4085', '4085', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(87, 'HARY KURNIAWAN', 'harykurniawan53@yahoo.com', NULL, '$2y$10$WSGU.CrT7nazGf8Vt2V58OfCfYUfc1zl88ulxIvN5NlcjrqksdpAK', '024-761-4090', NULL, '081-666-5486', NULL, 'KEP-2384/IP.A/PJ/2015', NULL, 2015, NULL, '2304', '2304', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(88, 'HENDRA GUNAWAN', 'hendragunawan@bgtaxconsult.com', NULL, '$2y$10$1IKqopkcw.MJfoFfisxTJO22fVQSzdf6bV0yb4lNfUyxxtBkD6PDW', '024-7606-011', NULL, '0821-1133-9997', NULL, 'KEP-5589/IP.C/PJ/2019', NULL, 2015, NULL, '3372', '3372', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(89, 'HENRI ERWANTO', 'henri_erwanto@yahoo.co.id', NULL, '$2y$10$Ef9e.oUMHwtSTzJufzlETeLNm6CYs28upsEM3tfQZ8wUA6/GoS4Le', '024-7692-8811', NULL, '0812-2672-6490', NULL, 'KEP-4065/IP.B/PJ/2018', NULL, 2017, NULL, '3042', '3042', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(90, 'HENRY KURNIAWAN WIRYADI', 'hkw_tax@yahoo.com', NULL, '$2y$10$MzCNiibAv5QbN4rpvR/4fuKA/8PQqa0/YW1X9fjaeH4/PB01rZg3e', '024-747-0108', NULL, '0818-0241-7749', NULL, 'KEP-2056/IP.C/PJ/2015', NULL, 2015, NULL, '1899', '1899', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(91, 'HERI SUTRISNO', 'muliagemilang@yahoo.com', NULL, '$2y$10$auCd9ry1nz0XdQhYpXTAW.C1KMKvDxS58abHlBuG7EKNtsYx1OvFO', '024-7464-505', NULL, '081-5663-0494', NULL, 'KEP-2654/IP.B/PJ/2015', NULL, 2015, NULL, '2151', '2151', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(92, 'HERU BUDIJANTO PRABOWO', 'heru.b.prabowo@djarum.com', NULL, '$2y$10$/i00aNEalZaQPou6O7DHtOEGpe6Yc5Wc/05JuvCDekViCbfS4.drC', '0291-431-901', NULL, '081-2287-8406', NULL, 'KEP-947/IP.B/PJ/2015', NULL, 2015, NULL, '3371', '3371', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(93, 'HERY PRASETYO WIBOWO', 'hp_wibowo12@yahoo.com', NULL, '$2y$10$u3nNfj74vZ2HjocthEA3FuAMDtsCrcomCEQdOpdKE.FUC7FgtOnXm', '024-747-3901', NULL, '0856-4037-6263', NULL, 'KEP-1557/IP.A/PJ/2015', NULL, 2015, NULL, '4088', '4088', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(94, 'HIMAWAN NOERDJAJA', 'himawannoerdjaja@gmail.com', NULL, '$2y$10$PkYcFSktRREF6/dNjBSNe.PNXnJ0r4fVIIwHvqk4ECsDzVC1HLINm', '024-747-9046', NULL, '081-666-0700', NULL, 'KEP-898/IP.B/PJ/2015', NULL, 2015, NULL, '1490', '1490', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(95, 'HUSIN RAMEDAN SUTJIADI', 'anandahusin@yahoo.com', NULL, '$2y$10$3wZpuAsexJAKP4V8LUBvdOc.BfAlDGvLiKY9a54aT0khQjCNS93S2', '-', NULL, '081-5777-6665', NULL, 'KEP-3089/IP.B/PJ/2015', NULL, 2015, NULL, '3201', '3201', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(96, 'IGNATIUS DANANG KUSUMOYUDO YOKANA', 'ign.danang.k@gmail.com', NULL, '$2y$10$.K0um/Kj5X3auKtHOAk0seqhCq8VJD5cggXJD7qdH4ljZoHJzIzai', '', NULL, '0838-3835-5990', NULL, 'KEP-5416/IP.A/PJ/2019', NULL, 2019, NULL, '5596', '5596', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(97, 'IKA ADHIAS CAHYANINGRUM', 'keiko.jamakaru@yahoo.co.id', NULL, '$2y$10$PcFgxpZv.ybTx1dYuW/gvOyPViEpEJ5CyeKqubrVFid7imX5c/F4K', '024-3511-253', NULL, '0813-2552-0092', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '4397', '4397', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(98, 'IKA PUTRI PARLINASARI', 'kaput1976@yahoo.com', NULL, '$2y$10$S6s8H.S3MakqN5w/BXPPRuP.e6rXMtO9PqKdYrxMDyT4T1kbaqZCe', '024-761-0158', NULL, '0813-2569-9977', NULL, 'KEP-1601/IP.A/PJ/2015', NULL, 2015, NULL, '4490', '4490', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(99, 'INDAH KEMALA SARI', 'kemala_sariku@yahoo.com', NULL, '$2y$10$5eLyq1J0QKckEb5e.eoteutJsztftLzxQJrulMyhT7eLJqO0txaIe', '-', NULL, '081-5654-0631', NULL, 'KEP-1540/IP.C/PJ/2015', NULL, 2015, NULL, '3313', '3313', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(100, 'INDRA ABINTYA RIFAI', 'indraabintya@gmail.com', NULL, '$2y$10$Eahg46M/XmPfOrAkAwj6/OLJaEVR4r1h9eRuJRNQ5GtiYjnucu04e', '', NULL, '0821-3479-2392', NULL, '', NULL, 2019, NULL, '5751', '5751', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(101, 'INDRA GUNAWAN', 'indraliang@yahoo.co.id', NULL, '$2y$10$3IR590nQ2SPJBN/rufUDqOFIJulaC2iFjQHzU4mFwcrGWL/8e9Z1S', '024-7600-690', NULL, '081-5653-1207', NULL, 'KEP-1335/IP.A/PJ/2015', NULL, 2015, NULL, '4084', '4084', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(102, 'IVAN SAMSUDIN', 'ivan_samsudin@yahoo.com', NULL, '$2y$10$v0Z6bsUOgxgw8vbJDQc4quKUaykF0XayGhygoqbJdU1lMrhGzCKCG', '024-351-3982', NULL, '0818-0585-2525', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '1719', '1719', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(103, 'IWAN SETIADI SANYOTO', 'e1setiadi@yahoo.com', NULL, '$2y$10$mvZ6tyJSnig9OVA/qoJuK.JkO4eIxnykMszKAn.IFHpdKtB/CZvyS', '024-354-6735', NULL, '081-7071-5155', NULL, 'KEP-4851/IP.B/PJ/2019', NULL, 2016, NULL, '2968', '2968', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(104, 'JAN PRIHADI SURJAWIDJAJA', 'jansemarang@ymail.com', NULL, '$2y$10$QqAWbfNnJ.P7gOOheiTbW.B9t3gTtcVgMsV/JXzeAhh4Ym7vKTsem', '024-3555-293', NULL, '0888-256-2448', NULL, 'KEP-2172/IP.B/PJ/2015', NULL, 2015, NULL, '1476', '1476', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(105, 'JEFRY HARDJODINOTO', 'semicorp@yahoo.co.id', NULL, '$2y$10$Gf5uFRqjViBKpWtNlvHi1uiFIGweIKpVScNeyvoSNoKkoTIBF88Ru', '024-8457157', NULL, '0815-770-6540', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(106, 'JEMI', 'schorchi2003@yahoo.com', NULL, '$2y$10$do2y2z38ahFR9umnYl6c3O.ageJkArlyRYILzdyZiEydWvW3PAVPC', '0285-434-099', NULL, '0815-7507-7070', NULL, 'KEP-784/IP.B/PJ/2015', NULL, 2015, NULL, '2961', '2961', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(107, 'JM HARIANTO', 'kkp_jmharianto@yahoo.com', NULL, '$2y$10$iS98rAuUNPZVvtpbd30iFejoqc07yf01EbvS1PWSZT7rVi5DjYk8e', '024-760-8789', NULL, '081-129-0785', NULL, 'KEP-462/IP.C/PJ/2015', NULL, 2015, NULL, '508', '508', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(108, 'JOE ELSA ANDRIYANI', 'elsa.andriyani810@gmail.com', NULL, '$2y$10$YIWPcxMs.Fb1q28wGQTb5urCT/B3dShHEmy5cp1fYl9HzKO9Blpj6', '024-7644-0348', NULL, '0819-3192-3380', NULL, 'KEP-4491/IP.A/PJ/2019', NULL, 2018, NULL, '5318', '5318', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(109, 'JONAS SUBARKA', 'jonas.subarka@gmail.com', NULL, '$2y$10$9LQVAWTHGVFEyPx8LeXZmen/URj86oqCVHMeUG9BA94XZxctEwiwW', '024-7614070', NULL, '0817-203-048', NULL, 'KEP-4813/IP.B/PJ/2019', NULL, 2017, NULL, '4625', '4625', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(110, 'JUIST GUNAWAN', 'juist_gunawan@ymail.com', NULL, '$2y$10$C5GmUfGwrI7PnxQRJ.zT/OZF9t565huZqDfTL5gegYXKUn9s4znbS', '024-3555-293', NULL, '0812-2549-0000', NULL, 'KEP-3831/IP.A/PJ/2018', NULL, 2016, NULL, '1726', '1726', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(111, 'JUSAK BUDI PRASETYO', 'prasetyojusakb@gmail.com', NULL, '$2y$10$pyUqul5mvFHRmpK5vOfTIOBtE5BW0sOEyjCeD0NTGA3gHdZqCHAM2', '024-841-6012', NULL, '081-666-6846', NULL, 'SI-4309/PJ/2014', NULL, 2016, NULL, '990', '990', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(112, 'KIAN TIK', 'alexindo_utama@yahoo.com', NULL, '$2y$10$UmRC8NZBEZNA9YMl1tQSHu8dxdhzkybzvMrsH9AYGu609XtPE41ZS', '024-7658-4801', NULL, '081-127-2826', NULL, 'KEP-3994/IP.C/PJ/2018', NULL, 2015, NULL, '1270', '1270', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(113, 'KOK KHAY MING', 'khay_ming@yahoo.co.id', NULL, '$2y$10$pArq4gLK5R.mCgZKK0ERp.Xl2/DE/bKNKWEe/86XfIRHZIjXWOKKe', '024-7600-690', NULL, '0815-7539-6298', NULL, 'KEP-1728/IP.B/PJ/2015', NULL, 2015, NULL, '2039', '2039', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(114, 'KOK LINDA', 'lindeespm@yahoo.com', NULL, '$2y$10$mG.VCh/0O9WiVYIHuzhBSOkwKsBeJoUVzfJRwUPztsu27oKnt/PFe', '024-762-1982', NULL, '0813-2585-7218', NULL, 'KEP-2254/IP.A/PJ/2015', NULL, 2015, NULL, '2073', '2073', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(115, 'KRISTINA', 'kristin.pajak@gmail.com', NULL, '$2y$10$Up30XOc02u4rK4oPsYHP4uIE870h901o2e27tl46JyXpiMXIbbb3K', '024-766-1244', NULL, '0818-0584-9322', NULL, 'KEP-1830/IP.B/PJ/2015', NULL, 2015, NULL, '2990', '2990', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(116, 'KRISTINA RATNA BUDIJATI', 'na2soenpoet@gmail.com', NULL, '$2y$10$2Ezcr51hugnYALVAPI87HO4jtXoGchFd6bICD8q7FhaHlcDo951Ty', '024-761-5556', NULL, '0818-0588-6866', NULL, 'KEP-2371/IP.A/PJ/2015', NULL, 2015, NULL, '4376', '4376', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(117, 'KRISTINA SARI HUNANDAR', 'kristinasarihunandar@gmail.com', NULL, '$2y$10$81IFGqW6tY.0Gu.rnld7AeaXC7iDon5AyiLz3O2daaDtEGksHkXsa', '', NULL, '0818-0589-8984', NULL, 'KEP-5378/IP.A/PJ/2019', NULL, 2019, NULL, '5559', '5559', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(118, 'KURNIA WIDIASTUTI', 'pn7676@yahoo.co.id', NULL, '$2y$10$oTTWDQs.hI4R55CScRh9pe/DVggr4tLR7W2IJ3KLTUQhwlL8MmzC.', '0291-59-8841', NULL, '0813-2566-5660', NULL, 'KEP-346/IP.C/PJ/2015', NULL, 2015, NULL, '1683', '1683', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(119, 'KURNIAWAN JOKO PURWOKO', 'mrjack_123@yahoo.com', NULL, '$2y$10$X1YNomO97F/xQA3g0TVXSuoBiG5SAq5ifQ.09kBjTlmFM14s6cIF.', '024-760-7047', NULL, '0812-2803-9318', NULL, 'KEP-2029/IP.B/PJ/2015', NULL, 2015, NULL, '2651', '2651', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(120, 'LEKSAMANA WISNU HARTONO', 'leksamanawisnuhartono@gmail.com', NULL, '$2y$10$o0rzjX9.2XU0FHFetmzbTua9ic.0a9av9uDyB8dXRt7VReH0Fgj7W', '024-355-8300', NULL, '0815-7521-2345', NULL, 'KEP-2700/IP.A/PJ/2015', NULL, 2015, NULL, '2045', '2045', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(121, 'LENAWATI', 'alena.pajak@gmail.com', NULL, '$2y$10$wRVeyN1H8Aj7wmPYQ/yu3uu80H2VG8g2P9Q6Rq8rfVmd1Dfw2DMxW', '', NULL, '0813-2612-8181', NULL, '', NULL, 2019, NULL, '6098', '6098', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(122, 'LIAN RAHMAT PUTRANTO', 'lianputranto@yahoo.com', NULL, '$2y$10$tH06BU/vjvjPjp8wE.0LvO2r9/AK7B.Fqt9nu0Ky8YlEjAm7jc69O', '', NULL, '0857-2724-6175', NULL, 'KEP-5299/IP.A/PJ/2019', NULL, 2019, NULL, '5521', '5521', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(123, 'LIEM ERNAWATI', 'liemernawati@yahoo.com', NULL, '$2y$10$S28fPIeulttwWs/72etqc..8IJAszi3wlo/ynfevYxBH8BGxhgqDG', '-', NULL, '081-7952-0406', NULL, 'KEP-2315/IP.A/PJ/2015', NULL, 2015, NULL, '4491', '4491', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(124, 'LILIEK SETYAWATI', 'liliek.info@gmail.com', NULL, '$2y$10$JpHMCYkbOhct8YESKjSIu.4hUsdYQvuXv73CJUfXGGIngzq/DpDhi', '', NULL, '081-5654-0999', NULL, 'KEP-4700/IP.A/PJ/2019', NULL, 2019, NULL, '5473', '5473', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(125, 'LUCIA DIAH PRIMAWATI', 'tax.luciadiah@gmail.com', NULL, '$2y$10$vM2rMwShHJPzGwRYfZz8ceS6QublXR5HRSEl7GfClDw2u.kltBzw6', '', NULL, '081-5667-0229', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(126, 'LUKAS HERTANTO', 'gg.lukas@yahoo.com', NULL, '$2y$10$7BJDNuytXS4eXfujpwPxU.gYq6dBuV882JQUkI3v2TcgSzGeKuqnW', '024-355-2071', NULL, '0856-4009-6005', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '2226', '2226', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(127, 'M SLAMET UMBARAN', 'umbarancpa@gmail.com', NULL, '$2y$10$bME3uKdb.ZXS3kaE1pJmtuyee9CXx6R./j.ZPGtJNk8650uZ8HMau', '024-845-1651', NULL, '081-724-3607', NULL, 'KEP-2763/IP.C/PJ/2015', NULL, 2015, NULL, '1298', '1298', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(128, 'MARGARETHA MEILIANA', 'm_margaretha_m@yahoo.co.id', NULL, '$2y$10$57Zbj0qd5Gj4TEThMcV7SuO04r0h/CownsE0I7RHi49swLfnQ6k5O', '024-355-8248', NULL, '0878-3286-1989', NULL, 'KEP-3225/IP.B/PJ/2016', NULL, 2016, NULL, '1764', '1764', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(129, 'MARIA RANI IRIYANTI', 'rani_uniq@yahoo.co.id', NULL, '$2y$10$Z18A4V0lPnqCYrEIbreb3.ODtYcALKsvts43xYdWq0F.AXdtDyHXq', '024-671-4856', NULL, '0815-7556-3063', NULL, 'KEP-1812/IP.A/PJ/2015', NULL, 2015, NULL, '4329', '4329', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(130, 'MARMIYATI', 'atimarmiyati@gmail.com', NULL, '$2y$10$.deXeAuiTCOYoGHccYbdtOtVhf.9ww3uirlPt75Tpgispy9G6AU7y', '-', NULL, '0813-9094-2560', NULL, 'KEP-1732/IP.C/PJ/2015', NULL, 2015, NULL, '2173', '2173', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(131, 'MATHIAS MASDUKI', 'mathias_masduki@yahoo.com', NULL, '$2y$10$SqVbV.KZ.SvcaL68xDobN.hHVcAKgnbbUpjBq8WWTY3xnFLrAPhIa', '024-844-1018', NULL, '081-845-1764', NULL, 'KEP-1206/IP.B/PJ/2015', NULL, 2015, NULL, '1941', '1941', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(132, 'MEKARDI', 'mekardi@gmail.com', NULL, '$2y$10$c8zlBqukI1G0lNSRsb2oju8bd3cBGZ8zrlHEzeemVARx7Zxn579xq', '-', NULL, '0856-4152-8105', NULL, 'KEP-1971/IP.B/PJ/2015', NULL, 2015, NULL, '2969', '2969', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(133, 'MELISA DIANAWATY', 'melisa.wina@yahoo.com', NULL, '$2y$10$paVcfQ2oZ5dknZyLmngWQ.v51nr/iZHT7/MhbEJxc./NDoEwhllju', '024-7667-0860', NULL, '0815-7587-7782', NULL, 'KEP-4411/IP.B/PJ/2019', NULL, 2015, NULL, '2732', '2732', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(134, 'MELISSA DEVINA NUGROHO', 'mel_dvna@yahoo.co.id', NULL, '$2y$10$ll9hRnTvH2PNYPF/cjlbDuEekyA9P3Oxd4yLrxKsqmEQ.ck9Y036i', '024-355-8248', NULL, '0819-1454-2390', NULL, 'KEP-2581/IP.A/PJ/2015', NULL, 2015, NULL, '4404', '4404', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(135, 'MICHAEL DWI MARIANTO', 'michaeldwimarianto4@gmail.com', NULL, '$2y$10$KFkCkvRHoBlQbwLChAl84O79kYpaIL0Zl/wXXS1O/7s4OcYi3Y38.', '-', NULL, '0812-2558-8151', NULL, 'KEP-2422/IP.A/PJ/2015', NULL, 2015, NULL, '4394', '4394', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(136, 'MOCH ABDUL SJUCHUR', 'abdulsyukurbrevet@gmail.com', NULL, '$2y$10$bd9fvowRhf9892h9tUJSYegjIRxXTzE1z919eoYya/h4.GxZUSK2a', '024-351-8247', NULL, '0813-2600-3700', NULL, 'KEP-800/IP.B/PJ/2015', NULL, 2015, NULL, '1596', '1596', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(137, 'MOSES MURDIYANTO', 'moses_janvandai@yahoo.com', NULL, '$2y$10$I3NMDO076GBgxzH3uWwUtuZEvC3506kUZb96IwgR606Z8zjk9xvaG', '024-7667-1244', NULL, '081-1271-0168', NULL, 'KEP-1548/IP.B/PJ/2015', NULL, 2015, NULL, '2553', '2553', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(138, 'NENI LESTARI', 'nlesta33@yahoo.com', NULL, '$2y$10$6wq.K/oTtPJyk36LJoQDWOCEb2Cc3ypNcapecqoBY5/pToP5CYxsK', '-', NULL, '0813-2565-7388', NULL, 'KEP-1013/IP.A/PJ/2015', NULL, 2015, NULL, '4236', '4236', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(139, 'NICOLAS HIMAWAN', 'himawannicholas@gmail.com', NULL, '$2y$10$QJ23sg48UGCpLkWojD8yEeySLbU8CH76I/q4Ut/DYOtbIMfD42lWC', '024-351-2535', NULL, '0851-1333-3038', NULL, 'KEP-2546/IP.A/PJ/2015', NULL, 2015, NULL, '2656', '2656', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(140, 'NIRSETYO WAHDI', 'nswahdi@gmail.com', NULL, '$2y$10$o7nqjeO3ADmLgsMKzj1DDe0r7m6S6gNXcO0vPX0PBDP7i2xx8S6JW', '-', NULL, '081-5663-4576', NULL, 'KEP-2673/IP.A/PJ/2015', NULL, 2015, NULL, '4429', '4429', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(141, 'OEI KEZIA CHRISTINA', 'kzchrs73@yahoo.com', NULL, '$2y$10$TWUgTLh9ca2Zitl.cVBBOuqw9TZXip8NIRIfGk/.ZGc1sTMZnQm/6', '024-761-0158', NULL, '081-1257-7735', NULL, 'KEP-1658/IP.C/PJ/2015', NULL, 2015, NULL, '1489', '1489', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(142, 'OEI VENNY ARVIANA HARTONO', 'vennyarviana@gmail.com', NULL, '$2y$10$pm3c.OmNa7Nfnz/XyYnqM.7hjJgDJdl/..rB1zV6we.C2Amspc25.', '021-8356363', NULL, '081-7056-8800', NULL, 'KEP-4880/IP.B/PJ/2019', NULL, 2017, NULL, '4676', '4676', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(143, 'ONG CAROLINA', 'carolinaong91@gmail.com', NULL, '$2y$10$mwCapk470qnvtyC7GuX9jODOAvsg77ydPrq1hfG0GWsf7MPIz49U6', '', NULL, '0818-0580-0001', NULL, '', NULL, 2019, NULL, '6079', '6079', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(144, 'PANJI WARYUDIANTO', 'panji86@consultant.com', NULL, '$2y$10$3eEQfSv8zbGEU0ywejdYoe6zuRpFTrGcKhaDwTKPBxpw0EYdspfbK', '024-761-4070', NULL, '0813-2514-6461', NULL, 'KEP-4299/IP.C/2018', NULL, 2016, NULL, '3043', '3043', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(145, 'PAULUS HARSONO', 'paulus_harsono@ymail.com', NULL, '$2y$10$Ri8Cujr81m5XE6ozRDiAverdaBqUvFILCOMhuXd1VCRCRGHxxqL56', '024-356-1419', NULL, '081-6488-7467', NULL, 'KEP-1941/IP.C/PJ/2015', NULL, 2015, NULL, '1333', '1333', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(146, 'PAULUS SURIANSAH SOSILA', 'sosila@indo.net.id', NULL, '$2y$10$fCTGSQz9UclqxjyFWkzu7.hHHrP9s7XwMJuuhUnApkYNRY3cy6YJe', '024-659-5678', NULL, '081-666-36-27', NULL, 'KEP-4023/IP.B/PJ/2018', NULL, 2015, NULL, '2552', '2552', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(147, 'PHO SENG KA', 'phoska@yahoo.co.id', NULL, '$2y$10$iL1KjBuBEosUtB8D0Xb5fup1tlcboNNkavpk6f8twGdHnwD6RRbQ2', '024-355-8248', NULL, '081-829-6617', NULL, 'KEP-2219/IP.C/PJ/2015', NULL, 2015, NULL, '1477', '1477', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(148, 'PING ASTONO SETIAWAN', 'ping.astono.setiawan@gmail.com', NULL, '$2y$10$Q/npPqNUt2ZVbfSFZPEGlOOW8xwDcdahnDz.OKNdJ/tAmPybSVQZ6', '024-351-4788', NULL, '0821-3421-9777', NULL, 'KEP-1412/IP.B/PJ/2015', NULL, 2015, NULL, '511', '511', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(149, 'PONCO PRASETYO', 'asisi.panca.prasetyo@djarum.com', NULL, '$2y$10$JygixdupK8uNo2NKfidN4uJ.t83/gUw.YYGv8fVHOEQSIvGqq1.nm', '-', NULL, '0878-3180-4949', NULL, 'KEP-1372/IP.B/PJ/2015', NULL, 2015, NULL, '3370', '3370', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(150, 'PRIMAYUDHA OKKY MAHENDRA', 'primayudha.okky31@gmail.com', NULL, '$2y$10$rASF2u5u0sfGdOzDkWZMse1t15cfgS2/xhqBVu0xz7X1Zf96cyk8i', '', NULL, '0858-8174-8141', NULL, '', NULL, 2019, NULL, '6042', '6042', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(151, 'PURWANTARA', 'purwantara.toro@yahoo.com', NULL, '$2y$10$e8ChJdqfAQvrdIaPhyggz.GWGy4FSptmwCC9x4v4uysgxFgtrmvmO', '024-672-4960', NULL, '081-5664-5829', NULL, 'KEP-884/IP.A/PJ/2015', NULL, 2015, NULL, '4061', '4061', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(152, 'PURWANTI', 'pwanti05@gmail.com', NULL, '$2y$10$.DdvvWMS3SvEXXZ99SSuSOxB0TJ29BrTk9FBzSMSKdjwlVlm.w.U.', '024-762-4507', NULL, '0813-2579-6503', NULL, 'KEP-2344/IP.A/PJ/2015', NULL, 2015, NULL, '3437', '3437', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(153, 'R. RIFKY RUSTAMAJI WINIARTO', 'rifky.rustamaji@gmail.com', NULL, '$2y$10$B7yY3hb8x2WpKXgdyrA8LuSsUd9MwVh01QaU3WKawEB2o3KMooVCq', '-', NULL, '0856-4004-5476', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(154, 'R SOEKOTJO', 'soekotjo50@gmail.com', NULL, '$2y$10$UUtSdWSudQPLD5tbSbSvzOP42WNhIdfQdU2JOE3A8SXrA9d0IJWzW', '-', NULL, '0812-2800-131', NULL, 'KEP-919/IP.B/PJ/2015', NULL, 2015, NULL, '1783', '1783', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(155, 'RADEN RORO LUCIA DARYANTO', 'lizzierd_99@yahoo.com', NULL, '$2y$10$b4YvQmEcnWeJ0KAwTHoo6OSoBwVBekhnvsnshv/xo9W4jnEdu7C1y', '0298-603-1145', NULL, '0818-0269-6000', NULL, 'KEP-2540/IP.B/PJ/2015', NULL, 2015, NULL, '2289', '2289', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(156, 'RANI ANGGRAINI', 'rani.anggraini80@gmail.com', NULL, '$2y$10$apxeyu3YWT28QpVv5zS6EeZBnpPm1OrAgXq.h12dPBgXo0GhhObJu', '024-8412000', NULL, '0813-2577-4021', NULL, 'KEP-5055/IP.B/PJ/2019', NULL, 2018, NULL, '4864', '4864', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(157, 'RATNA IKA PRATIWI', 'ratnaikap@gmail.com', NULL, '$2y$10$eDEAaLqTiUAUgaGXQ/nYjOSO//PqiTYvvPDSavo15x6/Jmma/QTva', '-', NULL, '0811-8745-222', NULL, 'KEP-3379/IP.C/PJ/2016', NULL, 2017, NULL, '1872', '1872', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(158, 'RATNA STYAWARDANI', 'ratnastyawardani_consulting@yahoo.com', NULL, '$2y$10$Kx9taooFSSWlKhLSGcI9ae0MbMD8ORDT.7z6iroBjT/yGw1dz1s5i', '024-355-1843', NULL, '0818-0335-7888', NULL, 'KEP-628/IP.B/PJ/2015', NULL, 2015, NULL, '1385', '1385', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(159, 'RATYA MARDIKA TATA KOESOEMA', 'ratyamardikatk_kkp@yahoo.com', NULL, '$2y$10$oXcPK3IpeoXco1lDqxD2E..I2KPkriIQ1iPvFCjgIo9RN4zwF4V8q', '024-761-6488', NULL, '0878-3285-5199', NULL, 'KEP-3464/IP.B/PJ/2017', NULL, 2015, NULL, '2479', '2479', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(160, 'REGINA BELLA SOEGIJANTO', 'reginabella.s@hotmail.com', NULL, '$2y$10$VLbrtZBcAkwhsYWyf94Zs.tAP1dnxPABLS441ExkY73VaLKY.WOdK', '-', NULL, '0838-4228-5700', NULL, 'KEP-4970/IP.B/PJ/2019', NULL, 2017, NULL, '4563', '4563', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(161, 'RISWANDHA ADI WIBOWO', 'riswandha.adiwibowo@gmail.com', NULL, '$2y$10$bFCK7AvGVYPmwPwIUOsyjuppeX.X0NcxNTsyYqhGQQYqcuXdUWRfu', '024-8412000', NULL, '0822-4388-8485', NULL, '', NULL, 2019, NULL, '5944', '5944', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `work_phonenumber`, `work_address`, `home_phonenumber`, `home_address`, `no_ijin_praktek`, `birthdate`, `year`, `NPWP`, `NRA`, `username`, `brevet`, `status`, `whatsapp`, `facebook`, `twitter`, `instagram`, `linkedin`, `position`, `avatar`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(162, 'RUDI AGUS RIYANTO', 'rudiagus13@gmail.com', NULL, '$2y$10$p5DOd4LkOhYZGHby1wcbOuVHzd5wBkokIBDcLu59sqfjyn.BhRCQK', '024-761-0670', NULL, '0852-2500-3849', NULL, 'KEP-2397/IP.B/PJ/2015', NULL, 2015, NULL, '2194', '2194', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(163, 'RUDIANTO HERTANTO', 'indojasa.pratama@ymail.com', NULL, '$2y$10$xpLW9umHCad31.Dxt8NCeOfbnbYaeeP.YcSVXfYx5m5bIYxcWDmv2', '024-673-5735', NULL, '081-666-6807', NULL, 'KEP-1229/IP.B/PJ/2015', NULL, 2015, NULL, '1570', '1570', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(164, 'RUDIJANTO LIYANTO', 'rudijanto_consultant@yahoo.com', NULL, '$2y$10$O6ipcxIrkhntrUYI9I9ureUz5cW6kq6DVKMCejCMD6v7qNlOTtlLa', '024-761-0158', NULL, '081-6666-084', NULL, 'KEP-1792/IP.C/PJ/2015', NULL, 2015, NULL, '1556', '1556', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(165, 'RUMANTO', 'anto.wanamukti@yahoo.com', NULL, '$2y$10$v9R9NlaaWmLYkhWIrAayv.9JTUEXg12jjqOE6W32CLyrjxtVqBlTy', '-', NULL, '0813-2511-0140', NULL, 'KEP-2961/IP.B/PJ/2015', NULL, 2015, NULL, '2495', '2495', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(166, 'SAMUEL TEGUH TJAHJADI', 'samuelteguhtjahjadi@yahoo.com', NULL, '$2y$10$UC91SQGohpa/GDCyYi9H8OHlKY/Vqrg4svKA/Pc/NsQ5xLFJspJQy', '024-354-8552', NULL, '081-2255-1300', NULL, 'KEP-1763/IP.A/PJ/2015', NULL, 2015, NULL, '2001', '2001', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(167, 'SENDY PURWANTO PRILIYAWAN', 'kkp.sendypriliyawan@gmail.com', NULL, '$2y$10$wb3Xmv0VOAH8QxzpwIEfMO8jwdTNZ7LXLnB41U0uiMfAKe4ccGkt.', '024-672-2356', NULL, '0813-2521-6798', NULL, 'KEP-2009/IP.B/PJ/2015', NULL, 2015, NULL, '2392', '2392', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(168, 'SETYA BOPOBUNDO', 'setyabopobundo@gmail.com', NULL, '$2y$10$c336I8FEQexGt0Wzchh4vOiLOknOPvOv0qRkGA4EaxDLMSGVvYoSS', '', NULL, '0813-9012-5084', NULL, '', NULL, 2019, NULL, '5980', '5980', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(169, 'SISKA YULIATI', 'siskayuliati@gmail.com', NULL, '$2y$10$n1jj84OvfykfXVyKeOVPNejTdJPun9HKha5zuI//CCYxPAfAAd692', '-', NULL, '0821-1450-2392', NULL, '', NULL, 2018, NULL, '4830', '4830', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(170, 'SITI PARWITRI LISTIANA', 'parwitri_listiana@yahoo.co.id', NULL, '$2y$10$vSABXbf7Anj7aVLtU.Gwu.OgI89VScfFSiDot6MlXm6JwoudqD4Qq', '024-850-1906', NULL, '081-2254-9668', NULL, 'KEP-2228/IP.B/PJ/2015', NULL, 2015, NULL, '2924', '2924', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(171, 'SOEPRIJONO', 'prie_diontamsen@yahoo.com', NULL, '$2y$10$0TVfuq4G9zlr2nO4mTY2h.yvdK9aTETon249rZTUYd93dYB6l7xIq', '024-355-6732', NULL, '085-6268-2244', NULL, 'KEP-1524/IP.B/PJ/2015', NULL, 2015, NULL, '2485', '2485', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(172, 'SOFFWAN AJI', 'amc_aji@yahoo.co.id', NULL, '$2y$10$9pR5ZcW1fbjOnMoSCefc3OZGzQFaEWxNE6D9CCPyLCHvvPV74aBPW', '-', NULL, '0812-2865-1999', NULL, '', NULL, 2017, NULL, '1866', '1866', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(173, 'SONNY HADI SUPRAPTO', 'sigma_consultant@yahoo.co.id', NULL, '$2y$10$kst7o8ylzUuGR5G8KIJr1OoOg6PhhHUbW1Jz6OWg0.k2BN3E6vlae', '024-674-6551', NULL, '081-5664-5190', NULL, 'KEP-903/IP.B/PJ/2015', NULL, 2015, NULL, '2657', '2657', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(174, 'SOPHIAN WONGSARGO', 'kap.sophian@yahoo.com', NULL, '$2y$10$SdBNeGAOXwQ.fC/boysTIuh6Vt/j.TFUoY7Kpwj030QU7WKxXu4SW', '024-8640-2994', NULL, '081-2289-0429', NULL, 'KEP-3594/IP.A/PJ/2018', NULL, 2017, NULL, '4677', '4677', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(175, 'SRI HARTADI SROJO', 'adirodjo54@gmail.com', NULL, '$2y$10$4oc50mFbArBkRDAh4q1.yePt0OGdOB5F1HqFc44X6qo29.rnSauN2', '-', NULL, '0812-5931-6966', NULL, 'TIDAK PUNYA IJIN PRAKTIK', NULL, 2016, NULL, '1825', '1825', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(176, 'SRI LESTARI', 'tari_lestari2380@yahoo.com', NULL, '$2y$10$qCnv3bGFftw7tSuQhLVqw.h4uzOijBKWLMj4OVWB.sHSwqS6uLvwS', '024-761-0158', NULL, '0813-2602-2258', NULL, 'KEP-1745/IP.A/PJ/2015', NULL, 2015, NULL, '4489', '4489', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(177, 'SRI LESTARI', 'srilestari2284@gmail.com', NULL, '$2y$10$bzggfSlWRNB8oDvqKHYISOEnj6V5j33MYQPpXPVUTWko.dHZgWYMi', '', NULL, '0896-5473-8622', NULL, 'KIP-5778/IP.A/PJ/2019', NULL, 2019, NULL, NULL, NULL, 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(178, 'STEVEN TANUJAYA', 'steven_tanujaya88@yahoo.com', NULL, '$2y$10$xRHSudAN7fOvt3C8rmJaUumQo4gZocx5wZx2CdbR6iqE.6FIrtmMe', '024-7463877/7463778', NULL, '081-7415-4440', NULL, 'KEP-3593/IP.A/PJ/2018', NULL, 2017, NULL, '4582', '4582', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(179, 'SUBADRIYAH', 'baddyjepara@gmail.com', NULL, '$2y$10$n/uXzW57ESJWemcaWsnz6eYJibO7tFk62VW7.lV9aYWIiK1l5GXjC', '-', NULL, '0813-9035-5869', NULL, 'KEP-1986/IP.A/PJ/2015', NULL, 2015, NULL, '3820', '3820', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(180, 'SUBAGIONO TJONDRO', 'konsultan_subagionotjondro@yahoo.com', NULL, '$2y$10$aYA31yBPKKENxzo1YsqFg.r5DQluifCSBqeVOCN1BRxIUMB7BrAEO', '024-356-2234', NULL, '081-6488-5339', NULL, 'KEP-682/IP.B/PJ/2015', NULL, 2015, NULL, '801', '801', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(181, 'SUDIANTO', 'sudiantowibowo@gmail.com', NULL, '$2y$10$VJ1geelFCRtm3rujYJBYOOtiCyTqMDO.clNMEHUwDoRzLfv8JuEXq', '024-354-5813', NULL, '0878-3283-2199', NULL, 'KEP-2882/IP.B/PJ/2015', NULL, 2015, NULL, '2176', '2176', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(182, 'SUDIREDJO', 'jhons_kepik@yahoo.com', NULL, '$2y$10$SD9V7L20nW12W70j82H6EeINvzsctia3MleCyGH4WmcYT1PrpC.Sm', '024-7600-690', NULL, '081-2291-4742', NULL, 'KEP-1729/IP.B/PJ/2015', NULL, 2015, NULL, '4086', '4086', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(183, 'SUHANTORO', 'suhantoro8899@gmail.com', NULL, '$2y$10$GwqPwQyGtZVhiwAaXXTQZ.RmWE863fRH8RZ8N0l5O6iVsQozYkY6i', '', NULL, '0813-2605-1908', NULL, 'KEP-5220/IP.A/PJ/2019', NULL, 2019, NULL, '5519', '5519', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(184, 'SULISTIYONO', 'sulistiyono1953@gmail.com', NULL, '$2y$10$Ed6mUHN8jYmoK7PKxThTueKgrRlhQ67eeNKqeRdlVwPskfuAz9iuG', '0291-439-838', NULL, '081-6424-7017', NULL, 'KEP-2342/IP.B/PJ/2015', NULL, 2015, NULL, '2043', '2043', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(185, 'SULOLIPU', 'kkp.sulolipu@yahoo.co.id', NULL, '$2y$10$kUn6v1nKS4bXyij0GSjouuS5QljCo22zogydd2/e.Jfd4Q8PlgT4S', '024-355-3922', NULL, '081-2291-6086', NULL, 'KEP-54/IP.B/PJ/2015', NULL, 2015, NULL, '519', '519', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(186, 'SUMANTO', 'agusti_sumanto@yahoo.co.id', NULL, '$2y$10$pdat7PNlAYoQb2m07hXX6Oxjj0joG7qlhVhLrfY76UaQE8YBJDkGK', '024-762-0592', NULL, '081-6489-1925', NULL, 'KEP-344/IP.B/PJ/2015', NULL, 2015, NULL, '1579', '1579', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(187, 'SUMIYATI', 'pakarpenatausaha2@yahoo.co.uk', NULL, '$2y$10$UOQEm.W.hukf4wIwcEooveYCmF1DQmu2sUTGNXyeupqWLB9i5zte.', '024-747-9046', NULL, '081-2289-3527', NULL, 'KEP-602/IP.C/PJ/2015', NULL, 2015, NULL, '1491', '1491', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(188, 'SUPRIYANTO', 'pritcons@gmail.com', NULL, '$2y$10$F//b.oTnC8GAEPmmAtTy2.1Rl.G1gwBCnTZAV7qJpFYQS6Iltettq', '024-761-4070', NULL, '081-665-2711', NULL, 'KEP-366/IP.C/PJ/2015', NULL, 2015, NULL, '1183', '1183', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(189, 'SUTARDI', 'sutardise86@gmail.com', NULL, '$2y$10$S4NyJo5E8rQtPwJASVU6auiHkr1mJcjvFa4Lcva6shum9ndJT1/tu', '024-850-2570', NULL, '0812-285-9898', NULL, 'KEP-891/IP.C/PJ/2015', NULL, 2015, NULL, '2534', '2534', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(190, 'SUTIKNI', 'atiekni@gmail.com', NULL, '$2y$10$aRR.Qa17yTXDfa7Z9ttUD.Ekuo.IvR2.wivfKaEpsl6m8.RCmUTHy', '-', NULL, '0856-4312-0546', NULL, 'KEP-1034/IP.A/PJ/2015', NULL, 2015, NULL, '4035', '4035', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(191, 'SUYANTI', 'ss_yantitax@yahoo.com', NULL, '$2y$10$GmLkTm4jGQexIxunDHbV3uOOUeJrstuQ3sYMd7vHZwJtNxc6OqR.C', '-', NULL, '0813-2650-0475', NULL, 'KEP-3415/IP.A/PJ/2017', NULL, 2017, NULL, '1876', '1876', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(192, 'TEGUH SETIAWAN', 'teguh_taxconsultan@yahoo.co.id', NULL, '$2y$10$zcfnVrze1w3mS9FF6uCxaeyy.cRtmylGsrTxfQz14bzjTmbzg1tia', '024-747-0149', NULL, '0813-2578-0012', NULL, 'KEP-4409/IP.B/PJ/2019', NULL, 2015, NULL, '2970', '2970', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(193, 'TH ERKO LARANTORO', 'erkolarantoro@yahoo.com', NULL, '$2y$10$y4qUKX5AV8LD6pEGXl0TsuIaJxEZiVGZ1hXImT2I.d.j95oCJC.Ai', '024-7600690', NULL, '0857-2781-0263', NULL, 'KEP-1203/IP.A/PJ/2015', NULL, 2015, NULL, '4083', '4083', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(194, 'THE LIANG TJAIJ', 'daudv@ymail.com', NULL, '$2y$10$/6NiSx7Lbt6PgH13qq61EeOFxHZt.wiNxhqZvlXbiJ8l.E1oYm2DC', '024-355-8302', NULL, '081-6488-7238', NULL, 'KEP-1061/IP.B/PJ/2015', NULL, 2015, NULL, '2071', '2071', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(195, 'TIKA JUNITA DARMAWAN', 'sesiliatika@yahoo.com', NULL, '$2y$10$bc6HREMopvfest6UEpdmNehGAU5.oFFK/N2.G3CLsy39B1tzy6e36', '-', NULL, '0821-4287-0330', NULL, 'KEP-856/IP.A/PJ/2015', NULL, 2015, NULL, '3323', '3323', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(196, 'TJAHJO EDY WIDAGDHO', 'tjahjoedywidagdho@ymail.com', NULL, '$2y$10$lYGc0/Y9jryXiuwqMeT0C.H1EE7V0zCZShmH60/2ufCBVC3WRaxy2', '024-845-1651', NULL, '081-5659-1136', NULL, 'KEP-3021/IP.B/PJ/2015', NULL, 2015, NULL, '4102', '4102', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(197, 'TJOA HONG LIANG', 'andreas.hong@ymail.com', NULL, '$2y$10$yfXGeL.J6e3523sdP/Wdv.W2b9JkZfMkeuRlqeAHkemyD..D/6Cpm', '024-761-9208', NULL, '081-5652-9535', NULL, 'KEP-161/IP.B/PJ/2015', NULL, 2015, NULL, '1426', '1426', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(198, 'TONY SETIAWAN GONDOSISWOYO', 'tony.setiawan_g@yahoo.co.id', NULL, '$2y$10$ivLiWc7YP60Tq6FC55lkM.KSDo1Zf.vsuF6flJMpvF1UhWMXlr/jC', '024-761-7600', NULL, '0821-3450-5459', NULL, 'KEP-3075/IP.A/PJ/2015', NULL, 2015, NULL, '3425', '3425', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(199, 'TYTYWATI', 'tytywati@gmail.com', NULL, '$2y$10$AKiFM5US.2djt70IIuB.Jezl7hWFede1pRAWeJPdc.yo6HcTFALvm', '024-7673-7202', NULL, '081-5658-8150', NULL, 'KEP-5420/IP.B/PJ/2019', NULL, 2018, NULL, '4928', '4928', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(200, 'UDDIYANA', 'yoseph.uddiyana@gmail.com', NULL, '$2y$10$Lp4Ol695Y5cM2WBrpMqWruds4/FymSJ5MhliKGS8KGxbrtyRS5pAa', '024-7600-690', NULL, '0813-2647-3605', NULL, 'KEP-1209/IP.C/PJ/2015', NULL, 2015, NULL, '1289', '1289', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(201, 'VERONIKA NATASIA', 'v_natz@yahoo.co.id', NULL, '$2y$10$d97O2SA3dWkW0cLfbIgFiezYrOuXt3K4DHw6op53iQ3RvyRzYHrpy', '', NULL, '0818-0599-9207', NULL, 'KEP-5471/IP.A/PJ/2019', NULL, 2019, NULL, '6019', '6019', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(202, 'VESCAYA ARSAMADA', 'vescayaarsamada37@gmail.com', NULL, '$2y$10$YKVthJMHp5o9kbCD/gRYQ.8wV68MLkJJ.OpWUECBzvcwuU5ndum72', '', NULL, '0858-7544-5752', NULL, '', NULL, 2019, NULL, '6080', '6080', 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(203, 'WAHID SUHARTO', 'wahid.suharto@gmail.com', NULL, '$2y$10$1cgPlA6mOYHCgT3Z4eGjHOwPvVx1Tl3HiMDLunXXSgCo4bxni/Wmm', '024-8318442', NULL, '0878-3103-1925', NULL, '', NULL, 2019, NULL, NULL, NULL, 'A', 'TERBATAS', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(204, 'WIDJOJO KUSUMO', 'wijaya_konsultan@yahoo.co.id', NULL, '$2y$10$6WskGtw4ZeLqwf5NwwfhxeJ7.8H4jL2o2GvjB8Hg1SGIrqpdT.C1C', '024-7663-8056', NULL, '081-665-9860', NULL, 'KEP-2881/IP.B/PJ/2015', NULL, 2015, NULL, '520', '520', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(205, 'YAN ADIYANTO', 'adiyanto.acm.ya@gmail.com', NULL, '$2y$10$ku1IFoIQa4Ny7.47uk2A5OIiXZb7dpE9DuqMNaHegW60bRMlMtFoS', '-', NULL, '0813-9030-8546', NULL, 'KEP-5851/IP.B/PJ/2020', NULL, 2015, NULL, '2679', '2679', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(206, 'YAP GRACIA SUGIHARTO', 'graciasugiharto@hotmail.com', NULL, '$2y$10$gM7z1/8SsIMti.LHo8qBjecMgDEjssLWLfk6KWItumwPa/CdTPPtO', '024-8413-3028', NULL, '0896-3824-1770', NULL, 'KEP-4889/IP.A/PJ/2019', NULL, 2019, NULL, '5626', '5626', 'A', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(207, 'YOHANES BAGONG WIDODO', 'yohanes_bw@yahoo.com', NULL, '$2y$10$x8OplwnPOJFTYU5xSL8age1Ry1Z/4LgWEfTMVzKf6xnNAMXobdFeO', '024-845-7157', NULL, '081-666-8491', NULL, 'KEP-1510/IP.C/PJ/2015', NULL, 2015, NULL, '1278', '1278', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(208, 'YOHANES WINARTO ADHINUGROHO', 'winarto_yohanes@yahoo.com', NULL, '$2y$10$Z8/NZLPmRL/KeTvcLJ42Fu3224B/l2Ehv75sHUylS4C/OXiMgkjZK', '024-760-8789', NULL, '081-2252-0925', NULL, 'KEP-1321/IP.B/PJ/2015', NULL, 2015, NULL, '2933', '2933', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(209, 'YOHANITA DWI ARYANI SANTOSO', 'yohanita_aryani@yahoo.com', NULL, '$2y$10$thcJFH2xyZ2ENHiMd3CfN.mqUNKzjXjw3nXcNUzDWGzRO5DA7.AS6', '024-850-2241', NULL, '081-845-6477', NULL, 'KEP-1497/IP.C/PJ/2015', NULL, 2015, NULL, '2925', '2925', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(210, 'YULIANTI', 'pajak.yulianti@gmail.com', NULL, '$2y$10$ElaXQ5m7o2CybtdU2k5NKuRfzAPqBNWz5JXv/ex1brM9gKJ6AUdCy', '024-354-7668', NULL, '081-2283-3223', NULL, 'KEP-629/IP.C/PJ/2015', NULL, 2015, NULL, '2344', '2344', 'C', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(211, 'YULIANA', 'yuli_m380@yahoo.com', NULL, '$2y$10$I/Q8n.5jUZEzgla.vLtP4OTmo8DUbK0k6vBg/YfjVif5VlGTDUDk2', '024-5027-9301', NULL, '081-5766-4095', NULL, 'KEP-1094/IP.B/PJ/2015', NULL, 2015, NULL, '3477', '3477', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL),
(212, 'YULIENI', 'rach_lty@yahoo.com', NULL, '$2y$10$XzFGd0Y/e9F/smrD2cwDe.99Rntbv4.ESGwBdUzareVIlYwd2LYIO', '024-5027-9301', NULL, '081-2292-7575', NULL, 'KEP-1178/IP.B/PJ/2015', NULL, 2015, NULL, '3478', '3478', 'B', 'TETAP', NULL, NULL, NULL, NULL, NULL, 'MEMBER', 'user.jpg', NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `joinedevents`
--
ALTER TABLE `joinedevents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joinedevents_user_id_foreign` (`user_id`),
  ADD KEY `joinedevents_event_id_foreign` (`event_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registermember`
--
ALTER TABLE `registermember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registermember_nra_unique` (`NRA`),
  ADD UNIQUE KEY `registermember_email_unique` (`email`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nra_unique` (`NRA`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `joinedevents`
--
ALTER TABLE `joinedevents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `registermember`
--
ALTER TABLE `registermember`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `joinedevents`
--
ALTER TABLE `joinedevents`
  ADD CONSTRAINT `joinedevents_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `joinedevents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
