-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 07:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(24, 23, 55, 'hi any responce', 'saqib', '2019-07-25 11:04:10'),
(25, 23, 55, 'hi i found a item but its like you mobile', 'waqas Ali', '2019-07-25 11:15:26'),
(26, 25, 56, 'hi i found that...', 'jhon', '2019-07-25 11:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `founditem`
--

CREATE TABLE `founditem` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `description` varchar(500) NOT NULL,
  `ph` int(20) NOT NULL,
  `countary` text NOT NULL,
  `city` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lostitem`
--

CREATE TABLE `lostitem` (
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ph` int(20) NOT NULL,
  `countary` text NOT NULL,
  `city` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(50) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lostitem`
--

INSERT INTO `lostitem` (`post_id`, `name`, `description`, `ph`, `countary`, `city`, `address`, `date`, `img`, `user_id`) VALUES
(23, 'I LOST my sumsung j6 mobile', 'i lost my mobile sumsung j6. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 123456789, 'America', 'city', '13 street', '2019-07-25 11:02:32', '', 55),
(24, 'I LOST My Purse', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 987654321, 'America', 'city', 'Street no 7', '2019-07-25 11:07:51', '', 55),
(25, 'I LOST LAPTOP from universty', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', 789456123, 'America', 'city', 'LA university', '2019-07-25 11:13:46', '', 56);

-- --------------------------------------------------------

--
-- Table structure for table `messeges`
--

CREATE TABLE `messeges` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `msg_topic` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messeges`
--

INSERT INTO `messeges` (`msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_date`) VALUES
(3, '56', '55', '', 'hi Saqib how are you....??', 'hi i am fine.', 'read', '2019-07-25 11:21:37'),
(4, '57', '55', '', 'hi saqib how are you....', 'no_reply', 'unread', '2019-07-25 11:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  `phone` int(20) NOT NULL,
  `idcard` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `status` text NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `trn_date`, `phone`, `idcard`, `address`, `img`, `status`, `posts`) VALUES
(55, 'saqib ali', 'saqibjutt81@ymail.com', '25f9e794323b453885f5181f1b624d0b', '2019-07-25 12:58:49', 123456789, 1234567899, 'street no 3, NY', 'logo2.png', '', 'yes'),
(56, 'waqas Ali', 'saqibali@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2019-07-25 13:10:17', 456987321, 741852963, 'Area 2,B block, LA', 'astra-starter-sites.jpg', '', 'yes'),
(57, 'jhon', 'saqibali4563@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '2019-07-25 13:28:37', 789654123, 2147483647, 'B block, 2 Sreet, NY', 'Custom-Colored-Cartoon-Portrait.png', '', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `founditem`
--
ALTER TABLE `founditem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostitem`
--
ALTER TABLE `lostitem`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `messeges`
--
ALTER TABLE `messeges`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `founditem`
--
ALTER TABLE `founditem`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lostitem`
--
ALTER TABLE `lostitem`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messeges`
--
ALTER TABLE `messeges`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
