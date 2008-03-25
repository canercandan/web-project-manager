<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_project.php');
require_once('./define_project.php');
require_once('./define_session.php');

session_name(SESS_NAME);
session_start();
$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);
include('post_manager.php');
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE, $_SESSION[SESSION_LEVEL]);
else
  printf(XML_HEADER, XML_TEMPLATE, $_SESSION[SESSION_LEVEL]);
printf(SESSION_DESTROY, DESTROY);

include('get_manager.php');

check_admin_create_project();

// if ....  projet selectionne
// right window = project window (project menu, activity list ... )

if (isset($_SESSION['ROOT_MENU']))
  {
    if ($_SESSION['ROOT_MENU'] == ADD_PROJECT) 
      include('add_project.php');
  }
 else if (isset($_SESSION['PROJECT_ID']))
   {
     printf(MENU_PROJECT);
     include('project.php');
   }
 else
   {
     printf(MENU_PROJECT);
   }

print_projects_list($_SESSION[SESSION_ID]);
printf(XML_FOOTER);

?>