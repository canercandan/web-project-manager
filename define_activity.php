<?php

if (!MAIN)
  exit(0);

  
define('UNNAMED_ACTIVITY', 'Unnamed activity');
define('UNKNOWED_ACTIVITY', 'Unknowed activity');

define('ACTIVITY_WINDOW_BEGIN', '<activity_window id="%d">');
define('ACTIVITY_WINDOW_END', '</activity_window>');


define('MEMBER_ACTIVITY_BEGIN', '<member_activity>');
define('MEMBER_ACTIVITY_END', '</member_activity>');


define('MEMBER_ACTIVITY', 0);
define('INFORMATION_ACTIVITY', 1);
define('ADD_ACTIVITY_ACTIVITY', 2);
define('MEMBER_DATEGRAPH_ACTIVITY', 3);
define('ACTIVITY_WL_SUGGESTION', 4);
define('MEMBER_HISTO_LIST_ACTIVITY_BEGIN', '<member_histo_list_activity>');
define('MEMBER_HISTO_LIST_ACTIVITY_END', '</member_histo_list_activity>');
/*
define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_ACTIVITY_BEGIN', '<member_list_activity>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');
define('MEMBER_LIST_ACTIVITY_END', '</member_list_activity>');
define('MEMBER_POST_LEVEL', 'modlevel');
define('MEMBER_POST_WORK', 'modnwork');
define('MEMBER_POST_LIST_KEY', 'key');
define('MEMBER_ELEM_PROJECT', '<member><key name="key" unique="%d"/><id>%d</id><moveable>%d</moveable><name>%s</name><fname>%s</fname><title>%s</title><role>%s</role><login>%s</login></member>');
define('MEMBER_ELEM_ACTIVITY', '<member><id>%d</id><moveable>%d</moveable><editable>%d</editable><name>%s</name><fname>%s</fname><title>%s</title><role>%s</role><level post="%s">%d</level><work post="%s">%d</work><login>%s</login>
<date_start postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>
<date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>
<key name="key" unique="%d" id="%s" day_start="%s" month_start="%s" year_start= "%s" day_end="%s" month_end="%s" year_end= "%s"/>
</member>');
*/
define('POST_KEY_ACT_DAY_START', 'key_member_act_day_start');
define('POST_KEY_ACT_MONTH_START', 'key_member_act_month_start');
define('POST_KEY_ACT_YEAR_START', 'key_member_act_year_start');
define('POST_KEY_ACT_DAY_END', 'key_member_act_day_end');
define('POST_KEY_ACT_MONTH_END', 'key_member_act_month_end');
define('POST_KEY_ACT_YEAR_END', 'key_member_act_year_end');
define('POST_KEY_ACT_ID', 'key_member_act_id');


define('POST_ACT_DAY_START', 'member_act_day_start');
define('POST_ACT_MONTH_START', 'member_act_month_start');
define('POST_ACT_YEAR_START', 'member_act_year_start');
define('POST_ACT_DAY_END', 'member_act_day_end');
define('POST_ACT_MONTH_END', 'member_act_month_end');
define('POST_ACT_YEAR_END', 'member_act_year_end');


define('ACTIVITY_NAME', '<activity_name>%s</activity_name>');
define('ACTIVITY_DESCRIB', '<activity_describ>%s</activity_describ>');
define('ACTIVITY_CHARGE', '<activity_charge>%s</activity_charge>');
define('ACTIVITY_TITLE', '<title>%s</title>');
define('ACTIVITY_DEV', '<developped>%d</developped>');
define('ACTIVITY_ID', '<id>%s</id>');
define('ACTIVITY_EDITABLE' , '<editable>%d</editable>');
define('ACTIVITY_CHARGE_EDITABLE', '<charge post="%s" editable="%s">%d</charge>');
define('ERROR_ACTIVITY_NAME', 'error : activity\'s name already used');
define('ERROR_ACTIVITY_CHARGE', 'error : activity charge invalid');


define('CHARGE_NOT_INT', 'The unit of the charge of an activity is \'day per man\', that\'s why the charge must be an integer.');
define('POST_ACTIVITY_NAME', 'activityname');
define('POST_ACTIVITY_DESCRIB', 'activitydescrib');
define('POST_ACTIVITY_CHARGE', 'activitycharge');
define('POST_MOD_ACTIVITY_NAME', 'modactivityname');
define('POST_MOD_ACTIVITY_DESCRIB', 'modactivitydescrib');
define('POST_MOD_ACTIVITY_CHARGE', 'modactivitycharge');
define('PRINT_DATE', '%02d/%02d/%04d');

