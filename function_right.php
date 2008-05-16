<?php

define('SQL_GET_LEVEL_USR','SELECT usr_level_id FROM tw_usr WHERE usr_id = \'%d\';');

define('SQL_GET_PROJECT_RIGHT', 'SELECT update_project, update_activity, add_subactivity, update_member_activity, update_member, add_activity, remove_activity, add_member, kick_member, add_member_activity, kick_member_activity, remove_project, add_file, read_file FROM tw_member_role, tw_member
	WHERE 
	role_id = member_role_id
	AND member_usr_id =\'%d\'
	AND member_project_id = \'%d\';');

define('SQL_GET_ACTIVITY_RIGHT', 'SELECT update_activity_ifmember, update_member_activity_ifmember, add_subactivity_ifmember, remove_activity_ifmember, add_member_activity_ifmember, kick_member_activity_ifmember, add_file_activity, read_file_activity 
	FROM tw_member_role, tw_member, tw_activity_member
	WHERE 
	role_id = member_role_id
	AND member_usr_id=\'%d\'
	AND member_project_id=\'%d\'
	AND activity_member_activity_id=\'%d\'
	AND activity_member_usr_id=member_usr_id;');	

define('SQL_GET_ACTIVITY_ADMIN', 'SELECT activity_level FROM tw_activity_member
WHERE activity_member_activity_id=\'%d\'
AND activity_member_usr_id=\'%d\';');
	
define('PROJECT_RIGHT','<projectright add_file="%d" read_file="%d" updateproject="%d" updateactivity="%d" add_subactivity="%d" update_member_activity="%d" update_member="%d" add_activity="%d" remove_activity="%d" add_member="%d" kick_member="%d" add_member_activity="%d" kick_member_activity="%d" remove_project="%d"/>');
define('ACTIVITY_RIGHT','<activityright add_file_activity="%d" read_file_activity="%d" updateactivity="%d" update_member_activity="%d" add_subactivity="%d" remove_activity="%d" add_member_activity="%d" kick_member_activity="%d"/>');

function get_project_right($id_project, $id_usr, $print)
{
	$res = sql_query(sprintf(SQL_GET_LEVEL_USR, sql_real_escape_string($id_usr)));
	$tab = sql_fetch_array($res);
	if ($tab[0] == 3 || $tab[0] == 1 || $tab[0] == 2)
	{
		if ($print)
		printf(PROJECT_RIGHT, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
		$_SESSION['add_file'] = 1;
		$_SESSION['read_file'] = 1;
		$_SESSION['update_project'] = 1;
		$_SESSION['update_activity'] = 1;
		$_SESSION['add_subactivity'] = 1;
		$_SESSION['update_member_activity'] = 1;
		$_SESSION['update_member'] = 1;
		$_SESSION['add_activity'] = 1;
		$_SESSION['remove_activity'] = 1;
		$_SESSION['add_member'] = 1;
		$_SESSION['kick_member'] = 1;
		$_SESSION['add_member_activity'] = 1;
		$_SESSION['kick_member_activity'] = 1;
		$_SESSION['remove_project'] = 1;

	}
	else
	{
		$res = sql_query(sprintf(SQL_GET_PROJECT_RIGHT, sql_real_escape_string($id_usr), sql_real_escape_string($id_project)));
		$tab = sql_fetch_array($res);
		if ($print)
		printf(PROJECT_RIGHT, $tab[12], $tab[13], $tab[0], $tab[1], $tab[2], $tab[3], $tab[4], $tab[5], $tab[6], $tab[7], $tab[8], $tab[9], $tab[10], $tab[11]);
		$_SESSION['add_file'] = $tab[12];
		$_SESSION['read_file'] = $tab[13];
		$_SESSION['update_project'] = $tab[0];
		$_SESSION['update_activity'] = $tab[1];
		$_SESSION['add_subactivity'] = $tab[2];
		$_SESSION['update_member_activity'] = $tab[3];
		$_SESSION['update_member'] = $tab[4];
		$_SESSION['add_activity'] = $tab[5];
		$_SESSION['remove_activity'] = $tab[6];
		$_SESSION['add_member'] = $tab[7];
		$_SESSION['kick_member'] = $tab[8];
		$_SESSION['add_member_activity'] = $tab[9];
		$_SESSION['kick_member_activity'] = $tab[10];
		$_SESSION['remove_project'] = $tab[11];
	}
}

function get_activity_right($id_activity, $id_project, $id_usr, $print)
{
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_ADMIN, sql_real_escape_string($id_activity), sql_real_escape_string($id_usr)));
	if (sql_num_rows($res))
	{
		$tab = sql_fetch_array($res);
		if ($tab[0])
		{
			if ($print)
			printf(ACTIVITY_RIGHT, 1, 1, 1, 1, 1, 1, 1, 1);
			$_SESSION['update_activity'] = 1;
			$_SESSION['update_member_activity'] = 1;
			$_SESSION['add_subactivity'] = 1;
			$_SESSION['remove_activity'] = 1;
			$_SESSION['add_member_activity'] = 1;
			$_SESSION['kick_member_activity'] = 1;
			$_SESSION['add_file'] = 1;
			$_SESSION['read_file'] = 1;
			return;
		}
	}
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_RIGHT, sql_real_escape_string($id_usr), sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
	if (!sql_num_rows($res))
	{
		if ($print)
		printf(ACTIVITY_RIGHT, 0, 0, 0, 0, 0, 0, 0, 0);
	}
	else
	{
		$tab = sql_fetch_array($res);
		if ($print)
		printf(ACTIVITY_RIGHT, $tab[6], $tab[7], $tab[0], $tab[1], $tab[2], $tab[3], $tab[4], $tab[5]);
		$_SESSION['update_activity'] = $_SESSION['update_activity'] || $tab[0];
		$_SESSION['update_member_activity'] = $_SESSION['update_member_activity'] || $tab[1];
		$_SESSION['add_subactivity'] = $_SESSION['add_subactivity'] || $tab[2];
		$_SESSION['remove_activity'] = $_SESSION['remove_activity'] || $tab[3];
		$_SESSION['add_member_activity'] = $_SESSION['add_member_activity'] || $tab[4];
		$_SESSION['kick_member_activity'] = $_SESSION['kick_member_activity'] || $tab[5];
		$_SESSION['add_file'] = $_SESSION['add_file'] || $tab[6];
		$_SESSION['read_file'] = $_SESSION['read_file'] || $tab[7];
	}

}

?>