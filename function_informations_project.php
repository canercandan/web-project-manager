<?php

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
		printf('<editable>1</editable><name post="%s">%s</name>
		<describ post="%s">%s</describ>
		<date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>
		<dateend postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/><autor name="%s" fname="%s" title="%s"/>',
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
		htmlentities($tab[10]));
	}
}

function new_update_project($id_project, $name, $describ, $day, $month, $year
							$day_end, $month_end, $year_end)
{
  if (check_date_subact($day, $month, $year, $id_project, 0) > 0)
    {
      return (1);
    }
  sql_query(sprintf(SQL_NEW_UPDATE_PROJECT,
		    sql_real_escape_string($name),
		    sql_real_escape_string($describ),
		    sql_real_escape_string($year),
		    sql_real_escape_string($month),
		    sql_real_escape_string($day),
			sql_real_escape_string($year_end),
		    sql_real_escape_string($month_end),
		    sql_real_escape_string($day_end),
		    sql_real_escape_string($id_project)));
  return (0);
}

function new_add_project($id_user, $name, $describ, $day, $month, $year
							$day_end, $month_end, $year_end)
{
  sql_query(sprintf(SQL_NEW_ADD_PROJECT, sql_real_escape_string($id_user),
		    sql_real_escape_string($name),
		    sql_real_escape_string($describ),
		    sql_real_escape_string($year),
		    sql_real_escape_string($month),
		    sql_real_escape_string($day),
			sql_real_escape_string($year_end),
		    sql_real_escape_string($month_end),
		    sql_real_escape_string($day_end)));
}


?>