-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 06:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(3, 'qweaaa', 'adminaaa', '2135eaecbbb47967685278c156babd44', 'user'),
(4, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(5, '', '', '', ''),
(6, 'Joyce', 'joyce@gmail.com', 'qwe', 'admin'),
(7, 'jeem', 'jeem@yahoo.com', 'qwe', 'user'),
(8, 'albert', 'albert@gmail.com', 'qwe', 'user'),
(12, 'qweqwe', 'mayang@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'user'),
(13, 'qweqwe', 'albert@gmail.com', 'efe6398127928f1b2e9ef3207fb82663', 'user'),
(14, 'qwwww', 'devegajed1997@gmai.com', '76d80224611fc919a5d54f0ff9fba446', 'user'),
(21, 'albert', 'albert@gmail.com', '3675ac5c859c806b26e02e6f9fd62192', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
