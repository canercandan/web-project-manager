<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');
require_once('function_activity.php');

function get_information_project($id_project)
{
	$res = SQL_QUERY(sprintf(SQL_INFORMATION, sql_real_escape_string($id_project)));
	$tab = sql_fetch_array($res);
	if (sql_num_rows($res))
		printf('<editable>1</editable><name post="modname">%s</name><describ post="moddescrib">%s</describ><date>%s/%02s/%s</date><autor name="%s" fname="%s" title="%s"/>',
		$tab[0],
		$tab[1],
		$tab[2],
		$tab[3],
		$tab[4],
		$tab[5],
		$tab[6],
		$tab[7]);
	printf('<activity_work>');
	$res = SQL_QUERY(sprintf(SQL_GET_FIRST_ACTIVITY, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<activity_work><id>%d</id><name>%s</name><charge>%d</charge>',
			$tab[0],
			$tab[1],
			$tab[2]);
			$work = get_activity_work($tab[0]);
			printf('<work>%d</work><percent>%d</percent></activity_work>',
				$work,
				($work * 100) / $tab[2]);
		}
	printf('</activity_work>');
}

function print_projects_list($id_user)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_PROJECT/*, sql_real_escape_string($id_user) */));
  printf(PROJECT_BEGIN);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(PROJECT_ITEM, $tab[0], $tab[1]);
      }
	printf(PROJECT_END);
}

function check_project($id_user, $id_project)
{
	$res = SQL_QUERY(sprintf(SQL_CHECK_PROJECT, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
		return (sql_result($res,0, 0));
	else
		return (null);
}

function add_project($id_user, $name, $describ)
{
  sql_query(sprintf(SQL_ADD_PROJECT, sql_real_escape_string($id_user),
									sql_real_escape_string($name),
									sql_real_escape_string($describ)));
}

function check_admin_for_project($id_project)
{
	printf(ADMIN,1);
}

function check_admin_create_project()
{
	printf(ADMIN,1);
}

?>