<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./define_admin.php');
require_once('./function_admin.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
 else
  printf(XML_HEADER, XML_TEMPLATE);
printf(ADMIN2_BEGIN);
$test = mysql_query(ADMIN_MEMBER_SELECT);
printf(MEMBER_LIST_BEGIN);
get_user_level();
printf(MEMBER_BUTTON_SELECT, ADMIN_BUTTON_SELECT);
printf(MEMBER_BUTTON_UPDATE, ADMIN_BUTTON_UPDATE);
printf(MEMBER_BUTTON_DELETE, ADMIN_BUTTON_DELETE);
while ($row = mysql_fetch_array($test, MYSQL_NUM))
  {
    printf(ADMIN_MEMBER, $row[0],
	   ADMIN_POST_LOGIN, $row[1],
	   ADMIN_POST_NAME, $row[2],
	   ADMIN_POST_FIRST, $row[3],
	   ADMIN_USR_LEVEL, $row[4]);
  }
printf(MEMBER_LIST_END);
printf(ADMIN2_END);
printf(XML_FOOTER);
sql_close($link);

?>