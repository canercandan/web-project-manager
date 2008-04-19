-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Sam 19 Avril 2008 à 12:27
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `techweb`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `tw_member_role`
-- 

CREATE TABLE `tw_member_role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(30) default NULL,
  `add_activity` int(11) NOT NULL default '0',
  `add_member` int(11) NOT NULL default '0',
  `kick_member` int(11) NOT NULL default '0',
  `add_member_activity` int(11) NOT NULL default '0',
  `kick_member_activity` int(11) NOT NULL default '0',
  `remove_activity` int(11) NOT NULL default '0',
  `remove_project` int(11) NOT NULL default '0',
  `add_activity_ifmember` int(11) NOT NULL default '0',
  `remove_activity_ifmember` int(11) NOT NULL default '0',
  `add_member_activity_ifmember` int(11) NOT NULL default '0',
  `kick_member_activity_ifmember` int(11) NOT NULL default '0',
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `tw_member_role`
-- 

INSERT INTO `tw_member_role` (`role_id`, `role_name`, `add_activity`, `add_member`, `kick_member`, `add_member_activity`, `kick_member_activity`, `remove_activity`, `remove_project`, `add_activity_ifmember`, `remove_activity_ifmember`, `add_member_activity_ifmember`, `kick_member_activity_ifmember`) VALUES 
(1, 'Project''s Chief', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Developper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Observateur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Activity''s Chief', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1);
