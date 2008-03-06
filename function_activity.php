<?php

if (!MAIN)
  exit(0);

require_once('./define_activity.php');
require_once('./function_sql.php');
require_once('function_misc.php');

function check_activity($id_user, $id_activity)
{
	$res = SQL_QUERY(sprintf(SQL_CHECK_ACTIVITY, sql_real_escape_string($id_activity)));
	if (sql_num_rows($res))
		return (sql_result($res,0, 0));
	else
		return (null);
}

function check_admin_for_activity($id_activity)
{
	printf(ADMIN,1);
}

function get_activity_work($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_UNDERACT_WORK, sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity)));
  if (!sql_num_rows($res))
    {
      return (0);
    }
  else
    {
      $work = 0;
      while ($tab = sql_fetch_array($res))
	{
	  if ($tab[3] >= 0)
	    {
	      $work += ($tab[3] < $tab[2] ? $tab[3] : $tab[2]);
		  if ($tab[0] != $id_activity)
			printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name><charge>%d</charge><work>%d</work><percent>%d</percent></activity_work>',
		     (isset($_SESSION['DEVELOPPED_WORK'][$tab[0]]) ? $_SESSION['DEVELOPPED_WORK'][$tab[0]] : 0),
			 $tab[0],
		     htmlentities($tab[1]),
		     $tab[2],
		     ($tab[3] < $tab[2] ? $tab[3] : $tab[2]),
		     (($tab[3] < $tab[2] ? $tab[3] : $tab[2]) * 100) / $tab[2]);
	    }
	  else
	    {
	      printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name><charge>%d</charge>',
				(isset($_SESSION['DEVELOPPED_WORK'][$tab[0]]) ? $_SESSION['DEVELOPPED_WORK'][$tab[0]] : 0),
				$tab[0],
				htmlentities($tab[1]),
				$tab[2]);
	      $tab[3] = get_activity_work($tab[0]);
	      $work += ($tab[3] < $tab[2] ? $tab[3] : $tab[2]);
	      printf('<work>%d</work><percent>%d</percent></activity_work>',
		     ($tab[3] < $tab[2] ? $tab[3] : $tab[2]),
		     (($tab[3] < $tab[2] ? $tab[3] : $tab[2]) * 100) / $tab[2]);
	    }
	}
      return ($work);
    }
}

function get_activity_informations($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_ACTIVITY_INFORMATIONS, sql_real_escape_string($id_activity)));
  $tab = sql_fetch_array($res);
  get_months();
  get_days();
  get_years();
  printf('<editable>1</editable><name post="modname">%s</name><describ post="moddescrib">%s</describ><date postyear="modyear" postmonth="modmonth" postday="modday" day="%s" month="%s" year= "%s"/>', htmlentities($tab[0]), htmlentities($tab[1]), $tab[3], $tab[4], $tab[5]);
  printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name><charge>%d</charge>',
		(isset($_SESSION['DEVELOPPED_WORK'][$id_activity]) ? $_SESSION['DEVELOPPED_WORK'][$id_activity] : 0),
		$id_activity,
		htmlentities($tab[0]),
		$tab[2]);
  $work = get_activity_work($id_activity);
  printf('<work>%d</work><percent>%d</percent></activity_work>',
	 ($work < $tab[2] ? $work : $tab[2]),
	 (($work < $tab[2] ? $work : $tab[2]) * 100) / $tab[2]);
}

