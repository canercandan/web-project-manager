<?php

require_once('./define_project.php');
require_once('./function_informations_project.php');
require_once('./define_informations_project.php');




if (isset($_GET['update']) && $_GET['update'] == 'project')
{
	printf(XML_MESG, PROJECT_UPDATED);
}

printf(INFORMATION_PROJECT_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_new_information_project($_SESSION['PROJECT_ID']);
printf(INFORMATION_PROJECT_END);

?>