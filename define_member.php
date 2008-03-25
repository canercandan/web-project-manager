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

define('MEMBER_BUTTON_SELECT_ADD', 'memberselectadd');
define('MEMBER_BUTTON_SELECT_DEL', 'memberselectdel');

define('MEMBER_PROJECT_BEGIN', '<memberproject value="Member project">');
define('MEMBER_PROJECT_END', '%s</memberproject>');

define('MEMBER_CHARGE_BEGIN', '<membercharge value="Member charge">');
define('MEMBER_CHARGE_END', '%s</membercharge>');

define('MEMBER_ANSWER_BEGIN', '<memberanswer value="Member answer">');
define('MEMBER_ANSWER_END', '%s</memberanswer>');

define('MEMBER_NAME', '%s<member name="%s" />');
define('MEMBER_LIST', '%s<member name="%s" answer="%s" />');

define('MEMBER_ADD_NAME', 'memberaddname');
define('MEMBER_ADD_ACTIVITY', 'memberactivity');
define('MEMBER_ADD_ANSWER', 'answeractivityid');

/*
** Define member : sql
*/

define('MEMBER_SQL_LIST_PROJECT',
	   'SELECT usr_login
	    FROM tw_usr
		WHERE usr_level_id = 4
		OR usr_level_id = 3;');

define('MEMBER_SQL_LIST_CHARGE',
	   'SELECT usr_login, activity_member_activity_id
	    FROM tw_usr, tw_activity_member
		WHERE usr_id = activity_member_usr_id;');

define('MEMBER_SQL_LIST_ANSWER',
	   'SELECT activity_name, activity_usr_answer_id
	    FROM tw_activity, tw_activity_usr
		WHERE activity_usr_activity_id = activity_id
		AND activity_usr_usr_id = $_SESSION[SESSION_ID]
		AND activity_usr_answer_id >= 0');

define('MEMBER_SQL_LIST_ADD',
        'INSERT INTO tw_activity_usr
		 VALUES (\'%s\', %s, %s);');

define('MEMBER_SQL_LIST_DEL',
	   'DELETE FROM tw_activity_usr
	    WHERE activity_usr_activity_id = \'%s\'
		AND activity_usr_usr_id = (SELECT usr_id
								   FROM tw_usr
								   WHERE usr_login = \'%s\');');
?>