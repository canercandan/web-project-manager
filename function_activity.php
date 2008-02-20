<?php

require_once('./define_activity.php');

function add_activities($id_project, $id_activity, $name, $describ, $charge)
{
	sql_query(sprintf(SQL_ADD_ACTIVITY, sql_real_escape_string($id_project), 
		sql_real_escape_string($id_activity), 
		sql_real_escape_string($name), 
		sql_real_escape_string($charge), 
		sql_real_escape_string($describ)));

}

function print_activities_list($id_project, $id_activity)
{	
	$res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES, sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
	while ($tab = sql_fetch_array($res))
		{
			printf('<activity>');
			printf('<title>%s</title>', $tab[1]);
			printf('<developped>%d</developped>', isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]));
			printf('<id>%s</id>', $tab[0]);
			print_activities_list($id_project, $tab[0]);
			printf('</activity>');
		}
}

?>