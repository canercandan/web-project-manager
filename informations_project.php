<?php

require_once('./define_project.php');
require_once('./function_project.php');


if (isset($_GET['update']) && $_GET['update'] == 'project')
{
	printf(XML_MESG, ACTIVITY_UPDATED);
}

printf(INFORMATION_PROJECT_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_information_project($_SESSION['PROJECT_ID']);
printf(INFORMATION_PROJECT_END);

?>