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
  {
    header(LOCATION_NOTLOG);
    exit(-1);
  }
if (!$_GET[PROJ_ID] && !$_POST[PROJ_ID] && !$_SESSION[PROJECT_ID])
  {
    header(LOCATION_NOPROJ);
    exit(-1);
  }
if ($_POST[PROJ_ID])
  {
    header(sprintf(LOCATION_DATE,
		   ADD_EVENT,
		   (agenda_add_event() == EVENT_ERR ? EVENT_ERR : EVENT_OK),
		   PROJ_ID, $_POST[PROJ_ID],
		   MINUTE_NAME, $_POST[MINUTE_NAME],
		   HOUR_NAME, $_POST[HOUR_NAME],
		   DAY_NAME, $_POST[DAY_NAME],
		   MONTH_NAME, $_POST[MONTH_NAME],
		   YEAR_NAME, $_POST[YEAR_NAME]));
    exit(0);
  }
if (!$_GET[MINUTE_NAME] && !$_GET[HOUR_NAME] && !$_GET[DAY_NAME]
    && !$_GET[MONTH_NAME] && !$_GET[YEAR_NAME] && !$_GET[PROJ_ID])
  header(sprintf(LOCATION_DATE,
		 ADD_EVENT, ($_GET[ADD_EVENT] ? $_GET[ADD_EVENT] : 0),
		 PROJ_ID, $_SESSION[PROJECT_ID],
		 MINUTE_NAME, date('i'),
		 HOUR_NAME, date('H'),
		 DAY_NAME, date('d'),
		 MONTH_NAME, date('m'),
		 YEAR_NAME, date('Y')));
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
printf(SESSION_DESTROY, DESTROY);
printf(AGENDA_START,
       ($_GET[ADD_EVENT] ? $_GET[ADD_EVENT] : 0),
       $_GET[PROJ_ID],
       ($_GET[GET_VIEW] ? $_GET[GET_VIEW] : VIEW_MONTH),
       agenda_date(VIEW_YEAR),
       agenda_date(VIEW_MONTH),
       agenda_date(VIEW_DAY),
       agenda_date(VIEW_HOUR),
       agenda_date(VIEW_MINUTE));
agenda_select_minute();
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