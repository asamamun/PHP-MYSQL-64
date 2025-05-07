-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 10:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r64_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created`) VALUES
(1, 'Automobiles', 'mobile', '2025-05-05 05:31:53'),
(2, 'Electronics', 'mobile', '2025-05-05 05:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recentsearch`
--

CREATE TABLE `recentsearch` (
  `id` int(11) NOT NULL,
  `searchterm` varchar(128) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role` set('admin','user','','') NOT NULL DEFAULT 'user',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `active`, `role`, `created`) VALUES
(2, 'test1', 'test1@gmail.com', '01711111111', '$2y$10$HrElQCfHvkilAQkz1Bzm1eNTo/wv6V4T7ruoj3a7AGzbPuOCK5/Ce', 1, 'admin', '2025-05-06 05:57:36'),
(7, 'mamun', 'mamun@gmail.com', '324587654', '$2y$10$7Lf1B8207VRcN2/t/Te4Y.Gu58TUo.JCgr3WmxP.davfpBLjVkq6W', 1, 'user', '2025-05-06 06:12:43'),
(8, 'al imran emon', 'imranemon334@gmail.com', '01567954701', '$2y$10$LH4l0I20FN8pW6M3FEn9EuT5tZjR6ET9tANFSvfKHjt3E4yEau3/2', 1, 'user', '2025-05-06 06:12:45'),
(9, 'Md. Ishaq Hossain', 'ishaqhossain98@gmail.com', '01783629582', '$2y$10$C.SaNimI.HkHfMlYH/a6bO9Fyous9QsCnwv7ifUrxFQPqSrnmuq36', 1, 'user', '2025-05-06 06:12:47'),
(10, 'rasibul kabir', 'mdfarhadbhuiyan@yahoo.com', '01728510359', '$2y$10$bZMJZSa/IQEMKkT5vvaNBOnSgVutxqfIRPDpxb4Ojx8M3mHeU..TW', 1, 'user', '2025-05-06 06:12:48'),
(11, 'sume', 'bisew.tahminasumi@gmail.com', '01960474971', '$2y$10$hjyhaIvXbjxA6z1VMZ1bHeRHGIlNTJj/q06isfO1XNEXoE6snoiCy', 1, 'admin', '2025-05-06 06:13:08'),
(12, 'abcd', 'abcd@gmail.com', '', '$2y$10$Cqy7XA6Qs9SEkfH.UlhALe.k16qCIlxkbVi6R.v7NgmmkiA7p9uhe', 1, 'user', '2025-05-06 06:13:22'),
(13, 'Muntasir', 'muntasirmahmudcn42@gmail.com', '01794000000', '$2y$10$MlQTB0.0/UZByFvxUGB6O.dVYQxUZWOlCVj6fgL.eji3EhE..8gAW', 1, 'user', '2025-05-06 06:14:08'),
(14, 'Shamima Naznin', 'rune182013@gmail.com', '01776056456', '$2y$10$a4N0j/4.Nety9Q./fXH7sucjmKWd0mX5PCMYZQYF1h5ZK6UewC/pa', 1, 'user', '2025-05-06 06:15:17'),
(15, 'Tony Stark', 'tony@ironman.com', '+852456789123', '$2y$10$7aJlp/91DVer316eOiudJuecIvkz/3eUza3RB7ZYF6pALv61Ged7a', 1, 'user', '2025-05-06 06:15:49'),
(17, 'Abdul Aziz Khan', 'abdulazizkhan.web@gmail.com', '01521557565', '$2y$10$6j3rmTnXV.fyTUptKsOtwO8I.FLpSjHa/PFTbXSz/PCwtzgVD1sc2', 1, 'user', '2025-05-06 06:18:24'),
(18, 'Ashalota', 'abc@gmail.com', '01723243554', '$2y$10$BvCDtbTy6nC1m7KL0SknWuOL0pM7vaM/JbHKnSShsFmxCp6QT6n4O', 1, 'user', '2025-05-06 06:26:10'),
(20, 'idb bisew', 'idb@gmail.com', '436858765', '$2y$10$2bVCWT3OXC1131/6B/mU8ugKzvGUDsqKq9Uh0cHDNKnpn4NccNoJy', 1, 'user', '2025-05-06 06:46:17'),
(21, 'muntasir_CR7', 'mmsoft@gmail.com', '01700000000', '$2y$10$qI9cQsMgKgPE/7MuaTTfmuJ0kilg8wnlySUt3mCFgs1rjw0eIAj6e', 1, 'user', '2025-05-06 06:48:31'),
(22, 'test5', 'test5@gmail.com', '3456897', '$2y$10$DRnMN5WKJVvju2LoTSaWRe6f34bOK7xeEd6EOb9ZWzVPz0VX98sL2', 1, 'user', '2025-05-07 04:23:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `recentsearch`
--
ALTER TABLE `recentsearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recentsearch`
--
ALTER TABLE `recentsearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
