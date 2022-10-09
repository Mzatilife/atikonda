-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2022 at 08:56 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atikonda`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `category_id`, `title`, `author`, `image`, `content`, `date`) VALUES
(16, 3, 'Testing the app', 'Mahala Mkwepu', '0bcf891663979520.jpg', '<blockquote><p>This book would not be possible without the existence of my parents, the Internet, and JavaScript.<br>Also, words cannot express my gratitude to Ryan Dahl and TJ Holowaychuk.</p></blockquote><p><br>In addition to that, special thanks to General Assembly, pariSOMA and Marakana for giving me<br>the opportunities to test my instructions out in the wild; to Peter Armstrong for LeanPub; to Sahil</p><ul><li>Lavingia for Gumroad; to Daring Fireball for Markdown; to Metaclassy for Byword; to Fred Zirdung<br>for advice; and to Rachmad Adv for the splendid cover!</li></ul><figure class=\"table\"><table><tbody><tr><td><strong>Malawi</strong></td><td><strong>Blantyre</strong></td><td><strong>Lilongwe</strong></td></tr><tr><td>Mahala</td><td>Chindikani</td><td>Muwemi</td></tr></tbody></table></figure>', '2022-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `upload_date`) VALUES
(2, 'Life Style', '2022-06-18'),
(3, 'Agriculture', '2022-06-18'),
(4, 'Social Media', '2022-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `name`, `date_created`) VALUES
(1, 'Balaka', '2021-12-30 15:48:24'),
(2, 'Blantyre', '2021-12-30 15:48:24'),
(3, 'Chikwawa', '2021-12-30 15:49:05'),
(4, 'Chiradzulu', '2021-12-30 15:49:05'),
(5, 'Chitipa', '2021-12-30 15:49:36'),
(6, 'Dedza', '2021-12-30 15:49:36'),
(7, 'Dowa', '2021-12-30 15:51:16'),
(8, 'Karonga', '2021-12-30 15:51:16'),
(9, 'Kasungu', '2021-12-30 15:51:16'),
(10, 'Lilongwe', '2021-12-30 15:51:16'),
(11, 'Likoma', '2021-12-30 15:57:02'),
(12, 'Machinga', '2021-12-30 15:51:16'),
(13, 'Mangochi', '2021-12-30 15:55:53'),
(14, 'Mchinji', '2021-12-30 15:55:53'),
(15, 'Mulanje', '2021-12-30 15:55:53'),
(16, 'Mwanza', '2021-12-30 15:55:53'),
(17, 'Mzimba', '2021-12-30 15:55:53'),
(18, 'Mzuzu', '2021-12-30 15:55:53'),
(19, 'Neno', '2021-12-30 16:04:58'),
(20, 'Nkhata Bay', '2021-12-30 15:55:53'),
(21, 'Nkhotakota', '2021-12-30 15:55:53'),
(22, 'Nkhotakota', '2021-12-30 16:08:42'),
(23, 'Nsanje', '2021-12-30 16:08:42'),
(24, 'Ntcheu', '2021-12-30 16:08:42'),
(25, 'Ntchisi', '2021-12-30 16:08:42'),
(26, 'Phalombe', '2021-12-30 16:08:42'),
(27, 'Rumphi', '2021-12-30 16:08:42'),
(28, 'Salima', '2021-12-30 16:08:42'),
(29, 'Thyolo', '2021-12-30 16:08:42'),
(30, 'Zomba', '2021-12-30 16:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `event` text,
  `image` varchar(500) DEFAULT NULL,
  `caption` text,
  `upload_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `category_id`, `event`, `image`, `caption`, `upload_date`) VALUES
(3, 4, 'Personal', 'personal1664731038.jpeg', '<p>Image</p>', '2022-10-02 10:17:18'),
(4, 4, 'Personal', 'personal11664731185.jpeg', '<p>photo</p>', '2022-10-02 10:19:46'),
(5, 4, 'Personal', 'personal21664731221.jpeg', '<p>Photo</p>', '2022-10-02 10:20:21'),
(6, 5, 'Personal', 'work1664731268.jpeg', '<p>photo</p>', '2022-10-02 10:21:08'),
(7, 5, 'Personal', 'work21664731433.jpeg', '<p>Photo</p>', '2022-10-02 10:23:53'),
(8, 5, 'Personal', 'work31664731621.jpeg', '<p>Photo</p>', '2022-10-02 10:27:02'),
(9, 5, 'Personal', 'work51664731730.jpeg', '<p>Photo</p>', '2022-10-02 10:28:50'),
(10, 5, 'Personal', 'work61664731773.jpeg', '<p>Photo</p>', '2022-10-02 10:29:33'),
(11, 5, 'Personal', 'work71664731812.jpeg', '<p>Photo</p>', '2022-10-02 10:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(500) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`category_id`, `category_name`, `upload_date`) VALUES
(5, 'Work', '2022-10-02'),
(4, 'Personal', '2022-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `phone_2`, `email`, `password`, `user_type`, `status`, `reg_date`) VALUES
(1, 'Atikonda', 'Mtenje', '0888888888', NULL, 'dreamcodemw@gmail.com', '$2y$10$K7/O2Uo1c1cnnKJmyXUVGOvgnfbQCLxIQYGW3tvMC2c6HlRk38h9e', 'admin', 1, '2022-06-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
