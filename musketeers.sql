-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 01:03 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musketeers`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ebook` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `author`, `title`, `ebook`, `category`) VALUES
(1, 'images/astro.jpg', 'Neil deGrasse Tyson', 'Astrophysics for People in a Hurry', 'astro.epub', 'non-fiction'),
(2, 'images/cabin.jpg', 'Ruth Ware', 'The Woman in Cabin 10', 'cabin.epub', 'fiction'),
(3, 'images/camino.jpg', 'John Grisham', 'Camino Island', 'camino.epub', 'fiction'),
(4, 'images/franken.jpg', 'Al Franken', 'Al Franken, Giant of the Senate', 'franken.epub', 'non-fiction'),
(5, 'images/hidden.jpg', 'Margot Lee Shetterly', 'Hidden Figures', 'hidden.epub', 'non-fiction'),
(6, 'images/identical.jpg', 'Elin Hilderbrand', 'The Identicals', 'identical.epub', 'fiction'),
(7, 'images/intowater.jpg', 'Paula Hawkins', 'Into the Water', 'intowater.epub', 'fiction'),
(8, 'images/lilac.jpg', 'Martha Hall Kelly', 'Lilac Girls', 'lilac.epub', 'fiction'),
(9, 'images/zookeeper.jpg', 'Diane Ackerman', 'The Zookeeper\'s Wife', 'zookeeper.epub', 'non-fiction');

-- --------------------------------------------------------

--
-- Table structure for table `saved_books`
--

CREATE TABLE `saved_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_books`
--

INSERT INTO `saved_books` (`id`, `user_id`, `book_id`) VALUES
(7, 37, 1),
(10, 37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'regular',
  `ebook` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `username`, `password`, `email`, `role`, `ebook`, `date`, `status`) VALUES
(36, 'Joan', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'jan@gmail.com', 'admin', 'astro.epub', '2017-07-01 08:18:26', 'APPROVED'),
(37, 'Shane', 'shane', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'cabin.epub', '2017-07-01 08:30:44', 'APPROVED'),
(38, 'Emman', 'emman', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'camino.epub', '2017-07-01 08:39:18', 'APPROVED'),
(39, 'Ruel', 'ruel', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'franken.epub', '2017-07-01 08:41:45', 'PENDING'),
(40, 'Darryl', 'darryl', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'hidden.epub', '2017-07-01 08:43:24', 'PENDING'),
(41, 'Kevin', 'kevin', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'identical.epub', '2017-07-01 08:45:49', 'PENDING'),
(42, 'Mavs', 'mavs', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'intowater.epub', '2017-07-01 08:47:48', 'PENDING'),
(43, 'Ray', 'ray', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'lilac.epub', '2017-07-01 08:49:10', 'PENDING'),
(46, 'Nico', 'nico', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'jtgetigan@gmail.com', 'regular', 'zookeeper.epub', '2017-07-01 08:58:27', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`id`, `user_id`, `book_id`) VALUES
(1, 36, 1),
(2, 37, 2),
(3, 38, 3),
(4, 39, 4),
(5, 40, 5),
(6, 41, 6),
(7, 42, 7),
(8, 43, 8),
(11, 46, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_books`
--
ALTER TABLE `saved_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `saved_books`
--
ALTER TABLE `saved_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_books`
--
ALTER TABLE `saved_books`
  ADD CONSTRAINT `saved_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
