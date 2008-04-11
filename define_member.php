<?php

if (!MAIN)
  exit(0);
  
/*
** Define member : name
*/

define('HEADER_CONNECT', 'Location:connect.php');

define('MEMBER_BEGIN', '<member>');
define('MEMBER_END', '</member>');

define('DESTROY', 'deco');
define('SESSION_DESTROY', '<sessdestroy post="%s" />');

/*
** Sql request
*/

define('MEMBER_NEW_PASSWD', 'UPDATE tw_user
							 SET usr_passwd = \'%s\'
							 WHERE login = $_SESSION[SESSION_LOGIN];');
?>