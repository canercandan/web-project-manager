<?php

if (!MAIN)
  exit(0);

require_once('./define_member_activity.php');

function	put_to_member_activity($id_act, $id_user)
{
  sql_query(sprintf(SQL_ADD_MEMBER_ACTIVITY,
		    sql_real_escape_string($id_act),
		    sql_real_escape_string($id_user)));
}

function	update_member_activity($id_act, $id_user, $work, $admin)
{
  printf(SQL_UPDATE_MEMBER_ACTIVITY,
	 sql_real_escape_string($admin),
	 sql_real_escape_string($work),
	 sql_real_escape_string($id_user),
	 sql_real_escape_string($id_act));
  sql_query(sprintf(SQL_UPDATE_MEMBER_ACTIVITY,
		    sql_real_escape_string($admin),
		    sql_real_escape_string($work),
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_act)));
}

function	remove_member_activity($id_act, $id_user)
{
  sql_query(sprintf(SQL_REMOVE_MEMBER_ACTIVITY,
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_act)));
}

function	get_member_project_activity($id_act, $id_proj, $last)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT_ACT,
			   sql_real_escape_string($id_act), sql_real_escape_string($id_proj),
			   sql_real_escape_string($id_act),
			   sql_real_escape_string($id_act), sql_real_escape_string($id_proj),
			   sql_real_escape_string($id_act)));
  printf(MEMBER_POST_SELECT, POST_SELECT);
  if (!sql_num_rows($res))
    return (0);
  while (($tab = sql_fetch_array($res)))
    {
      printf(MEMBER_ELEM_PROJECT,
	     $last,
	     $tab[0],
	     0,
	     htmlentities($tab[1]),
	     htmlentities($tab[2]),
	     htmlentities($tab[3]),
	     htmlentities($tab[4]),
	     htmlentities($tab[5]));
      $last++;
    }
  return ($last);
}

function	get_member_activity($id_act, $id_proj, $last)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_ACTIVITY,
			   sql_real_escape_string($id_proj),
			   sql_real_escape_string($id_act)));
  printf(MEMBER_POST_SELECT, POST_SELECT);
  if (!sql_num_rows($res))
    return (0);
  while (($tab = sql_fetch_array($res)))
    {
      printf(MEMBER_ELEM_ACTIVITY,
	     $tab[0],
	     0,
	     0,
	     htmlentities($tab[1]),
	     htmlentities($tab[2]),
	     htmlentities($tab[3]),
	     htmlentities($tab[4]),
	     MEMBER_POST_LEVEL,
	     htmlentities($tab[5]),
	     MEMBER_POST_WORK,
	     htmlentities($tab[6]),
	     htmlentities($tab[7]),
	     MEMBER_POST_LIST_KEY,
	     $last,
	     POST_KEY_ACT_ID);
      $last++;
    }
  return ($last);
}

?>