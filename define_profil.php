<?php

if (!MAIN)
  exit(0);

/*
** Define profil : name for xml
*/

//define('HEADER_LOCATION_MEMBRE', 'Location:membre.php?ok=1');

define('PROFIL_BEGIN', '<profil>');
define('PROFIL_END', '</profil>');

define('PROFIL_FIELD_TITLE', '<field_title>%s</field_title>');
define('PROFIL_FIELD_LOCATION', '<field_location>%s</field_location>');
define('PROFIL_FIELD_NAME', '<field_name>%s</field_name>');
define('PROFIL_FIELD_FNAME', '<field_fname>%s</field_fname>');
define('PROFIL_FIELD_FPHONE', '<field_fphone>%s</field_fphone>');
define('PROFIL_FIELD_MPHONE', '<field_mphone>%s</field_mphone>');
define('PROFIL_FIELD_ADDRESS', '<field_address>%s</field_address>');

define('PROFIL_VALUE_TITLE', '<value_title>%s</value_title>');
define('PROFIL_VALUE_LOCATION', '<value_location>%s</value_location>');
define('PROFIL_VALUE_NAME', '<value_name>%s</value_name>');
define('PROFIL_VALUE_FNAME', '<value_fname>%s</value_fname>');
define('PROFIL_VALUE_FPHONE', '<value_fphone>%s</value_fphone>');
define('PROFIL_VALUE_MPHONE', '<value_mphone>%s</value_mphone>');
define('PROFIL_VALUE_ADDRESS', '<value_address>%s</value_address>');

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

/*
** Define profil : sql profil request
*/

define('PROFIL_SQL_SELECT_PROFIL',
	   'SELECT *
	    FROM tw_profil
		WHERE profil_usr_id = ( SELECT usr_id
								FROM tw_usr
								WHERE usr_login = \'%s\' );');
		
?>