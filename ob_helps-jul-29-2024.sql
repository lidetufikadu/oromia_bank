-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ob_helps`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` enum('Addis Ababa','South West Ethiopia Peoples','Tigray','Oromia','SNNP','Somali','Gambella','Harari',' Benishangul-Gumuz','Sidama','Dire Dawa') NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `closed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `phone`, `email`, `region`, `message`, `status`, `datetime`, `closed_at`) VALUES
(26, 'lidetu', 'fikadu', '+251917723939', 'shevigbabayo@gmail.com', 'South West Ethiopia Peoples', 'how to open digital banking system?', 'closed', '2024-07-24 17:52:50', '2024-07-28 15:50:47'),
(27, 'abd', 'ali', '0927086860', 'helpdesk@oib.com', 'Gambella', 'how to open a bank account?', 'closed', '2024-07-28 17:45:34', '2024-07-28 16:04:05'),
(28, 'abebe', 'basha', '0987654534', 'shevigbabayo@gmail.com', 'SNNP', 'how to use a digital banking system?', 'Pending', '2024-07-28 17:48:07', NULL),
(29, 'gemeda', 'guta', '0923415647', 'gemedeguta@gmail.com', 'Oromia', 'how to use ATM machine?', 'open', '2024-07-28 17:56:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `usertype`) VALUES
(12, 'lidetu', 'fikadu', 'admin', '$2y$10$dPUcn1QfCHxDpHve6OTjwuJlNqfXq3hs.8niFt3SH9GHFyjHEb2KC', 'admin'),
(16, 'abc', 'abc', 'user', '$2y$10$Ie72nc8hq0pW0vZm/B/ApuEtgkOfNlb5PFAN7jmCPMD5WjF72Mw3O', 'user'),
(18, 'ab', 'ab', 'ac', '$2y$10$lmod1jwtuZLobsVscdO/XO5nYUZoyw4Ml/.GDKJX3pzrjm/6zfue.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
