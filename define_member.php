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

define('MEMBER_PROJECT_HEADER', '<memberproject value="Member project">%s</memberproject>');
define('MEMBER_CHARGE_HEADER', '<membercharge value="Member charge">%s</membercharge>');

define('MEMBER_LIST', '<member v_name="%s" v_answer="%s" v_type="%s" />');

/*
** Define member : sql
*/

define('MEMBER_SQL_LIST_ALL',
	   'SELECT DISTINCT member_usr_id, member_role
	    FROM tw_member
		WHERE member_role = 2
		OR member_role = 3;');

?>