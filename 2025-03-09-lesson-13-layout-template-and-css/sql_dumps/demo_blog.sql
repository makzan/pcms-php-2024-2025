-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 09, 2025 at 02:59 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published_at` date NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `content`, `published_at`, `post_id`) VALUES
(1, 'Thomas', 'Test comment', '2025-02-09', 2),
(2, 'Test Test Author', 'Test Content Here', '2025-02-09', 2),
(3, 'adfasdfasdf', 'asdfadsfdf', '2025-02-09', 2),
(4, 'adfasdfasdf', 'asdfadsfdf', '2025-02-09', 2),
(5, 'Thomas', 'Test posting comment', '2025-02-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published_at` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Test Title', 'Test Content\r\n\r\nLine 2\r\n\r\nLine 3 of content here.', '2025-01-12', '2025-01-12', '2025-01-12'),
(2, 'Post 2 here on Saturday', 'this is post 2\r\n\r\npost 2 line 2 here.', '2025-01-11', '2025-01-11', '2025-01-11'),
(3, 'Future post for tomorrow', 'This is post 3\r\n\r\nPost 3\r\nPost 3\r\nPost 3\r\nPost 3', '2025-01-13', '2025-01-13', '2025-01-13'),
(4, 'A new lesson on Feb 9th', '                NEW CONTENT HERE            ', '2025-02-09', '2025-02-09', '2025-02-09'),
(6, '', '', '2025-02-23', '2025-02-23', '2025-02-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
