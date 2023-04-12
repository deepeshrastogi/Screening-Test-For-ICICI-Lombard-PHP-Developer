-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screening-test-for-icici-lombard-php-developer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(1, 'Delhi'),
(2, 'Mumbai'),
(3, 'GOA'),
(4, 'Uttarakhand');

-- --------------------------------------------------------

--
-- Table structure for table `city_travel_history`
--

CREATE TABLE `city_travel_history` (
  `id` int(11) NOT NULL,
  `traveller_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_travel_history`
--

INSERT INTO `city_travel_history` (`id`, `traveller_id`, `city_id`, `from_date`, `to_date`) VALUES
(1, 1, 1, '2022-09-23', '2022-10-05'),
(2, 1, 3, '2022-10-12', '2022-10-31'),
(5, 1, 2, '2022-10-26', '2022-10-30'),
(6, 2, 1, '2022-09-23', '2022-10-05'),
(7, 2, 3, '2022-10-22', '2022-10-28'),
(8, 2, 2, '2022-11-03', '2022-11-30'),
(9, 3, 1, '2022-09-25', '2022-09-30'),
(10, 3, 3, '2022-10-01', '2022-10-11'),
(11, 3, 2, '2022-09-01', '2022-09-14'),
(12, 4, 1, '2022-09-23', '2022-10-05'),
(13, 4, 3, '2022-11-18', '2022-11-30'),
(14, 4, 2, '2022-10-19', '2022-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

CREATE TABLE `travelers` (
  `id` int(11) NOT NULL,
  `traveller_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travelers`
--

INSERT INTO `travelers` (`id`, `traveller_name`) VALUES
(1, 'traveller_a'),
(2, 'traveller_b'),
(3, 'traveller_c'),
(4, 'traveller_d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_travel_history`
--
ALTER TABLE `city_travel_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `traveller_id` (`traveller_id`);

--
-- Indexes for table `travelers`
--
ALTER TABLE `travelers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city_travel_history`
--
ALTER TABLE `city_travel_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `travelers`
--
ALTER TABLE `travelers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city_travel_history`
--
ALTER TABLE `city_travel_history`
  ADD CONSTRAINT `city_travel_history_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `city_travel_history_ibfk_2` FOREIGN KEY (`traveller_id`) REFERENCES `travelers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
