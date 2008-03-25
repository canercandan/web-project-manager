<?php

if (!MAIN)
  exit(0);

define('MEMBER_PROJECT_BEGIN', '<member_project>');
define('MEMBER_PROJECT_END', '</member_project>');

define('MEMBER_LIST_PROJECT_BEGIN', '<member_list_project>');
define('MEMBER_LIST_PROJECT_END', '</member_list_project>');

define('MEMBER_LIST_BEGIN', '<member_list>');
define('MEMBER_LIST_END', '</member_list>');

define('MEMBER_ELEM_PROJ',
       '<member>
	  <key unique="%d" />
	  <id>%d</id>
	  <moveable>%d</moveable>
	  <name>%s</name>
	  <fname>%s</fname>
	  <title>%s</title>
	  <login>%s</login>
	</member>');

define('MEMBER_ELEM_PROJECT_PROJ',
       '<member>
	  <id>%d</id>
	  <moveable>%d</moveable>
	  <editable>%d</editable>
	  <name>%s</name>
	  <fname>%s</fname>
	  <title>%s</title>
	  <role post="%s">%s</role>
	  <login>%s</login>
	  <key name="%s" unique="%d" id="%s" />
	</member>');

define('MEMBER_ROLE_LIST_BEGIN', '<role_list post="selectrole">');
define('MEMBER_ROLE_LIST_END', '</role_list>');
define('MEMBER_ROLE_ITEM', '<role id="%s" name="%s" />');
define('MEMBER_POST_SELECT', '<checkbox name="%s" />');
define('MEMBER_BTN_UP', '<btn_up post="%s" />');
define('MEMBER_BTN_DOWN', '<btn_down post="%s" />');
define('MEMBER_BTN_SUBMIT', '<btn_submit post="%s" />');
define('MEMBER_BTN_UPDATE', '<btn_update post="%s"/>');

define('BTN_UP', 'btn_up');
define('BTN_DOWN', 'btn_down');
define('BTN_SUBMIT', 'btn_submit');
define('BTN_UPDATE','update');

define('POST_SELECTMEMBER', 'selectmember');
define('POST_KEY_ID', 'key_member_proj_id');
define('POST_LIST_KEY', 'key');
define('POST_ROLE', 'modrole');

/*
** SQL
*/

define('SQL_CHECK_IN_PROJ',
       'SELECT	member_usr_id
	FROM	tw_member
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

define('SQL_INSERT_MEMBER',
       'INSERT INTO tw_member
	(member_project_id, member_usr_id, member_role_id)
	VALUES (\'%d\', \'%d\', 2);');

define('SQL_UPDATE_PROJECT_MEMBER',
       'UPDATE	tw_member
	SET	member_role_id = \'%d\'
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

define('SQL_REMOVE_PROJECT_MEMBER',
       'DELETE FROM	tw_member
	WHERE	member_usr_id = \'%d\'
		AND member_project_id = \'%d\';');

define('SQL_GET_MEMBER_OUT_PROJECT',
       'SELECT	usr_id, profil_name, profil_fname, title_name, usr_login
	FROM	tw_usr, tw_profil, tw_title
	WHERE	profil_title_id = title_id
		AND profil_usr_id = usr_id
		AND usr_id NOT IN (	SELECT	member_usr_id
					FROM	tw_member
					WHERE	member_project_id = \'%d\');');

define('SQL_GET_MEMBER_PROJECT',
       'SELECT	usr_id, profil_name, profil_fname, title_name,
		member_role_id, usr_login
	FROM	tw_usr, tw_profil, tw_member, tw_title
	WHERE	profil_usr_id = member_usr_id
		AND profil_usr_id = usr_id
		AND title_id = profil_title_id
		AND member_project_id = \'%d\'
	ORDER BY usr_login;');

?>