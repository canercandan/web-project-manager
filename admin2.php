<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./define_admin.php');
require_once('./function_admin.php');
require_once('./function_sql.php');
require_once('./function_usr.php');
require_once('./define_session.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if (!$_SESSION[SESSION_ID]
    || ($_SESSION[SESSION_LEVEL] != IS_A_ROOT
	&& $_SESSION[SESSION_LEVEL] != IS_AN_ADMIN))
  {
    session_destroy();
    header(LOCATION_EXIT);
    exit(0);
  }

if($_POST)
  {
    if ($_POST[ADMIN_BUTTON_DELETE])
      delete_member();
    else if ($_POST[ADMIN_BUTTON_UPDATE])
      update_member();
    header(LOCATION_ADMIN);
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
printf(ADMIN_BEGIN);
printf(ADMIN_USR_DELETE, USR_DELETE);
printf(MEMBER_LIST_BEGIN);
get_user_level();
printf(MEMBER_BUTTON_SELECT, ADMIN_BUTTON_SELECT);
printf(MEMBER_BUTTON_UPDATE, ADMIN_BUTTON_UPDATE);
printf(MEMBER_BUTTON_DELETE, ADMIN_BUTTON_DELETE);
$test = mysql_query(ADMIN_MEMBER_SELECT);
while ($row = mysql_fetch_array($test, MYSQL_NUM))
  {
    printf(ADMIN_MEMBER, $row[0],
		   ADMIN_POST_LOGIN, $row[1],
		   ADMIN_POST_NAME, $row[2],
		   ADMIN_POST_FIRST, $row[3],
		   ADMIN_USR_LEVEL, $row[4]);
  }
printf(MEMBER_LIST_END);
printf(ADMIN_END);
printf(XML_FOOTER);
sql_close($link);

?>