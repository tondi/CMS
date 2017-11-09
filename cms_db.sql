-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2017, 12:43
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(110) NOT NULL,
  `image` varchar(110) NOT NULL,
  `content` varchar(4200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` int(11) NOT NULL,
  `author_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `content`, `date`, `author`, `author_name`) VALUES
(81, 'What Developers Saaay', 'C:xampphtdocsCMS/uploads/otworz.png', 'It is the one thing for .NET developers that removes fear of change (ReSharper).\r\nDavid Starr, \r\nHealthwise\r\nThank you for such an incredibly good product (TeamCity) which is so easy to use.\r\nTim Kent, \r\nBNP Paribas\r\nYouTrack is a very stable and consistent product. We value its rich functionality, speed and efficiency.\r\nMarvin Burman, \r\ntesthub.com', '2017-11-09 11:34:46', 6, 'user'),
(82, 'User Interface is the language of the web', 'C:xampphtdocsCMS/uploads/semantic.png', 'User Interface is the language of the web', '2017-11-09 11:30:14', 5, 'andrzej'),
(83, 'PHP 7.1.11 Released', 'C:xampphtdocsCMS/uploads/php-1.png', 'The PHP development team announces the immediate availability of PHP 7.1.11. This is a bugfix release, with several bug fixes included. All PHP 7.1 users are encouraged to upgrade to this version.\r\n\r\nFor source downloads of PHP 7.1.11 please visit our downloads page, Windows source and binaries can be found on windows.php.net/download/. The list of changes is recorded in the ChangeLog.\r\n\r\nAnybody who programs in PHP can be a contributing member of the community that develops and deploys it; the task of deploying PHP, documentation and associated websites is a never ending one. With every release, or release candidate comes a wave of work, which takes a lot of organization and co-ordination.\r\n\r\nWith the introduction of release managers comes a smoother release process, but help is still needed: testing release candidates, finding and squashing bugs in tests, documentation, and sources.', '2017-11-08 19:50:29', 29, 'mateusz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(110) NOT NULL,
  `name` varchar(110) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(110) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(5, 'andrzej', '$2y$10$4PF3sVLBcMtnJEfFPJ9aN.sYJLqRKhsLajM//1RS.zcdTRUv4xDVq'),
(6, 'user', '$2y$10$3aReTIL6N5vqlSjG79V44ezYtEUhrrmV21QMr0yUm8QjfUCHO8y1e'),
(29, 'mateusz', '$2y$10$JhSH9nyW6uxv57ejL/pQ1.2UCg0dbTd59oDnMyQ66ZLNWI1wt7iA2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
