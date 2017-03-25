-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2017 at 10:20 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rollside`
--

-- --------------------------------------------------------

--
-- Table structure for table `latest`
--

CREATE TABLE `latest` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` int(11) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTIONS` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores current song data';

--
-- Dumping data for table `latest`
--

INSERT INTO `latest` (`NAME`, `LOCATION`, `ARTIST1`, `GENRE`, `RELEASE_DATE`, `LIKES`, `FOLLOWERS`, `DOWNLOADS`, `ALBUM_NAME`, `IMG_LOCATION`, `SIZE`, `SONG_ID`, `TYPE`, `ARTIST2`, `ARTIST3`, `UPDATED`, `LISTENS`, `DESCRIPTIONS`) VALUES
('dfdf', 'dfdfdf', 'fddf', 'dfddf', '2017-02-01', 0, 0, 0, 'fdvfdvfdv', 'vfvfdvc', '0', 'sng566', 'ENGLISH', NULL, NULL, 0, 0, NULL),
('gggg', 'gngn', 'hghgh', 'gtht', '2016-12-12', 52, 2, 68, 'gngn', 'gnhgnh', '3.4Mb', 'sng43434', 'ENGLISH', '', '', 0, 0, NULL),
('', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '0', '', 'ENGLISH', NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`NAME`, `EMAIL`, `SUBJECT`, `MESSAGE`) VALUES
('$name', '$email', '$subject', '$message'),
('kk k', 'kdn vk', 'kfdnv kf', ' mfd vmfd nkv'),
('nrkv', 'rnvlkr', 'vlrnv', 'nrlvnrl frnfk'),
('nvkv ', 'santokhsdg@gmail.com', 'nrkrnrkvnr', 'nrkvngr'),
('', '', '', ''),
('nrknr ', 'nfrkngf', 'nrlgn', 'nrknfrk'),
('mdlvmf', 'nkvnkfnvkfnvf', 'vnfkvnfv vfknvkfv', 'vnkvnknvf rvkfnvkfv'),
('nckdnfv', 'nk', 'nk', 'nvkfnvkf vfnvknrfvkfd vrknvc rfv rvnrkf n'),
('vlfnv', 'vfnkvf', 'nvkfnv', 'v fknvf vf vkfv'),
('jrigkjr', 'ngkrg', 'nkgnf', 'gnfkgnkf fgknfg');

-- --------------------------------------------------------

--
-- Table structure for table `mostlistened`
--

CREATE TABLE `mostlistened` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` int(11) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTIONS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` int(11) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTIONS` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores current song data';

-- --------------------------------------------------------

--
-- Table structure for table `popularsearches`
--

