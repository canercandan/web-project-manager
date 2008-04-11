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
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
else
  printf(XML_HEADER, XML_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
  printf(SESSION_DESTROY, DESTROY);
printf('<home>
	  <mesg>Home page of TechWEB</mesg>
	  <location name="location">
	    <item id="1" name="Strasbourg" />
	    <item id="2" name="Paris" />
	  </location>
	  <title name="title">
	    <item id="1" name="Developpeur" />
	    <item id="2" name="Architect" />
	  </title>
	</home>');
printf(XML_FOOTER);
sql_close($link);

?>