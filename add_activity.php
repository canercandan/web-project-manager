<?php

if (!MAIN || !isset($_SESSION['PROJECT_ID']))
  exit(0);

require_once('./define_activity.php');
require_once('./function_activity.php');

printf(ADD_ACTIVITY_BEGIN);

if (isset($_GET['creation']))
{
	if ($_GET['creation'] == 'activity')
	{
			printf(XML_MESG, ACTIVITY_OK);
	}
}
printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);
if (isset($_POST[POST_ACTIVITY_NAME]) && isset($_POST[POST_ACTIVITY_DESCRIB]) && isset($_POST[POST_ACTIVITY_CHARGE]))
   {
     if ($_POST[POST_ACTIVITY_NAME] == "" || $_POST[POST_ACTIVITY_CHARGE] == "")
       {
		printf(XML_ERROR, FIELD_NOT_FILLED);

       }
     else if (isset($_SESSION['ACTIVITY_ADDED']))
       {
			unset($_SESSION['ACTIVITY_ADDED']);
			header('Location:root.php?creation=activity');
			exit(0);
       }
   }

printf(ADD_ACTIVITY_END);

?>