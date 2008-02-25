<?php

/*
** Define user : name for xml
*/

define('HEADER_LOCATION_CREATE', 'Location:?ok=1&login=%s');
define('HEADER_LOCATION_CONNECT', 'Location:?ok=1');

define('USR_CREATE_BEGIN', '<create>');
define('USR_CREATE_END', '</create>');
define('USR_CONNECT_BEGIN', '<connect>');
define('USR_CONNECT_END', '</connect>');

define('USR_FIELD_LOGIN', '<field_login>%s</field_login>');
define('USR_FIELD_PASSWD', '<field_passwd>%s</field_passwd>');
define('USR_FIELD_REPASSWD', '<field_repasswd>%s</field_repasswd>');
define('USR_FIELD_EMAIL', '<field_email>%s</field_email>');

define('USR_FIELD_SELECT_LOCATION_BEGIN', '<field_location><name>%s</name>');
define('USR_FIELD_SELECT_LOCATION_END', '</field_location>');
define('USR_FIELD_SELECT_TITLE_BEGIN', '<field_title><name>%s</name>');
define('USR_FIELD_SELECT_TITLE_END', '</field_title>');

define('USR_VALUE_LOGIN', '<value_login>%s</value_login>');
define('USR_VALUE_EMAIL', '<value_email>%s</value_email>');

define('USR_XML_LOGIN', '<login>%s</login>');
define('USR_XML_PASSWD', '<passwd>%s</passwd>');
define('USR_XML_EMAIL', '<email>%s</email>');
define('USR_XML_SELECT', '%s%s');
define('USR_XML_ITEM', '<item><id>%s</id><name>%s</name></item>');

/*
** Define user : name for request
*/

define('USR_POST_LOGIN', 'usrlogin');
define('USR_POST_PASSWD', 'usrpasswd');
define('USR_POST_REPASSWD', 'usrpasswd2');
define('USR_POST_EMAIL', 'usremail');
define('USR_POST_LOCATION', 'locationid');
define('USR_POST_TITLE', 'titleid');

define('USR_ERROR_LOGIN', 'error : wrong login');
define('USR_ERROR_PASSWD', 'error : wrong password');
define('USR_ERROR_REPASSWD', 'error : two different password enter');
define('USR_ERROR_EMAIL', 'error : wrong email');
define('USR_ERROR_PASSWD_NOTFOUND', 'error : password not found');
define('USR_ERROR_REPASSWD_NOTFOUND', 'error : password not found');
define('USR_ERROR_EMAIL_NOTFOUND', 'error : email not found');
define('USR_ERROR_LOGIN_EXIST', 'error : login already exist');

define('USR_MESG_CREATE_OK', 'congratulation, user create');
define('USR_MESG_CONNECT_OK', 'welcome on techweb');

define('USR_REGEX_EMAIL', '^[a-zA-Z0-9\_\-\.]+\@+[a-zA-Z0-9\_\-\.]+\.[a-zA-Z0-9]{2,4}$');

/*
** Define user : sql  select request
*/

define('USR_SQL_SELECT_LOGIN',
       'SELECT usr_login
	    FROM tw_usr
	    WHERE usr_login = \'%s\';');

define('USR_SQL_SELECT_PASSWD',
       'SELECT usr_passwd
	    FROM tw_usr
	    WHERE usr_login = \'%s\';');

define('USR_SQL_SELECT_LOCATION',
	   'SELECT location_id, location_name
	    FROM tw_location;');

define('USR_SQL_SELECT_TITLE',
	   'SELECT title_id, title_name
	    FROM tw_title;');

/*
** Define user : sql add request
*/

define('USR_SQL_ADD_USR',
       'INSERT INTO tw_usr
	(usr_level_id, usr_login, usr_passwd,
	usr_email, usr_date)
	VALUES(4, \'%s\', \'%s\', \'%s\', curdate());');

define('USR_SQL_ADD_PROFIL',
       'INSERT INTO tw_profil
	(profil_usr_id)
	VALUES(\'%s\');');

/*
** Define user : sql update request


define('USR_SQL_UPDATE_TABLE_USR',
       'UPDATE tw_usr
	SET \'%s\' = \'%s\'
	WHERE usr_login = \'%s\';');

//mysql_insert_id();

define('USR_SQL_UPDATE_TABLE_PROFIL',
       'UPDATE tw_profil
	SET \'%s\' = \'%s\'
	WHERE profil_usr_id = (SELECT usr_profil_id
			   FROM tw_usr
			   WHERE usr_login = \'%s\');');

define('USR_SQL_UPDATE_TABLE_LOCATION',
       'UPDATE tw_location
	SET \'%s\' = \'%s\'
	WHERE location_id = (SELECT usr_profil_id
			     FROM tw_usr
			     WHERE usr_login = \'%s\');');
*/
?>