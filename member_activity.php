<?php

require_once('./define_activity.php');
require_once('./function_activity.php');
require_once('function_misc.php');

if(isset($_POST))
{
//var_dump($_POST);
	if (isset($_POST[BTN_DOWN]))
	{
		foreach($_POST[POST_SELECT] as $value)
		{
			add_member($_SESSION['ACTIVITY_ID'], $value);
		}
	}
	if ((isset($_POST[BTN_UPDATE_MEMBER]) || isset($_POST[BTN_UPDATE_HISTO_MEMBER])) && isset($_POST[POST_SELECT]))
	{
		foreach($_POST[POST_SELECT] as $value)
		{
			update_member_activity($_SESSION['ACTIVITY_ID'], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_ID], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_END],
			(isset($_POST[MEMBER_POST_WORK][$value]) ? 1 : 0),
			(isset($_POST[MEMBER_POST_LEVEL][$value]) ? 1 : 0),
			$_POST[POST_ACT_DAY_START][$value],
			$_POST[POST_ACT_MONTH_START][$value],
			$_POST[POST_ACT_YEAR_START][$value],
			$_POST[POST_ACT_DAY_END][$value],
			$_POST[POST_ACT_MONTH_END][$value],
			$_POST[POST_ACT_YEAR_END][$value]);
		}
	}
	else if ((isset($_POST[BTN_UP]) || isset($_POST[BTN_DELETE_HISTO])) && isset($_POST[POST_SELECT]))
	{
		foreach($_POST[POST_SELECT] as $value)
		{
			delete_member_activity($_SESSION['ACTIVITY_ID'], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_ID], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_END]);
		}
	}
	else if (isset($_POST[BTN_DOWN]) && isset($_POST[POST_SELECT]))
	{
		var_dump($_POST);
		foreach($_POST[POST_SELECT] as $value)
		{
			move_to_old_member_activity($_SESSION['ACTIVITY_ID'], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_ID], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_START], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_DAY_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_MONTH_END], 
			$_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_YEAR_END]);
		}
	}
	var_dump($_POST);
}



	get_full_years();
	get_full_days();
	get_full_months();
printf(MEMBER_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UP);
printf(MEMBER_BTN_DOWN);
printf(MEMBER_BTN_DELETE_HISTO);
printf(MEMBER_KEEP_HISTO);
printf(MEMBER_BTN_UPDATE);
printf(MEMBER_BTN_HISTO_UPDATE);

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