CREATE TABLE `popularsearches` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` int(11) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores current song data';

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` tinyint(4) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTIONS` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores current song data';

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`NAME`, `LOCATION`, `ARTIST1`, `GENRE`, `RELEASE_DATE`, `LIKES`, `FOLLOWERS`, `DOWNLOADS`, `ALBUM_NAME`, `IMG_LOCATION`, `SIZE`, `SONG_ID`, `TYPE`, `ARTIST2`, `ARTIST3`, `UPDATED`, `LISTENS`, `DESCRIPTIONS`) VALUES
('gggg', 'gngn', 'hghgh', 'gtht', '2016-12-12', 52, 3, 69, 'gngn', 'gnhgnh', '3.4Mb', 'sng43434', 'ENGLISH', '', '', 0, 13, 'nvjfnvjfd vjnrjngr fgnrjignjrf gvjrngjr gvjrgjurgrj fvrgvjrbgurhrj gfrbgrnf rj gjrbgurgf rgjrbgjbfje f4bgje fgb4jbj gf4bg j fj4gb .'),
('dfdf', 'dfdfdf', 'fddf', 'dfddf', '2017-02-01', 0, 0, 0, 'fdvfdvfdv', 'vfvfdvc', '0', 'sng566', 'ENGLISH', NULL, NULL, 0, 4, NULL),
('', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '0', '', 'ENGLISH', NULL, NULL, 0, 4, NULL),
('', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '0', '4', 'PUNJABI', NULL, NULL, 0, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `song_info`
--

CREATE TABLE `song_info` (
  `SONG_ID` varchar(25) NOT NULL,
  `COMPOSER` varchar(70) DEFAULT NULL,
  `PUBLISHER` varchar(70) DEFAULT NULL,
  `LABEL` varchar(50) DEFAULT NULL,
  `ISWC` varchar(50) DEFAULT NULL,
  `ISRC` varchar(50) DEFAULT NULL,
  `PLINE` text,
  `BAND` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores additional song data for professionals';

--
-- Dumping data for table `song_info`
--

INSERT INTO `song_info` (`SONG_ID`, `COMPOSER`, `PUBLISHER`, `LABEL`, `ISWC`, `ISRC`, `PLINE`, `BAND`) VALUES
('sng58635c13a66c7', '', '', '', '', '', '', ''),
('sng586404c64f364', 'vnfnv', 'nfkvnf', 'vnfkv', 'fvnfkvn', 'vfnvkfnv', 'njdkvfvbjf', 'fg'),
('sng5864066e1c41c', 'nfbnkfnb', 'bnfkbnk', 'nbkfnbkfb', ' kfb  f', ' kf nbkngfb', 'v fkvfkm', 'ngkfn'),
('sng58640cdc8a9d8', 'nvkfnb', 'fnfkl', 'nfkbnf', 'nvkfnvbf', 'fkmnfkb', 'f vf kvmf', 'nv kfv'),
('sng58640faf5102d', 'nkfng', 'nfkngf', 'ngnk', 'gfkgk', 'ngfkn', 'nfgnk', 'dngkd');

-- --------------------------------------------------------

--
-- Table structure for table `top`
--

CREATE TABLE `top` (
  `NAME` text,
  `LOCATION` text,
  `ARTIST1` varchar(50) DEFAULT NULL,
  `GENRE` varchar(50) DEFAULT NULL,
  `RELEASE_DATE` date DEFAULT NULL,
  `LIKES` int(11) NOT NULL DEFAULT '0',
  `FOLLOWERS` int(11) NOT NULL DEFAULT '0',
  `DOWNLOADS` int(11) NOT NULL DEFAULT '0',
  `ALBUM_NAME` text,
  `IMG_LOCATION` tinytext,
  `SIZE` varchar(10) NOT NULL DEFAULT '0',
  `SONG_ID` varchar(25) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'ENGLISH',
  `ARTIST2` varchar(50) DEFAULT NULL,
  `ARTIST3` varchar(50) DEFAULT NULL,
  `UPDATED` int(11) NOT NULL DEFAULT '0',
  `LISTENS` int(11) NOT NULL DEFAULT '0',
  `DESCRIPTIONS` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table stores current song data';

--
-- Dumping data for table `top`
--

INSERT INTO `top` (`NAME`, `LOCATION`, `ARTIST1`, `GENRE`, `RELEASE_DATE`, `LIKES`, `FOLLOWERS`, `DOWNLOADS`, `ALBUM_NAME`, `IMG_LOCATION`, `SIZE`, `SONG_ID`, `TYPE`, `ARTIST2`, `ARTIST3`, `UPDATED`, `LISTENS`, `DESCRIPTIONS`) VALUES
('dfdf', 'dfdfdf', 'fddf', 'dfddf', '2017-02-01', 0, 0, 0, 'fdvfdvfdv', 'vfvfdvc', '0', 'sng566', 'ENGLISH', NULL, NULL, 0, 0, NULL),
('gggg', 'gngn', 'hghgh', 'gtht', '2016-12-12', 52, 2, 68, 'gngn', 'gnhgnh', '3.4Mb', 'sng43434', 'ENGLISH', '', '', 0, 0, NULL),
('', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '0', '', 'ENGLISH', NULL, NULL, 0, 0, NULL),
('raja babu', 'fdfd', 'dvcdv', 'dvd', '2017-02-07', 0, 0, 0, 'dvdvdv', 'dvfdvc', '41', 'dvdvdv', 'PUNJABI', NULL, NULL, 1, 0, NULL),
('nknkd', 'ndknfvkdnv', 'ndinfdknv', NULL, '2017-03-21', 0, 0, 0, 'fjijig', 'dinfeif', '0', 'hellll', 'ENGLISH', NULL, NULL, 0, 0, 'ndfjibfudf fbrufgbur vrbfur vrbgvuir vrbgvurb vvr jgbvur gvrjbgvujr gvrbgur gvrbgur.');

-- --------------------------------------------------------

--
-- Table structure for table `trie`
--

CREATE TABLE `trie` (
  `WORD` varchar(50) DEFAULT NULL,
  `SONG` int(11) NOT NULL DEFAULT '0',
  `ARTIST` int(11) NOT NULL DEFAULT '0',
  `TYPE` int(11) NOT NULL DEFAULT '0',
  `ALBUM` int(11) NOT NULL DEFAULT '0',
  `BAND` int(11) NOT NULL DEFAULT '0',
  `PREF` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='BACK FOR TRIE';

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `USER_ID` varchar(25) NOT NULL,
  `SONG_ID` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`USER_ID`, `SONG_ID`) VALUES
('', 'sng586404c64f364');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` varchar(25) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `PASS` tinytext NOT NULL,
  `NAME` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Contains user info ';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `EMAIL`, `PASS`, `NAME`) VALUES
