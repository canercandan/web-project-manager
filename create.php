<?php
define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');
require_once('./function_passwd.php');
require_once('./define_passwd.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if ($_POST)
  {
    if (!$_POST[USR_POST_LOGIN])
      $error = sprintf(XML_ERROR, USR_ERROR_LOGIN_NOTFOUND);
    else if (!$_POST[USR_POST_EMAIL])
      $error = sprintf(XML_ERROR, USR_ERROR_EMAIL_NOTFOUND);
    else if ($login = usr_login_check())
      $error = sprintf(XML_ERROR, USR_ERROR_LOGIN_EXIST);
    else if (!$login && !($email = usr_email_check()))
      $error = sprintf(XML_ERROR, USR_ERROR_EMAIL);
	else if ($send = usr_email_exist())
	  $error = sprintf(XML_ERROR, USR_ERROR_EMAIL_EXIST);
    else
      {
		usr_add();
		header(sprintf(HEADER_LOCATION_CREATE, $_POST[USR_POST_LOGIN]));
		exit(0);
      }
  }

header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE, 0);
 else
   printf(XML_HEADER, XML_TEMPLATE, 0);
if ($_GET['ok'])
  {
    printf(USR_CONNECT_BEGIN);
    printf(XML_MESG, USR_MESG_CREATE_OK);
    printf(USR_FIELD_LOGIN,
	   USR_POST_LOGIN,
	   (ereg('^[a-zA-Z0-9]*$', $_GET['login']) ? $_GET['login'] : ''));
    printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
    printf(USR_CONNECT_END);
  }
 else
   {
     printf(USR_CREATE_BEGIN);
     printf(USR_FIELD_LOGIN,
	    USR_POST_LOGIN, $_POST[USR_POST_LOGIN]);
     printf(USR_FIELD_EMAIL,
	    USR_POST_EMAIL, $_POST[USR_POST_EMAIL]);
     printf($error);
     printf(USR_CREATE_END);
   }
printf(XML_FOOTER);
sql_close($link);

?>