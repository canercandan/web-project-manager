<?php

if (!MAIN)
  exit(0);

require_once('./define_member_project.php');

function	put_to_member_project($id_user, $id_project)
{
  $res = sql_query(sprintf(SQL_CHECK_IN_PROJ,
			   sql_real_escape_string($id_user),
			   sql_real_escape_string($id_project)));
  if (!sql_num_rows($res))
    sql_query(sprintf(SQL_INSERT_MEMBER,
		      sql_real_escape_string($id_project),
		      sql_real_escape_string($id_user)));
}

function	update_member_project($id_user, $id_project, $role)
{
  sql_query(sprintf(SQL_UPDATE_PROJECT_MEMBER,
		    sql_real_escape_string($role),
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_project)));
}

function	remove_member_project($id_user, $id_project)
{
  sql_query(sprintf(SQL_REMOVE_PROJECT_MEMBER,
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_project)));
}

function	get_member_out_project($id_project, $last)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_OUT_PROJECT,
			   sql_real_escape_string($id_project)));
  printf(MEMBER_POST_SELECT, POST_SELECT);
  if (!sql_num_rows($res))
    return (0);
  while (($tab = sql_fetch_array($res)))
    {
      printf(MEMBER_ELEM_PROJ,
	     $last,
	     htmlentities($tab[0]),
	     0,
	     htmlentities($tab[1]),
	     htmlentities($tab[2]),
	     htmlentities($tab[3]),
	     htmlentities($tab[4]));
      $last++;
    }
  return ($last);
}

function	get_member_project($id_project, $last)
{
  printf(MEMBER_ROLE_LIST_BEGIN, POST_ROLE_LIST);
  $res = sql_query(SQL_GET_ROLE);
  if (!sql_num_rows($res))
    return (0);
  while (($tab = sql_fetch_array($res)))
    {
      printf(MEMBER_ROLE_ITEM,
	     htmlentities($tab[0]),
	     htmlentities($tab[1]));
    }
  printf(MEMBER_ROLE_LIST_END);
  printf(MEMBER_POST_SELECT, POST_SELECT);
  $res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT,
			   sql_real_escape_string($id_project)));
  if (!sql_num_rows($res))
    return (0);
  while (($tab = sql_fetch_array($res)))
    {
      printf(MEMBER_ELEM_PROJECT_PROJ,
	     htmlentities($tab[0]),
	     0,
	     0,
	     htmlentities($tab[1]),
	     htmlentities($tab[2]),
	     htmlentities($tab[3]),
	     POST_ROLE,
	     htmlentities($tab[4]),
	     htmlentities($tab[5]),
	     POST_LIST_KEY,
	     $last,
	     POST_KEY_ID);
      $last++;
    }
  return ($last);
}

?>