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

define('PASSWD_BEGIN', '<passwd>');
define('PASSWD_END', '</passwd>');

define('PASSWD_ERROR', '<error>%s</error>');
define('PASSWD_ERROR_LOGIN_NOTFOUND', 'No login found');
define('PASSWD_ERROR_EMAIL_NOTFOUND', 'No email found');
define('PASSWD_ERROR_PASSWD', 'Wrong login or email');

define('PASSWD_CONGRATULATION_MESS', '<congratulation value="A email will be send in the next 24h with your new account information." />');

define('SEND_SUBJECT', 'Techweb : new password');
define('SEND_HEADER_TO', 'To: %s <%s>');
define('SEND_HEADER_FROM', 'From: Techweb <Techweb_Strasbourg@epitech.net>');
define('SEND_HEADER', '%s\r\n%s');
define('SEND_MESSAGE', 
'Welcome on Techweb.
 
Informations about your account : 
Login -> %s 
Password -> %s');

define('PASSWD_CHAR', 'abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ');
define('PASSWD_SPECIAL', "!@()-_=+?*^&");
define('PASSWD_NUMBER', '1234567890');

/*
** Sql
*/

define('PASSWD_GET_INFO', 'SELECT usr_email
						   FROM tw_usr
						   WHERE usr_login = \'%s\';');

?>