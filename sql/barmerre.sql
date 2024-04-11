-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barmerre`
--

-- --------------------------------------------------------

--
-- Table structure for table `bars`
--

CREATE TABLE `bars` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `lat` varchar(1000) NOT NULL,
  `lng` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `bars`
--

INSERT INTO `bars` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, '0,75 bistro & bar', 'Budapest, Szent István tér 6', '47.5003729', '19.0524701'),
(2, '4-es 6-os Corvin', ' Budapest, József krt. 74', '47.4870639', '19.0706272'),
(3, '4-es 6-os Söröző', 'Budapest, Erzsébet krt. 58', '47.5029812', '19.0657629'),
(4, '4es6os Wesselényi', ' Budapest, Erzsébet krt. 28', '47.5002265', '19.0687209'),
(5, 'Anytime Bar & Entertainment', 'Budapest, Király u. 56', '47.5027095', '19.0636165'),
(6, 'Aqua Land Termál- és Élményfürdő', 'Ráckeve, Strand utca 4', '47.180929', '18.9436827'),
(7, 'Art\'bistrobar', 'Budapest, Bem rakpart 16', '47.5024507', '19.0395582'),
(8, 'BAR Made In', 'Budapest, Dohány u. 46', '47.4972256', '19.0675379'),
(9, 'BarCraft', ' Budapest, Ferenc krt. 34', '47.4843166', '19.0690886'),
(10, 'BarCraft Buda', 'Budapest, Bartók Béla út 18', '47.4815242', '19.0525696'),
(11, 'BarCraft Nyugati', 'Budapest, Bajcsy-Zsilinszky út 59', '47.5092012', '19.0559288'),
(12, 'Bercsényi Borozó Bt.', 'Budapest, Bercsényi utca 9', '47.4782658', '19.0509836'),
(13, 'BOATanic Terrace & Bar', 'Budapest, kikötő, Vigadó tér 4', '47.4959', '19.047836'),
(14, 'BOB', 'Budapest, Széchenyi István tér 7', '47.500555', '19.047466'),
(15, 'Bubba\'s Captains Pub', 'Budapest, Budaörsi út 7', '47.484683', '19.0251562'),
(16, 'Budapest Jazz Club', 'Budapest, Hollán Ernő utca 7', '47.513607', '19.0497499'),
(17, 'Cactus Juice Gastro Pub', 'Budapest, Jókai tér 5', '47.5050694', '19.0621903'),
(18, 'Cafe de París Kft.', 'Budapest, Vörösmarty tér 1', '47.4964618', '19.0501274'),
(19, 'Caffé Gian Mario', 'Budapest, Bajcsy-Zsilinszky út 35', '47.5050393', '19.0552144'),
(20, 'Champs Sport Pub', 'Budapest, Dohány utca 20', '47.4954981', '19.0623971'),
(21, 'Checkpoint Billiárd & Darts', 'Dunaharaszti, Fő út 124', '47.3567795', '19.0851217'),
(22, 'City Hotel Budapest', 'Budapest, Dessewffy utca 36', '47.5065181', '19.0587062'),
(23, 'Club D One', 'Budapest, Krisztina körút 37', '47.500266', '19.025263'),
(24, 'Club Semafor söröző', 'Budapest, Szerencs u. 1', '47.5536662', '19.1083533'),
(25, 'Cocktail Beach Bt.', 'Budapest, Korompai utca 21', '47.483822', '19.0138791'),
(26, 'CoXx Men\'s Bar', 'Budapest, Dohány utca 38', '47.4965559', '19.0661847'),
(27, 'Craft Beer Hunyadi', 'Budapest, Szalag utca 2', '47.5007667', '19.0372481'),
(28, 'Csakajósör Kft.', 'Budapest, Kertész utca 42-44', '47.5018691', '19.0652914'),
(29, 'DiVino Wine Bar', 'Budapest, Szent István tér 3', '47.5002778', '19.0530556'),
(30, 'DOBLO Wine Bar and Shop', 'Budapest, Dob utca 20', '47.4980988', '19.0609816'),
(31, 'DonPedro', 'Budapest, Hollós Korvin Lajos utca 2', '47.5963457', '19.0504003'),
(32, 'Dózsa söröző', 'Budapest, Dózsa György út 9', '47.5046144', '19.0883761'),
(33, 'Faust Wine Cellar', 'Budapest,  Hess András tér 1', '47.5030538', '19.033279'),
(34, 'Fekete Delfin Bár És Kávézó', 'Budapest, Bartók Béla út 42', '47.4788332', '19.0504723'),
(35, 'Ferdinánd Monarchia Étterem', 'Budapest, Király utca 76', '47.5043311', '19.0668527'),
(36, 'Festal Étterem és Hennessy Club', 'Érd, Dávid utca 4', '47.3957998', '18.9141612'),
(37, 'FIRST Craft Beer & BBQ', 'Budapest, Dob u. 3', '47.4965619', '19.0595916'),
(38, 'Fónagy és Walter Vendég- és Borház', 'Vác, Budapesti főút 36', '47.772101', '19.133888'),
(39, 'Fröccskocsma', 'Budapest, József Attila utca 22', '47.49924', '19.052758'),
(40, 'Fröccsterasz', 'Budapest, Erzsébet tér 11-13', '47.4980561', '19.0535922'),
(41, 'Future Bar Bt.', 'Budapest, Dózsa György út, 140. földszin', '47.5214496', '19.0679379'),
(42, 'Gold Biliárd', 'Budapest, Kossuth tér 4-5-II. emelet', '47.4580917', '19.146593'),
(43, 'GONG CAFE presszo', 'Budapest, Erzsébet körút 15', '47.4991209', '19.070104'),
(44, 'Grinzingi Borozó', 'Budapest, Veres Pálné utca 10', '47.491766', '19.0556537'),
(45, 'Gyöngy Pub', 'Budapest, Lövőház utca 24', '47.5104909', '19.0237008'),
(46, 'Habakuk bár', 'Budapest, Erzsébet krt. 12', '47.4986326', '19.06996'),
(47, 'Hepaj hajó', 'Budapest, Duna dűlő 2', '47.4318654', '19.088379'),
(48, 'Hotel Chesscom', 'Budapest, Bartók Béla utca 5', '47.4611999', '19.1499098'),
(49, 'Hotel City Inn', 'Budapest, Futó utca 55', '47.4848985', '19.0744557'),
(50, 'Hörpentő Brewpub', 'Budapest, Gergő utca 11', '47.5420647', '19.1275064'),
(51, 'Illegal Pub & Club', 'Budapest, Kazinczy u. 4', '47.4960537', '19.0639972'),
(52, 'Infinity Party Hostels', 'Budapest, Akácfa utca 49', '47.5003798', '19.0655094'),
(53, 'Ínyenc Zenés Bisztró', 'Szentendre, Jókai Mór u. 1', '47.6690773', '19.0762087'),
(54, 'Jack Doyle\'s Irish Pub & Restaurant', 'Budapest, Pilvax köz 1-3', '47.4944791', '19.0556551'),
(55, 'Jégkert', 'Budapest, Bakfark Bálint utca 2', '47.5090827', '19.0285611'),
(56, 'Kaledonia Skót Gastro & Sports Pub', 'Budapest, Mozsár utca 9', '47.504936', '19.0608164'),
(57, 'Kaltenberg Sörház & Étterem', 'Budapest, Kinizsi utca 30', '47.4861632', '19.0670933'),
(58, 'Kandalló Craft Beer & Burger Pub', 'Budapest, Kertész utca 33', '47.5015235', '19.0659663'),
(59, 'Kempinski Hotel Corvinus Budapest', 'Budapest, Erzsébet tér 7-8', '47.4973868', '19.0522633'),
(60, 'Kertész Söröző', 'Budapest, Kertész u. 24-28', '47.5002074', '19.0671643'),
(61, 'Kincsem Park', 'Budapest, Albertirsai út 2-4', '47.4972250', '19.1218349'),
(62, 'KOLLÁZS - Brasserie & Bar', 'Budapest, Széchenyi István tér 5-6', '47.5001419', '19.047988'),
(63, 'Lobby Cafe & Bar', 'Budapest, Hess András tér 1', '47.5026170', '19.033606'),
(64, 'Macska', 'Budapest, Bérkocsis utca 23', '47.4937996', '19.0730471'),
(65, 'Mag Pub', 'Budapest, Bercsényi utca 9', '47.4782658', '19.0509836'),
(66, 'Magnum Sauna', 'Budapest, Csepreghy utca 2', '47.4883822', '19.0687913'),
(67, 'Marilyn Night Club | Gentlemen\'s Club, Striptease Bar', 'Budapest, Baross utca 4', '47.4896717', '19.0629597'),
(68, 'Monkey Bistro', 'Budapest, Ybl Miklós tér 4', '47.4955886', '19.0415862'),
(69, 'Morrison\'s 2', ' Budapest, földszint, Szent István körút 11', '47.5121244', '19.0504139'),
(70, 'Old Boy Beer Bar', 'Budapest, Bonyhádi út 18a', '47.5122012', '19.1298344'),
(71, 'Ötkert', 'Budapest, Zrínyi utca 4/A', '47.5003576', '19.0484586'),
(72, 'P2 Club Budapest', 'Budapest, Sas utca 9', '47.500141', '19.052297'),
(73, 'Park Inn By Radisson Budapest', 'Budapest, Szekszárdi utca 16-18', '47.5534576', '19.0786493'),
(74, 'Park Plaza Budapest', 'Budapest, Bem rakpart 16-19', '47.5025948', '19.0395694'),
(75, 'PASTA CULTURE Pizza & tésztabár', 'Budapest, Október 6. utca 19', '47.501848', '19.0508693'),
(76, 'Patent 46', 'Budapest, Király utca', '47.5013941', '19.0616374'),
(77, 'Pearl Harbor Restaurant Bowling & Bar', 'Budapest, Bécsi út 136', '47.5437857', '19.0284533'),
(78, 'Pier Pub', 'Budapest, Margitsziget, Sirály Csónakház', '47.5204453', '19.0466491'),
(79, 'PONTOON', 'Budapest Vigadó 1/A kikötő', '47.4983525', '19.0465593'),
(80, 'RS 1/2 9 Kultúrkör & Wine Locale', 'Budapest, Pauler utca 10', '47.4977311', '19.0315532'),
(81, 'Sauna 69', 'Budapest, Angyal utca 2', '47.4805791', '19.0683433'),
(82, 'Szimpla Kert', 'Budapest, Kazinczy utca 14', '47.4969213', '19.0635236'),
(83, 'The Duchess Rooftop Bar', 'Budapest, Matild Palace, Váci u 36', '47.492267', '19.0540009'),
(84, 'The Grund', 'Budapest, Nagy Templom utca 30', '47.485', '19.0766667'),
(85, 'To Wellness Hotel', 'Bánk, Petőfi út 73', '47.9228476', '19.1795671'),
(86, 'Toldi Klub', 'Budapest, Bajcsy-Zsilinszky út 36-38', '47.5038348', '19.0546235'),
(87, 'Touring Hotel', 'Gárdony, Tópart utca 1', '47.1973463', '18.600594'),
(88, 'Tranzit Art Café', 'Budapest, Tranzit Art Café, Kosztolányi Dezső tér', '47.4740638', '19.0399481'),
(89, 'Van Boris Borbá', 'Budapest, Erzsébet királyné útja 65', '47.526345', '19.1055614'),
(90, 'Vault 51 - Gamer Bar', 'Budapest, Ó utca 51', '47.505804', '19.060685'),
(91, 'Velvet Club & Restaurant', 'Budapest, Hercegprímás utca 12', '47.501509', '19.052695'),
(92, 'Vidor Söröző', 'Budapest, Katona József u. 20', '47.5142555', '19.0497914'),
(93, 'Vital Hotel Nautis', 'Gárdony, Holdfény sétány 9', '47.206', '18.619051'),
(94, 'Wunder Beer Works', 'Budapest, Zichy Jenő utca 41', '47.5056667', '19.0591575'),
(95, 'Ypsilon Étterem', 'Budapest, Stefánia út 1', '47.502806', '19.1069119');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_name`, `user_email`, `message`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', 'Test message ami megjelen remelhetoleg ');

