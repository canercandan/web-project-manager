<?php

require_once('./define_informations_activity.php');
require_once('./function_sql.php');
require_once('function_misc.php');
require_once('function_plane_activity.php');

if (!MAIN)
  exit(0);

function get_new_activity_informations($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_NEW_ACTIVITY_INFORMATIONS, sql_real_escape_string($id_activity)));
  $tab = sql_fetch_array($res);
  get_full_months();
  get_full_days();
  get_full_years();
  printf('<editable>1</editable><name post="%s">%s</name><describ post="%s">%s</describ>%s
  <date postyear="%s" postmonth="%s" postday="%s" day="%s" month="%s" year= "%s"/>
  <dateend postyear="%s" postmonth="%s" postday="%s" day="%s" month="%s" year= "%s"/>', 
  POST_MOD_ACTIVITY_NAME,
  htmlentities($tab[0]), 
  POST_MOD_ACTIVITY_DESCRIB,
  htmlentities($tab[1]),
  sprintf(ACTIVITY_CHARGE_EDITABLE, POST_MOD_ACTIVITY_CHARGE, $tab[8], $tab[2]),
  POST_ACTIVITY_YEAR, POST_ACTIVITY_MONTH, POST_ACTIVITY_DAY,
	$tab[3], $tab[4], $tab[5],
POST_ACTIVITY_YEAR_END, POST_ACTIVITY_MONTH_END, POST_ACTIVITY_DAY_END,
	$tab[6], $tab[7], $tab[8]);
	
	$tab = get_activity_start($id_activity, $_SESSION['PROJECT_ID'], null);
	$start = $tab['start'][$id_activity];
	$tab = get_activity_end($start, $id_activity, $_SESSION['PROJECT_ID'], $tab);
	$end = $tab['end'][$id_activity];
	$dstart = getdate($start['date']);
	$dend = getdate($end['date']);
	printf(FIELD_ESTIMATE_DATE_START, $start['ok'] ? 1 : 0, $start['date'] == -1 ? 'Unevaluable' : sprintf('%02d/%02d/%04d', $dstart['mday'], $dstart['mon'], $dstart['year']));
	printf(FIELD_ESTIMATE_DATE_END, $end['ok'] ? 1 : 0, $end['date'] == -1 ? 'Unevaluable' : sprintf('%02d/%02d/%04d', $dend['mday'], $dend['mon'], $dend['year']));
}  

function print_activities_list_dependance($id_project, $id_activity, $id_root_activity)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES_DEPENDANCE, sql_real_escape_string($id_root_activity), sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(ACTIVITY_START);
		printf('<depend post="%s" value="%s"/>', POST_ACTIVITY_DEPEND, $tab[2]);
		printf(ACTIVITY_TITLE, htmlentities($tab[1] == "" ? UNNAMED_ACTIVITY : $tab[1]));
		printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]] : 0);
		printf(ACTIVITY_ID, $tab[0]);
		print_activities_list_dependance($id_project, $tab[0], $id_root_activity);
		printf(ACTIVITY_END);
      }
}

function new_add_activities($id_project, $id_activity, $name, $describ, $charge, $day, $month, $year,
							$day_end, $month_end, $year_end)

{
	if ($day == 0 || $month == 0 || $year == 0)
	{
		$day = 0;
		$month = 0;
		$year = 0;
	}
	if ($day_end == 0 || $month_end == 0 || $year_end == 0)
	{
		$day_end = 0;
		$month_end = 0;
		$year_end = 0;
	}
	if (date_order($month, $day, $year, $month_end, $day_end, $year_end))
	{	
		$_SESSION['date_start'] = sprintf('%02d/%02d/%04d', $day, $month, $year);
		$_SESSION['date_end'] = sprintf('%02d/%02d/%04d', $day_end, $month_end, $year_end);
		header(sprintf('Location:root.php?activity_id=%s&error=date_order', $_SESSION['ACTIVITY_ID']));
		exit(0);
	}
	else
	{
		$res = sql_query(sprintf(SQL_NEW_CHECK_PROJECT_DATE, sql_real_escape_string($year),sql_real_escape_string($month),sql_real_escape_string($day),
															sql_real_escape_string($year_end),sql_real_escape_string($month_end),sql_real_escape_string($day_end),
															
															sql_real_escape_string($year_end),sql_real_escape_string($month_end),sql_real_escape_string($day_end),
															sql_real_escape_string($year),sql_real_escape_string($month),sql_real_escape_string($day),
															$id_project));
		$tab = sql_fetch_array($res);
		if (($tab[0] == 0 && ($day != 0 || $month != 0 || $year != 0)) || $tab[1] == 0 || (
			$tab[2] == 0 && ($day_end != 0 || $month_end != 0 || $year_end != 0))|| $tab[3] == 0)
		{
			$_SESSION['date_start'] = $tab[4];
			$_SESSION['date_end'] = $tab[5];
			header(sprintf('Location:root.php?activity_id=%s&error=project_date', $_SESSION['ACTIVITY_ID']));
			exit(0);
		}	
		sql_query(sprintf(SQL_NEW_ADD_ACTIVITY, sql_real_escape_string($id_project),
		    sql_real_escape_string($id_activity),
		    sql_real_escape_string($name),
		    sql_real_escape_string($charge),
			sql_real_escape_string($year),
		    sql_real_escape_string($month),
		    sql_real_escape_string($day),
			sql_real_escape_string($year_end),
		    sql_real_escape_string($month_end),
		    sql_real_escape_string($day_end),
		    sql_real_escape_string($describ)));
		new_update_charge($id_activity);
	}
	return (0);
}

