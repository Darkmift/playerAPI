-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 06:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET hp8 COLLATE hp8_bin NOT NULL,
  `image` varchar(1000) CHARACTER SET hp8 COLLATE hp8_bin NOT NULL,
  `songs` text CHARACTER SET hp8 COLLATE hp8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `image`, `songs`) VALUES
(1, 'pl 1 no songs', 'pl.url', '[{\"name\":\"song1-1\",\"url\":\"song1-1.com\"},{\"name\":\"song1-1\",\"url\":\"song1-1.com\"},{\"name\":\"song1-1\",\"url\":\"song1-1.com\"}]'),
(2, 'pl 2 updated again again', 'http://www.image.com', '[{\"name\":\"song1-1\",\"url\":\"song1-1.com\"}]'),
(3, 'pl 3 no songs', 'pl.url', '[{\"name\":\"song1-1\",\"url\":\"song1-1.com\"}]'),
(4, 'pl 4 no songs', 'pl.url', '[{\"name\":\"song1-1\",\"url\":\"song1-1.com\"}]'),
(6, 'listymclistface', 'https://www.w3schools.com', '[{\"name\":\"sltring\",\"url\":\"https:\\/\\/www.w3schools.com\"},{\"name\":\"string\",\"url\":\"https:\\/\\/www.w3schools.com\"}]'),
(7, 'playlist0601', 'http://image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(14, 'playlist 14 name', 'http://www.plimage.fr', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(16, 'playlist06012', 'http://www.image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(17, 'playlist06013', 'http://www.image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(18, 'playlist06014', 'http://www.image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(19, 'playlist06015', 'http://www.image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]'),
(20, 'playlist06016', 'http://www.image.com', '[{\"name\":\"some song\",\"url\":\"http:\\/\\/somesong.com\"},{\"name\":\"some song2\",\"url\":\"http:\\/\\/somesong.com\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
