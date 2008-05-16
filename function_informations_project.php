<?php

require_once('./function_sql.php');
require_once('./define_informations_project.php');
require_once('./function_misc.php');
require_once('./define_phorum.php');

if (!MAIN)
  exit(0);

function get_new_information_project($id_project)
{
  $res = SQL_QUERY(sprintf(SQL_NEW_INFORMATION, sql_real_escape_string($id_project)));
  $tab = sql_fetch_array($res);
  get_months();
  get_days();
  get_years();
  if (sql_num_rows($res))
    {
      printf(ELM_INFORMATION_PROJ,
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
	     POST_PROJECT_DAY_END,
	     htmlentities($tab[5]),
	     POST_PROJECT_MONTH_END,
	     htmlentities($tab[6]),
	     POST_PROJECT_YEAR_END,
	     htmlentities($tab[7]),
	     htmlentities($tab[8]),
	     htmlentities($tab[9]),
	     htmlentities($tab[10]),
	     POST_PROJECT_HOUR_DAY,
	     htmlentities($tab[11]));
      $res = sql_query(sprintf(SQL_GET_PROJECT_CHARGE,
			       sql_real_escape_string($id_project)));
      printf('<charge value="%s"/>', sql_result($res, 0, 0));
    }
}

function new_update_project($id_project, $name, $describ, $day, $month, $year,
			    $day_end, $month_end, $year_end, $hour_day)
{
  if (date_order($month, $day, $year, $month_end, $day_end, $year_end))
    {
      $_SESSION['date_start'] = sprintf('%02d/%02d/%04d', $day, $month, $year);
      $_SESSION['date_end'] = sprintf('%02d/%02d/%04d', $day_end, $month_end, $year_end);
      header(sprintf('Location:root.php?error=date_order'));
      exit(0);
    }
  else
    sql_query(sprintf(SQL_NEW_UPDATE_PROJECT,
		      sql_real_escape_string($name),
		      sql_real_escape_string($describ),
		      sql_real_escape_string($year),
		      sql_real_escape_string($month),
		      sql_real_escape_string($day),
		      sql_real_escape_string($year_end),
		      sql_real_escape_string($month_end),
		      sql_real_escape_string($day_end),
		      sql_real_escape_string($hour_day),
		      sql_real_escape_string($id_project)));
  return (0);
}

function new_add_project($id_user, $name, $describ, $day, $month, $year,
			 $day_end, $month_end, $year_end, $hour_day)
{
  if (date_order($month, $day, $year, $month_end, $day_end, $year_end))
    {
      $_SESSION['date_start'] = sprintf('%02d/%02d/%04d', $day, $month, $year);
      $_SESSION['date_end'] = sprintf('%02d/%02d/%04d', $day_end, $month_end, $year_end);
      header(sprintf('Location:root.php?error=date_order'));
      exit(0);
    }
  else
    {
      sql_query(sprintf(SQL_NEW_ADD_PROJECT,
			sql_real_escape_string($id_user),
			sql_real_escape_string($name),
			sql_real_escape_string($describ),
			sql_real_escape_string($year),
			sql_real_escape_string($month),
			sql_real_escape_string($day),
			sql_real_escape_string($year_end),
			sql_real_escape_string($month_end),
			sql_real_escape_string($day_end),
			sql_real_escape_string($hour_day)));
      sql_query(sprintf(PHORUM_ADD_PROJECT,
			sql_insert_id() + PHORUM_PROJECT_ID,
			sql_real_escape_string($name),
			sql_real_escape_string($describ)));
      sql_query(sprintf(PHORUM_ADD_GENERAL,
			sql_insert_id() + PHORUM_GENERAL_ID,
			sql_real_escape_string(sql_insert_id())));
    }
  return (0);
}

?>