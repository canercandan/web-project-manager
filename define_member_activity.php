<?php

if (!MAIN)
  exit(0);

define('MEMBER_ACTIVITY_BEGIN', '<member_activity>');
define('MEMBER_ACTIVITY_END', '</member_activity>');

define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');

define('MEMBER_LIST_ACTIVITY_BEGIN', '<member_list_activity>');
define('MEMBER_LIST_ACTIVITY_END', '</member_list_activity>');
define('MEMBER_POST_SELECT', '<checkbox name="%s" />');
define('MEMBER_BTN_UP', '<btn_up post="%s" />');
define('MEMBER_BTN_DOWN', '<btn_down post="%s" />');
define('MEMBER_BTN_UPDATE', '<btn_update post="%s"/>');

define('BTN_UP', 'btn_up');
define('BTN_DOWN', 'btn_down');
define('BTN_UPDATE','update');

define('POST_SELECT', 'selectmember');
define('POST_KEY_ACT_ID', 'key_member_act_id');

define('MEMBER_ELEM_PROJECT',
       '<member>
		<key name="key" unique="%d" />
		<id>%d</id>
		<moveable>%d</moveable>
		<name>%s</name>
		<fname>%s</fname>
		<title>%s</title>
		<role>%s</role>
		<login>%s</login>
	</member>');

define('MEMBER_ELEM_ACTIVITY',
       '<member>
		<id>%d</id>
		<moveable>%d</moveable>
		<editable>%d</editable>
		<name>%s</name>
		<fname>%s</fname>
		<title>%s</title>
		<role>%s</role>
		<level post="%s">%d</level>
		<work post="%s">%d</work>
		<login>%s</login>
		<key name="%s" unique="%d" id="%s" />
	</member>');

define('MEMBER_POST_LEVEL', 'modlevel');
define('MEMBER_POST_WORK', 'modnwork');
define('MEMBER_POST_LIST_KEY', 'key');

/*
** SQL
*/

define('SQL_ADD_MEMBER_ACTIVITY',
       'INSERT INTO	tw_activity_member
	(activity_member_activity_id, activity_member_usr_id,
	 activity_level, activity_work)
	VALUES (\'%s\', \'%s\', 0, 0);');

define('SQL_UPDATE_MEMBER_ACTIVITY',
       'UPDATE	tw_activity_member
	SET	activity_level = \'%d\',
		activity_work = \'%d\'
	WHERE	activity_member_usr_id = \'%d\'
		AND activity_member_activity_id = \'%d\';');

define('SQL_REMOVE_MEMBER_ACTIVITY',
       'DELETE FROM	tw_activity_member
	WHERE	activity_member_usr_id = \'%d\'
		AND activity_member_activity_id = \'%d\';');

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
member_usr_id not in (SELECT activity_member_usr_id FROM tw_activity_member WHERE activity_member_activity_id = \'%d\')
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
member_usr_id not in (SELECT activity_member_usr_id FROM tw_activity_member WHERE activity_member_activity_id = \'%d\')
');

define('SQL_GET_MEMBER_ACTIVITY',
       'SELECT	usr_id, profil_name, profil_fname, title_name, role_name,
		activity_level, activity_work, usr_login
	FROM	tw_profil, tw_usr, tw_title, tw_member_role,
		tw_member, tw_activity_member
	WHERE	member_usr_id = usr_id
		AND usr_id = profil_usr_id
		AND profil_title_id = title_id
		AND member_role_id = role_id
		AND member_usr_id = activity_member_usr_id
		AND member_project_id = \'%d\'
		AND activity_member_activity_id = \'%d\'
	ORDER BY	profil_name ASC,
			profil_fname ASC;');

?>