-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 01, 2023 at 06:24 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `release_date`, `artist_id`) VALUES
(1, 'The best of me', '2021-03-21', 1),
(2, 'What is the future holds', '2013-10-02', 2),
(3, 'Yellow Submarine', '1969-01-01', 3),
(4, 'Let It Be', '1970-01-01', 3),
(5, 'Across the Universe', '1969-02-01', 3),
(6, '28 Thousand Days', '2015-01-01', 4),
(7, 'Back to Life ', '2016-01-01', 4),
(8, 'Bad', '1987-01-01', 5),
(9, 'Beat it', '1989-01-01', 5),
(10, 'Thriller', '1982-01-01', 5),
(11, 'Someone in the Dark', '1982-02-01', 5),
(12, 'Albatross', '1969-02-10', 6),
(13, 'Back to Black', '2013-01-01', 7),
(14, 'Countdown', '2011-01-01', 7),
(15, 'Crazy in love', '2003-01-01', 7),
(16, 'Green light', '2006-01-01', 7),
(17, 'Believe', '1995-01-01', 8),
(18, 'Can you feel the love tonight', '1994-01-01', 8),
(19, 'Circle of life', '1994-11-01', 8),
(20, 'All My Love', '1979-01-01', 9),
(21, 'Friends', '1970-01-01', 9),
(22, 'Immigration song', '1970-11-01', 9),
(23, 'Hello', '2015-01-01', 10),
(24, 'Love is a game', '2021-01-01', 10),
(25, 'Million years ago', '2015-03-01', 10),
(26, 'Rolling in the deep', '2010-01-01', 10),
(27, 'No woman no cry', '1975-01-01', 11),
(28, 'Sun is shining', '1999-01-01', 11),
(29, 'Another One Bites the Dust', '1970-01-01', 12),
(30, 'Bicycle Race', '1978-01-01', 12),
(31, 'Dont Stop Me Now', '1978-02-01', 12),
(32, 'Friends Will Be Friends', '1986-01-01', 12),
(33, 'I Want It All', '1989-01-01', 12),
(34, 'Killer queen', '1974-01-01', 12),
(35, 'America the Beautiful', '1991-01-01', 13),
(36, 'Im Your Baby Tonight', '1990-01-01', 13),
(37, 'Seven Years in Tibet ', '1997-01-01', 14),
(38, 'Cry to me', '1965-01-01', 15),
(39, 'Alejandro', '2009-01-01', 16),
(40, 'Applause', '2013-01-01', 16),
(41, 'Judas', '2011-01-01', 16),
(42, 'Pocker face', '2008-01-01', 16),
(43, 'Purple Rain', '1984-01-01', 17),
(44, 'Lithium', '1991-01-01', 18),
(45, 'Stain', '1992-01-01', 18),
(46, 'American Oxygen', '2015-01-01', 19),
(47, 'California King Bed ', '2010-01-01', 19),
(48, 'Godzilla', '2020-01-01', 20),
(49, 'Loose yourself', '2002-01-01', 20),
(50, 'My name is', '1999-01-01', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
