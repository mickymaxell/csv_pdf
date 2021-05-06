-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 07:24 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv`
--

-- --------------------------------------------------------

--
-- Table structure for table `csv_data`
--

CREATE TABLE `csv_data` (
  `id` int NOT NULL,
  `field1` varchar(500) DEFAULT NULL,
  `field2` varchar(500) DEFAULT NULL,
  `field3` varchar(500) DEFAULT NULL,
  `field4` varchar(500) DEFAULT NULL,
  `field5` varchar(500) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `csv_data`
--

INSERT INTO `csv_data` (`id`, `field1`, `field2`, `field3`, `field4`, `field5`, `created`) VALUES
(1, 'ravi', 'bopara', 'ravi', 'ravi@gmail.com', '9946710592', '2021-05-02 12:08:27'),
(2, 'jude', 'anstel', 'judest', 'jude@gmail.com', '8606322267', '2021-05-02 12:08:27'),
(3, 'red', 'carpet', 'redcars', 'red@gmail.com', '9495059210', '2021-05-02 12:08:27'),
(4, 'sample', 'june', 'sample', 'michael@gmail.com', '8921073910', '2021-05-02 12:08:27'),
(5, 'new', 'test', 'testing', 'testing@gmail.com', '8848194041', '2021-05-02 12:08:27'),
(6, 'we', 'we', 'testing', 'testing@gmail.com', '7878787878', '2021-05-02 12:08:27'),
(7, 'sample', 'sa', 'glenwil', 'michael@gmail.com', '1212121212', '2021-05-02 12:08:28'),
(8, 'qr', 'qr', 'henry', 'henry@gmail.com', '9878964512', '2021-05-02 12:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `is_confirmed` int NOT NULL DEFAULT '0',
  `is_subscriber` int NOT NULL DEFAULT '0',
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `last_name`, `email_id`, `password`, `avatar`, `created`, `updated`, `is_admin`, `is_confirmed`, `is_subscriber`, `type`) VALUES
(1, 'michael1234', 'Michael ', 'M Beveira', 'michaelbeveira@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'michael1234.jpg', '2021-02-18 12:39:35', '2021-02-20 08:31:55', 1, 1, 0, 'admin'),
(4, 'marc', 'Mark xavier', NULL, 'marc@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'marc.png', '2021-02-20 09:30:32', NULL, 1, 0, 0, 'admin'),
(6, 'new', 'Sample', NULL, 'sample@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-02-23 13:18:51', NULL, 1, 0, 0, 'admin'),
(13, 's', 's', NULL, 'sonybeveira@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-05-05 14:22:14', NULL, 0, 0, 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csv_data`
--
ALTER TABLE `csv_data`
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
-- AUTO_INCREMENT for table `csv_data`
--
ALTER TABLE `csv_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
