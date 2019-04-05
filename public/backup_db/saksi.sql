-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2019 pada 09.33
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
-- Database: `saksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `c1`
--

CREATE TABLE `c1` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `saksi_id` smallint(5) UNSIGNED NOT NULL,
  `foto_c1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `c1`
--

INSERT INTO `c1` (`id`, `saksi_id`, `foto_c1`, `created_at`, `updated_at`) VALUES
(2, 41, 'TPS-6-Sidakarya_viewp (2)_1548315085.jpg', '2019-01-24 06:31:25', '2019-01-24 06:31:25'),
(3, 88, 'TPS-4-Tunjuk_viewp_1548315099.jpg', '2019-01-24 06:31:39', '2019-01-24 06:31:39'),
(4, 44, 'TPS-11-Pering_viewp (1)_1548315113.jpg', '2019-01-24 06:31:53', '2019-01-24 06:31:53'),
(5, 70, 'TPS-7-Loloan Barat_viewp (2)_1548315130.jpg', '2019-01-24 06:32:10', '2019-01-24 06:32:10'),
(8, 1, 'TPS-3-Sesetan_viewp (1)_1550018202.jpg', '2019-02-12 23:36:42', '2019-02-12 23:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama`) VALUES
(1, 'Badung'),
(2, 'Bangli'),
(3, 'Buleleng'),
(4, 'Denpasar'),
(5, 'Gianyar'),
(6, 'Jembrana'),
(7, 'Karangasem'),
(8, 'Klungkung'),
(9, 'Tabanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `kab_id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `user_id`, `kab_id`, `nama`) VALUES
(1, 1, 1, 'Abiansemal'),
(2, 2, 1, 'Kuta'),
(3, 3, 1, 'Kuta Selatan'),
(4, 4, 1, 'Kuta Utara'),
(5, 5, 1, 'Mengwi'),
(6, 6, 1, 'Petang'),
(7, 7, 2, 'Bangli'),
(8, 8, 2, 'Kintamani'),
(9, 9, 2, 'Susut'),
(10, 10, 2, 'Tembuku'),
(11, 11, 3, 'Banjar'),
(12, 12, 3, 'Buleleng'),
(13, 13, 3, 'Busungbiu'),
(14, 14, 3, 'Gerokgak'),
(15, 15, 3, 'Kubutambahan'),
(16, 16, 3, 'Sawan'),
(17, 17, 3, 'Seririt'),
(18, 18, 3, 'Sukasada'),
(19, 19, 3, 'Tejakula'),
(20, 20, 4, 'Denpasar Barat'),
(21, 21, 4, 'Denpasar Selatan'),
(22, 22, 4, 'Denpasar Timur'),
(23, 23, 4, 'Denpasar Utara'),
(24, 24, 5, 'Blahbatuh'),
(25, 25, 5, 'Gianyar'),
(26, 26, 5, 'Payangan'),
(27, 27, 5, 'Sukawati'),
(28, 28, 5, 'Tampak Siring'),
(29, 29, 5, 'Tegallalang'),
(30, 30, 5, 'Ubud'),
(31, 31, 6, 'Jembrana'),
(32, 32, 6, 'Melaya'),
(33, 33, 6, 'Mendoyo'),
(34, 34, 6, 'Negara'),
(35, 35, 6, 'Pekutatan'),
(36, 36, 7, 'Abang'),
(37, 37, 7, 'Bebandem'),
(38, 38, 7, 'Karang Asem'),
(39, 39, 7, 'Kubu'),
(40, 40, 7, 'Manggis'),
(41, 41, 7, 'Rendang'),
(42, 42, 7, 'Selat'),
(43, 43, 7, 'Sidemen'),
(44, 44, 8, 'Banjarangkan'),
(45, 45, 8, 'Dawan'),
(46, 46, 8, 'Klungkung'),
(47, 47, 8, 'Nusapenida'),
(48, 48, 9, 'Baturiti'),
(49, 49, 9, 'Kediri'),
(50, 50, 9, 'Kerambitan'),
(51, 51, 9, 'Marga'),
(52, 52, 9, 'Penebel'),
(53, 53, 9, 'Pupuan'),
(54, 54, 9, 'Selemadeg Barat'),
(55, 55, 9, 'Selemadeg Timur'),
(56, 56, 9, 'Selemadeg'),
(57, 57, 9, 'Tabanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `kec_id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kec_id`, `nama`) VALUES
(1, 1, 'Abiansemal'),
(2, 1, 'Angantaka'),
(3, 1, 'Ayunan'),
(4, 1, 'Blahkiuh'),
(5, 1, 'Bongkasa'),
(6, 1, 'Bongkasa Pertiwi'),
(7, 1, 'Darmasaba'),
(8, 1, 'Dauh Yeh Cani'),
(9, 1, 'Jagapati'),
(10, 1, 'Mambal'),
(11, 1, 'Mekar Bhuwana'),
(12, 1, 'Punggul'),
(13, 1, 'Sangeh'),
(14, 1, 'Sedang'),
(15, 1, 'Selat'),
(16, 1, 'Sibang Gede'),
(17, 1, 'Sibang Kaja'),
(18, 1, 'Taman'),
(19, 2, 'Kedonganan'),
(20, 2, 'Kuta'),
(21, 2, 'Legian'),
(22, 2, 'Seminyak'),
(23, 2, 'Tuban'),
(24, 3, 'Benoa'),
(25, 3, 'Jimbaran'),
(26, 3, 'Kutuh'),
(27, 3, 'Pecatu'),
(28, 3, 'Tanjung Benoa'),
(29, 3, 'Ungasan'),
(30, 4, 'Canggu'),
(31, 4, 'Dalung'),
(32, 4, 'Kerobokan'),
(33, 4, 'Kerobokan Kaja'),
(34, 4, 'Kerobokan Kelod'),
(35, 4, 'Tibubeneng'),
(36, 5, 'Abianbase'),
(37, 5, 'Baha'),
(38, 5, 'Buduk'),
(39, 5, 'Cemagi'),
(40, 5, 'Gulingan'),
(41, 5, 'Kapal'),
(42, 5, 'Kekeran'),
(43, 5, 'Kuwum'),
(44, 5, 'Lukluk'),
(45, 5, 'Mengwi'),
(46, 5, 'Mengwitani'),
(47, 5, 'Munggu'),
(48, 5, 'Penarungan'),
(49, 5, 'Pererenan'),
(50, 5, 'Sading'),
(51, 5, 'Sembung'),
(52, 5, 'Sempidi'),
(53, 5, 'Sobangan'),
(54, 5, 'Tumbak Bayuh'),
(55, 5, 'Werdi Bhuawana'),
(56, 6, 'Belok'),
(57, 6, 'Carangsari'),
(58, 6, 'Getasan'),
(59, 6, 'Pangsan'),
(60, 6, 'Pelaga'),
(61, 6, 'Petang'),
(62, 6, 'Sulangai'),
(63, 7, 'Bebalang'),
(64, 7, 'Bunutin'),
(65, 7, 'Cempaga'),
(66, 7, 'Kawan'),
(67, 7, 'Kayubihi'),
(68, 7, 'Kubu'),
(69, 7, 'Landih'),
(70, 7, 'Pengotan'),
(71, 7, 'Taman Bali'),
(72, 8, 'Abang Songan'),
(73, 8, 'Abuan'),
(74, 8, 'Awan'),
(75, 8, 'Bantang'),
(76, 8, 'Banua'),
(77, 8, 'Batu Dinding'),
(78, 8, 'Batukaang'),
(79, 8, 'Batur Selatan'),
(80, 8, 'Batur Tengah'),
(81, 8, 'Batur Utara'),
(82, 8, 'Bayungcerik'),
(83, 8, 'Bayunggede'),
(84, 8, 'Belancan'),
(85, 8, 'Belandingan'),
(86, 8, 'Belanga'),
(87, 8, 'Belantih'),
(88, 8, 'Binyan'),
(89, 8, 'Bonyoh'),
(90, 8, 'Buahan'),
(91, 8, 'Bunutin'),
(92, 8, 'Catur'),
(93, 8, 'Daup'),
(94, 8, 'Dausa'),
(95, 8, 'Gunungbau'),
(96, 8, 'Katung'),
(97, 8, 'Kedisan'),
(98, 8, 'Kintamani'),
(99, 8, 'Kutuh'),
(100, 8, 'Langgahan'),
(101, 8, 'Lembean'),
(102, 8, 'Mangguh'),
(103, 8, 'Manikliyu'),
(104, 8, 'Mengani'),
(105, 8, 'Pengejaran'),
(106, 8, 'Pinggan'),
(107, 8, 'Satra'),
(108, 8, 'Sekaan'),
(109, 8, 'Sekardadi'),
(110, 8, 'Selulung'),
(111, 8, 'Serahi'),
(112, 8, 'Siyakin'),
(113, 8, 'Songan A'),
(114, 8, 'Songan B'),
(115, 8, 'Subaya'),
(116, 8, 'Sukawana'),
(117, 8, 'Suter'),
(118, 8, 'Terunyan'),
(119, 8, 'Ulian'),
(120, 9, 'Abuan'),
(121, 9, 'Apuan'),
(122, 9, 'Demulih'),
(123, 9, 'Pengiangan'),
(124, 9, 'Penglumbaran'),
(125, 9, 'Selat'),
(126, 9, 'Sulahan'),
(127, 9, 'Susut'),
(128, 9, 'Tiga'),
(129, 10, 'Bangbang'),
(130, 10, 'Jehem'),
(131, 10, 'Peninjoan'),
(132, 10, 'Tembuku'),
(133, 10, 'Undisan'),
(134, 10, 'Yangapi'),
(135, 11, 'Banjar'),
(136, 11, 'Banjar Tegeha'),
(137, 11, 'Banyuatis'),
(138, 11, 'Banyusri'),
(139, 11, 'Cempaga'),
(140, 11, 'Dencarik'),
(141, 11, 'Gesing'),
(142, 11, 'Gobleg'),
(143, 11, 'Kaliasem'),
(144, 11, 'Kayuputih'),
(145, 11, 'Munduk'),
(146, 11, 'Pedawa'),
(147, 11, 'Sidetapa'),
(148, 11, 'Tampekan'),
(149, 11, 'Temukus'),
(150, 11, 'Tigawasa'),
(151, 11, 'Tirtasari'),
(152, 12, 'Alasangker'),
(153, 12, 'Anturan'),
(154, 12, 'Astina'),
(155, 12, 'Banjar Bali'),
(156, 12, 'Banjar Jawa'),
(157, 12, 'Banjar Tegal'),
(158, 12, 'Banyuasri'),
(159, 12, 'Banyuning'),
(160, 12, 'Beratan'),
(161, 12, 'Bakti Seraga'),
(162, 12, 'Jinengdalem'),
(163, 12, 'Kalibukbuk'),
(164, 12, 'Kaliuntu'),
(165, 12, 'Kampung Anyar'),
(166, 12, 'Kampung Baru'),
(167, 12, 'Kampung Bugis'),
(168, 12, 'Kampung Kajanan'),
(169, 12, 'Kampung Singaraja'),
(170, 12, 'Kendran'),
(171, 12, 'Liligundi'),
(172, 12, 'Nagasepaha'),
(173, 12, 'Paket Agung'),
(174, 12, 'Pemaron'),
(175, 12, 'Penarukan'),
(176, 12, 'Penglatan'),
(177, 12, 'Petandakan'),
(178, 12, 'Poh Bergong'),
(179, 12, 'Sari Mekar'),
(180, 12, 'Tukadmungga'),
(181, 13, 'Bengkel'),
(182, 13, 'Bongancina'),
(183, 13, 'Busungbiu'),
(184, 13, 'Kedis'),
(185, 13, 'Kekeran'),
(186, 13, 'Pelapuan'),
(187, 13, 'Pucaksari'),
(188, 13, 'Sepang'),
(189, 13, 'Sepang Kelod'),
(190, 13, 'Subuk'),
(191, 13, 'Telaga'),
(192, 13, 'Tinggarsari'),
(193, 13, 'Tista'),
(194, 13, 'Titab'),
(195, 13, 'Umejero'),
(196, 14, 'Banyupoh'),
(197, 14, 'Celukan Bawang'),
(198, 14, 'Gerokgak'),
(199, 14, 'Musi'),
(200, 14, 'Patas'),
(201, 14, 'Pejarakan'),
(202, 14, 'Pemuteran'),
(203, 14, 'Pengulon'),
(204, 14, 'Penyabangan'),
(205, 14, 'Sanggalangit'),
(206, 14, 'Sumber Klampok'),
(207, 14, 'Sumberkima'),
(208, 14, 'Tinga Tinga'),
(209, 14, 'Tukad Sumaga'),
(210, 15, 'Bengkala'),
(211, 15, 'Bila'),
(212, 15, 'Bontihing'),
(213, 15, 'Bukti'),
(214, 15, 'Bulian'),
(215, 15, 'Depeha'),
(216, 15, 'Kubutambahan'),
(217, 15, 'Mengening'),
(218, 15, 'Pakisan'),
(219, 15, 'Tajun'),
(220, 15, 'Tambakan'),
(221, 15, 'Tamblang'),
(222, 15, 'Tunjung'),
(223, 16, 'Bebetin'),
(224, 16, 'Bungkulan'),
(225, 16, 'Galungan'),
(226, 16, 'Giri Emas'),
(227, 16, 'Jagaraga'),
(228, 16, 'Kerobokan'),
(229, 16, 'Lemukih'),
(230, 16, 'Menyali'),
(231, 16, 'Sangsit'),
(232, 16, 'Sawan'),
(233, 16, 'Sekumpul'),
(234, 16, 'Sinabun'),
(235, 16, 'Sudaji'),
(236, 16, 'Suwug'),
(237, 17, 'Banjar Asem'),
(238, 17, 'Bestala'),
(239, 17, 'Bubunan'),
(240, 17, 'Gunungsari'),
(241, 17, 'Joanyar'),
(242, 17, 'Kalianget'),
(243, 17, 'Kalisada'),
(244, 17, 'Lokapaksa'),
(245, 17, 'Mayong'),
(246, 17, 'Munduk Bestala'),
(247, 17, 'Pangkungparuk'),
(248, 17, 'Patemon'),
(249, 17, 'Pengastulan'),
(250, 17, 'Rangdu'),
(251, 17, 'Ringdikit'),
(252, 17, 'Seririt'),
(253, 17, 'Sulanyah'),
(254, 17, 'Tangguwisia'),
(255, 17, 'Ularan'),
(256, 17, 'Umeanyar'),
(257, 17, 'Unggahan'),
(258, 18, 'Ambengan'),
(259, 18, 'Gitgit'),
(260, 18, 'Kayuputih'),
(261, 18, 'Padangbulia'),
(262, 18, 'Pancasari'),
(263, 18, 'Panji'),
(264, 18, 'Panji Anom'),
(265, 18, 'Pegadungan'),
(266, 18, 'Pegayaman'),
(267, 18, 'Sambangan'),
(268, 18, 'Selat'),
(269, 18, 'Silangjana'),
(270, 18, 'Sukasada'),
(271, 18, 'Tegal Linggah'),
(272, 18, 'Wanagiri'),
(273, 19, 'Bondalem'),
(274, 19, 'Julah'),
(275, 19, 'Les'),
(276, 19, 'Madenan'),
(277, 19, 'Pacung'),
(278, 19, 'Penuktukan'),
(279, 19, 'Sambirenteng'),
(280, 19, 'Sembiran'),
(281, 19, 'Tejakula'),
(282, 19, 'Tembok'),
(283, 20, 'Dauh Puri'),
(284, 20, 'Dauh Puri Kangin'),
(285, 20, 'Dauh Puri Kauh'),
(286, 20, 'Dauh Puri Kelod'),
(287, 20, 'Padangsambian'),
(288, 20, 'Padangsambian Kaja'),
(289, 20, 'Padangsambian Kelod'),
(290, 20, 'Pemecutan'),
(291, 20, 'Pemecutan Kelod'),
(292, 20, 'Tegal Harum'),
(293, 20, 'Tegal Kertha'),
(294, 21, 'Panjer'),
(295, 21, 'Pedungan'),
(296, 21, 'Pemogan'),
(297, 21, 'Renon'),
(298, 21, 'Sanur'),
(299, 21, 'Sanur Kaja'),
(300, 21, 'Sanur Kauh'),
(301, 21, 'Serangan'),
(302, 21, 'Sesetan'),
(303, 21, 'Sidakarya'),
(304, 22, 'Dangin Puri'),
(305, 22, 'Dangin Puri Klod'),
(306, 22, 'Kesiman'),
(307, 22, 'Kesiman Kertalangu'),
(308, 22, 'Kesiman Petilan'),
(309, 22, 'Penatih'),
(310, 22, 'Penatih Dangin Puri'),
(311, 22, 'Sumerta'),
(312, 22, 'Sumerta Kaja'),
(313, 22, 'Sumerta Kauh'),
(314, 22, 'Sumerta Kelod'),
(315, 23, 'Dangin Puri Kaja'),
(316, 23, 'Dangin Puri Kangin'),
(317, 23, 'Dangin Puri Kauh'),
(318, 23, 'Dauh Puri Kaja'),
(319, 23, 'Peguyangan'),
(320, 23, 'Peguyangan Kaja'),
(321, 23, 'Peguyangan Kangin'),
(322, 23, 'Pemecutan Kaja'),
(323, 23, 'Tonja'),
(324, 23, 'Ubung'),
(325, 23, 'Ubung Kaja'),
(326, 24, 'Bedulu'),
(327, 24, 'Belega'),
(328, 24, 'Blahbatuh'),
(329, 24, 'Bona'),
(330, 24, 'Buruan'),
(331, 24, 'Keramas'),
(332, 24, 'Medahan'),
(333, 24, 'Pering'),
(334, 24, 'Saba'),
(335, 25, 'Abianbase'),
(336, 25, 'Bakbakan'),
(337, 25, 'Beng'),
(338, 25, 'Bitera'),
(339, 25, 'Gianyar'),
(340, 25, 'Lebih'),
(341, 25, 'Petak'),
(342, 25, 'Petak Kaja'),
(343, 25, 'Samplangan'),
(344, 25, 'Serongga'),
(345, 25, 'Siangan'),
(346, 25, 'Sidan'),
(347, 25, 'Sumita'),
(348, 25, 'Suwat'),
(349, 25, 'Tegal Tugu'),
(350, 25, 'Temesi'),
(351, 25, 'Tulikup'),
(352, 26, 'Bresela'),
(353, 26, 'Buahan'),
(354, 26, 'Buahan Kaja'),
(355, 26, 'Bukian'),
(356, 26, 'Kelusa'),
(357, 26, 'Kerta'),
(358, 26, 'Melinggih'),
(359, 26, 'Melinggih Kelod'),
(360, 26, 'Puhu'),
(361, 27, 'Batuan'),
(362, 27, 'Batuan Kaler'),
(363, 27, 'Batubulan'),
(364, 27, 'Batubulan Kangin'),
(365, 27, 'Celuk'),
(366, 27, 'Guwang'),
(367, 27, 'Kemenuh'),
(368, 27, 'Ketewel'),
(369, 27, 'Singapadu'),
(370, 27, 'Singapadu Kaler'),
(371, 27, 'Singapadu Tengah'),
(372, 27, 'Sukawati'),
(373, 28, 'Manukaya'),
(374, 28, 'Pejeng'),
(375, 28, 'Pejeng Kaja'),
(376, 28, 'Pejeng Kangin'),
(377, 28, 'Pejeng Kawan'),
(378, 28, 'Pejeng Kelod'),
(379, 28, 'Sanding'),
(380, 28, 'Tampaksiring'),
(381, 29, 'Kedisan'),
(382, 29, 'Keliki'),
(383, 29, 'Kenderan'),
(384, 29, 'Pupuan'),
(385, 29, 'Sebatu'),
(386, 29, 'Taro'),
(387, 29, 'Tegallalang'),
(388, 30, 'Kedewatan'),
(389, 30, 'Lodtunduh'),
(390, 30, 'Mas'),
(391, 30, 'Peliatan'),
(392, 30, 'Petulu'),
(393, 30, 'Sayan'),
(394, 30, 'Singakerta'),
(395, 30, 'Ubud'),
(396, 31, 'Air Kuning'),
(397, 31, 'Batuagung'),
(398, 31, 'Budeng'),
(399, 31, 'Dangin Tukadaya'),
(400, 31, 'Dauhwaru'),
(401, 31, 'Loloan Timur'),
(402, 31, 'Pendem'),
(403, 31, 'Perancak'),
(404, 31, 'Sangkaragung'),
(405, 31, 'Yeh Kuning'),
(406, 32, 'Blimbingsari'),
(407, 32, 'Candikusuma'),
(408, 32, 'Ekasari'),
(409, 32, 'Gilimanuk'),
(410, 32, 'Manistutu'),
(411, 32, 'Melaya'),
(412, 32, 'Nusa Sari'),
(413, 32, 'Tukadaya'),
(414, 32, 'Tuwed'),
(415, 32, 'Warnasari'),
(416, 33, 'Delod Berawah'),
(417, 33, 'Mendoyo Dangin Tukad'),
(418, 33, 'Mendoyo Dauh Tukad'),
(419, 33, 'Penyaringan'),
(420, 33, 'Pergung'),
(421, 33, 'Pohsanten'),
(422, 33, 'Tegal Cangkring'),
(423, 33, 'Yeh Embang'),
(424, 33, 'Yeh Embang Kangin'),
(425, 33, 'Yeh Embang Kauh'),
(426, 33, 'Yeh Sumbul'),
(427, 34, 'Baler Bale Agung'),
(428, 34, 'Baluk'),
(429, 34, 'Banjar Tengah'),
(430, 34, 'Banyubiru'),
(431, 34, 'Berangbang'),
(432, 34, 'Cupel'),
(433, 34, 'Kaliakah'),
(434, 34, 'Lelateng'),
(435, 34, 'Loloan Barat'),
(436, 34, 'Pengambengan'),
(437, 34, 'Tegal Badeng Barat'),
(438, 34, 'Tegal Badeng Timur'),
(439, 35, 'Asahduren'),
(440, 35, 'Gumbrih'),
(441, 35, 'Manggissari'),
(442, 35, 'Medewi'),
(443, 35, 'Pangyangan'),
(444, 35, 'Pekutatan'),
(445, 35, 'Pengeragoan'),
(446, 35, 'Pulukan'),
(447, 36, 'Ababi'),
(448, 36, 'Abang'),
(449, 36, 'Bunutan'),
(450, 36, 'Culik'),
(451, 36, 'Datah'),
(452, 36, 'Kerta Mandala'),
(453, 36, 'Kesimpar'),
(454, 36, 'Laba Sari'),
(455, 36, 'Nawakerti'),
(456, 36, 'Pidpid'),
(457, 36, 'Purwakerti'),
(458, 36, 'Tista'),
(459, 36, 'Tiyingtali'),
(460, 36, 'Tri Buana'),
(461, 37, 'Bebandem'),
(462, 37, 'Buana Giri'),
(463, 37, 'Budakeling'),
(464, 37, 'Bungaya'),
(465, 37, 'Bungaya Kangin'),
(466, 37, 'Jungutan'),
(467, 37, 'Macang'),
(468, 37, 'Sibetan'),
(469, 38, 'Bugbug'),
(470, 38, 'Bukit'),
(471, 38, 'Karangasem'),
(472, 38, 'Padang Kerta'),
(473, 38, 'Pertima'),
(474, 38, 'Seraya Barat'),
(475, 38, 'Seraya Tengah'),
(476, 38, 'Seraya Timur'),
(477, 38, 'Subagan'),
(478, 38, 'Tegallinggah'),
(479, 38, 'Tumbu'),
(480, 39, 'Ban'),
(481, 39, 'Batu Ringgit'),
(482, 39, 'Dukuh'),
(483, 39, 'Kubu'),
(484, 39, 'Sukadana'),
(485, 39, 'Tianyar Barat'),
(486, 39, 'Tianyar Tengah'),
(487, 39, 'Tianyar Timur'),
(488, 39, 'Tulamben'),
(489, 40, 'Antiga'),
(490, 40, 'Antiga Kelod'),
(491, 40, 'Gegelang'),
(492, 40, 'Manggis'),
(493, 40, 'Ngis'),
(494, 40, 'Nyuh Tebel'),
(495, 40, 'Padangbai'),
(496, 40, 'Pesedahan'),
(497, 40, 'Selumbung'),
(498, 40, 'Sengkidu'),
(499, 40, 'Tenganan'),
(500, 40, 'Ulakan'),
(501, 41, 'Besakih'),
(502, 41, 'Menanga'),
(503, 41, 'Nongan'),
(504, 41, 'Pempatan'),
(505, 41, 'Pesaban'),
(506, 41, 'Rendang'),
(507, 42, 'Amerta Bhuana'),
(508, 42, 'Duda'),
(509, 42, 'Duda Timur'),
(510, 42, 'Duda Utara'),
(511, 42, 'Muncan'),
(512, 42, 'Pering Sari'),
(513, 42, 'Sebudi'),
(514, 42, 'Selat'),
(515, 43, 'Kertha Buana'),
(516, 43, 'Lokasari'),
(517, 43, 'Sangkan Gunung'),
(518, 43, 'Sidemen'),
(519, 43, 'Sindu Wati'),
(520, 43, 'Talibeng'),
(521, 43, 'Tangkup'),
(522, 43, 'Telaga Tawang'),
(523, 43, 'Tri Eka Buana'),
(524, 43, 'Wisma Kerta'),
(525, 44, 'Aan'),
(526, 44, 'Bakas'),
(527, 44, 'Banjarangkan'),
(528, 44, 'Bungbungan'),
(529, 44, 'Getakan'),
(530, 44, 'Negari'),
(531, 44, 'Nyalian'),
(532, 44, 'Nyanglan'),
(533, 44, 'Takmung'),
(534, 44, 'Tihingan'),
(535, 44, 'Timuhun'),
(536, 44, 'Tohpati'),
(537, 44, 'Tusan'),
(538, 45, 'Besan'),
(539, 45, 'Dawan Kaler'),
(540, 45, 'Dawan Klod'),
(541, 45, 'Gunaksa'),
(542, 45, 'Kampung Kusamba'),
(543, 45, 'Kusamba'),
(544, 45, 'Paksebali'),
(545, 45, 'Pesinggahan'),
(546, 45, 'Pikat'),
(547, 45, 'Sampalan Klod'),
(548, 45, 'Sampalan Tengah'),
(549, 45, 'Sulang'),
(550, 46, 'Akah'),
(551, 46, 'Gelgel'),
(552, 46, 'Jumpai'),
(553, 46, 'Kamasan'),
(554, 46, 'Kampung Gelgel'),
(555, 46, 'Manduang'),
(556, 46, 'Satra'),
(557, 46, 'Selat'),
(558, 46, 'Selisihan'),
(559, 46, 'Semarapura Kaja'),
(560, 46, 'Semarapura Kangin'),
(561, 46, 'Semarapura Kauh'),
(562, 46, 'Semarapura Klod Kangin'),
(563, 46, 'Semarapura Kelod'),
(564, 46, 'Semarapura Tengah'),
(565, 46, 'Tangkas'),
(566, 46, 'Tegak'),
(567, 46, 'Tojan'),
(568, 47, 'Batukandik'),
(569, 47, 'Batumadeg'),
(570, 47, 'Batununggul'),
(571, 47, 'Bunga Mekar'),
(572, 47, 'Jungutbatu'),
(573, 47, 'Kampung Toyapakeh'),
(574, 47, 'Klumpu'),
(575, 47, 'Kutampi'),
(576, 47, 'Kutampi Kaler'),
(577, 47, 'Lembongan'),
(578, 47, 'Ped'),
(579, 47, 'Pejukutan'),
(580, 47, 'Sakti'),
(581, 47, 'Sekartaji'),
(582, 47, 'Suana'),
(583, 47, 'Tanglad'),
(584, 48, 'Angseri'),
(585, 48, 'Antapan'),
(586, 48, 'Apuan'),
(587, 48, 'Bangli'),
(588, 48, 'Batunya'),
(589, 48, 'Baturiti'),
(590, 48, 'Candikuning'),
(591, 48, 'Luwus'),
(592, 48, 'Mekarsari'),
(593, 48, 'Perean'),
(594, 48, 'Perean Kangin'),
(595, 48, 'Perean Tengah'),
(596, 49, 'Abian Tuwung'),
(597, 49, 'Banjar Anyar'),
(598, 49, 'Belalang'),
(599, 49, 'Bengkel Sari'),
(600, 49, 'Beraban'),
(601, 49, 'Buwit'),
(602, 49, 'Cepaka'),
(603, 49, 'Kaba-Kaba'),
(604, 49, 'Kediri'),
(605, 49, 'Nyambu'),
(606, 49, 'Nyitdah'),
(607, 49, 'Pandak Bandung'),
(608, 49, 'Pandak Gede'),
(609, 49, 'Pangkuang Tibah'),
(610, 49, 'Pejaten'),
(611, 50, 'Batuaji'),
(612, 50, 'Baturiti'),
(613, 50, 'Belumbang'),
(614, 50, 'Kelating'),
(615, 50, 'Kerambitan'),
(616, 50, 'Kesiut'),
(617, 50, 'Kukuh'),
(618, 50, 'Meliling'),
(619, 50, 'Pangkung Karung'),
(620, 50, 'Penarukan'),
(621, 50, 'Samsam'),
(622, 50, 'Sembung Gede'),
(623, 50, 'Tibubiyu'),
(624, 50, 'Timpag'),
(625, 50, 'Tista'),
(626, 51, 'Baru'),
(627, 51, 'Batannyuh'),
(628, 51, 'Beringkit'),
(629, 51, 'Cau Belayu'),
(630, 51, 'Geluntung'),
(631, 51, 'Kukuh'),
(632, 51, 'Kuwum'),
(633, 51, 'Marga'),
(634, 51, 'Marga Dajan Puri'),
(635, 51, 'Marga Dauh Puri'),
(636, 51, 'Payangan'),
(637, 51, 'Peken'),
(638, 51, 'Petiga'),
(639, 51, 'Selanbawak'),
(640, 51, 'Tegaljadi'),
(641, 51, 'Tua'),
(642, 52, 'Babahan'),
(643, 52, 'Biaung'),
(644, 52, 'Buruan'),
(645, 52, 'Jatiluwih'),
(646, 52, 'Jegu'),
(647, 52, 'Mengeste'),
(648, 52, 'Penatahan'),
(649, 52, 'Penebel'),
(650, 52, 'Pesagi'),
(651, 52, 'Pitra'),
(652, 52, 'Rejasa'),
(653, 52, 'Riang Gede'),
(654, 52, 'Sangketan'),
(655, 52, 'Senganan'),
(656, 52, 'Tajen'),
(657, 52, 'Tegalinggah'),
(658, 52, 'Tengkudak'),
(659, 52, 'Wongaya Gede'),
(660, 53, 'Bantiran'),
(661, 53, 'Batungsel'),
(662, 53, 'Belatungan'),
(663, 53, 'Belimbing'),
(664, 53, 'Jelijih Punggang'),
(665, 53, 'Karya Sari'),
(666, 53, 'Kebon Padangan'),
(667, 53, 'Munduk Temu'),
(668, 53, 'Padangan'),
(669, 53, 'Pajahan'),
(670, 53, 'Pujungan'),
(671, 53, 'Pupuan'),
(672, 53, 'Sai'),
(673, 53, 'Sanda'),
(674, 54, 'Angkah'),
(675, 54, 'Antosari'),
(676, 54, 'Bengkel Sari'),
(677, 54, 'Lalang Linggah'),
(678, 54, 'Lumbung'),
(679, 54, 'Lumbung Kauh'),
(680, 54, 'Mundeh'),
(681, 54, 'Mundeh Kangin'),
(682, 54, 'Mundeh Kauh'),
(683, 54, 'Selabih'),
(684, 54, 'Tiying Gading'),
(685, 55, 'Bantas'),
(686, 55, 'Beraban'),
(687, 55, 'Dalang'),
(688, 55, 'Gadung Sari'),
(689, 55, 'Gadungan'),
(690, 55, 'Gunung Salak'),
(691, 55, 'Mambang'),
(692, 55, 'Megati'),
(693, 55, 'Tangguntiti'),
(694, 55, 'Tegal Mengkeb'),
(695, 56, 'Antap'),
(696, 56, 'Bajera'),
(697, 56, 'Bajera Utara'),
(698, 56, 'Berembeng'),
(699, 56, 'Manikyang'),
(700, 56, 'Pupuan Sawah'),
(701, 56, 'Selemadeg'),
(702, 56, 'Serampingan'),
(703, 56, 'Wanagiri'),
(704, 56, 'Wanagiri Kauh'),
(705, 57, 'Bongan'),
(706, 57, 'Buahan'),
(707, 57, 'Dauh Peken'),
(708, 57, 'Dajan Peken'),
(709, 57, 'Delod Peken'),
(710, 57, 'Denbantas'),
(711, 57, 'Gubug'),
(712, 57, 'Sesandan'),
(713, 57, 'Subamia'),
(714, 57, 'Sudimara'),
(715, 57, 'Tunjuk'),
(716, 57, 'Wanasari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koor`
--

CREATE TABLE `koor` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `kel_id` smallint(5) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_diri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koor`
--

INSERT INTO `koor` (`id`, `user_id`, `kel_id`, `nama`, `gender`, `alamat`, `no_hp`, `foto_ktp`, `foto_diri`, `created_at`, `updated_at`) VALUES
(1, 59, 302, 'I Kadek Ari Sudana', 'L', 'Jl. Ry. Sesetan Gg. Mujair No.6, Dps', '081338998997', 'YtvhMQaCEqZTKq4wSHDbJSIvH7WomOyk5p4HQJMH.jpeg', 'RcSTAzV1rKCWLuUjb3j2XVFI535eoZz2TbZt5VOJ.jpeg', '2019-01-10 11:39:53', '2019-01-13 10:05:19'),
(2, 61, 302, 'Drs I Made Joniarsa', 'L', 'Jl Raya Sesetan No 77A Lantang Bejuh, Sesetan Densel', '081236133857', 'NHSvGQmGhYzY2G003wQHbv24alpNzkyH8PlYv4lI.jpeg', 'KyrZeiP57AujDkou9SPmOMfDD7zPwsh47M6DxX9r.jpeg', '2019-01-13 10:11:08', '2019-01-13 10:11:08'),
(3, 64, 297, 'I Made Bawa', 'L', 'Jl Tukad Yeh Aya No. 208 Br Pande Renon, Densel', '081246084443', 'TMeVdFwyj8nIJHD0L08oT5O6rOtz0wZRXgpOtop3.jpeg', 'QVU7m0Tdg0yed3vSwykhorZNdATwH9W6u5O5cnzZ.jpeg', '2019-01-13 10:15:36', '2019-01-13 10:15:36'),
(4, 66, 39, 'I Made Sugiarta', 'L', 'Br. Batan Tanjung', '08113867214', '1hYYQCNSyON76DG0lccuX2PM1jeuP43vsd457Xla.jpeg', 'u6nqxj8Gz4ezrxSM18DoOoHRN2rcWVnxMhNDLugj.jpeg', '2019-01-24 01:57:02', '2019-01-24 01:57:02'),
(5, 69, 63, 'Gusti Made Suardana', 'L', 'Banjar Pulung Kauh', '085238946555', 'M473dpK4uC9mDNfhzTNKkT9Wg88rAfg7G7gHGtBG.jpeg', 'rzeVeCErO787yl8XDfC2ydJDuyWHND0TpmViLA4f.jpeg', '2019-01-24 02:02:43', '2019-01-24 02:02:43'),
(6, 72, 71, 'Ngakan Putu Ngurah Keramas', 'L', 'Br.Kuning-Tamanbali', '082247837555', 'EOL2k1rYoqXXxJqICVxvjfQJuOQJM3ktATgryQXQ.jpeg', 'oyKx2r2WRz5LfUAtyiic1ak8fVx2TKLIUNf8YbI7.jpeg', '2019-01-24 02:08:45', '2019-01-24 02:08:45'),
(7, 74, 207, 'Kadek Darmawan', 'L', 'Br. Sumber Kesambi', '085238870226', 'qzM9zeLj8PJLSjhIC8tjiXbaiLB4iLZanNtLCU4Y.jpeg', 'fN5VeSQ8dRgiSUYakJnCXAEa6SagM3E4zbqCPREN.jpeg', '2019-01-24 02:18:58', '2019-01-24 02:18:58'),
(8, 77, 205, 'I Kadek Suryada', 'L', 'BD. Wana Sari', '082341658052', 'Vy7mTRRiXDIwBFdJH6m7sQWlx6G65rIYsEeAAmVg.jpeg', 'ShrxCVHLITE06gLHndiwBdcj84yTEoqzhM9iCune.jpeg', '2019-01-24 02:25:46', '2019-01-24 02:25:46'),
(9, 80, 210, 'Komang Sutriyasa Boni Angkeran', 'L', 'Br.dinas kanginan desa bila', '082144509589', 'Nj0odPHXy7yN9RynXeDbuW2cpdlXf8EI4XADROTI.jpeg', 'qvPdyQecVWJ7J3OwVOYLs34VgvyLHFOLfies5jW2.jpeg', '2019-01-24 02:30:30', '2019-01-24 02:30:30'),
(10, 83, 285, 'I Wayan Suparta', 'L', 'Jl Nusa Kambangan GG XX/4 Jematang Dauh Puri Kauh Denbar', '085100432929', '6ZKqnU521CfwvLJCx2DoH8TBKyTWYF96hNMYARWD.jpeg', 'Ju46i8AgDucHNo8PummtXsv8Dr7whNZaLbEeDJlJ.jpeg', '2019-01-24 02:37:15', '2019-01-24 02:37:15'),
(11, 88, 290, 'I Made Wahyu Wiranata', 'L', 'Jl Gunung Merapi IV/1 Tegal Linggah Pemecutan', '08113976513', 'Wu1Kh2u3x04aBh1fdWfOJ8xaJS5GvZoOzdGmGYeu.jpeg', 'JtIgliIQjtu555hIzIfuLESgICxlyBtBU4VkWjft.jpeg', '2019-01-24 02:43:03', '2019-01-24 02:43:03'),
(12, 91, 292, 'Ida Bagus Widnyana Ardaya', 'L', 'Jl Gunung Sari GG III no 6 Sari Buana, Tegal Harum', '081338318239', 'JJQocaWgLYRh0jrJJnUZbLg4snF9hTnyJ65Z2Ldy.jpeg', 'uM3UshVonkfATZeo9NO7xKldlMiVtycGKjLTc5yL.jpeg', '2019-01-24 02:46:56', '2019-01-24 02:46:56'),
(13, 93, 287, 'Dewa Putu Susila', 'L', 'Bhuana Permata Hijau 41 Padangsambian', '081999934566', '85uTxlmc1GTzzOdmU4boqmpbmxlQ6hZI5QIR6qtS.jpeg', 'lm58FtaEygzuwFnwK3JKXguIg20VieXYazYvnrX5.jpeg', '2019-01-24 02:48:50', '2019-01-24 02:48:50'),
(14, 97, 285, 'Anak Agung Putu Sugiartha ST', 'L', 'Jl P Salawati No. 1X Jematang Dauh Puri Kauh', '085100432929', 'MFHfU4Fh5SdYbcF07F43kCHjMP2FzTxCxKn3P9Kx.jpeg', '3HKMjQ2csJkZq3ABMvN0d6hL2VRlcINNkXkreVfD.jpeg', '2019-01-24 02:57:54', '2019-01-24 02:59:08'),
(15, 100, 290, 'Desak Made Umbari', 'P', 'Jl Gunung Merapi No. 10 Pemedilan Pemecutan', '081353060706', 'fwThVcxvqligs7ckebXTDDs4SveUMNBSQZ5THml7.jpeg', 'xCXKz4Z1fQV5uvTNVbrXdkQ4xUaSJ2Oi12xDDQpT.jpeg', '2019-01-24 03:03:17', '2019-01-24 03:03:17'),
(16, 104, 294, 'Paskalina', 'P', 'Jl P Saelus II Gg Kenangan No. 14 Pembungan Sesetan', '081238965696', 'YmHdHsccgHqAqNAanqSjliB7IHJgAtQh2XFVCvRD.jpeg', 'Pd1bdYhoA5BCRzBDGiL68ybTdh7nI6JjqsQwaAWt.jpeg', '2019-01-24 03:10:27', '2019-01-24 03:10:27'),
(17, 106, 298, 'Gst Agung Made Sri Intan Wahyuni', 'P', 'Jl Sanur Br Abiantimbul Sanur Kauh', '087780840121', 'VPTJAJz97G0SUFzXX6b0C6MjlqoHP12nTB5zewAs.jpeg', 'LKi841sF5j2pvWEQbaSwYMQ7r6ng8xLet3GBwS9s.jpeg', '2019-01-24 03:13:56', '2019-01-24 03:13:56'),
(18, 108, 303, 'Ni Kadek Supriyani', 'P', 'Jl. Kerta Dalem I No.4 , Denpasar', '081388908767', 'Wrxl6aQfS4dd5ijmjHjxnEb9qrd6L9VSj8vSIajq.jpeg', 'AYonTYKpkX8mhEDTmYeszPr0Tjk3oDeEGZzquitF.jpeg', '2019-01-24 03:46:00', '2019-01-24 03:46:00'),
(19, 110, 300, 'I Nyoman Subasma SE', 'L', 'Jl Penyaringan No 17A Pekandelan Sanur Kauh', '081805332090', 'w6a0KlxKjNEhWg8gcDM2W8DAOnUcxs6VbjWumRo0.jpeg', '5cFtAJLUPnJdrNeskf8LkQ2Itcp80SsfsZtQAmrK.jpeg', '2019-01-24 03:48:40', '2019-01-24 03:48:40'),
(20, 116, 299, 'I Ketut Yudiana', 'L', 'Jl D Meninjau V/5 Batan Poh Sanur Kaja, Densel', '081338400761', 'ViPCVGZdXY004xNQB4SbZRUDO1yaPsMfFcD9JrXJ.jpeg', 'jJOVkzqMUEJPybroK9hdxcSXxwDs39N2ctFSgEoV.jpeg', '2019-01-24 04:00:14', '2019-01-24 04:00:14'),
(21, 120, 333, 'Anak Agung Sagung Gita', 'P', 'Br.Tojan Tegal', '081237456321', '4zuu75jK0aS6he6NVxV2QOktnhbVlMf0mf9Sh7rU.jpeg', 'nXWudKvlpCsjvV2reMDSGV5a1N3eBlHsYPxPayt4.jpeg', '2019-01-24 04:12:01', '2019-01-24 04:12:01'),
(22, 124, 388, 'Dewa Gede Eka Saputra', 'L', 'BR.KEDEWATAN ANYAR', '087861780982', 'j7oNfWMePS7o3vCvqigpzit4iapzUsslhei3IR7Q.jpeg', 'jYM0XNxbY5ahmAWx25uDsPo3ZelCNX01fHD7Dmlp.jpeg', '2019-01-24 04:17:03', '2019-01-24 04:17:03'),
(23, 127, 390, 'sang kompiang widya sastrawan', 'L', 'BR.PENGOSEKAN KAJA', '081353073617', '4izLZgSw1lA09GSG9jmHoe0HJ8CsLc0D3QX7cFsp.png', 'ksszYX7vdkMDHKHOAOKgJR347WFjYvfSUOTmfbzz.png', '2019-01-24 04:19:30', '2019-01-24 04:19:30'),
(24, 132, 393, 'I MADE WARDANA', 'L', 'BR PENESTANAN KAJA', '082144634245', 'f3n5RGSVKVEmtWAV2OEXqjn2wO7waFlpxJb4yJzk.jpeg', 'CiEsM4HRmTdPC95SWU5UAcsHUaRdWNBkCzDcFGqO.jpeg', '2019-01-24 04:23:50', '2019-01-24 04:23:50'),
(25, 136, 403, 'I Ketut Astra Semara', 'L', 'Banjar Tibu Kleneng Desa Prancak', '087860157977', 'ZCfyOjjUfG6SnUfCJfFuA952eNv71VxCEYjlXUAT.jpeg', '47j5jMt7cf3P9vg3SN0tbGP53l4r36zSlkDn5TbE.jpeg', '2019-01-24 04:27:12', '2019-01-24 04:27:12'),
(26, 139, 397, 'ketut adi widana', 'L', 'tegal asih', '083114480490', 'chJHfw7XAdOcPM3MaKCENvp4nQhcx2Ulg2xosv7O.jpeg', 'w5Hdx9ixGEfYm2b6kvz9Psh97m0AoXZwdZYrMkpW.jpeg', '2019-01-24 04:29:44', '2019-01-24 04:29:44'),
(27, 142, 405, 'I Gede Antara', 'L', 'Banjar Yeh Kuning', '087860623136', 'eIzUhUngJQcn1Q7wrx7L62X2ZRnRrwXEafU3uOM3.jpeg', 'FbRjLM9HgjNrW2rGPW0MqFc7Y7ZlTBr8tSMWezxv.jpeg', '2019-01-24 04:34:49', '2019-01-24 04:34:49'),
(28, 146, 400, 'Sudhiarsa', 'L', 'Jl p sumba 1', '081999010001', 'GfZdzsJT4zuq7T4H4ya5sLyTbEj82IHHSc4G9R9U.jpeg', 'IIjB3SEpSXvOiIhRwdNPRvYvqYJ42vioXnpJQd3o.jpeg', '2019-01-24 04:38:41', '2019-01-24 04:38:41'),
(29, 149, 419, 'I Ketut Haliantara', 'L', 'Banjar Pangkung Kwa', '081999680017', 'Txtz13zS7Gw1C19v64L5xT9VvcKY3pNdGp3alZSy.jpeg', 'zgQsVzHa1eiFDA65f6lLsDinX6ReIhMMdqY9jCHT.jpeg', '2019-01-24 04:42:02', '2019-01-24 04:42:02'),
(30, 154, 420, 'I Putu Agus Susila Mahardika', 'L', 'Lingkungan Baler Bale Agung', '087860588753', 'cOysBhxcvy3KO6yBTFA72z3Fjnah26oZnzhr8IRz.jpeg', 'bVUfKmiRLQXBFRjeIRh69lfFpXJ84JDBSC6IwAWU.jpeg', '2019-01-24 04:47:23', '2019-01-24 04:47:23'),
(31, 157, 435, 'Ryan Azhar', 'L', 'Lingkungan petukangan loloan barat', '081999822215', 'H0j18KaFXsmXVsLLV0l455GOfSY1uqXBnTqV5Kwd.jpeg', 'lcu45GzsTCkfIpm9pvO85O2SXG9AFjggQtIQGe2w.jpeg', '2019-01-24 04:52:26', '2019-01-24 04:52:26'),
(32, 160, 455, 'I Gede Kantun', 'L', 'Nawakwrti,Abang-Karangasem', '081339023585', 'hr5RY4xgOsbzO8JQ8zrT8t9RyRJyqkcmIkZ96Kj1.jpeg', 'mppv50VqzWbNYgHKm8SXcxjyFPnwJNcY9dxcshJo.jpeg', '2019-01-24 05:03:09', '2019-01-24 05:03:09'),
(33, 163, 453, 'I Nyoman Kukuh', 'L', 'Kesimpar, Abang-Karangasem', '085792262243', '1EKknxCQGoHKQibuQwNthdT9vO72uQxLQJ2fcXP3.jpeg', 'NYsH3fsfUFwZqJRwzJdlNvXXmXLUJw8vWGVZFNV6.jpeg', '2019-01-24 05:09:27', '2019-01-24 05:09:27'),
(34, 166, 447, 'I Wayan Ngurah', 'L', 'Sadimara, Abang-Karangasem', '085857851711', 'UDcAfNshZ8RN4Wgh0dXKzlb3oDVpiaZ6sG6x0yJ9.jpeg', 'D3gGi7MobYGzyBKX7nEFkJ7S4BOBwvf55ns4WD8B.jpeg', '2019-01-24 05:11:18', '2019-01-24 05:11:18'),
(35, 169, 452, 'I Nyoman Pica', 'L', 'Kertha Mandala, Abang-Karangasem', '085965958382', 'lqbBuJSdiyfdCJTDd06an3Cxh5Z62UTELWGd6t1q.jpeg', 'BNwoSFUyZWMgDMaym91u9tYsLQhbEE16jLhRmDTZ.jpeg', '2019-01-24 05:13:24', '2019-01-24 05:13:24'),
(36, 172, 503, 'I Kadek Supardika', 'L', 'Br dinas pande desa nongan', '081239114025', 'eT8gGrYvMsqxQx7u4jPwSglp3fhXGmzE2tB9oMPC.jpeg', '3PiuHbgUNB06SISeC4rLD6NgmzzJytauPcr1scil.jpeg', '2019-01-24 05:20:45', '2019-01-24 05:20:45'),
(37, 174, 537, 'I Ketut Subrata', 'L', 'Dusun kawan,Desa Tusan', '085934767041', 'M0Pql1wAPpqCqrWY5QZJ4DDuCPyllavHl0kuVRaC.jpeg', 'uGsKFXB0CWFcmsxfCcFNdM7qFzE8Wsuqm29B7Dnj.jpeg', '2019-01-24 05:23:24', '2019-01-24 05:23:24'),
(38, 178, 535, 'I Wayan Kartika', 'L', 'Dusun Kawan Desa Tohpati', '081999077423', '1oQyr5WpgXHyPVB6kHiGcmvB99hJ3mSXJDEwvvSk.jpeg', 'DjG9s3OTWN7fMZVTfk1buOFNULSmZmJb7DU9eEoI.jpeg', '2019-01-24 05:27:00', '2019-01-24 05:27:00'),
(39, 181, 536, 'I Ketut Genah', 'L', 'Dusun Kawan Desa Tohpati', '085239178382', 'LfeG75erQ6B0pWJXQPTf4XDD5eMPkGKjUl9s39iY.jpeg', '4g3BKJhUQkf2duitfLi01OnL07NbMjjiPNCIc3Lv.jpeg', '2019-01-24 05:29:04', '2019-01-24 05:29:04'),
(40, 184, 715, 'I Made Amantara', 'L', 'Br.Tunjuk Kelod, Desa Tunjuk, Kec.Tabanan, Bali', '081239665722', 'HpxzBjtbzrwOIUCVusvVtW9xGuRCmJuhVWxaLOLG.jpeg', 'EFvHFPPmsPEubodpb52iOkhSWshn05sqTA0aSwNZ.jpeg', '2019-01-24 05:39:07', '2019-01-24 05:39:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_04_051708_create_roles_table', 1),
(2, '2018_09_05_051700_create_users_table', 1),
(3, '2018_10_08_045021_create_kabupaten_table', 1),
(4, '2018_10_08_045521_create_kecamatan_table', 1),
(5, '2018_10_08_045539_create_kelurahan_table', 1),
(6, '2018_10_08_051559_create_partai_table', 1),
(7, '2018_10_08_051631_create_koor_table', 1),
(8, '2018_10_08_051643_create_saksi_table', 1),
(9, '2018_10_22_062623_create_pengumuman_table', 1),
(10, '2018_12_19_053457_create_c1s_table', 1),
(11, '2019_01_01_091604_create_targets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `partai`
--

CREATE TABLE `partai` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `partai`
--

INSERT INTO `partai` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Berkarya', 'Partai Berkarya', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(2, 'Demokrat', 'Partai Demokrat', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(3, 'Garuda', 'Partai Gerakan Perubahan Indonesia', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(4, 'Gerindra', 'Partai Gerakan Indonesia Raya', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(5, 'Golkar', 'Partai Golongan Karya', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(6, 'Hanura', 'Partai Hati Nurani Rakyat', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(7, 'NasDem', 'Partai Nasional Demokrat', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(8, 'PAN', 'Partai Amanat Nasional', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(9, 'PBB', 'Partai Bulan Bintang', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(10, 'PDIP', 'Partai Demokrasi Indonesia Perjuangan', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(11, 'Perindo', 'Partai Persatuan Indonesia', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(12, 'PKB', 'Partai Kebangkitan Bangsa', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(13, 'PKPI', 'Partai Keadilan dan Persatuan Indonesia', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(14, 'PKS', 'Partai Keadilan Sejahtera', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(15, 'PPP', 'Partai Persatuan Pembangunan', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(16, 'PSI', 'Partai Solidaritas Indonesia', '2019-01-08 13:26:59', '2019-01-08 13:26:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `user_id`, `judul`, `isi`, `lampiran`, `status`, `created_at`, `updated_at`) VALUES
(1, 58, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lamp_1548561842.jpg', 1, '2019-01-18 04:55:55', '2019-01-28 10:06:11'),
(2, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1, '2019-01-18 05:39:24', '2019-01-28 10:13:58'),
(3, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Surat Permohonan Survey_1549543489.pdf', 1, '2019-01-24 06:10:07', '2019-02-11 10:07:03'),
(4, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 0, '2019-01-24 06:10:23', '2019-02-16 03:29:26'),
(5, 58, 'Undangan C6', 'Mohon kepada kawan-kawan saksi untuk dapat memastikan agar undangan C6 sampai kepada para pemilih. Jika ditemukan ada pemilih yg belum mendapat undangan C6 agar segera melapor kepada koordinator saksi.', NULL, 1, '2019-02-01 03:03:34', '2019-02-17 23:46:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Pimpinan'),
(2, 'Komisi Saksi'),
(3, 'Koordinator Saksi'),
(4, 'Saksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saksi`
--

CREATE TABLE `saksi` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `koor_id` smallint(5) UNSIGNED NOT NULL,
  `partai_id` tinyint(3) UNSIGNED NOT NULL,
  `tps` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_diri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saksi`
--

INSERT INTO `saksi` (`id`, `user_id`, `koor_id`, `partai_id`, `tps`, `nama`, `gender`, `alamat`, `no_hp`, `foto_ktp`, `foto_diri`, `created_at`, `updated_at`) VALUES
(1, 60, 1, 7, '3', 'I Kadek Soni Arimbawa Putra', 'L', 'JL Tukad Banyusari, Anggrek Merah 23 Br Kaja Sesetan', '081236133857', 'A7b7YDecEkXNX5He1RyfBsmK2KqaOUNqpzhYNIBO.jpeg', 'r80koPFO3nxLAAZBrwmSglHP3ckdDy0zoZDtUW8C.jpeg', '2019-01-10 11:41:43', '2019-01-13 10:08:53'),
(2, 62, 2, 7, '25', 'Luh Suardi Ariani', 'P', 'Jl Ry Sesetan Gumuk Sari No 9B Gaduh Sesetan', '0895355716954', 'ifRhVqonhtxfk1Fk4vNzLrSFk0oNJ4ku6Mqann8P.jpeg', '2icYyImjWQRJNXuQKQlIeXXMKqgIgT6BM1jt5umS.jpeg', '2019-01-13 10:12:33', '2019-01-13 10:12:33'),
(3, 63, 2, 5, '31', 'I Komang Ari Permana Putra', 'L', 'Jl Ry Sesetan Gg Kepala No 6 Lingk Gaduh Sesetan', '081246977827', 'x9lYDRuHz09gqekic7kvbQh3SGBss22i0MZPJFq2.jpeg', 'XudEWheQxqYJh0D9C3rnTUbUvd1heW5GGH9qQni5.jpeg', '2019-01-13 10:14:09', '2019-01-13 10:14:09'),
(4, 65, 3, 4, '4', 'Ni Komang Suwartini', 'P', 'JL. Tukad Balian No. 126 DPS', '081236873199', 'mso4MZFLbTkKl51sG2vENmO8H90whMo3q6Iejici.jpeg', 'Dige6SfpIwOUKYxEoq73cEOOKvE5M2DPPH60zBnx.jpeg', '2019-01-13 10:16:45', '2019-01-13 10:16:45'),
(5, 67, 4, 7, '1', 'I Made Suryanto', 'L', 'Br Batan Tanjung', '081338651794', '3hMP5lUbXv6aD04iIra3Gn6ZQaCPvK5KsqwpujhU.jpeg', 'aUTlN25QbR2933ILtTd81az6B4rMfyw0Jtzw8b5l.jpeg', '2019-01-24 01:58:47', '2019-01-24 01:58:47'),
(6, 68, 4, 7, '2', 'I Nyoman Surya Antara', 'L', 'Br Baleagung', '081337957660', 'WzARf1mb7z7tHNwIECXhpRaRVs2Z20hMygtEaLuv.jpeg', '1B7e6OgoEdxRbZqIDRcimU0AQ3eE7tS5fHWqnnLI.jpeg', '2019-01-24 02:00:16', '2019-01-24 02:00:16'),
(8, 71, 5, 5, '10', 'I Wayan Sila', 'L', 'Siladan Tamanbali', '081338520722', 'TfGSwVkaBuFywaBwipeiUqoH2YE4Xm6rvbD7qQIS.jpeg', '3Gjw8H04OQuaHVgUYrhS26i5yLuyS2RXdiU5ojl6.jpeg', '2019-01-24 02:05:58', '2019-01-24 02:05:58'),
(9, 73, 6, 2, '2', 'Ni Komang Setiawati', 'P', 'Siladan Tamanbali', '085858494021', 'egqE3hX6JX17uhcK4PJEEdcxcacY0dDR3CQobuI8.jpeg', 'feZv16q1ZCpNMAO8Dq60oQ9na98nFilo3sUvd8VL.jpeg', '2019-01-24 02:10:54', '2019-01-24 02:10:54'),
(10, 75, 7, 7, '5', 'Putu Eka Saputra', 'L', 'BD. Sumberkesambi', '085239188503', 'qHU2MgxISvW5Gb4kcXrbMWzadBH5cWDKohy2Ys4S.jpeg', 'sn8Eww0VUZvfUd3fm8q97pone00KvqqbcqGvOf8E.jpeg', '2019-01-24 02:21:18', '2019-01-24 02:21:18'),
(11, 76, 7, 10, '2', 'Ketut Sulastra', 'L', 'BD. Sumber Bunga', '085238848758', 'RuqoS9A5ma8x5lYztCAviKRJAvhoo0WqkOhWFNXS.jpeg', 'T2zMxhaEy1sJ0XtmLloC8Mg9bxSt7wXPSd76IFZf.jpeg', '2019-01-24 02:22:36', '2019-01-24 02:22:36'),
(12, 78, 8, 11, '3', 'Gede Suardana', 'L', 'BD. Tamansari', '085338959983', 'CLDcI2GJaMqAfl5hIHgVObtzYSRKOpsdj4zf8nrl.jpeg', 'TJzM0xZSf4ychqrQNJnyy6Ug4HvLzuYAar7hzS0B.jpeg', '2019-01-24 02:27:14', '2019-01-24 02:27:14'),
(13, 79, 8, 4, '5', 'I Gede Sumadana', 'L', 'BD. Wanasari', '085338959983', 'vgdX8eABIlIJyoDr6UjN885Wlwerw3qeArTjNvjB.jpeg', 'PBvtNQoATRukXRPKozYbxefVHO7Mpho5TrUQRP66.jpeg', '2019-01-24 02:28:38', '2019-01-24 02:28:38'),
(14, 81, 9, 7, '4', 'Ni made asvina sari', 'P', 'Br dinas kanginan desa bila', '082145006288', 'F6ZQT6RdXPVGAhPaInO0o1hoTQMlvvd84eRDpiXW.jpeg', 'tE7IjIC45M58dfAYTCx031hHf1OHdOcf4KR42eEn.jpeg', '2019-01-24 02:31:41', '2019-01-24 02:31:41'),
(15, 82, 9, 5, '5', 'Komang putri suryani', 'P', 'Br dinas kanginan desa bila', '+6287860135107', 'IDXEo37xnvT40mR2XMj3lg1wlKG7Q5i7nWLPspIY.jpeg', 'vSEizlHFdzfq5xoYgkmoYecvViCoHRWYPfBb9Evu.jpeg', '2019-01-24 02:33:02', '2019-01-24 02:33:02'),
(16, 84, 10, 9, '12', 'Pt Tasya Arsita Dewi', 'P', 'Jl Nusa Kambangan XXIV/2 Pengi Dauh Puri Kauh', '085100432929', 'v07d5xD1pwmpBQsq1AkjLo7SoKA3UL5xodacIMSu.jpeg', '4RIBjOlN757ib4X7SGDC3kabnQCBklAxUalEIZkt.jpeg', '2019-01-24 02:38:28', '2019-01-24 02:38:28'),
(17, 85, 10, 7, '13', 'Ni Putu Maya Febriyanti', 'P', 'Br Tegal Kuning, Bongkasa Pertiwi, Abiansemal', '085100432929', 'x2IwFp5tbjNyHXrROkjZ9cmhJ79HBexzA8V2GoNd.jpeg', 'nV6ujKvmkcylvlyMFZmlv8Ko8jFaoD73BwNQXy7U.jpeg', '2019-01-24 02:39:45', '2019-01-24 02:39:45'),
(18, 86, 10, 2, '11', 'I Putu Rana', 'L', 'Jl Nusa Kambangan XXIV/6 Pengiasa Dauh Puri Kauh', '085100432929', 'bdRP6801iI9ElVLKK1ZTt27FIyWZEiZfFtAZV5Zf.jpeg', 'UJPrAJQYy0OWXXJb1FPZjeXDLORxHr7K0QyjkrmA.jpeg', '2019-01-24 02:40:47', '2019-01-24 02:40:47'),
(19, 87, 10, 10, '8', 'NI MADE HELEN SUSANTI', 'P', 'JL. NUSAKAMBANGAN GG. BARU NO. 59, JEMATANG', '085737632997', 'fx8UvnYjIWlIV9A3b7oNCVZqWMq5QQ2vc1wu1z12.jpeg', 'FAVDKDA5Lm5TnFOm8fTZ0KT3x5mAEifmTVVq9KbF.jpeg', '2019-01-24 02:42:00', '2019-01-24 02:42:00'),
(20, 89, 11, 4, '10', 'Lusi Mulifah Handayani', 'P', 'Jl Merta Jaya GG IV D/17 Link Merta Jaya Pemecutan', '087855523095', 'CJ21dEFtodBhwLe4kqPdE6T2odAcX5MqPrZmLdQF.jpeg', 'fO3gt3phWJKVXQuSFSg63wMYsayu9tOBPKFdj4f6.jpeg', '2019-01-24 02:43:58', '2019-01-24 02:43:58'),
(21, 90, 11, 9, '12', 'I KT JANUARTA', 'L', 'JL NUSA KAMBANGAN XXVIII/7', '081529582161', 'B6O8ZTAP5drOC42CMEUARidrb5yE2ePTeOrzI3XB.jpeg', 'NTQocbJe6S80Lok8Qh76SJNptrWf0Xs5pYusL1lt.jpeg', '2019-01-24 02:45:07', '2019-01-24 02:45:07'),
(22, 92, 12, 7, '11', 'IDA BAGUS MADE YUNI ASTAWA', 'L', 'Jl.Gn.Selamet IX No.193', '081353213549', 'ElLPl2Twemolw0sar3oHSHJ3TqvlYr7J1w8KUb52.jpeg', '9oFc9U8VOS6AS6cmCPKZYZA6v58wInjHkU09wiUj.jpeg', '2019-01-24 02:47:55', '2019-01-24 02:47:55'),
(23, 94, 13, 7, '1', 'Ni Putu Eka Citraningsih', 'P', 'Jl Gn Sanghhyang GG Majapahit No 6 Padangsambian', '085858225522', '7chn3yOKlQaW6DWpJAikdHnkw6hceEYAkJEbUKuf.jpeg', 'PWUY0A5ScH46ZsjyZVdbSROlvScQ4zlBufaKQ5Fu.jpeg', '2019-01-24 02:49:48', '2019-01-24 02:49:48'),
(24, 95, 13, 7, '4', 'Nyoman Pande Aryanti', 'P', 'Br Tengah Sibangkaja Abiansemal', '081803660711', 'GJv2RiqoCjS6xMxvnbknCPeDipnnw9C1oyWf8wqb.jpeg', '47B43WoEYnucJWAPoPCTbXw5LQbAR9ZoZkRPImqa.jpeg', '2019-01-24 02:50:45', '2019-01-24 02:50:45'),
(25, 96, 13, 7, '5', 'I Putu Sukra Yasa', 'L', 'Br Lebah Lingk Pande Semara Kelod Kangin', '085737423942', '2Wzkl8LnWPtEIdhxsKlrHlcEa0zWKfYh1AE7EuHp.jpeg', 'tkiG1xVkwa6cZ01GUchxZD2HRPwUWmlfbcl7dyku.jpeg', '2019-01-24 02:53:25', '2019-01-24 02:53:25'),
(26, 98, 14, 8, '2', 'I Made Candra', 'L', 'Jl Nusa Kambangan XXX/4 Pengiasan Dauh Puri Kauh', '085100432929', 'liy9HGC9CfqLSKjGHMPa4aAqW2NCP7arDrIHxJ7w.jpeg', 'gbN1GvzDvzUKAfd4EenhxyeI51fR9HPj7MAA16OU.jpeg', '2019-01-24 03:00:07', '2019-01-24 03:00:07'),
(27, 99, 14, 9, '9', 'I Nyoman Wira Wahyudi', 'L', 'Jl Nusa Kambangan XXX/4 Pengiasan Dauh Puri Kauh', '085100432929', '8tczTmEzx2BpTv0LW6PoEQUuov8a1AvojvYuuB9i.jpeg', '024nx71uQmIpiM8EXnbbwh7L7oiOqjxI9PS2j1fV.jpeg', '2019-01-24 03:01:02', '2019-01-24 03:01:02'),
(28, 101, 15, 6, '1', 'A A Ngurah Putu Satria', 'L', 'Jl. P. Ambon No. 53 Denpasar', '081933047572', 'WVl9nHxyymgi30lXCGFJk9QzacsviqaRq6hMjWDG.jpeg', 'wv639CbYTEjGePHAA4ZaU63WLVMEccFdSUwUuQwN.jpeg', '2019-01-24 03:04:09', '2019-01-24 03:04:09'),
(29, 102, 15, 14, '8', 'Nyoman Windra Septiawan', 'L', 'Jl Gunung Merapi No 24 Pemedilan Pemecutan', '087861686728', '11RyexdEoUuTxHlQpMBdZ8BB960Pq99mjbferJMp.jpeg', 'BE7LbQahzkGiGsz2UeLnbTAhRksbTRjAbBVc15Mk.jpeg', '2019-01-24 03:05:22', '2019-01-24 03:05:22'),
(30, 103, 15, 10, '9', 'AA Sagung Putra Paramawati', 'P', 'Jl Thamrin No. 2 Alankajeng Menak, Pemecutan', '085100432929', 'SUr4K4HYR6BDuaFVGuBDcqChWctQTevPlPvk3pLb.jpeg', 'redfHPdiYGpA2b5H0Z4BmvDuC9iBE9RIKyaP5X78.jpeg', '2019-01-24 03:06:27', '2019-01-24 03:06:27'),
(31, 105, 16, 2, '1', 'Marlenci Hefer Yuliyanti Ndoen', 'P', 'Jl. Sudirman Gg. Bhineka I/4 Dps, Br/Link. Yang Batu Kauh', '081337661725', 'gfzQLYBucrtTaXbjqoTiNBD8NXSG9H2CR7BHoQf3.jpeg', '4ZCCJDv3tN0u4udBk8ExEtj9ZqxAwInLYIRv6DoS.jpeg', '2019-01-24 03:11:23', '2019-01-24 03:11:23'),
(32, 107, 17, 7, '3', 'Veneranda Udayana Deran Olah', 'P', 'Dalung Permai Blok P/9 Bhineka Nusa Kasih', '081338642051', 'POfqOXz72snRG9ArH8fzNxempF03LbGDgJNrE8rL.jpeg', 'idilEDqCrfoNFfMbwBzEk14Z0gcJS1pt1WcBL1AR.jpeg', '2019-01-24 03:14:47', '2019-01-24 03:14:47'),
(33, 109, 18, 7, '5', 'Ni Luh Ayu Krishna Yuni Permatasari', 'P', 'PRM. Graha Kerti Blok H.1 DPS,Br/Link. Graha Kerti', '087860157494', 'p8z2Sk13dC1G4u1OSZoqyLpT2pRlgPgFI2sSeQdq.jpeg', 'sd1mS0QJrGJCPPrpcBqb6NUozGjhGO3np95eVUvl.jpeg', '2019-01-24 03:46:43', '2019-01-24 03:46:43'),
(34, 111, 19, 7, '1', 'Ni Gst Yogeta Yushanti', 'P', 'Jl. Gn Sari II/1 Denpasar', '082999264578', '4wntsniHchi3wlo9fYuF2N7EANkks3wAPxLiS4ig.jpeg', 'UXR2VDr7jVkwg0BZo6KJrWE7PL7qKj97ZK575y2w.jpeg', '2019-01-24 03:49:27', '2019-01-24 03:49:27'),
(35, 112, 19, 7, '5', 'I Wayan Ada Darmawan', 'L', 'Jl Gunung Suari Sanur Kauh Penopengan', '081933047572', 'P49DNnoSDOS7Y8ZUfMzb46010V0SwDPlftQGPNp5.jpeg', '1PoXP9fza0zzxvxUEiBCL1dcL6FaKIgCRwFYiUWY.jpeg', '2019-01-24 03:50:53', '2019-01-24 03:50:53'),
(36, 113, 19, 7, '7', 'I Ketut Suartana SE', 'L', 'Jl. Tukad Bilok GG. Sekumpul No. 2, DPS Br/Link. Pekandelan', '081353200217', 'i4H5vdREGzgo1wvdHVxzl0IToUS7aNu5QLwiu2f9.jpeg', 'YBrwDIP4cGO1lSrGWUMxubbXBtb1vVs6L3ibwgQH.jpeg', '2019-01-24 03:51:55', '2019-01-24 03:51:55'),
(37, 114, 19, 7, '8', 'Ni Kadek Rebintang Pratika Sari', 'P', 'Jl Delod Peken No 3 Penopengan, Sanur Kauh', '083835351326', 'yVgKNQufMhD9x3xtUdGtM1jw0AEbvoOPCB3502rI.jpeg', 'q10Vvn2fXIJvfYHr18IiJ5DC3RNINE034RqabOsN.jpeg', '2019-01-24 03:52:38', '2019-01-24 03:52:38'),
(39, 117, 20, 9, '9', 'Ida Bagus Purwa Darma Putra', 'L', 'Jl. D. Kerinci No. 24 Denpasar', '081337596633', 'Of0ocRB3M3OqQ3OB4EgBGD8S2pvQtj4qetcQZIN1.jpeg', '3BZgW6PVzEe8ob8k39G8z1zmpD7LBHoQrLtv85BL.jpeg', '2019-01-24 04:01:06', '2019-01-24 04:01:06'),
(40, 118, 20, 3, '2', 'IDA BAGUS PUTRA SUDARSA', 'L', 'JL. HANG TUAH GG. MAWAR NO. 33 H', '082236066688', 'MN5k97u07HATg9UMNweEWg8jwFEwcXcwgWPMrrxP.jpeg', 'l982JYXxl0Z3jzQFzBRtmIfeanwciwGVqdJMOUaB.jpeg', '2019-01-24 04:01:49', '2019-01-24 04:01:49'),
(41, 119, 18, 5, '6', 'Ni Luh Ayu Desi Putri Pratami', 'P', 'PRM. Graha Kerti Blok H.1 DPS,Br/Link. Graha Kerti', '082247808987', '826BSco65PSmXdUbhc6x8fzaEmwJBjVhmoREhQzL.jpeg', 'bmozFODwa4N6rJrlL0xN02PZOSb7OY71vG8JySni.jpeg', '2019-01-24 04:04:12', '2019-01-24 04:04:12'),
(42, 121, 21, 6, '9', 'I Made Candra', 'L', 'Br.tojan tegal', '081236542135', 'jfnKzVBT1ixYvTBuJ2s15pe53ukGhfCyJLXiTHyE.jpeg', 'Ll8AYbXWh9wEMd5nPzIRRXVgPzAaLCc5137gYPaW.jpeg', '2019-01-24 04:13:09', '2019-01-24 04:13:09'),
(43, 122, 21, 7, '10', 'Dewa Gede Suardika', 'L', 'Br.Tojan Kanginan', '087542362145', 'NIdJZtqMSnc2wAmhSv5EkVxnztgXZdFgsaaqMxgU.jpeg', 'CCSiCvMh3dkA2bowZvuRtKch4amuhqEkt3zdrFvR.jpeg', '2019-01-24 04:13:51', '2019-01-24 04:13:51'),
(44, 123, 21, 7, '11', 'I Made Antara Yasa', 'L', 'Br.Penulisan', '081916560354', 'lEVDrri19G0w5dPbyUDuc4ssWTHA4kfYak3e4XE3.jpeg', 'uEJ66mQQDgBp8rhsrqBnFgrzYfr1FOx2ddBg87Ym.jpeg', '2019-01-24 04:14:36', '2019-01-24 04:14:36'),
(45, 125, 22, 2, '8', 'Dewa Ngakan Putu Mahendra', 'L', 'BR.KEDEWATAN ANYAR', '082246839448', '9oP1SsHAH7jN6MZnvNYQOQTHgyNs1b4Hqk47zudH.jpeg', 'afgp2mTHGTPWrTil70v1UI81Ff0BAarFCoraZqwh.jpeg', '2019-01-24 04:17:54', '2019-01-24 04:17:54'),
(46, 126, 22, 7, '7', 'I Gede Putra Sudarmawan', 'L', 'BR.KEDEWATAN', '087862086800', 'xUbAkpmvF3XgdWroyxqSNsns4kiy5kInAyd4EvsP.jpeg', '9QPeveU6LFqRNSNYIgU4V4HoFQgsc5XtNHpImsLj.jpeg', '2019-01-24 04:18:32', '2019-01-24 04:18:32'),
(47, 128, 23, 7, '1', 'I MADE RENDRA', 'L', 'BR.NYUHKUNING', '081338720342', 'f4w1LkYJ2xLNLXvqalmhRjMMRaTzzCbRtJuBv84M.jpeg', '0ZGxKFiMS5L6y2KImKH4ExskFq7v8b10b4gFqUcM.jpeg', '2019-01-24 04:20:13', '2019-01-24 04:20:13'),
(48, 129, 23, 2, '12', 'I WAYAN SUYASA', 'L', 'BR.BANGKILESAN', '087754688889', 'wbUCGKQu3UYjXW56BmyyBxqrTshr6HxFO1QHDfaq.jpeg', 'if7VWPsNcYRbGAtkIorMHdQVLgxYHTYlMMLXDOeT.jpeg', '2019-01-24 04:20:59', '2019-01-24 04:20:59'),
(49, 130, 23, 7, '11', 'I KETUT WIJAYA', 'L', 'BR.BANGKILESAN', '087754688889', 'coBEGbgCJGzaMPKfUdapgcVXxJHKQTBH1GE3G0h9.jpeg', 'sUSEFm7RLEjeYZtJBoE9xd14Tkf9yOAovSrxmDNm.jpeg', '2019-01-24 04:21:42', '2019-01-24 04:21:42'),
(50, 131, 23, 4, '10', 'I WAYAN AGUS SUNIKA', 'L', 'BR.BANGKILESAN', '087754688889', 'pn2T8zfHcyGVQTPVNiJoYnW7eXrvNH6JdlXOhtiX.jpeg', 'BxAOglvp5BVm3KkuUqXoNCnsofXjAuWOW9OaEzaq.jpeg', '2019-01-24 04:22:38', '2019-01-24 04:22:38'),
(51, 133, 24, 7, '4', 'I WAYAN RAHARJA ADI PUTRA', 'L', 'BR.PENESTANAN KELOD', '087860356835', 'Dsor0uLh3NP0gRupfJmOS53DevAEaIvdIfUZ6VK2.jpeg', 'nhmYwTpFMcPeA3nzD9K1S90EQMaxjdJegM419iqj.jpeg', '2019-01-24 04:24:30', '2019-01-24 04:24:30'),
(52, 134, 24, 7, '2', 'pande putu aryusna putra', 'L', 'br. sindu', '087855692307', 'Vj8i259iSGbMztOcXzuyiTx8w4Qg7pcQrYXiQk5c.jpeg', 'o5wl9cEDUWOkj0SZYvfB03OkB9OBsT8fT7Jf1FsX.jpeg', '2019-01-24 04:25:07', '2019-01-24 04:25:07'),
(53, 135, 24, 9, '5', 'i kadek budiarta', 'L', 'BR.PANDE', '081999484820', 'Jkt8ije7Z3seAmfDuUnxvo28ankmNXDBU6TiS3JT.jpeg', 'maxXmUjs1xvRMVloVkJusqmbA5OPN62sci7XxOnr.jpeg', '2019-01-24 04:25:41', '2019-01-24 04:25:41'),
(54, 137, 25, 10, '1', 'Moh Mujiarta', 'L', 'Prancak', '+6285236918899', 'D0PXzKcCSGd4gMq10TG4fr7y8XcsPIsIOjC3WlFv.jpeg', 'Oq2XZ2ikjiOCLniAd1rwEtJeEFqEa4fEYygMEfwN.jpeg', '2019-01-24 04:28:08', '2019-01-24 04:28:08'),
(55, 138, 25, 7, '5', 'made arta yasa', 'L', 'lemodang', '081999742349', 'GOZWdEZXBBLBh3zOLesj6YHLBFEl7xpauW9WpBDR.jpeg', '8HkgXDKYqnDvCXMXSdDdaf3N1lAKzEafA512hE1n.jpeg', '2019-01-24 04:29:02', '2019-01-24 04:29:02'),
(56, 140, 26, 10, '3', 'wayan suryawan', 'L', 'tegal asih', '081805504761', 'EEtgH9ZippqGCm2UGf32z6RIrITixtc2ElmuoJ0C.jpeg', 'PxDHznxsCQEJtTxcO71KN3prIeW1pYJtpRY8znVD.jpeg', '2019-01-24 04:30:30', '2019-01-24 04:30:30'),
(57, 141, 26, 7, '5', 'made gunawan', 'L', 'tegal asih', '083114480490', 'RZjFuBM1VtudzrPyFQzOcwFbyOhmu88DrVRT3Y1r.jpeg', 'gyb9kTKOvpVkUabKID9wuVEvaMlWYLarYCqqFizY.jpeg', '2019-01-24 04:31:23', '2019-01-24 04:31:23'),
(58, 143, 27, 5, '1', 'I Made Merno', 'L', 'Banjar Yeh Kuning', '081999180379', '3l4DkGROvqwgEO6O0I3CRmk2eIChhQcnxw0pXIbo.jpeg', 'PytDdk0myE2KTkgoMIzcDkwlcigzo2kcqF0y8zjE.jpeg', '2019-01-24 04:35:26', '2019-01-24 04:35:26'),
(59, 144, 27, 10, '2', 'I Gede Sudana', 'L', 'Yeh Kuning', '0819-9955-2778', 'Npe5x3yR5g3vraJx2MonBMrUen96zO8bxXo785wj.jpeg', 'XPXGxabnMHBWTGVNVN2TZkKyeeQdKK6V7ALUbwwW.jpeg', '2019-01-24 04:36:17', '2019-01-24 04:36:17'),
(60, 145, 27, 10, '3', 'I Made Sugiarta', 'L', 'Yeh Kuning', '087860465540', 'N09EL8QGgF4Feikqhpq32Dy9sq5LRWw7weEdpTOu.jpeg', 'pRd0K2h1ezPkXAgeARKElMlZexHfDVGS3bzv23A7.jpeg', '2019-01-24 04:37:15', '2019-01-24 04:37:15'),
(61, 147, 28, 7, '1', 'donicandra', 'L', 'lingkungan menega', '081805562602', '9GUz9ZReiwIqBCo7aR9wzBZR35vFqYiGFjb7beN7.jpeg', 'qOjUPxghFGWemsr6pMKNW3t9CLrgdxyXZ42NygoG.jpeg', '2019-01-24 04:39:35', '2019-01-24 04:39:35'),
(62, 148, 28, 5, '2', 'gusti putu armawa', 'L', 'sawe rangsasa', '081805504761', 'LoXwNVMzNvyD1aeV8bK1RJHKUmeHjFDpMS6DhHmP.jpeg', 'ap86UR1W4mWNcRDUwz9zQsiYDFmK01XQnINSKHWV.jpeg', '2019-01-24 04:40:17', '2019-01-24 04:40:17'),
(63, 150, 29, 7, '1', 'Ni Made Kumarawati', 'P', 'Banjar anyar tengah', '0878-6028-3897', 'RRtnrDzAQyM0aepttgWYBGhhx2a4MFtwJ6rJ0OsU.jpeg', 'KrxhyoWUZ6gUJvZUVeeqYhhzRPpy6NX8ycINcYtQ.jpeg', '2019-01-24 04:42:43', '2019-01-24 04:42:43'),
(64, 151, 29, 10, '12', 'I Gede Agus Putra', 'L', 'Banjar Anyar Kaja', '085940865316', 'WBVTo2pEUrtjCKO7jhOx0LjyzBzg0TkMiypzSEHt.jpeg', 'DXoQwANqIOLoW33kHy5CRhwarU0Bmf4Dhh4L3b2l.jpeg', '2019-01-24 04:43:21', '2019-01-24 04:43:21'),
(65, 152, 29, 5, '11', 'I Made Sudiarta', 'L', 'Banjar Yeh Mecebur', '085321152696', 'yY791mjlhgV2XmWhkduHy6KdmUULmWEjjVv9Gjxk.jpeg', 'JQA5gFivfduN063ztiNJDRrrdQlpE3Up0FiqlxPQ.jpeg', '2019-01-24 04:43:59', '2019-01-24 04:43:59'),
(66, 153, 29, 7, '13', 'I gusti ngurah putu eka saputra', 'L', 'Banjar Pangkung Kwa', '085739723371', 'JguloHLrGfgHeuW7tqjGqBJYLV7TCdOonZLEhFV8.jpeg', 'EdqdAGjZrQhLHyqkHmGOUZXCBAy1TPzAGTqDDN89.jpeg', '2019-01-24 04:44:42', '2019-01-24 04:44:42'),
(67, 155, 30, 7, '2', 'I Wayan Suarma', 'L', 'Banjar bale pasar', '0857-9234-6009', 'AQ27xdwHhXq8JyfKYxZg05p1U3OlErkOaIM7yCWA.jpeg', 'XjczNUEP8ltYLMCQx2HyO0Z91RiC95XsB3PG9Jcx.jpeg', '2019-01-24 04:48:24', '2019-01-24 04:48:24'),
(68, 156, 30, 10, '8', 'Dewa kade suarta', 'L', 'Pangkung apit', '085737658648', '9kcIdAb6PO5oYaKWkEbGw99BsG1zqPG3sraBEAD9.jpeg', 'ctw3mVIxYON0pusMcGr5fReokgvZaRzIKm9FAh8R.jpeg', '2019-01-24 04:49:35', '2019-01-24 04:49:35'),
(69, 158, 31, 7, '2', 'Ahmad Roziqin', 'L', 'Lingkungan pertukangan loloan barat', '087755793480', 'ymQBfmqDCjOa2fPBKnpbXyCpMs07PW1GjxF62dlc.jpeg', '4IM6A1TSoymn5unrXdRCVl0KVpHIcAgmPBjDqRf8.jpeg', '2019-01-24 04:53:10', '2019-01-24 04:53:10'),
(70, 159, 31, 7, '7', 'Muh Bustanul Arifin', 'L', 'Lingkungan pertukangan loloan barat', '082147333010', 'rqdcvM2YZveYHItzbz5H8lXjKLS6vS4NJvltsUgF.jpeg', '6KzvaDz9GqlhYSSEB1FVUtOTIxdToyaPkRNdJdCZ.jpeg', '2019-01-24 04:54:10', '2019-01-24 04:54:10'),
(71, 161, 32, 7, '1', 'I Nyoman Edy', 'L', 'Nawakerti', '085954189061', '60rhZXQLhJKOuHvxyWyfB2PfLaLr2mLDu4ZOjSIN.jpeg', 'JixtSC4vEB2j24IrHlmdmI8kNKoHokulphV02d4T.jpeg', '2019-01-24 05:03:46', '2019-01-24 05:03:46'),
(72, 162, 32, 10, '1', 'I Wayan Turun', 'L', 'Nawakerti', '085936105408', 'jIY2wNOnoG0ejvscvZtjk4UHB2Gt1U3K2cmVvMlG.jpeg', 'AyiSct7YW3o2HnNaSamWO5VnHzN1uHa6sJ6TAr8N.jpeg', '2019-01-24 05:04:37', '2019-01-24 05:04:37'),
(73, 164, 33, 7, '1', 'I Gede Juliawan', 'L', 'Kesimpar', '085858697656', 'h8aPHKCCFXVHHb2i2dt5c5Lew2iEKzzG5Mgs27rX.jpeg', 'NkfOltDms2gsgJoiToyLb3BcYUyDhRHYmubN6i1i.jpeg', '2019-01-24 05:10:05', '2019-01-24 05:10:05'),
(74, 165, 33, 5, '1', 'Ni Nyoman Riadi', 'P', 'Kesimpar', '085792634855', 'MgzFwbXkT75an57BeIXbLKt2bN7JYh8CcAq4jm8b.jpeg', 'odpIw7jBj30pRYP1N44jbyQicPGdH061uh9kjuMx.jpeg', '2019-01-24 05:10:39', '2019-01-24 05:10:39'),
(75, 167, 34, 7, '1', 'Ni Komang Melantari', 'P', 'Sadimara', '083114649240', 'lbZaMTqMLcdPJXzkWR62ZTUz0pjhuKkImzp9Pz9Z.jpeg', 'XFQAk0NIreGDIf4W8BPljFgYrfmmfSwOfkETKDpy.jpeg', '2019-01-24 05:11:56', '2019-01-24 05:11:56'),
(76, 168, 34, 10, '3', 'I Md Suyatna', 'L', 'Sadimara', '085792829874', 'fk4E6fYsYrCH6RY2WgIfPjLi9AaTYXKd5x3gqlYp.jpeg', 'aQEPCW3G27A6VEOotfVeG5Afu0P1ZuNWjX3xS43j.jpeg', '2019-01-24 05:12:30', '2019-01-24 05:12:30'),
(77, 170, 35, 7, '2', 'I Gede Tiga', 'L', 'Kangkaang', '087760041156', 'IMT58RslRCVCRXbesQJDUVSjRRb8Po81L38J8i4q.jpeg', 'Cox3y1m2UfTD9VCJmnMtNPgYPnLRgSdOh6gRtCll.jpeg', '2019-01-24 05:14:12', '2019-01-24 05:14:12'),
(78, 171, 35, 5, '7', 'I Nyoman Sumadia', 'L', 'Kangkaang', '087762609121', 'QT8HIt3zhcFGuUsMgS6cowQM1KJUnZlyPdtKRVJk.jpeg', 'rRwS5P2uRX3ghSf38MiBzcfTEwKiM8hAGGxAxLF5.jpeg', '2019-01-24 05:15:05', '2019-01-24 05:15:05'),
(79, 173, 36, 7, '1', 'I Putu Purna wirawan', 'L', 'br dinas tengah', '085337430312', '62I24R9eEAotGJvhpC0YXRHlZ37JdWV9SJ4Nyyn7.jpeg', 'NiKTWWAhJFU4a0Lv4IGe5btLQIr9elXdn5EfhMbY.jpeg', '2019-01-24 05:21:27', '2019-01-24 05:21:27'),
(80, 175, 37, 7, '4', 'Dewa Gede Ngurah Merta', 'L', 'Dusun Pagutan Desa Banjarangkan', '081237824460', 'GZHm200juWmubbUDPaTlj1YCnpsjsze6eeRke0am.jpeg', 'Pk6bnpKbVDaeIGFL1gfOjz2K5eS6zUbTsG9qtHry.jpeg', '2019-01-24 05:24:06', '2019-01-24 05:24:06'),
(81, 176, 37, 5, '5', 'I Gede Iko Puspayana', 'L', 'Dusun Nesa Desa Banjarangkan', '081237824460', 'QbENfNF6vn7VrBn0x5M6UccsYxGO79LIfIc1UAro.jpeg', 'l5MZNgXlbCDT4zkCOVV1GDF1sXnMHeBPkRQKN6g7.jpeg', '2019-01-24 05:24:43', '2019-01-24 05:24:43'),
(82, 177, 37, 10, '6', 'I Wayan Budiana', 'L', 'Dusun Selat Desa Banjarangkan', '081237824460', 'VP2oJ5zZESn0Wm3XdgLvXkCXcxNUlQfShp1xrGat.jpeg', '2YaRXiqWSMnJX5kY8T3EL6ZPeI4hjzp5XZQHWXwg.jpeg', '2019-01-24 05:25:21', '2019-01-24 05:25:21'),
(83, 179, 38, 7, '1', 'I Nengah Resana', 'L', 'Dusun Kawan Desa Tohpati', '0858-5753-9703', 'w3keJMgG19Kgq42PV15uMZyjMb9zo77xpRWA6GqG.jpeg', 'nXxTKUpcese8PQP2B288ktK7gnQDv62FSZo8VJNu.jpeg', '2019-01-24 05:27:43', '2019-01-24 05:27:43'),
(84, 180, 38, 10, '4', 'I Wayan Mustika', 'L', 'Dusun Kawan Desa Tohpati', '087861933132', 'lgF5M8IIXWQF9gNEeIHnTvZVpDHNBIDNCcsplLqR.jpeg', '68U5K47gZBkwY2Ln5wOvYW8jyIlOwQu5lpnBr1c6.jpeg', '2019-01-24 05:28:23', '2019-01-24 05:28:23'),
(85, 182, 39, 7, '2', 'I Komang Suweda', 'L', 'Dusun Kawan Desa Tohpati', '081236209256', 'ovUm3LdvuQ3YA0zjXqbblUaI9Vqx27PEJtnancvu.jpeg', 'FJSUNTIMn8d31YiNltTUj2XZoiIm01VtpUSc9avd.jpeg', '2019-01-24 05:29:57', '2019-01-24 05:29:57'),
(86, 183, 39, 5, '3', 'I Kadek Budiarta', 'L', 'Dusun Kawan Desa Tohpati', '0813846921669', '38pPjcyw0wTdAsIVPvykDLYLHkEF29yNxJoetet2.jpeg', 'YArlp3pJCjwZq4vwhsMMBv5GccuT0v9A06JTy8WC.jpeg', '2019-01-24 05:30:34', '2019-01-24 05:30:34'),
(87, 185, 40, 7, '1', 'I Gede Randika', 'L', 'Br. Tunjuk Tengah, Ds.Tunjuk Tabanan', '083119639016', 'pIHoiWgx0tZkN8vjyEyTlhk8JFGSi1lk5xb7dJh1.jpeg', 'oWILndNx1b2wbTNSBaTf0bP9lK6DCyLsLJgIg3WK.jpeg', '2019-01-24 05:39:45', '2019-01-24 05:39:45'),
(88, 186, 40, 10, '4', 'I Made Suitra', 'L', 'Br. Tunjuk Kelod, Desa Tunjuk, Tabanan', '082144655475', '0xt8JHPEP65Gjvzxudt1Sd9oY7A2j6Iq9FB0KiwN.jpeg', 'hYzHZV4XfZbKwgzw2bXKkwjBWBEH2LxwgaWHVowb.jpeg', '2019-01-24 05:41:21', '2019-01-24 05:41:21'),
(89, 187, 16, 1, '1', 'I Ketut', 'L', 'Jalan Raya Puputan', '0899928127122', 'nPhceQ7YSQYKMcHSVAmOFh8mivFUVpR3E7TWvTVK.jpeg', 'hZX5ZQ1Q5QKeqxpuGXAH5L46fqiyR0xeEhzLmFvg.jpeg', '2019-02-18 00:13:14', '2019-02-18 00:13:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `kab_id` tinyint(3) UNSIGNED NOT NULL,
  `target_koor` decimal(4,0) UNSIGNED NOT NULL,
  `target_saksi` decimal(4,0) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id`, `kab_id`, `target_koor`, `target_saksi`, `created_at`, `updated_at`) VALUES
(1, 1, '116', '1168', '2019-01-08 13:26:59', '2019-01-12 06:31:56'),
(2, 2, '93', '934', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(3, 3, '217', '2174', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(4, 4, '163', '1634', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(5, 5, '154', '1544', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(6, 6, '99', '998', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(7, 7, '189', '1890', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(8, 8, '70', '700', '2019-01-08 13:26:59', '2019-01-08 13:26:59'),
(9, 9, '156', '1560', '2019-01-08 13:26:59', '2019-01-08 13:26:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'abiansemal', '$2y$10$7hMKHqVbznTnyeacrhJ4QuCbnXSmTk9wY/U3rIGjMlEzjz2XSjzVC', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(2, 2, 'kuta', '$2y$10$KbNlMg/3IqQgEJGVa5UDJuVNoVJIKcwf/mrJEQy1T5gtpD3ll/FJi', 'ZG6u1xMunFUTuV4HtKVsacyAuCKLImp5LovAh879vtEjIoidQb5i2GmztKrI', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(3, 2, 'kutaselatan', '$2y$10$20B0u0jKe59.NtRzLXt7duXGy/Qsb4m.hrkyLt17mRaAIjC5HuZrS', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(4, 2, 'kutautara', '$2y$10$XeU76.Ix586EXkDSr47or.nGN/N9O2GFomF0wy2aKp4ppIoz8dANK', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(5, 2, 'mengwi', '$2y$10$g/Bpxc6Lv.9pXV5IpAc6xuei99JwwOL9XAcsWGXdAVpPfAE36OL4y', 'qvTJMD704WDbX6YUqfLKPqzCdkvk3CbO6Q33Vwg0HQuD1XCmTS4TUVvst3Cx', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(6, 2, 'petang', '$2y$10$Kt4zrnDljBX8jEI79oiHzurkGT53ewEuLxsUhOUB6/qbdOvmmWGrq', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(7, 2, 'bangli', '$2y$10$oNaC6e2DXDAQHvcsS8COxejV14yrFJODwT3ggUXz9382VuEJVMyWu', '8Dva0sSFeVuKNZfeVzJMj442vfXyPFbLCbBOGUKmbzDyCeNLykchuZXEKPv3', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(8, 2, 'kintamani', '$2y$10$K5UfzIvXE7Zy7vcN1mFpV.ApijyjtYWo3N4zQmu8boX30Ccb4SPO.', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(9, 2, 'susut', '$2y$10$zb6oKiRb8unjUuJpgPqJa.1UHu.9c1OmJShUE8jSJQ6YJIuq7v1zG', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(10, 2, 'tembuku', '$2y$10$F9eUZIrSnDxjrQds0KG1ieWzxVbvJlPImbaU.X0vY/w6RVCDXf0KK', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(11, 2, 'banjar', '$2y$10$v7KYDlu0G7h.c51GCNsVL.DMYsnYk10bI9rM.jwXHU8bSHlcRSGXm', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(12, 2, 'buleleng', '$2y$10$tUyiIzJA16Wtjv4or/X4COHVEd9u7K2XZO6vBwCUOtfomdS048.QG', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(13, 2, 'busungbiu', '$2y$10$Jl0BeVZpBKoWwtMzGNwJNuvlYgBjFaLZADqiv6dOZY98Rhvfcfxam', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(14, 2, 'gerokgak', '$2y$10$4olrTG5A63sBwkH2Im.3iuLdShaSE156ccjNOh9/.k/owh1LD.ZQG', '3tlIRJw5UwPgGSCInqXcezAaf2X8YNjGIcIEsuhau97yoa0TVxJM1hT5ZDAR', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(15, 2, 'kubutambahan', '$2y$10$rqrJB8rpkbJ3JSL3ocWtE.dppgKturG/ehtJGeMPWtB0vCPyoiMzW', 'Sl7bVHXs6eEZtQgRs5k80SblugnI4SvBZ6AszRpiNTSoRphnZFK7fy8CVeuJ', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(16, 2, 'sawan', '$2y$10$HOgDzi5muuXLb9WOCezHgegylyw0kjI/b0U1hChqKaWrUulXD2KZG', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(17, 2, 'seririt', '$2y$10$SUpEYKRl7otaeVN6lxPUDunm/9KUJhPcohdslilUy.3Ifh9Sb1jI2', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(18, 2, 'sukasada', '$2y$10$LkhFiy2reH/zGULI2kKE6.piyXtbI8Y53KLifi4mexH8GrHGc8aCO', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(19, 2, 'tejakula', '$2y$10$EeJed4NjALz1c0U.tNH7Je.P2wQ7GZmILUDdMf5h.qBJvt9dlMCnS', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(20, 2, 'denpasarbarat', '$2y$10$RreutVKpF8RXLeWfDDw0/Ojb9rBvvH2s.p3v8sA/EG3h1UD57Y8yO', '5SmrxTaqboPPw5nFIFDPsZqhcvl4sGJnLRNHpAskunjKzIFOUy2Jtd1CeKTd', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(21, 2, 'denpasarselatan', '$2y$10$XbNI6tBqnueW7LGxQXMQqOaMiQo3ZAK1xJlZH.2QQAP7J7i5izjRm', 'FuOvzZ1ypxyyanhVC5tAh1ZseaX76WuenLlR84EchkCZvlwwN7r5UHfskdpc', '2019-01-08 13:26:58', '2019-02-12 11:58:14'),
(22, 2, 'denpasartimur', '$2y$10$hOk5A626Q8H4XtfpMn/5gOk3smGr9.Qf4ccJQa6aemNJez9mZPJx6', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(23, 2, 'denpasarutara', '$2y$10$/Dw0nVd/8ukkEjZ.blW/c.xBXjDZCkvOdU6EMLX1.3HOmME2/HtC.', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(24, 2, 'blahbatuh', '$2y$10$dHX1HuhubkrWOpYfL1LzIem6Oj29u2hGT0vefPowVJj6JeVqg/UF.', '2K0VT22KnR58xXc9zBKwYd3XzZ0wSqx7CUb0hNujtmCaHR69tLWCrNVAx6WM', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(25, 2, 'gianyar', '$2y$10$JJpjbLWwx0Py8khS7.bQjOvzOXe/8E2Za6U9Z8vdbW2U9Bkr226NW', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(26, 2, 'payangan', '$2y$10$qFx4HmAgoOuPtK/RVqHoVuZt.mWHFQ.InbXLrYNAcAQEqoDgCSJna', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(27, 2, 'sukawati', '$2y$10$KPuhEKCGt0g4VLsfHaAN4ePL0khAS7bwAvSEKnRLDJiXB3ejvdyQm', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(28, 2, 'tampaksiring', '$2y$10$wwlBPLcqBvi3gRNrNWnzCu53vMARNBNGDQD7XV7xcEixhm3m8C5/2', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(29, 2, 'tegallalang', '$2y$10$LZ9/7S5yRvuOP6uuUo.GkuguVxj1AKnayvA/1.Bx8PvzZqq5NgKNS', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(30, 2, 'ubud', '$2y$10$ckXd7Fb.V9wioMaPTnUJxe34NoVO3Fz15f2YZpsuNuSuF41offKJ2', 'Ei9NyOKTCrZisGGPcFgQYTLD8DdxGuRZvoEqcdGsgQm1JT3JZnlYheHUzw4w', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(31, 2, 'jembrana', '$2y$10$I1ie7olAOvnGug5gUC6s5Oxo4LMJ3MVxDbWsl0ZsMGkzGd8LwkLCa', 't93ROIHw4bMirJumhh9OCp26Pq9v2CNrs9uLXTJVzLo7F28161VJ3pQe0GpW', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(32, 2, 'melaya', '$2y$10$xcr5pETyaypN20mCjCxyLemIqTbfVvO.S03AUihNfYnSRp1XOJ4GW', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(33, 2, 'mendoyo', '$2y$10$NPrO0AMId7AwfHEJaI4z0Oxqwqau7jtylevdzh5IcymbCF1BnOKN6', 'WH5uX3CUnj8haVokKrQWwPF5Unz0wlToo5QcRyCoQdAuWDNVfWGHXYwnIUyC', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(34, 2, 'negara', '$2y$10$0IkrNUbgFMp7K3eR5lc20.7NrTkYlhpdwyfLH7s34peJ2u1rDFPAC', 'gyudpwplmILU0RvZLes1NswXe0awOWhKwSziCnCqfHUMB4Pvh09xO6GcelEd', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(35, 2, 'pekutatan', '$2y$10$vXkHIlJ0U91jzBO6PXtXmuZM6ZcPGgONmJ254nq4X5KywB2SqRZKi', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(36, 2, 'abang', '$2y$10$cXcqQsIoSTS7.77g91.UfeevSeHcSzdTVZYiSGfwWQsyW9B2w2ovG', '8eqmwingyLJ3pAr7aN47o2rXBO0vlLGDsGsj4ikhPlKKgTVw8BTRflePqZhr', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(37, 2, 'bebandem', '$2y$10$Q0W118wF4XzE2sRuhTZbJOQ/A/NxnCy34qKP1Xnl284FBT22rzyNy', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(38, 2, 'karangasem', '$2y$10$FHLjwlSwlMnoXnB9DFJZ3eC/vFaO68TYq6u9.xAVPJTfEfbDaMcpq', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(39, 2, 'kubu', '$2y$10$Y.09x/KMyvAVTzEY5UkIG./GpE8bHRX9lEaUqn52aSjktudHGyuEK', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(40, 2, 'manggis', '$2y$10$a4.sAKZUj8GXfrvyjgpdVeY514KxfFSpdXbil63bU2XQGOPn2tMMC', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(41, 2, 'rendang', '$2y$10$gPXE8mJGDTDDBtLFCx3YSOWvSVWNGvl8uQls9C061qDzpL9YcmZkS', 'MZ7lzGjNiZd0hbhxl2jzRl9We8y15765lPMLJHwBcofaJG1sgakU7xPP4tJs', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(42, 2, 'selat', '$2y$10$eW5uEOOn0J.VZMbOZg9aO.W2cwb7.ZmR2aZJDq2L1mEmJ/M3/87JO', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(43, 2, 'sidemen', '$2y$10$4SuZB/KhhWXyIUliW0IpdelXeH7AIEquMkp5oNPjn3HfH0C449wTy', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(44, 2, 'banjarangkan', '$2y$10$sOljdrHSjz1yiNQPxF7fYu0lcMzG41eRVW.XF756rwmFaUBgnIJKq', 'FGJRM7vvFQDoe2tJ0gP8rp7b4nmpXOZtuwfdeMIZye2ykKb22DohDoqGMhJf', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(45, 2, 'dawan', '$2y$10$2Rh4OZ4LmaQQ0bkr3ybbUe4EBlzyTBuY.wBRTaf3n8X7/Y/k60agi', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(46, 2, 'klungkung', '$2y$10$X1/rahPWNSRkvA1VBn/58urKbChzsC8eXVMift7GdRSz8CbpEfwie', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(47, 2, 'nusapenida', '$2y$10$aNKZrRfa/r8Vo0uBL7uGwOvSORbKXdicpOGFKnRIycDx/lNd0gPYy', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(48, 2, 'baturiti', '$2y$10$6FTMNTyM.xtCHxpPjVeQauQMJ0Zn739ehQYxS4RkGZqzFyro72NTe', '0CWvTXFjKlg17NO2llhAGD7LYyQWOKSFyAelynNdT7nq7rXtP0C7AP2dvtnf', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(49, 2, 'kediri', '$2y$10$We.O1qb4W692svCQC8ESZ.gGV/L0f5unOqhh3oxjf3QdshnH5wZ3y', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(50, 2, 'kerambitan', '$2y$10$y2GRyBV8Yj43aS1iIdCD9.tCOG3S39RIbncO7M6OQMxzwYsgvK00C', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(51, 2, 'marga', '$2y$10$O7RrCMwodNofaqIvskAGp.GXynHWY.OArTqh1Xs7.G/Atly43LYgG', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(52, 2, 'penebel', '$2y$10$Xvp5zq7Ur1rNM2QEVcJqau0Hj5.05WvlKDvONXpzabJnE9oiwi506', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(53, 2, 'pupuan', '$2y$10$zwSV8mJQKNpK2FLRCFPyne5zgMZGaO7kwYR7nSbaLXuq7ZVqW4/Ae', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(54, 2, 'selemadegbarat', '$2y$10$oqofia89A2veKCoRDJ/Oqe.X/7SWN9U/uZqDnCz/FqDFWlj75iVnS', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(55, 2, 'selemadegtimur', '$2y$10$/PbPOlYNCFLm2/pcr5csYuhmGO7MuJWKGFXz9ui0yZP/vMvJKbVYa', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(56, 2, 'selemadeg', '$2y$10$Zkw6whNNDKHutabtETv64uMZA0VBJGxf0CZoeL2yO0s5Be450yzim', NULL, '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(57, 2, 'tabanan', '$2y$10$3tCeIQJ1svHl7qYvJnKSheP19z8Jx15Ey6dlTsqsYluye2EPcBNb2', 'Rae4P2KCE8Cijd2ErBBTdFfNHVU6GtXUSVOvCnCm0pXiiGTturUqSmvQg1Zo', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(58, 1, 'pimpinan', '$2y$10$w.d7LUIH9G9eCct6GQR74e/ya1mFXrAiUbpCPCu/UP80WRpW1C6by', 'kv5EKIj73AW4rsRmQ3aHaZX4vrBah67vIl3kz8veBIaROAMIXTtdtVQL35Kl', '2019-01-08 13:26:58', '2019-01-08 13:26:58'),
(59, 3, 'jbzdx8uf', '$2y$10$/KSB1xY9sUCWpViOFQWLyeZgPXSMJ8GDbMURF9R7QpEmW3zWHN99C', 'UFVIE0kOfQnkQygfIiZ2sfRB917CFYniRonuybPZJn2EEK2Hwt6bvWuT6Qex', '2019-01-10 11:39:51', '2019-01-10 11:39:51'),
(60, 4, 'rxpinugk', '$2y$10$.0jo9TTFPDDoGOTvUuKh4eJ/SFIu14GTapLf5eWOHOZBPUMs5sGRe', 'GNhG6H3EpuChCGNm0ztZ7qYvuT4gkjPk6YoFFvpMqbJZAUzAjlfs8NigK4hV', '2019-01-10 11:41:43', '2019-01-11 04:31:59'),
(61, 3, 'qrjp977a', '$2y$10$0pbW0uxRO44V4v2274pu/.x2CeFrl9Ij0RejhzpjuXqpGB3P71Ivq', NULL, '2019-01-13 10:11:08', '2019-01-13 10:11:08'),
(62, 4, 'rx28kt4i', '$2y$10$nUHtk/6ifApsChKbCikg2uhh9tkZ894T.0I7k3ICzHfHMijbtMsUq', NULL, '2019-01-13 10:12:33', '2019-02-17 11:09:46'),
(63, 4, 'yerzugg6', '$2y$10$GSPFX9FDbqv3k7Z.P3LO.e7XDRUUr3dDVgJwMW5yYAYu8feUJ6fge', NULL, '2019-01-13 10:14:09', '2019-01-13 10:14:09'),
(64, 3, 'fyccpk7y', '$2y$10$QZGOWdItguFoDehzxy0J0u8YLI6FsQh6MYHNrv8jHHEXUhN1Nz0Oq', NULL, '2019-01-13 10:15:36', '2019-01-13 10:15:36'),
(65, 4, 'veax28nc', '$2y$10$fq68Y.a7wbdjggGDn.W5XutERLqedqsgORyUi28tEAtVaU6DphE22', NULL, '2019-01-13 10:16:44', '2019-01-13 10:16:44'),
(66, 3, 's4zwuq7e', '$2y$10$pF0Zp3FqDUL2ibDADyADreez6hWf1uRKfZDTQQ2JVO1zoyZNkwdFi', NULL, '2019-01-24 01:57:00', '2019-01-24 01:57:00'),
(67, 4, '2ghwubqg', '$2y$10$PUBV8LDjWGj73wHBfapD7.LI6D7mBqg0RHKr0slFJS/wT9Y8mUDQ.', NULL, '2019-01-24 01:58:47', '2019-01-24 01:58:47'),
(68, 4, '2ietxnbq', '$2y$10$Cb1b7m2vXsyLFmor6wuk6OnqvBDJtOy2/3JlIqXOEYta23Xm6XfH6', NULL, '2019-01-24 02:00:16', '2019-01-24 02:00:16'),
(69, 3, 'ujxa92za', '$2y$10$a58UC/lmzZ6pwZkP0KjoX.S4FzV1.NPxzWq5mYixiANhEXVnCUIdC', NULL, '2019-01-24 02:02:43', '2019-01-24 02:02:43'),
(71, 4, '5535kzzm', '$2y$10$YnAqDTnUcYAS/7qtIW1OsuMsT/cOR858rYiNEbCXj4AWiLD6l9JQO', NULL, '2019-01-24 02:05:58', '2019-01-24 02:05:58'),
(72, 3, 'psqsk6s9', '$2y$10$1Y6MfbvxUw2bdc8XojNFn.dWQv2FHfxTzpGn8Ck.Mwqa80A8H.ntO', NULL, '2019-01-24 02:08:45', '2019-01-24 02:08:45'),
(73, 4, 'ynnp44v3', '$2y$10$Qt2akH159rExY1qrwATVaesBmGcxwGv0.EbW.ct0oVbE4OmuG5LNe', NULL, '2019-01-24 02:10:53', '2019-01-24 02:10:53'),
(74, 3, 'ekc29snf', '$2y$10$23s8l1f5YWaIdfG4nhCGsO6/Lo/ROiaXyx4WoWHjalivoTbIK2vXW', NULL, '2019-01-24 02:18:58', '2019-01-24 02:18:58'),
(75, 4, 'f5n9vtbg', '$2y$10$HxXK5OvptEiMQKN8ubxNi.jGseoWRlSL685Wki9igCyAc/whsgctG', NULL, '2019-01-24 02:21:18', '2019-01-24 02:21:18'),
(76, 4, 'eewybygr', '$2y$10$gFjz8MMF690cxsmGXDnfBODexDrvG5.3/uYzyDmDchgp8Z.Vld5/.', NULL, '2019-01-24 02:22:36', '2019-01-24 02:22:36'),
(77, 3, 'uf25xuqz', '$2y$10$d/uQoZNLbKkhsQMcGTHgT.UHoBjRtI.OhT89LRdLrLzGJcMbwQgd6', NULL, '2019-01-24 02:25:45', '2019-01-24 02:25:45'),
(78, 4, 'in8bm8zd', '$2y$10$1.gN46UK7lsrPYDH/3hE5On87/.AGAAnBngofaPB5KhquI7QknewW', NULL, '2019-01-24 02:27:13', '2019-01-24 02:27:13'),
(79, 4, 'wbjgstnn', '$2y$10$IVUfVKjF3YVOftmq1Zi4IOb0mWvCQsDADAeQoMhL82aZeiXf8Xk0C', NULL, '2019-01-24 02:28:37', '2019-01-24 02:28:37'),
(80, 3, 'v5xfmard', '$2y$10$h45V.xS7Lmgr3WW7Pkhi5.RV440SNUFOUGNPU.VPlyTJKBZST22PG', NULL, '2019-01-24 02:30:30', '2019-01-24 02:30:30'),
(81, 4, 'b5fs2s7n', '$2y$10$8EGQKZxorVfB6mRXFCmJJ.bxoNXgtERg2M5A/bHSGfRQbVD9RxjS2', NULL, '2019-01-24 02:31:41', '2019-01-24 02:31:41'),
(82, 4, '83efi9ua', '$2y$10$aGtj/egyg/iD8b/x41.G1.1FtqjMZHO3rOZQXLjNB1jKzDHzuZaZK', NULL, '2019-01-24 02:33:02', '2019-01-24 02:33:02'),
(83, 3, '9smidgv4', '$2y$10$1w.YPFcgNtD4IxJSAOFEjO.tOFtFdfqGfnziG19F4vOcFVLVNnQGe', NULL, '2019-01-24 02:37:14', '2019-01-24 02:37:14'),
(84, 4, '7fhbffcj', '$2y$10$ORRBy52pi4eCyYYEI/O.Ve/tY7lYw705S4nQspdfxOu4F0V6Lxod2', NULL, '2019-01-24 02:38:28', '2019-01-24 02:38:28'),
(85, 4, 'gsjh3zy5', '$2y$10$EpEJvX8o00pMO2U2oWCGjeqU89pko2Y6cC3j3uaFaDBHxTh/rAwYy', NULL, '2019-01-24 02:39:45', '2019-01-24 02:39:45'),
(86, 4, 'h93thi39', '$2y$10$K0oY5cLv8HMF/nBYWfJPWOJGT8rHk3AB14SFQJb8YRoLtLizzXhIW', NULL, '2019-01-24 02:40:47', '2019-01-24 02:40:47'),
(87, 4, 'j22qnkhi', '$2y$10$8Ou8ofmG8NeNwJS3PVY51ukMjQigDNFaSwckYkwTrA5NoYTDcgDYm', NULL, '2019-01-24 02:41:59', '2019-01-24 02:41:59'),
(88, 3, 'a7b4gc6q', '$2y$10$hMGx.5islmzIKh67pKYrGeOM3c6MaTQYMIlyE0LdCqlw6NXRkB2oy', NULL, '2019-01-24 02:43:03', '2019-01-24 02:43:03'),
(89, 4, 'efa5depy', '$2y$10$b5iiWDBjt9aWPF31u.pZ9.Hbs/hjfe5mfplCTFv0to7rbvhF5jvPq', NULL, '2019-01-24 02:43:58', '2019-01-24 02:43:58'),
(90, 4, 'btsnhkfa', '$2y$10$uVTFj9IhcD3PdVY0Xnwie.JpID8YVrMcgIzxtBLHAVsP5KNFf/e6e', NULL, '2019-01-24 02:45:06', '2019-01-24 02:45:06'),
(91, 3, 'q6cui4u7', '$2y$10$IoJegDg7jmcOOI5h.YVtZ.k56772DuBIKZ/vY9ww8kiyLr0o5fOqS', NULL, '2019-01-24 02:46:56', '2019-01-24 02:46:56'),
(92, 4, 'ndgzifbj', '$2y$10$YSLqw9w5NNBLIU67vKQFg.OeZqw8Fv5Hg0eoA7ypf43a9PxjJCQcm', NULL, '2019-01-24 02:47:54', '2019-01-24 02:47:54'),
(93, 3, 'fz92j4g6', '$2y$10$O5cl0My/Q8rx98wl8l6VqepdIoqHCa2DKoee1iNTBm3y903C3VeQq', NULL, '2019-01-24 02:48:50', '2019-01-24 02:48:50'),
(94, 4, 'y23rkhjy', '$2y$10$EDAZv40aLKPO9zf.qTWx8OqivKLrhZMQvfjWpB3udZ2ohuE4IHEru', NULL, '2019-01-24 02:49:48', '2019-01-24 02:49:48'),
(95, 4, 'jsyge927', '$2y$10$yEUZrax40GKsF9AFZMuPZeBzXqI.p.00r874SdrVJqJ6rlyyO0Qg.', NULL, '2019-01-24 02:50:45', '2019-01-24 02:50:45'),
(96, 4, 'fdi3ksyv', '$2y$10$kBDlzg9LD5rQX3cHXyODj.YTe6idfYNMBORH6BulVTegoa1Wk90Ke', NULL, '2019-01-24 02:53:24', '2019-01-24 02:53:24'),
(97, 3, 'p5aynrhz', '$2y$10$2Uka5RAYwPjpFycZNGSdBeM8YGJeYg.wyNx062nckIqqnA54oAOf6', NULL, '2019-01-24 02:57:54', '2019-01-24 02:57:54'),
(98, 4, 'kxta9bbi', '$2y$10$gZhfaA9bnlWEVb/MvdhEoOUvEoNQIAfvIesH7G3gLJrAmLMK9OsB6', NULL, '2019-01-24 03:00:06', '2019-01-24 03:00:06'),
(99, 4, 'dwc82wey', '$2y$10$gad7fBq4v9rKtFwyguncceDIoHhpRmxgshjAiBu51aNzhVi4bJlf2', NULL, '2019-01-24 03:01:01', '2019-01-24 03:01:01'),
(100, 3, '5tdind3h', '$2y$10$XCnYtRoulSyesltY4gL/Re1ew5FjuoAFpIwy0ZOTIop63JvwmkYoq', NULL, '2019-01-24 03:03:17', '2019-01-24 03:03:17'),
(101, 4, '39e8bjii', '$2y$10$0H.rknGfXv4NThEbxPa.pubFnwTlOPXosrzEb7MAMUAMU/R2I1UeW', NULL, '2019-01-24 03:04:09', '2019-01-24 03:04:09'),
(102, 4, 'cnm5ejjx', '$2y$10$SW/geC0/h4kuNQmP4Dgce.iOYCErKZ5xGmnDlQI.5SD5fbhEQAaYm', NULL, '2019-01-24 03:05:21', '2019-01-24 03:05:21'),
(103, 4, 'cxk4cn88', '$2y$10$iN/chF7ikjdLaygt2sGn1OU9gfHdX8u40ojm/C6Aoxx3QKaGhBupW', NULL, '2019-01-24 03:06:27', '2019-01-24 03:06:27'),
(104, 3, '738hgqzq', '$2y$10$d4EBKFKoyo7uM.Oa2XQuK.J/S2k/eMbq4qOXxq0LlKKNqS1dC5oY2', NULL, '2019-01-24 03:10:27', '2019-01-24 03:10:27'),
(105, 4, 'x7y8z7yh', '$2y$10$v6aEFZWMMistKwVUNUIDxOiFM/V8J1gCf/qNSYqtc3dp7oEFOAJdO', NULL, '2019-01-24 03:11:23', '2019-01-24 03:11:23'),
(106, 3, 'u7ce3dgk', '$2y$10$Q2ISi8wFFduFnVtZQLdvwuL9Q6BQnEBgxZmaXaepkmTSj6szFGBz.', 'UEZ68ipieFxpdkz6QWYicdatfPktcXUwaNKxCX6rWhPLCJ4cwCCDUzHD9Zgh', '2019-01-24 03:13:55', '2019-01-24 06:49:33'),
(107, 4, '6kf9pumv', '$2y$10$KE8ANuBnJFwQai2mnvjKROGAZqobGIY62J7w5ZB4hTJqWUaQEHQie', NULL, '2019-01-24 03:14:47', '2019-01-24 03:14:47'),
(108, 3, 'e5kw9zje', '$2y$10$bjiBY5G98nNyCw5qU6u1tuKNpEw1Cn8Zvf1NlGAjXhIu0c0NfVn62', NULL, '2019-01-24 03:45:59', '2019-02-17 11:08:54'),
(109, 4, '5tdmhsnw', '$2y$10$Ceuo3ZV3UruXQjVzyMayxuYZqSMxqDXqb1bxuPwWqAyyz4wY/PY7K', NULL, '2019-01-24 03:46:43', '2019-01-24 03:46:43'),
(110, 3, 'vqqtati2', '$2y$10$M3.X52AXA.mC20TljJj1Xe2CkfiV/ptbOY0BjdV4L5DNmaHaO6KQG', NULL, '2019-01-24 03:48:40', '2019-01-24 03:48:40'),
(111, 4, 'ascgdypf', '$2y$10$CSeWV9N3Dc40s285kVru6.CgB5QQL554NEbeJDXIQf/1c5MZ0Vbn.', NULL, '2019-01-24 03:49:27', '2019-01-24 03:49:27'),
(112, 4, 'pnsgt6nw', '$2y$10$qV79FnKSIDv6TgZW5e7pNeU/.HkbX9IUJcC/oCxTks2Z1Gi3oR2zK', NULL, '2019-01-24 03:50:53', '2019-01-24 03:50:53'),
(113, 4, '989wyska', '$2y$10$CVWzEqvZWASu3qMrrpAdDefwvrQwMIvepUkLrXz4pti3vAFwjIx/G', NULL, '2019-01-24 03:51:55', '2019-01-24 03:51:55'),
(114, 4, '9x72cnn6', '$2y$10$ctczaVP.N7K8cYWGnLJc8.i7Nt/0agFZg2phHEppcejzofLfgH7EW', NULL, '2019-01-24 03:52:38', '2019-01-24 03:52:38'),
(116, 3, 'mrvvpiyu', '$2y$10$DeNZyfVVntD1dvdhXNv4ouFKJItEm98Rskk1rsVAy.0tGIKqnp5eS', '3dwJ68PZSCecRQlc6L5Rna5zxuYLAdWCy7j49yXmbjGRlkDXhtGBKxGimGyx', '2019-01-24 04:00:14', '2019-02-06 03:08:04'),
(117, 4, 'ewskzscq', '$2y$10$nF/gN1AqAQEWWlfpR6enVeA6cUIxD3cXt4tvHMN46XD90IALOwqRW', NULL, '2019-01-24 04:01:05', '2019-01-24 04:01:05'),
(118, 4, 'mtwz4njv', '$2y$10$fAh4bvxMsWLSeGE.fjimt.zN/pz7V1rCKeMqu300PLfb3qi5DOkKC', NULL, '2019-01-24 04:01:49', '2019-01-24 04:01:49'),
(119, 4, 'gvhdgpgz', '$2y$10$N5ujPbz6fWKdXeB8LzdlXels978/jYy4j4/ZHM5WmPIYvpXuosSw.', 'HRiN28ea0j74roqmAr5Sfu9chGG2cZkMs5oAxBhND8BzqlzwbiSzkMkVF5u8', '2019-01-24 04:04:12', '2019-01-24 06:28:33'),
(120, 3, 'btf3k5hj', '$2y$10$kZ34DZh/1WXfB2pnlEX.Iex7BLclcfUVBlRu0Z9ZRgeive5Wba6/O', NULL, '2019-01-24 04:12:01', '2019-01-24 04:12:01'),
(121, 4, 'ci6q728g', '$2y$10$tkY0g.1Jfn0R/UyYCHzf2ujvjBlA6tcn38Ip.5x7LuzmoMfAApVcW', NULL, '2019-01-24 04:13:09', '2019-01-24 04:13:09'),
(122, 4, 'fq8rye5v', '$2y$10$vtL52NflB0DrXipcF8NTpu6kxCbRz/9pmIsTuHB/hpVizikqY3Efe', NULL, '2019-01-24 04:13:51', '2019-01-24 04:13:51'),
(123, 4, 'djrti9tt', '$2y$10$KVARFzn6fARb.Fu/SvInRu/m2RcLbJrZoVfGEIRR7q/9sJ06IGyF6', 'CO9MoOmNDataBgTMtyPCEIgVzvOVQ4qv21qeYJBqXq9nik9BWLQCh29fDiji', '2019-01-24 04:14:36', '2019-01-24 06:29:59'),
(124, 3, 'kwfvpvka', '$2y$10$CO78IOFXEjdTlRyRqcuI6OvqV5kYb/pEW2nZtv6X.f809U3xLoPwW', NULL, '2019-01-24 04:17:03', '2019-01-24 04:17:03'),
(125, 4, 'f7xw98hu', '$2y$10$m906vjEI63YeACnM86FQVuJC1Gs1p35qXwzPrTlLdcvTeOZVWT43W', NULL, '2019-01-24 04:17:53', '2019-01-24 04:17:53'),
(126, 4, 'y9sq5byb', '$2y$10$eJ0wlihEy4TkGvII/2CkNeEz1.zxBjC.yXVJtJrfxigJkrKOUlEF.', NULL, '2019-01-24 04:18:32', '2019-01-24 04:18:32'),
(127, 3, 'bpwmdjps', '$2y$10$Fgh.RFK5qFoL/pIcIdaEIu.92GXX8JLpZHjnEYLcEntYEthK6m0KO', NULL, '2019-01-24 04:19:30', '2019-01-24 04:19:30'),
(128, 4, 'ky28368y', '$2y$10$djxZFrWYSk7hXPYHPi11e.K70ayKYsb90s4pI/gLD.owiv5t7OUM2', NULL, '2019-01-24 04:20:13', '2019-01-24 04:20:13'),
(129, 4, 'gprgbtj2', '$2y$10$qFcf94Ca1naW20zOv.yw2OdvaKZ0k1gMvsZmfuK39JgmkLcBUBbe2', NULL, '2019-01-24 04:20:59', '2019-01-24 04:20:59'),
(130, 4, '5hs5g4d6', '$2y$10$8jM0qLCYlc3Wpq4h2i6ZD.xUS4JjS1Udp1vq6JqlpwaUUNOG529cu', NULL, '2019-01-24 04:21:42', '2019-01-24 04:21:42'),
(131, 4, '9ajtsuxq', '$2y$10$jrcncns0rJLvV85p.R8v5OV.95ydCCa0/w5xQT.MYcga3qmTDbvSS', NULL, '2019-01-24 04:22:38', '2019-01-24 04:22:38'),
(132, 3, 'nvz9djbz', '$2y$10$RS13bbP9XJ7KJH6UcIaIpuEYaazzaxxvAV7WeUioXEunEYJa9F3Ea', NULL, '2019-01-24 04:23:50', '2019-01-24 04:23:50'),
(133, 4, 'as6dg7si', '$2y$10$MQQiZuTDWmWjWdNahDbQ1OBw0Z.jXf16GqwDRx.Sxa0dL4/HSqCBy', NULL, '2019-01-24 04:24:30', '2019-01-24 04:24:30'),
(134, 4, '8piwk4nk', '$2y$10$oDyGMRVfR3rbPakZv1uKSOqyB5cqwaPgc36xvSveiz0mdfmqcxHZG', NULL, '2019-01-24 04:25:07', '2019-01-24 04:25:07'),
(135, 4, '8npjq5w3', '$2y$10$wdKrdym78ZciAC0wAIjKmO4us/DvIKwlVPp7MN3aMmimMpSkac4vO', NULL, '2019-01-24 04:25:41', '2019-01-24 04:25:41'),
(136, 3, '8m2i9j9t', '$2y$10$Irj9HVW50w8ZYZ.36CQkNeR1xIKnQcMcON5YPFGKpo2838.WBGT6K', NULL, '2019-01-24 04:27:11', '2019-01-24 04:27:11'),
(137, 4, 'urirxx3m', '$2y$10$Ol2Rv7.CN9vSs4T/JZiXXOG2zPo0cUPkCKxilmjC.IKgHOcRRlPLK', NULL, '2019-01-24 04:28:08', '2019-01-24 04:28:08'),
(138, 4, 'n6dp2j8t', '$2y$10$nWRKhaJXfOb24q0qC.OTbOvyBxq0LvBEOTqZYN7em7uohxqNzLgMK', NULL, '2019-01-24 04:29:01', '2019-01-24 04:29:01'),
(139, 3, 'v9kg8vcq', '$2y$10$FrXU/Kv56vgci0GPD3MM2uhHnogI6otPYjOyAO/UjAn1nUOhHkfKy', NULL, '2019-01-24 04:29:43', '2019-01-24 04:29:43'),
(140, 4, 'u5vuadqr', '$2y$10$hczmrbxfdZEX7qXJk0zGPeYMlFPOnkdwrTeFTcmAFPnS1mNEL6.MK', NULL, '2019-01-24 04:30:30', '2019-01-24 04:30:30'),
(141, 4, '4hwt43dx', '$2y$10$3nF8zx6DgqzPPdMI/sn8feKJ5bcR79wNI2f4Tw9hmYwJc0BwhuBcG', NULL, '2019-01-24 04:31:23', '2019-01-24 04:31:23'),
(142, 3, 'gkg34uq3', '$2y$10$xH5NvEYgXhwYxqV6KIwoWeTPWSQVloMYGYmcmmNNLqBZMtLfGmldC', NULL, '2019-01-24 04:34:49', '2019-01-24 04:34:49'),
(143, 4, '9bxnzfce', '$2y$10$28Klr62V9i.4wqUz8SbAZ.Xp0WgcSdX8yhQ45Hyc7X/HQBUjYI2Hy', NULL, '2019-01-24 04:35:26', '2019-01-24 04:35:26'),
(144, 4, 'nvkx8avy', '$2y$10$NDrZE4Filb/hPNj8CAKIV.HxR1kuKDbSOqc1ysqx6XqH2mzVKW9jq', NULL, '2019-01-24 04:36:17', '2019-01-24 04:36:17'),
(145, 4, '7bzwhzxc', '$2y$10$NR8qYmNG0RP7ShXEhkSoM.8PzFTb6nXINCOfTUkq9bb2prwDFarUS', NULL, '2019-01-24 04:37:15', '2019-01-24 04:37:15'),
(146, 3, 'janv9wx3', '$2y$10$PvC9mW2JvOKwd9EPbZ2KsOa.aTzyMhQ7ff37Q6Ln8CUBVXYwmiINK', NULL, '2019-01-24 04:38:40', '2019-01-24 04:38:40'),
(147, 4, 'z9q5x98p', '$2y$10$y2Eyxh7I3KzmZDP/Sp3MVu/hAPV9W6Lq9HrgpmoqhWdr6Ny2rlrdu', NULL, '2019-01-24 04:39:35', '2019-01-24 04:39:35'),
(148, 4, 'x2cwghz2', '$2y$10$NeBaOqnW9IDQrEMA.r07COnPqt2PulEdgPJlRRehraIxRvqpMffvq', NULL, '2019-01-24 04:40:17', '2019-01-24 04:40:17'),
(149, 3, 'zsdpfv3r', '$2y$10$FHFD6x4i8XryIqJ.gkJiNO8OdwWrm7oYx9tYq61j1KPAEAgsJBtZa', NULL, '2019-01-24 04:42:02', '2019-01-24 04:42:02'),
(150, 4, 'rekckfi7', '$2y$10$YhNqaFYoN2D.pUPePguL8.9Ng2rnUq50FlOisHp/j5rom/fQLI9Ry', NULL, '2019-01-24 04:42:43', '2019-01-24 04:42:43'),
(151, 4, '55rngj69', '$2y$10$OnDbw.150Uu3N387q2XzXufSH6JfqEeiAtmzC4Y3PYyMFa2vmVIDu', NULL, '2019-01-24 04:43:21', '2019-01-24 04:43:21'),
(152, 4, 'ymvxxucq', '$2y$10$3WDBhU/VWM1S0ECzcrDxS.yL7ZRRD2y3vHLb0dOebooXWKSkX3/VC', NULL, '2019-01-24 04:43:58', '2019-01-24 04:43:58'),
(153, 4, 'q4ipny92', '$2y$10$1MqZ6/z5JsN4xDRH8BRM9u9PVbB.yaSFJyEoSPXBfEh7XzzVU5HKS', NULL, '2019-01-24 04:44:42', '2019-01-24 04:44:42'),
(154, 3, 'tit5ytzx', '$2y$10$R3dGL58rFMi.UcVCu6sLl.30vSIkINz648d7bcXMGk/5spk4fmsSW', NULL, '2019-01-24 04:47:23', '2019-01-24 04:47:23'),
(155, 4, 'w8n9bw3d', '$2y$10$sDU3R/Nk.1ktw.QkbH1AXO9ajXBW6cZGZ.HXDt/WUfaYcHDwRRYr.', NULL, '2019-01-24 04:48:24', '2019-01-24 04:48:24'),
(156, 4, 'vp5z69t8', '$2y$10$LqV3LrmBu1nqi9fm43CcYO9s0q8ARvzpCcOm8Fi3uIGmdQNVwRgxi', NULL, '2019-01-24 04:49:35', '2019-01-24 04:49:35'),
(157, 3, '6gujfgv9', '$2y$10$8WOOOjdIb.dhI64wMv1Px.uLTrkjcYIBGSyF2tXernLCrAKRxHGcK', NULL, '2019-01-24 04:52:26', '2019-01-24 04:52:26'),
(158, 4, 'bvuwxkbb', '$2y$10$08PcaK0Nze9xKk6Ezwz92e/Lh6BM3zlxQ/fqV3Ob3IIdHLR/pyXfK', NULL, '2019-01-24 04:53:10', '2019-01-24 04:53:10'),
(159, 4, '2cwkgw4t', '$2y$10$.CMMjYNwuRcNksW6HIKh8OCEqtOA.97c18oBF22fajlFJKNtKubDi', 'TOBIAQnQIz2K7R1E28kJh4h7cBm1vdZ0wF84QZvGFlJpWbGfW3ll5VPbUAf7', '2019-01-24 04:54:10', '2019-01-24 06:31:04'),
(160, 3, 'i58mkkih', '$2y$10$b9dAWzv3tmTL0hvj97P4hukIFGKDaxrDrCM6GyViOawbsJYYypkZC', NULL, '2019-01-24 05:03:08', '2019-01-24 05:03:08'),
(161, 4, 'g4e4x8wy', '$2y$10$72WgfJHhnsAUSRSHtNpXT.J.EtK0S9VWYBBcIgn7fBbS2LAr.Ilqe', NULL, '2019-01-24 05:03:46', '2019-01-24 05:03:46'),
(162, 4, 'mugg48d7', '$2y$10$UBIFM2.m0zNgNRVxw7EGHuzNSwd7V/310B6c7N/6VaxgH1iUyzGiG', NULL, '2019-01-24 05:04:37', '2019-01-24 05:04:37'),
(163, 3, 'ereqfa3a', '$2y$10$vPm6cowLSwWnP1LsC3DHv.6PkGr/PGRQxM/QeR3Vtv7VVZeXsVyU6', NULL, '2019-01-24 05:09:27', '2019-01-24 05:09:27'),
(164, 4, '8yys3tv2', '$2y$10$GL.d4K5kPQk9oTEZf46zuOosp3L4OUbUlFjAO.Yecfj0nEIRi02bi', NULL, '2019-01-24 05:10:04', '2019-01-24 05:10:04'),
(165, 4, 'jq4ia9t3', '$2y$10$lQL3pKoZtrUcujwVE9yBJ.WhJPU6H.y3y5p.WgQQumE4I.McWCnwy', NULL, '2019-01-24 05:10:39', '2019-01-24 05:10:39'),
(166, 3, '7rgidh6g', '$2y$10$vhOI1whsmh7nWQStMIkI0eXp2Vlzm7jlAbXyAGxZWm3TLHQ5puAym', NULL, '2019-01-24 05:11:18', '2019-01-24 05:11:18'),
(167, 4, 'sv7fqr2s', '$2y$10$eXRYmlrC7rZ/PBKuqmWYDOyQj.ahtOHZqXMmgDkvluWZdX2PF3Ve2', NULL, '2019-01-24 05:11:56', '2019-01-24 05:11:56'),
(168, 4, 'xezkn266', '$2y$10$dU/FHk5OugQCJLIR/dwCJODBCu7VoLQ8.zAqN5c3Fmxr4rnFGqSrC', NULL, '2019-01-24 05:12:29', '2019-01-24 05:12:29'),
(169, 3, 'ss8788hg', '$2y$10$KdoHsgjY18IskTHlvEkRZ.IVl1pYccOV/Ag84fqTAhrqhQA6Jn/6W', NULL, '2019-01-24 05:13:24', '2019-01-24 05:13:24'),
(170, 4, 'adcr7924', '$2y$10$sOkXozYb6gKHBoMteQlZBuzx1f3aPh1aLO1EttnSUHQz2JlK25KG6', NULL, '2019-01-24 05:14:12', '2019-01-24 05:14:12'),
(171, 4, 'ck3fk44y', '$2y$10$pxZRu5Q1WADcBEFRpSidieAOnHgjqSvzJVHUmtEen5y7f3lq3sPiq', NULL, '2019-01-24 05:15:05', '2019-01-24 05:15:05'),
(172, 3, '87cxqe8f', '$2y$10$P1aK.JU2PScONMeAopEpYub1QBjGv9xVCvM6byWxILtPHjBeZa.9i', NULL, '2019-01-24 05:20:44', '2019-01-24 05:20:44'),
(173, 4, 'i3556dpj', '$2y$10$8DZHZZyZnYyej7vlvwKlrugp/gyRzUzS/7GIV.0BLDRhwhJPFc.2a', NULL, '2019-01-24 05:21:27', '2019-01-24 05:21:27'),
(174, 3, 'uwmyg998', '$2y$10$t0oOQAyyYg13/MadYOuaB.Etzvg9QLDYoj0Cn0Hs6ZoBOr9lfq7a2', NULL, '2019-01-24 05:23:23', '2019-01-24 05:23:23'),
(175, 4, '5s4bef96', '$2y$10$MBVGickGIWvZkvLWDW1OmeCVZqWblnlww7I03lG3Wgsb4wBfcE84u', NULL, '2019-01-24 05:24:06', '2019-01-24 05:24:06'),
(176, 4, 'viasb24e', '$2y$10$e2A5OqodtH1K6t.ly74dgu5q2PQROzuudj8DZECQBI3NAuFY98eBy', NULL, '2019-01-24 05:24:43', '2019-01-24 05:24:43'),
(177, 4, '8bqh74xv', '$2y$10$vgtZH0oaeIuTXD4us1h.SOhi0LqFRXjNi8qlhXjbu0dyTrO1YaAxW', NULL, '2019-01-24 05:25:21', '2019-01-24 05:25:21'),
(178, 3, '65vq3amd', '$2y$10$LIoe77w8.3HTb6TKEX4U4eB9HU9GnJEG2n4pWgxPRT6.5dnZTU8G.', NULL, '2019-01-24 05:26:59', '2019-01-24 05:26:59'),
(179, 4, 'hfgcm9pt', '$2y$10$OTLAYo3oHEpLPPNqXzAnGeavOtIc4sfxNweU1TUL3a7cjwdyKmRWC', NULL, '2019-01-24 05:27:42', '2019-01-24 05:27:42'),
(180, 4, '7yc8z3gr', '$2y$10$c5.h/V4Pq6s.SeTzcjG7A.QRe0wbLGs7oFdyzZUFbSTJ4J13mdziG', NULL, '2019-01-24 05:28:23', '2019-01-24 05:28:23'),
(181, 3, '6wnfbzs2', '$2y$10$y/YBEKY.Zw4E42HCud54muUY.s7LMBx/xHAqyISypcel6Pa2idRCm', NULL, '2019-01-24 05:29:03', '2019-01-24 05:29:03'),
(182, 4, 'c763n4ms', '$2y$10$EEORe46Ji7Zy1rVKj58fe.6jg9wyTk0BGblEmUfROcJbNllv/hxMu', NULL, '2019-01-24 05:29:56', '2019-01-24 05:29:56'),
(183, 4, 'ciwghn7y', '$2y$10$zy3LP654t6Nmj9Xd4sYazun1fi7PpSQ8i9fjT4FZRaf3Ha4Bv9Bga', NULL, '2019-01-24 05:30:33', '2019-01-24 05:30:33'),
(184, 3, 'ms643miw', '$2y$10$Nz6OkMW18p1LNnp9NpcT7egnLOIsmhKavw9HLrNC0psG3FJaXYt/G', NULL, '2019-01-24 05:39:06', '2019-01-24 05:39:06'),
(185, 4, 'viwi7mdh', '$2y$10$d9D..Py.mGuK4m6iD0A8HORquMc4eDcU3n//LTuZ7rH6Eb7QW0iDO', NULL, '2019-01-24 05:39:45', '2019-01-24 05:39:45'),
(186, 4, '9ardc333', '$2y$10$R1YaRbDyiWBv3FqE63xJ/eabw1rkuaZUR3ODhjz6rVW0I7Y4/0ig.', 'mDyGTbSP2ifOcE0zY8bZy1QQOIJEpEqWHz1tIixJLmfaw3AJZgz7ySAs4vQH', '2019-01-24 05:41:20', '2019-01-24 06:29:07'),
(187, 4, 'mbsy4msq', '$2y$10$5zoAx.tgKmk67QHHlPbKw.axsX76gT7BZQN4NKQEpCZKj.3bH6KKO', NULL, '2019-02-18 00:13:13', '2019-02-18 00:13:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `c1`
--
ALTER TABLE `c1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c1_saksi_id_foreign` (`saksi_id`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_user_id_foreign` (`user_id`),
  ADD KEY `kecamatan_kab_id_foreign` (`kab_id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_kec_id_foreign` (`kec_id`);

--
-- Indeks untuk tabel `koor`
--
ALTER TABLE `koor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koor_user_id_foreign` (`user_id`),
  ADD KEY `koor_kel_id_foreign` (`kel_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saksi`
--
ALTER TABLE `saksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saksi_user_id_foreign` (`user_id`),
  ADD KEY `saksi_koor_id_foreign` (`koor_id`),
  ADD KEY `saksi_partai_id_foreign` (`partai_id`);

--
-- Indeks untuk tabel `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_kab_id_foreign` (`kab_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `c1`
--
ALTER TABLE `c1`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT untuk tabel `koor`
--
ALTER TABLE `koor`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `partai`
--
ALTER TABLE `partai`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saksi`
--
ALTER TABLE `saksi`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `c1`
--
ALTER TABLE `c1`
  ADD CONSTRAINT `c1_saksi_id_foreign` FOREIGN KEY (`saksi_id`) REFERENCES `saksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_kab_id_foreign` FOREIGN KEY (`kab_id`) REFERENCES `kabupaten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kecamatan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_kec_id_foreign` FOREIGN KEY (`kec_id`) REFERENCES `kecamatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `koor`
--
ALTER TABLE `koor`
  ADD CONSTRAINT `koor_kel_id_foreign` FOREIGN KEY (`kel_id`) REFERENCES `kelurahan` (`id`),
  ADD CONSTRAINT `koor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saksi`
--
ALTER TABLE `saksi`
  ADD CONSTRAINT `saksi_koor_id_foreign` FOREIGN KEY (`koor_id`) REFERENCES `koor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saksi_partai_id_foreign` FOREIGN KEY (`partai_id`) REFERENCES `partai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_kab_id_foreign` FOREIGN KEY (`kab_id`) REFERENCES `kabupaten` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
