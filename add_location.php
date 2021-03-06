<?php

require_once('./define_admin.php');
require_once('function_admin.php');

printf(ADD_LOCATION_BEGIN);

if (isset($_GET['creation']))
{
	if ($_GET['creation'] == 'location')
	{
			printf(XML_MESG, LOCATION_OK);
	}
}
if (isset($_POST[POST_LOCATION_MODNAME]) && isset($_POST[POST_LOCATION_MODADDR]) && isset($_POST[POST_LOCATION_MODID]))
{
	 update_location($_POST[POST_LOCATION_MODID], $_POST[POST_LOCATION_MODNAME], $_POST[POST_LOCATION_MODADDR]);
}

if (!isset($_POST[POST_LOCATION_NAME]) || !isset($_POST[POST_LOCATION_ADDR]))
  {
	get_location();
    printf(FIELD_LOCATION_NAME, POST_LOCATION_NAME);
    printf(FIELD_LOCATION_ADDR, POST_LOCATION_ADDR);
  }
 else
   {
	if ($_POST[POST_LOCATION_NAME] == "")
		{
			printf(XML_ERROR, LOC_NAME_MISSING);
			get_location();
			printf(FIELD_LOCATION_NAME, POST_LOCATION_NAME);
			printf(FIELD_LOCATION_ADDR, POST_LOCATION_ADDR);
       }
	else 
       {
			add_location($_POST[POST_LOCATION_NAME], $_POST[POST_LOCATION_ADDR]);
			header('Location:root.php?creation=location');
			exit(0);
       }
   }

printf(ADD_LOCATION_END);

?>