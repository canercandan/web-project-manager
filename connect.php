<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');
require_once('./define_session.php');
session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
$ok = 0;
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
printf(USR_CONNECT_BEGIN);
printf(USR_FIELD_LOGIN, USR_POST_LOGIN);
printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
      printf(XML_ERROR, USR_ERROR_PASSWD_NOTFOUND);
    else
      $ok = usr_connect();
  }
printf(USR_CONNECT_END);
/*
if (ok)
  {
    $_SESSION[SESSION_LOGIN] = $_POST[USR_POST_LOGIN];
  }
*/
printf(XML_FOOTER);
sql_close($link);

?>