-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 08:24 PM
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
  `lng` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `bars`
--

INSERT INTO `bars` (`id`, `name`, `address`, `lat`, `lng`, `state`, `city`, `zip`) VALUES
(2, '4-es 6-os Corvin', ' Budapest, József krt. 74', '47.4870639', '19.0706272', 'Budapest', 'Budapest', 1085),
(3, '4-es 6-os Söröző', 'Budapest, Erzsébet krt. 58', '47.5029812', '19.0657629', 'Budapest', 'Budapest', 1073),
(4, '4es6os Wesselényi', ' Budapest, Erzsébet krt. 28', '47.5002265', '19.0687209', 'Budapest', 'Budapest', 1073),
(5, 'Anytime Bar & Entertainment', 'Budapest, Király u. 56', '47.5027095', '19.0636165', 'Budapest', 'Budapest', 1068),
(6, 'BAR Made In', 'Budapest, Dohány u. 46', '47.4972256', '19.0675379', 'Budapest', 'Budapest', 1076),
(7, 'BarCraft', ' Budapest, Ferenc krt. 34', '47.4843166', '19.0690886', 'Budapest', 'Budapest', 1092),
(8, 'BarCraft Buda', 'Budapest, Bartók Béla út 18', '47.4815242', ' 19.0525696', 'Budapest', 'Budapest', 1111),
(9, 'BarCraft Nyugati', 'Budapest, Bajcsy-Zsilinszky út 59', '47.5092012', '19.0559288', 'Budapest', 'Budapest', 1065),
(10, 'Club Semafor söröző', 'Budapest, Szerencs u. 1', '47.5536662', '19.1083533', 'Budapest', 'Budapest', 1153),
(11, 'DiVino Wine Bar', 'Budapest, Szent István tér 3', '47.5002778', '19.0530556', 'Budapest', 'Budapest', 1051),
(12, 'Dózsa söröző', 'Budapest, Dózsa György út 9', '47.5046144', '19.0883761', 'Budapest', 'Budapest', 1146),
(13, 'Faust Wine Cellar', ' Budapest, Hess András tér 1', '47.5030538', '19.033279', 'Budapest', 'Budapest', 1014),
(14, 'FIRST Craft Beer & BBQ', 'Budapest, Dob u. 3', '47.4965619', '19.0595916', 'Budapest', 'Budapest', 1072),
(15, 'Fröccskocsma', 'Budapest, József Attila u. 22', '47.49924', '19.052758', 'Budapest', 'Budapest', 1051),
(16, 'Fröccsterasz', 'Budapest, Erzsébet tér 11-13', '47.4980561', '19.0535922', 'Budapest', 'Budapest', 1051),
(17, 'Habakuk bár', 'Budapest, Erzsébet krt. 12', '47.4986326', '19.06996', 'Budapest', 'Budapest', 1074),
(18, 'Illegal Pub & Club', 'Budapest, Kazinczy u. 4', '47.4960537', '19.0639972', 'Budapest', 'Budapest', 1074),
(19, 'Ínyenc Zenés Bisztró', 'Szentendre, Jókai Mór u. 1', '47.6690773', '19.0762087', 'Pest', 'Szentendre', 2000),
(20, 'Kertész Söröző', 'Budapest, Kertész u. 24-28', '47.5002074', '19.0671643', 'Budapest', 'Budapest', 1072),
(21, 'Monkey Bistro', 'Budapest, Ybl Miklós tér 4', '47.4955886', '19.0415862', 'Budapest', 'Budapest', 1013),
(22, 'Szimpla Kert', 'Budapest, Kazinczy u. 14', '47.4969263', '19.0635235', 'Budapest', 'Budapest', 1075),
(23, 'The Duchess Rooftop Bar', 'Budapest, Matild Palace, Váci u 36', '47.492267', '19.0540009', 'Budapest', 'Budapest', 1056),
(24, 'Toldi Klub', 'Budapest, Bajcsy-Zsilinszky út 36-38', '47.5038348', '19.0546235', 'Budapest', 'Budapest', 1054),
(25, 'Van Boris Borbá', 'Budapest, Erzsébet királyné útja 65', '47.526345', '19.1055614', 'Budapest', 'Budapest', 1142),
(26, 'Vidor Söröző', 'Budapest, Katona József u. 20', '47.5142555', '19.0497914', 'Budapest', 'Budapest', 1137);

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
  `bars` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `cordinate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cordinate`))
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
(3, 'Karesz', 'modkarcsika@gmail.com', '$2y$10$DEKzwh7c0W61Bnp6gDnaCuVpXjar32qi7xtfDMttIaoLBB1EXc6qO', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
