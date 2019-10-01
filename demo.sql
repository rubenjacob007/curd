-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 11:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `textarea`
--

CREATE TABLE IF NOT EXISTS `textarea` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textarea`
--

INSERT INTO `textarea` (`id`, `email`, `message`) VALUES
(0, 'abc@gmail.com', '<pre><table border="0" cellspacing="0"><colgroup width="368"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td align="left" height="17">&lt;body bg="yellow"&gt;</td>\r\n</tr>\r\n</tbody>\r\n</table></pre>'),
(0, 'xyz@gmaill.com', '<pre><table border="0" cellspacing="0"><colgroup width="368"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td align="left" height="17">&lt;body bg="yellow"&gt;</td>\r\n</tr>\r\n</tbody>\r\n</table></pre>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `qualificaction` varchar(100) NOT NULL,
  `state` char(50) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `regDate` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `qualificaction`, `state`, `dob`, `pic`, `regDate`) VALUES
(4, 'ankita', 'ankit@gmail.com', '50b2d975ef183a4521055721b3743106', 99999999, 'dddd', 'm', 'mca,bca', 'UP', '2017-11-29', 'hd-wallpaper-images-16.jpg', '2017-12-19 16:34:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
