<?php

if (!MAIN)
  exit(0);

/*
** Name
*/

define('PASSWD_REGEX_EMAIL', '^[a-zA-Z0-9\_\-\.]+\@+[a-zA-Z0-9\_\-\.]+\.[a-zA-Z0-9]{2,4}$');

define('PASSWD_LOGIN', '<passwdlog post="%s" value="" />');
define('PASSWD_EMAIL', '<passwdemail post="%s" value="" />');

define('PASSWD_POST_LOGIN', 'passwdlogin');
define('PASSWD_POST_EMAIL', 'passwdemail');

define('PASSWD_ERROR', '<passwderror>%s</passwderror>');
define('PASSWD_ERROR_LOGIN', 'No login found');
define('PASSWD_ERROR_EMAIL', 'Wrong email');

define('SEND_SUBJECT', 'Techweb : new password');
define('SEND_HEADERS', 'From : Techweb_Strasbourg@epitech.net');
define('SEND_MESSAGE', 'Informations about your account have changed.
						Your account is :
						Login -> %s
						Passwd -> %s
						If you want to change this informations, contact a adminitrator.');

/*
** Sql
*/

define('PASSWD_GET_INFO', 'SELECT usr_email
						   FROM tw_user
						   WHERE usr_login = \'%s\';');

?>