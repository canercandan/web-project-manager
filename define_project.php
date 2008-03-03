<?php

if (!MAIN)
  exit(0);

define('ADD_PROJECT', 0);

define('PROJECT_BEGIN', '<project>');
define('PROJECT_END', '</project>');
define('PROJECT_ITEM', '<project><surline>%s</surline><title>%s</title><id>%d</id></project>');
define('PROJECT_WINDOW_BEGIN', '<project_window>');
define('PROJECT_WINDOW_END', '</project_window>');
define('PROJECT_NAME', '<name>%s</name>');
define('ADD_PROJECT_BEGIN', '<add_project>');
define('ADD_PROJECT_END', '</add_project>');
define('ACTIVITY_START', '<activity>');
define('ACTIVITY_END', '</activity>');
define('ACTIVITY_LIST_START', '<activity>');
define('ACTIVITY_LIST_END', '</activity>');
define('MEMBER_PROJECT_BEGIN', '<member_project>');
define('MEMBER_PROJECT_END', '</member_project>');
define('INFORMATION_PROJECT_BEGIN', '<information_project>');
define('INFORMATION_PROJECT_END', '</information_project>');

define('MEMBER_ELEM_PROJ', '<member><id>%d</id><moveable>%d</moveable><name>%s</name><fname>%s</fname><title>%s</title><login>%s</login></member>');
define('MEMBER_ELEM_PROJECT_PROJ', '<member><id>%d</id><moveable>%d</moveable><editable>%d</editable><name>%s</name>
<fname>%s</fname>
<title>%s</title>
<role post="modrole">%s</role>
<login>%s</login>
<date_start post_day="%s" day="%d" post_month="%s" month="%d" post_year="%s" year="%d"/>
<date_end post_day="%s" day="%d" post_month="%s" month="%d" post_year="%s" year="%d"/>
<key id="%s" day_start="%s" month_start="%s" year_start= "%s" day_end="%s" month_end="%s" year_end= "%s"/>
</member>');
define('POST_KEY_DAY_START', 'key_member_proj_day_start');
define('POST_KEY_MONTH_START', 'key_member_proj_month_start');
define('POST_KEY_YEAR_START', 'key_member_proj_year_start');
define('POST_KEY_DAY_END', 'key_member_proj_day_end');
define('POST_KEY_MONTH_END', 'key_member_proj_month_end');
define('POST_KEY_YEAR_END', 'key_member_proj_year_end');
define('POST_KEY_ID', 'key_member_proj_id');

define('POST_DAY_START', 'member_proj_day_start');
define('POST_MONTH_START', 'member_proj_month_start');
define('POST_YEAR_START', 'member_proj_year_start');
define('POST_DAY_END', 'member_proj_day_end');
define('POST_MONTH_END', 'member_proj_month_end');
define('POST_YEAR_END', 'member_proj_year_end');

define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_BEGIN', '<member_list>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');
define('MEMBER_LIST_END', '</member_list>');
define('PROJECT_OK', 'Congratulation, project added');
define('FIELD_PROJECT_NAME', '<field_name>%s</field_name>');
define('FIELD_PROJECT_DESCRIB', '<field_descr>%s</field_descr>');
define('POST_PROJECT_NAME', 'projname');
define('POST_PROJECT_DESCRIB', 'projdescr');
define('UNKNOWED_PROJECT', 'Unknowed project');
define('INFORMATION', 0);
define('ADD_ACTIVITY', 1);
define('MEMBER', 2);

define('BTN_UP', 'btn_up');
define('BTN_DOWN', 'btn_down');
define('BTN_SUBMIT', 'btn_sumbit');
define('POST_SELECT', 'selectmember');
define('POST_KEEP_HISTO','keep_histo');
define('MEMBER_BTN_UP', '<btn_up post="btn_up"/>');
define('MEMBER_BTN_DOWN', '<btn_down post="btn_down"/>');
define('MEMBER_BTN_SUBMIT', '<btn_submit post="btn_sumbit"/>');
define('MEMBER_POST_SELECT', '<checkbox name="selectmember"/>');
define('MEMBER_KEEP_HISTO', '<checkbox name="keep_histo"/>');

/*
** SQL
*/

define('SQL_CHECK_IN_PROJ', 'SELECT member_usr_id FROM tw_member 
WHERE member_usr_id = \'%d\'
AND member_project_id = \'%d\';');

define('SQL_INSERT_MEMBER'
,'INSERT INTO `techweb`.`tw_member` (
`member_project_id` ,
`member_usr_id` ,
`member_role_id` ,
`member_date_start` ,
`member_date_end`
)
VALUES (
\'%d\', \'%d\', NULL, CURDATE(), \'0000-00-00\'
);');

define('SQL_REMOVE_TOT_MEMBER', 
'DELETE FROM tw_member
WHERE member_usr_id = \'%d\'
AND member_project_id = \'%d\';');

define('SQL_GET_ROLE', 'SELECT role_id, role_name FROM tw_member_role');
define('SQL_GET_MEMBER_OUT_PROJECT', 'SELECT usr_id, profil_name, profil_fname, title_name, usr_login FROM tw_usr, tw_profil, tw_title
WHERE
profil_title_id = title_id
AND profil_usr_id = usr_id
AND usr_id not in (SELECT member_usr_id FROM tw_member WHERE member_project_id = \'%d\');');

define('SQL_GET_MEMBER_PROJECT', 'SELECT profil_usr_id, profil_name, profil_fname, title_name, member_role_id, usr_login,
 day(member_date_start), month(member_date_start), year(member_date_start),
 day(member_date_end), month(member_date_end), year(member_date_end)
FROM tw_usr, tw_profil, tw_member, tw_title
WHERE
profil_usr_id = member_usr_id
AND profil_usr_id = usr_id
AND member_project_id = \'%d\'
AND title_id = profil_title_id
order by member_date_end, member_date_start, usr_login');


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