<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_passwd.php');
require_once('./define_session.php');
require_once('./define_usr.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
session_name(SESS_NAME);
session_start();

if ($_POST)
  {
    $error = passwd_check();
    if ($error == 1)
      passwd_send();
  }
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSIN[SESSION_LEVEL], $_SESSION[SESSION_ID]);

if ($_POST)
  {
    if ($error != 1)
      {
	    printf(PASSWD_BEGIN);
        printf(PASSWD_ERROR, $error);
		printf(PASSWD_LOGIN, PASSWD_POST_LOGIN, $_POST[PASSWD_POST_LOGIN]);
		printf(PASSWD_EMAIL, PASSWD_POST_EMAIL, $_POST[PASSWD_POST_EMAIL]);
		printf(PASSWD_END);
      }
    else
		printf(PASSWD_CONGRATULATION_MESS);
  }
if (!$_POST)
  {
    printf(PASSWD_BEGIN);
    printf(PASSWD_LOGIN, PASSWD_POST_LOGIN, "");
    printf(PASSWD_EMAIL, PASSWD_POST_EMAIL, "");
	printf(PASSWD_END);
  }
printf(XML_FOOTER);
sql_close($link);

?>