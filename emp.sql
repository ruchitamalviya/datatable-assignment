-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 07:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatable`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `email`, `sal`) VALUES
(1, 'Neha', 'neha@malinator.com', '20000'),
(2, 'Raj', 'raj@malinator.com', '21000'),
(3, 'Dummy', 'dummy@gmail.com', '15000'),
(4, 'Priya', 'priya@gmail.com', '25000'),
(5, 'Sinu', 'sinu@gmail.com', '23000'),
(6, 'Tarun', 'tarun@gmail.com', '320000'),
(7, 'Saloni', 'saloni@gmail.com', '13000'),
(8, 'Reetu', 'reetu@gmail.com', '10000'),
(9, 'Aayu', 'aayu@gmail.com', '230000'),
(10, 'Ankit', 'ankit@gmail.com', '15000'),
(11, 'Nikita', 'nikita@gmail.com', '16000'),
(12, 'Purva', 'purva@gmail.com', '80000'),
(13, 'ved', 'ved@gmail.com', '120000'),
(14, 'ets', 'ets1@malinator.com', '14000'),
(17, 'ets2', 'ets2@malinator.com', '12000'),
(18, 'ets2', 'ets2@malinator.com', '12000'),
(19, 'pmets', 'pm@malinator.com', '345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
