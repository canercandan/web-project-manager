<?php

if (!MAIN)
  exit(0);

require_once('./function_sql.php');
require_once('define_project.php');
require_once('function_activity.php');
require_once('function_misc.php');

function print_projects_list($id_user)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_PROJECT,
			   sql_real_escape_string($id_user),
			   sql_real_escape_string($id_user)));
  printf(PROJECT_BEGIN);
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(PROJECT_ITEM, (isset($_SESSION['PROJECT_ID']) && $_SESSION['PROJECT_ID'] == $tab[1] ? 1 : 0), htmlentities($tab[0] == "" ? UNNAMED_PROJECT : $tab[0]), htmlentities($tab[1]));
      }
  printf(PROJECT_END);
}

function check_project($id_user, $id_project)
{
  $res = SQL_QUERY(sprintf(SQL_CHECK_PROJECT,
			   sql_real_escape_string($id_project),
			   sql_real_escape_string($id_user),
			   sql_real_escape_string($id_user)));
  if (sql_num_rows($res))
    {
      $name = sql_result($res,0, 0);
      return ($name == "" ? UNNAMED_PROJECT : $name);
    }
  else
    return (null);
}

function check_admin_for_project($id_project)
{
  printf(ADMIN,1);
}

function check_admin_create_project()
{
  printf(ADMIN,1);
}

function	project_delete($id_usr, $id_project)
{
  $res = sql_query(sprintf(SQL_CHECK_AUTOR_PROJECT,
			   sql_real_escape_string($id_project),
			   sql_real_escape_string($id_usr)));
  if (!sql_num_rows($res))
    return (0);
  sql_query(sprintf(SQL_DELETE_PROJECT,
		    sql_real_escape_string($id_project)));
  sql_query(sprintf(SQL_DELETE_PROJECT_MEMBER,
		    sql_real_escape_string($id_project)));
  sql_query(sprintf(SQL_DELETE_PROJECT_ACTIVITY,
		    sql_real_escape_string($id_project)));
  return (1);
}

?>