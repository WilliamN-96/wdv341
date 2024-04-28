-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdv341`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_information`
--

CREATE TABLE `sign_up_information` (
  `sign_up_id` int(20) NOT NULL,
  `sign_up_name` varchar(255) NOT NULL,
  `sign_up_email` varchar(255) NOT NULL,
  `sign_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up_information`
--

INSERT INTO `sign_up_information` (`sign_up_id`, `sign_up_name`, `sign_up_email`, `sign_up_date`) VALUES
(3, 'John Smith', 'abc@email.com', '0000-00-00'),
(4, 'Will', 'wnelson3@dmacc.edu', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign_up_information`
--
ALTER TABLE `sign_up_information`
  ADD PRIMARY KEY (`sign_up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign_up_information`
--
ALTER TABLE `sign_up_information`
  MODIFY `sign_up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
