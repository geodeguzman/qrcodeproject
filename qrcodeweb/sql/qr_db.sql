-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2025 at 10:19 AM
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
-- Database: `qr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `qr_links`
--

CREATE TABLE `qr_links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `qr` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_links`
--

INSERT INTO `qr_links` (`id`, `title`, `url`, `qr`, `created_at`) VALUES
(2, 'Youtube mrbeast', 'https://www.youtube.com/@MrBeast', 'https://qrtag.net/api/qr.svg?url=https%3A%2F%2Fwww.youtube.com%2F%40MrBeast', '2025-07-14 15:26:51'),
(3, 'Classroom', 'https://classroom.google.com/c/NzgyMjYyMzc5NjYy/a/NzgzMjA0NTQzNDg0/details', 'https://qrtag.net/api/qr.svg?url=https%3A%2F%2Fclassroom.google.com%2Fc%2FNzgyMjYyMzc5NjYy%2Fa%2FNzgzMjA0NTQzNDg0%2Fdetails', '2025-07-14 15:27:45'),
(5, 'API Project', 'https://saxor.notion.site/API-Project-bc576962459040618050b21a26afa97c', 'https://qrtag.net/api/qr.svg?url=https%3A%2F%2Fsaxor.notion.site%2FAPI-Project-bc576962459040618050b21a26afa97c', '2025-07-14 15:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qr_links`
--
ALTER TABLE `qr_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qr_links`
--
ALTER TABLE `qr_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
