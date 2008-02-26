<?php

if (!MAIN || !isset($_SESSION['PROJECT_NAME']))
  exit(0);

require_once('define_project.php');
require_once('function_activity.php');
require_once('define_activity.php');

/*
** Tree manager
*/
if (isset($_GET['activity_id']))
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
else if (isset($_GET['more']) && isset($_GET['activity']))
   {
     $_SESSION['DEVELOPPED_ACTIVITY'][$_GET['activity']] = 1;
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
/*
** a completer par viven
*/

if (isset($_POST[POST_ACTIVITY_NAME]) && isset($_POST[POST_ACTIVITY_DESCRIB]) && isset($_POST[POST_ACTIVITY_CHARGE]) && 
	$_POST[POST_ACTIVITY_NAME] != "" && $_POST[POST_ACTIVITY_DESCRIB] != "" && $_POST[POST_ACTIVITY_CHARGE] != "" && is_numeric($_POST[POST_ACTIVITY_CHARGE]))
       {
			add_activities($_SESSION['PROJECT_ID'] , (isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0), $_POST[POST_ACTIVITY_NAME], $_POST[POST_ACTIVITY_DESCRIB], $_POST[POST_ACTIVITY_CHARGE]);
			$_SESSION['ACTIVITY_ADDED'] = 1;
       }


printf(PROJECT_WINDOW_BEGIN);

if (isset($_SESSION['PROJECT_NAME']))
  {
    printf(PROJECT_NAME,$_SESSION['PROJECT_NAME']);
  }


check_admin_for_project(isset($_SESSION['PROJECT_ID']) ? $_SESSION['PROJECT_ID'] : 0);

printf(ACTIVITY_START);
printf(ACTIVITY_TITLE, isset($_SESSION['PROJECT_NAME']) ? $_SESSION['PROJECT_NAME'] : UNKNOWED_PROJECT);
printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][0]) ? $_SESSION['DEVELOPPED_ACTIVITY'][0] : 0);
printf(ACTIVITY_ID, 0);
print_activities_list($_SESSION['PROJECT_ID'], 0);
printf(ACTIVITY_END);

if (isset($_SESSION['ACTIVITY_NAME']))
  {
    // window at the right of the project menu = activity window
    include('activity.php');
  }
 else
   {
     if ((isset($_SESSION['PROJECT_MENU']) && $_SESSION['PROJECT_MENU'] == ADD_ACTIVITY))
       {
	 // window at the right of the project menu = add activity to this project
			include('add_activity.php');
       }

     /*
      ** TODO info projet, ajout membre, .... = Vivien
      */
   }

printf(PROJECT_WINDOW_END);

?>