function get_member_activity($id_activity, $id_project, $last)
{

  $res = sql_query(sprintf(SQL_GET_MEMBER_ACTIVITY, sql_real_escape_string($id_project),
			   sql_real_escape_string($id_activity)));
	printf(MEMBER_POST_SELECT);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(MEMBER_ELEM_ACTIVITY, $tab[0], 0, 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]), MEMBER_POST_LEVEL, htmlentities($tab[5]), MEMBER_POST_WORK, htmlentities($tab[6]), htmlentities($tab[7]),
		POST_ACT_DAY_START, htmlentities($tab[8]), POST_ACT_MONTH_START, htmlentities($tab[9]), POST_ACT_YEAR_START, htmlentities($tab[10]),
		POST_ACT_DAY_END, htmlentities($tab[11]), POST_ACT_MONTH_END, htmlentities($tab[12]), POST_ACT_YEAR_END, htmlentities($tab[13]),
		$last,
		POST_KEY_ACT_ID,
		POST_KEY_ACT_DAY_START,
		POST_KEY_ACT_MONTH_START,
		POST_KEY_ACT_YEAR_START,
		POST_KEY_ACT_DAY_END,
		POST_KEY_ACT_MONTH_END,
		POST_KEY_ACT_YEAR_END);
		$last++;
      }
	return ($last);
}

function	add_member($id_activity, $id_usr)
{
	sql_query(sprintf(SQL_ADD_MEMBER_ACT, sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_usr)));
}

function get_member_histo_activity($id_activity, $id_project, $last)
{

  $res = sql_query(sprintf(SQL_GET_HISTO_MEMBER_ACTIVITY, sql_real_escape_string($id_project),
			   sql_real_escape_string($id_activity)));
	printf(MEMBER_POST_SELECT);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(MEMBER_ELEM_ACTIVITY, $tab[0], 0, 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]), MEMBER_POST_LEVEL, htmlentities($tab[5]), MEMBER_POST_WORK, htmlentities($tab[6]), htmlentities($tab[7]),
		POST_ACT_DAY_START, htmlentities($tab[8]), POST_ACT_MONTH_START, htmlentities($tab[9]), POST_ACT_YEAR_START, htmlentities($tab[10]),
		POST_ACT_DAY_END, htmlentities($tab[11]), POST_ACT_MONTH_END, htmlentities($tab[12]), POST_ACT_YEAR_END, htmlentities($tab[13]),
		$last,
		POST_KEY_ACT_ID,
		POST_KEY_ACT_DAY_START,
		POST_KEY_ACT_MONTH_START,
		POST_KEY_ACT_YEAR_START,
		POST_KEY_ACT_DAY_END,
		POST_KEY_ACT_MONTH_END,
		POST_KEY_ACT_YEAR_END);
		$last++;
	  }
	return ($last);
}

function get_member_project_activity($id_activity, $id_project, $last)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT_ACT, sql_real_escape_string($id_project),
			   sql_real_escape_string($id_activity)));
  printf(MEMBER_POST_SELECT);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	  printf(MEMBER_ELEM_PROJECT, $last, $tab[0], 0, htmlentities($tab[1]), htmlentities($tab[2]), htmlentities($tab[3]), htmlentities($tab[4]), htmlentities($tab[5]));
      $last++;
	  }
	return ($last);
}

