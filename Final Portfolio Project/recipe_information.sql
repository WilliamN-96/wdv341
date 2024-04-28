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
-- Table structure for table `recipe_information`
--

CREATE TABLE `recipe_information` (
  `recipe_id` int(13) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `recipe_type` varchar(255) NOT NULL,
  `recipe_description` varchar(255) NOT NULL,
  `recipe_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_information`
--

INSERT INTO `recipe_information` (`recipe_id`, `recipe_name`, `recipe_type`, `recipe_description`, `recipe_image`) VALUES
(1, 'Chorizo and Hash', 'Food', 'Cooked chorizo sausage with pan-fried hash, topped with a sunny side up egg.', 'breakfast-1.jpg'),
(2, 'Hash with Breakfast Sausage and Egg', 'Food', 'Grilled breakfast sausage links with pan fried has and topped with 3 sunny side up eggs.', 'breakfast-2.jpg'),
(4, 'Whiskey Sour', 'Drink', '2 ounces of whisky (typically bourbon), .50 ounces of simple syrup, .75 ounces of lemon juice, 1 egg white (optional). \r\n\r\nIf you are making this with an egg white, dry shake for 10-15 seconds, then add ice to your shaker and shake for 30-35 seconds. If y', 'pexels-whiskey-sour.jpg'),
(5, 'Shirly Temple', 'Drink', 'Non Alcoholic version:\r\n1 ounce of grenadine syrup, 4 ounces of lemon lime soda or ginger ale.\r\n\r\nAlcoholic Verison:\r\n1 ounce grenadine, 1.5 ounces vodka, 4 ounces lemon lime syrup or ginger ale.', 'pexels-shirly-temple.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe_information`
--
ALTER TABLE `recipe_information`
  ADD PRIMARY KEY (`recipe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe_information`
--
ALTER TABLE `recipe_information`
  MODIFY `recipe_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
