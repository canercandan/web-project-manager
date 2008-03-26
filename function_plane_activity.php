<?php

if (!MAIN)
  exit(0);
  
define('SQL_GET_DEPENDANCE', 'SELECT activity_dependance_dependof_id FROM tw_activity_dependance WHERE activity_dependance_activity_id = \'%d\'');

define('SQL_GET_DATE_START', 'SELECT day(activity_date_begin), month(activity_date_begin), year(activity_date_begin) 
FROM tw_activity WHERE activity_id = \'%d\' and activity_project_id = \'%d\';');

define('SQL_GET_DATE_PROJECT_START', '
SELECT day(project_date), month(project_date), year(project_date) 
FROM tw_project WHERE project_id = \'%d\';');

define('SQL_GET_PARENT_DATE_END','
SELECT day(p.activity_date_end), month(p.activity_date_end), year(p.activity_date_end), p.activity_id
FROM tw_activity p, tw_activity f
WHERE f.activity_id = \'%d\'
AND
p.activity_id = f.activity_parent_id 
');

define('SQL_GET_PARENT_DATE_START','
SELECT day(p.activity_date_begin), month(p.activity_date_begin), year(p.activity_date_begin), p.activity_id
FROM tw_activity p, tw_activity f
WHERE f.activity_id = \'%d\'
AND
p.activity_id = f.activity_parent_id 
');

define('SQL_DIFF_DATE_PROJECT_END', '
SELECT day(project_date_end), month(project_date_end), year(project_date_end) 
FROM tw_project WHERE project_id = \'%d\';');

define('SQL_GET_LEN_DAY', 'SELECT activity_charge_total / count(activity_member_usr_id) FROM tw_activity, tw_activity_member
WHERE activity_id = \'%d\' and activity_project_id = \'%d\'
AND activity_member_activity_id = activity_id
AND activity_work = 1
GROUP BY activity_id;');

define('SQL_GET_CHILD', 'SELECT activity_id FROM tw_activity WHERE activity_parent_id = \'%d\';');

function get_parent_date_start($id_activity)
{
	if ($id_activity == 0)
		return (null);
	$res = sql_query(sprintf(SQL_GET_PARENT_DATE_START, sql_real_escape_string($id_activity)));
	if (!sql_num_rows($res))
		return (null);
	$tab = sql_fetch_array($res);
	if ($tab[1] == 0 || $tab[0] == 0 || $tab[2] == 0)
		return (get_parent_date_start($tab[3]));
	else
		return ($tab);
}

function get_parent_date_end($id_activity)
{
	if ($id_activity == 0)
		return (null);
	$res = sql_query(sprintf(SQL_GET_PARENT_DATE_END, sql_real_escape_string($id_activity)));
	if (!sql_num_rows($res))
		return (null);
	$tab = sql_fetch_array($res);
	if ($tab[1] == 0 || $tab[0] == 0 || $tab[2] == 0)
		return (get_parent_date_end($tab[3]));
	else
		return ($tab);
}

function	get_activity_start($id_activity, $id_project)
{
	$res = sql_query(sprintf(SQL_GET_CHILD, sql_real_escape_string($id_activity)));
	if (sql_num_rows($res))
	{
		$tab = sql_fetch_array($res);
		$resultat = get_activity_start($tab[0], $id_project);
		while (($tab = sql_fetch_array($res)))
			{
				$tmp = get_activity_start($tab[0], $id_project);
				if ($tmp['date'] < $resultat['date'])
				{
					$resultat = $tmp;
				}
			}
		return ($resultat);
	}
	$res = sql_query(sprintf(SQL_GET_DATE_START, sql_real_escape_string($id_activity), sql_real_escape_string($id_project)));
	$tab = sql_fetch_array($res);
	$day_start = $tab[0];
	$month_start = $tab[1];
	$year_start	= $tab[2];
	$start = mktime(0, 0, 0, $month_start, $day_start, $year_start);
	$res = sql_query(sprintf(SQL_GET_DEPENDANCE, sql_real_escape_string($id_activity)));
	$nb_id_dependof = sql_num_rows($res);
	if ($nb_id_dependof)
	{
		while (($tab = sql_fetch_array($res)))
			$id_dependof[] = $tab[0];
		foreach ($id_dependof as $id)
		{
			$tmp = get_activity_end(get_activity_start($id, $id_project), $id, $id_project);
			if (!$tmp['ok'])
				break;
			$end_dependof[] = $tmp['date'];
		}
		$end_all_depend = max($end_dependof);
		if ($day_start != 0 && $month_start != 0 && $year_start != 0)
		{
			if (!$tmp['ok'] || $start < $end_all_depend)
			{
				$resultat['ok'] = false;
				$resultat['date'] = $start;
			}
			else
			{
				$resultat['ok'] = true;
				$resultat['date'] = $start;
			}
		}
		else
		{
			if (!$tmp['ok'])
			{
				$resultat['ok'] = false;
				$resultat['date'] = -1;
			}
			else
			{
				$resultat['ok'] = true;
				$resultat['date'] = $end_all_depend;
			}
		}
	}
	else
	{
		if ($day_start != 0 && $month_start != 0 && $year_start != 0)
			{
				$resultat['ok'] = true;
				$resultat['date'] = $start;
			}
		else
			{
				$tab = get_parent_date_start($id_activity);
				
				if ($tab == null)
				{
					$res = sql_query(sprintf(SQL_GET_DATE_PROJECT_START, sql_real_escape_string($id_project)));
					$tab = sql_fetch_array($res);
				}
				$day_start = $tab[0];
				$month_start = $tab[1];
				$year_start	= $tab[2];
				$resultat['ok'] = true;
				$resultat['date'] = mktime(0, 0, 0, $month_start, $day_start, $year_start);
			}
	}
	return ($resultat);
}

function	get_activity_end($start, $id_activity, $id_project)
{
	$res = sql_query(sprintf(SQL_GET_CHILD, sql_real_escape_string($id_activity)));
	if (sql_num_rows($res))
	{
		$tab = sql_fetch_array($res);
		$resultat = get_activity_end(get_activity_start($tab[0], $id_project), $tab[0], $id_project);
		while (($tab = sql_fetch_array($res)))
			{
				$tmp = get_activity_end(get_activity_start($tab[0], $id_project), $tab[0], $id_project);
				if ($resultat['date'] != -1 && ($tmp['date'] == -1 || $tmp['date'] > $resultat['date']))
				{
					$resultat = $tmp;
				}
			}
		return ($resultat);
	}
	if (!$start['ok'])
	{
		$resultat['ok'] = false;
		$resultat['date'] = -1;
	}
	else
	{
		$res = sql_query(sprintf(SQL_GET_LEN_DAY, sql_real_escape_string($id_activity), sql_real_escape_string($id_project)));
		if (!sql_num_rows($res))
		{
			$resultat['ok'] = false;
			$resultat['date'] = -1;
		}
		else
		{
			$dat = getdate($start['date']);
			$month = $dat['mon'];
			$day = $dat['mday'];
			$year = $dat['year'];
			$tab = sql_fetch_array($res);
			$day += sql_result($res, 0, 0);
			$resultat['date'] = mktime(0, 0, 0, $month, $day, $year);
			$tab = get_parent_date_end($id_activity);
			if ($tab == null)
			{
				$res = sql_query(sprintf(SQL_DIFF_DATE_PROJECT_END, sql_real_escape_string($id_project)));
				$tab = sql_fetch_array($res);
			}
			$day_start = $tab[0];
			$month_start = $tab[1];
			$year_start	= $tab[2];
			$resultat['ok'] = (mktime(0, 0, 0, $month_start, $day_start, $year_start) >= $resultat['date']);
		}
	}
	return ($resultat);	
}
 
?>