-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2015 at 04:53 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `callapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(8) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `password_reset_token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `first_name`, `last_name`, `address`, `city`, `state`, `zip`, `access_token`, `password_reset_token`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'adminName', 'adminLastName', '2421 SW', 'Miami', '3', 33155, '', ''),
(5, 'user1', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '2', '3', '4', '1', 12345, '', ''),
(6, 'user2', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '2', '3', '4', '2', 12345, '', ''),
(7, 'user3', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '2', '3', '4', '4', 54321, '', ''),
(8, 'pedro', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'pedro', 'castineiras', '2421 sw', 'Manhattan', '2', 12354, '', ''),
(9, 'user4', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'q', 'w', 'e', 'r', '1', 33155, '', ''),
(10, 'user5', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'adf', 'km', 'km', 'dfwef', '1', 33155, '', '');
