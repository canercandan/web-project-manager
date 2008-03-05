<?php

if (!MAIN)
  exit(0);

define('UNKNOWED_ACTIVITY', 'Unknowed activity');

define('ACTIVITY_WINDOW_BEGIN', '<activity_window>');
define('ACTIVITY_WINDOW_END', '</activity_window>');

define('ADD_ACTIVITY_BEGIN', '<add_activity>');
define('ADD_ACTIVITY_END', '</add_activity>');
define('MEMBER_ACTIVITY_BEGIN', '<member_activity>');
define('MEMBER_ACTIVITY_END', '</member_activity>');
define('INFORMATION_ACTIVITY_BEGIN', '<information_activity>');
define('INFORMATION_ACTIVITY_END', '</information_activity>');

define('MEMBER_ACTIVITY', 0);
define('INFORMATION_ACTIVITY', 1);
define('ADD_ACTIVITY_ACTIVITY', 2);
define('MEMBER_HISTO_LIST_ACTIVITY_BEGIN', '<member_histo_list_activity>');
define('MEMBER_HISTO_LIST_ACTIVITY_END', '</member_histo_list_activity>');
define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_ACTIVITY_BEGIN', '<member_list_activity>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');
define('MEMBER_LIST_ACTIVITY_END', '</member_list_activity>');
define('MEMBER_POST_LEVEL', 'modlevel');
define('MEMBER_POST_WORK', 'modnwork');
define('MEMBER_ELEM_PROJECT', '<member><key unique="%d"/><id>%d</id><moveable>%d</moveable><name>%s</name><fname>%s</fname><title>%s</title><role>%s</role><login>%s</login></member>');
define('MEMBER_ELEM_ACTIVITY', '<member><id>%d</id><moveable>%d</moveable><editable>%d</editable><name>%s</name><fname>%s</fname><title>%s</title><role>%s</role><level post="%s">%d</level><work post="%s">%d</work><login>%s</login>
<date_start postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>
<date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>
<key unique="%d" id="%s" day_start="%s" month_start="%s" year_start= "%s" day_end="%s" month_end="%s" year_end= "%s"/>
</member>');
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

define('FIELD_ACTIVITY_NAME', '<field_activity_name>%s</field_activity_name>');
define('FIELD_ACTIVITY_DESCRIB', '<field_activity_describ>%s</field_activity_describ>');
define('FIELD_ACTIVITY_CHARGE', '<field_activity_charge>%s</field_activity_charge>');

define('ACTIVITY_NAME', '<activity_name>%s</activity_name>');
define('ACTIVITY_DESCRIB', '<activity_describ>%s</activity_describ>');
define('ACTIVITY_CHARGE', '<activity_charge>%s</activity_charge>');
define('ACTIVITY_TITLE', '<title>%s</title>');
define('ACTIVITY_DEV', '<developped>%d</developped>');
define('ACTIVITY_ID', '<id>%s</id>');
define('ACTIVITY_EDITABLE' , '<editable>%d</editable>');

define('ERROR_ACTIVITY_NAME', 'error : activity\'s name already used');
define('ERROR_ACTIVITY_CHARGE', 'error : activity charge invalid');


define('ACTIVITY_OK', 'Congratulation, activity added');
define('CHARGE_NOT_INT', 'The unit of the charge of an activity is \'day per man\', that\'s why the charge must be an integer.');
define('POST_ACTIVITY_NAME', 'activityname');
define('POST_ACTIVITY_DESCRIB', 'activitydescrib');
define('POST_ACTIVITY_CHARGE', 'activitycharge');

/*
** Define activity sql request
*/

define('SQL_CHECK_ACTIVITY', 'SELECT activity_name FROM tw_activity WHERE activity_id = \'%d\';');

define('SQL_ADD_ACTIVITY','INSERT INTO `tw_activity` (
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
NULL , \'%d\', \'%d\', \'%s\', \'%d\', CURDATE(), \'0000-00-00\', \'%s\'
);');

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

define('SQL_SELECT_ACTIVITIES', 'SELECT activity_id, activity_name FROM tw_activity 
WHERE activity_project_id = \'%d\' 
and activity_parent_id = \'%d\'
order by activity_name;');

define('SQL_GET_CHARGE', 'SELECT SUM(activity_charge_total) 
	FROM tw_activity 
	WHERE activity_parent_id = \'%d\';');

define('SQL_UPDATE_CHARGE', 'UPDATE tw_activity 
SET activity_charge_total = \'%d\' 
WHERE activity_id = \'%d\';');

define('SQL_GET_PARENT_ID', 'SELECT activity_parent_id FROM tw_activity WHERE activity_id = \'%d\';');

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
FROM tw_profil, tw_usr, tw_title, tw_member_role, tw_member
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
member_usr_id not in (SELECT activity_member_usr_id FROM tw_activity_member WHERE activity_member_activity_id = \'%d\'
AND (activity_member_date_end = DATE(\'0000-00-00\') OR DATEDIFF(CURDATE(), activity_member_date_end) < 0))
order by profil_name, profil_fname;
');

define('SQL_GET_ACTIVITY_INFORMATIONS', 'SELECT activity_name, activity_describtion, activity_charge_total, day(activity_date_begin), month(activity_date_begin), year(activity_date_begin) FROM tw_activity
WHERE activity_id = \'%d\';');

define('SQL_GET_UNDERACT_WORK', 
	'
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(CURDATE(), activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND CURDATE() > activity_member_date_start
	AND (activity_member_date_end = DATE(\'0000-00-00\') or CURDATE() < activity_member_date_end)
	AND activity_id = \'%d\'
	AND activity_work = 1
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(activity_member_date_end, activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND CURDATE() > activity_member_date_start
	AND activity_member_date_end != DATE(\'0000-00-00\')
	AND CURDATE() > activity_member_date_end
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
	AND CURDATE() > activity_member_date_start
	AND (activity_member_date_end = DATE(\'0000-00-00\') or CURDATE() < activity_member_date_end)
	AND activity_parent_id = \'%d\'
	AND activity_work = 1
	AND activity_id not in (SELECT DISTINCT activity_parent_id FROM tw_activity)
	GROUP BY activity_id
	UNION
	SELECT activity_id, activity_name, activity_charge_total, SUM(DATEDIFF(activity_member_date_end, activity_member_date_start)) as "work" FROM tw_activity, tw_activity_member
	WHERE activity_member_activity_id = activity_id
	AND CURDATE() > activity_member_date_start
	AND activity_work = 1
	AND activity_member_date_end != DATE(\'0000-00-00\')
	AND CURDATE() > activity_member_date_end
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
	CURDATE() > activity_member_date_start
	AND activity_work = 1
	)
	AND activity_parent_id = \'%d\'
	GROUP BY activity_id;'
	);

?>