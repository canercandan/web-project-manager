<?php

require_once('./define_project.php');
require_once('./function_project.php');

printf(INFORMATION_PROJECT_BEGIN);
get_information_project($_SESSION['PROJECT_ID']);
printf(INFORMATION_PROJECT_END);

?>