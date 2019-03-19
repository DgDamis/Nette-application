-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 05. bře 2019, 12:09
-- Verze serveru: 5.6.24
-- Verze PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `nette`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `published_by` varchar(100) COLLATE cp1250_czech_cs NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

--
-- Vypisuji data pro tabulku `news`
--

INSERT INTO `news` (`id`, `id_product`, `title`, `published_by`, `published_at`, `content`) VALUES
(1, 0, 'testovací titulek', '0', '2019-03-04 23:00:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Pellentesque sapien. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Donec vitae arcu. Aliquam erat volutpat. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis risus. Curabitur vitae diam non enim vestibulum interdum. Vivamus ac leo pretium faucibus. In enim a arcu imperdiet malesuada. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Cras elementum. Etiam dictum tincidunt diam. Praesent id justo in neque elementum ultrices.');

-- --------------------------------------------------------

--
-- Struktura tabulky `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `nickname` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `role` enum('administrator','publisher','registered') CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL DEFAULT 'registered'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nickname`, `role`) VALUES
(2, 'admin', '$2y$10$HL50kdniiFnun7DPK5esWeSRbwQd3zXbdXZu9v9B7jixz95vaVH2S', 'admin@example.com', '', 'administrator');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`), ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
