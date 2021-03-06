<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_passwd.php');
require_once('./function_member.php');
require_once('./define_session.php');
require_once('./define_member.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
if (!$_SESSION[SESSION_ID])
  {
    header(LOCATION_EXIT);
    exit(0);
  }
if ($_GET[DESTROY])
  {
    session_destroy();
    header(HEADER_CONNECT);
    exit(0);
  }
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
printf(SESSION_DESTROY, DESTROY);
printf(MEMBER_BEGIN);
printf(MEMBER_END);
printf(XML_FOOTER);
sql_close($link);

?>