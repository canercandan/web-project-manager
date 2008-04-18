-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Ven 18 Avril 2008 à 10:36
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
  `activity_name` varchar(20) default NULL,
  `activity_charge_total` int(11) default NULL,
  `activity_date_begin` date default NULL,
  `activity_date_end` date default NULL,
  `activity_describtion` text,
  PRIMARY KEY  (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

-- 
-- Contenu de la table `tw_activity`
-- 

INSERT INTO `tw_activity` (`activity_id`, `activity_project_id`, `activity_parent_id`, `activity_name`, `activity_charge_total`, `activity_date_begin`, `activity_date_end`, `activity_describtion`) VALUES 
(57, 1, 56, '32', 23, '0000-00-00', '0000-00-00', '3232'),
(56, 1, 46, 'toto', 23, '0000-00-00', '0000-00-00', ''),
(55, 1, 46, 'toto', 23, '2005-07-04', '0000-00-00', ''),
(54, 1, 0, 'toto', 4534, NULL, NULL, NULL),
(53, 13, 51, 'sousousAct3', 38, '2008-03-10', '0000-00-00', ''),
(52, 13, 51, 'sousousAct', 432, '2008-03-08', '0000-00-00', ''),
(51, 13, 0, 'dsfds', 470, '2008-03-03', '0000-00-00', ''),
(50, 1, 0, 'dew', 1, '2008-03-10', '0000-00-00', 'few'),
(49, 1, 39, 'dfgdfgd', 3, '2008-01-09', '0000-00-00', ''),
(48, 1, 40, 'rew', 670, '0000-00-00', '0000-00-00', ''),
(47, 5, 0, '32132', 2147483647, '2008-03-09', '0000-00-00', '321e4'),
(46, 1, 0, 'dvds', 46, '0000-00-00', '0000-00-00', 'ytuy'),
(39, 1, 0, 'blabla', 673, '2005-03-01', '0000-00-00', ''),
(45, 9, 0, 'eww', 42, '2008-03-07', '0000-00-00', ''),
(44, 1, 0, 'desd', 223, '2001-02-17', '0000-00-00', ''),
(43, 1, 0, 'ffd', 1, '2006-01-09', '0000-00-00', ''),
(42, 2, 0, '3ew', 4, '2008-03-07', '0000-00-00', 'ewdw'),
(41, 1, 0, 'dfgdf', 200, '2011-01-09', '0000-00-00', 'dwdw'),
(40, 1, 39, 'nom', 670, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_activity_dependance`
-- 

CREATE TABLE `tw_activity_dependance` (
  `activity_dependance_activity_id` int(11) NOT NULL,
  `activity_dependance_dependof_id` int(11) NOT NULL,
  PRIMARY KEY  (`activity_dependance_activity_id`,`activity_dependance_dependof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_activity_dependance`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `tw_activity_member`
-- 

CREATE TABLE `tw_activity_member` (
  `activity_member_activity_id` int(11) NOT NULL,
  `activity_member_usr_id` int(11) NOT NULL,
  `activity_level` int(11) NOT NULL,
  `activity_work` int(11) NOT NULL,
  `activity_hour_work` int(11) NOT NULL,
  PRIMARY KEY  (`activity_member_activity_id`,`activity_member_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_activity_member`
-- 

INSERT INTO `tw_activity_member` (`activity_member_activity_id`, `activity_member_usr_id`, `activity_level`, `activity_work`, `activity_hour_work`) VALUES 
(44, 1, 0, 0, 16),
(39, 4, 0, 0, 16),
(12, 1, 0, 1, 16),
(51, 1, 0, 0, 16),
(52, 0, 0, 0, 16),
(41, 1, 0, 1, 16),
(40, 2, 0, 0, 16),
(41, 2, 0, 1, 16),
(39, 2, 0, 0, 16),
(49, 4, 0, 1, 16),
(48, 2, 0, 1, 16),
(43, 4, 0, 1, 16),
(43, 2, 0, 1, 16),
(44, 2, 0, 1, 16),
(50, 2, 0, 1, 16),
(50, 4, 0, 1, 16),
(46, 2, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_location`
-- 

CREATE TABLE `tw_location` (
  `location_id` int(11) NOT NULL auto_increment,
  `location_name` varchar(30) default NULL,
  `location_address` text,
  PRIMARY KEY  (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  PRIMARY KEY  (`member_project_id`,`member_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_member`
-- 

INSERT INTO `tw_member` (`member_project_id`, `member_usr_id`, `member_role_id`) VALUES 
(1, 2, 2),
(5, 2, 1),
(1, 4, 1),
(2, 1, 1),
(2, 2, NULL),
(5, 1, NULL),
(8, 1, NULL),
(8, 2, NULL),
(13, 1, 3),
(13, 2, 2);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_member_role`
-- 

CREATE TABLE `tw_member_role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(30) default NULL,
  `add_activity` int(11) NOT NULL default '0',
  `admin_all` int(11) NOT NULL default '0',
  `add_member` int(11) NOT NULL default '0',
  `kick_member` int(11) NOT NULL default '0',
  `add_member_activity` int(11) NOT NULL default '0',
  `kick_member_activity` int(11) NOT NULL default '0',
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `tw_member_role`
-- 

INSERT INTO `tw_member_role` (`role_id`, `role_name`, `add_activity`, `admin_all`, `add_member`, `kick_member`, `add_member_activity`, `kick_member_activity`) VALUES 
(1, 'Chef de projet', 0, 0, 0, 0, 0, 0),
(2, 'Developpeur', 0, 0, 0, 0, 0, 0),
(3, 'Observateur', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_profil`
-- 

CREATE TABLE `tw_profil` (
  `profil_usr_id` int(11) NOT NULL,
  `profil_location_id` int(11) default NULL,
  `profil_name` varchar(30) default NULL,
  `profil_fname` varchar(30) default NULL,
  `profil_fphone` varchar(15) default NULL,
  `profil_mphone` varchar(15) default NULL,
  `profil_title_id` int(11) NOT NULL,
  `profil_perso_adress` text NOT NULL,
  PRIMARY KEY  (`profil_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `tw_profil`
-- 

INSERT INTO `tw_profil` (`profil_usr_id`, `profil_location_id`, `profil_name`, `profil_fname`, `profil_fphone`, `profil_mphone`, `profil_title_id`, `profil_perso_adress`) VALUES 
(1, 1, 'Soyer', 'Tom', '043256532', '064211233', 1, '10, rue des oublies'),
(2, 2, 'Paul', 'Pierre3', '1234567', '32514232', 3, '56, avenue Jack\r\n96432 Paris'),
(3, NULL, NULL, NULL, NULL, NULL, 0, ''),
(4, 1, 'Roser', 'Marc', '0388643989', '0607658589', 1, '32, rue du General de Gaulle 67640 LIPSHEIM');

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
  `usr_login` varchar(20) default NULL,
  `usr_passwd` varchar(40) default NULL,
  `usr_email` varchar(150) default NULL,
  `usr_date` date default NULL,
  `usr_level_id` int(11) NOT NULL,
  PRIMARY KEY  (`usr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `tw_usr`
-- 

INSERT INTO `tw_usr` (`usr_id`, `usr_login`, `usr_passwd`, `usr_email`, `usr_date`, `usr_level_id`) VALUES 
(1, 'tom', 'passtom', 'tom@mail.com', '2008-02-21', 1),
(2, 'pierre', 'pierrepass', 'pierre@mail.com', '2008-02-13', 3),
(3, 'tomd', '7e6045f96935f5bd1970ff52248f5a7594e962a6', 'tom@mail.com', '2008-02-25', 4),
(4, 'Marc', 'd382ddd703b2d1cc353c84030284c4d566ef3d13', 'roser_m@epitech.net', '2008-03-10', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_usr_level`
-- 

CREATE TABLE `tw_usr_level` (
  `level_id` int(11) NOT NULL auto_increment,
  `level_name` varchar(30) default NULL,
  `admin_panel` int(11) NOT NULL default '0',
  `add_project` int(11) NOT NULL default '0',
  PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `tw_usr_level`
-- 

INSERT INTO `tw_usr_level` (`level_id`, `level_name`, `admin_panel`, `add_project`) VALUES 
(1, 'Administrator Root', 0, 0),
(2, 'Administrator', 0, 0),
(3, 'Chef de projet', 0, 0),
(4, 'Participant', 0, 0);
