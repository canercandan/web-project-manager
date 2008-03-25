<?php

require_once('./define_activity.php');
require_once('./function_activity.php');
require_once('./function_informations_activity.php');
require_once('./define_informations_activity.php');

if (isset($_GET['update']) && $_GET['update'] == 'activity')
{
	printf(XML_MESG, ACTIVITY_UPDATED);
}

printf(INFORMATION_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_new_activity_informations($_SESSION['ACTIVITY_ID']);



printf(INFORMATION_DEPENDANCE_ACTIVITY_BEGIN);
printf(ACTIVITY_LIST_START);
print_activities_list_dependance($_SESSION['PROJECT_ID'], 0, $_SESSION['ACTIVITY_ID']);
printf(ACTIVITY_LIST_END);
printf(INFORMATION_DEPENDANCE_ACTIVITY_END);

printf(INFORMATION_ACTIVITY_END);
?>