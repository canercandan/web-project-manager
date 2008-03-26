<?php

if (!MAIN)
  exit(0);


define('PROJECT_OK', 'Congratulation, project added');
define('PROJECT_UPDATED', 'Congratulation, project updated');
define('POST_PROJECT_DAY', 'projday');
define('POST_PROJECT_MONTH', 'projmonth');
define('POST_PROJECT_YEAR', 'projyear');
define('POST_PROJECT_DAY_END', 'projdayend');
define('POST_PROJECT_MONTH_END', 'projmonthend');
define('POST_PROJECT_YEAR_END', 'projyearend');

define('FIELD_PROJECT_NAME', '<field_name value="%s">%s</field_name>');
define('FIELD_PROJECT_DESCRIB', '<field_descr value="%s">%s</field_descr>');
define('FIELD_PROJECT_DATE', '<field_date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');
define('FIELD_PROJECT_DATE_END', '<field_date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');

define('ERR_NEW_DATE_ORDER', 'There are some mistakes with the dates : the date corresponding to the start (%s) must be after the one corresponding to the end (%s)');

define('SQL_NEW_INFORMATION', 'SELECT f.project_name, f.project_describ, day(f.project_date), month(f.project_date), year(f.project_date),
									day(f.project_date_end), month(f.project_date_end), year(f.project_date_end),
									p.profil_name, p.profil_fname, title_name
FROM tw_project f LEFT JOIN tw_profil p ON f.project_autor_usr_id = p.profil_usr_id LEFT JOIN tw_title ON title_id = p.profil_title_id   
WHERE
f.project_id = \'%d\';');

define('SQL_GET_PROJECT_CHARGE',
'select sum(activity_charge_total) FROM tw_activity WHERE activity_parent_id = 0 and activity_project_id = \'%d\';');

define('SQL_NEW_UPDATE_PROJECT',
       'UPDATE	tw_project
	SET	project_name = \'%s\',
		project_describ = \'%s\',
		project_date = DATE(\'%04d-%02d-%02d\'),
		project_date_end = DATE(\'%04d-%02d-%02d\')
	WHERE	project_id = \'%d\';');

define('SQL_NEW_ADD_PROJECT', 'INSERT INTO `tw_project` (
`project_id` ,
`project_autor_usr_id` ,
`project_name` ,
`project_describ` ,
`project_date`,
project_date_end
)
VALUES (
NULL , \'%d\', \'%s\', \'%s\', DATE(\'%04d-%02d-%02d\'), DATE(\'%04d-%02d-%02d\')
);');

?>