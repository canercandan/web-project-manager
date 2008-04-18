<?php

if (!MAIN)
  exit(0);

define('INFORMATION_ACTIVITY_BEGIN', '<information_activity>');
define('INFORMATION_ACTIVITY_END', '</information_activity>');  
define('INFORMATION_DEPENDANCE_ACTIVITY_BEGIN', '<information_dependance_activity>');
define('INFORMATION_DEPENDANCE_ACTIVITY_END', '</information_dependance_activity>');  
define('ADD_ACTIVITY_BEGIN', '<add_activity>');
define('ADD_ACTIVITY_END', '</add_activity>');
  
define('ACTIVITY_OK', 'Congratulation, activity added');
define('ACTIVITY_UPDATED', 'Congratulation, activity updated');

define('POST_ACTIVITY_DAY', 'actday');
define('POST_ACTIVITY_MONTH', 'actmonth');
define('POST_ACTIVITY_YEAR', 'actyear');
define('POST_ACTIVITY_DAY_END', 'actdayend');
define('POST_ACTIVITY_MONTH_END', 'actmonthend');
define('POST_ACTIVITY_YEAR_END', 'actyearend');  
define('POST_ACTIVITY_DEPEND', 'postdepend');

define('FIELD_ACTIVITY_NAME', '<field_activity_name value="%s">%s</field_activity_name>');
define('FIELD_ACTIVITY_DESCRIB', '<field_activity_describ value="%s">%s</field_activity_describ>');
define('FIELD_ACTIVITY_CHARGE', '<field_activity_charge value="%s">%s</field_activity_charge>');
define('FIELD_ACTIVITY_DATE', '<field_date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');
define('FIELD_ACTIVITY_DATE_END', '<field_date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');
define('FIELD_ESTIMATE_DATE_START', '<field_estimate_date_start ok="%s" value="%s"/>');
define('FIELD_ESTIMATE_DATE_END', '<field_estimate_date_end ok="%s" value="%s"/>');

define('ERR_NEW_DATE_ORDER', 'There are some mistakes with the dates : the date corresponding to the start (%s) must be after the one corresponding to the end (%s)');
define('ERR_NEW_DATE_PROJECT', 'There are some mistakes with the dates : the dates of the project are : %s - %s');

define('SQL_GET_WORKER', 'SELECT activity_member_usr_id from tw_activity_member
where activity_member_activity_id = \'%d\'
and activity_work = 1;');

define('SQL_CHECK_WORK_ACTIVITY', 'SELECT activity_member_activity_id from tw_activity_member
where activity_member_activity_id != \'%d\'
and activity_member_usr_id =\'%d\'
and activity_work = 1;');

define('SQL_GET_NEW_ACTIVITY_INFORMATIONS', '
SELECT p.activity_name, p.activity_describtion, p.activity_charge_total, 
day(p.activity_date_begin), month(p.activity_date_begin), year(p.activity_date_begin),
day(p.activity_date_end), month(p.activity_date_end), year(p.activity_date_end),
(count(f.activity_id) = 0)
FROM tw_activity p LEFT JOIN tw_activity f ON f.activity_parent_id = p.activity_id
WHERE 
p.activity_id = \'%d\'
GROUP BY f.activity_id');

define('SQL_SELECT_ACTIVITIES_DEPENDANCE', 'SELECT activity_id, activity_name, (activity_dependance_dependof_id is not NULL) 
FROM tw_activity LEFT JOIN tw_activity_dependance ON (activity_dependance_activity_id = \'%d\' AND activity_dependance_dependof_id = activity_id)
WHERE activity_project_id = \'%d\' 
and activity_parent_id = \'%d\'
order by activity_name;');

define('SQL_NEW_ADD_ACTIVITY','INSERT INTO `tw_activity` (
`activity_id` ,
`activity_project_id` ,
`activity_parent_id` ,
`activity_name` ,
`activity_charge_total` ,
`activity_date_begin` ,
`activity_date_end` ,
`activity_describtion`
)
VALUES (
NULL , \'%d\', \'%d\', \'%s\', \'%d\', \'%04d-%02d-%02d\', \'%04d-%02d-%02d\', \'%s\'
);');

define('SQL_CHECK_DEPENDANCE', 'SELECT activity_dependance_activity_id FROM tw_activity_dependance
WHERE
`activity_dependance_activity_id` = \'%d\'
AND
`activity_dependance_dependof_id` = \'%d\';');

define('SQL_ADD_DEPENDANCE','INSERT INTO `tw_activity_dependance` (
`activity_dependance_activity_id` ,
`activity_dependance_dependof_id`
)
VALUES (
\'%d\', \'%d\'
);');

define('SQL_REMOVE_DEPENDANCE','DELETE FROM `tw_activity_dependance` WHERE
`activity_dependance_activity_id` = \'%d\'
AND
`activity_dependance_dependof_id` = \'%d\';');

define('SQL_GET_CHARGE', 'SELECT SUM(activity_charge_total) 
	FROM tw_activity 
	WHERE activity_parent_id = \'%d\';');

define('SQL_UPDATE_CHARGE', 'UPDATE tw_activity 
SET activity_charge_total = \'%d\' 
WHERE activity_id = \'%d\';');

define('SQL_NEW_UPDATE_ACTIVITY_CHARGE',
'
UPDATE tw_activity
SET activity_name = \'%s\', activity_describtion = \'%s\',  activity_date_begin = DATE(\'%04d-%02d-%02d\'),
			activity_date_end = DATE(\'%04d-%02d-%02d\'),
			activity_charge_total = \'%d\'
WHERE activity_id = \'%d\';');

define('SQL_NEW_UPDATE_ACTIVITY',
'
UPDATE tw_activity
SET activity_name = \'%s\', activity_describtion = \'%s\',  
			activity_date_begin = DATE(\'%04d-%02d-%02d\'),
			activity_date_end = DATE(\'%04d-%02d-%02d\')
WHERE activity_id = \'%d\';');

define('SQL_GET_PARENT_ID', 'SELECT activity_parent_id FROM tw_activity WHERE activity_id = \'%d\';');

define('SQL_NEW_CHECK_PROJECT_DATE', 'SELECT (DATEDIFF(project_date,DATE(\'%04d-%02d-%02d\')) <= 0), (DATEDIFF(DATE(\'%04d-%02d-%02d\'), project_date_end) <= 0), 
												(DATEDIFF(project_date,DATE(\'%04d-%02d-%02d\')) <= 0), (DATEDIFF(DATE(\'%04d-%02d-%02d\'), project_date_end) <= 0),
												DATE_FORMAT(project_date, \'%%d/%%m/%%Y\'), DATE_FORMAT(project_date_end, \'%%d/%%m/%%Y\')  
									FROM tw_project WHERE project_id=\'%d\';');

define('SQL_NEW_CHECK_CHARGE_EDITABLE',
'SELECT (count(f.activity_id) = 0)
FROM tw_activity p LEFT JOIN tw_activity f ON f.activity_parent_id = p.activity_id
WHERE 
p.activity_id = \'%d\'
GROUP BY f.activity_id;'
);

define('SQL_GET_ACTIVITY_DEPEND',
       'SELECT	activity_dependance_activity_id,
		activity_dependance_dependof_id
	FROM	tw_activity_dependance
	WHERE	activity_dependance_activity_id = \'%d\';');

?>