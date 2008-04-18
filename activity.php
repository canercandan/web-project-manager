<?php

if (!MAIN)
  exit(0);

require_once('define_activity.php');
require_once('function_activity.php');

printf(ACTIVITY_WINDOW_BEGIN);
get_activity_right($_SESSION['ACTIVITY_ID'], $_SESSION['PROJECT_ID'], $_SESSION[SESSION_ID]);

if (isset($_SESSION['ACTIVITY_NAME']))
  {
    printf('<name>%s</name>', htmlentities($_SESSION['ACTIVITY_NAME']));
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
	if ($_SESSION['ACTIVITY_MENU'] == MEMBER_DATEGRAPH_ACTIVITY)
	{
		include('activity_member_dategraph.php');
	}
	
}

printf(ACTIVITY_WINDOW_END);

?>