-- --------------------------------------------------------

--
-- Table structure for table `forgotlogins`
--

CREATE TABLE `forgotlogins` (
  `id` int(11) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `code` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `forgotlogins`
--

INSERT INTO `forgotlogins` (`id`, `user_email`, `code`, `is_active`) VALUES
(1, 'modkarcsika@gmail.com', 86066, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bars_ids` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `creator_id`, `name`, `bars_ids`, `text`) VALUES
(16, 1, 'Bp - Szentendre', '9,14,19', 'Legelso utvonal 3 kocsmat tartalmaz'),
(17, 2, 'testadmin', '16,19', 'adminos test'),
(19, 2, 'Test 3 hehe', '9,12,22', 'Egy test ,megint');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `lat_lng` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `verify` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verify`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$WdDp4WQYExYLIn3HghsO3ueBhvkIXO5wJS6D4pKkFixWlT2iY1qm2', 0),
(3, 'Karesz', 'modkarcsika@gmail.com', '$2y$10$ve0/fYXryNEVwXf29M1Fk.88OB4p05Ck/WzYSQ1bMOQ1S..7.6JLO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotlogins`
--
ALTER TABLE `forgotlogins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bars`
--
ALTER TABLE `bars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forgotlogins`
--
ALTER TABLE `forgotlogins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
