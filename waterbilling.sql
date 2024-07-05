-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 02:22 PM
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
  `balance` int(11) NOT NULL DEFAULT 0,
  `bill` int(50) NOT NULL,
  `prepared_by` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `due date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unpaid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `owners_id`, `prev`, `pres`, `price`, `balance`, `bill`, `prepared_by`, `date`, `due date`, `status`) VALUES
(239, 117, '0', '1', '125', 0, 0, 'Noelito Rivera', '07/05/24 07:50:02', '', 'Paid'),
(240, 117, '1', '2', '125', 125, 0, 'Noelito Rivera', '07/05/24 07:51:14', '', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL DEFAULT 'unread',
  `date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `source_id`, `type`, `message`, `status`, `date`) VALUES
(222, 117, 0, 'bill', 'New bill has been issued', 'unread', '07/05/24 07:50:02'),
(223, 117, 0, 'bill', 'New bill has been issued', 'read', '07/05/24 07:51:14'),
(224, 117, 70, 'payment', 'Your payment has been Approved', 'unread', '07/05/2024 07:56'),
(225, 117, 240, 'bill', 'Your bill has been paid', 'unread', '07/05/2024 07:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `ref_number` varchar(45) NOT NULL,
  `user_id` int(50) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `proof_of_payment` varchar(100) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `type` varchar(45) NOT NULL,
  `payment_for` varchar(45) NOT NULL DEFAULT 'bill',
  `date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `ref_number`, `user_id`, `bill_id`, `proof_of_payment`, `paid_amount`, `status`, `type`, `payment_for`, `date`) VALUES
(70, 'PWBS69159338785', 117, 240, 'PAYMENT-IMG6687de7edd7b3.png', 250, 'Approved', 'online', 'bill', '07/05/2024 07:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `username`, `gender`, `role`, `status`, `password`) VALUES
(9, 'Noelito', 'Rivera1', 'admin', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(45, 'akio', 'Lirio', 'akio', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(47, 'Noelito1', 'Rivera', 'qw', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(49, 'joyce', 'abaog', 'joyce', 'Female', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(27, 'Noelito', 'Rivera', 'nowi', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(52, 'Noelito', 'wew', '222', 'Male', 'Admin', 'InActive', 'a3dcb4d229de6fde0db5686dee47145d'),
(83, 'tetete', 'teet', 'etet', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(84, 'aaaa1', 'aaa2', 'aa2323', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(85, 'ASDAS', 'SDASD', 'DASDA', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(86, 'adad123123', 'asdasdasd', 'ASDASD', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(82, 'asdas', 'dasd', 'asdasd', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(81, 'stset', 'setset', 'setset', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(80, 'demo', 'testdemo', 'demo123', 'Male', 'Admin', 'Active', '202cb962ac59075b964b07152d234b70'),
(87, '213123', '213123', '123123', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(88, 'tesstestet', 'setsetset', 'setsetsetsetset', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(89, 'adaeqw312', '123', 'asdae', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(90, 'asdasd1', 'asdasd', 'asdasd', 'Male', 'Admin', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(91, 'test', 'tsetsetset', 'demo2', 'Male', 'Staff', 'InActive', '202cb962ac59075b964b07152d234b70'),
(92, 'testestte', 'stsetset', 'demo3', 'Male', 'WaterTender', 'InActive', 'c4ca4238a0b923820dcc509a6f75849b'),
(93, 'asdasdasd', 'asdasd', 'asdasd', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(94, 'asdasdas', 'dasdasd', 'asdasdasd', 'Male', 'Admin', 'InActive', '6512bd43d9caa6e02c990b0a82652dca'),
(95, 'demo1', 'demo1', 'demo1', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70'),
(96, 'admin', 'admin', 'admin123', 'Male', 'Admin', 'Active', '202cb962ac59075b964b07152d234b70'),
(97, 'admin', 'demo', 'demo12345', 'Male', 'WaterTender', 'InActive', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(98, 'Noelito ', 'Rivera', 'noelitorivera1@gmail.com', 'Male', 'Admin', 'InActive', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `requirements` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default_profile.png',
  `status` varchar(255) NOT NULL DEFAULT 'UnActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `unique_id`, `fname`, `lname`, `address`, `email`, `phone`, `requirements`, `password`, `img`, `status`) VALUES
(117, 42937979, 'Noelito', 'Rivera', 'Household-0523 Pisces St. Palangoy', 'noelitorivera1@gmail.com', '9159124940', 'TinNumber,ApplicationForm,BinangonanResident,ShareCapital,MembershipFee', '202cb962ac59075b964b07152d234b70', 'CONSUMER-IMG6687ddda29872.JPG', 'InActive');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
