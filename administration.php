<?php

define('MAIN', 1);

require_once('./define_admin.php');
require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_admin.php');
require_once('./define_session.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
printf(ADMIN_BEGIN);
if (true || (isset($_SESSION[ADMIN_MENU])
	     && $_SESSION[ADMIN_MENU] == ADMIN_LOCATION))
  {
    include('add_location.php');
  }
 else
   {
     include('add_title.php');
   }
printf(ADMIN_END);
printf(XML_FOOTER);
?>
