<?php

if (!MAIN)
  exit(0);

define('ADD_PROJECT', 0);

define('PROJECT_BEGIN', '<project>');
define('PROJECT_END', '</project>');
define('PROJECT_ITEM', '<project><surline>%s</surline><title>%s</title><id>%d</id></project>');
define('PROJECT_WINDOW_BEGIN', '<project_window id="%d">');
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
define('UNNAMED_PROJECT', 'Unnamed project');

define('POST_KEY_DAY_START', 'key_member_proj_day_start');
define('POST_KEY_MONTH_START', 'key_member_proj_month_start');
define('POST_KEY_YEAR_START', 'key_member_proj_year_start');
define('POST_KEY_DAY_END', 'key_member_proj_day_end');
define('POST_KEY_MONTH_END', 'key_member_proj_month_end');
define('POST_KEY_YEAR_END', 'key_member_proj_year_end');
define('POST_KEY_ID', 'key_member_proj_id');
define('POST_LIST_KEY', 'key');

define('POST_ROLE', 'modrole');
define('POST_DAY_START', 'member_proj_day_start');
define('POST_MONTH_START', 'member_proj_month_start');
define('POST_YEAR_START', 'member_proj_year_start');
define('POST_DAY_END', 'member_proj_day_end');
define('POST_MONTH_END', 'member_proj_month_end');
define('POST_YEAR_END', 'member_proj_year_end');

define('MEMBER_HISTO_LIST_PROJECT_END', '</member_histo_list_project>');
define('MEMBER_HISTO_LIST_PROJECT_BEGIN', '<member_histo_list_project>');
define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_BEGIN', '<member_list>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');
define('MEMBER_LIST_END', '</member_list>');
define('PROJECT_OK', 'Congratulation, project added');

define('POST_PROJECT_NAME', 'projname');
define('POST_PROJECT_DESCRIB', 'projdescr');
define('POST_PROJECT_DAY', 'projday');
define('POST_PROJECT_MONTH', 'projmonth');
define('POST_PROJECT_YEAR', 'projyear');
define('UNKNOWED_PROJECT', 'Unknowed project');
define('INFORMATION', 0);
define('ADD_ACTIVITY', 1);
define('MEMBER', 2);
define('MEMBER_DATEGRAPH', 3);
define('GANT', 4);
define('PROJECT_ARCHIVE', 5);

define('BTN_UPDATE','update');
define('BTN_UPDATE_MEMBER', 'update');
define('MEMBER_BTN_UPDATE', '<btn_update post="update"/>');
define('BTN_UPDATE_HISTO_MEMBER', 'update_histomember');
define('MEMBER_BTN_HISTO_UPDATE', '<btn_update_histo post="update_histomember"/>');
define('BTN_UP', 'btn_up');
define('BTN_DOWN', 'btn_down');
define('BTN_DELETE_HISTO', 'btn_delete_histo');
define('BTN_SUBMIT', 'btn_submit');
define('POST_SELECT', 'selectmember');
define('BTN_KEEP_HISTO','keep_histo');
define('MEMBER_BTN_UP', '<btn_up post="btn_up"/>');
define('MEMBER_BTN_DELETE_HISTO', '<btn_delete_histo post="btn_delete_histo"/>');
define('MEMBER_BTN_DOWN', '<btn_down post="btn_down"/>');
define('MEMBER_BTN_SUBMIT', '<btn_submit post="btn_submit"/>');
define('MEMBER_POST_SELECT', '<checkbox name="selectmember"/>');
define('MEMBER_KEEP_HISTO', '<btn_histo post="keep_histo"/>');

/*
** SQL
*/

define('SQL_CHECK_IN_PROJ',
       'SELECT	member_usr_id
	FROM	tw_member
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

define('SQL_GET_ROLE', 'SELECT role_id, role_name FROM tw_member_role');

define('SQL_GET_FIRST_ACTIVITY',
       'SELECT	activity_id, activity_name, activity_charge_total
	FROM	tw_activity
	WHERE	activity_project_id = \'%d\' AND activity_parent_id = 0;');

define('SQL_INFORMATION',
       'SELECT	f.project_name, f.project_describ,
		day(f.project_date), month(f.project_date), year(f.project_date), p.profil_name, p.profil_fname, title_name
	FROM	tw_project f
	LEFT JOIN tw_profil p ON f.project_autor_usr_id = p.profil_usr_id
	LEFT JOIN tw_title ON title_id = p.profil_title_id
	WHERE	f.project_id = \'%d\';');

define('SQL_CHECK_PROJECT',
       'SELECT	project_name
	FROM	tw_project
	WHERE	project_id = \'%d\' AND (project_autor_usr_id = \'%d\'
		OR project_id IN (SELECT	member_project_id
				  FROM		tw_member
				  WHERE		member_usr_id = \'%d\'));');

define('SQL_SELECT_PROJECT',
       'SELECT	project_name, project_id
	FROM	tw_project
	WHERE	(project_autor_usr_id = \'%d\'
		OR project_id IN (SELECT member_project_id
				  FROM tw_member
				  WHERE member_usr_id = \'%d\'));');

define('SQL_CHECK_AUTOR_PROJECT',
       'SELECT	project_id
	FROM	tw_project
	WHERE	project_id = \'%d\'
		AND project_autor_usr_id = \'%d\';');

define('SQL_DELETE_PROJECT',
       'DELETE FROM	tw_project
	WHERE		project_id = \'%d\';');

define('SQL_DELETE_PROJECT_MEMBER',
       'DELETE FROM	tw_member
	WHERE		member_project_id = \'%d\';');

define('SQL_DELETE_PROJECT_ACTIVITY',
       'DELETE FROM	tw_activity
	WHERE		activity_project_id = \'%d\';');

?>