<?php
define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

if (session_name() == SESS_NAME)
  session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
printf(USR_CREATE_BEGIN);
printf(USR_FIELD_LOGIN, USR_POST_LOGIN);
printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
printf(USR_FIELD_REPASSWD, USR_POST_REPASSWD);
printf(USR_FIELD_EMAIL, USR_POST_EMAIL);
printf(USR_CREATE_END);
if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
	  printf(XML_ERROR, USR_ERROR_PASSWD_NOTFOUND);
	else 
	  {
	    if (!$_POST[USR_POST_REPASSWD])
		  printf(XML_ERROR, USR_ERROR_REPASSWD_NOTFOUND);
		else
		  {
			if (!$_POST[USR_POST_EMAIL])
			  printf(XML_ERROR, USR_ERROR_EMAIL_NOTFOUND);
			else
			  usr_add();
		  }
	  }
  }
printf(XML_FOOTER);
sql_close($link);

?>