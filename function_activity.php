<?php

if (!MAIN)
  exit(0);

require_once('./define_activity.php');

function get_activity_work($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_UNDERACT_WORK, sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity),
			   sql_real_escape_string($id_activity)));
  if (!sql_num_rows($res))
    {
      return (0);
    }
  else
    {
      $work = 0;
      while ($tab = sql_fetch_array($res))
	{
	  if ($tab[3] >= 0)
	    {
	      $work += $tab[3];
		  if ($tab[0] != $id_activity)
			printf('<activity_work><id>%d</id><name>%s</name><charge>%d</charge><work>%d</work><percent>%d</percent></activity_work>',
		     $tab[0],
		     $tab[1],
		     $tab[2],
		     $tab[3],
		     ($tab[3] * 100) / $tab[2]);
	    }
	  else
	    {
	      printf('<activity_work><id>%d</id><name>%s</name><charge>%d</charge>',
		     $tab[0],
		     $tab[1],
		     $tab[2]);
	      $tab[3] = get_activity_work($tab[0]);
	      $work += $tab[3];
	      printf('<work>%d</work><percent>%d</percent></activity_work>',
		     $tab[3],
		     ($tab[3] * 100) / $tab[2]);
	    }
	}
      return ($work);
    }
}

function get_activity_informations($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_ACTIVITY_INFORMATIONS, sql_real_escape_string($id_activity)));
  $tab = sql_fetch_array($res);
  printf('<name>%s</name><describ>%s</describ>', $tab[0], $tab[1]);
  printf('<activity_work><id>%d</id><name>%s</name><charge>%d</charge>',
	 $id_activity,
	 $tab[0],
	 $tab[2]);
  $work = get_activity_work($id_activity);
  printf('<work>%d</work><percent>%d</percent></activity_work>',
	 $work,
	 ($work * 100) / $tab[2]);
}

function get_member_activity($id_activity, $id_project)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_ACTIVITY, sql_real_escape_string($id_project),
			   sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(MEMBER_ELEM_ACTIVITY, $tab[0], $tab[1], $tab[2], $tab[3], $tab[4], $tab[5]);
      }
}

function get_member_project_activity($id_activity, $id_project)
{
  $res = sql_query(sprintf(SQL_GET_MEMBER_PROJECT, sql_real_escape_string($id_project),
			   sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(MEMBER_ELEM_PROJECT, $tab[0], $tab[1], $tab[2], $tab[3], $tab[4]);
      }
}

function add_activities($id_project, $id_activity, $name, $describ, $charge)
{
  sql_query(sprintf(SQL_ADD_ACTIVITY, sql_real_escape_string($id_project),
		    sql_real_escape_string($id_activity),
		    sql_real_escape_string($name),
		    sql_real_escape_string($charge),
		    sql_real_escape_string($describ)));
  update_charge($id_activity);
}

function update_charge($id_activity)
{
  if ($id_activity != 0)
    {
      $res = sql_query(sprintf(SQL_GET_CHARGE, sql_real_escape_string($id_activity)));
      sql_query(sprintf(SQL_UPDATE_CHARGE, sql_result($res, 0, 0), sql_real_escape_string($id_activity)));
      $res = sql_query(sprintf(SQL_GET_PARENT_ID, sql_real_escape_string($id_activity)));
      update_charge(sql_result($res, 0, 0));
    }
}

function print_activities_list($id_project, $id_activity)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES, sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
	printf(ACTIVITY_START);
	printf(ACTIVITY_TITLE, $tab[1]);
	printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$tab[0]] : 0);
	printf(ACTIVITY_ID, $tab[0]);
	print_activities_list($id_project, $tab[0]);
	printf(ACTIVITY_END);
      }
}

?>