define('SQL_UPDATE_MEMBER_ACTIVITY','
											UPDATE tw_activity_member SET 	activity_level = \'%d\',
																	activity_work = \'%d\',
																	activity_member_date_start = DATE(\'%04d-%02d-%02d\'),
																	activity_member_date_end = DATE(\'%04d-%02d-%02d\')
																WHERE activity_member_usr_id = \'%d\'
																	AND activity_member_activity_id = \'%d\'
																	AND activity_member_date_start = DATE(\'%04d-%02d-%02d\')
																	AND activity_member_date_end = DATE(\'%04d-%02d-%02d\');
																	');

define('ERR_DATE_ORDER', 'There are some mistakes with the dates : the date corresponding to the start (%02d/%02d/%04d) must be after the one corresponding to the end (%02d/%02d/%04d)');

define('ERR_OLD_DATE_ORDER', 'There are some mistakes with the dates : the date corresponding to the end of an old entry (%02d/%02d/%04d) must be before the one corresponding to the new start (%02d/%02d/%04d)');

define('ERR_DATE_START_NOT_FULL', 'There are some mistakes with the starting dates : You must define all the field of the starting dates');
define('ERR_DATE_END_NOT_FULL', 'There are some mistakes with the ending dates : You must define all the field of the ending dates if you have starting to fill them');

define('SQL_GET_DATES_MEMBER_ACTIVITY',
'	SELECT day(activity_member_date_start), month(activity_member_date_start), year(activity_member_date_start), 
			day(activity_member_date_end), month(activity_member_date_end), year(activity_member_date_end) FROM tw_activity_member WHERE
		activity_member_usr_id = \'%d\'
		AND activity_member_activity_id = \'%d\';
');												
function update_member_activity($id_activity, $id_user, $day_start, $month_start, $year_start, $day_end, $month_end, $year_end,
					$work, $admin, $new_day_start, $new_month_start, $new_year_start, $new_day_end, $new_month_end, $new_year_end)
{
	$new_start = mktime(0, 0, 0, $new_month_start, $new_day_start, $new_year_start);
	$new_end = mktime(0, 0, 0, $new_month_end, $new_day_end, $new_year_end);
	$old_start = mktime(0, 0, 0, $month_start, $day_start, $year_start);
	$old_end = mktime(0, 0, 0, $month_end, $day_end, $year_end);
	if(($new_month_start == 0 || $new_day_start == 0 || $new_year_start == 0))
	{
		printf(XML_ERROR, ERR_DATE_START_NOT_FULL);
	}
	else if (($new_month_end != 0 || $new_day_end != 0 || $new_year_end != 0) && ($new_month_end == 0 || $new_day_end == 0 || $new_year_end == 0))
	{
		printf(XML_ERROR, ERR_DATE_END_NOT_FULL);
	}
	else if ($new_month_end != 0 && $new_day_end != 0 && $new_year_end != 0 && 
	$new_start > $new_end)
	{
		printf(XML_ERROR, sprintf(ERR_DATE_ORDER, $new_day_start, $new_month_start, $new_year_start, $new_day_end, $new_month_end, $new_year_end));
	}
	else
	{
		$res = sql_query(sprintf(SQL_GET_DATES_MEMBER_ACTIVITY, sql_real_escape_string($id_user),
													sql_real_escape_string($id_activity)));
		while ($tab = sql_fetch_array($res))
		{
			
			$start = mktime(0, 0, 0, $tab[1], $tab[0], $tab[2]);
			$end = mktime(0, 0, 0, $tab[4], $tab[3], $tab[5]);
			
			if (($start != $old_start) /*&& (	($new_end > $start && ($new_start < $end || ($tab[4] == 0 && $tab[3] == 0 && $tab[5] ==0)))
											|| ($new_end < $end)
											*/)		
			{
				printf(XML_ERROR, sprintf(ERR_OLD_DATE_ORDER, $tab[3], $tab[4], $tab[5], $new_day_start, $new_month_start, $new_year_start));
				return;
			}
		}		
		sql_query(sprintf(SQL_UPDATE_MEMBER_ACTIVITY, sql_real_escape_string($admin),
													sql_real_escape_string($work),
													sql_real_escape_string($new_year_start),sql_real_escape_string($new_month_start),sql_real_escape_string($new_day_start),
													sql_real_escape_string($new_year_end),sql_real_escape_string($new_month_end),sql_real_escape_string($new_day_end),
													sql_real_escape_string($id_user),
													sql_real_escape_string($id_activity),
													sql_real_escape_string($year_start),sql_real_escape_string($month_start),sql_real_escape_string($day_start),
													sql_real_escape_string($year_end),sql_real_escape_string($month_end),sql_real_escape_string($day_end)));
	}

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
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(ACTIVITY_START);
	printf('<surline>%d</surline>', (isset($_SESSION['ACTIVITY_ID']) && $_SESSION['ACTIVITY_ID'] == $tab[0]) ? 1 : 0);
	printf(ACTIVITY_TITLE, htmlentities($tab[1]));
	printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]] : 0);
	printf(ACTIVITY_ID, $tab[0]);
	print_activities_list($id_project, $tab[0]);
	printf(ACTIVITY_END);
      }
}

?>