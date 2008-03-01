<?php

require_once('./define_project.php');
require_once('./function_project.php');

printf(MEMBER_PROJECT_BEGIN);
printf(MEMBER_BTN_UP);
printf(MEMBER_BTN_DOWN);
printf(MEMBER_BTN_SUBMIT);
printf(MEMBER_LIST_BEGIN);
get_member_out_project($_SESSION[PROJECT_ID]);
printf(MEMBER_LIST_END);

printf(MEMBER_LIST_PROJECT_BEGIN);
get_member_project($_SESSION[PROJECT_ID]);
printf(MEMBER_LIST_PROJECT_END);

printf(MEMBER_PROJECT_END)
?>