<?php

if (!MAIN)
  exit(0);

define('PHORUM_PROJECT_ID',	0);
define('PHORUM_ACTIVITY_ID',	1e6);
define('PHORUM_GENERAL_ID',	2e6);

define('PHORUM_PERM_READ',		2^0);
define('PHORUM_PERM_REPLY',		2^1);
define('PHORUM_PERM_EDIT',		2^2);
define('PHORUM_PERM_CREATE',		2^3);
define('PHORUM_PERM_ATTACH_FILE',	2^5);
define('PHORUM_PERM_MODO_MESSAGE',	2^6);

define('PHORUM_ADD_USER',
       'INSERT INTO	phorum_users
	(user_id, username, display_name, password, email,
	 active, pm_email_notify)
	VALUES	(\'%d\', \'%s\', \'%s\', \'%s\', \'%s\',
		 1, 1);');

define('PHORUM_ADD_PROJECT',
       'INSERT INTO	phorum_forums
	(forum_id, name, active, description, template, folder_flag,
	 parent_id, edit_post)
	VALUES	(\'%d\', \'%s\', 1, \'%s\', \'emerald\', 1,
		 0, 1);');

define('PHORUM_ADD_ACTIVITY',
       'INSERT INTO	phorum_forums
	(forum_id, name, active, description, template, folder_flag,
	 parent_id, edit_post)
	VALUES	(\'%d\', \'%s\', 1, \'%s\', \'emerald\', 1,
		 \'%d\', 1);');

define('PHORUM_ADD_GENERAL',
       'INSERT INTO	phorum_forums
	(forum_id, name, active, template, folder_flag,
	 parent_id, list_length_flat, list_length_threaded, float_to_top,
	 pub_perms, reg_perms, message_count, thread_count, read_length,
	 edit_post)
	VALUES	(\'%d\', \'General\', 1, \'emerald\', 0,
		 \'%d\', 30, 15, 0,
		 0, \'\', 0, 0, 20,
		 1);');

define('PHORUM_ADD_USER_PERMISSIONS',
       'INSERT INTO	phorum_user_permissions
	(user_id, forum_id, permission)
	VALUES(\'%d\', \'%d\', \'%d\');');

define('PHORUM_DELETE_USER_PERMISSIONS',
       'DELETE FROM	phorum_user_permissions
	WHERE		user_id = \'%d\'
			AND forum_id = \'%d\';');

define('PHORUM_DELETE_PERMISSIONS',
       'DELETE FROM	phorum_user_permissions
	WHERE		forum_id = \'%d\';');

define('PHORUM_DELETE_FORUM',
		'DELETE FROM phorum_forums
		WHERE	forum_id = \'%d\';');
	
?>