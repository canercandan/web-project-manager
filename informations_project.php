<?php

require_once('./define_project.php');
require_once('./function_project.php');

if (isset($_POST[BTN_UPDATE]))
{
	$err = update_project($_SESSION['PROJECT_ID'], $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB], 
	$_POST[POST_PROJECT_DAY], $_POST[POST_PROJECT_MONTH], $_POST[POST_PROJECT_YEAR]);
	if (!$err)
	{	
		header(sprintf('Location:root.php?project_id=%s&update=project', $_SESSION['PROJECT_ID']));
		exit(0);
	}
}
if (isset($_GET['update']) && $_GET['update'] == 'project')
{
	printf(XML_MESG, ACTIVITY_UPDATED);
}

printf(INFORMATION_PROJECT_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_information_project($_SESSION['PROJECT_ID']);
printf(INFORMATION_PROJECT_END);

?>