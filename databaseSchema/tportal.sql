-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 07:37 PM
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
-- Database: `tportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mark` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `subject`, `mark`, `timestamp`) VALUES
(1, 'Nethish', 'Math', 551, '2024-07-24 17:34:11'),
(2, 'Nishant Nirala', 'Math', 41, '2024-07-24 16:30:24'),
(3, 'Vikash', 'Math', 81, '2024-07-24 15:07:01'),
(4, 'Amrit', 'Math', 732, '2024-07-24 17:34:16'),
(5, 'Sonu', 'Math', 95, '2024-07-24 14:40:19'),
(6, 'sda', 'Math', 0, '2024-07-24 17:23:49'),
(11, 'Test2', 'Math', 23, '2024-07-24 17:24:08'),
(12, 'Test 32', 'Math', 231, '2024-07-24 17:34:20'),
(13, 'Test 1', 'Math', 23, '2024-07-24 17:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'nishant@123', '1234', '2024-07-24 11:31:29'),
(2, 'nishant@000', '$2y$10$1OnRi6CECN3dF.VlfaFIaOKOcVenE5I.so9BboMQk/4GJyVwuWfya', '2024-07-24 11:41:31'),
(3, 'nishant123', '$2y$10$PZhzf71qQOfkHNDJNY.E2OkcZnb94DrdrnqbhTZV19D9KLGA5Op/q', '2024-07-24 11:50:21'),
(4, 'nishant111', '$2y$10$iTVynqtqySV3aqL21QaMh.S4HZFquNRBiO7hU5NSvItVZDjMTIbQy', '2024-07-24 11:52:50'),
(5, 'nishant222', '$2y$10$bb5uM1ELt7Y299OJBl.APuiLx97LuR3TpSorImu1B0cZ0ZJFZ3OrG', '2024-07-24 12:01:13'),
(6, 'nishant@122', '$2y$10$pwHSJ8sq5kw9q1BjePSid.OoCzX/0t7wwEyemhJzQsDIm1vyQMiia', '2024-07-24 12:03:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
