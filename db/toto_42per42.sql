-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Ven 18 Avril 2008 à 10:30
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `techweb`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_project`
-- 

CREATE TABLE `tw_project` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_autor_usr_id` int(11) default NULL,
  `project_name` varchar(30) default NULL,
  `project_describ` text,
  `project_date` date default NULL,
  `project_date_end` date NOT NULL,
  `project_hour_per_day` int(11) NOT NULL,
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Contenu de la table `tw_project`
-- 

INSERT INTO `tw_project` (`project_id`, `project_autor_usr_id`, `project_name`, `project_describ`, `project_date`, `project_date_end`, `project_hour_per_day`) VALUES 
(1, 2, 'dwdtestrddsddd', 'dwdwfdf efe', '2001-07-31', '2013-03-05', 0),
(2, 1, 'nom_proj2', 'desc2', '2008-02-12', '0000-00-00', 0),
(5, 0, '<name><b>sans auteur</b>', 'dwd', '2008-02-28', '0000-00-00', 0),
(6, 0, 'dsd', 'sdsds', '2008-02-28', '0000-00-00', 0),
(7, 0, 'sdds', 'dd', '2008-02-28', '0000-00-00', 0),
(8, 0, 'wd', 'dwdew', '2008-02-28', '0000-00-00', 0),
(9, 0, 'dcss', '', '2008-03-07', '0000-00-00', 0),
(10, 0, '3ewfd', 'dsw', '2008-03-10', '0000-00-00', 0),
(11, 0, 'ewfwdsfc', 'e', '2008-10-10', '0000-00-00', 0),
(12, 4, 'aaaAAA', 'dw', '2008-03-10', '0000-00-00', 0),
(13, 0, 'Proj', '', '2008-03-01', '0000-00-00', 0),
(14, 4, 'test', 'toto', '2008-03-26', '2008-03-26', 0),
(15, 4, 'toto', 'rere', '2008-03-26', '2008-03-26', 0),
(16, 4, 'ddds', 'desc', '2008-03-26', '2008-03-26', 8);
