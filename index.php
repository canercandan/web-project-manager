<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
printf('<home>
	  <mesg>Presentation de TechWEB</mesg>
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