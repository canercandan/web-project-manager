<?php

if (!MAIN)
  exit(0);

/*
** Define profil : name for xml
*/

//define('HEADER_LOCATION_MEMBRE', 'Location:membre.php?ok=1');

define('PROFIL_BEGIN', '<profil>');
define('PROFIL_END', '</profil>');

define('PROFIL_FIELD_LOCATION_BEGIN', '<field_location name="%s">');
define('PROFIL_FIELD_LOCATION_END', '</field_location>');
define('PROFIL_FIELD_TITLE_BEGIN', '<field_title name="%s">');
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
	WHERE profil_usr_id = (SELECT usr_id
			       FROM tw_usr
			       WHERE usr_login = \'%s\');');

?>