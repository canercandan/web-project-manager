<?php

if (!MAIN)
  exit(0);

require_once('define_activity.php');
require_once('function_activity.php');

printf(ACTIVITY_WINDOW_BEGIN);

if (isset($_SESSION[ACTIVITY_NAME]))
  {
    printf('<name>%s</name>', $_SESSION[ACTIVITY_NAME]);
  }
 else
   {
     printf('<name>%s</name>', UNKNOWED_ACTIVITY);
   }

if (true || (isset($_SESSION[ACTIVITY_MENU]) && $_SESSION[ACTIVITY_MENU] == MEMBER_ACTIVITY))
  {
    include('member_activity.php');
  }
if (true)
  {
    include('informations_activity.php');
  }

printf(ACTIVITY_WINDOW_END);

?>