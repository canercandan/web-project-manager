<?php

require_once('./define_activity.php');

function get_member_project_activity($id_activity, $id_project)
{
;
/*	$res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT, sql_real_escape_string($id_project), 
			sql_real_escape_string($id_activity));
	while ($tab = sql_fetch_array($res))
		{*/
}

function add_activities($id_project, $id_activity, $name, $describ, $charge)
{
	sql_query(sprintf(SQL_ADD_ACTIVITY, sql_real_escape_string($id_project), 
		sql_real_escape_string($id_activity), 
		sql_real_escape_string($name), 
		sql_real_escape_string($charge), 
		sql_real_escape_string($describ)));
	update_charge($id_activity);
}

function update_charge($id_activity)
{
	if ($id_activity != 0)
	{
		$res = sql_query(sprintf(SQL_GET_CHARGE, sql_real_escape_string($id_activity)));
		sql_query(sprintf(SQL_UPDATE_CHARGE, sql_result($res, 0, 0), sql_real_escape_string($id_activity)));
		$res = sql_query(sprintf(SQL_GET_PARENT_ID, sql_real_escape_string($id_activity)));
		update_charge(sql_result($res, 0, 0));
	}	
}

function print_activities_list($id_project, $id_activity)
{	
	$res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES, sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
	while ($tab = sql_fetch_array($res))
		{
			printf(ACTIVITY_START);
			printf(ACTIVITY_TITLE, $tab[1]);
			printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]));
			printf(ACTIVITY_ID, $tab[0]);
			print_activities_list($id_project, $tab[0]);
			printf(ACTIVITY_END);
		}
}

?>