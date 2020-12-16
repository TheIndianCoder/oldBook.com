-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2020 at 06:37 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bdata`
--

CREATE TABLE IF NOT EXISTS `bdata` (
  `B_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `B_name` varchar(50) NOT NULL,
  `B_img1` varchar(100) NOT NULL,
  `B_img2` varchar(100) NOT NULL,
  `B_price` varchar(100) NOT NULL,
  `B_writer` text NOT NULL,
  `B_pub` varchar(50) NOT NULL,
  `B_des` text NOT NULL,
  `date` date NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `state` text NOT NULL,
  `dist` text NOT NULL,
  `pincode` int(8) NOT NULL,
  `seller_number` varchar(15) NOT NULL,
  `show_phone` varchar(5) NOT NULL,
  PRIMARY KEY (`B_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `bdata`
--

INSERT INTO `bdata` (`B_id`, `cat_id`, `cat_name`, `B_name`, `B_img1`, `B_img2`, `B_price`, `B_writer`, `B_pub`, `B_des`, `date`, `keyword`, `state`, `dist`, `pincode`, `seller_number`, `show_phone`) VALUES
(23, 1, 'engineering', '.NetProgramming', 'image/.NetGame.jpeg', 'image/.Netgaming.jpeg', '500', ' unknown', 'APraceMedia LCC', 'This is good book for learn .net programming', '2020-05-21', '.netprogramming programming', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(24, 1, 'Engineering', 'AdvanceMatlab', 'image/AEMWMatlab.jpeg', 'image/AEMWMatlab.jpeg', '500', ' Dean', 'unknown', 'This is good book for learning graphics skils in 2d amd 3d', '2020-05-21', 'matlab', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(25, 1, 'Engineering', 'Automobile Engg.', 'image/Automobile.jpeg', 'image/Automobile2.jpeg', '300', ' Dr.Kripal Singh', 'Standerd', 'This is good book for student of automobile engineering ', '2020-05-21', 'automobileengineering  emgineeringbook', 'Bihar', 'Bhagalpur', 813204, '8709365153', 'on'),
(26, 1, 'Engineering', 'BasicsElectronics', 'image/Basics electronics.jpeg', 'image/Basics electronics.jpeg', '350', ' SChand', 'unknown', 'This book for most attractive for the electronics engineering student', '2020-05-21', 'electronics engineeringbook', 'Bihar', 'patna', 813204, '8709365153', 'on'),
(27, 1, 'Engineering', 'C language', 'image/C Programming.jpeg', 'image/C Programming.jpeg', '200', ' Biswadip pal', 'unknown', 'This book is moost helpfull for computer science student to build programming Knowledge', '2020-05-21', 'clanguage,programming', 'Bihar', 'Bhagalpur', 813204, '8709365153', 'on'),
(28, 1, 'Engineering', 'C++', 'image/C++.jpeg', 'image/C++.jpeg', '300', ' E Balaguruswami', 'unknown', 'This book is helpfull for the computer science student for build object oriented programming language', '2020-05-21', 'c++  languagebook programmingbook', 'Bihar', 'Bhagalpur', 813204, '8709365153', 'on'),
(29, 1, 'Engineering', 'business', 'image/CA in Business.jpeg', 'image/CA in Business.jpeg', '100', ' Dr.R', 'unknown', 'This book Computer Application for business is helpfull for the computer science student for build business with computer application.', '2020-05-21', 'computerscience applicationbusiness business', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(30, 1, 'Engineering', 'cemical engg.', 'image/Cemical Engineering.jpeg', 'image/Cemical Engineering.jpeg', '500', ' YeongKooYeo', 'CRC Press', 'This book is developed only for the student of cemical engineering with matlab programming tools', '2020-05-21', 'cemicalengineering matlab', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(31, 1, 'Engineering', 'Nucilear Analysis', 'image/Cool-Nature-Wallpapers.jpeg', 'image/Cool-Nature-Wallpapers.jpeg', '350', ' GangLe', 'unknown', 'Theory of nonlinear structiarl analysis is best book for engineering student.', '2020-05-21', 'structrialengineering', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(32, 1, 'Engineering', 'Engineering book', 'image/engineering book.jpeg', 'image/engineering book.jpeg', '350', ' MarshalBrain', 'unknown', 'This book for the student of civil engineering .', '2020-05-21', 'civilengineering', 'Bihar', 'Patna', 800010, '8709365153', 'on'),
(33, 1, 'Engineering', 'Gameing book', 'image/Game with python.jpeg', 'image/Game with python.jpeg', '500', ' WillMCguan', 'Apress', 'The one of the best book for the develop gmae in ptho programming language.', '2020-05-21', 'gameingbook python', 'Bihar', 'patna', 800010, '8709365153', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `b_cat`
--

CREATE TABLE IF NOT EXISTS `b_cat` (
  `cat_id` int(50) NOT NULL AUTO_INCREMENT,
  `B_cat` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `b_cat`
--

INSERT INTO `b_cat` (`cat_id`, `B_cat`) VALUES
(1, 'Engineering'),
(2, 'Medical'),
(3, 'Management'),
(4, 'Science'),
(5, 'Commerce'),
(6, 'Arts'),
(7, 'Design'),
(8, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `u_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `name`, `mobile`, `email`, `password`) VALUES
(4, 'Mithun Kumar', '8709365153', 'mkumar870935@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE IF NOT EXISTS `user_email` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `user_email`) VALUES
(1, 'abc@gmail.com'),
(16, 'mkumar870936@gmail.com');
