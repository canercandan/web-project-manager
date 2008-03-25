<?php

if (!MAIN)
  exit(0);

require_once('./define_member_project.php');

function	put_to_member($id_user, $id_project)
{
  $res = sql_query(sprintf(SQL_CHECK_IN_PROJ),
		   sql_real_escape_string($id_user),
		   sql_real_escape_string($id_project));
  if (!sql_num_rows($res))
    sql_query(sprintf(SQL_INSERT_MEMBER,
		      sql_real_escape_string($id_project),
		      sql_real_escape_string($id_user)));
}

function	update_member_proj($id_user, $id_project, $role)
{
  sql_query(sprintf(SQL_UPDATE_PROJECT_MEMBER,
		    sql_real_escape_string($role),
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_project)));
}

?>