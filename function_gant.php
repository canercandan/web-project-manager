<?php

define('TAB_DATE_START','<tab_date length="%.3f">');
define('TAB_LINE_START', '<line legend="%d" name="%s" colorbg="%d" valid="%d">');
define('TAB_LINE_END', '</line>');
define('TAB_DATE_END','</tab_date>');
define('TAB_ITEM', '<item title="%s" date_start="%s" date_end="%s" color="%s" color_text="%s" legend="%s" start="%.3f" width="%.3f"/>');

define('SQL_GET_ACTIVITY_PROJECT', 'SELECT activity_id, activity_name, SUM(activity_hour_work) FROM tw_activity
LEFT JOIN tw_activity_member ON activity_id = activity_member_activity_id
WHERE activity_project_id = \'%d\'
GROUP BY activity_id;');

define('SQL_GET_PROJECT_DATES', 'SELECT month(project_date), day(project_date), year(project_date),
										month(project_date_end), day(project_date_end), year(project_date_end), DATEDIFF(project_date_end, project_date)
FROM tw_project	
WHERE project_id = \'%d\';');

define('SQL_GET_WORK_ACTIVITY', '
SELECT 24 * 60 * 60 * SUM(activity_hour_work) / project_hour_per_day
FROM tw_activity_member, tw_project 
WHERE activity_member_activity_id = \'%d\' 
AND project_id = \'%d\';');
 
define('GANTT_BEGIN', '<gantt>');
define('GANTT_END', '</gantt>');  							

function get_project_activity_plan($id_project)
{
	$res = sql_query(sprintf(SQL_GET_ACTIVITY_PROJECT, sql_real_escape_string($id_project)));
	$tab_result = null;
	if (sql_num_rows($res))
	{
		while(($tab = sql_fetch_array($res)))
		{
			if (strlen($tab[1]))
			{
				$tab_result['name'][$tab[0]] = $tab[1];
				$tab_result['work'][$tab[0]] = $tab[2];
				$tab_result = get_activity_start($tab[0], $id_project, $tab_result);
				$start = $tab_result['start'][$tab[0]];
				$tab_result = get_activity_end($start, $id_activity, $id_project, $tab_result);
			}
		}
		//asort($tab_result['start']);
	}
	return($tab_result);
}

function print_line($tab, $id, $work, $bg, $len, $start)
{
	printf(TAB_LINE_START, 
		0, ($work ? $tab['name'][$id] : ""), $bg,
		$tab['end'][$id]['ok'] && $tab['start'][$id]['ok'] ? 1 : 0);
	if ($tab['start'][$id]['date'] > $start + $len)	
		$actstart = $start + $len;	
	else		
		$actstart = $tab['start'][$id]['date'];
	if ($tab['end'][$id]['date'] > $start + $len)
		$actend = $start + $len;
	else
		$actend = $tab['end'][$id]['date'];
	$dstart = $actstart > 0 ? getdate($actstart) : -1 ;
	$dend = $actend  > 0 ? getdate($actend) : -1;
	$end1 = ($actend  < 0 ? 80 : (($actend - $start) / $len) * 80 + 20);
	$start1 = ($actstart < 0 ? 20 : (($actstart - $start) / $len) * 80 + 20);
	$workwidth = ($work * 80) / $len;
	if ($workwidth > 0)
		printf(TAB_ITEM, '', $save1 = ($actstart < 0 ? "Unevaluable" : print_date($dstart['mday'], $dstart['mon'], $dstart['year'])),
				$save2 = ($actend < 0 ? "Unevaluable" : print_date($dend['mday'], $dend['mon'], $dend['year'])), 
				$bg + 4,
				0,
				sprintf('%.0f day of work', $work / (24 * 60 * 60)), 
				$start1,
				$workwidth);
	if (!$workwidth || $workwidth < $end1 - $start1)		
		printf(TAB_ITEM, '', $save1 = ($actstart < 0 ? "Unevaluable" : print_date($dstart['mday'], $dstart['mon'], $dstart['year'])),
				$save2 = ($actend < 0 ? "Unevaluable" : print_date($dend['mday'], $dend['mon'], $dend['year'])), 
				$bg + 2,
				0,
				$save1 . " - " . $save2, 
				$start1 + $workwidth,
				$end1 - $start1);
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
	printf(TAB_LINE_START, 1, '', 0, 1);
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

function show_gant($id_project)
{
	$res = sql_query(sprintf(SQL_GET_PROJECT_DATES, sql_real_escape_string($id_project)));
	$tab = sql_fetch_array($res);
	$len = mktime(0, 0, 0, $tab[3], $tab[4], $tab[5]) - mktime(0, 0, 0, $tab[0], $tab[1], $tab[2]);
	$start = mktime(0, 0, 0, $tab[0], $tab[1], $tab[2]);
	printf(TAB_DATE_START, $tab[6]);
	$tab_result = get_project_activity_plan($id_project);
	if ($tab_result)
	{
		$i = 1;
		foreach($tab_result['start'] as $key => $value)
		{
			if (strlen($tab_result['name'][$key]))
			{
				$i++;
				print_line($tab_result, $key, 0, $i % 2, $len, $start);
				$res = sql_query(sprintf(SQL_GET_WORK_ACTIVITY, sql_real_escape_string($key), sql_real_escape_string($id_project)));
				$tabtmp = sql_fetch_array($res);
				print_line($tab_result, $key, $tabtmp[0], $i % 2, $len, $start);
				print_line($tab_result, $key, 0, $i % 2, $len, $start);
			}
		}
		print_tab_legend($tab[6], $tab[0], $tab[1], $tab[2], 3);
	}
	printf(TAB_DATE_END);
}

?>