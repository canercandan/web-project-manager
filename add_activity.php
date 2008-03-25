<?php

if (!MAIN || !isset($_SESSION['PROJECT_ID']))
  exit(0);

require_once('./define_activity.php');
require_once('./define_informations_activity.php');
require_once('./function_activity.php');

printf(ADD_ACTIVITY_BEGIN);

if (isset($_GET['creation']))
{
	if ($_GET['creation'] == 'activity')
	{
			printf(XML_MESG, ACTIVITY_OK);
	}
}
get_full_days();
get_full_months();
get_full_years();

printf(FIELD_ACTIVITY_NAME,'', POST_ACTIVITY_NAME);
printf(FIELD_ACTIVITY_DESCRIB,'', POST_ACTIVITY_DESCRIB);
printf(FIELD_ACTIVITY_CHARGE,'0', POST_ACTIVITY_CHARGE);
printf(FIELD_ACTIVITY_DATE, POST_ACTIVITY_DAY, 0, POST_ACTIVITY_MONTH, 0, POST_ACTIVITY_YEAR, 0);
printf(FIELD_ACTIVITY_DATE_END, POST_ACTIVITY_DAY_END, 0, POST_ACTIVITY_MONTH_END, 0, POST_ACTIVITY_YEAR_END, 0);

if (isset($_POST[POST_ACTIVITY_NAME]) && isset($_POST[POST_ACTIVITY_CHARGE]))
   {
     if ($_POST[POST_ACTIVITY_NAME] == "" || $_POST[POST_ACTIVITY_CHARGE] == "")
       {
		printf(XML_ERROR, FIELD_NOT_FILLED);

       }
	else if (!is_numeric($_POST[POST_ACTIVITY_CHARGE]))
       {
		printf(XML_ERROR, ERR_CHARGE_INT);

       }
}

printf(ADD_ACTIVITY_END);

?>