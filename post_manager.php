<?php

require_once('function_project.php');
require_once('function_activity.php');

if (isset($_POST[BTN_UPDATE]) && isset($_POST[POST_PROJECT_NAME]) && isset($_POST[POST_PROJECT_DESCRIB]) && isset($_POST[POST_PROJECT_DAY])
			&& isset($_POST[POST_PROJECT_MONTH]) && isset($_POST[POST_PROJECT_YEAR]))
{
	$err = update_project($_SESSION['PROJECT_ID'], $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB], 
	$_POST[POST_PROJECT_DAY], $_POST[POST_PROJECT_MONTH], $_POST[POST_PROJECT_YEAR]);
	if (!$err)
	{	
		header(sprintf('Location:root.php?project_id=%s&update=project', $_SESSION['PROJECT_ID']));
		exit(0);
	}
}
else if (isset($_POST[BTN_UPDATE]) && isset($_POST[POST_MOD_ACTIVITY_NAME]) && isset($_POST[POST_MOD_ACTIVITY_DESCRIB]) && isset($_POST[POST_ACT_DAY_START])
			&& isset($_POST[POST_MONTH_START]) && isset($_POST[POST_ACT_YEAR_START])  && isset($_POST[POST_MOD_ACTIVITY_CHARGE]))
{
	$err = update_activity($_SESSION['PROJECT_ID'], $_SESSION['ACTIVITY_ID'], $_POST[POST_MOD_ACTIVITY_NAME], $_POST[POST_MOD_ACTIVITY_DESCRIB], 
		$_POST[POST_ACT_DAY_START], $_POST[POST_MONTH_START], $_POST[POST_ACT_YEAR_START], 
		$_POST[POST_MOD_ACTIVITY_CHARGE]);
	if (!$err)
	{	
		header(sprintf('Location:root.php?activity_id=%s&update=activity', $_SESSION['ACTIVITY_ID']));
		exit(0);
	}
}
else if (isset($_POST[POST_PROJECT_NAME]) && isset($_POST[POST_PROJECT_DESCRIB]) && $_SESSION['ROOT_MENU'] == ADD_PROJECT && $_POST[POST_PROJECT_NAME] != "")
{
	add_project(/*$_SESSION['USER_ID']*/ 0, $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB]);
	header('Location:root.php?creation=project');
	exit(0);
}
else if (isset($_POST[POST_ACTIVITY_NAME]) && isset($_POST[POST_ACTIVITY_DESCRIB]) && isset($_POST[POST_ACTIVITY_CHARGE]) && 
	$_POST[POST_ACTIVITY_NAME] != "" && $_POST[POST_ACTIVITY_CHARGE] != "" && is_numeric($_POST[POST_ACTIVITY_CHARGE]))
{
	add_activities($_SESSION['PROJECT_ID'] , (isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0), $_POST[POST_ACTIVITY_NAME], $_POST[POST_ACTIVITY_DESCRIB], $_POST[POST_ACTIVITY_CHARGE]);
	header('Location:root.php?creation=activity');
	exit(0);
}



?>