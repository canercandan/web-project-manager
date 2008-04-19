<?php

define('SQL_GET_LEVEL_USR','SELECT usr_level_id FROM tw_usr WHERE usr_id = \'%d\';');

define('SQL_GET_PROJECT_RIGHT', 'SELECT add_activity, remove_activity, add_member, kick_member, add_member_activity, kick_member_activity, remove_project FROM tw_member_role, tw_member_project
	WHERE 
	role_id = member_role_id
	AND member_usr_id =\'%d\'
	AND member_project_id = \'%d\';');

define('SQL_GET_ACTIVITY_RIGHT', 'SELECT add_activity_ifmember, remove_activity_ifmember, add_member_activity_ifmember, kick_member_activity_ifmember
	FROM tw_member_role, tw_member, tw_activity_member
	WHERE 
	role_id = member_role_id
	AND member_usr_id=\'%d\'
	AND member_project_id=\'%d\'
	AND activity_member_activity_id=\'%d\'
	AND activity_member_usr_id=member_usr_id;');	

define('PROJECT_RIGHT','<projectright update_member_activity="1" add_activity="%d" remove_activity="%d" add_member="%d" kick_member="%d" add_member_activity="%d" kick_member_activity="%d" remove_project="%d"/>');
define('ACTIVITY_RIGHT','<activityright update_member_activity="1" add_activity="%d" remove_activity="%d" add_member_activity="%d" kick_member_activity="%d"/>');

function get_project_right($id_project, $id_usr)
{
	$res = sql_query(sprintf(SQL_GET_LEVEL_USR, sql_real_escape_string($id_usr)));
	$tab = sql_fetch_array($res);
	if ($tab[0] == 3 || $tab[0] == 1 || $tab[0] == 2)
	{
		printf(PROJECT_RIGHT, 1, 1, 1, 1, 1, 1, 1);
	}
	else
	{
		$res = sql_query(sprintf(SQL_GET_PROJECT_RIGHT, sql_real_escape_string($id_usr), sql_real_escape_string($id_project)));
		$tab = sql_fetch_array($res);
		printf(PROJECT_RIGHT, $tab[0], $tab[1], $tab[2], $tab[3], $tab[4], $tab[5], $tab[6]);
	}
}

function get_activity_right($id_activity, $id_project, $id_usr)
{
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_RIGHT, sql_real_escape_string($id_usr), sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
	if (sql_num_rows($res))
	{
		printf(ACTIVITY_RIGHT, 0, 0, 0, 0);
	}
	else
	{
		$tab = sql_fetch_array($res);
		printf(ACTIVITY_RIGHT, $tab[0], $tab[1], $tab[2], $tab[3]);
	}
}

?>