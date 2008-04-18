<?php

define('MAIN', 1);
require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');
require_once('./function_charge.php');
require_once('./define_session.php');
require_once('./define_charge.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
session_name(SESS_NAME);
session_start();
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE, 0, 0);
else
  printf(XML_HEADER, XML_TEMPLATE, 0, 0);

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
printf(XML_FOOTER);
sql_close($link);
?>