('usr5867baf10dbe9', 'gsd@gmail.com', '2ecf1ff6b9a41d69994bac1f58d92c45dab7845ee6c40412671acc0f2765b1cb', 'gsd'),
('usr5867a14cc6765', 'gurjots@gmail.com', 'b2bc18acbd66aacf40ca7d8dd6b7417661088290c44abc45b8267a62de505ac1', 'gurot'),
('usr5867a11891238', 'gurjot@gmail.com', 'b2bc18acbd66aacf40ca7d8dd6b7417661088290c44abc45b8267a62de505ac1', 'gurot'),
('usr58679f3db485c', 'santokhsdg@gmail.com', '883d0eb1322807dfa9a8821d8f3e465d6ae370cd186c4627187489b71a36c8c5', 'santokh'),
('usr58678db34fc68', 'trump@gmail.com', 'c766050620ba034d165fe859a199d826f2aa706a306cb9d8b12376f6fcf6baff', 'Donald Trump'),
('usr5896e3a813732', 'ssd@gmail.com', '18138372fad4b94533cd4881f03dc6c69296dd897234e0cee83f727e2e6b1f63', 'ssd'),
('usr58b58b1b1777c', 'sss@gml.com', '2ce2278a88b5c6fa79ccb632e064b85c2ca9915dd58fa293c813af9c426df5c6', 'santokh');

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE `user_follow` (
  `ARTIST_NAME` varchar(50) NOT NULL,
  `FOLLOWER_ID` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`ARTIST_NAME`, `FOLLOWER_ID`) VALUES
('hghgh', 'usr585c0d54ee9ce'),
('hghgh', 'usr5896e3a813732');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `USER_ID` varchar(50) NOT NULL,
  `SONG_ID` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`USER_ID`, `SONG_ID`) VALUES
('usr585d4aa269a76', 'sng43434'),
('usr585c0d54ee9ce', 'sng43434'),
('usr58678db34fc68', 'sng43434'),
('usr5896e3a813732', 'sng43434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`SONG_ID`);

--
-- Indexes for table `song_info`
--
ALTER TABLE `song_info`
  ADD PRIMARY KEY (`SONG_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
