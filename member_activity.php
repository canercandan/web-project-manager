<?php

require_once('./function_member_activity.php');
require_once('./function_misc.php');

if (isset($_POST[BTN_DOWN]) && isset($_POST[POST_SELECT]))
  {
    foreach($_POST[POST_SELECT] as $value)
      put_to_member_activity($_SESSION['ACTIVITY_ID'], $value);
  }
 else if (isset($_POST[BTN_UPDATE_MEMBER]) && isset($_POST[POST_SELECT]))
   {
     foreach($_POST[POST_SELECT] as $value)
       update_member_activity($_SESSION['ACTIVITY_ID'],
			      $_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_ID],
			      (isset($_POST[MEMBER_POST_WORK][$value]) ? 1 : 0),
			      (isset($_POST[MEMBER_POST_LEVEL][$value]) ? 1 : 0),
			      $_POST[MEMBER_POST_HOUR][$value]);
   }
 else if (isset($_POST[BTN_UP]) && isset($_POST[POST_SELECT]))
   {
     foreach($_POST[POST_SELECT] as $value)
       remove_member_activity($_SESSION['ACTIVITY_ID'],
			      $_POST[MEMBER_POST_LIST_KEY][$value][POST_KEY_ACT_ID]);
   }
get_full_years();
get_full_days();
get_full_months();
printf(MEMBER_ACTIVITY_BEGIN);
do_we_show_work($_SESSION['ACTIVITY_ID']);
printf(MEMBER_BTN_UP, BTN_UP);
printf(MEMBER_BTN_DOWN, BTN_DOWN);
printf(MEMBER_BTN_UPDATE, BTN_UPDATE);
printf(MEMBER_LIST_PROJECT_BEGIN);
$last = get_member_project_activity($_SESSION['ACTIVITY_ID'],
				    $_SESSION['PROJECT_ID'],
				    0);
printf(MEMBER_LIST_PROJECT_END);
printf(MEMBER_LIST_ACTIVITY_BEGIN);
$last = get_member_activity($_SESSION['ACTIVITY_ID'],
			    $_SESSION['PROJECT_ID'],
			    $last);
printf(MEMBER_LIST_ACTIVITY_END);
printf(MEMBER_ACTIVITY_END);

?>