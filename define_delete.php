<?php

if (!MAIN)
  exit(0);

define('SQL_DELETE_ONE_ACT',
       'DELETE FROM	tw_activity
	WHERE	activity_id = \'%d\';');

define('SQL_DELETE_ACT_FROM_ACT_MEMBER',
       'DELETE FROM	tw_activity_member
	WHERE		activity_member_activity_id = \'%d\';');

define('SQL_DELETE_ACT_DEPENDANCE',
       'DELETE FROM	tw_activity_dependance
	WHERE		activity_dependance_activity_id = \'%d\'
			OR activity_dependance_dependof_id = \'%d\';');

define('SQL_GET_ACT_ACT',
       'SELECT	activity_id
	FROM	tw_activity
	WHERE	activity_parent_id = \'%d\';');

define('SQL_GET_ACT_PROJ',
       'SELECT	activity_id
	FROM	tw_activity
	WHERE	activity_project_id=\'%d\'
		AND activity_parent_id = 0;');

define('SQL_DELETE_MEMBER_PROJECT',
       'DELETE FROM	tw_member
	WHERE		member_project_id =\'%d\';');

define('SQL_DELETE_ONE_MEMBER_PROJECT',
       'DELETE FROM	tw_member
	WHERE		member_project_id =\'%d\'
			AND member_usr_id=\'%d\';');

define('SQL_DELETE_PROJECT',
       'DELETE FROM	tw_project
	WHERE		project_id =\'%d\';');

define('SQL_DELETE_ONE_MEMBER_ACT',
       'DELETE FROM	tw_activity_member
	WHERE		activity_member_activity_id = \'%d\'
			AND activity_member_usr_id = \'%d\';');

?>