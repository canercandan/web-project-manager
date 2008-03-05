<?php

require_once('./define_activity.php');
require_once('./function_activity.php');
require_once('function_misc.php');

if(isset($_POST))
{
	if (isset($_POST[BTN_DOWN]))
	{
		foreach($_POST[POST_SELECT] as $value)
		{
			add_member($_SESSION['ACTIVITY_ID'], $value);
		}
	}
	//var_dump($_POST);
}



	get_full_years();
	get_full_days();
	get_full_months();
printf(MEMBER_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UP);
printf(MEMBER_BTN_DOWN);
printf(MEMBER_BTN_SUBMIT);
printf(MEMBER_BTN_DELETE_HISTO);
printf(MEMBER_KEEP_HISTO);

printf(MEMBER_LIST_PROJECT_BEGIN);
$last = get_member_project_activity($_SESSION['ACTIVITY_ID'], $_SESSION['PROJECT_ID'], 0);
printf(MEMBER_LIST_PROJECT_END);

printf(MEMBER_LIST_ACTIVITY_BEGIN);
$last = get_member_activity($_SESSION['ACTIVITY_ID'], $_SESSION['PROJECT_ID'], $last);
printf(MEMBER_LIST_ACTIVITY_END);

printf(MEMBER_HISTO_LIST_ACTIVITY_BEGIN);
get_member_histo_activity($_SESSION['ACTIVITY_ID'], $_SESSION['PROJECT_ID'], $last);
printf(MEMBER_HISTO_LIST_ACTIVITY_END);

printf(MEMBER_ACTIVITY_END);
?>