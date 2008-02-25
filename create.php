<?php
define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
      $error = sprintf(XML_ERROR, USR_ERROR_PASSWD_NOTFOUND);
    else if (!$_POST[USR_POST_REPASSWD])
      $error = sprintf(XML_ERROR, USR_ERROR_REPASSWD_NOTFOUND);
    else if (!$_POST[USR_POST_EMAIL])
      $error = sprintf(XML_ERROR, USR_ERROR_EMAIL_NOTFOUND);
    else if ($login = usr_login_check())
      $error = sprintf(XML_ERROR, USR_ERROR_LOGIN_EXIST);
    else if (!$login && (!$passwd = usr_repasswd_check()))
      $error = sprintf(XML_ERROR, USR_ERROR_REPASSWD);
    else if (!$login && !$passwd && !($email = usr_email_check()))
      $error = sprintf(XML_ERROR, USR_ERROR_EMAIL);
    else
      {
	    usr_add();
		header(sprintf(HEADER_LOCATION_CREATE, $_POST[USR_POST_LOGIN]));
		exit(0);
      }
  }
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
 else
   printf(XML_HEADER, XML_TEMPLATE);
if ($_GET['ok'])
  {
    printf(USR_CONNECT_BEGIN);
    printf(XML_MESG, USR_MESG_CREATE_OK);
    printf(USR_FIELD_LOGIN, USR_POST_LOGIN);
    printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
    if (ereg('^[a-zA-Z0-9]*$', $_GET['login']))
      printf(USR_VALUE_LOGIN, $_GET['login']);
    printf(USR_CONNECT_END);
  }
 else
   {
     printf(USR_CREATE_BEGIN);
     printf(USR_FIELD_LOGIN, USR_POST_LOGIN);
     printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
     printf(USR_FIELD_REPASSWD, USR_POST_REPASSWD);
     printf(USR_FIELD_EMAIL, USR_POST_EMAIL);
     printf(USR_VALUE_LOGIN, $_POST[USR_POST_LOGIN]);
     printf(USR_VALUE_EMAIL, $_POST[USR_POST_EMAIL]);
     printf($error);
     printf(USR_CREATE_END);
   }
printf(XML_FOOTER);
sql_close($link);

?>