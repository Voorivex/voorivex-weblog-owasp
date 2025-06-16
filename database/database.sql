-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 15, 2025 at 03:41 PM
-- Server version: 9.1.0
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voorivex_weblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'hacking', 'posts about hacking'),
(2, 'general', 'general posts');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `publication_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `author_id`, `category_id`, `publication_date`) VALUES
(1, 'Hacker', 'Yallah Haj Yashar', 1, 1, '2025-02-06 12:35:07'),
(2, 'Yallah ??', 'Yallah Haj Yashar', 1, 1, '2025-02-06 12:35:30'),
(3, 'Hacker', 'Pourya#2025-Feb-6', 1, 1, '2025-02-06 12:36:28'),
(4, 'Pourya#2025-Feb-6', '', 1, 1, '2025-02-06 12:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` varchar(2000) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `first_name`, `last_name`, `bio`, `password`, `token`, `registration_date`) VALUES
(1, 'voorivex', 'y.shahinzadeh@gmail.com', 'Yashar', 'Shahinzadeh', 'Yallah, Haj yashar hoodi haye ma chid shod 😔 #owasp-zero-b', '123qwe!@#QWE', '920dba9f387a7505649c66560eb3833d', '2023-09-16 14:19:59'),
(2, 'mamad', 'mamad@gmail.com', NULL, NULL, NULL, 'mamad_secure', 'null', '2023-09-16 15:15:48'),
(3, 'test1', 'test@test.com', NULL, NULL, NULL, 'test', NULL, '2023-09-24 10:07:53'),
(11, 'test2', 'test2@gmail.com', NULL, NULL, NULL, 'test2', NULL, '2023-09-24 10:37:26'),
(12, 'bTKt', '', NULL, NULL, NULL, 'Gsdk', NULL, '2023-09-25 18:59:06'),
(1449, 'moein', 'moeinefn@gmail.com', NULL, NULL, NULL, 'nosafe', 'b268d93183a51579632d540bfe2ff5d7', '2023-09-27 12:57:26'),
(1452, 'a', 'b', NULL, NULL, NULL, '0', NULL, '2023-10-01 16:19:05'),
(1453, 'mamad12321', 'mamad12321@gmail.com', NULL, NULL, NULL, 'mamad12321', NULL, '2023-10-19 13:31:33'),
(1454, 'sos', 'sos@sos.com', '\">', '', '\">', 'sos', NULL, '2023-10-27 10:24:55'),
(1455, 'sajjad.null', 'asdfsadf@gmail.com', NULL, NULL, NULL, '123qwe', NULL, '2025-02-06 11:36:29'),
(1456, 'VAHID', 'gerdwiesler1@gmail.com', NULL, NULL, NULL, '123456', NULL, '2025-02-06 11:36:41'),
(1457, 'hacker', 'hacker@gmail.com', NULL, NULL, NULL, '123456', NULL, '2025-02-06 11:42:14'),
(1458, '\" order by 1000//', 'asda@gmail.com', NULL, NULL, NULL, 'safda', NULL, '2025-02-06 12:31:35'),
(1459, 'uname', 'moz@gmail.com', NULL, NULL, NULL, 'wename', NULL, '2025-02-06 12:35:33'),
(1461, 'yasharisthebest', 'ys@gmail.com', NULL, NULL, NULL, 'yowasp11403', NULL, '2025-02-06 12:42:30'),
(1462, 'mamadhacker', 'mamadhacker@gmail.com', NULL, NULL, NULL, '123qwe!@#QWE', NULL, '2025-02-06 12:43:04'),
(1463, 'hoody', '1231@gmail.com', NULL, NULL, NULL, 'asdfasfda', NULL, '2025-02-06 12:46:35'),
(1464, 'hamoon0a', 'crypto3@gmail.com', NULL, NULL, NULL, 'fuckinghell', NULL, '2025-02-06 13:03:35'),
(1465, 'sajjad_nul', 'sajjad@hoodi.com', NULL, NULL, NULL, 'هوددددددییییی', NULL, '2025-02-06 13:04:28'),
(1466, 'test', 'example@gmail.com', NULL, NULL, NULL, '12345', NULL, '2025-02-06 13:41:39'),
(1467, 'I want a hoodie.', 'sajad@gmail.com', NULL, NULL, NULL, 'sajad', NULL, '2025-02-06 13:44:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1468;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
