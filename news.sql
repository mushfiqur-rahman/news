-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 01:38 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbus_002`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `categoryId`) VALUES
(1, 'National', 'NA', 0),
(2, 'International', 'NA', 0),
(3, 'Politics', 'NA', 0),
(4, 'Sports', 'NA', 0),
(5, 'Football', 'NA', 4),
(6, 'Cricket', 'NA', 4),
(7, 'Basketball', 'NA', 4),
(8, 'Test Matches', 'NA', 6),
(9, 'T Tweenty', 'NA', 6),
(10, 'Women', 'NA', 9);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `countryId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(1, 'Dhaka', 1),
(2, 'Rangpur', 1),
(3, 'Noakhali', 1),
(4, 'Barishal', 1),
(5, 'Comilla', 1),
(6, 'Dinajpur', 1),
(8, 'Choumohoni', 1),
(10, 'Saifur\'s', 1),
(11, 'Sirajgong', 1),
(12, 'Naogan', 1),
(13, 'Chapai', 1),
(14, 'Thakurgaon', 1),
(15, 'Kurigram', 1),
(16, 'Gaibandha', 1),
(17, 'Lakhmipur', 1),
(18, 'Pabna', 1),
(19, 'Kustia', 1),
(20, 'Jessore', 1),
(25, 'bogra', NULL),
(26, 'Kathmundu', NULL),
(27, 'ABC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Pakistan'),
(4, 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `pagefile`
--

CREATE TABLE `pagefile` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagefile`
--

INSERT INTO `pagefile` (`id`, `pageId`, `title`, `dateTime`, `file`) VALUES
(1, 1, 'abc see and discover', '2017-12-04 19:36:17', 'public JsonResult getCities.docx');

-- --------------------------------------------------------

--
-- Table structure for table `pageimage`
--

CREATE TABLE `pageimage` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageimage`
--

INSERT INTO `pageimage` (`id`, `pageId`, `title`, `dateTime`, `image`) VALUES
(4, 1, 'abc see and discover', '2017-12-04 19:12:27', 'images1ONJTW4K.jpg'),
(3, 1, 'On Site Image 1', '2017-12-04 19:11:20', 'yamin-honourable1.jpg'),
(5, 1, 'abc see and discover', '2017-12-04 19:12:34', 'untitled.png'),
(6, 1, 'Amazon workers on strike in Italy ', '2017-12-04 19:12:47', 'AAEAAQAAAAAAAAtIAAAAJDQ0YTdkN2IzLWZkMjMtNDZiYy1iNGM2LWM4ZWEwZTY1YTM4Nw.jpg'),
(7, 2, '11th veto by Russia regarding Syria', '2017-12-04 19:12:58', 'images8D3ILETJ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pagelikes`
--

CREATE TABLE `pagelikes` (
  `pageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagelikes`
--

INSERT INTO `pagelikes` (`pageId`, `userId`, `dateTime`) VALUES
(4, 1, '2017-12-06 18:33:27'),
(24, 1, '2017-12-06 18:41:04'),
(1, 1, '2017-12-06 18:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `hitCount` int(11) DEFAULT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `tags`, `createDate`, `userId`, `hitCount`, `categoryId`) VALUES
(1, '11th veto by Russia regarding Syria', 'veto, nato', '2017-11-22 00:00:00', 1, 0, 2),
(2, 'Former Real Madrid star Pepe calls on Cristiano Ronaldo to \'come to Besiktas\'', 'abc, real, madrid, ppepe', '2017-11-22 00:00:00', 1, 0, 4),
(3, 'biral er golpo', 'bilai meww', '2017-11-22 00:00:00', 1, 0, 2),
(4, 'katrinar vdo fhasss {vdo shoho dekhun}', 'katrina scandel', '2017-11-22 00:00:00', 1, 0, 1),
(5, 'Ashes: England face battle after Steve Smith century gives Australia lead By Stephan Shemilt BBC Sport in Brisbane   4 hours ago  From the section Cricket 219 ', 'cricket, ashes, autrilia, England', '2017-11-25 00:00:00', 1, 0, 6),
(6, 'Hafiz Saeed: US seeks re-arrest of Pakistan $10m bounty cleric', 'hafiz, football, etc', '2017-11-25 00:00:00', 1, 0, 5),
(7, 'Eight \'North Korean fishermen\' wash ashore in Japan', 'north korea wash', '2017-11-25 00:00:00', 1, 0, 2),
(8, '\'Indiana Joan\': 95-year-old accused of looting Middle East tombs', '\'Indiana Joan\': 95-year-old accused ', '2017-11-25 00:00:00', 1, 0, 3),
(9, 'China cuts import tariffs on almost 200 consumer goods', 'China cuts import tariffs on almost ', '2017-11-25 00:00:00', 1, 0, 9),
(10, 'Uber takes driver battle to Supreme Court', 'Uber takes driver battle ', '2017-11-25 00:00:00', 1, 0, 10),
(11, 'Wall Street retail stocks rise on Black Friday', 'Wall Street retail stocks rise ', '2017-11-25 00:00:00', 1, 0, 1),
(12, 'Amazon workers on strike in Italy ', 'Amazon workers on strike ', '2017-11-25 00:00:00', 1, 0, 2),
(13, 'Russian Fancy Bear hackers\' UK link revealed', 'Russian Fancy Bear hackers', '2017-11-25 00:00:00', 1, 0, 3),
(14, 'Mitsubishi Materials shares fall on fake data scandal', 'Mitsubishi ', '2017-11-25 00:00:00', 1, 0, 3),
(15, 'The firm where new mums - and dads - get fully funded parental leave', 'The firm where new mums ', '2017-11-25 00:00:00', 1, 0, 7),
(16, 'Brazil\'s Neymar and the $6bn global trade in footballers', 'Brazil\'s Neymar ', '2017-11-25 00:00:00', 1, 0, 8),
(17, 'Women league 2017', 'Womwn league', '2017-11-25 00:00:00', 1, 0, 10),
(18, 'T20 2018', 'Match schedule ', '2017-11-25 00:00:00', 1, 0, 9),
(19, 'Bangladesh won by 20 runs', 'Bangladesh vs India', '2017-11-25 00:00:00', 1, 0, 8),
(20, 'Asia Basketball ', 'Bangladesh  vs India', '2017-11-25 00:00:00', 1, 0, 7),
(21, 'Women cricket league 2017 starts', 'women cricket', '2017-11-25 00:00:00', 1, 0, 10),
(22, 'Women football 2017', 'women football', '2017-11-25 00:00:00', 1, 0, 5),
(23, 'à¦°à§‡à¦•à¦°à§à¦¡à¦¸à¦‚à¦–à§à¦¯à¦• à¦¨à¦¿à§Ÿà§‹à¦—à§‡à¦° à¦ªà¦°à¦“ à¦¶à§‚à¦¨à§à¦¯ à¦ªà¦¦ à¦¬à§‡à§œà§‡à¦›à§‡', 'à¦°à§‡à¦•à¦°à§à¦¡à¦¸à¦‚à¦–à§à¦¯à¦• à¦¨à¦¿à§Ÿà§‹à¦—à§‡à¦° ', '2017-11-25 00:00:00', 1, 0, 1),
(24, 'à¦²à§à¦‡à¦¸-à¦¤à¦¾à¦£à§à¦¡à¦¬à§‡ à¦­à§‡à¦¸à§à¦¤à§‡ à¦—à§‡à¦² à¦šà¦¿à¦Ÿà¦¾à¦—à¦‚à§Ÿà§‡à¦° à¦•à§‹à§Ÿà¦¾à¦²à¦¿à¦«à¦¾à§Ÿà¦¾à¦° à¦¸à§à¦¬à¦ªà§à¦¨', 'fdhfdg,fddfdf', '2017-11-27 00:00:00', 1, 0, 1),
(25, ' à¦†à¦žà§à¦šà¦²à¦¿à¦• à¦•à¦¾à¦°à§à¦¯à¦¾à¦²à§Ÿà§‡ à¦à¦¨à¦†à¦‡à¦¡à¦¿ à¦ªà§à¦°à¦¿à¦¨à§à¦Ÿ à¦¹à¦¬à§‡', 'dfsfd,jdfhj', '2017-11-27 00:00:00', 1, 0, 3),
(26, ' à¦¦à¦¿à§Ÿà¦¾à¦œ à¦¹à¦¤à§à¦¯à¦¾à¦° à¦¬à¦¿à¦šà¦¾à¦° à¦šà§‡à§Ÿà§‡ à¦…à¦¨à¦¶à¦¨à§‡ à¦®à¦¾', 'ma,babba', '2017-11-27 00:00:00', 1, 0, 4),
(27, ' à¦¸à¦¾à¦¨à¦¿ à¦²à¦¿à¦“à¦¨à¦¿à¦° à¦ªà§à¦°à¦¤à¦¿à¦¶à§‹à¦§', 'sani,leon', '2017-11-27 00:00:00', 1, 0, 10),
(28, ' à¦…à¦¬à¦¿à¦¬à¦¾à¦¹à¦¿à¦¤ à¦ªà§à¦°à¦®à¦¾à¦£ à¦•à¦°à¦¤à§‡ à¦¸à¦¾à¦¤ à¦¬à¦›à¦°', 'unmarried,years', '2017-11-27 00:00:00', 1, 0, 2),
(29, 'à¦¯à¦¾à¦¤à§à¦°à§€ à¦«à§‡à¦°à¦¾à¦¤à§‡ à¦…à¦Ÿà§‹à¦°à¦¿à¦•à¦¶à¦¾à¦“à§Ÿà¦¾à¦²à¦¾à¦¦à§‡à¦° à¦…à¦«à¦¾à¦°', 'tempu,bus', '2017-11-27 00:00:00', 1, 0, 8),
(30, 'à¦à¦¸à§‡à¦›à§‡ à¦ªà¦°à¦¿à¦¯à¦¾à§Ÿà§€ à¦ªà¦¾à¦–à¦¿', 'birds,guest', '2017-11-27 00:00:00', 1, 0, 5),
(31, 'à¦“à§Ÿà¦¾à¦¨à¦¡à§‡ à¦¸à¦¿à¦°à¦¿à¦œà§‡à¦° à¦…à¦§à¦¿à¦¨à¦¾à§Ÿà¦• à¦°à§‹à¦¹à¦¿à¦¤', 'cricket,india', '2017-11-27 00:00:00', 1, 0, 5),
(32, ' à¦¯à§‡ à¦–à¦¾à¦¬à¦¾à¦°à§‡ à¦œà¦¨à§à¦®à§‡à¦° à¦®à§‡à§Ÿà¦¾à¦¦', 'food,life,honey', '2017-11-27 00:00:00', 1, 0, 8),
(33, 'BDR carnage was to create political crisis', 'bdr,bgb', '2017-11-27 00:00:00', 1, 0, 3),
(34, 'Probe intelligence failure', 'Probe, intelligence ,failure', '2017-11-27 00:00:00', 1, 0, 9),
(35, 'Making Sibling Partnerships Successful ', 'Sibling ,Partnerships', '2017-11-27 00:00:00', 1, 0, 10),
(36, 'Trump meets man behind Pen Pineapple Apple Pen Pen Pineapple Apple Pen', 'pen,trump,japan', '2017-11-27 00:00:00', 1, 0, 2),
(37, 'à¦ªà§‹à¦ª à¦«à§à¦°à¦¾à¦¨à§à¦¸à¦¿à¦¸ à¦®à¦¿à§Ÿà¦¾à¦¨à¦®à¦¾à¦°à§‡', 'à¦ªà§‹à¦ª à¦«à§à¦°à¦¾à¦¨à§à¦¸à¦¿à¦¸', '2017-11-27 00:00:00', 1, 0, 2),
(38, 'à¦†à¦—à¦¸à§à¦Ÿà§‡ à¦°à¦¾à¦–à¦¾à¦‡à¦¨ à¦ªà§à¦°à¦¦à§‡à¦¶à§‡ à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦¤à§à¦¨ à¦•à¦°à§‡ à¦®à¦¿à§Ÿà¦¾à¦¨à¦®à¦¾à¦° à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦ž à¦¶à§à¦°à§ ', 'à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦¤à§à¦¨ à¦•à¦°à§‡ à¦®à¦¿à§Ÿà¦¾à¦¨à¦®à¦¾à¦° à¦¸à§‡à¦¨à¦¾à¦¬à¦¾à¦¹à¦¿à¦¨à§€à¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦ž à¦¶à§à¦°à§ ', '2017-11-27 00:00:00', 1, 0, 2),
(39, 'à¦—à¦¤ à§¨à§« à¦†à¦—à¦¸à§à¦Ÿ à¦°à¦¾à¦–à¦¾à¦‡à¦¨à§‡ à¦¸à¦¹à¦¿à¦‚à¦¸à¦¤à¦¾à¦° à¦ªà¦° à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦¨à¦¿à¦§à¦¨à¦¯à§à¦œà§à¦ž à¦šà¦¾à¦²à¦¾à¦¨à§‹ à¦¶à§à¦°à§', 'à¦°à¦¾à¦–à¦¾à¦‡à¦¨à§‡ à¦¸à¦¹à¦¿à¦‚à¦¸à¦¤', '2017-11-27 00:00:00', 1, 0, 1),
(40, 'à¦ªà§‹à¦ª à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾ à¦‡à¦¸à§à¦¯à§à¦¤à§‡ à¦•à¦¥à¦¾ à¦¬à¦²à¦¬à§‡à¦¨', 'à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾ ', '2017-11-27 00:00:00', 1, 0, 1),
(41, 'à¦†à¦—à¦¸à§à¦Ÿà§‡ à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦žà§‡à¦° à¦­à§Ÿà¦¾à¦¬à¦¹à¦¤à¦¾à§Ÿ à¦¤à¦¾à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦ªà§à¦°à¦¾à¦°à§à¦¥à¦¨à¦¾ à¦•à¦°à§‡à¦›à¦¿à¦²à§‡à¦¨ à¦ªà§‹à¦ª à¦«à§à¦°à¦¾à¦¨à§à¦¸à¦¿à¦¸', 'à¦†à¦—à¦¸à§à¦Ÿà§‡ à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦ž', '2017-11-27 00:00:00', 1, 0, 3),
(42, 'à¦†à¦—à¦¸à§à¦Ÿà§‡ à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦žà§‡à¦° ', 'à¦†à¦—à¦¸à§à¦Ÿà§‡ à¦°à§‹à¦¹à¦¿à¦™à§à¦—à¦¾à¦¦à§‡à¦° à¦“à¦ªà¦° à¦œà¦¾à¦¤à¦¿à¦—à¦¤ à¦¨à¦¿à¦§à¦¨à¦¯à¦œà§à¦ž', '2017-11-27 00:00:00', 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pagescomments`
--

CREATE TABLE `pagescomments` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagescomments`
--

INSERT INTO `pagescomments` (`id`, `pageId`, `userId`, `dateTime`, `comment`) VALUES
(1, 23, 1, '2017-11-25 19:35:53', 'Vua circular, nebe na amni, ai shorkar er bichar chai'),
(2, 23, 1, '2017-11-25 19:45:52', 'Tui rajakar, shorkarer unnoyon chash na'),
(3, 23, 1, '2017-11-25 19:46:19', 'Tomra galagali koro na, gothon mulok shomalochona koro'),
(4, 4, 1, '2017-12-06 18:19:44', 'good news'),
(5, 4, 1, '2017-12-06 18:24:10', 'very very good news'),
(6, 4, 1, '2017-12-06 18:24:16', 'I like the news');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cityId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `contact`, `email`, `address`, `cityId`) VALUES
(1, 'Masum Miah', '017171434243234', 'masum@gmail.com', 'NA', 1),
(2, 'Asaduzzaman Arif', '01234353678', 'asad.ist@gmail.com', 'Mohammadpur', 1),
(3, 'Titash Islam', '012343536789', 'titas@yahoo.com', 'NA NA NA NA', 2),
(4, 'Angel Jerin Baby', '0123435', '122323@ad.com', 'NA NA NA NA NA', 6),
(5, '<b>Afia</b>', '67567576', 'afia@gmail.com', '<> fsdf fdsf dsf', 2),
(6, 'Abdul alim', '01234353678', '122322333334444@tbs.com', '<iframe src="somebadsite.com" width="500" height="500"></iframe>', 2),
(7, 'Taher', '<i>65476576567', '1223@ad.com2', 'jhgdhjf ggfjhsdghgsfjh ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createIP` varchar(200) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `createDate`, `createIP`, `type`) VALUES
(1, 'Mr Admin Mollah', '01717420420', 'admin@system.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-27 19:03:16', '127.0.0.1', 'A'),
(2, 'Mr User ALi Tobarok', '01912420420', 'user@system.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-27 19:05:00', '127.90.09.0', 'U'),
(3, 'Kodom Ali Bhuyan', '7643345677', 'kodom@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-29 18:47:25', '::1', 'A'),
(4, 'Mr Abul & Co', '01917878864', 'abul@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-29 18:59:36', '::1', 'U'),
(5, 'Mobul Bhuyan', '567567576576', 'mokbul@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-29 19:02:37', '::1', 'U'),
(6, 'Abdul Hai', '567576567', 'abdul@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-11-29 19:27:33', '::1', 'U'),
(7, 'Mollah Ali Khan', '89767867567567', 'khan@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2017-12-04 18:17:10', '::1', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `usersactive`
--

CREATE TABLE `usersactive` (
  `userId` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersactive`
--

INSERT INTO `usersactive` (`userId`, `ip`, `dateTime`) VALUES
(1, '78', '2017-11-29 19:06:43'),
(6, '::1', '2017-11-29 19:32:53'),
(3, '::1', '2017-12-04 18:16:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `pagefile`
--
ALTER TABLE `pagefile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageimage`
--
ALTER TABLE `pageimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagelikes`
--
ALTER TABLE `pagelikes`
  ADD PRIMARY KEY (`pageId`,`userId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `pagescomments`
--
ALTER TABLE `pagescomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersactive`
--
ALTER TABLE `usersactive`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagefile`
--
ALTER TABLE `pagefile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pageimage`
--
ALTER TABLE `pageimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pagescomments`
--
ALTER TABLE `pagescomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
