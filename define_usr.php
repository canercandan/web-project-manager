<?php

/*
** Define user : name for xml
*/

define('HEADER_LOCATION_CREATE', 'Location:?ok=1&login=%s');
define('HEADER_LOCATION_PROFIL', 'Location:profil.php');
define('HEADER_LOCATION_MEMBER', 'Location:member.php');
define('HEADER_LOCATION_CONNECT', 'Location:connect.php');

define('USR_CREATE_BEGIN', '<create>');
define('USR_CREATE_END', '</create>');
define('USR_CONNECT_BEGIN', '<connect>');
define('USR_CONNECT_END', '</connect>');

define('USR_FIELD_LOGIN', '<field_login name="%s" value="%s" />');
define('USR_FIELD_PASSWD', '<field_passwd name="%s" />');
define('USR_FIELD_REPASSWD', '<field_repasswd name="%s" />');
define('USR_FIELD_EMAIL', '<field_email name="%s" value="%s" />');

define('USR_FIELD_LOCATION_BEGIN', '<field_location name="%s">');
define('USR_FIELD_LOCATION_END', '</field_location>');
define('USR_FIELD_TITLE_BEGIN', '<field_title name="%s">');
define('USR_FIELD_TITLE_END', '</field_title>');

define('USR_XML_LOGIN', '<login>%s</login>');
define('USR_XML_PASSWD', '<passwd>%s</passwd>');
define('USR_XML_EMAIL', '<email>%s</email>');

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
define('USR_ERROR_LOGIN_NOTFOUND', 'error : login not found');
define('USR_ERROR_PASSWD_NOTFOUND', 'error : password not found');
define('USR_ERROR_REPASSWD_NOTFOUND', 'error : password not found');
define('USR_ERROR_EMAIL_NOTFOUND', 'error : email not found');
define('USR_ERROR_LOGIN_EXIST', 'error : login already exist');
define('USR_ERROR_EMAIL_EXIST', 'error : email already used');
define('USR_ERROR_EMAIL_NOTSEND', 'error : can\'t send email, adress doesn\'t exist');

define('USR_MESG_CREATE_OK',
       'Congratulation, user created.
	An email will be sent with your account information');

define('USR_MESG_CONNECT_OK', 'Welcome on techweb');

define('USR_REGEX_EMAIL',
       '^[a-zA-Z0-9\_\-\.]+\@+[a-zA-Z0-9\_\-\.]+\.[a-zA-Z0-9]{2,4}$');

/*
** Define user : sql  select request
*/

define('USR_SQL_SELECT_LOGIN',
       'SELECT	usr_login
	FROM	tw_usr
	WHERE	usr_login = \'%s\';');

define('USR_SQL_SELECT_PASSWD',
       'SELECT	usr_passwd
	FROM	tw_usr
	WHERE	usr_login = \'%s\';');

define('USR_SQL_SELECT_PROFIL',
       'SELECT	*
	FROM	tw_profil
	WHERE	profil_usr_id = \'%s\';');

/*
** Define user : sql add request
*/

define('USR_SQL_ADD_USR',
       'INSERT INTO	tw_usr
	(usr_level_id, usr_login, usr_passwd, usr_email, usr_date)
	VALUES(4, \'%s\', \'%s\', \'%s\', curdate());');

define('USR_SQL_ADD_PROFIL',
       'INSERT INTO	tw_profil
	(profil_usr_id)
	VALUES(\'%s\');');

define('USR_SQL_UPDATE_USR',
       'UPDATE	tw_usr
	SET	usr_passwd = \'%s\'
	WHERE	usr_id = \'%d\';');

/*
** Define user : sql session request
*/

define('USR_SQL_SESSION_ID',
       'SELECT	usr_id
	FROM	tw_usr
	WHERE	usr_login = \'%s\';');

define('USR_SQL_SESSION',
       'SELECT	usr_email, location_name, title_name, profil_name,
		profil_fname, profil_fphone, profil_mphone,
		profil_perso_adress, usr_level_id
	FROM	tw_profil p
		LEFT JOIN tw_location l ON p.profil_location_id = l.location_id
		LEFT JOIN tw_title t ON p.profil_title_id = t.title_id
		LEFT JOIN tw_usr u ON p.profil_usr_id = u.usr_id
		WHERE u.usr_login = \'%s\';');

/*
** Define for email
*/

define('USR_SQL_EMAIL',
       'SELECT	usr_email
	FROM	tw_usr;');

?>