function new_update_charge($id_activity)
{
  if ($id_activity != 0)
    {
      $res = sql_query(sprintf(SQL_GET_CHARGE, sql_real_escape_string($id_activity)));
      sql_query(sprintf(SQL_UPDATE_CHARGE, sql_result($res, 0, 0), sql_real_escape_string($id_activity)));
      $res = sql_query(sprintf(SQL_GET_PARENT_ID, sql_real_escape_string($id_activity)));
      new_update_charge(sql_result($res, 0, 0));
    }
}

function new_update_activity($id_project, $id_activity, $name, $describ, $day, $month, $year, $charge,
							$day_end, $month_end, $year_end)

{
  	if ($day == 0 || $month == 0 || $year == 0)
	{
		$day = 0;
		$month = 0;
		$year = 0;
	}
	if ($day_end == 0 || $month_end == 0 || $year_end == 0)
	{
		$day_end = 0;
		$month_end = 0;
		$year_end = 0;
	}
	if (date_order($month, $day, $year, $month_end, $day_end, $year_end))
	{	
		$_SESSION['date_start'] = sprintf('%02d/%02d/%04d', $day, $month, $year);
		$_SESSION['date_end'] = sprintf('%02d/%02d/%04d', $day_end, $month_end, $year_end);
		header(sprintf('Location:root.php?activity_id=%s&error=date_order', $_SESSION['ACTIVITY_ID']));
		exit(0);
	}
	else
	{
		$res = sql_query(sprintf(SQL_NEW_CHECK_PROJECT_DATE, sql_real_escape_string($year),sql_real_escape_string($month),sql_real_escape_string($day),
															sql_real_escape_string($year_end),sql_real_escape_string($month_end),sql_real_escape_string($day_end),
															
															sql_real_escape_string($year_end),sql_real_escape_string($month_end),sql_real_escape_string($day_end),
															sql_real_escape_string($year),sql_real_escape_string($month),sql_real_escape_string($day),
															$id_project));
		$tab = sql_fetch_array($res);
		if (($tab[0] == 0 && ($day != 0 || $month != 0 || $year != 0)) || $tab[1] == 0 || (
			$tab[2] == 0 && ($day_end != 0 || $month_end != 0 || $year_end != 0))|| $tab[3] == 0)
		{
			$_SESSION['date_start'] = $tab[4];
			$_SESSION['date_end'] = $tab[5];
			header(sprintf('Location:root.php?activity_id=%s&error=project_date', $_SESSION['ACTIVITY_ID']));
			exit(0);
		}			
		$res = sql_query(sprintf(SQL_NEW_CHECK_CHARGE_EDITABLE, sql_real_escape_string($id_activity)));
		if (sql_result($res, 0, 0))
		{
			sql_query(sprintf(SQL_NEW_UPDATE_ACTIVITY_CHARGE, sql_real_escape_string($name), sql_real_escape_string($describ), 
				sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day),
				sql_real_escape_string($year_end), sql_real_escape_string($month_end), sql_real_escape_string($day_end),
				sql_real_escape_string($charge), sql_real_escape_string($id_activity)));
			new_update_charge(sql_result(sql_query(sprintf(SQL_GET_PARENT_ID, sql_real_escape_string($id_activity))), 0, 0));
		}
		else
		{
			sql_query(sprintf(SQL_NEW_UPDATE_ACTIVITY, sql_real_escape_string($name), sql_real_escape_string($describ), 
			sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), 
			sql_real_escape_string($year_end), sql_real_escape_string($month_end), sql_real_escape_string($day_end),
			sql_real_escape_string($id_activity)));
		}
	}
	return (0);
}

function	add_dependance($id_activity, $id_dependof)
{
  $res = sql_query(sprintf(SQL_CHECK_DEPENDANCE,  sql_real_escape_string($id_activity), sql_real_escape_string($id_dependof)));
  if (!sql_num_rows($res))
    sql_query(sprintf(SQL_ADD_DEPENDANCE,  sql_real_escape_string($id_activity), sql_real_escape_string($id_dependof)));
}

function	remove_dependance($id_activity, $id_dependof)
{
  sql_query(sprintf(SQL_REMOVE_DEPENDANCE,  sql_real_escape_string($id_activity), sql_real_escape_string($id_dependof)));	
}

?>