<?php

if (!MAIN)
  exit(0);

require_once('./define_activity.php');
require_once('./function_activity.php');

printf(ADD_ACTIVITY_BEGIN);

if (!isset($_POST[POST_ACTIVITY_NAME]) && !isset($_POST[POST_ACTIVITY_DESCRIB]) && !isset($_POST[POST_ACTIVITY_CHARGE]))
  {
    /*
     ** TODO  add a date box
     */
    printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
    printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
    printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);
  }
 else
   {
     if ($_POST[POST_ACTIVITY_NAME] == "" || $_POST[POST_ACTIVITY_DESCRIB] == "" || $_POST[POST_ACTIVITY_CHARGE] == "")
       {
	 printf(XML_ERROR, FIELD_NOT_FILLED);
	 printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
	 printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
	 printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);
       }
     else if (is_numeric($_POST[POST_ACTIVITY_CHARGE]))
       {
	 add_activities(0 /*$_SESSION['PROJECT_ID']*/ , (isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 6), $_POST[POST_ACTIVITY_NAME], $_POST[POST_ACTIVITY_DESCRIB], $_POST[POST_ACTIVITY_CHARGE]);
	 printf(XML_MESG, ACTIVITY_OK);
       }
     else
       {
	 printf(XML_ERROR, CHARGE_NOT_INT);
	 printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
	 printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
	 printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);
       }
   }

printf(ADD_ACTIVITY_END);

?>