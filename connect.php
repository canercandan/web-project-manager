<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
      $error = sprintf(XML_ERROR, USR_ERROR_PASSWD_NOTFOUND);
    else if (!$login = usr_login_check())
      $error = sprintf(XML_ERROR, USR_ERROR_LOGIN);
    else if ($login && (!$passwd = usr_passwd_check()))
      $error = sprintf(XML_ERROR, USR_ERROR_PASSWD);
    else
      {
	$_SESSION['USER_ID'] = usr_session_id();
	$_SESSION['USER_LOGIN'] = $_POST[USR_POST_LOGIN];
	if (!($profil = usr_profil_check()))
	  header(HEADER_LOCATION_PROFIL);
	else
	  header(HEADER_LOCATION_MEMBER);
	exit(0);
      }
  }
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
if (!$_GET['ok'])
  {
    printf(USR_CONNECT_BEGIN);
    printf(USR_FIELD_LOGIN,
	   USR_POST_LOGIN, $_POST[USR_POST_LOGIN]);
    printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
    printf($error);
    printf(USR_CONNECT_END);
  }
printf(XML_FOOTER);
sql_close($link);

?>