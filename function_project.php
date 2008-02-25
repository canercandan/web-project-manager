<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');

function print_projects_list($id_user)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_PROJECT/*, sql_real_escape_string($id_user) */));
  printf(PROJECT_BEGIN);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(PROJECT_ITEM, $tab[0], $tab[1]);
      }
	printf(PROJECT_END);
}
  
?>