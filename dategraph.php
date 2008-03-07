<?php

function	print_tab_act_member_date($id_activity)
{
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_MEMBER_DATE, sql_real_escape_string($id_activity)));
	$input = array();
	while (($tab = sql_fetch_array($res)))
	{
		$input[] = $tab;
	}	
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_DURATION, sql_real_escape_string($id_activity), sql_real_escape_string($id_activity)));
	$tab = sql_fetch_array($res);
	$length = $tab[3] + 1;
	$day = $tab[0];
	$month = $tab[1];
	$year = $tab[2];
	foreach ($input as $key => $value)
	{
		$res = sql_query(sprintf(SQL_GET_ACTIVITY_MEMBER_DURATION, sql_real_escape_string($id_activity), $value['usr_id'], sql_real_escape_string($id_activity), $value['usr_id']));
		while (($tab = sql_fetch_array($res)))
		{
			$new['start'] = $tab[0];		
			$new['end'] = ($tab[1] == NULL) ? ($length - 1) : ($tab[0] + $tab[1]);
			$new['date_start'] = $tab[2];
			$new['date_end'] = $tab[3];
			$input[$key]['dates'][] = $new;
		}
	}
	
	if ($length > 0)
		print_tab_date($length, $day, $month, $year, $input);
}

function	print_tab_proj_member_date($id_project)
{
	$res = sql_query(sprintf(SQL_GET_MEMBER_DATE, sql_real_escape_string($id_project)));
	$input = array();
	while (($tab = sql_fetch_array($res)))
	{
		$input[] = $tab;
	}	
	$res = sql_query(sprintf(SQL_GET_PROJECT_DURATION, sql_real_escape_string($id_project)));
	$tab = sql_fetch_array($res);
	$length = $tab[3] + 1;
	$day = $tab[0];
	$month = $tab[1];
	$year = $tab[2];
	foreach ($input as $key => $value)
	{
		$res = sql_query(sprintf(SQL_GET_PROJECT_MEMBER_DURATION, sql_real_escape_string($id_project), $value['usr_id'], sql_real_escape_string($id_project), $value['usr_id']));
		while (($tab = sql_fetch_array($res)))
		{
			$new['start'] = $tab[0];		
			$new['end'] = ($tab[1] == NULL) ? ($length - 1) : ($tab[0] + $tab[1]);
			$new['date_start'] = $tab[2];
			$new['date_end'] = $tab[3];
			$input[$key]['dates'][] = $new;
		}
	}
	if ($tab[3] >= 0)
		print_tab_date($length, $day, $month, $year, $input);
}

function	print_tab_date($length, $day, $month, $year, $input)
{
	printf(TAB_DATE_START, (double) (((double) 80) / ((double) $length)));
	$colorbg = 0;
	$coloractive = 2;
	foreach ($input as $value)
	{
		print_line($length, htmlentities($value['name']), $value['dates'], $colorbg, $coloractive);
		$colorbg++;
		$colorbg %= 2;
		$coloractive++;
		if ($coloractive > 3)
			$coloractive = 2;
	}
	print_tab_legend($length, $day, $month, $year, 3);
	printf(TAB_DATE_END);
}

function print_line($length, $name, $dates, $colorbg, $coloractiv)
{
	printf(TAB_LINE_START, 0, $name, $colorbg);
	/*for ($i = 0; $i < $length; $i++)
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
	}*/

	$end = 0;
	foreach($dates as $value)
		{
			if ($value['start'] - $end > 0) 
				printf(TAB_ITEM, 0, '', '', $colorbg, 0, '', (double) (((double) 80 * $end) / ((double) $length)) + 20, (((double) ($value['start'] - $end) * 80) / ((double) $length)));
			$end = $value['end'] + 1;
			printf(TAB_ITEM, 1, $value['date_start'], $value['date_end'] != '' ? $value['date_end'] : DATE_TODAY, $coloractiv, 0, '', (double) (((double) 80 * $value['start']) / ((double) $length)) + 20, (((double) ($value['end'] - $value['start'] + 1) * 80) / ((double) $length)));   
		}
	if ($length - $end > 0)
		printf(TAB_ITEM, 0, '', '', $colorbg, 0, '', (double) (((double) 80 * $end) / ((double) $length)) + 20, (((double) ($length - $end) * 80) / ((double) $length)));
	
	printf(TAB_LINE_END);
}

function	print_date($day, $month, $year)
{
	return(sprintf('%02d/%02d/%04d', $day, $month, $year));
}

function	print_tab_legend($length, $day, $month, $year, $nb)
{
	$step = $length / ($nb);
	$width = ((double) 80) / ((double) $nb);
	printf(TAB_LINE_START, 1, '', 0);
	$end = 20;
	if ($step >= 1)
		while ($end < 100)
		{
			printf(TAB_ITEM, 0, '','', 0, 0, print_date($day, $month, $year), $end, $width);
			$end += $width;
			$day += $step;
			$tim = mktime(0, 0, 0, (int) $month, (int) $day, (int) $year);			
			$dat = getdate($tim);
			$month = $dat['mon'];
			$day = $dat['mday'];
			$year = $dat['year'];
		}
	else
	{
		printf(TAB_ITEM, 0, '','', 0, 0, print_date($day, $month, $year), $end, 80);
	}
	printf(TAB_LINE_END);
}

?>