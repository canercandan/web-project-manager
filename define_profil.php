<?php

if (!MAIN)
  exit(0);

/*
** Define profil : name for xml
*/

define('LOCATION_MEMBER', 'Location:member.php');
define('LOCATION_ADMIN', 'Location:admin2.php');
define('LOCATION_CONNECT', 'Location:connect.php');

define('PROFIL_BEGIN', '<profil>');
define('PROFIL_END', '</profil>');

define('PROFIL_FIELD_LOCATION_BEGIN', '<field_location name="%s" value="%s">');
define('PROFIL_FIELD_LOCATION_END', '</field_location>');
define('PROFIL_FIELD_TITLE_BEGIN', '<field_title name="%s" value="%s">');
define('PROFIL_FIELD_TITLE_END', '</field_title>');
define('PROFIL_FIELD_ITEM',
       '<item id="%s" name="%s" />');
define('PROFIL_FIELD_NAME',
       '<field_name name="%s" value="%s" />');
define('PROFIL_FIELD_FNAME',
       '<field_fname name="%s" value="%s" />');
define('PROFIL_FIELD_FPHONE',
       '<field_fphone name="%s" value="%s" />');
define('PROFIL_FIELD_MPHONE',
       '<field_mphone name="%s" value="%s" />');
define('PROFIL_FIELD_ADDRESS',
       '<field_address name="%s" value="%s" />');
define('PROFIL_FIELD_EMAIL',
	   '<field_email name="%s" value="%s" />');

/*
** Define profil : name for request
*/

define('PROFIL_POST_TITLE', 'profil_title');
define('PROFIL_POST_LOCATION', 'profil_location');
define('PROFIL_POST_NAME', 'profil_name');
define('PROFIL_POST_FNAME', 'profil_fname');
define('PROFIL_POST_FPHONE', 'profil_fphone');
define('PROFIL_POST_MPHONE', 'profil_mphone');
define('PROFIL_POST_ADDRESS', 'profil_address');
define('PROFIL_POST_EMAIL', 'profil_email');

define('PROFIL_LOCATION_ERROR', 'error : no location select');
define('PROFIL_TITLE_ERROR', 'error : no title select');
define('PROFIL_NAME_ERROR', 'error : no name enter');
define('PROFIL_NAME_ERROR_NOTCHAR', 'error : name invalid');
define('PROFIL_FNAME_ERROR', 'error : no first name enter');
define('PROFIL_FNAME_ERROR_NOTCHAR', 'error : first name invalid');
define('PROFIL_FPHONE_ERROR', 'error : no phone enter');
define('PROFIL_FPHONE_ERROR_NOTNUM', 'error : phone invalid');
define('PROFIL_MPHONE_ERROR', 'error : no mobile enter');
define('PROFIL_MPHONE_ERROR_NOTNUM', 'error : mobile invalid');
define('PROFIL_ADDRESS_ERROR', 'error : no address enter');
define('PROFIL_EMAIL_ERROR_NOTFOUND', 'error : no email enter');
define('PROFIL_EMAIL_ERROR', 'error : invalid email enter');

define('PROFIL_IS_NUMBER', '^[0-9]{10,15}$');
define('PROFIL_IS_CHAR', '^[a-zA-Z\ ]{3,30}$');

define('MEMBER_SELECT', 'memberselect');
define('XML_MEMBER_SELECT', '<memberselect post="%s" value="%s" />');

/*
** Define profil : sql profil request
*/

define('PROFIL_SQL_PROFIL',
	   'SELECT *
		FROM tw_profil
		WHERE profil_usr_id = \'%s\';');

define('PROFIL_SQL_SELECT',
       'SELECT *
		FROM tw_profil
		WHERE profil_usr_id = (SELECT usr_id
							   FROM tw_usr
							   WHERE usr_login = \'%s\');');

define('PROFIL_SQL_LOCATION',
	   'SELECT location_id, location_name
	    FROM tw_location;');

define('PROFIL_SQL_TITLE',
	   'SELECT title_id, title_name
	    FROM tw_title;');

define('PROFIL_SQL_UPDATE',
	   'UPDATE tw_profil
		SET profil_location_id = \'%s\',
	    profil_name = \'%s\', 
		profil_fname = \'%s\',
		profil_fphone = \'%s\',
		profil_mphone = \'%s\',
		profil_title_id = \'%s\',
		profil_perso_adress = \'%s\'
		WHERE profil_usr_id = \'%s\';');

define('PROFIL_SQL_UPDATE_EMAIL',
	   'UPDATE tw_usr
	    SET usr_email = \'%s\'
		WHERE profil_usr_id = \'%s\';');

?>