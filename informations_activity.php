<?php

require_once('./define_activity.php');
require_once('./function_activity.php');

if (isset($_POST[BTN_UPDATE]))
{
	update_activity($_SESSION['ACTIVITY_ID'], $_POST[POST_MOD_ACTIVITY_NAME], $_POST[POST_MOD_ACTIVITY_DESCRIB], 
		$_POST[POST_ACT_DAY_START], $_POST[POST_MONTH_START], $_POST[POST_ACT_YEAR_START], 
		$_POST[POST_MOD_ACTIVITY_CHARGE]);
	header('Location:root.php?update=activity');
			exit(0);
}
if (isset($_GET['update']) && $_GET['update'] ==)
printf(INFORMATION_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_activity_informations($_SESSION['ACTIVITY_ID']);
printf(INFORMATION_ACTIVITY_END);
?>