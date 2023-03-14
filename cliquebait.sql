-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 03:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliquebait`
--
CREATE DATABASE IF NOT EXISTS `cliquebait` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cliquebait`;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follower_id`, `followed_id`, `timestamp`) VALUES
(1, 3, '2023-03-14 02:46:13'),
(1, 5, '2023-03-14 02:46:18'),
(2, 1, '2023-03-14 02:46:51'),
(2, 4, '2023-03-14 02:46:44'),
(2, 5, '2023-03-14 02:46:39'),
(3, 5, '2023-03-14 02:47:10'),
(5, 2, '2023-03-14 02:47:52'),
(5, 3, '2023-03-14 02:48:25'),
(5, 4, '2023-03-14 02:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `first_name`, `middle_name`, `last_name`, `picture`) VALUES
(1, 'Mubeen', 'Duckling', 'Khan', '1-640fde43e9f71.png'),
(2, 'Rachelle', 'Secret', 'Badua', '2-640fe0a5d984c.png'),
(3, 'Mert', 'something', 'Salvador', '3-640fdeb97406d.png'),
(4, 'Phill', '', 'idk', '4-640fdf2d8863a.png'),
(5, 'Vinh', 'idk', '', '5-640fdf94ac254.png');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `caption` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `picture`, `caption`, `timestamp`) VALUES
(3, 2, '2-640d0c3ec45e1.png', 'Dino', '2023-03-11 23:18:23'),
(4, 1, '1-640d36752e801.png', 'help', '2023-03-12 02:18:29'),
(6, 2, '2-640d6157a76e6.png', 'Bread', '2023-03-12 05:34:22'),
(7, 2, '2-640d658fc0894.png', 'Happy Kittyyyy', '2023-03-12 05:39:29'),
(8, 1, '1-640d68abb7252.png', 'KITTYYYYYYY', '2023-03-12 05:52:43'),
(9, 3, '3-640fdecc03718.png', 'i wanna give up', '2023-03-14 02:41:16'),
(10, 3, '3-640fded6a887a.png', 'merrrt', '2023-03-14 02:41:26'),
(11, 4, '4-640fdf39c28dd.jpg', 'huh', '2023-03-14 02:43:05'),
(12, 4, '4-640fdf4a9ba11.jpg', 'aloha', '2023-03-14 02:43:22'),
(13, 5, '5-640fdf9c2fa51.jpg', 'seggrs', '2023-03-14 02:44:44'),
(14, 5, '5-640fdfa54f2fb.jpg', 'fsdfsfsdf', '2023-03-14 02:44:53'),
(16, 5, '5-640fdfc0f3d3d.jpg', 'yjhfgtdrs', '2023-03-14 02:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(1, 'Mubeen', '$2y$10$CyPOiMzu1Uo2vn4qYMK1VuvQ2o.xGVap1a4SDCgIAv36vdybJuo2u'),
(2, 'Rachelle', '$2y$10$XhtLKVxVs5UiAG3ZyE/Fzu/T/jz2qYkitIEflHNFGwp.vFYBqjHv.'),
(3, 'Mert', '$2y$10$kHLHxeLyAioODekv5IwfyunL5Cn65qi1Y8LysVoSY5V.R4uTRRcu2'),
(4, 'Phill', '$2y$10$G4Gv2eJ3a2zRQFfiRYeM/OTrIKQ18vvKYOMmaJVO7z/F/8JcuuE2y'),
(5, 'Vinh', '$2y$10$7Fv8EQaOlX.REUFgEzLK/.ZXajcPboFwWcFTE0YUxDuM92peANu46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follower_id`,`followed_id`),
  ADD KEY `followed_to_profile` (`followed_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `followed_to_profile` FOREIGN KEY (`followed_id`) REFERENCES `profile` (`user_id`),
  ADD CONSTRAINT `follower_to_profile` FOREIGN KEY (`follower_id`) REFERENCES `profile` (`user_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
