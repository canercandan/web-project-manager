<?php

if (!MAIN)
  exit(0);

define('INFO_BUTTON_ADD', 'memberadd');
define('INFO_BUTTON_DEL', 'memberdel');
define('INFO_BUTTON_UPDATE', 'memberupdate');

define('INFO_ACTIVITY_BEGIN', '<infoactivity>');
define('INFO_ACTIVITY_END', '</infoactivity>');

define('INFO_PROJECT_BEGIN', '<infoproject value="Member project">');
define('INFO_PROJECT_END', '%s</infoproject>');

define('INFO_CHARGE_BEGIN', '<infocharge value="Member charge">');
define('INFO_CHARGE_END', '%s</infocharge>');

define('INFO_ANSWER_BEGIN', '<infoanswer value="Member answer">');
define('INFO_ANSWER_END', '%s</infoanswer>');

define('INFO_PROJECT', '%s<infoproject name="%s" />');
define('INFO_CHARGE', '%s<infocharge name="%s" activity="%s" answer="%s" />');
define('INFO_ANSWER', '%s<infoanswer activity="%s" answer="%s" />');
define('INFO_AVERAGE', '<infoaverage average="%s" />');

define('INFO_POST_NAME', 'infoname');
define('INFO_POST_ACTIVITY', 'infoactivity');
define('INFO_POST_ANSWER', 'infoanswer');

// SQL request

define('INFO_SQL_LIST_PROJECT',
	   'SELECT usr_login
	    FROM tw_usr
		WHERE usr_level_id = 4
		OR usr_level_id = 3;');

define('INFO_SQL_LIST_CHARGE',
	   'SELECT usr_login, activity_usr_activity_id, activity_usr_answer
	    FROM tw_usr, tw_activity_usr
		WHERE usr_id = activity_usr_usr_id
		AND activity_usr_activity_id = %s;');

define('INFO_SQL_LIST_ANSWER',
	   'SELECT activity_usr_activity_id, activity_usr_answer
	    FROM tw_activity, tw_activity_usr
		WHERE activity_usr_activity_id = activity_id
		AND activity_usr_usr_id = %s;');

define('INFO_SQL_LIST_AVERAGE',
	   'SELECT activity_usr_answer
	    FROM tw_activity_usr
		WHERE activity_usr_activity_id = %s;');

define('INFO_SQL_LIST_ADD',
       'INSERT INTO tw_activity_usr
		VALUES (%s, %s, %s);');

define('INFO_SQL_LIST_DEL',
	   'DELETE FROM tw_activity_usr
	    WHERE activity_usr_activity_id = %s
		AND activity_usr_usr_id in (SELECT usr_id
								   FROM tw_usr
								   WHERE usr_login = \'%s\');');

define('INFO_SQL_LIST_UPDATE',
	   'UPDATE tw_activity_usr
	    SET activity_usr_answer = %s
		WHERE activity_usr_activity_id = %s
		AND activity_usr_usr_id = %s;');

?>