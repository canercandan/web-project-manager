<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./define_session.php');
require_once('./function_sql.php');
require_once('./function_agenda.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
session_name(SESS_NAME);
session_start();
if (!$_SESSION[SESSION_ID])
  header("Location: connect.php");
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
printf(SESSION_DESTROY, DESTROY);
printf(AGENDA_START,
       ($_GET[GET_VIEW] ? $_GET[GET_VIEW] : VIEW_MONTH),
       agenda_date($_GET[YEAR_NAME], VIEW_YEAR),
       agenda_date($_GET[MONTH_NAME], VIEW_MONTH),
       agenda_date($_GET[DAY_NAME], VIEW_DAY),
       agenda_date($_GET[HOUR_NAME], VIEW_HOUR));
agenda_select_hour();
agenda_select_day();
agenda_select_month();
agenda_select_year();
printf(EVENT_START);
if ($_GET[GET_VIEW] == VIEW_DAY)
  agenda_get_day();
 else if ($_GET[GET_VIEW] == VIEW_MONTH)
   agenda_get_month();
 else if ($_GET[GET_VIEW] == VIEW_YEAR)
   agenda_get_year();
 else
   agenda_get_month();
printf(EVENT_END);
printf(AGENDA_END);
printf(XML_FOOTER);
sql_close($link);

?>