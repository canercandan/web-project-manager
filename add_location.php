<?php

require_once('./define_admin.php');
require_once('function_admin.php');

printf(ADD_LOCATION_BEGIN);

get_location();
if (!isset($_POST[POST_LOCATION_NAME]) && !isset($_POST[POST_LOCATION_DESCRIB]))
  {
    printf(FIELD_LOCATION_NAME, POST_LOCATION_NAME);
    printf(FIELD_LOCATION_ADDR, POST_LOCATION_ADDR);
  }
 else
   {
	if ($_POST[POST_LOCATION_NAME] == "" || $_POST[POST_LOCATION_ADDR] == "")
		{
			printf(XML_ERROR, FIELD_NOT_FILLED);
			printf(FIELD_LOCATION_NAME, POST_LOCATION_NAME);
			printf(FIELD_LOCATION_ADDR, POST_LOCATION_ADDR);
       }
	 else 
       {
		//	add_project(/*$_SESSION['USER_ID']*/ 0, $_POST[POST_LOCATION_NAME], $_POST[POST_LOCATION_DESCRIB]);
			printf(XML_MESG, LOCATION_OK);
       }
   }

printf(ADD_LOCATION_END);

?>