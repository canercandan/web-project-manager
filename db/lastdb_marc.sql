-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Ven 22 Février 2008 à 16:51
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `techweb`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_activity`
-- 

CREATE TABLE `tw_activity` (
  `activity_id` int(11) NOT NULL auto_increment,
  `activity_project_id` int(11) default NULL,
  `activity_parent_id` int(11) default NULL,
  `activity_name` varchar(30) default NULL,
  `activity_charge_total` int(11) default NULL,
  `activity_date_begin` date default NULL,
  `activity_date_end` date default NULL,
  `activity_describtion` text,
  PRIMARY KEY  (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Contenu de la table `tw_activity`
-- 

INSERT INTO `tw_activity` (`activity_id`, `activity_project_id`, `activity_parent_id`, `activity_name`, `activity_charge_total`, `activity_date_begin`, `activity_date_end`, `activity_describtion`) VALUES 
(1, 0, 0, 'test', 9, '2008-02-20', NULL, 'descri'),
(2, 0, 0, 'sdc', 3769, '2008-02-20', NULL, 'ds'),
(3, 0, 1, 'sousact', 4, '2008-02-21', '2008-02-23', 'blabla'),
(4, 0, 2, 'testd', 403, '2008-02-21', NULL, 'wqq'),
(5, 0, 2, 'testd', 3121, '2008-02-21', NULL, 'wqq'),
(6, 0, 2, 'testd', 245, '2008-02-21', NULL, 'aqsaq'),
(7, 0, 5, 'testd', 3121, '2008-02-21', NULL, 'aqsaq'),
(8, 0, 6, 'bla', 245, '2008-02-21', NULL, 'toto'),
(9, 0, 1, 'ddw', 5, '2008-02-22', NULL, NULL),
(10, 0, 9, 'breaker', 5, '2008-02-21', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_activity_member`
-- 

CREATE TABLE `tw_activity_member` (
  `activity_member_activity_id` int(11) NOT NULL,
  `activity_member_usr_id` int(11) NOT NULL,
  `activity_level` int(11) NOT NULL,
  `activity_member_date_start` date NOT NULL,
  `activity_member_date_end` date default NULL,
  `activity_work` int(1) NOT NULL default '1',
  PRIMARY KEY  (`activity_member_usr_id`,`activity_member_activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_activity_member`
-- 

INSERT INTO `tw_activity_member` (`activity_member_activity_id`, `activity_member_usr_id`, `activity_level`, `activity_member_date_start`, `activity_member_date_end`, `activity_work`) VALUES 
(1, 2, 1, '2008-02-21', NULL, 1),
(3, 2, 1, '2008-02-21', NULL, 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_location`
-- 

CREATE TABLE `tw_location` (
  `location_id` int(11) NOT NULL auto_increment,
  `location_name` varchar(30) default NULL,
  `location_address` text,
  PRIMARY KEY  (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `tw_location`
-- 

INSERT INTO `tw_location` (`location_id`, `location_name`, `location_address`) VALUES 
(1, 'Epitech Strasbourg', '10, rue de la province\r\n67890 Strasbourg'),
(2, 'Epitech Paris', '14, rue des Anti-Provinciaux\r\n96100 Paris');

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_member`
-- 

CREATE TABLE `tw_member` (
  `member_project_id` int(11) NOT NULL default '0',
  `member_usr_id` int(11) NOT NULL default '0',
  `member_role_id` int(11) default NULL,
  `member_date_start` date NOT NULL,
  `member_date_end` date default NULL,
  PRIMARY KEY  (`member_project_id`,`member_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_member`
-- 

INSERT INTO `tw_member` (`member_project_id`, `member_usr_id`, `member_role_id`, `member_date_start`, `member_date_end`) VALUES 
(0, 1, 1, '2008-02-20', NULL),
(0, 2, 2, '2008-02-21', NULL);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_member_role`
-- 

CREATE TABLE `tw_member_role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(30) default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `tw_member_role`
-- 

INSERT INTO `tw_member_role` (`role_id`, `role_name`) VALUES 
(1, 'Chef de projet'),
(2, 'Developpeur'),
(3, 'Observateur');

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_profil`
-- 

CREATE TABLE `tw_profil` (
  `profil_id` int(11) NOT NULL auto_increment,
  `profil_location_id` int(11) default NULL,
  `profil_name` varchar(30) default NULL,
  `profil_fname` varchar(30) default NULL,
  `profil_fphone` varchar(15) default NULL,
  `profil_mphone` varchar(15) default NULL,
  `profil_title_id` int(11) NOT NULL,
  `profil_perso_adress` text NOT NULL,
  PRIMARY KEY  (`profil_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `tw_profil`
-- 

INSERT INTO `tw_profil` (`profil_id`, `profil_location_id`, `profil_name`, `profil_fname`, `profil_fphone`, `profil_mphone`, `profil_title_id`, `profil_perso_adress`) VALUES 
(1, 1, 'Soyer', 'Tom', '043256532', '064211233', 1, '10, rue des oublies'),
(2, 2, 'Paul', 'Pierre', '1234567', '32514232', 3, '56, avenue Jack\r\n96432 Paris');

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
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `tw_project`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `tw_title`
-- 

CREATE TABLE `tw_title` (
  `title_id` int(11) NOT NULL auto_increment,
  `title_name` varchar(30) default NULL,
  PRIMARY KEY  (`title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `tw_title`
-- 

INSERT INTO `tw_title` (`title_id`, `title_name`) VALUES 
(1, 'Developpeur'),
(2, 'Designer'),
(3, 'Graphist');

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_usr`
-- 

CREATE TABLE `tw_usr` (
  `usr_id` int(11) NOT NULL auto_increment,
  `usr_profil_id` int(11) default NULL,
  `usr_login` varchar(20) default NULL,
  `usr_passwd` varchar(40) default NULL,
  `usr_email` varchar(150) default NULL,
  `usr_date` date default NULL,
  `usr_usr_level_id` int(11) NOT NULL,
  PRIMARY KEY  (`usr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `tw_usr`
-- 

INSERT INTO `tw_usr` (`usr_id`, `usr_profil_id`, `usr_login`, `usr_passwd`, `usr_email`, `usr_date`, `usr_usr_level_id`) VALUES 
(1, 1, 'tom', 'passtom', 'tom@mail.com', '2008-02-21', 1),
(2, 2, 'pierre', 'pierrepass', 'pierre@mail.com', '2008-02-13', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_usr_level`
-- 

CREATE TABLE `tw_usr_level` (
  `level_id` int(11) NOT NULL auto_increment,
  `level_name` varchar(30) default NULL,
  PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `tw_usr_level`
-- 

INSERT INTO `tw_usr_level` (`level_id`, `level_name`) VALUES 
(1, 'Administrator Root'),
(2, 'Administrator'),
(3, 'Chef de projet'),
(4, 'Participant');
