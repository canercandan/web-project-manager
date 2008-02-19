<?php

/*
** a completer par viven
*/


define('MAIN', 1);

require_once('./define_config.php');
require_once('define_project.php');

header(HEADER_CONTENT_TYPE);
printf(XML_HEADER);

printf(PROJECT_BEGIN);

if (isset($_SESSION['PROJECT_NAME']))
{
	printf(PROJECT_NAME,$_SESSION['PROJECT_NAME']);
}
else
{
	printf(PROJECT_NAME,UNKNOWED_PROJECT);
}

if (isset($_SESSION[ACTIVITY_NAME]))
{
	include('activity.php');
}
else
{
	/*
	** TODO Activity list 
	*/

	if (true || (isset($_SESSION[PROJECT_MENU]) && $_SESSION[PROJECT_MENU] == ADD_ACTIVITY))
	{
		include('add_activity.php');
	}
	
	/*
	** TODO info projet, ajout membre, .... = Vivien
	*/
}

printf(PROJECT_END);

printf(XML_FOOTER);

?>