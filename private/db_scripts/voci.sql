-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2023 at 06:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(16) NOT NULL,
  `deck_id` int(8) NOT NULL,
  `front` varchar(1024) NOT NULL,
  `back` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `deck_id`, `front`, `back`) VALUES
(13, 11111115, 'What is the time complexity of a merge sort?', 'O(n log n)'),
(18, 11111124, 'What is an acceptable time complexity for a sample size of n = 20', '2^n'),
(22, 11111124, 'What is an acceptable time complexity for a sample size of n = 500', 'n^3'),
(23, 11111124, 'What is an acceptable time complexity for a sample size of n = 5000', 'n^2'),
(24, 11111124, 'What is an acceptable time complexity for a sample size of n = 1,000,000 (10^6)', 'n log n'),
(25, 11111115, 'What is an acceptable time complexity for n = 500', 'n^3'),
(26, 11111115, 'What is an acceptable time complexity for n = 5000', 'n^2'),
(27, 11111115, 'What is an acceptable time complexity for n = 20', '2^n'),
(30, 11111115, 'What is an acceptable time complexity for n = 10^6', 'n log n or n'),
(45, 11111164, 'What is the time complexity of MergeSort?', 'n log n'),
(46, 11111164, 'If I have an n of 5000, what is a suitable time complexity?', 'n^2 or faster'),
(47, 11111164, 'front', 'back'),
(55, 11111169, 'What is the most commonly used web backend used today?', 'PHP'),
(56, 11111169, 'What does http stand for?', 'Hyper-text transfer protocol'),
(57, 11111169, 'How does one control the \"tab interface\" of html?', 'tabindex = \"1\"');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE `decks` (
  `user_id` int(8) NOT NULL,
  `deck_id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`user_id`, `deck_id`, `name`) VALUES
(12345678, 11111164, 'Algorithms'),
(12345678, 11111168, 'My deck'),
(12345678, 11111169, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(8) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`) VALUES
(12345678, 'Jon', 'Steele', 'mrjonsteele@gmail.com', '123'),
(12345701, 'Jon', 's', 'jonwhsteele@gmail.com', 'password'),
(12345702, 'JJ', 's', 'myemail@email', 'asdf'),
(12345703, 'Callum', 'Brezden', 'Callum@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `decks`
--
ALTER TABLE `decks`
  ADD PRIMARY KEY (`deck_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `decks`
--
ALTER TABLE `decks`
  MODIFY `deck_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11111170;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345704;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
