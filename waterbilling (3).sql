-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 09:25 AM
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
-- Database: `waterbilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `owners_id` int(10) NOT NULL,
  `prev` varchar(20) NOT NULL,
  `pres` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `bill` int(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `due date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `owners_id`, `prev`, `pres`, `price`, `bill`, `date`, `due date`, `status`) VALUES
(100, 13, '600', '610', '25', 0, '23/04/20 16:54:56', '', ''),
(5, 9, '12', '322', '10', 0, '13/03/08 08:53:29', '', ''),
(30, 15, '600', '607', '25', 0, '23/04/13 00:19:31', '', ''),
(31, 15, '600', '607', '', 0, '23/04/13 00:21:52', '', ''),
(32, 15, '600', '609', '', 0, '23/04/13 00:23:03', '', ''),
(33, 11, '600', '607', '', 0, '23/04/13 00:23:43', '', ''),
(50, 15, '601', '610', '25', 0, '23/04/13 08:09:36', '', ''),
(139, 0, '', '', '', 0, '', '', ''),
(136, 0, '', '', '', 0, '', '', ''),
(137, 0, '', '', '', 0, '', '', ''),
(138, 0, '', '', '', 0, '', '', ''),
(55, 16, '600', '605', '25', 0, '23/04/13 11:56:29', '', ''),
(56, 16, '600', '606', '25', 0, '23/04/13 11:57:05', '', ''),
(57, 16, '600', '607', '25', 0, '23/04/13 11:57:45', '', ''),
(58, 16, '600', '608', '25', 0, '23/04/13 11:58:10', '', ''),
(59, 16, '600', '609', '25', 0, '23/04/13 11:58:25', '', ''),
(60, 16, '600', '615', '25', 0, '23/04/13 11:58:54', '', ''),
(61, 16, '600', '611', '25', 0, '23/04/13 12:00:40', '', ''),
(62, 16, '600', '612', '25', 0, '23/04/13 12:00:59', '', ''),
(63, 16, '600', '613', '25', 0, '23/04/13 12:01:15', '', ''),
(64, 16, '600', '614', '25', 0, '23/04/13 12:01:44', '', ''),
(66, 16, '600', '615', '25', 0, '23/04/13 12:02:27', '', ''),
(67, 16, '600', '616', '25', 0, '23/04/13 12:02:40', '', ''),
(68, 16, '600', '617', '25', 0, '23/04/13 12:03:23', '', ''),
(69, 16, '600', '618', '25', 0, '23/04/13 12:03:42', '', ''),
(70, 16, '600', '619', '25', 0, '23/04/13 12:04:48', '', ''),
(71, 16, '600', '620', '25', 0, '23/04/13 12:05:01', '', ''),
(72, 16, '600', '621', '25', 0, '23/04/13 12:05:55', '', ''),
(74, 16, '600', '622', '25', 0, '23/04/13 12:06:29', '', ''),
(75, 16, '600', '623', '25', 0, '23/04/13 12:06:54', '', ''),
(76, 16, '600', '624', '25', 0, '23/04/13 12:07:06', '', ''),
(78, 16, '600', '625', '25', 0, '23/04/13 12:07:46', '', ''),
(79, 16, '600', '626', '25', 0, '23/04/13 12:08:01', '', ''),
(80, 16, '600', '627', '25', 0, '23/04/13 12:10:43', '', ''),
(84, 16, '600', '628', '25', 0, '23/04/13 12:14:56', '', ''),
(85, 16, '600', '629', '25', 0, '23/04/13 12:15:12', '', ''),
(86, 16, '600', '630', '25', 0, '23/04/13 12:18:01', '', ''),
(87, 16, '600', '631', '25', 0, '23/04/13 12:18:16', '', ''),
(88, 16, '600', '632', '25', 0, '23/04/13 12:18:29', '', ''),
(89, 16, '600', '633', '25', 0, '23/04/13 12:18:45', '', ''),
(90, 16, '600', '634', '25', 0, '23/04/13 12:23:18', '', ''),
(91, 16, '600', '635', '25', 0, '23/04/13 12:24:49', '', ''),
(92, 16, '600', '636', '25', 0, '23/04/13 12:25:10', '', ''),
(93, 16, '600', '637', '25', 0, '23/04/13 12:25:27', '', ''),
(94, 16, '600', '638', '25', 0, '23/04/13 12:25:50', '', ''),
(95, 16, '600', '639', '25', 0, '23/04/13 12:26:06', '', ''),
(96, 16, '600', '640', '25', 0, '23/04/13 12:26:19', '', ''),
(97, 16, '600', '641', '25', 0, '23/04/13 12:26:31', '', ''),
(98, 16, '600', '642', '25', 0, '23/04/13 12:30:07', '', ''),
(142, 1, '600', '610', '25', 0, '23/05/14 07:22:12', '', ''),
(134, 0, '', '', '', 0, '', '', ''),
(135, 0, '', '', '', 0, '', '', ''),
(114, 0, '', '', '', 0, '', '', ''),
(115, 0, '', '', '', 0, '', '', ''),
(116, 0, '', '', '', 0, '', '', ''),
(117, 0, '', '', '', 0, '', '', ''),
(118, 0, '', '', '', 0, '', '', ''),
(147, 1, '600', '610', '25', 0, '23/09/15 07:37:36', '', ''),
(140, 0, '', '', '', 0, '', '', ''),
(146, 2, '600', '610', '25', 0, '23/05/15 07:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES
(36, '', 'comment', 'Hi', 'read', '2023-03-10 17:13:49'),
(37, '', 'comment', 'aa', 'read', '2023-03-10 17:46:47'),
(38, '', 'comment', '1', 'read', '2023-03-10 18:46:32'),
(39, '', 'comment', '350', 'read', '2023-03-10 22:31:04'),
(40, '', 'comment', '350', 'read', '2023-03-10 22:33:09'),
(41, '', 'comment', 'Hi', 'read', '2023-03-10 22:33:11'),
(42, '', 'comment', 'Payment Success', 'read', '2023-03-10 22:42:20'),
(43, '', 'comment', 'Payment Success', 'read', '2023-03-10 22:42:24'),
(44, '', 'comment', '260', 'read', '2023-03-10 23:31:00'),
(45, '', 'comment', '260', 'read', '2023-03-10 23:31:03'),
(46, '', 'comment', '260', 'read', '2023-03-10 23:31:20'),
(47, '', 'comment', '260', 'read', '2023-03-13 23:48:31'),
(48, '', 'comment', '260', 'read', '2023-03-13 23:48:34'),
(49, '', 'comment', '260', 'read', '2023-03-19 13:33:54'),
(50, '', 'comment', '2', 'read', '2023-03-19 13:42:02'),
(51, '', 'comment', '2', 'read', '2023-03-19 13:42:06'),
(52, '', 'comment', '260', 'read', '2023-03-19 13:42:51'),
(53, '', 'comment', '343', 'read', '2023-03-19 13:47:15'),
(54, '', 'comment', 'w', 'read', '2023-03-19 14:00:24'),
(55, '', 'comment', '260', 'read', '2023-03-22 16:23:26'),
(56, '', 'comment', '230', 'read', '2023-03-22 16:29:22'),
(57, '', 'comment', 'qwe', 'read', '2023-03-22 16:38:38'),
(58, '', 'comment', '350', 'read', '2023-04-13 01:27:33'),
(59, '', 'comment', '260', 'read', '2023-04-13 02:03:41'),
(60, '', 'comment', '600', 'read', '2023-04-13 02:46:42'),
(61, '', 'comment', '', 'read', '2023-04-21 23:28:31'),
(62, '', 'comment', '', 'read', '2023-04-21 23:28:34'),
(63, '', 'comment', '', 'read', '2023-04-21 23:31:29'),
(64, '', 'comment', '60', 'read', '2023-04-21 23:31:30'),
(65, '', 'comment', '60', 'read', '2023-04-21 23:54:35'),
(66, '', 'comment', '60', 'read', '2023-04-21 23:54:36'),
(67, '', 'comment', '60', 'read', '2023-04-21 23:55:21'),
(68, '', 'comment', '60', 'read', '2023-04-21 23:55:22'),
(69, '', 'comment', '60', 'read', '2023-05-13 22:40:12'),
(70, '', 'comment', '22', 'read', '2023-05-13 22:40:16'),
(71, '', 'comment', '22', 'read', '2023-05-13 22:46:30'),
(72, '', 'comment', '22', 'read', '2023-05-13 22:52:58'),
(73, '', 'comment', '60', 'read', '2023-05-13 22:54:56'),
(74, '', 'comment', '60', 'read', '2023-05-14 02:32:35'),
(75, '', 'comment', '60', 'read', '2023-05-14 02:32:38'),
(76, '', 'comment', '60', 'read', '2023-05-14 02:36:40'),
(77, '', 'comment', '60', 'read', '2023-05-14 02:36:51'),
(78, '22', 'like', '', 'read', '2023-05-14 02:37:17'),
(79, '22', 'like', '', 'read', '2023-05-14 02:38:25'),
(80, '', 'comment', '60', 'read', '2023-05-14 02:47:03'),
(81, '', 'comment', '22', 'read', '2023-05-14 02:47:17'),
(82, '', 'comment', '22', 'read', '2023-05-14 02:48:03'),
(83, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(84, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(85, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(86, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(87, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(88, '', 'comment', '22', 'read', '2023-05-14 02:48:04'),
(89, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(90, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(91, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(92, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(93, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(94, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(95, '', 'comment', '22', 'read', '2023-05-14 02:48:17'),
(96, '', 'comment', '23', 'read', '2023-05-14 02:59:45'),
(97, '', 'comment', '12', 'read', '2023-05-14 03:07:06'),
(98, '', 'comment', '432', 'read', '2023-05-14 03:10:36'),
(99, '', 'comment', '234', 'read', '2023-05-14 03:15:07'),
(100, '', 'comment', '123', 'read', '2023-05-14 03:23:00'),
(101, '', 'comment', '123', 'read', '2023-05-14 03:23:06'),
(102, '', 'comment', '123', 'read', '2023-05-14 03:25:03'),
(103, '', 'comment', '123', 'read', '2023-05-14 03:25:05'),
(104, '', 'comment', '123', 'read', '2023-05-14 03:26:25'),
(105, '', 'comment', '123', 'read', '2023-05-14 03:28:14'),
(106, '', 'comment', '342', 'read', '2023-05-14 03:29:38'),
(107, '', 'comment', '32', 'read', '2023-05-14 03:32:57'),
(108, '', 'comment', '456', 'read', '2023-05-14 03:34:26'),
(109, '', 'comment', '232', 'read', '2023-05-14 04:13:19'),
(110, '', 'comment', '12', 'read', '2023-05-14 18:58:27'),
(111, '', 'comment', '12', 'read', '2023-05-14 19:04:50'),
(112, '', 'comment', '245', 'read', '2023-05-14 20:12:48'),
(113, '', 'comment', '245', 'read', '2023-05-14 21:06:11'),
(114, '', 'comment', '12', 'read', '2023-05-14 21:07:31'),
(115, '', 'comment', '125', 'read', '2023-05-14 22:56:46'),
(116, '', 'comment', '260', 'read', '2023-05-15 13:05:41'),
(117, '', 'comment', '235', 'read', '2023-05-16 03:37:35'),
(118, 'wew', 'like', '', 'read', '2023-05-17 14:26:22'),
(119, 'wew', 'like', '', 'read', '2023-05-17 14:26:25'),
(120, 'wew', 'like', '', 'read', '2023-05-17 14:26:43'),
(121, '', 'comment', '60', 'read', '2023-05-17 14:26:46'),
(122, '', 'comment', '60', 'read', '2023-05-17 14:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ref` int(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `status` varchar(50) NOT NULL,
  `stat` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `fname`, `username`, `ref`, `password`, `pp`, `status`, `stat`, `date`, `type`, `message`) VALUES
(20, 0, 'Noelito Rivera', 'Gcash', 250, '$2y$10$qTVVlvTbWl/mClcr4kEiX.CKSFUhmgmJ9zW0msAqLvFiwTkgksG5q', '22645faf9672f5b0.59819116.png', 'approved', 'read', '2023-05-18 00:33:23', 'comment', 'New Payment'),
(21, 0, 'asd', '2', 222, '$2y$10$lEg4C9zP1pb6AQANL5opt.bA.wwY6zC/zcsQm6r0c9sQpp5.U3tNu', '2645fafa4416e20.88915020.png', 'approved', '', '2023-05-18 00:33:23', '', ''),
(22, 0, 'ww', 'ww', 22, '$2y$10$W2x3UrvBJpjLR.HiNSmbauS79HEmndhaK8E4SDetgLkQnF5e6d1fe', 'ww645fb11c6d77f1.16267556.png', 'approved', '', '2023-05-18 00:33:23', '', ''),
(23, 0, 'Noelito', '11', 3243, '$2y$10$daQzaEBN6C9TVT2ipmLoB.gabbGsduFiCotujGiEHRry6hpDOkvoa', '11645fbd34bc08b5.75639504.png', 'approved', '', '2023-05-18 00:33:23', '', ''),
(24, 0, 'wew', '22', 22, '$2y$10$pBk/vvSpmVZLIaZYr8PB4OTa3tC2560lt3hR2nNQtWX5r.sTee0pW', '22645fbf7760f478.85983873.jpeg', 'approved', 'read', '2023-05-18 00:33:23', 'comment', 'New Payment'),
(66, 0, 'Noelito', '32', 23423, '$2y$10$54Lqkf10pRD8eqMVaJce7u6UI/N08xNqJQ1kijPmg2Wdobb6UTGci', '3264c009bfa34493.05917285.png', 'approved', 'unread', '2023-07-26 01:43:27', 'comment', 'New Payment Received'),
(67, 1321846266, 'Noelito Rivera', '₱665.00 ', 2147483647, '$2y$10$Msi7f/.7p5EzEWSNmlbIF.VhAUV5/MsQRX.v.37QjkQ5NO83AmBXK', '₱665.00 64f9d9412f73a8.67018365.jpg', 'approved', 'unread', '2023-09-07 22:08:01', 'comment', 'New Payment Received'),
(69, 1321846266, 'Noelito', '₱260.00 ', 23432, '$2y$10$FYnB2aGkRN4ESM7Ih03ynOUkVxwNPWha2rgGqBFBewqcXW0dBWDlC', '₱260.00 650405d6103cd4.15844691.png', 'approved', 'unread', '2023-09-15 15:20:54', 'comment', 'New Payment Received');

-- --------------------------------------------------------

--
-- Table structure for table `pending_list`
--

CREATE TABLE `pending_list` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `img` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_list`
--

INSERT INTO `pending_list` (`id`, `subject`, `content`, `fname`, `img`, `status`) VALUES
(2, 'noelitorivera@gmail.com', 'sssssss', '', '', 'approved'),
(3, 'noelitorivera@gmail.com', '22', '', '', 'approved'),
(4, '22', '22', '', '', 'approved'),
(5, '22', '22', '', '', 'approved'),
(7, 'wew', 'wew', '', '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES
(3, 'Noelito', '', '', 'excellent', 'Good Job!'),
(7, 'Hazel', '', '', 'excellent', 'Wow'),
(8, 'Hazel', '', '', 'poor', 'Ang panget'),
(9, 'Hezeru', '', '', 'excellent', 'Galing'),
(10, 'wew', 'wew@gmail.com', 'wew', 'excellent', 'wew'),
(11, 'qw', 'wq@gmail.com', 'qw', 'neutral', 'qw'),
(12, '', '', '', '', ''),
(13, '', '', '', '', ''),
(14, 'wwwqq', 'noelitorivera1@gmail.com', 'ww', 'excellent', 'wewqq'),
(15, '', '', '', '', ''),
(16, 'ddd', 'wew@gmail', 'wwew', 'good', 'wew'),
(17, '', '', '', 'good', 'x'),
(18, 'wew', 'we@gmail.com', 'we', 'excellent', 'we'),
(19, '', '', '', 'excellent', 'adad'),
(20, '', '', '', 'excellent', 'dfd');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(24, '1', '1', '2023-04-16 22:07:00', '2023-04-16 22:07:00'),
(26, 'a', 'asda', '2023-04-18 22:20:00', '2023-04-18 22:15:00'),
(28, 'asd', 'asd', '2023-04-20 08:41:00', '2023-04-20 08:41:00'),
(29, 'asd', 'asd', '2023-04-20 08:41:00', '2023-04-20 08:41:00'),
(30, 'ss', 'sss', '2023-04-21 08:48:00', '2023-04-21 08:48:00'),
(31, 'sss', 'sss', '2023-04-22 08:49:00', '2023-04-22 08:49:00'),
(32, 's', 's', '2023-04-23 08:50:00', '2023-04-23 08:50:00'),
(33, 'a', 'a', '2023-04-24 08:52:00', '2023-04-24 08:52:00'),
(34, 'a', 'a', '2023-04-24 08:52:00', '2023-04-24 08:52:00'),
(36, 'asd', 'asd', '2023-04-19 09:50:00', '2023-04-19 09:50:00'),
(40, 'Defense ', 'maraos sanaa', '2023-05-18 13:53:00', '2023-05-19 13:53:00'),
(41, 'pahinga sana', 'plsplss', '2023-05-20 16:38:00', '2023-05-14 16:38:00'),
(42, 'pagod na akooooooo', 'ayako naa :<<<<<<<<<<<<<<<<<<<<<<<<', '2023-05-21 06:17:00', '2023-05-22 06:17:00'),
(43, 'Rest day', 'ako', '2023-05-24 22:27:00', '2023-05-25 22:27:00'),
(44, 'dsasd', 'wew', '2023-05-26 12:57:00', '2023-05-27 12:58:00'),
(45, 'wew', 'wew', '2023-08-24 23:22:00', '2023-08-24 23:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `position`) VALUES
(1, 'Cashier'),
(2, 'Water Tender'),
(6, 'POSITION NI ALBERT'),
(7, 'JEEM'),
(8, 'HR'),
(9, 'ROLEPLAY'),
(10, 's'),
(11, 'sss'),
(12, 'sss'),
(13, 'ss'),
(14, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `username`, `gender`, `role`, `status`, `password`) VALUES
(9, 'Noelito', 'Rivera', 'admin', 'Male', 'Admin', 'Active', 'admin'),
(45, 'akio', 'Lirio', 'akio', 'Male', 'Admin', 'Active', 'akio'),
(47, 'Noelito', 'Rivera', 'qw', 'Male', 'WaterTender', 'Active', 'qw'),
(49, 'joyce', 'abaog', 'joyce', 'Female', 'Admin', 'Active', '12'),
(27, 'Noelito', 'Rivera', 'nowi', 'Male', 'WaterTender', 'Active', 'nowi12'),
(52, 'Noelito', 'wew', '222', 'Male', 'Admin', 'Active', '22');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `unique_id`, `fname`, `lname`, `address`, `email`, `phone`, `password`, `img`, `status`) VALUES
(1, 1321846266, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noelitorivera1@gmail.com', 2147483647, '646d01df29b76040c11b4ec99cd844d4', '1683777014NR.png', 'Active '),
(2, 1462956612, 'Jed', 'Devega', '0523 Pisces St. Palangoy', 'jed@gmail.com', 2147483647, '646d01df29b76040c11b4ec99cd844d4', '1682146245jedpic.jpg', 'Active '),
(4, 1641664194, 'Torres', 'Maria', '0523 Pisces St. Palangoy', 'torres@gmail.com', 0, '25d55ad283aa400af464c76d713c07ad', '1682162261girl.jpg', 'Active'),
(5, 771169668, 'Nics', 'Rivera', '0523 Pisces St. Palangoy', 'nics@gmail.com', 0, '25d55ad283aa400af464c76d713c07ad', '1682186297girl2.jpeg', 'Active'),
(13, 1038880529, 'Nowi', 'Rivera', '0523 Pisces St. Palangoy', 'now@gmail.com', 0, 'c267e5785a55e55f0b84ceed7c26e36b', '1683778863NR.png', 'Active '),
(14, 1079983890, 'Noelito', 'Lirio', '0523 Pisces St. Palangoy', 'n@gmail.com', 0, '25d55ad283aa400af464c76d713c07ad', '1683779436NR.png', 'Active '),
(15, 530994695, 'Akio', 'Rivera', '0523 Pisces St. Palangoy', 'akio@gmail.com', 0, '646d01df29b76040c11b4ec99cd844d4', '1683780871NR.png', 'Active '),
(16, 1652765258, 'Nw', 'Riw', '0523 Pisces St. Palangoy', 'nwwra1@gmail.com', 0, '006d2143154327a64d86a264aea225f3', '1683781043qrdcredit.png', 'Active now'),
(17, 1620533774, 'Noes', 'Rives', '0523 Pisces St. Palangoy', 'noesivera1@gmail.com', 0, '3691308f2a4c2f6983f2880d32e29c84', '1683781120crddd.jpg', 'Active now'),
(18, 350321701, 'Noelw', 'Riveraw', '0523 Pisces St. Palangoy', 'noewera1@gmail.com', 0, 'ad57484016654da87125db86f4227ea3', '1683781862cuer.png', 'Active now'),
(19, 1177056806, 'a', 'Rivera', '0523 Pisces St. Palangoy', 'ara1@gmail.com', 0, '0cc175b9c0f1b6a831c399e269772661', '1683781901crddd.jpg', 'Active now'),
(20, 1389385034, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noewwra1@gmail.com', 0, '3847820138564525205299f1f444c5ec', '1683979552dfd_pwbs - Page 2.png', 'Active now'),
(21, 1362299119, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', '22@gmail.com', 0, '3847820138564525205299f1f444c5ec', '1683999956dfd_pwbs (2).png', 'Active now'),
(22, 678721067, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noee1@gmail.com', 0, 'c20ad4d76fe97759aa27a0c99bff6710', '1684000187dfd_pwbs (4).png', 'Active '),
(23, 1473741965, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', '331@gmail.com', 0, 'c20ad4d76fe97759aa27a0c99bff6710', '1684000193dfd_pwbs (4).png', 'Active '),
(24, 124890778, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', '567561@gmail.com', 0, 'c20ad4d76fe97759aa27a0c99bff6710', '1684000206dfd_pwbs (4).png', 'Active '),
(25, 224598615, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'n2121@gmail.com', 0, '115f89503138416a242f40fb7d7f338e', '1684000253dfd_pwbs (6).png', 'Active '),
(26, 1526652187, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', '213a1@gmail.com', 0, '979d472a84804b9f647bc185a877a8b5', '1684000272dfd_pwbs (4).png', 'Active '),
(33, 325839194, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nsfdsd1@gmail.com', 0, 'fc2baa1a20b4d5190b122b383d7449fd', '1684000891dfd_pwbs - Page 2.png', 'Active '),
(34, 591433143, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'zcxcxzxcera1@gmail.com', 0, 'f161de9cf2afcc8ed944eef444d681d7', '1684001565dfd_pwbs__2_-removebg-preview.png', 'Active '),
(35, 349635743, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'wqe@qgmail.com', 0, '339cf7e53c89ce867be208fa5af2c975', '1684001639dfd_pwbs (4).png', 'Active '),
(36, 985547716, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'sdsadra1@gmail.com', 0, '7815696ecbf1c96e6894b779456d330e', '1684001705dfd_pwbs (3).png', 'Active '),
(37, 1545598899, 'asdsa', 'asd', 'sad', 'nafsds3ra1@gmail.com', 0, '3847820138564525205299f1f444c5ec', '1684001736dfd_pwbs (4).png', 'Active '),
(38, 1453536135, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'sdsda1@gmail.com', 0, '4b8a01067f3f5375a1c0be6ae75d7850', '1684001901dfd_pwbs - Page 2 (1).png', 'Active '),
(39, 1405082205, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noelitoriasvdvaa1@gmail.com', 0, '4124bc0a9335c27f086f24ba207a4912', '1684001947dfd_pwbs__2_-removebg-preview.png', 'Active '),
(40, 1167948927, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nonjnjj1@gmail.com', 0, 'dc468c70fb574ebd07287b38d0d0676d', '1684002172dfd_pwbs (5).png', 'Active '),
(41, 1343441253, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noasdasdelitorivera1@gmail.com', 0, 'adbf5a778175ee757c34d0eba4e932bc', '1684002319dfd_pwbs (3).png', 'Active '),
(42, 1669161758, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'asd1@gmail.com', 0, '7815696ecbf1c96e6894b779456d330e', '1684002363dfd_pwbs (3).png', 'Active '),
(43, 1439280686, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nsddsaoaa1@gmail.com', 0, '7815696ecbf1c96e6894b779456d330e', '1684002394dfd_pwbs (3).png', 'Active '),
(44, 587143610, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'dsadssnoeaa1@gmail.com', 0, '7815696ecbf1c96e6894b779456d330e', '1684002451dfd_pwbs__2_-removebg-preview.png', 'Active '),
(45, 274813735, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nqwe@gmail.com', 0, '149815eb972b3c370dee3b89d645ae14', '1684008888346096100_1218045818851677_3762557347980232098_n.jpg', 'Active '),
(46, 285281361, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nsfsdfdoelitorivera1@gmail.com', 0, 'f31a81e91afdcf0b84dfee82ec2fb196', '1684010567dfd_pwbs - Page 2 (1).png', 'Active '),
(47, 1575846438, 'Noelitoe', 'Rivera', '0523 Pisces St. Palangoy', 'noefas3slaricvera1@gmail.com', 0, '7815696ecbf1c96e6894b779456d330e', '1684010747dfd_pwbs (5).png', 'Active '),
(48, 234759140, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noasdasa1@gmail.com', 0, '5f039b4ef0058a1d652f13d612375a5b', '1684010905dfd_pwbs__2_-removebg-preview.png', 'Active '),
(49, 1183970144, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noeqwea1@gmail.com', 0, '07a9f21fdc478d128198a612da31bf0d', '1684010964dfd_pwbs - Page 2 (1).png', 'Active '),
(50, 810941299, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nwerwrera1@gmail.com', 0, 'e130e5e618f15cee7a519d8b7b8306a0', '1684011031dfd_pwbs - Page 2.png', 'Active '),
(51, 1484083297, 'asdas', 'Rivera', 'asdsa', 'asddsa2era1@gmail.com', 0, '1f73402c644002a7ea3c9532e8ba4139', '1684011076dfd_pwbs - Page 2.png', 'Active '),
(52, 558996811, 'awd', 'Rivera', '0523 Pisces St. Palangoy', 'noeld3ita3vera1@gmail.com', 0, 'f04ee461abcdcd63b91215f836d877d1', '1684011199dfd_pwbs (3).png', 'Active '),
(53, 641142371, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nasddsaria1@gmail.com', 0, '0aa1ea9a5a04b78d4581dd6d17742627', '1684011245dfd_pwbs - Page 2 (1).png', 'Active '),
(54, 712250945, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noweweelqa1@gmail.com', 0, '3ee1ef6a07301b706f8e5269a58f5072', '1684011303dfd_pwbs (4).png', 'Active '),
(55, 1258113596, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noelweqrivera1@gmail.com', 0, 'efe6398127928f1b2e9ef3207fb82663', '1684011338dfd_pwbs (3).png', 'Active '),
(56, 705829574, 'Noelito', 'Rivera', '0523 asdsadces St. Palangoy', 'noelitasdvera1@gmail.com', 0, '49f0bad299687c62334182178bfd75d8', '1684011463dfd_pwbs (4).png', 'Active '),
(57, 1127568077, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'awea1@gmail.com', 0, 'e3f671b245da75ab8d77aae0fa27dc1f', '1684011501dfd_pwbs (4).png', 'Active '),
(58, 430796411, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'asdsarivera1@gmail.com', 0, '3f76818f507fe7eb6422bd0703c64c88', '1684011543dfd_pwbs (4).png', 'Active '),
(59, 1514706560, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noeddsaslita1@gmail.com', 0, 'be83ab3ecd0db773eb2dc1b0a17836a1', '1684011617dfd_pwbs - Page 2.png', 'Active '),
(60, 251670085, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'nsdoelitoa1@gmail.com', 0, '3f76818f507fe7eb6422bd0703c64c88', '1684011661dfd_pwbs__2_-removebg-preview.png', 'Active '),
(61, 804203109, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'n23321@gmail.com', 0, '5f6eb0809f31e88067e51bfd2bb0c50e', '1684048341dfd_pwbs - Page 2.png', 'Active '),
(62, 922154223, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noeadsdara1@gmail.com', 0, '2afd950ed6671800055888b972628120', '1684048365dfd_pwbs__2_-removebg-preview.png', 'Active '),
(63, 801009485, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'noelitorasdsaddsa1@gmail.com', 0, '3f76818f507fe7eb6422bd0703c64c88', '1684049761dfd_pwbs__2_-removebg-preview.png', 'Active '),
(64, 342756888, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', '234324era1@gmail.com', 2147483647, '1cdbc566ab18141dbf2586d9707cdfdc', '1684075654dfd_pwbs (6).png', 'Active '),
(65, 1468828893, 'Noelito', 'Rivera', '0523 Pisces St. Palangoy', 'awwaa1@gmail.com', 232, '0db23143d4a97ef87410700c73775a97', '1684212137dfd_pwbs (5).png', 'Active '),
(66, 1273114473, 'talaaga', 'Rivera', '0523 Pisces St. Palangoy', '333@gmail.com', 234234, 'efe6398127928f1b2e9ef3207fb82663', '1692807456364404467_306387595257920_193480261460293384_n.jpg', 'Active ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_list`
--
ALTER TABLE `pending_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pending_list`
--
ALTER TABLE `pending_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
