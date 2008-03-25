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

define('MEMBER_WELCOME', '<memberwelcome value="Welcome on Techweb" />');

define('MEMBER_PROJECT_BEGIN', '<memberproject value="Member project">');
define('MEMBER_PROJECT_END', '</memberproject>');

define('MEMBER_CHARGE_BEGIN', '<membercharge value="Member charge">');
define('MEMBER_CHARGE_END', '</membercharge>');

define('MEMBER_LIST_PROJECT', '<member name="%s" />');
define('MEMBER_LIST_CHARGE', '<member name="%s" answer="%s" answertype="%s" />');

/*
** Define member : sql
*/

define('MEMBER_SQL_LIST_ALL',
	   'SELECT usr_login
	    FROM tw_usr;');

?>