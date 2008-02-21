<?php

require_once('./define_activity.php');
require_once('function_activity.php');

printf(MEMBER_ACTIVITY_BEGIN);

printf(MEMBER_LIST_PROJECT_BEGIN);
get_member_project_activity(1 /*$_SESSION[ACTIVITY_ID]*/, 0 /*$_SESSION[PROJECT_ID]*/);
printf(MEMBER_LIST_PROJECT_END);

printf(MEMBER_LIST_ACTIVITY_BEGIN);
get_member_activity(1 /*$_SESSION[ACTIVITY_ID]*/, 0 /*$_SESSION[PROJECT_ID]*/);
printf(MEMBER_LIST_ACTIVITY_END);

printf(MEMBER_ACTIVITY_END)
?>