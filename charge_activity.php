<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');
require_once('./function_charge.php');
require_once('./define_session.php');
require_once('./define_charge.php');

printf(INFO_ACTIVITY_BEGIN);
if ($_SESSION[SESSION_LEVEL] != IS_A_WORKER)
  {
    info_list_add();
	info_list_del();
	info_list_project();
	info_list_charge();
	info_list_average();
  }
else
  {
    info_list_update();
    info_list_answer();
  }
printf(INFO_ACTIVITY_END);

?>