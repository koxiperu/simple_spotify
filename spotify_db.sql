-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 03, 2023 at 01:16 PM
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
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `gender` enum('Male','Female','Group') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `poster` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `bio`, `gender`, `date_of_birth`, `poster`) VALUES
(1, 'John Smith', 'John Smith is an English folk guitarist and singer from Devon.', 'Male', '1986-03-15', 1),
(2, 'Emily Johnson', 'Emily Johnson is a talented jazz pianist known for her captivating performances.', 'Female', '1990-07-20', 2),
(3, 'The Beatles', 'The Beatles were an iconic British rock band that redefined popular music.', 'Group', '1960-08-01', 3),
(4, 'Alicia Keys', 'Alicia Keys is a renowned singer-songwriter and pianist with a soulful voice.', 'Female', '1981-01-25', 4),
(5, 'Michael Jackson', 'Michael Jackson was the King of Pop, known for his iconic music and dance moves.', 'Male', '1958-08-29', 5),
(6, 'Fleetwood Mac', 'Fleetwood Mac is a legendary rock band known for their timeless hits.', 'Group', '1967-07-11', 6),
(7, 'Beyoncé', 'Beyoncé is a global superstar, singer, and performer known for her powerful music and stage presence.', 'Female', '1981-09-04', 7),
(8, 'Elton John', 'Elton John is a legendary singer-songwriter and pianist known for his flamboyant style and hit songs.', 'Male', '1947-03-25', 8),
(9, 'Led Zeppelin', 'Led Zeppelin was a pioneering rock band known for their groundbreaking music and performances.', 'Group', '1968-09-25', 9),
(10, 'Adele', 'Adele is a Grammy-winning singer known for her powerful vocals and emotional ballads.', 'Female', '1988-05-05', 10),
(11, 'Bob Marley', 'Bob Marley was a reggae legend and a symbol of peace and unity through music.', 'Male', '1945-02-06', 11),
(12, 'Queen', 'Queen is an iconic rock band with a legacy of chart-topping hits.', 'Group', '1970-06-27', 12),
(13, 'Whitney Houston', 'Whitney Houston was a legendary singer known for her remarkable voice and timeless music.', 'Female', '1963-08-09', 13),
(14, 'David Bowie', 'David Bowie was an innovative artist and musician with a diverse and influential body of work.', 'Male', '1947-01-08', 14),
(15, 'The Rolling Stones', 'The Rolling Stones are rock legends with a history of electrifying performances.', 'Group', '1962-07-12', 15),
(16, 'Lady Gaga', 'Lady Gaga is a pop icon known for her bold fashion and chart-topping music.', 'Female', '1986-03-28', 16),
(17, 'Prince', 'Prince was a prolific musician and performer known for his genre-blending music and unique style.', 'Male', '1958-06-07', 17),
(18, 'Nirvana', 'Nirvana was a groundbreaking grunge band known for their raw and influential music.', 'Group', '1987-01-01', 18),
(19, 'Rihanna', 'Rihanna is a global pop and R&B superstar known for her hit songs and fashion.', 'Female', '1988-02-20', 19),
(20, 'Eminem', 'Eminem is a rap legend known for his lyrical prowess and influence in hip-hop.', 'Male', '1972-10-17', 20);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `artist_id` int NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `release_date`, `artist_id`, `src`) VALUES
(1, 'The best of me', '2021-03-21', 1, 'music/best_of_me.m4a'),
(2, 'What is the future holds', '2013-10-02', 2, 'music/what_future_holds.m4a'),
(3, 'Yellow Submarine', '1969-01-01', 3, 'music/yellow_submarine.m4a'),
(4, 'Let It Be', '1970-01-01', 3, 'music/let_it_be.m4a'),
(5, 'Across the Universe', '1969-02-01', 3, 'music/across_universe.m4a'),
(6, '28 Thousand Days', '2015-01-01', 4, 'music/28_thousand_days.m4a'),
(7, 'Back to Life ', '2016-01-01', 4, 'music/back_to_life.m4a'),
(8, 'Bad', '1987-01-01', 5, 'music/bad.m4a'),
(9, 'Beat it', '1989-01-01', 5, 'music/beat_it.m4a'),
(10, 'Thriller', '1982-01-01', 5, 'music/thriller.m4a'),
(11, 'Someone in the Dark', '1982-02-01', 5, 'music/someone_in_dark.m4a'),
(12, 'Albatross', '1969-02-10', 6, 'music/albatross.m4a'),
(13, 'Break my soul', '2013-01-01', 7, 'music/break_to.m4a'),
(14, 'Countdown', '2011-01-01', 7, 'music/countdown.m4a'),
(15, 'Crazy in love', '2003-01-01', 7, 'music/crazy_love.m4a'),
(16, 'Green light', '2006-01-01', 7, 'music/green_light.m4a'),
(17, 'Believe', '1995-01-01', 8, 'music/believe.m4a'),
(18, 'Can you feel the love tonight', '1994-01-01', 8, 'music/can_you_feel_love.m4a'),
(19, 'Circle of life', '1994-11-01', 8, 'music/circle_of_life.m4a'),
(20, 'All My Love', '1979-01-01', 9, 'music/all_my_love.m4a'),
(21, 'Friends', '1970-01-01', 9, 'music/friends.m4a'),
(22, 'Immigration song', '1970-11-01', 9, 'music/immigration_song.m4a'),
(23, 'Hello', '2015-01-01', 10, 'music/hello.m4a'),
(24, 'Love is a game', '2021-01-01', 10, 'music/love_is_a_game.m4a'),
(25, 'Million years ago', '2015-03-01', 10, 'music/million_years.m4a'),
(26, 'Rolling in the deep', '2010-01-01', 10, 'music/rolling_into_deep.m4a'),
(27, 'No woman no cry', '1975-01-01', 11, 'music/no_woman_no_cry.m4a'),
(28, 'Sun is shining', '1999-01-01', 11, 'music/sun_is_shining.m4a'),
(29, 'Another One Bites the Dust', '1970-01-01', 12, 'music/another_bite_dust.m4a'),
(30, 'Bicycle Race', '1978-01-01', 12, 'music/bycicle_race.m4a'),
(31, 'Dont Stop Me Now', '1978-02-01', 12, 'music/dont_stop_me.m4a'),
(32, 'Friends Will Be Friends', '1986-01-01', 12, 'music/friends_will_be.m4a'),
(33, 'I Want It All', '1989-01-01', 12, 'music/i_want_it_all.m4a'),
(34, 'Killer queen', '1974-01-01', 12, 'music/killer_queen.m4a'),
(35, 'America the Beautiful', '1991-01-01', 13, 'music/america_beautiful.m4a'),
(36, 'Im Your Baby Tonight', '1990-01-01', 13, 'music/i_m_your_baby_tonight.m4a'),
(37, 'Seven Years in Tibet ', '1997-01-01', 14, 'music/seven_years_tibet.m4a'),
(38, 'Cry to me', '1965-01-01', 15, 'music/cry_to_me.m4a'),
(39, 'Alejandro', '2009-01-01', 16, 'music/alejandro.m4a'),
(40, 'Applause', '2013-01-01', 16, 'music/applause.m4a'),
(41, 'Judas', '2011-01-01', 16, 'music/judas.m4a'),
(42, 'Pocker face', '2008-01-01', 16, 'music/pocker_face.m4a'),
(43, 'Purple Rain', '1984-01-01', 17, 'music/purple_rain.m4a'),
(44, 'Lithium', '1991-01-01', 18, 'music/lithium.m4a'),
(45, 'Stain', '1992-01-01', 18, 'music/stain.m4a'),
(46, 'American Oxygen', '2015-01-01', 19, 'music/american_oxygen.m4a'),
(47, 'California King Bed ', '2010-01-01', 19, 'music/california_king_bed.m4a'),
(48, 'Godzilla', '2020-01-01', 20, 'music/godzilla.m4a'),
(49, 'Loose yourself', '2002-01-01', 20, 'music/loose_yourself.m4a'),
(50, 'My name is', '1999-01-01', 20, 'music/my_name_is.m4a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
