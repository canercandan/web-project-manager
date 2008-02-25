<?php

/*
** a completer par viven
*/

define('MAIN', 1);

require_once('./define_config.php');
require_once('function_sql.php');
require_once('function_project.php');
require_once('define_project.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);

print_projects_list(0);

// if ....  projet selectionne
// right window = project window (project menu, activity list ... )
include('project.php');

printf(XML_FOOTER);

?>