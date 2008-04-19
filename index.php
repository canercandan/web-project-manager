<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./define_session.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
session_name(SESS_NAME);
session_start();
header(HEADER_CONTENT_TYPE);
usr_level_check();
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
else
  printf(XML_HEADER, XML_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
  printf(SESSION_DESTROY, DESTROY);
printf(XML_FOOTER);
sql_close($link);

?>