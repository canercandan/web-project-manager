<?php

require_once('./define_activity.php');
require_once('./function_activity.php');

if (isset($_POST[BTN_UPDATE]))
{
	$err = update_activity($_SESSION['PROJECT_ID'], $_SESSION['ACTIVITY_ID'], $_POST[POST_MOD_ACTIVITY_NAME], $_POST[POST_MOD_ACTIVITY_DESCRIB], 
		$_POST[POST_ACT_DAY_START], $_POST[POST_MONTH_START], $_POST[POST_ACT_YEAR_START], 
		$_POST[POST_MOD_ACTIVITY_CHARGE]);
	if (!$err)
	{	
		header(sprintf('Location:root.php?activity_id=%s&update=activity', $_SESSION['ACTIVITY_ID']));
		exit(0);
	}
}
if (isset($_GET['update']) && $_GET['update'] == 'activity')
{
	printf(XML_MESG, ACTIVITY_UPDATED);
}

printf(INFORMATION_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_activity_informations($_SESSION['ACTIVITY_ID']);
printf(INFORMATION_ACTIVITY_END);
?>