define('ERR_DATE_ORDER', 'There are some mistakes with the dates : the date corresponding to the start (%02d/%02d/%04d) must be after the one corresponding to the end (%02d/%02d/%04d)');
define('ERR_OLD_DATE_ORDER', '<line>There are some conflicts with the dates :</line>
<line>between the new starting date : %02d/%02d/%04d with the new ending date : %s and the starting date : %02d/%02d/%04d with the ending date : %s</line>');
define('ERR_DATE_PROJECT', 'There are some mistakes with the starting date : the starting date of the project (%s) is after the new starting date (%02d/%02d/%04d)');
define('ERR_DATE_ACTIVITY', 'There are some mistakes with the starting date : the starting date of the activity (%s) is after the new starting date (%02d/%02d/%04d)');
define('ERR_DATE_START_NOT_FULL', 'There are some mistakes with the starting dates : You must define all the field of the starting dates');
define('ERR_DATE_END_NOT_FULL', 'There are some mistakes with the ending dates : You must define all the field of the ending dates if you have starting to fill them');
define('ERR_DATE_SUBACTIVITY', 'The starting date of the subactivity %s : %s is before the new starting date (%02d/%02d/%04d)');
define('ERR_DATE_MEMBER_PROJACT', 'There are some mistakes with the dates : the member %s was not in the project/parent activity during the whole time between %s and %s');

/*
** Define activity sql request
*/

/*
define('SQL_DELETE_MEMBER_ACTIVITY','
											DELETE FROM tw_activity_member 
																WHERE activity_member_usr_id = \'%d\'
																	AND activity_member_activity_id = \'%d\'
																	AND activity_member_date_start = DATE(\'%04d-%02d-%02d\')
																	AND activity_member_date_end = DATE(\'%04d-%02d-%02d\');
																	');
define('SQL_CHECK_HISTO','DELETE FROM tw_activity_member
								WHERE activity_member_usr_id = \'%d\'
									AND activity_member_activity_id = \'%d\'
									AND activity_member_date_start = DATE(\'%04d-%02d-%02d\')
									AND activity_member_date_end = CURDATE()');
*/

define('SQL_CHECK_ACTIVITY_DATE', 'SELECT ((activity_date_begin - DATE(\'%04d-%02d-%02d\')) <= 0), DATE_FORMAT(activity_date_begin, \'%%d/%%m/%%Y\') FROM tw_activity WHERE activity_id=\'%d\';');


/*
define('SQL_UPDATE_MEMBER_ACTIVITY','
											UPDATE tw_activity_member SET 	activity_level = \'%d\',
																	activity_work = \'%d\',
																	activity_member_date_start = DATE(\'%04d-%02d-%02d\'),
																	activity_member_date_end = DATE(\'%04d-%02d-%02d\')
																WHERE activity_member_usr_id = \'%d\'
																	AND activity_member_activity_id = \'%d\'
																	AND activity_member_date_start = DATE(\'%04d-%02d-%02d\')
																	AND activity_member_date_end = DATE(\'%04d-%02d-%02d\');
																	');

*/

define('SQL_MOVE_TO_OLD_MEMBER_ACTIVITY','
											UPDATE tw_activity_member SET
																	activity_member_date_end = CURDATE()
																WHERE activity_member_usr_id = \'%d\'
																	AND activity_member_activity_id = \'%d\'
																	AND activity_member_date_start = DATE(\'%04d-%02d-%02d\')
																	AND activity_member_date_end = DATE(\'%04d-%02d-%02d\');
																	');
															

define('SQL_GET_DATES_MEMBER_ACTIVITY',
'	SELECT day(activity_member_date_start), month(activity_member_date_start), year(activity_member_date_start), 
			day(activity_member_date_end), month(activity_member_date_end), year(activity_member_date_end) FROM tw_activity_member WHERE
		activity_member_usr_id = \'%d\'
		AND activity_member_activity_id = \'%d\';
');





define('SQL_CHECK_ACTIVITY', 'SELECT activity_name FROM tw_activity WHERE activity_id = \'%d\';');

/*
define('SQL_ADD_MEMBER_ACT', 'INSERT INTO `tw_activity_member` (
`activity_member_activity_id` ,
`activity_member_usr_id` ,
`activity_level` ,
`activity_member_date_start` ,
`activity_member_date_end` ,
`activity_work`
)
VALUES (
\'%s\', \'%s\', 0, CURDATE(), \'0000-00-00\', 0);');
*/

define('SQL_SELECT_ACTIVITIES', 'SELECT activity_id, activity_name FROM tw_activity 
WHERE activity_project_id = \'%d\' 
and activity_parent_id = \'%d\'
order by activity_name;');

/*
define('SQL_GET_CHARGE', 'SELECT SUM(activity_charge_total) 
	FROM tw_activity 
	WHERE activity_parent_id = \'%d\';');

define('SQL_UPDATE_CHARGE', 'UPDATE tw_activity 
SET activity_charge_total = \'%d\' 
WHERE activity_id = \'%d\';');
*/

define('SQL_GET_PARENT_ID', 'SELECT activity_parent_id FROM tw_activity WHERE activity_id = \'%d\';');

/*
define('SQL_GET_MEMBER_ACTIVITY', 'SELECT usr_id, profil_name, profil_fname, title_name, role_name, activity_level, activity_work, usr_login, 
day(activity_member_date_start), month(activity_member_date_start), year(activity_member_date_start),
day(activity_member_date_end), month(activity_member_date_end), year(activity_member_date_end)
FROM tw_profil, tw_usr, tw_title, tw_member_role, tw_member, tw_activity_member
WHERE 
member_usr_id = usr_id
AND
usr_id = profil_usr_id
AND
profil_title_id = title_id
AND
member_role_id = role_id
AND
member_project_id = \'%d\'
AND
member_usr_id = activity_member_usr_id
AND
activity_member_activity_id = \'%d\'
AND (activity_member_date_end = DATE(\'0000-00-00\') OR DATEDIFF(CURDATE(), activity_member_date_end) < 0)
order by profil_name, profil_fname;
');

define('SQL_GET_HISTO_MEMBER_ACTIVITY', 'SELECT usr_id, profil_name, profil_fname, title_name, role_name, activity_level, activity_work, usr_login,
day(activity_member_date_start), month(activity_member_date_start), year(activity_member_date_start),
day(activity_member_date_end), month(activity_member_date_end), year(activity_member_date_end)
FROM tw_profil, tw_usr, tw_title, tw_member_role, tw_member, tw_activity_member
WHERE 
member_usr_id = usr_id
AND
usr_id = profil_usr_id
AND
profil_title_id = title_id
AND
member_role_id = role_id
AND
member_project_id = \'%d\'
AND
member_usr_id = activity_member_usr_id
AND
activity_member_activity_id = \'%d\'
AND (activity_member_date_end != DATE(\'0000-00-00\') AND DATEDIFF(CURDATE(), activity_member_date_end) >= 0)
order by profil_name, profil_fname;
');

define('SQL_GET_MEMBER_PROJECT_ACT', 'SELECT usr_id, profil_name, profil_fname, title_name, role_name, usr_login
FROM tw_profil, tw_usr, tw_title, tw_member_role, tw_member, tw_activity
WHERE 
activity_id = \'%d\'
AND
activity_parent_id = 0
AND
member_usr_id = usr_id
AND
usr_id = profil_usr_id
AND
profil_title_id = title_id
AND
member_role_id = role_id
AND
member_project_id = \'%d\'
AND
member_usr_id not in (SELECT activity_member_usr_id FROM tw_activity_member WHERE activity_member_activity_id = \'%d\'
AND (activity_member_date_end = DATE(\'0000-00-00\') OR DATEDIFF(CURDATE(), activity_member_date_end) <= 0))

UNION

SELECT usr_id, profil_name, profil_fname, title_name, role_name, usr_login
FROM tw_profil, tw_usr, tw_title, tw_member_role, tw_member, tw_activity, tw_activity_member
WHERE 
activity_id = \'%d\'
AND
activity_parent_id != 0
AND
activity_member_activity_id = activity_parent_id
AND
activity_member_usr_id = usr_id
AND
member_usr_id = usr_id
AND
usr_id = profil_usr_id
AND
profil_title_id = title_id
AND
member_role_id = role_id
AND
member_project_id = \'%d\'
AND
member_usr_id not in (SELECT activity_member_usr_id FROM tw_activity_member WHERE activity_member_activity_id = \'%d\'
AND (activity_member_date_end = DATE(\'0000-00-00\') OR DATEDIFF(CURDATE(), activity_member_date_end) <= 0))
');
*/


define('SQL_GET_UNDERACT_WORK', 
	'
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(CURDATE(), activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND DATEDIFF(CURDATE(),activity_member_date_start) > 0
	AND (activity_member_date_end = DATE(\'0000-00-00\') or DATEDIFF(CURDATE(), activity_member_date_end) < 0)
	AND activity_id = \'%d\'
	AND activity_work = 1
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(activity_member_date_end, activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND DATEDIFF(CURDATE(), activity_member_date_start) > 0
	AND activity_member_date_end != DATE(\'0000-00-00\')
	AND DATEDIFF(CURDATE(), activity_member_date_end) >= 0
	AND activity_id = \'%d\'
	AND activity_work = 1
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION	
	SELECT activity_id, activity_name, activity_charge_total, -1 as "work" FROM tw_activity 
	WHERE activity_parent_id = \'%d\' AND activity_id in (SELECT DISTINCT activity_parent_id FROM tw_activity)
		UNION
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(CURDATE(), activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND DATEDIFF(CURDATE(), activity_member_date_start) > 0
	AND (activity_member_date_end = DATE(\'0000-00-00\') or DATEDIFF(CURDATE(), activity_member_date_end) < 0)
	AND activity_parent_id = \'%d\'
	AND activity_work = 1
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(activity_member_date_end, activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND DATEDIFF(CURDATE(), activity_member_date_start) > 0
	AND activity_work = 1
	AND activity_member_date_end != DATE(\'0000-00-00\')
	AND DATEDIFF(CURDATE(), activity_member_date_end) >= 0
	AND activity_parent_id = \'%d\'
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION
	SELECT activity_id, activity_name, activity_charge_total, 0 as "work" FROM tw_activity
	WHERE activity_id not in (
	SELECT DISTINCT activity_parent_id FROM tw_activity
	UNION
	SELECT DISTINCT activity_member_activity_id FROM tw_activity_member
	WHERE
	DATEDIFF(CURDATE(), activity_member_date_start) > 0
	AND activity_work = 1
	)
	AND activity_parent_id = \'%d\'
	GROUP BY activity_id;'
	);
	
define('SQL_CHECK_SUBACT_DATE','
SELECT activity_id, activity_name, DATE_FORMAT(activity_date_begin, \'%%d/%%m/%%Y\'), (DATEDIFF(DATE(\'%04d-%02d-%02d\'), activity_date_begin) > 0) FROM tw_activity
WHERE activity_parent_id = \'%d\' AND activity_project_id = \'%d\';');

define('SQL_UPDATE_DATE_ACT_START',
'UPDATE tw_activity SET activity_date_begin = DATE(\'%04d-%02d-%02d\')
WHERE
activity_id = \'%d\';');

define('SQL_UPDATE_DATE_ACT_END',
'
UPDATE tw_activity SET activity_date_end = DATE(\'%04d-%02d-%02d\')
WHERE
activity_id = \'%d\'
AND
DATEDIFF(DATE(\'%04d-%02d-%02d\'), activity_date_end) > 0;
');

define('SQL_UPDATE_MEMBER_DIFFDATE_START_ACT','
UPDATE tw_activity_member
SET activity_member_date_start = DATE(\'%04d-%02d-%02d\')
WHERE
activity_member_activity_id = \'%d\'
AND
DATEDIFF(DATE(\'%04d-%02d-%02d\'), activity_member_date_start) > 0
AND 
(activity_member_date_end = DATE(\'000-00-00\') OR DATEDIFF(DATE(\'%04d-%02d-%02d\'), activity_member_date_end) <= 0); 
');

define('SQL_DELETE_MEMBER_DIFFDATE_END_ACT','
DELETE FROM tw_activity_member
WHERE
activity_member_activity_id = \'%d\'
AND
DATEDIFF(DATE(\'%04d-%02d-%02d\'), activity_member_date_end) > 0; 
');


?>