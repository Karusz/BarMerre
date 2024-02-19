-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Feb 19. 13:21
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `barmerrenew`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bars`
--

CREATE TABLE `bars` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `passhash` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_verify` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `passhash`, `email`, `is_admin`, `is_verify`) VALUES
(1, 'Karesz', '$2y$10$Q6eDH85hJFpaOdeYIru7VeMYGE5a1BcReSdS6qbn9qQbXGeKbf5Li', 'modkarcsika@gmail.com', 1, 0),
(2, 'Admin', '$2y$10$SHW/wHZZAMeEbP7aNxokVO24xBdJzOxzNUHGuq0mWqaOela3pu.cq', 'admin@admin.admin', 1, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bars`
--
ALTER TABLE `bars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
