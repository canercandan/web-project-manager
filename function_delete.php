<?php

if (!MAIN)
  exit(0);

require_once('./define_delete.php');
require_once('./define_phorum.php');

function	remove_member_project($id_project, $id_usr)
{
  $res = sql_query(sprintf(SQL_GET_ACT_PROJ,
			   sql_real_escape_string($id_project)));
  if (sql_num_rows($res))
    while (($tab = sql_fetch_array($res)))
      remove_member_activity($tab[0], $id_usr);
  sql_query(sprintf(SQL_DELETE_ONE_MEMBER_PROJECT,
		    sql_real_escape_string($id_project),
		    sql_real_escape_string($id_usr)));
  sql_query(sprintf(PHORUM_DELETE_USER_PERMISSIONS,
		    sql_real_escape_string($id_usr),
		    sql_real_escape_string($id_project
					   + PHORUM_PROJECT_ID)));
}

function	remove_member_activity($id_activity, $id_usr)
{
  $res = sql_query(sprintf(SQL_GET_ACT_ACT,
			   sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while (($tab = sql_fetch_array($res)))
      remove_member_activity($tab[0], $id_usr);
  sql_query(sprintf(SQL_DELETE_ONE_MEMBER_ACT,
		    sql_real_escape_string($id_activity),
		    sql_real_escape_string($id_usr)));
  sql_query(sprintf(PHORUM_DELETE_USER_PERMISSIONS,
		    sql_real_escape_string($id_usr),
		    sql_real_escape_string($id_activity
					   + PHORUM_ACTIVITY_ID)));
}

function	delete_activity($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_ACT_ACT,
			   sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while (($tab = sql_fetch_array($res)))
      delete_activity($tab[0]);
  sql_query(sprintf(SQL_DELETE_ONE_ACT,
		    sql_real_escape_string($id_activity)));
  sql_query(sprintf(SQL_DELETE_ACT_FROM_ACT_MEMBER,
		    sql_real_escape_string($id_activity)));
  sql_query(sprintf(SQL_DELETE_ACT_DEPENDANCE,
		    sql_real_escape_string($id_activity),
		    sql_real_escape_string($id_activity)));
  sql_query(sprintf(PHORUM_DELETE_PERMISSIONS,
		    sql_real_escape_string($id_activity
					   + PHORUM_ACTIVITY_ID)));
}

function	delete_project($id_project)
{
  $res = sql_query(sprintf(SQL_GET_ACT_PROJ,
			   sql_real_escape_string($id_project)));
  if (sql_num_rows($res))
    while (($tab = sql_fetch_array($res)))
      delete_activity($tab[0]);
  sql_query(sprintf(SQL_DELETE_MEMBER_PROJECT,
		    sql_real_escape_string($id_project)));
  sql_query(sprintf(SQL_DELETE_PROJECT,
		    sql_real_escape_string($id_project)));
  sql_query(sprintf(PHORUM_DELETE_PERMISSIONS,
		    sql_real_escape_string($id_project
					   + PHORUM_PROJECT_ID)));
}

?>