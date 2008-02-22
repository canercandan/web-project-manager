<?php

require_once('./define_activity.php');
require_once('./function_activity.php');

printf(INFORMATION_ACTIVITY_BEGIN);
if ($_GET['activity_infos'])
  get_activity_informations($_GET['activity_infos']);
printf(INFORMATION_ACTIVITY_END);
?>