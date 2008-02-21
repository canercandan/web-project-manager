<?php

/*
** a completer par viven
*/
session_start();

define('MAIN', 1);

require_once('./define_config.php');
require_once('function_sql.php');

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);

/*
** TODO Project list
*/

// if ....  projet selectionne
// right window = project window (project menu, activity list ... )
include('project.php');

printf(XML_FOOTER);

?>