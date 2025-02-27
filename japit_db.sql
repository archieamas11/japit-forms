-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 04:59 PM
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
-- Database: `japit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `civil_status` varchar(50) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `rm` varchar(50) DEFAULT NULL,
  `house` varchar(50) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `subdivision` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `rm_home` varchar(50) DEFAULT NULL,
  `house_home` varchar(50) DEFAULT NULL,
  `street_home` varchar(255) DEFAULT NULL,
  `subdivision_home` varchar(255) DEFAULT NULL,
  `barangay_home` varchar(255) DEFAULT NULL,
  `city_home` varchar(100) DEFAULT NULL,
  `province_home` varchar(100) DEFAULT NULL,
  `country_home` varchar(100) DEFAULT NULL,
  `zip_home` varchar(20) DEFAULT NULL,
  `father_last_name` varchar(100) DEFAULT NULL,
  `father_first_name` varchar(100) DEFAULT NULL,
  `father_middle_name` varchar(100) DEFAULT NULL,
  `mother_last_name` varchar(100) DEFAULT NULL,
  `mother_first_name` varchar(100) DEFAULT NULL,
  `mother_middle_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `middle_name`, `dob`, `gender`, `civil_status`, `nationality`, `religion`, `email`, `tel`, `phone_number`, `rm`, `house`, `street`, `subdivision`, `barangay`, `city`, `province`, `country`, `zip`, `rm_home`, `house_home`, `street_home`, `subdivision_home`, `barangay_home`, `city_home`, `province_home`, `country_home`, `zip_home`, `father_last_name`, `father_first_name`, `father_middle_name`, `mother_last_name`, `mother_first_name`, `mother_middle_name`, `created_at`) VALUES
(1, 'Madden', 'Georgia', 'Ian Crawford', '2000-02-20', 'male', 'single', 'Dolor illum id magn', 'Eius qui atque est ', 'biwulobi@mailinator.com', '1', '635', 'Lilah Russell', 'Nihil quo tempore n', 'Keaton Anderson', 'Corrupti aut volupt', 'Magni nisi dolore qu', 'Voluptatibus non et ', 'Alias quas est aut q', 'Natus a consequuntur', '6034', 'Yoshi Mckenzie', 'Doloribus dolorum sa', 'Amity Haley', 'Voluptate est amet ', 'Quod numquam volupta', 'Doloribus irure amet', 'Praesentium nihil co', '', '1315', 'Carter', 'Callie', 'Delilah Little', 'Howard', 'Melvin', 'Mari Berg', '2025-02-27 15:59:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
