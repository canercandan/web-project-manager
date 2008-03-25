<?php

require_once('./function_member_project.php');
require_once('./function_misc.php');

if (isset($_POST[BTN_DOWN]) && isset($_POST[POST_SELECT]))
  {
    foreach($_POST[POST_SELECT] as $value)
      put_to_member_project($value, $_SESSION['PROJECT_ID']);
  }
 else if (isset($_POST[BTN_UP]) && isset($_POST[POST_SELECT]))
   {
     foreach ($_POST[POST_SELECT] as $value)
       remove_member_project($_POST[POST_LIST_KEY][$value][POST_KEY_ID],
			     $_SESSION['PROJECT_ID']);
   }
 else if (isset($_POST[BTN_UPDATE]) && isset($_POST[POST_SELECT]))
   {
     foreach($_POST[POST_SELECT] as $value)
       update_member_project($_POST[POST_LIST_KEY][$value][POST_KEY_ID],
			     $_SESSION['PROJECT_ID'],
			     $_POST[POST_ROLE][$value]);
   }
get_full_years();
get_full_days();
get_full_months();
printf(MEMBER_PROJECT_BEGIN);
printf(MEMBER_BTN_UP, BTN_UP);
printf(MEMBER_BTN_DOWN, BTN_DOWN);
printf(MEMBER_BTN_SUBMIT, BTN_SUBMIT);
printf(MEMBER_BTN_UPDATE, BTN_UPDATE);
printf(MEMBER_LIST_BEGIN);
$last = get_member_out_project($_SESSION['PROJECT_ID'], 0);
printf(MEMBER_LIST_END);
printf(MEMBER_LIST_PROJECT_BEGIN);
$last = get_member_project($_SESSION['PROJECT_ID'], $last);
printf(MEMBER_LIST_PROJECT_END);
printf(MEMBER_PROJECT_END);

?>