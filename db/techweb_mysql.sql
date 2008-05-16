-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2008 at 10:52 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `techweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `phorum_banlists`
--

CREATE TABLE IF NOT EXISTS `phorum_banlists` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `forum_id` int(10) unsigned NOT NULL default '0',
  `type` tinyint(4) NOT NULL default '0',
  `pcre` tinyint(1) NOT NULL default '0',
  `string` varchar(255) NOT NULL default '',
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_banlists`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_files`
--

CREATE TABLE IF NOT EXISTS `phorum_files` (
  `file_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `filename` varchar(255) NOT NULL default '',
  `filesize` int(10) unsigned NOT NULL default '0',
  `file_data` mediumtext NOT NULL,
  `add_datetime` int(10) unsigned NOT NULL default '0',
  `message_id` int(10) unsigned NOT NULL default '0',
  `link` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`file_id`),
  KEY `add_datetime` (`add_datetime`),
  KEY `message_id_link` (`message_id`,`link`),
  KEY `user_id_link` (`user_id`,`link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_forums`
--

CREATE TABLE IF NOT EXISTS `phorum_forums` (
  `forum_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  `description` text NOT NULL,
  `template` varchar(50) NOT NULL default '',
  `folder_flag` tinyint(1) NOT NULL default '0',
  `parent_id` int(10) unsigned NOT NULL default '0',
  `list_length_flat` int(10) unsigned NOT NULL default '0',
  `list_length_threaded` int(10) unsigned NOT NULL default '0',
  `moderation` int(10) unsigned NOT NULL default '0',
  `threaded_list` tinyint(1) NOT NULL default '0',
  `threaded_read` tinyint(1) NOT NULL default '0',
  `float_to_top` tinyint(1) NOT NULL default '0',
  `check_duplicate` tinyint(1) NOT NULL default '0',
  `allow_attachment_types` varchar(100) NOT NULL default '',
  `max_attachment_size` int(10) unsigned NOT NULL default '0',
  `max_totalattachment_size` int(10) unsigned NOT NULL default '0',
  `max_attachments` int(10) unsigned NOT NULL default '0',
  `pub_perms` int(10) unsigned NOT NULL default '0',
  `reg_perms` int(10) unsigned NOT NULL default '0',
  `display_ip_address` tinyint(1) NOT NULL default '1',
  `allow_email_notify` tinyint(1) NOT NULL default '1',
  `language` varchar(100) NOT NULL default 'english',
  `email_moderators` tinyint(1) NOT NULL default '0',
  `message_count` int(10) unsigned NOT NULL default '0',
  `sticky_count` int(10) unsigned NOT NULL default '0',
  `thread_count` int(10) unsigned NOT NULL default '0',
  `last_post_time` int(10) unsigned NOT NULL default '0',
  `display_order` int(10) unsigned NOT NULL default '0',
  `read_length` int(10) unsigned NOT NULL default '0',
  `vroot` int(10) unsigned NOT NULL default '0',
  `edit_post` tinyint(1) NOT NULL default '1',
  `template_settings` text NOT NULL,
  `forum_path` text NOT NULL,
  `count_views` tinyint(1) NOT NULL default '0',
  `count_views_per_thread` tinyint(1) NOT NULL default '0',
  `display_fixed` tinyint(1) NOT NULL default '0',
  `reverse_threading` tinyint(1) NOT NULL default '0',
  `inherit_id` int(10) unsigned default NULL,
  `cache_version` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`forum_id`),
  KEY `name` (`name`),
  KEY `active` (`active`,`parent_id`),
  KEY `group_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `phorum_forums`
--

INSERT INTO `phorum_forums` (`forum_id`, `name`, `active`, `description`, `template`, `folder_flag`, `parent_id`, `list_length_flat`, `list_length_threaded`, `moderation`, `threaded_list`, `threaded_read`, `float_to_top`, `check_duplicate`, `allow_attachment_types`, `max_attachment_size`, `max_totalattachment_size`, `max_attachments`, `pub_perms`, `reg_perms`, `display_ip_address`, `allow_email_notify`, `language`, `email_moderators`, `message_count`, `sticky_count`, `thread_count`, `last_post_time`, `display_order`, `read_length`, `vroot`, `edit_post`, `template_settings`, `forum_path`, `count_views`, `count_views_per_thread`, `display_fixed`, `reverse_threading`, `inherit_id`, `cache_version`) VALUES
(1, 'Announcements', 1, 'Read this forum first to find out the latest information.', 'emerald', 0, 0, 30, 15, 0, 0, 0, 0, 0, '', 0, 0, 0, 1, 3, 0, 1, 'english', 0, 0, 0, 0, 0, 99, 20, 0, 1, '', 'a:2:{i:0;s:8:"Phorum 5";i:1;s:13:"Announcements";}', 0, 0, 0, 0, NULL, 0),
(2, 'Test Forum', 1, 'This is a test forum.  Feel free to delete it or edit after installation, using the admin interface.', 'emerald', 0, 1, 30, 15, 0, 0, 0, 1, 0, '', 0, 0, 0, 1, 15, 0, 1, 'english', 0, 1, 0, 1, 1210923633, 0, 20, 0, 1, '', 'a:2:{i:0;s:8:"Phorum 5";i:2;s:10:"Test Forum";}', 0, 0, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phorum_forum_group_xref`
--

CREATE TABLE IF NOT EXISTS `phorum_forum_group_xref` (
  `forum_id` int(10) unsigned NOT NULL default '0',
  `group_id` int(10) unsigned NOT NULL default '0',
  `permission` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`forum_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_forum_group_xref`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_groups`
--

CREATE TABLE IF NOT EXISTS `phorum_groups` (
  `group_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `open` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_messages`
--

CREATE TABLE IF NOT EXISTS `phorum_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `forum_id` int(10) unsigned NOT NULL default '0',
  `thread` int(10) unsigned NOT NULL default '0',
  `parent_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  `author` varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  `body` text NOT NULL,
  `email` varchar(100) NOT NULL default '',
  `ip` varchar(255) NOT NULL default '',
  `status` tinyint(4) NOT NULL default '2',
  `msgid` varchar(100) NOT NULL default '',
  `modifystamp` int(10) unsigned NOT NULL default '0',
  `thread_count` int(10) unsigned NOT NULL default '0',
  `moderator_post` tinyint(1) NOT NULL default '0',
  `sort` tinyint(4) NOT NULL default '2',
  `datestamp` int(10) unsigned NOT NULL default '0',
  `meta` mediumtext,
  `viewcount` int(10) unsigned NOT NULL default '0',
  `threadviewcount` int(10) unsigned NOT NULL default '0',
  `closed` tinyint(1) NOT NULL default '0',
  `recent_message_id` int(10) unsigned NOT NULL default '0',
  `recent_user_id` int(10) unsigned NOT NULL default '0',
  `recent_author` varchar(255) NOT NULL default '',
  `moved` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`message_id`),
  KEY `thread_message` (`thread`,`message_id`),
  KEY `thread_forum` (`thread`,`forum_id`),
  KEY `special_threads` (`sort`,`forum_id`),
  KEY `status_forum` (`status`,`forum_id`),
  KEY `list_page_float` (`forum_id`,`parent_id`,`modifystamp`),
  KEY `list_page_flat` (`forum_id`,`parent_id`,`thread`),
  KEY `new_count` (`forum_id`,`status`,`moved`,`message_id`),
  KEY `new_threads` (`forum_id`,`status`,`parent_id`,`moved`,`message_id`),
  KEY `recent_threads` (`status`,`parent_id`,`message_id`),
  KEY `updated_threads` (`status`,`parent_id`,`modifystamp`),
  KEY `dup_check` (`forum_id`,`author`(50),`subject`,`datestamp`),
  KEY `forum_max_message` (`forum_id`,`message_id`,`status`,`parent_id`),
  KEY `last_post_time` (`forum_id`,`status`,`modifystamp`),
  KEY `next_prev_thread` (`forum_id`,`status`,`thread`),
  KEY `user_id` (`user_id`),
  KEY `recent_user_id` (`recent_user_id`),
  KEY `user_messages` (`user_id`,`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phorum_messages`
--

INSERT INTO `phorum_messages` (`message_id`, `forum_id`, `thread`, `parent_id`, `user_id`, `author`, `subject`, `body`, `email`, `ip`, `status`, `msgid`, `modifystamp`, `thread_count`, `moderator_post`, `sort`, `datestamp`, `meta`, `viewcount`, `threadviewcount`, `closed`, `recent_message_id`, `recent_user_id`, `recent_author`, `moved`) VALUES
(1, 2, 1, 0, 0, 'Phorum Installer', 'Test Message', 'This is a test message. You can delete it after installation using the moderation tools. These tools will be visible in this screen if you log in as the administrator user that you created during install.\n\nPhorum 5 Team', '', '127.0.0.1', 2, '', 1210923633, 1, 0, 2, 1210923633, 'a:2:{s:11:"message_ids";a:1:{i:0;i:1;}s:21:"message_ids_moderator";a:1:{i:0;i:1;}}', 0, 0, 0, 1, 0, 'Phorum Installer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phorum_messages_edittrack`
--

CREATE TABLE IF NOT EXISTS `phorum_messages_edittrack` (
  `track_id` int(10) unsigned NOT NULL auto_increment,
  `message_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  `time` int(10) unsigned NOT NULL default '0',
  `diff_body` text,
  `diff_subject` text,
  PRIMARY KEY  (`track_id`),
  KEY `message_id` (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_messages_edittrack`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_pm_buddies`
--

CREATE TABLE IF NOT EXISTS `phorum_pm_buddies` (
  `pm_buddy_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `buddy_user_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pm_buddy_id`),
  UNIQUE KEY `userids` (`user_id`,`buddy_user_id`),
  KEY `buddy_user_id` (`buddy_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_pm_buddies`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_pm_folders`
--

CREATE TABLE IF NOT EXISTS `phorum_pm_folders` (
  `pm_folder_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `foldername` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`pm_folder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_pm_folders`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_pm_messages`
--

CREATE TABLE IF NOT EXISTS `phorum_pm_messages` (
  `pm_message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `author` varchar(255) NOT NULL default '',
  `subject` varchar(100) NOT NULL default '',
  `message` text NOT NULL,
  `datestamp` int(10) unsigned NOT NULL default '0',
  `meta` mediumtext NOT NULL,
  PRIMARY KEY  (`pm_message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_pm_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_pm_xref`
--

CREATE TABLE IF NOT EXISTS `phorum_pm_xref` (
  `pm_xref_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `pm_folder_id` int(10) unsigned NOT NULL default '0',
  `special_folder` varchar(10) default NULL,
  `pm_message_id` int(10) unsigned NOT NULL default '0',
  `read_flag` tinyint(1) NOT NULL default '0',
  `reply_flag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`pm_xref_id`),
  KEY `xref` (`user_id`,`pm_folder_id`,`pm_message_id`),
  KEY `read_flag` (`read_flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phorum_pm_xref`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_search`
--

CREATE TABLE IF NOT EXISTS `phorum_search` (
  `message_id` int(10) unsigned NOT NULL default '0',
  `forum_id` int(10) unsigned NOT NULL default '0',
  `search_text` mediumtext NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `forum_id` (`forum_id`),
  FULLTEXT KEY `search_text` (`search_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_search`
--

INSERT INTO `phorum_search` (`message_id`, `forum_id`, `search_text`) VALUES
(1, 2, 'Phorum Installer | Test Message | This is a test message. You can delete it after installation using the moderation tools. These tools will be visible in this screen if you log in as the administrator user that you created during install.\n\nPhorum 5 Team');

-- --------------------------------------------------------

--
-- Table structure for table `phorum_settings`
--

CREATE TABLE IF NOT EXISTS `phorum_settings` (
  `name` varchar(255) NOT NULL default '',
  `type` enum('V','S') NOT NULL default 'V',
  `data` text NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_settings`
--

INSERT INTO `phorum_settings` (`name`, `type`, `data`) VALUES
('title', 'V', 'Phorum 5'),
('description', 'V', 'Congratulations!  You have installed Phorum 5!  To change this text, go to your admin, choose General Settings and change the description'),
('cache', 'V', '/tmp'),
('session_timeout', 'V', '30'),
('short_session_timeout', 'V', '60'),
('tight_security', 'V', '0'),
('session_path', 'V', '/'),
('session_domain', 'V', ''),
('admin_session_salt', 'V', '0.68077600 1210923633'),
('cache_users', 'V', '0'),
('cache_rss', 'V', '0'),
('cache_newflags', 'V', '0'),
('cache_messages', 'V', '0'),
('cache_css', 'V', '1'),
('cache_javascript', 'V', '1'),
('use_cookies', 'V', '1'),
('use_bcc', 'V', '1'),
('use_rss', 'V', '1'),
('default_feed', 'V', 'rss'),
('internal_version', 'V', '2007031400'),
('internal_patchlevel', 'V', '2008031400'),
('PROFILE_FIELDS', 'S', 'a:0:{}'),
('enable_pm', 'V', '1'),
('display_name_source', 'V', 'username'),
('user_edit_timelimit', 'V', '0'),
('enable_new_pm_count', 'V', '1'),
('enable_dropdown_userlist', 'V', '1'),
('enable_moderator_notifications', 'V', '1'),
('show_new_on_index', 'V', '1'),
('dns_lookup', 'V', '1'),
('tz_offset', 'V', '0'),
('user_time_zone', 'V', '1'),
('user_template', 'V', '0'),
('registration_control', 'V', '1'),
('file_uploads', 'V', '0'),
('file_types', 'V', ''),
('max_file_size', 'V', ''),
('file_space_quota', 'V', ''),
('file_offsite', 'V', '0'),
('system_email_from_name', 'V', ''),
('hide_forums', 'V', '1'),
('track_user_activity', 'V', '86400'),
('track_edits', 'V', '0'),
('html_title', 'V', 'Phorum'),
('head_tags', 'V', ''),
('redirect_after_post', 'V', 'list'),
('reply_on_read_page', 'V', '1'),
('status', 'V', 'normal'),
('use_new_folder_style', 'V', '1'),
('default_forum_options', 'S', 'a:24:{s:8:"forum_id";i:0;s:10:"moderation";i:0;s:16:"email_moderators";i:0;s:9:"pub_perms";i:1;s:9:"reg_perms";i:15;s:13:"display_fixed";i:0;s:8:"template";s:7:"emerald";s:8:"language";s:7:"english";s:13:"threaded_list";i:0;s:13:"threaded_read";i:0;s:17:"reverse_threading";i:0;s:12:"float_to_top";i:1;s:16:"list_length_flat";i:30;s:20:"list_length_threaded";i:15;s:11:"read_length";i:30;s:18:"display_ip_address";i:0;s:18:"allow_email_notify";i:1;s:15:"check_duplicate";i:1;s:11:"count_views";i:2;s:15:"max_attachments";i:0;s:22:"allow_attachment_types";s:0:"";s:19:"max_attachment_size";i:0;s:24:"max_totalattachment_size";i:0;s:5:"vroot";i:0;}'),
('hooks', 'S', 'a:16:{s:12:"after_header";a:2:{s:4:"mods";a:3:{i:0;s:13:"announcements";i:1;s:12:"editor_tools";i:2;s:7:"smileys";}s:5:"funcs";a:3:{i:0;s:25:"phorum_show_announcements";i:1;s:36:"phorum_mod_editor_tools_after_header";i:2;s:31:"phorum_mod_smileys_after_header";}}s:6:"common";a:2:{s:4:"mods";a:2:{i:0;s:13:"announcements";i:1;s:12:"editor_tools";}s:5:"funcs";a:2:{i:0;s:26:"phorum_setup_announcements";i:1;s:30:"phorum_mod_editor_tools_common";}}s:12:"css_register";a:2:{s:4:"mods";a:4:{i:0;s:13:"announcements";i:1;s:12:"editor_tools";i:2;s:7:"smileys";i:3;s:6:"bbcode";}s:5:"funcs";a:4:{i:0;s:37:"phorum_mod_announcements_css_register";i:1;s:36:"phorum_mod_editor_tools_css_register";i:2;s:31:"phorum_mod_smileys_css_register";i:3;s:30:"phorum_mod_bbcode_css_register";}}s:4:"lang";a:2:{s:4:"mods";a:3:{i:0;s:12:"editor_tools";i:1;s:7:"smileys";i:2;s:6:"bbcode";}s:5:"funcs";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}}s:13:"before_editor";a:2:{s:4:"mods";a:1:{i:0;s:12:"editor_tools";}s:5:"funcs";a:1:{i:0;s:37:"phorum_mod_editor_tools_before_editor";}}s:26:"tpl_editor_before_textarea";a:2:{s:4:"mods";a:1:{i:0;s:12:"editor_tools";}s:5:"funcs";a:1:{i:0;s:50:"phorum_mod_editor_tools_tpl_editor_before_textarea";}}s:13:"before_footer";a:2:{s:4:"mods";a:1:{i:0;s:12:"editor_tools";}s:5:"funcs";a:1:{i:0;s:37:"phorum_mod_editor_tools_before_footer";}}s:19:"javascript_register";a:2:{s:4:"mods";a:3:{i:0;s:12:"editor_tools";i:1;s:7:"smileys";i:2;s:6:"bbcode";}s:5:"funcs";a:3:{i:0;s:43:"phorum_mod_editor_tools_javascript_register";i:1;s:38:"phorum_mod_smileys_javascript_register";i:2;s:37:"phorum_mod_bbcode_javascript_register";}}s:12:"format_fixup";a:2:{s:4:"mods";a:1:{i:0;s:7:"smileys";}s:5:"funcs";a:1:{i:0;s:31:"phorum_mod_smileys_format_fixup";}}s:18:"editor_tool_plugin";a:2:{s:4:"mods";a:2:{i:0;s:6:"bbcode";i:1;s:7:"smileys";}s:5:"funcs";a:2:{i:0;s:36:"phorum_mod_bbcode_editor_tool_plugin";i:1;s:37:"phorum_mod_smileys_editor_tool_plugin";}}s:5:"addon";a:2:{s:4:"mods";a:2:{i:0;s:7:"smileys";i:1;s:6:"bbcode";}s:5:"funcs";a:2:{i:0;s:24:"phorum_mod_smileys_addon";i:1;s:23:"phorum_mod_bbcode_addon";}}s:26:"tpl_editor_disable_smileys";a:2:{s:4:"mods";a:1:{i:0;s:7:"smileys";}s:5:"funcs";a:1:{i:0;s:45:"phorum_mod_smileys_tpl_editor_disable_smileys";}}s:21:"posting_custom_action";a:2:{s:4:"mods";a:2:{i:0;s:7:"smileys";i:1;s:6:"bbcode";}s:5:"funcs";a:2:{i:0;s:40:"phorum_mod_smileys_posting_custom_action";i:1;s:39:"phorum_mod_bbcode_posting_custom_action";}}s:6:"format";a:2:{s:4:"mods";a:1:{i:0;s:6:"bbcode";}s:5:"funcs";a:1:{i:0;s:24:"phorum_mod_bbcode_format";}}s:5:"quote";a:2:{s:4:"mods";a:1:{i:0;s:6:"bbcode";}s:5:"funcs";a:1:{i:0;s:23:"phorum_mod_bbcode_quote";}}s:25:"tpl_editor_disable_bbcode";a:2:{s:4:"mods";a:1:{i:0;s:6:"bbcode";}s:5:"funcs";a:1:{i:0;s:43:"phorum_mod_bbcode_tpl_editor_disable_bbcode";}}}'),
('mods', 'S', 'a:12:{s:13:"announcements";i:1;s:6:"bbcode";i:1;s:12:"editor_tools";i:1;s:13:"event_logging";i:0;s:4:"html";i:0;s:9:"smtp_mail";i:0;s:14:"modules_in_use";i:0;s:7:"replace";i:0;s:7:"smileys";i:1;s:11:"spamhurdles";i:0;s:8:"mod_tidy";i:0;s:21:"username_restrictions";i:0;}'),
('mod_announcements', 'S', 'a:7:{s:6:"module";s:11:"modsettings";s:3:"mod";s:13:"announcements";s:8:"forum_id";i:1;s:5:"pages";a:2:{s:5:"index";s:1:"1";s:4:"list";s:1:"1";}s:14:"number_to_show";i:5;s:16:"only_show_unread";N;s:12:"days_to_show";i:0;}'),
('private_key', 'V', 'r3@7ZwxZXrXYAWypqpGdtieJRPm8ofmWjx4i!Bh7'),
('mod_info_timestamps', 'S', 'a:4:{s:13:"announcements";i:1194006982;s:6:"bbcode";i:1194111107;s:12:"editor_tools";i:1194111107;s:7:"smileys";i:1194955208;}'),
('http_path', 'V', 'http://localhost:8080/epitech/techweb/phorum'),
('system_email_from_address', 'V', 'admin@admin'),
('installed', 'V', '1'),
('mod_smileys', 'S', 'a:4:{s:6:"prefix";s:22:"./mods/smileys/images/";s:7:"smileys";a:21:{i:0;a:6:{s:6:"search";s:4:"(:P)";s:3:"alt";s:39:"spinning smiley sticking its tongue out";s:6:"smiley";s:12:"smiley25.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:1;a:6:{s:6:"search";s:4:"(td)";s:3:"alt";s:11:"thumbs down";s:6:"smiley";s:12:"smiley23.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:2;a:6:{s:6:"search";s:4:"(tu)";s:3:"alt";s:9:"thumbs up";s:6:"smiley";s:12:"smiley24.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:3;a:6:{s:6:"search";s:4:":)-D";s:3:"alt";s:17:"smileys with beer";s:6:"smiley";s:12:"smiley15.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:4;a:6:{s:6:"search";s:4:">:D<";s:3:"alt";s:17:"the finger smiley";s:6:"smiley";s:12:"smiley14.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:5;a:6:{s:6:"search";s:3:"(:D";s:3:"alt";s:23:"smiling bouncing smiley";s:6:"smiley";s:12:"smiley12.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:6;a:6:{s:6:"search";s:3:"8-)";s:3:"alt";s:18:"eye rolling smiley";s:6:"smiley";s:11:"smilie8.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:7;a:6:{s:6:"search";s:3:":)o";s:3:"alt";s:15:"drinking smiley";s:6:"smiley";s:12:"smiley16.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:8;a:6:{s:6:"search";s:3:"::o";s:3:"alt";s:18:"eye popping smiley";s:6:"smiley";s:12:"smilie10.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:9;a:6:{s:6:"search";s:3:"B)-";s:3:"alt";s:14:"smoking smiley";s:6:"smiley";s:11:"smilie7.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:10;a:6:{s:6:"search";s:2:":(";s:3:"alt";s:10:"sad smiley";s:6:"smiley";s:11:"smilie2.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:11;a:6:{s:6:"search";s:2:":)";s:3:"alt";s:14:"smiling smiley";s:6:"smiley";s:11:"smilie1.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:12;a:6:{s:6:"search";s:2:":?";s:3:"alt";s:12:"moody smiley";s:6:"smiley";s:12:"smiley17.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:13;a:6:{s:6:"search";s:2:":D";s:3:"alt";s:15:"grinning smiley";s:6:"smiley";s:11:"smilie5.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:14;a:6:{s:6:"search";s:2:":P";s:3:"alt";s:26:"tongue sticking out smiley";s:6:"smiley";s:11:"smilie6.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:15;a:6:{s:6:"search";s:2:":S";s:3:"alt";s:15:"confused smiley";s:6:"smiley";s:12:"smilie11.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:16;a:6:{s:6:"search";s:2:":X";s:3:"alt";s:12:"angry smiley";s:6:"smiley";s:11:"smilie9.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:17;a:6:{s:6:"search";s:2:":o";s:3:"alt";s:14:"yawning smiley";s:6:"smiley";s:11:"smilie4.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:18;a:6:{s:6:"search";s:2:";)";s:3:"alt";s:14:"winking smiley";s:6:"smiley";s:11:"smilie3.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:19;a:6:{s:6:"search";s:2:"B)";s:3:"alt";s:11:"cool smiley";s:6:"smiley";s:8:"cool.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}i:20;a:6:{s:6:"search";s:2:"X(";s:3:"alt";s:10:"hot smiley";s:6:"smiley";s:7:"hot.gif";s:4:"uses";i:2;s:6:"active";b:1;s:8:"is_alias";b:0;}}s:12:"replacements";a:2:{s:7:"subject";a:2:{i:0;a:21:{i:0;s:4:"(:P)";i:1;s:4:"(td)";i:2;s:4:"(tu)";i:3;s:4:":)-D";i:4;s:10:"&gt;:D&lt;";i:5;s:3:"(:D";i:6;s:3:"8-)";i:7;s:3:":)o";i:8;s:3:"::o";i:9;s:3:"B)-";i:10;s:2:":(";i:11;s:2:":)";i:12;s:2:":?";i:13;s:2:":D";i:14;s:2:":P";i:15;s:2:":S";i:16;s:2:":X";i:17;s:2:":o";i:18;s:2:";)";i:19;s:2:"B)";i:20;s:2:"X(";}i:1;a:21:{i:0;s:208:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley25.gif" alt="spinning smiley sticking its tongue out" title="spinning smiley sticking its tongue out"/>";i:1;s:152:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley23.gif" alt="thumbs down" title="thumbs down"/>";i:2;s:148:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley24.gif" alt="thumbs up" title="thumbs up"/>";i:3;s:164:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley15.gif" alt="smileys with beer" title="smileys with beer"/>";i:4;s:164:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley14.gif" alt="the finger smiley" title="the finger smiley"/>";i:5;s:176:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley12.gif" alt="smiling bouncing smiley" title="smiling bouncing smiley"/>";i:6;s:165:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie8.gif" alt="eye rolling smiley" title="eye rolling smiley"/>";i:7;s:160:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley16.gif" alt="drinking smiley" title="drinking smiley"/>";i:8;s:166:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie10.gif" alt="eye popping smiley" title="eye popping smiley"/>";i:9;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie7.gif" alt="smoking smiley" title="smoking smiley"/>";i:10;s:149:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie2.gif" alt="sad smiley" title="sad smiley"/>";i:11;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie1.gif" alt="smiling smiley" title="smiling smiley"/>";i:12;s:154:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley17.gif" alt="moody smiley" title="moody smiley"/>";i:13;s:159:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie5.gif" alt="grinning smiley" title="grinning smiley"/>";i:14;s:181:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie6.gif" alt="tongue sticking out smiley" title="tongue sticking out smiley"/>";i:15;s:160:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie11.gif" alt="confused smiley" title="confused smiley"/>";i:16;s:153:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie9.gif" alt="angry smiley" title="angry smiley"/>";i:17;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie4.gif" alt="yawning smiley" title="yawning smiley"/>";i:18;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie3.gif" alt="winking smiley" title="winking smiley"/>";i:19;s:148:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/cool.gif" alt="cool smiley" title="cool smiley"/>";i:20;s:145:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/hot.gif" alt="hot smiley" title="hot smiley"/>";}}s:4:"body";a:2:{i:0;a:21:{i:0;s:4:"(:P)";i:1;s:4:"(td)";i:2;s:4:"(tu)";i:3;s:4:":)-D";i:4;s:10:"&gt;:D&lt;";i:5;s:3:"(:D";i:6;s:3:"8-)";i:7;s:3:":)o";i:8;s:3:"::o";i:9;s:3:"B)-";i:10;s:2:":(";i:11;s:2:":)";i:12;s:2:":?";i:13;s:2:":D";i:14;s:2:":P";i:15;s:2:":S";i:16;s:2:":X";i:17;s:2:":o";i:18;s:2:";)";i:19;s:2:"B)";i:20;s:2:"X(";}i:1;a:21:{i:0;s:208:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley25.gif" alt="spinning smiley sticking its tongue out" title="spinning smiley sticking its tongue out"/>";i:1;s:152:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley23.gif" alt="thumbs down" title="thumbs down"/>";i:2;s:148:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley24.gif" alt="thumbs up" title="thumbs up"/>";i:3;s:164:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley15.gif" alt="smileys with beer" title="smileys with beer"/>";i:4;s:164:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley14.gif" alt="the finger smiley" title="the finger smiley"/>";i:5;s:176:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley12.gif" alt="smiling bouncing smiley" title="smiling bouncing smiley"/>";i:6;s:165:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie8.gif" alt="eye rolling smiley" title="eye rolling smiley"/>";i:7;s:160:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley16.gif" alt="drinking smiley" title="drinking smiley"/>";i:8;s:166:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie10.gif" alt="eye popping smiley" title="eye popping smiley"/>";i:9;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie7.gif" alt="smoking smiley" title="smoking smiley"/>";i:10;s:149:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie2.gif" alt="sad smiley" title="sad smiley"/>";i:11;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie1.gif" alt="smiling smiley" title="smiling smiley"/>";i:12;s:154:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smiley17.gif" alt="moody smiley" title="moody smiley"/>";i:13;s:159:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie5.gif" alt="grinning smiley" title="grinning smiley"/>";i:14;s:181:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie6.gif" alt="tongue sticking out smiley" title="tongue sticking out smiley"/>";i:15;s:160:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie11.gif" alt="confused smiley" title="confused smiley"/>";i:16;s:153:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie9.gif" alt="angry smiley" title="angry smiley"/>";i:17;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie4.gif" alt="yawning smiley" title="yawning smiley"/>";i:18;s:157:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/smilie3.gif" alt="winking smiley" title="winking smiley"/>";i:19;s:148:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/cool.gif" alt="cool smiley" title="cool smiley"/>";i:20;s:145:"<img class="mod_smileys_img" src="http://localhost:8080/epitech/techweb/phorum/mods/smileys/images/hot.gif" alt="hot smiley" title="hot smiley"/>";}}}s:10:"do_smileys";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `phorum_subscribers`
--

CREATE TABLE IF NOT EXISTS `phorum_subscribers` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `forum_id` int(10) unsigned NOT NULL default '0',
  `sub_type` tinyint(4) NOT NULL default '0',
  `thread` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`forum_id`,`thread`),
  KEY `forum_id` (`forum_id`,`thread`,`sub_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_subscribers`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_users`
--

CREATE TABLE IF NOT EXISTS `phorum_users` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(50) NOT NULL default '',
  `real_name` varchar(255) NOT NULL default '',
  `display_name` varchar(255) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `password_temp` varchar(50) NOT NULL default '',
  `sessid_lt` varchar(50) NOT NULL default '',
  `sessid_st` varchar(50) NOT NULL default '',
  `sessid_st_timeout` int(10) unsigned NOT NULL default '0',
  `email` varchar(100) NOT NULL default '',
  `email_temp` varchar(110) NOT NULL default '',
  `hide_email` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  `signature` text NOT NULL,
  `threaded_list` tinyint(1) NOT NULL default '0',
  `posts` int(10) NOT NULL default '0',
  `admin` tinyint(1) NOT NULL default '0',
  `threaded_read` tinyint(1) NOT NULL default '0',
  `date_added` int(10) unsigned NOT NULL default '0',
  `date_last_active` int(10) unsigned NOT NULL default '0',
  `last_active_forum` int(10) unsigned NOT NULL default '0',
  `hide_activity` tinyint(1) NOT NULL default '0',
  `show_signature` tinyint(1) NOT NULL default '0',
  `email_notify` tinyint(1) NOT NULL default '0',
  `pm_email_notify` tinyint(1) NOT NULL default '1',
  `tz_offset` tinyint(2) NOT NULL default '-99',
  `is_dst` tinyint(1) NOT NULL default '0',
  `user_language` varchar(100) NOT NULL default '',
  `user_template` varchar(100) NOT NULL default '',
  `moderator_data` text NOT NULL,
  `moderation_email` tinyint(1) NOT NULL default '1',
  `settings_data` mediumtext NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `active` (`active`),
  KEY `userpass` (`username`,`password`),
  KEY `sessid_st` (`sessid_st`),
  KEY `sessid_lt` (`sessid_lt`),
  KEY `activity` (`date_last_active`,`hide_activity`,`last_active_forum`),
  KEY `date_added` (`date_added`),
  KEY `email_temp` (`email_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `phorum_users`
--

INSERT INTO `phorum_users` (`user_id`, `username`, `real_name`, `display_name`, `password`, `password_temp`, `sessid_lt`, `sessid_st`, `sessid_st_timeout`, `email`, `email_temp`, `hide_email`, `active`, `signature`, `threaded_list`, `posts`, `admin`, `threaded_read`, `date_added`, `date_last_active`, `last_active_forum`, `hide_activity`, `show_signature`, `email_notify`, `pm_email_notify`, `tz_offset`, `is_dst`, `user_language`, `user_template`, `moderator_data`, `moderation_email`, `settings_data`) VALUES
(1, 'admin', '', 'admin', '7c159e093e34f1e325dcd432836fbb7f', '*NO PASSWORD SET*', '65e4448df901bbc27b018cd4825ad270', '', 0, 'admin@admin', '', 0, 1, '', 0, 0, 1, 0, 1210923646, 1210923646, 0, 0, 0, 0, 1, -99, 0, '', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `phorum_user_custom_fields`
--

CREATE TABLE IF NOT EXISTS `phorum_user_custom_fields` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `type` int(10) unsigned NOT NULL default '0',
  `data` text NOT NULL,
  PRIMARY KEY  (`user_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_user_custom_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_user_group_xref`
--

CREATE TABLE IF NOT EXISTS `phorum_user_group_xref` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `group_id` int(10) unsigned NOT NULL default '0',
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`user_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_user_group_xref`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_user_newflags`
--

CREATE TABLE IF NOT EXISTS `phorum_user_newflags` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `forum_id` int(10) unsigned NOT NULL default '0',
  `message_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`forum_id`,`message_id`),
  KEY `move` (`message_id`,`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_user_newflags`
--


-- --------------------------------------------------------

--
-- Table structure for table `phorum_user_permissions`
--

CREATE TABLE IF NOT EXISTS `phorum_user_permissions` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `forum_id` int(10) unsigned NOT NULL default '0',
  `permission` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`forum_id`),
  KEY `forum_id` (`forum_id`,`permission`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phorum_user_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `tw_activity`
--

CREATE TABLE IF NOT EXISTS `tw_activity` (
  `activity_id` int(11) NOT NULL auto_increment,
  `activity_project_id` int(11) default NULL,
  `activity_parent_id` int(11) default NULL,
  `activity_name` varchar(20) default NULL,
  `activity_charge_total` int(11) default NULL,
  `activity_date_begin` date default NULL,
  `activity_date_end` date default NULL,
  `activity_describtion` text,
  PRIMARY KEY  (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tw_activity`
--

INSERT INTO `tw_activity` (`activity_id`, `activity_project_id`, `activity_parent_id`, `activity_name`, `activity_charge_total`, `activity_date_begin`, `activity_date_end`, `activity_describtion`) VALUES
(12, 13, 0, 'caca', 7000, '2009-01-01', '2010-02-01', 'caca'),
(8, 12, 0, 'Etape1', 24, '0000-00-00', '0000-00-00', ''),
(9, 12, 8, 'Etape12', 8, '0000-00-00', '0000-00-00', ''),
(10, 12, 8, 'Etape13', 16, '0000-00-00', '0000-00-00', ''),
(11, 12, 0, 'Etape2', 30, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tw_activity_dependance`
--

CREATE TABLE IF NOT EXISTS `tw_activity_dependance` (
  `activity_dependance_activity_id` int(11) NOT NULL,
  `activity_dependance_dependof_id` int(11) NOT NULL,
  PRIMARY KEY  (`activity_dependance_activity_id`,`activity_dependance_dependof_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tw_activity_dependance`
--

INSERT INTO `tw_activity_dependance` (`activity_dependance_activity_id`, `activity_dependance_dependof_id`) VALUES
(1, 3),
(1, 4),
(3, 4),
(9, 10),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tw_activity_member`
--

CREATE TABLE IF NOT EXISTS `tw_activity_member` (
  `activity_member_activity_id` int(11) NOT NULL,
  `activity_member_usr_id` int(11) NOT NULL,
  `activity_level` int(11) NOT NULL,
  `activity_work` int(11) NOT NULL,
  `activity_hour_work` int(11) NOT NULL,
  PRIMARY KEY  (`activity_member_activity_id`,`activity_member_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tw_activity_member`
--

INSERT INTO `tw_activity_member` (`activity_member_activity_id`, `activity_member_usr_id`, `activity_level`, `activity_work`, `activity_hour_work`) VALUES
(2, 1, 0, 0, 0),
(2, 2, 0, 1, 0),
(2, 3, 0, 0, 0),
(1, 7, 0, 1, 0),
(1, 3, 1, 1, 3),
(4, 3, 0, 1, 0),
(8, 7, 0, 1, 0),
(8, 15, 0, 1, 1357),
(10, 7, 0, 1, 0),
(10, 15, 0, 0, 1234),
(11, 7, 0, 1, 0),
(11, 15, 0, 1, 0),
(7, 1, 0, 0, 10),
(12, 3, 0, 1, 0),
(12, 15, 0, 1, 4000),
(9, 15, 0, 1, 123);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(7, 13, 3, '2008-06-03 03:30:00', 'Anniversaire de Alex', 'attention c\\''est la fete !!!\r\n\r\n\r\nPreparez les cadeaux >>>'),
(8, 12, 3, '2008-04-01 03:07:00', 'test event', 'test message'),
(9, 12, 3, '2008-04-01 01:07:00', 'event 1', 'coucou');

-- --------------------------------------------------------

--
-- Table structure for table `tw_location`
--

CREATE TABLE IF NOT EXISTS `tw_location` (
  `location_id` int(11) NOT NULL auto_increment,
  `location_name` varchar(30) default NULL,
  `location_address` text,
  PRIMARY KEY  (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tw_location`
--

INSERT INTO `tw_location` (`location_id`, `location_name`, `location_address`) VALUES
(1, 'Epitech Strasbourg', '10, rue de la province\r\n67890 Strasbourg'),
(2, 'Epitech Paris', '14, rue des Anti-Provinciaux\r\n96100 Paris');

-- --------------------------------------------------------

--
-- Table structure for table `tw_member`
--

CREATE TABLE IF NOT EXISTS `tw_member` (
  `member_project_id` int(11) NOT NULL default '0',
  `member_usr_id` int(11) NOT NULL default '0',
  `member_role_id` int(11) default NULL,
  PRIMARY KEY  (`member_project_id`,`member_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tw_member`
--

INSERT INTO `tw_member` (`member_project_id`, `member_usr_id`, `member_role_id`) VALUES
(13, 3, 2),
(13, 7, 2),
(12, 7, 2),
(3, 3, 2),
(12, 15, 3),
(13, 15, 2),
(13, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tw_member_role`
--

CREATE TABLE IF NOT EXISTS `tw_member_role` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(30) default NULL,
  `add_activity` tinyint(1) NOT NULL default '0',
  `add_member` tinyint(1) NOT NULL default '0',
  `kick_member` tinyint(1) NOT NULL default '0',
  `add_member_activity` tinyint(1) NOT NULL default '0',
  `kick_member_activity` tinyint(1) NOT NULL default '0',
  `remove_activity` tinyint(1) NOT NULL default '0',
  `remove_project` tinyint(1) NOT NULL default '0',
  `add_subactivity_ifmember` tinyint(1) NOT NULL default '0',
  `remove_activity_ifmember` tinyint(1) NOT NULL default '0',
  `add_member_activity_ifmember` tinyint(1) NOT NULL default '0',
  `kick_member_activity_ifmember` tinyint(1) NOT NULL default '0',
  `update_member_activity` tinyint(1) NOT NULL default '0',
  `update_member` tinyint(1) NOT NULL default '0',
  `update_member_activity_ifmember` tinyint(1) NOT NULL default '0',
  `add_subactivity` tinyint(1) NOT NULL default '0',
  `update_project` tinyint(1) NOT NULL default '0',
  `update_activity` tinyint(1) NOT NULL default '0',
  `update_activity_ifmember` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tw_member_role`
--

INSERT INTO `tw_member_role` (`role_id`, `role_name`, `add_activity`, `add_member`, `kick_member`, `add_member_activity`, `kick_member_activity`, `remove_activity`, `remove_project`, `add_subactivity_ifmember`, `remove_activity_ifmember`, `add_member_activity_ifmember`, `kick_member_activity_ifmember`, `update_member_activity`, `update_member`, `update_member_activity_ifmember`, `add_subactivity`, `update_project`, `update_activity`, `update_activity_ifmember`) VALUES
(1, 'Project''s Chief', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Developper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Observer', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Activity''s Chief', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tw_profil`
--

CREATE TABLE IF NOT EXISTS `tw_profil` (
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
-- Dumping data for table `tw_profil`
--

INSERT INTO `tw_profil` (`profil_usr_id`, `profil_location_id`, `profil_name`, `profil_fname`, `profil_fphone`, `profil_mphone`, `profil_title_id`, `profil_perso_adress`) VALUES
(1, 2, 'Pauldfds', 'Pierre', '1234567', '32514232', 3, '56, avenue Jack 96432 Paris'),
(2, 2, 'Paultoto', 'Pierre', '1234567', '32514232', 3, '56, avenue Jack 96432 Paris'),
(3, 1, 'Candan', 'Caner123', '0603701316', '0603701317', 1, 'rue des Oursons!!!'),
(7, 1, 'Aubry', 'Jordan', '060606060606', '060606006060', 1, 'Epitech Strasbourg, 4 rue du dome.'),
(11, NULL, NULL, NULL, NULL, NULL, 0, ''),
(12, NULL, NULL, NULL, NULL, NULL, 0, ''),
(13, NULL, NULL, NULL, NULL, NULL, 0, ''),
(14, NULL, NULL, NULL, NULL, NULL, 0, ''),
(15, 1, 'david', 'david', '0000000000', '0000000000', 1, '10 rue des fleurs.'),
(16, NULL, NULL, NULL, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tw_project`
--

CREATE TABLE IF NOT EXISTS `tw_project` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_autor_usr_id` int(11) default NULL,
  `project_name` varchar(30) default NULL,
  `project_describ` text,
  `project_date` date default NULL,
  `project_date_end` date NOT NULL,
  `project_hour_per_day` int(11) NOT NULL default '8',
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tw_project`
--

INSERT INTO `tw_project` (`project_id`, `project_autor_usr_id`, `project_name`, `project_describ`, `project_date`, `project_date_end`, `project_hour_per_day`) VALUES
(12, 3, 'Techweb', '', '2008-03-26', '2009-03-27', 10),
(13, 3, 'coco', 'cdsdsfs', '2008-04-11', '2019-04-11', 8),
(3, 3, 'projet', '', '1983-03-11', '2014-02-01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tw_title`
--

CREATE TABLE IF NOT EXISTS `tw_title` (
  `title_id` int(11) NOT NULL auto_increment,
  `title_name` varchar(30) default NULL,
  PRIMARY KEY  (`title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tw_title`
--

INSERT INTO `tw_title` (`title_id`, `title_name`) VALUES
(1, 'Developpeur'),
(2, 'Designer'),
(3, 'Graphist');

-- --------------------------------------------------------

--
-- Table structure for table `tw_usr`
--

CREATE TABLE IF NOT EXISTS `tw_usr` (
  `usr_id` int(11) NOT NULL auto_increment,
  `usr_login` varchar(20) default NULL,
  `usr_passwd` varchar(40) default NULL,
  `usr_email` varchar(150) default NULL,
  `usr_date` date default NULL,
  `usr_level_id` int(11) NOT NULL,
  PRIMARY KEY  (`usr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tw_usr`
--

INSERT INTO `tw_usr` (`usr_id`, `usr_login`, `usr_passwd`, `usr_email`, `usr_date`, `usr_level_id`) VALUES
(1, 'tom2', 'd382ddd703b2d1cc353c84030284c4d566ef3d13', 'tom@mail.com', '2008-02-21', 1),
(2, 'pierre', 'd382ddd703b2d1cc353c84030284c4d566ef3d13', 'pierre@mail.com', '2008-02-13', 4),
(3, 'caner', 'd382ddd703b2d1cc353c84030284c4d566ef3d13', 'caner@caner.fr', '2008-02-25', 3),
(7, 'jordan', '485a2f9423e981b0faf5c1ecde5527f02d978326', 'can.ekz@gmail.com', '2008-03-10', 1),
(11, 'lafff', 'd15102e643428246a033358fc09bb3880a0a04ff', 'lafff@lafff.com', '2008-03-26', 4),
(12, 'jojo', '5e0abf07d3cf00c7794fc64674bacb0f7a7f207c', 'jojo@jojo.com', '2008-03-26', 4),
(13, 'marc', '3ae941e6639c86bcff257aeda4c0a7ae42cbcca3', 'marc@marc.com', '2008-03-26', 4),
(14, 'marc2', '068bec65273d3be1f1206763d2ab0ffafc082f38', 'marc@marc.com', '2008-03-26', 4),
(15, 'david', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634', 'david@david.com', '2008-03-26', 4),
(16, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.ad', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tw_usr_level`
--

CREATE TABLE IF NOT EXISTS `tw_usr_level` (
  `level_id` int(11) NOT NULL auto_increment,
  `level_name` varchar(30) default NULL,
  PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tw_usr_level`
--

INSERT INTO `tw_usr_level` (`level_id`, `level_name`) VALUES
(1, 'Administrator Root'),
(2, 'Administrator'),
(3, 'Chef de projet'),
(4, 'Participant');

-- --------------------------------------------------------

--
-- Table structure for table `tw_wload_suggestion`
--

CREATE TABLE IF NOT EXISTS `tw_wload_suggestion` (
  `wload_activity_id` int(11) NOT NULL,
  `wload_usr_id` int(11) NOT NULL,
  `wload_suggested` int(11) NOT NULL,
  PRIMARY KEY  (`wload_activity_id`,`wload_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tw_wload_suggestion`
--

INSERT INTO `tw_wload_suggestion` (`wload_activity_id`, `wload_usr_id`, `wload_suggested`) VALUES
(8, 3, 111),
(8, 1, 1234),
(9, 3, 123),
(9, 15, 523);
