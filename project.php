<?php

require_once('define_project.php');
require_once('function_activity.php');

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
printf(ACTIVITY_START);
printf(ACTIVITY_TITLE, isset($_SESSION['PROJECT_NAME']) ? $_SESSION['PROJECT_NAME'] : UNKNOWED_PROJECT);
printf(ACTIVITY_DEV, 1); //isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]));
printf(ACTIVITY_ID, isset($_SESSION['PROJECT_ID']) ? $_SESSION['PROJECT_ID'] : 0);
print_activities_list(0 /*$_SESSION['PROJECT_ID']*/, 0);
printf(ACTIVITY_END);
	
if (/*true || */isset($_SESSION[ACTIVITY_NAME]))
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