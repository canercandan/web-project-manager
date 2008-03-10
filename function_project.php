<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');
require_once('function_activity.php');
require_once('function_misc.php');

function update_project($id_project, $name, $describ, $day, $month, $year)
{
	if (check_date_subact($day, $month, $year, $id_project, 0) > 0)
	{
		return (1);
	}
	sql_query(sprintf(SQL_UPDATE_PROJECT, sql_real_escape_string($name), sql_real_escape_string($describ),
	sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), sql_real_escape_string($id_project)));
	return (0);
}

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
		printf('<editable>1</editable><name post="%s">%s</name>
		<describ post="%s">%s</describ>
		<date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/><autor name="%s" fname="%s" title="%s"/>',
		POST_PROJECT_NAME,
		htmlentities($tab[0]),
		
		POST_PROJECT_DESCRIB,
		htmlentities($tab[1]),
		
		POST_PROJECT_DAY,
		htmlentities($tab[2]),
		POST_PROJECT_MONTH,
		htmlentities($tab[3]),
		POST_PROJECT_YEAR,
		htmlentities($tab[4]),
		
		htmlentities($tab[5]),
		htmlentities($tab[6]),
		htmlentities($tab[7]));
	}
	printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name>',(isset($_SESSION['DEVELOPPED_WORK'][0]) ? $_SESSION['DEVELOPPED_WORK'][0] : 0), 0, htmlentities($tab[0]));
	$tot_work = 0;
	$tot_charge=0;
	$res = SQL_QUERY(sprintf(SQL_GET_FIRST_ACTIVITY, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
		while ($tab = sql_fetch_array($res))
		{
			printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name><charge>%d</charge>',
			(isset($_SESSION['DEVELOPPED_WORK'][$tab[0]]) ? $_SESSION['DEVELOPPED_WORK'][$tab[0]] : 0),
			htmlentities($tab[0]),
			htmlentities($tab[1]),
			htmlentities($tab[2]));
			$work = get_activity_work($tab[0]);
			$work = $work > $tab[2] ? $tab[2] : $work;
			printf('<work>%d</work><percent>%d</percent></activity_work>',
				$work,
				($tab[2] == 0 ? 100 : ($work * 100) / $tab[2]));
			$tot_charge += $tab[2];
			$tot_work += $work;
		}
	printf('<charge>%d</charge><work>%d</work><percent>%d</percent></activity_work>', $tot_charge, $tot_work, ($tot_charge == 0 ? 100 : ($tot_work * 100) / $tot_charge));
}

function print_projects_list($id_user)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_PROJECT/*, sql_real_escape_string($id_user) */));
  printf(PROJECT_BEGIN);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(PROJECT_ITEM, (isset($_SESSION['PROJECT_ID']) && $_SESSION['PROJECT_ID'] == $tab[1] ? 1 : 0), htmlentities($tab[0] == "" ? UNNAMED_PROJECT : $tab[0]), htmlentities($tab[1]));
      }
	printf(PROJECT_END);
}

function check_project($id_user, $id_project)
{
	$res = SQL_QUERY(sprintf(SQL_CHECK_PROJECT, sql_real_escape_string($id_project)));
	if (sql_num_rows($res))
	{
		$name = sql_result($res,0, 0);
		return ($name == "" ? UNNAMED_PROJECT : $name);
	}
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