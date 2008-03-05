<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');
require_once('function_activity.php');
require_once('function_misc.php');

function get_member_out_project($id_project, $last)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_OUT_PROJECT, sql_real_escape_string($id_project)));
  printf(MEMBER_POST_SELECT);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(MEMBER_ELEM_PROJ, $last, htmlentities($tab[0]), 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]));
		$last++;
	  }
	return ($last);
}

function get_member_project($id_project, $last)
{
	printf('<role_list post="selectrole">');
	$res = sql_query(SQL_GET_ROLE);
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<role id="%s" name="%s"/>', htmlentities($tab[0]), htmlentities($tab[1]));
		}
	printf('</role_list>');
	printf(MEMBER_POST_SELECT);
	printf(MEMBER_KEEP_HISTO);
	$res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(MEMBER_ELEM_PROJECT_PROJ, htmlentities($tab[0]), 0, 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]), htmlentities($tab[5]),
		POST_DAY_START, htmlentities($tab[6]), POST_MONTH_START, htmlentities($tab[7]), POST_YEAR_START, htmlentities($tab[8]),
		POST_DAY_END, htmlentities($tab[9]), POST_MONTH_END, htmlentities($tab[10]), POST_YEAR_END, htmlentities($tab[11]),
		$last,
		POST_KEY_ID,
		POST_KEY_DAY_START,
		POST_KEY_MONTH_START,
		POST_KEY_YEAR_START,
		POST_KEY_DAY_END,
		POST_KEY_MONTH_END,
		POST_KEY_YEAR_END);
		$last++;
	  }
	  return ($last);
}

function get_histo_member_project($id_project, $last)
{
	printf('<role_list post="selectrole">');
	$res = sql_query(SQL_GET_ROLE);
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<role id="%s" name="%s"/>', htmlentities($tab[0]), htmlentities($tab[1]));
		}
	printf('</role_list>');
	printf(MEMBER_POST_SELECT);
	$res = sql_query(sprintf(SQL_GET_HISTO_MEMBER_PROJECT, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(MEMBER_ELEM_PROJECT_PROJ, htmlentities($tab[0]), 0, 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]), htmlentities($tab[5]),
		POST_DAY_START, htmlentities($tab[6]), POST_MONTH_START, htmlentities($tab[7]), POST_YEAR_START, htmlentities($tab[8]),
		POST_DAY_END, htmlentities($tab[9]), POST_MONTH_END, htmlentities($tab[10]), POST_YEAR_END, htmlentities($tab[11]),
		$last,
		POST_KEY_ID,
		POST_KEY_DAY_START,
		POST_KEY_MONTH_START,
		POST_KEY_YEAR_START,
		POST_KEY_DAY_END,
		POST_KEY_MONTH_END,
		POST_KEY_YEAR_END);
		$last++;
		}
	return ($last);
}

function remove_tot_member($id_user, $id_project)
{
	sql_query(sprintf(SQL_REMOVE_TOT_MEMBER, sql_real_escape_string($id_user), sql_real_escape_string($id_project)));
}

function put_to_member($id_user, $id_project)
{
	$res = sql_query(sprintf(SQL_CHECK_IN_PROJ, sql_real_escape_string($id_user), sql_real_escape_string($id_project)));
	if (!sql_num_rows($res))
	{
		sql_query(sprintf(SQL_INSERT_MEMBER, sql_real_escape_string($id_project), sql_real_escape_string($id_user)));
	}
}
function get_information_project($id_project)
{
	$res = SQL_QUERY(sprintf(SQL_INFORMATION, sql_real_escape_string($id_project)));
	$tab = sql_fetch_array($res);
	get_months();
	get_days();
	get_years();
	if (sql_num_rows($res))
	{
		printf('<editable>1</editable><name post="modname">%s</name><describ post="moddescrib">%s</describ><date day="%s" month="%s" year="%s"/><autor name="%s" fname="%s" title="%s"/>',
		htmlentities($tab[0]),
		htmlentities($tab[1]),
		htmlentities($tab[2]),
		htmlentities($tab[3]),
		htmlentities($tab[4]),
		htmlentities($tab[5]),
		htmlentities($tab[6]),
		htmlentities($tab[7]));
	}
	printf('<activity_work><id>%d</id><name>%s</name>', 0, htmlentities($tab[0]));
	$tot_work = 0;
	$tot_charge=0;
	$res = SQL_QUERY(sprintf(SQL_GET_FIRST_ACTIVITY, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<activity_work><id>%d</id><name>%s</name><charge>%d</charge>',
			htmlentities($tab[0]),
			htmlentities($tab[1]),
			htmlentities($tab[2]));
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
		printf(PROJECT_ITEM, (isset($_SESSION['PROJECT_ID']) && $_SESSION['PROJECT_ID'] == $tab[1] ? 1 : 0), htmlentities($tab[0]), htmlentities($tab[1]));
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