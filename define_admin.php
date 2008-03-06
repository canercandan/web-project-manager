<?php

if (!MAIN)
  exit(0);

define('ADMIN_BEGIN','<administration>');
define('ADMIN_END','</administration>');
define('ADD_LOCATION_BEGIN', '<add_location>');
define('ADD_LOCATION_END', '</add_location>');
define('ADD_TITLE_START', '<add_title>');
define('ADD_TITLE_END', '</add_title>');

define('ADMIN_LOCATION', 1);
define('ADMIN_TITLE', 2);
define('LOC_NAME_MISSING', 'Please fill the location name.');
define('LOCATION_OK', 'Congratulation, location added');
define('TITLE_OK', 'Congratulation, title added');
define('TITLE_OK', 'Title deleted');
define('SUBMIT_MOD_TITLE', 'modif');
define('SUBMIT_DEL_TITLE', 'delete');
define('POST_TITLE_ID', 'titleid');
define('POST_TITLE_NAME', 'titlename');
define('TITLE_ITEM', '<title submitmod="%s" submitdel="%s" postid="%s" postvalue="%s" id="%d" value="%s"/>');
define('FIELD_LOCATION_NAME', '<field_name>%s</field_name>');
define('FIELD_LOCATION_ADDR', '<field_addr>%s</field_addr>');
define('FIELD_TITLE_NAME', '<field_name value="%s">%s</field_name>');
define('POST_LOCATION_NAME', 'locname');
define('POST_LOCATION_ADDR', 'locaddr');
define('POST_LOCATION_MODNAME', 'modlocname');
define('POST_LOCATION_MODADDR', 'modlocaddr');
define('POST_LOCATION_MODID', 'modlocid');
define('LOCATION_START', '<location>');
define('LOCATION_END', '</location>');
define('LOCATION_ITEM', '<location><field_name>%s</field_name><field_addr>%s</field_addr><field_id>%s</field_id><id>%d</id><name>%s</name><address>%s</address></location>');

define('MEMBER_LIST_BEGIN', '<member_list>');
define('MEMBER_LIST_END', '</member_list>');

define('MEMBER_BUTTON_SELECT', '<checkbox name="%s" />');
define('MEMBER_BUTTON_UPDATE', '<button_update name="%s" />');
define('MEMBER_BUTTON_DELETE', '<button_delete name="%s" />');

define('ADMIN_BUTTON_SELECT', 'adminbuttonselect');
define('ADMIN_BUTTON_UPDATE', 'adminbuttonupdate');
define('ADMIN_BUTTON_DELETE', 'adminbuttondelete');

define('ADMIN_POST_LOGIN', 'adminpostlogin');
define('ADMIN_POST_NAME', 'adminpostname');
define('ADMIN_POST_FIRST', 'adminpostfirst');
define('ADMIN_USR_LEVEL', 'adminpostlevel');

define('ADMIN_LEVEL_BEGIN', '<level>');
define('ADMIN_LEVEL_END', '</level>');
define('ADMIN_ITEM', '<item id="%s" name="%s" />');

define('MEMBER_SELECT', 'memberselect');
define('XML_MEMBER_SELECT', '<memberselect post="%s" value="%s" />');

define('ADMIN_MEMBER',
       '<member>
		  <id>%s</id>
	      <login post="%s" value="%s" />
	      <name post="%s" value="%s" />
	      <first_name post="%s" value="%s" />
	      <usr_level post="%s" value="%s" />
		</member>');

/*
** SQL
*/

define('SQL_DELETE_PROFIL_TITLE',
       'UPDATE tw_profil
		SET profil_title_id = 0
		WHERE profil_title_id = \'%d\';');

define('SQL_DELETE_TITLE',
       'DELETE FROM tw_title
		WHERE title_id = \'%d\';');

define('SQL_GET_TITLES',
       'SELECT title_id, title_name
		FROM tw_title');

define('SQL_GET_LOCATIONS',
       'SELECT location_id, location_name, location_address
		FROM tw_location');

define('SQL_ADD_TITLE',
       'INSERT INTO tw_title (title_id, title_name)
		VALUES (NULL, \'%s\');');

define('SQL_ADD_LOCATION',
       'INSERT INTO tw_location (location_id, location_name, location_address)
		VALUES (NULL, \'%s\', \'%s\');');

define('SQL_UPDATE_LOCATION',
       'UPDATE tw_location
		SET location_name = \'%s\',
			location_address = \'%s\'
		WHERE location_id = \'%d\;');

define('ADMIN_MEMBER_SELECT',
       'SELECT usr_id, 
			   usr_login, 
			   profil_name, 
			   profil_fname, 
			   usr_level_id
		FROM tw_usr, tw_profil
		WHERE usr_id = profil_usr_id;');

define('SQL_USER_LEVEL',
	   'SELECT *
	    FROM tw_usr_level;');

define('SQL_MEMBER_UPDATE_USR',
	   'UPDATE tw_usr
	    SET usr_login = \'%s\',
			usr_level_id = \'%s\'
		WHERE usr_id = \'%s\';');
	
define('SQL_MEMBER_UPDATE_PROFIL',
	   'UPDATE tw_profil
	    SET profil_name = \'%s\',
			profil_fname = \'%s\'
		WHERE profil_usr_id = \'%s\';');
?>