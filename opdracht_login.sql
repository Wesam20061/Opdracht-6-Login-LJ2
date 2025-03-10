-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 mrt 2025 om 21:31
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdracht_login`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'testgebruiker', '$2y$10$wG5Bp8N.8N0FJZ1oZaBZYuQzRQ/Jv6Jh0I5nFlrLP8Po8h7OexR/K', '2025-03-04 08:20:10'),
(2, 'Jan', '$2y$10$HRCWsYERIKjl1EvJoE08Y.vi0zmU4I8Jzl7RqOwqJcllw800qJ3ju', '2025-03-04 08:40:06'),
(3, 'lak', '$2y$10$m5vhRX6ann8p/Iw1VeRme.oZxx7O9tC6tkBWWVtPn2mmFukywoi3y', '2025-03-04 08:40:46'),
(4, 'wesam', '$2y$10$5/a8FJbVIuAo.zKTueQ0NeZ.2x7wFysnK7u2Qm6ZhnObu1Ng.habm', '2025-03-07 12:29:25'),
(5, 'Ali', '$2y$10$JNexp1GjH.L876Vxkh1cYuxb3GEFA98nQMUO5sROnY880tdI30YDe', '2025-03-09 19:54:13');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
