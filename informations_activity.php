<?php

require_once('./define_activity.php');
require_once('./function_activity.php');
require_once('./function_informations_activity.php');
require_once('./define_informations_activity.php');

if (isset($_GET['update']) && $_GET['update'] == 'activity')
{
	printf(XML_MESG, ACTIVITY_UPDATED);
}
if (isset($_SESSION['date_start']) &&isset($_SESSION['date_end']) && isset($_GET['error']) && $_GET['error'] == 'project_date')
{
	printf(XML_ERROR, sprintf(ERR_NEW_DATE_PROJECT, htmlentities($_SESSION['date_start']), htmlentities($_SESSION['date_end'])));
	unset($_SESSION['date_start']);
	unset($_SESSION['date_end']);
}
if (isset($_SESSION['date_start']) &&isset($_SESSION['date_end']) && isset($_GET['error']) && $_GET['error'] == 'date_order')
{
	printf(XML_ERROR, sprintf(ERR_NEW_DATE_ORDER, $_SESSION['date_start'], $_SESSION['date_end']));
	unset($_SESSION['date_start']);
	unset($_SESSION['date_end']);
}	

printf(INFORMATION_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_new_activity_informations($_SESSION['ACTIVITY_ID']);

printf(INFORMATION_DEPENDANCE_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
printf(ACTIVITY_LIST_START);
print_activities_list_dependance($_SESSION['PROJECT_ID'], 0, $_SESSION['ACTIVITY_ID']);
printf(ACTIVITY_LIST_END);
printf(INFORMATION_DEPENDANCE_ACTIVITY_END);

printf(INFORMATION_ACTIVITY_END);
?>