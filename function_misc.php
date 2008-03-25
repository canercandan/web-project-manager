<?php

if (!MAIN)
  exit(0);

function date_order($month_start, $day_start, $year_start, $month_end, $day_end, $year_end)
{
	$start = mktime(0, 0, 0, $month_start, $day_start, $year_start);
	$end = mktime(0, 0, 0, $month_end, $day_end, $year_end);
	
	return ($month_end != 0 && $day_end != 0 && $year_end != 0 && ($month_start != 0 && $day_start != 0 && $year_start != 0) && $start > $end);
}
  
function month_lst()
{
	printf('<month id="1" value="January"/>');
	printf('<month id="2" value="February"/>');
	printf('<month id="3" value="March"/>');
	printf('<month id="4" value="April"/>');
	printf('<month id="5" value="May"/>');
	printf('<month id="6" value="June"/>');
	printf('<month id="7" value="July"/>');
	printf('<month id="8" value="August"/>');
	printf('<month id="9" value="September"/>');
	printf('<month id="10" value="October"/>');
	printf('<month id="11" value="November"/>');
	printf('<month id="12" value="December"/>');
} 
 
function get_full_months()
{
	printf('<list_month>');
	printf('<month id="0" value="Month"/>');
	month_lst();
	printf('</list_month>');
} 
function get_months()
{
	printf('<list_month>');
	month_lst();
	printf('</list_month>');
}

function get_full_days()
{
	printf('<list_day>');
	printf('<day id="0" value="Day"/>');
	for ($i = 1; $i < 32; $i++)
	{
		printf('<day id="%d" value="%02d"/>', $i, $i);
	}
	printf('</list_day>');
}

function get_days()
{
	printf('<list_day>');
	for ($i = 1; $i < 32; $i++)
	{
		printf('<day id="%d" value="%02d"/>', $i, $i);
	}
	printf('</list_day>');
}

function get_years()
{
	printf('<list_year>');
	$res = getdate();
	$year = $res['year'] - 25;
	for ($i = $year; $i < $year + 50; $i++)
	{
		printf('<year id="%d" value="%d"/>', $i, $i);
	}
	printf('</list_year>');
}

function get_full_years()
{
	printf('<list_year>');
	$res = getdate();
	$year = $res['year'] - 25;
	printf('<year id="0" value="Year"/>');
	for ($i = $year; $i < $year + 50; $i++)
	{
		printf('<year id="%d" value="%d"/>', $i, $i);
	}
	printf('</list_year>');
}

?>