-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:01 PM
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
-- Database: `gik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fathername` varchar(40) NOT NULL,
  `age` int(14) NOT NULL,
  `qulification` varchar(30) NOT NULL,
  `district` int(30) NOT NULL,
  `village` varchar(30) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `userimage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `caste` varchar(250) NOT NULL,
  `paddress` text NOT NULL,
  `languages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fathername`, `age`, `qulification`, `district`, `village`, `useremail`, `userpassword`, `userimage`, `created_at`, `updated_at`, `gender`, `phone`, `caste`, `paddress`, `languages`) VALUES
(12, 'Demo User1 User112', '', 0, '', 0, '', 'userdemo1aa@example.com', '$2y$10$ULdE0FKPOEWFqQrxLu.uMubN27w7YL1VR5/5ARs4SWwBWU8DPGzE2', '', '2024-05-01 07:16:38', '2024-05-01 07:16:38', 'male', '03488092160', 'genral', 'UserUserUserUserUserUserUser', '[\"urdu\",\"english\"]'),
(14, 'new  user', '', 0, '', 0, '', 'usernew@example.com', '$2y$10$YT36.9wELHeKtqT1FCUYhub27We7XxFt2kXhxNsNjiHHtYAPb2.lS', '', '2024-05-01 07:20:49', '2024-05-01 07:20:49', 'male', '03488092160', 'genral', 'UserUserUserUserUserUserUser', '[\"urdu\",\"english\",\"arabic\"]'),
(16, 'System Adminstrator', '', 0, '', 0, '', 'admin@example.com', '$2y$10$/oarADYTBsEwfpPqmbBF.uswxt96.QBpMsvNY50JNCZ9ZFttrvhAK', 'uploads/66331441138fb0.20948746.png', '2024-05-02 04:19:13', '2024-05-02 04:19:13', 'male', '12901231', 'obc', 'AdminstratorAdminstratorAdminstratorAdminstratorAdminstrator', '[\"urdu\",\"english\",\"arabic\"]'),
(28, 'sumaira batool', '', 0, '', 0, '', 'sumaira@gmail.com', '$2y$10$6Sa9Gpo.qSykK7Lh0N/QPOlT.y26.c2E4JdC0BfWMDLPQettkUq96', '', '2024-06-12 17:57:13', '2024-06-12 17:57:13', '', '', '', '', ''),
(29, 'ali', '', 0, '', 0, '', 'ali@gmail.com', '$2y$10$CUyhb1ztoFRTsU2eD3HJHOCYKdslb2Q7Q3G9BmlszgdrI1WAG9Eb6', '', '2024-06-12 17:58:25', '2024-06-12 17:58:25', '', '', '', '', ''),
(30, 'ali ali', 'shair ali', 26, '', 0, 'olding', '', '$2y$10$/O5gLgGULyJbCOERw2xY2.sQ7yxGlCBn7TE2.1x9Qki2reDiGoD6e', '', '2024-06-12 18:00:10', '2024-06-12 18:00:10', 'female', '03555256782', 'sc', 'slm juuu', '[\"urdu\",\"english\",\"arabic\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
