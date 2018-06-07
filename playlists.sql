-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2018 at 02:17 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET hp8 COLLATE hp8_bin NOT NULL,
  `image` varchar(1000) CHARACTER SET hp8 COLLATE hp8_bin NOT NULL,
  `songs` text CHARACTER SET hp8 COLLATE hp8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `image`, `songs`) VALUES
(1, 'James Dio', 'https://metalodyssey.files.wordpress.com/2010/05/circa-2009.jpg?w=300&h=300', '[{\"name\":\"01 Stand Up And Shout.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/01%20Stand%20Up%20And%20Shout.mp3\"},{\"name\":\"02 Holy Diver.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/02%20Holy%20Diver.mp3\"},{\"name\":\"03 Rainbow In The Dark.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/03%20Rainbow%20In%20The%20Dark.mp3\"},{\"name\":\"04 Straight Through The Heart.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/04%20Straight%20Through%20The%20Heart.mp3\"},{\"name\":\"05 We Rock.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/05%20We%20Rock.mp3\"},{\"name\":\"06 The Last In Line.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/06%20The%20Last%20In%20Line.mp3\"},{\"name\":\"07 Mystery.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/07%20Mystery.mp3\"},{\"name\":\"08 King Of Rock And Roll.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/08%20King%20Of%20Rock%20And%20Roll.mp3\"},{\"name\":\"09 Sacred Heart.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/09%20Sacred%20Heart.mp3\"},{\"name\":\"10 Hungry For Heaven.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/10%20Hungry%20For%20Heaven.mp3\"},{\"name\":\"11 Rock \'N\' Roll Children.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/11%20Rock%20\'N\'%20Roll%20Children.mp3\"},{\"name\":\"12 Man On The Silver Mountain (Live).mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/12%20Man%20On%20The%20Silver%20Mountain%20(Live).mp3\"},{\"name\":\"13 Dream Evil.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/13%20Dream%20Evil.mp3\"},{\"name\":\"14 I Could Have Been A Dreamer.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/14%20I%20Could%20Have%20Been%20A%20Dreamer.mp3\"},{\"name\":\"15 Lock Up The Wolves.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/15%20Lock%20Up%20The%20Wolves.mp3\"},{\"name\":\"16 Strange Highways.mp3\",\"url\":\"http:\\/\\/76.92.66.82\\/MUSIC\\/Jack%20Connoly\\/Dio\\/The%20Very%20Beast%20Of%20Dio\\/16%20Strange%20Highways.mp3\"}]'),
(2, 'Michael Jackson\'s greatest hits', 'https://upload.wikimedia.org/wikipedia/en/5/51/Michael_Jackson_-_Bad.png', '[{\"name\":\"01 bad.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/01%20bad.mp3\"},{\"name\":\"01 i want you back.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/01%20i%20want%20you%20back.mp3\"},{\"name\":\"01 jam.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/01%20jam.mp3\"},{\"name\":\"02 a b c (1,2,3).mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/02%20a%20b%20c%20(1,2,3).mp3\"},{\"name\":\"02 say say say.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/02%20say%20say%20say.mp3\"},{\"name\":\"02 the way you make me feel.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/02%20the%20way%20you%20make%20me%20feel.mp3\"},{\"name\":\"03 man in the mirror.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/03%20man%20in%20the%20mirror.mp3\"},{\"name\":\"04 dirty diana.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/04%20dirty%20diana.mp3\"},{\"name\":\"05 rockin robin.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/05%20rockin%20robin.mp3\"},{\"name\":\"06 ben.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/06%20ben.mp3\"},{\"name\":\"06 smooth crimanal.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/06%20smooth%20crimanal.mp3\"},{\"name\":\"07 blame it on the boogie.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/07%20blame%20it%20on%20the%20boogie.mp3\"},{\"name\":\"09 dont stop til you get enough.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/09%20dont%20stop%20til%20you%20get%20enough.mp3\"},{\"name\":\"09 remember the time.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/09%20remember%20the%20time.mp3\"},{\"name\":\"10 give in to me.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/10%20give%20in%20to%20me.mp3\"},{\"name\":\"10 in the closet.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/10%20in%20the%20closet.mp3\"},{\"name\":\"11 rock with you.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/11%20rock%20with%20you.mp3\"},{\"name\":\"11 who is it.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/11%20who%20is%20it.mp3\"},{\"name\":\"13 can you feel it.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/13%20can%20you%20feel%20it.mp3\"},{\"name\":\"13 will you be there.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/13%20will%20you%20be%20there.mp3\"},{\"name\":\"14 the girl is mine.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/14%20the%20girl%20is%20mine.mp3\"},{\"name\":\"14 you are not alone.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/14%20you%20are%20not%20alone.mp3\"},{\"name\":\"15 billie jean.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/15%20billie%20jean.mp3\"},{\"name\":\"15 earth song.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/15%20earth%20song.mp3\"},{\"name\":\"16 beat it.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/16%20beat%20it.mp3\"},{\"name\":\"16 they dont care about us.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/16%20they%20dont%20care%20about%20us.mp3\"},{\"name\":\"17 wanna be startin something.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/17%20wanna%20be%20startin%20something.mp3\"},{\"name\":\"17 you rock my world.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/17%20you%20rock%20my%20world.mp3\"},{\"name\":\"18 human nature.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/18%20human%20nature.mp3\"},{\"name\":\"19 p y t (pretty young thing).mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/19%20p%20y%20t%20(pretty%20young%20thing).mp3\"},{\"name\":\"21 thriller.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/21%20thriller.mp3\"},{\"name\":\"Michael Jackson & Freddie Merucry - There Must Be More Than Life That This.mp3\",\"url\":\"http:\\/\\/dora-robo.com\\/muzyka\\/skladanki\\/MICHAEL%20JACKSON%20GREATEST%20HITS\\/Michael%20Jackson%20&%20Freddie%20Merucry%20-%20There%20Must%20Be%20More%20Than%20Life%20That%20This.mp3\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
