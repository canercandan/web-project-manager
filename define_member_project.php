<?php

if (!MAIN)
  exit(0);

/*
** SQL
*/

define('SQL_INSERT_MEMBER',
       'INSERT INTO tw_member
	(member_project_id, member_usr_id, member_role_id)
	VALUES (\'%d\', \'%d\', 2);');

define('SQL_UPDATE_PROJECT_MEMBER',
       'UPDATE	tw_member
	SET	member_role_id = \'%d\'
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

define('SQL_DELETE_PROJECT_MEMBER',
       'DELETE FROM	tw_member
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

?>