<?php

if (!MAIN)
  exit(0);
  
function get_months()
{
	printf('<list_month>');
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
	printf('</list_month>');
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
	$year = $res['year'] - 5;
	for ($i = $year; $i < $year + 30; $i++)
	{
		printf('<year id="%d" value="%d"/>', $i, $i);
	}
	printf('</list_year>');
}

?>