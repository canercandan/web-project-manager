<?php

if (!MAIN)
  exit(0);

require_once('./define_activity.php');
require_once('./function_sql.php');
require_once('./function_misc.php');

function check_date_subact($day, $month, $year, $id_project, $id_activity)
{
  $res = sql_query(sprintf(SQL_CHECK_SUBACT_DATE, sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), 
			   sql_real_escape_string($id_activity), sql_real_escape_string($id_project))); 
  while (($tab = sql_fetch_array($res)))
    {
      if ($tab[3] == 1)
	{
	  SQL_QUERY(sprintf(SQL_UPDATE_DATE_ACT_START, sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), $tab[0]));
	  SQL_QUERY(sprintf(SQL_UPDATE_DATE_ACT_END, sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), $tab[0],
			    sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day)));
	  sql_query(sprintf(SQL_DELETE_MEMBER_DIFFDATE_END_ACT, $tab[0], sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day)));
	  sql_query(sprintf(SQL_UPDATE_MEMBER_DIFFDATE_START_ACT, sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day), $tab[0],
			    sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day),
			    sql_real_escape_string($year), sql_real_escape_string($month), sql_real_escape_string($day)));
	  check_date_subact($day, $month, $year, $id_project, $tab[0]);
	}
    }
  return (0);
}

function check_activity($id_user, $id_activity)
{
  $res = SQL_QUERY(sprintf(SQL_CHECK_ACTIVITY, sql_real_escape_string($id_activity)));
  $r = sql_result($res,0, 0);
  if (sql_num_rows($res))
    return ($r == "" ? UNNAMED_ACTIVITY : $r);
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
		       ($tab[2] == 0 ? 100 : (($tab[3] < $tab[2] ? $tab[3] : $tab[2]) * 100) / $tab[2]));
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
		     ($tab[2] == 0 ? 100 : (($tab[3] < $tab[2] ? $tab[3] : $tab[2]) * 100) / $tab[2]));
	    }
	}
      return ($work);
    }
}

function get_activity_informations($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_ACTIVITY_INFORMATIONS,
			   sql_real_escape_string($id_activity)));
  $tab = sql_fetch_array($res);
  get_months();
  get_days();
  get_years();
  printf('<editable>1</editable><name post="%s">%s</name><describ post="%s">%s</describ>%s<date postyear="%s" postmonth="%s" postday="%s" day="%s" month="%s" year= "%s"/>',
	 POST_MOD_ACTIVITY_NAME,
	 htmlentities($tab[0]),
	 POST_MOD_ACTIVITY_DESCRIB,
	 htmlentities($tab[1]),
	 sprintf(ACTIVITY_CHARGE_EDITABLE, POST_MOD_ACTIVITY_CHARGE, $tab[6], $tab[2]),
	 POST_ACT_YEAR_START, POST_MONTH_START, POST_ACT_DAY_START,
	 $tab[3], $tab[4], $tab[5]);
  printf('<activity_work><developped>%d</developped><id>%d</id><name>%s</name><charge>%d</charge>',
	 (isset($_SESSION['DEVELOPPED_WORK'][$id_activity]) ? $_SESSION['DEVELOPPED_WORK'][$id_activity] : 0),
	 $id_activity,
	 htmlentities($tab[0]),
	 $tab[2]);
  $work = get_activity_work($id_activity);
  printf('<work>%d</work><percent>%d</percent></activity_work>',
	 ($work < $tab[2] ? $work : $tab[2]),
	 ($tab[2] == 0 ? 100 : (($work < $tab[2] ? $work : $tab[2]) * 100) / $tab[2]));
}

function print_activities_list($id_project, $id_activity)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES, sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(ACTIVITY_START);
	printf('<surline>%d</surline>', (isset($_SESSION['ACTIVITY_ID']) && $_SESSION['ACTIVITY_ID'] == $tab[0]) ? 1 : 0);
	printf(ACTIVITY_TITLE, htmlentities($tab[1] == "" ? UNNAMED_ACTIVITY : $tab[1]));
	printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]] : 0);
	printf(ACTIVITY_ID, $tab[0]);
	print_activities_list($id_project, $tab[0]);
	printf(ACTIVITY_END);
      }
}

?>