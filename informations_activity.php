<?php

require_once('./define_activity.php');
require_once('./function_activity.php');

printf(INFORMATION_ACTIVITY_BEGIN);
get_activity_informations($_SESSION['ACTIVITY_ID']);
printf(INFORMATION_ACTIVITY_END);
?>