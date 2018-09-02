-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 01:33 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixtape`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(5) NOT NULL,
  `playlist_name` varchar(100) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `user_id`, `hits`, `create_time`) VALUES
(4, 'sayed\'s_playList', 'sayed1122', 12, '2018-09-02 21:26:01'),
(28, 'kjhkgj', 'bazoo123', 2, '2018-09-02 21:26:01'),
(29, 'hgfhdh', 'bazoo123', 6, '2018-09-02 21:26:01'),
(30, 'my pl', 'sayed1122', 16, '2018-09-02 21:26:01'),
(31, 'dwqewqe', 'sayed1122', 0, '2018-09-02 21:26:43'),
(32, 'sayed', 'sayed1122', 0, '2018-09-02 22:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `playlist_id` int(5) NOT NULL,
  `song_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_songs`
--

INSERT INTO `playlist_songs` (`playlist_id`, `song_id`) VALUES
(3, '4'),
(3, '6'),
(3, '7'),
(16, '1'),
(19, '1'),
(19, '2'),
(19, '3'),
(19, '4'),
(19, '5'),
(20, '1'),
(20, '2'),
(20, '3'),
(20, '4'),
(20, '5'),
(21, '4'),
(21, '5'),
(21, '6'),
(21, '7'),
(22, '5'),
(22, '6'),
(22, '7'),
(23, '1'),
(23, '2'),
(23, '5'),
(23, '6'),
(24, '2'),
(24, '3'),
(24, '5'),
(25, '3'),
(25, '4'),
(25, '5'),
(25, '6'),
(26, '1'),
(26, '2'),
(26, '3'),
(27, '4'),
(28, '1'),
(30, '5'),
(30, '9'),
(32, '8'),
(32, '9');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(5) NOT NULL,
  `song_name` varchar(100) NOT NULL,
  `song_path` varchar(100) NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `song_name`, `song_path`, `hits`) VALUES
(1, 'Alef-Luna.mp3', 'uploads/Alef-Luna.mp3', 0),
(2, 'chocolate08 - [SongsPk.CC].mp3', 'uploads/chocolate08 - [SongsPk.CC].mp3', 0),
(3, 'chocolate03 - [SongsPk.CC].mp3', 'uploads/chocolate03 - [SongsPk.CC].mp3', 0),
(4, 'Lord Huron - Ends of the Earth (Official).mp3', 'uploads/Lord Huron - Ends of the Earth (Official).mp3', 0),
(5, 'Andy Shauf - The Magician.mp3', 'uploads/Andy Shauf - The Magician.mp3', 0),
(6, 'Years & Years - Take Shelter.mp3', 'uploads/Years & Years - Take Shelter.mp3', 0),
(7, 'Andy Shauf - The Worst In You.mp3', 'uploads/Andy Shauf - The Worst In You.mp3', 0),
(8, 'chocolate09 - [SongsPk.CC].mp3', 'uploads/chocolate09 - [SongsPk.CC].mp3', 0),
(9, '6LACK - Prblms (Official Video).mp3', 'uploads/6LACK - Prblms (Official Video).mp3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `type` varchar(6) NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `gender`, `email`, `dob`, `type`) VALUES
('bazoo123', 'mustakim bazoo', 'bazoo@123', 'male', 'zahidneru015@gmail.com', '2010-01-04', 'public'),
('bazoo1234', 'mustakim bazoo', 'bazoo@123', 'male', 'zahidneru015@gmail.com', '2015-06-12', 'public'),
('leona123', 'israt', 'leona@123', 'female', 'israt@gmail.com', '1990-8-6', 'public'),
('Mirajsdaasd', 'ishfaq s', 'Miraj12345#', 'male', 'wqewe@dasd.vas', '2018-07-11', 'public'),
('sayed1122', 'sayed rahman', 'sayed@1122', 'male', 'sayedrahman015@gmail.com', '1995-01-09', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`playlist_id`,`song_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
