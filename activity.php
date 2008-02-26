<?php

if (!MAIN)
  exit(0);

require_once('define_activity.php');
require_once('function_activity.php');

printf(ACTIVITY_WINDOW_BEGIN);

if (isset($_SESSION['ACTIVITY_NAME']))
  {
    printf('<name>%s</name>', $_SESSION['ACTIVITY_NAME']);
  }
 else
   {
     printf('<name>%s</name>', UNKNOWED_ACTIVITY);
   }

check_admin_for_activity(isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0);

if (isset($_SESSION['ACTIVITY_MENU']))
{
	if ($_SESSION['ACTIVITY_MENU'] == MEMBER_ACTIVITY)
	{
		include('member_activity.php');
	}
	else if ($_SESSION['ACTIVITY_MENU'] == INFORMATION_ACTIVITY)
	{
		include('informations_activity.php');
	}
	if ($_SESSION['ACTIVITY_MENU'] == ADD_ACTIVITY_ACTIVITY)
	{
		include('add_activity.php');
	}
}

printf(ACTIVITY_WINDOW_END);

?>