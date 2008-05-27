<?php

if (!MAIN)
  exit(0);

require_once('./define_member_activity.php');
require_once('./define_phorum.php');

function	put_to_member_activity($id_act, $id_user)
{
  sql_query(sprintf(SQL_ADD_MEMBER_ACTIVITY,
		    sql_real_escape_string($id_act),
		    sql_real_escape_string($id_user)));
  sql_query(sprintf(PHORUM_ADD_USER_PERMISSIONS,
		    sql_real_escape_string($id_user),
		    sql_real_escape_string($id_act + PHORUM_ACTIVITY_ID + PHORUM_GENERAL_ID),
		    PHORUM_PERM_READ | PHORUM_PERM_REPLY |
		    PHORUM_PERM_EDIT | PHORUM_PERM_CREATE |
		    PHORUM_PERM_ATTACH_FILE));
}

function	do_we_show_work($id_act)
{
  $res = sql_query(sprintf(SQL_GET_ACT_ACT, sql_real_escape_string($id_act)));
  printf("<show_work>%d</show_work>", !sql_num_rows($res));
}

function	update_member_activity($id_act, $id_user, $work,
				       $admin, $hour)
{
  if ($_SESSION['update_member_activity'])
    {
      sql_query(sprintf(SQL_UPDATE_MEMBER_ACTIVITY,
			sql_real_escape_string($admin),
			sql_real_escape_string($work),
			sql_real_escape_string($id_user),
			sql_real_escape_string($id_act)));
    }
  update_work_hour_member($id_act, $id_user, $hour, 1);
}

function	update_work_hour_member($id_activity, $id_usr, $hour, $full)
{
  if ($id_activity)
    {
      if ($_SESSION['update_member_activity'] || $id_usr == $_SESSION[SESSION_ID])
	{
	  if (!$full)
	    {
	      $res = sql_query(sprintf(SQL_GET_FIXED_WORK_MEMBER,
				       sql_real_escape_string($id_activity),
				       sql_real_escape_string($id_usr)));
	      $hour = sql_result($res, 0, 0);
	    }
	  sql_query(sprintf(SQL_UPDATE_WORK_HOUR_MEMBER,
			    sql_real_escape_string($hour),
			    sql_real_escape_string($id_usr),
			    sql_real_escape_string($id_activity)));
	  $res = sql_query(sprintf(SQL_GET_PARENT_ID, sql_real_escape_string($id_activity)));
	  update_work_hour_member(sql_result($res, 0, 0), $id_usr, $hour, 0);
	}
    }
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
	     MEMBER_POST_HOUR,
	     htmlentities($tab[7]),
	     htmlentities($tab[8]),
	     MEMBER_POST_LIST_KEY,
	     $last,
	     POST_KEY_ACT_ID);
      $last++;
    }
  return ($last);
}

?>