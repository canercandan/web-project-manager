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