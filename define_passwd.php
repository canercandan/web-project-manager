<?php

if (!MAIN)
  exit(0);

/*
** Name
*/

define('PASSWD_REGEX_EMAIL', '^[a-zA-Z0-9\_\-\.]+\@+[a-zA-Z0-9\_\-\.]+\.[a-zA-Z0-9]{2,4}$');

define('PASSWD_LOGIN', '<passwdlogin post="%s" value="" />');
define('PASSWD_EMAIL', '<passwdemail post="%s" value="" />');

define('PASSWD_POST_LOGIN', 'passlogin');
define('PASSWD_POST_EMAIL', 'passemail');

define('PASSWD_ERROR', '<error value"%s" />');
define('PASSWD_ERROR_LOGIN', 'No login found');
define('PASSWD_ERROR_EMAIL', 'Wrong email');

define('PASSWD_CONGRATULATION_MESS', '<congratulation value="A email have been send with your new account information." />');

define('SEND_SUBJECT', 'Techweb : new password');
define('SEND_HEADERS', 'From : Techweb_Strasbourg@epitech.net');
define('SEND_MESSAGE', 'Informations about your account have changed.
						Your account is :
						Login -> %s
						Passwd -> %s
						If you want to change this informations, contact a adminitrator.');

define('PASSWD_CHAR', 'abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ');
define('PASSWD_SPECIAL', "!@()-_=+?*^&");
define('PASSWD_NUMBER', '1234567890');

/*
** Sql
*/

define('PASSWD_GET_INFO', 'SELECT usr_email
						   FROM tw_user
						   WHERE usr_login = \'%s\';');

?>