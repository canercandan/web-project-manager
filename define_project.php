<?php

if (!MAIN)
  exit(0);

define('PROJECT_BEGIN', '<project>');
define('PROJECT_END', '</project>');
define('PROJECT_ITEM', '<project><title>%s</title><id>%d</id></project>');
define('PROJECT_WINDOW_BEGIN', '<project_window>');
define('PROJECT_WINDOW_END', '</project_window>');
define('PROJECT_NAME', '<name>%s</name>');
define('ADD_PROJECT_BEGIN', '<add_project>');
define('ADD_PROJECT_END', '</add_project>');
define('ACTIVITY_START', '<activity>');
define('ACTIVITY_END', '</activity>');
define('MEMBER_PROJECT_BEGIN', '<member_project>');
define('MEMBER_PROJECT_END', '</member_project>');
define('INFORMATION_PROJECT_BEGIN', '<information_project>');
define('INFORMATION_PROJECT_END', '</information_project>');

define('PROJECT_OK', 'Congratulation, project added');
define('FIELD_PROJECT_NAME', '<field_name>%s</field_name>');
define('FIELD_PROJECT_DESCRIB', '<field_descr>%s</field_descr>');
define('POST_PROJECT_NAME', 'projname');
define('POST_PROJECT_DESCRIB', 'projdescr');
define('UNKNOWED_PROJECT', 'Unknowed project');
define('INFORMATION', 0);
define('ADD_ACTIVITY', 1);
define('MEMBER', 2);

/*
** SQL
*/

//<activity_work><id>%d</id><name>%s</name><charge>%d</charge>
define('SQL_GET_FIRST_ACTIVITY', 'SELECT activity_id, activity_name, activity_charge_total
	FROM tw_activity
	WHERE 
	activity_project_id = \'%d\'
	AND activity_parent_id = 0;');

define('SQL_INFORMATION', 'SELECT project_name, project_describ, day(project_date), month(project_date), year(project_date), profil_name, profil_fname, title_name
FROM tw_profil, tw_title, tw_project
WHERE
title_id = profil_title_id
AND profil_usr_id = project_autor_usr_id
AND project_id = \'%d\';');

define('SQL_CHECK_PROJECT', 'select project_name from tw_project where project_id = \'%d\';');

define('SQL_SELECT_PROJECT', 'select project_name, project_id from tw_project');
	/*	tw_membre
		WHERE
		membre_usr_id = \'%d\' AND member_project_id = project_id');
	*/

define('SQL_ADD_PROJECT', 'INSERT INTO `tw_project` (
`project_id` ,
`project_autor_usr_id` ,
`project_name` ,
`project_describ` ,
`project_date`
)
VALUES (
NULL , \'%d\', \'%s\', \'%s\', CURDATE()
);');

?>