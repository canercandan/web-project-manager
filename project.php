<?php

require_once('define_project.php');

/*
** a completer par viven
*/

printf(PROJECT_BEGIN);

if (isset($_SESSION['PROJECT_NAME']))
{
	printf(PROJECT_NAME,$_SESSION['PROJECT_NAME']);
}
else
{
	printf(PROJECT_NAME,UNKNOWED_PROJECT);
}

/*
** TODO Project Menu
*/

/*
** TODO Activity list marc 
*/
	
if (isset($_SESSION[ACTIVITY_NAME]))
{
	// window at the right of the project menu = activity window
	include('activity.php');
}
else
{
	if (true || (isset($_SESSION[PROJECT_MENU]) && $_SESSION[PROJECT_MENU] == ADD_ACTIVITY))
	{
		// window at the right of the project menu = add activity to this project
		include('add_activity.php');
	}
	
	/*
	** TODO info projet, ajout membre, .... = Vivien
	*/
}

printf(PROJECT_END);

?>