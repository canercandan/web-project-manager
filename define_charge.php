<?php

if (!MAIN)
  exit(0);

define('INFO_BUTTON_ADD', 'memberadd');
define('INFO_BUTTON_DEL', 'memberdel');
define('INFO_BUTTON_UPDATE', 'memberupdate');

define('INFO_ACTIVITY_BEGIN', '<infoactivity>');
define('INFO_ACTIVITY_END', '</infoactivity>');

define('INFO_PROJECT_BEGIN', '<infoproject value="Member project">');
define('INFO_PROJECT_END', '</infoproject>');

define('INFO_CHARGE_BEGIN', '<infocharge value="Member charge">');
define('INFO_CHARGE_END', '</infocharge>');

define('INFO_ANSWER_BEGIN', '<infoanswer value="Member answer">');
define('INFO_ANSWER_END', '</infoanswer>');

define('INFO_PROJECT', '<infoproject name="%s" />');
define('INFO_CHARGE', '<infocharge name="%s" activity="%s" answer="%s" />');
define('INFO_ANSWER', '<infoanswer activity="%s" answer="%s" />');
define('INFO_AVERAGE', '<infoaverage average="%s" />');

define('INFO_POST_USR', 'infoname');
define('INFO_POST_ACTIVITY', 'infoactivity');
define('INFO_POST_ANSWER', 'infoanswer');

// SQL request

define('INFO_SQL_LIST_PROJECT',
	   'SELECT DISTINCT activity_member_usr_id
	    FROM tw_activity_member
		WHERE activity_member_activity_id = \'%s\';');

define('INFO_SQL_LIST_CHARGE',
	   'SELECT usr_login, charge_activity_id, charge_answer
	    FROM tw_usr, tw_charge
		WHERE usr_id = charge_usr_id
		AND charge_activity_id = \'%s\';');

define('INFO_SQL_LIST_ANSWER',
	   'SELECT charge_activity_id, charge_answer
	    FROM tw_activity, tw_charge
		WHERE charge_activity_id = activity_id
		AND charge_usr_id = \'%s\';');

define('INFO_SQL_LIST_AVERAGE',
	   'SELECT charge_answer
	    FROM tw_charge
		WHERE charge_activity_id = \'%s\';');

define('INFO_SQL_LIST_ADD',
       'INSERT INTO tw_charge
		VALUES(\'%s\', \'%s\', \'%s\');');

define('INFO_SQL_LIST_DEL',
	   'DELETE FROM tw_charge
	    WHERE charge_activity_id = \'%s\'
		AND charge_usr_id in (SELECT usr_id
								   FROM tw_usr
								   WHERE usr_login = \'%s\');');

define('INFO_SQL_LIST_UPDATE',
	   'UPDATE tw_charge
	    SET charge_answer = \'%s\'
		WHERE charge_activity_id = \'%s\'
		AND charge_usr_id in (SELECT usr_id
								   FROM tw_usr
								   WHERE usr_login = \'%s\');');

?>