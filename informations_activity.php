<?php

require_once('./define_activity.php');
require_once('./function_activity.php');

if (isset($_POST[BTN_UPDATE]))
{
	var_dump($_POST);
}

printf(INFORMATION_ACTIVITY_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_activity_informations($_SESSION['ACTIVITY_ID']);
printf(INFORMATION_ACTIVITY_END);
?>