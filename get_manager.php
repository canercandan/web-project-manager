<?php

require_once('function_project.php');
require_once('function_activity.php');

if (isset($_GET['project_id']))
{
	if (($checked = check_project(0, $_GET['project_id'])))
	{
		$_SESSION['PROJECT_NAME'] = $checked;
		$_SESSION['PROJECT_ID'] = $_GET['project_id'];
		$_SESSION['PROJECT_MENU'] = ADD_ACTIVITY;
		unset($_SESSION['ACTIVITY_NAME']);
		unset($_SESSION['ACTIVITY_ID']);
		unset($_SESSION['ACTIVITY_MENU']);
	}
	else
	{
		;
	}
}
else if (isset($_GET['activity_id']))
{
	if ($_GET['activity_id'] == 0)
	{
		unset($_SESSION['ACTIVITY_NAME']);
		unset($_SESSION['ACTIVITY_ID']);
		unset($_SESSION['ACTIVITY_MENU']);
		$_SESSION['PROJECT_MENU'] = ADD_ACTIVITY;
	}
	else if (($checked = check_activity(0, $_GET['activity_id'])))
	{
		$_SESSION['ACTIVITY_NAME'] = $checked;
		$_SESSION['ACTIVITY_ID'] = $_GET['activity_id'];
		$_SESSION['ACTIVITY_MENU'] = INFORMATION_ACTIVITY;
	}
	else
	{
		;
	}
}
else if (isset($_GET['less']) && isset($_GET['activity']))
  {
    $_SESSION['DEVELOPPED_ACTIVITY'][$_GET['activity']] = 0;
  }
else if (isset($_GET['more']) && isset($_GET['activity']))
   {
     $_SESSION['DEVELOPPED_ACTIVITY'][$_GET['activity']] = 1;
   }
else if (isset($_GET['more']) && isset($_GET['work_id']))
   {
     $_SESSION['DEVELOPPED_WORK'][$_GET['work_id']] = 1;
   }
else if (isset($_GET['less']) && isset($_GET['work_id']))
   {
     $_SESSION['DEVELOPPED_WORK'][$_GET['work_id']] = 0;
   }
else if (isset($_GET['project']) && isset($_GET['information']))
{
	unset($_SESSION['ACTIVITY_NAME']);
	unset($_SESSION['ACTIVITY_ID']);
	unset($_SESSION['ACTIVITY_MENU']);
	$_SESSION['PROJECT_MENU'] = INFORMATION;
}
else if (isset($_GET['project']) && isset($_GET['member']))
{
	unset($_SESSION['ACTIVITY_NAME']);
	unset($_SESSION['ACTIVITY_ID']);
	unset($_SESSION['ACTIVITY_MENU']);
	$_SESSION['PROJECT_MENU'] = MEMBER;
}
else if (isset($_GET['project']) && isset($_GET['add_activity']))
{
	unset($_SESSION['ACTIVITY_NAME']);
	unset($_SESSION['ACTIVITY_ID']);
	unset($_SESSION['ACTIVITY_MENU']);
	$_SESSION['PROJECT_MENU'] = ADD_ACTIVITY;
}
else if (isset($_GET['activity']) && isset($_GET['information']))
{
	$_SESSION['ACTIVITY_MENU'] = INFORMATION_ACTIVITY;
}
else if (isset($_GET['activity']) && isset($_GET['member']))
{
	$_SESSION['ACTIVITY_MENU'] = MEMBER_ACTIVITY;
}
else if (isset($_GET['activity']) && isset($_GET['add_activity']))
{
	$_SESSION['ACTIVITY_MENU'] = ADD_ACTIVITY_ACTIVITY;
}


?>