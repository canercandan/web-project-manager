<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');
require_once('./function_sql.php');

//$link = sql_connect(SQL_HOST, SQL_USR, SQL_PASSWD);
//sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
printf('<home>
	  <mesg>Presentation de TechWEB</mesg>
	</home>');
printf(XML_FOOTER);
//sql_close($link);

?>