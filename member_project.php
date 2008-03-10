<?php

require_once('./define_project.php');
require_once('./function_project.php');
require_once('function_misc.php');

if (isset($_POST[BTN_DOWN]) && isset($_POST['selectmember']))
{
	foreach($_POST['selectmember'] as $value)
	{
		put_to_member($value, $_SESSION['PROJECT_ID']);
	}
}
else if ((isset($_POST[BTN_UP]) || isset($_POST[BTN_DELETE_HISTO])) && isset($_POST['selectmember']))
{
	foreach($_POST['selectmember'] as $value)
	{
		remove_tot_member($_POST[POST_LIST_KEY][$value][POST_KEY_ID], $_SESSION['PROJECT_ID'], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_START], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_START], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_START], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_END], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_END], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_END]);
	}
}
else if ((isset($_POST[BTN_UPDATE]) || isset($_POST[BTN_UPDATE_HISTO_MEMBER])) && isset($_POST['selectmember']))
{
	var_dump($_POST);
	foreach($_POST['selectmember'] as $value)
	{
		update_member_proj($_POST[POST_LIST_KEY][$value][POST_KEY_ID], $_SESSION['PROJECT_ID'], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_START], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_START], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_START], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_END], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_END], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_END],
		$_POST[POST_ROLE][$value],
		$_POST[POST_DAY_START][$value], $_POST[POST_MONTH_START][$value], $_POST[POST_YEAR_START][$value],
		$_POST[POST_DAY_END][$value], $_POST[POST_MONTH_END][$value], $_POST[POST_YEAR_END][$value]);
	}
}
else if (isset($_POST[BTN_KEEP_HISTO]) && isset($_POST['selectmember']))
{
	foreach($_POST['selectmember'] as $value)
	{
		move_to_old_member_project($_POST[POST_LIST_KEY][$value][POST_KEY_ID], $_SESSION['PROJECT_ID'], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_START], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_START], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_START], 
		$_POST[POST_LIST_KEY][$value][POST_KEY_DAY_END], $_POST[POST_LIST_KEY][$value][POST_KEY_MONTH_END], $_POST[POST_LIST_KEY][$value][POST_KEY_YEAR_END]);
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
printf(MEMBER_BTN_UPDATE);
printf(MEMBER_BTN_HISTO_UPDATE);

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