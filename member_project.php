<?php

require_once('./define_project.php');
require_once('./function_project.php');
require_once('function_misc.php');


if (isset($_POST[BTN_DOWN]))
{
	foreach($_POST['selectmember'] as $value)
	{
		put_to_member($value, $_SESSION['PROJECT_ID']);
	}
}
else if (isset($_POST[BTN_UP]))
{
	foreach($_POST['selectmember'] as $value)
	{
		remove_tot_member($value, $_SESSION['PROJECT_ID']);
	}
}

	get_full_years();
	get_full_days();
	get_full_months();
printf(MEMBER_PROJECT_BEGIN);
printf(MEMBER_BTN_UP);
printf(MEMBER_BTN_DOWN);
printf(MEMBER_BTN_SUBMIT);
printf(MEMBER_BTN_DELETE_HISTO);
printf(MEMBER_KEEP_HISTO);

printf(MEMBER_LIST_BEGIN);

$last = get_member_out_project($_SESSION['PROJECT_ID'], 0);
printf(MEMBER_LIST_END);
printf(MEMBER_LIST_PROJECT_BEGIN);
$last = get_member_project($_SESSION['PROJECT_ID'], $last);
printf(MEMBER_LIST_PROJECT_END);

printf(MEMBER_HISTO_LIST_PROJECT_BEGIN);
get_histo_member_project($_SESSION['PROJECT_ID'], $last);
printf(MEMBER_HISTO_LIST_PROJECT_END);

printf(MEMBER_PROJECT_END);
?>