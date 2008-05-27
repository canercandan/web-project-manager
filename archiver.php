<?php

require_once('function_archiver.php');

if (isset($_GET['createfolder']))
{
	if ($_GET['createfolder'] == 1)
		printf("<mesg>You have created a new folder</mesg>");
	else if ($_GET['createfolder'] == -1)
		printf("<error>Impossible to create this folder (try with another name)</error>");
}
else if (isset($_GET['createfile']))
{
	if ($_GET['createfile'] == 1)
		printf("<mesg>You have uploaded a file</mesg>");
	else if ($_GET['createfile'] == -1)
 		printf("<error>Impossible to upload this file (not enough rights)</error>");
}
printf(ARCHIVER_START);
show_current_folder($_SESSION['PROJECT_ID'], isset($_SESSION['project_activity_folder']) ? $_SESSION['project_activity_folder'] : 
											(isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0), $_SESSION[SESSION_ID],
											isset($_SESSION['cur_folder']) ? $_SESSION['cur_folder'] : 0, 
											isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_NAME'] : $_SESSION['PROJECT_NAME']);
recursive_show_activity_folders($_SESSION['PROJECT_ID'], isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0, $_SESSION['ACTIVITY_NAME'], $_SESSION[SESSION_ID]);										
printf(ARCHIVER_END);

?>