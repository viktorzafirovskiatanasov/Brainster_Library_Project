-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 10:55 PM
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
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surrname` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `is_deleted` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surrname`, `biography`, `is_deleted`) VALUES
(7, 'Viktorr', 'Zafirovski Atanasov', 'neznam shto da kazam', ''),
(8, 'John', 'Doe', 'A passionate writer', ''),
(9, 'Alice', 'Smith', 'Explorer of imaginary worlds', 'true'),
(10, 'Bob', 'Johnson', 'Adventurous soul with a pen', 'true'),
(11, 'Eva', 'Williams', 'A storyteller from another dimension', 'true'),
(12, 'Michael', 'Brown', 'Dreamer and wordsmith', 'true'),
(13, 'Sophia', 'Miller', 'Master of fictional realms', 'false'),
(14, 'Daniel', 'Davis', 'Innovative wordsmith', 'false'),
(15, 'Olivia', 'Jones', 'Enthusiastic creator of tales', 'false'),
(16, 'William', 'Moore', 'Weaver of magical stories', 'false'),
(17, 'Emma', 'Taylor', 'Journey through the written word', 'false'),
(18, 'Liam', 'Anderson', 'A builder of fictional worlds', 'false'),
(19, 'Ava', 'Thomas', 'Passionate about storytelling', 'false'),
(20, 'Noah', 'Clark', 'Craftsman of narratives', 'false'),
(21, 'Isabella', 'White', 'Fascinated by the art of storytelling', 'false'),
(22, 'James', 'Harris', 'Architect of fictional landscapes', 'false'),
(23, 'Mia', 'Martin', 'Devoted to the craft of writing', 'false'),
(24, 'Benjamin', 'Wilson', 'Navigator through the sea of words', 'false'),
(25, 'Amelia', 'Evans', 'Dedicated to the art of storytelling', 'false'),
(26, 'Logan', 'Garcia', 'Discoverer of untold tales', 'false'),
(27, 'Evelyn', 'Martinez', 'Embarks on literary adventures', 'false'),
(28, 'JonJon', 'Hopkins', 'A wonderfull author ', 'false'),
(29, 'Vaaaaaa', 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', 'false'),
(30, 'aaaaaaaaaaaaaaaaaa', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrr', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publishing_year` int(11) NOT NULL,
  `pages_number` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `category_id`, `publishing_year`, `pages_number`, `image_url`) VALUES
(5, 'Avatar', 7, 1, 1999, 3500, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(6, 'Harry Potter', 7, 4, 1999, 350, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(247, 'Book 1', 7, 1, 2000, 300, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(248, 'Book 0', 8, 2, 2001, 350, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(249, 'Book 3', 9, 3, 2002, 400, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(251, 'Book 5', 11, 17, 2004, 500, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(253, 'Book 7', 13, 7, 2006, 600, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(254, 'Book 8', 14, 8, 2007, 650, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(255, 'Book 9', 15, 9, 2008, 700, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(256, 'Book 10', 16, 6, 2009, 750, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(257, 'Book 11', 17, 11, 2010, 800, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(258, 'Book 12', 18, 12, 2011, 850, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(259, 'Book 13', 19, 13, 2012, 900, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(260, 'Book 14', 20, 14, 2013, 950, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(261, 'Book 15', 21, 15, 2014, 1000, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(262, 'Book 16', 22, 16, 2015, 1050, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(263, 'Book 17', 23, 17, 2016, 1100, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(264, 'Book 18', 24, 18, 2017, 1150, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(265, 'Book 19', 25, 19, 2018, 1200, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(266, 'Book 20', 26, 20, 2019, 1250, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(267, 'Book 21', 7, 1, 2020, 1300, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(268, 'Book 22', 8, 2, 2021, 1350, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(269, 'Book 23', 9, 3, 2022, 1400, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(270, 'Book 24', 10, 4, 2023, 1450, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(271, 'Book 25', 11, 11, 2024, 1500, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(272, 'Book 26', 12, 6, 2025, 1550, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(273, 'Book 27', 13, 7, 2026, 1600, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(274, 'Book 28', 14, 8, 2027, 1650, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(275, 'Book 29', 15, 9, 2028, 1700, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(277, 'Book 31', 17, 11, 2030, 1800, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(278, 'Book 32', 18, 12, 2031, 1850, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(279, 'Book 33', 19, 13, 2032, 1900, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(280, 'Book 34', 20, 14, 2033, 1950, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(281, 'Book 35', 21, 15, 2034, 2000, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(282, 'Book 36', 22, 16, 2035, 2050, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(283, 'Book 37', 23, 17, 2036, 2100, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(284, 'Book 38', 24, 18, 2037, 2150, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(285, 'Book 39', 25, 19, 2038, 2200, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(286, 'Book 40', 26, 20, 2039, 2250, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(287, 'Book 41', 7, 1, 2040, 2300, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(288, 'Book 42', 8, 2, 2041, 2350, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(289, 'Book 43', 9, 3, 2042, 2400, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(290, 'Book 44', 10, 4, 2043, 2450, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(291, 'Book 45', 11, 9, 2044, 2500, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(292, 'Book 46', 12, 6, 2045, 2550, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(293, 'Book 47', 13, 7, 2046, 2600, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(294, 'Book 48', 14, 8, 2047, 2650, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(295, 'Book 49', 15, 9, 2048, 2700, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(296, 'Book 50', 16, 1, 2049, 2750, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(297, 'Book 51', 17, 11, 2050, 2800, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(298, 'Book 52', 18, 12, 2051, 2850, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(299, 'Book 53', 19, 13, 2052, 2900, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(300, 'Book 54', 20, 14, 2053, 2950, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(301, 'Book 55', 21, 15, 2054, 3000, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(302, 'Book 56', 22, 16, 2055, 3050, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(303, 'Book 57', 23, 17, 2056, 3100, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(304, 'Book 58', 24, 18, 2057, 3150, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(305, 'Book 59', 25, 19, 2058, 3200, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),
(306, 'Book 60', 26, 20, 2059, 3250, 'https://www.inspireuplift.com/resizer/?image=https://cdn.inspireuplift.com/uploads/images/seller_products/1680591887_MR-latoria-terrill-cad040423004-44202314433.jpeg&width=600&height=800&quality=90&format=auto&fit=pad'),


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_deleted` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `is_deleted`) VALUES
(1, 'Fantasy', 'true'),
(2, 'Adventure', 'true'),
(3, 'Action', 'true'),
(4, 'Romancee', 'true'),
(6, 'Sci-Fi', ''),
(7, 'Romance', ''),
(8, 'Mystery', 'false'),
(9, 'Thriller', 'false'),
(11, 'Historical', 'false'),
(12, 'Comedy', 'false'),
(13, 'Drama', 'false'),
(14, 'Science', 'false'),
(15, 'Biography', 'false'),
(16, 'Crime', 'false'),
(17, 'Fantasy Adventure', 'false'),
(18, 'Romantic Comedy', 'false'),
(19, 'Mystery Thriller', 'false'),
(20, 'Non-fiction', 'false'),
(21, 'aaaaaaaaaaaaaaaaaaaaa', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `approval_status` enum('PENDING','APPROVED','DENIED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `book_id`, `user_id`, `content`, `approval_status`) VALUES
(21, 248, 1, 'mozebi ne sum siguren', 'APPROVED'),
(22, 290, 1, 'neznam', 'APPROVED'),
(23, 247, 1, 'aaaaaaaaaaaa', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `book_id`, `note`) VALUES
(1, 12, 5, 'neznam shto da kazam'),
(12, 12, 287, 'Prviot note na marija'),
(17, 1, 295, 'new note'),
(18, 1, 248, 'neznamaaa'),
(19, 1, 290, 'neznam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin1@gmail.com', 'admin1', '$2y$10$Ss9OaYFixsC/d1OEi5i9kuCk6PCjMNbNWFvJXhFGd4.Xskby37B3a', 'admin'),
(12, 'viktorzafirovski33@gmail.com', 'ThrillSeeker999', '$2y$10$BVmKvgYDIIF/BZY1RsrQv.uEi8G2e6ollOpbnqnNXw5Fbd5tNcaYq', 'user'),
(13, 'viktorzafirovski3@gmail.com', 'ThrillSeeker99', '$2y$10$hfB7F0bED2TU0UZOOkP04u7FaTm7B5yXq1sFnFMn.utpXWjQRr0dK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
