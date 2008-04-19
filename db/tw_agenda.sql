-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2008 at 10:45 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `techweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tw_agenda`
--

CREATE TABLE IF NOT EXISTS `tw_agenda` (
  `agenda_id` int(11) NOT NULL auto_increment,
  `agenda_project_id` int(11) NOT NULL,
  `agenda_usr_id` int(11) NOT NULL,
  `agenda_date` datetime NOT NULL,
  `agenda_subject` varchar(255) NOT NULL,
  `agenda_body` text NOT NULL,
  PRIMARY KEY  (`agenda_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tw_agenda`
--

INSERT INTO `tw_agenda` (`agenda_id`, `agenda_project_id`, `agenda_usr_id`, `agenda_date`, `agenda_subject`, `agenda_body`) VALUES
(1, 13, 3, '2008-04-18 15:55:21', 'RDV crew', 'Soyez tous la !!!!'),
(2, 13, 1, '2008-04-18 21:44:06', 'Init the project', 'init the project system'),
(3, 13, 3, '2008-04-18 21:48:00', 'coucou', 'cdsofdsgds'),
(4, 13, 3, '2008-04-04 03:30:00', 'RDV avec tout le monde', 'Soyez touss la c\\''est un ordre !!!\r\n\r\n\r\nEntendu ?????'),
(5, 13, 3, '2008-04-04 03:30:00', '', ''),
(6, 13, 3, '2008-04-04 08:11:00', 'test', 'test'),
(7, 13, 3, '2008-06-03 03:30:00', 'Anniversaire de Alex', 'attention c\\''est la fete !!!\r\n\r\n\r\nPreparez les cadeaux >>>');
