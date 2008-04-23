<?php

if (!MAIN)
  exit(0);

require_once('function_wl_suggestion.php');


printf(WL_SUGGESTION_HEAD, BTN_DEL, BTN_UP, BTN_UNSET, SELECT, BTN_ADD);
show_list_act_suggestion($_SESSION['ACTIVITY_ID'], 1);
printf(WL_SUGGESTION_TAIL);
?>