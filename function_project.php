<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');
require_once('function_activity.php');

function get_member_out_project($id_project)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_OUT_PROJECT, sql_real_escape_string($id_project)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(MEMBER_ELEM_PROJ, $tab[0], 0, $tab[1], $tab[2], $tab[3]);
      }
}

function get_member_project($id_project)
{
	printf('<role_list>');
	$res = sql_query(SQL_GET_ROLE);
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<role id="%s" name="%s"/>', $tab[0], $tab[1]);
		}
	printf('</role_list>');		
  $res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT, sql_real_escape_string($id_project)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(MEMBER_ELEM_PROJECT_PROJ, $tab[0], 0, $tab[1], $tab[2], $tab[3], $tab[4]);
      }
}
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
	printf('<activity_work><id>%d</id><name>%s</name>', 0, $tab[0]);
	$tot_work = 0;
	$tot_charge=0;
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
			$tot_charge += $tab[2];
			$tot_work += $work;
		}
	printf('<charge>%d</charge><work>%d</work><percent>%d</percent></activity_work>', $tot_charge, $tot_work, ($tot_work * 100) / $tot_charge);
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