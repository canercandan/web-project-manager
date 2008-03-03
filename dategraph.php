<?php

define('TAB_DATE_START','<tab_date length="%s">');
define('TAB_LINE_START', '<line legend="%d" name="%s">');
define('TAB_LINE_END', '</line>');
define('TAB_DATE_END','</tab_date>');
define('TAB_ITEM', '<item color="%s" color_text="%s" legend="%s"/>');
define('SQL_GET_DATE', 'SELECT (CURDATE() - activity_date_begin) FROM ');
define('SQL_GET_MEMBER_DATE', 'SELECT DISTINCT usr_id, usr_login as "name" FROM tw_usr, tw_member
WHERE member_usr_id = usr_id 
AND member_project_id = \'%d\';');
define('SQL_GET_PROJECT_MEMBER_DURATION', 'SELECT DATEDIFF(member_date_start,project_date), DATEDIFF(member_date_end,member_date_start)
FROM tw_member, tw_project
WHERE
project_id = member_project_id
AND project_id = \'%d\'
AND member_usr_id = \'%d\'
AND member_date_end != \'00-00-0000\'
UNION
SELECT DATEDIFF(member_date_start, project_date), DATEDIFF(CURDATE(), member_date_start)
FROM tw_member, tw_project
WHERE
project_id = member_project_id
AND project_id = \'%d\'
AND member_usr_id = \'%d\'
AND (member_date_end = \'00-00-0000\');');
define('SQL_GET_PROJECT_DURATION', 'SELECT day(project_date), month(project_date), year(project_date), DATEDIFF(CURDATE(),project_date) FROM tw_project
WHERE project_id = \'%d\';');



function	print_tab_proj_member_date($id_project)
{
	$res = sql_query(sprintf(SQL_GET_MEMBER_DATE, sql_real_escape_string(1)));
	$input = array();
	while (($tab = sql_fetch_array($res)))
	{
		$input[] = $tab;
	}	
	foreach ($input as $key => $value)
	{
		$res = sql_query(sprintf(SQL_GET_PROJECT_MEMBER_DURATION, sql_real_escape_string(1), $value['usr_id'], sql_real_escape_string(1), $value['usr_id']));
		while (($tab = sql_fetch_array($res)))
		{
			$new['start'] = $tab[0];
			$new['end'] = $tab[0] + $tab[1];
			$input[$key]['dates'][] = $new;
		}
	}
	$res = sql_query(sprintf(SQL_GET_PROJECT_DURATION, sql_real_escape_string($id_project)));
	
	$tab = sql_fetch_array($res);
	if ($tab[3] > 0)
		print_tab_date($tab[3], $tab[0], $tab[1], $tab[2], $input);
}

function	print_tab_date($length, $day, $month, $year, $input)
{
	printf(TAB_DATE_START, $length);
	$colorbg = 0;
	$coloractive = 2;
	foreach ($input as $value)
	{
		print_line($length, $value['name'], $value['dates'], $colorbg, $coloractive);
/*		$colorbg++;
		$colorbg %= 2;
		$colorbg++;
		$colorbg = $coloractive % 5 + 2;*/
	}
	print_tab_legend($length, $day, $month, $year, 4);
	printf(TAB_DATE_END);
}

function print_line($length, $name, $dates, $colorbg, $coloractiv)
{
	printf(TAB_LINE_START, 0, $name);
	for ($i = 0; $i < $length; $i++)
	{
		$in = 0;
		foreach($dates as $value)
		{
			if ($i <= $value['end'] && $i >= $value['start'])
			{
				$in = 1;
				break;
			}
		}
		printf(TAB_ITEM, ($in ? $coloractiv : $colorbg), 0, '');
	}
	printf(TAB_LINE_END);
}

function	print_date($day, $month, $year)
{
	return(sprintf('%02d/%02d/%d', $day, $month, $year));
}

function	print_tab_legend($length, $day, $month, $year, $nb)
{
	$step = $length / ($nb - 1);
	printf(TAB_LINE_START, 1, '');
	for ($i = 0; $i < $length; $i++)
	{
		if ($i % $step == 0)
			printf(TAB_ITEM, 0, 0, print_date($day, $month, $year));
		else
			printf(TAB_ITEM, 0, 0, '');
			$day++;
		$tim = mktime(0, 0, 0, (int) $month, (int) $day, (int) $year);			
		$dat = getdate($tim);
		$month = $dat['mon'];
		$day = $dat['mday'];
		$year = $dat['year'];
	}
	printf(TAB_LINE_END);
}

?>