<?php

if (!MAIN)
  exit(0);

function get_roles()
{
}

function delete_title($title_id)
{
  sql_query(sprintf(SQL_DELETE_TITLE, sql_real_escape_string($title_id)));
  sql_query(sprintf(SQL_DELETE_PROFIL_TITLE, sql_real_escape_string($title_id)));
}

function add_title($title_name)
{
  sql_query(sprintf(SQL_ADD_TITLE, sql_real_escape_string($title_name)));
}

function update_title($title_name, $title_id)
{
}

function get_user_level()
{
  $test = sql_query(SQL_USER_LEVEL);
  printf(ADMIN_LEVEL_BEGIN);
  while ($row = sql_fetch_array($test))
    {
      printf(ADMIN_ITEM, $row[0], $row[1]);
    }
  printf(ADMIN_LEVEL_END);
}

function get_location()
{
  printf(LOCATION_START);
  $res = sql_query(SQL_GET_LOCATIONS);
  while ($tab = sql_fetch_array($res))
    {
      printf(LOCATION_ITEM, POST_LOCATION_MODNAME, POST_LOCATION_MODADDR,
	     POST_LOCATION_MODID, htmlentities($tab[0]),
	     htmlentities($tab[1]), htmlentities($tab[2]));
    }
  printf(LOCATION_END);
}

function add_location($name, $addr)
{
  sql_query(sprintf(SQL_ADD_LOCATION, sql_real_escape_string($name),
		    sql_real_escape_string($addr)));
}

function update_location($id_loc, $name, $addr)
{
  sql_query(sprintf(SQL_UPDATE_LOCATION, sql_real_escape_string($name),
		    sql_real_escape_string($addr),
		    sql_real_escape_string($id_loc)));
}

function get_title()
{
  $res = sql_query(SQL_GET_TITLES);
  while ($tab = sql_fetch_array($res))
    {
      printf(TITLE_ITEM, SUBMIT_MOD_TITLE, SUBMIT_DEL_TITLE,
	     POST_TITLE_ID, POST_TITLE_NAME, $tab[0], htmlentities($tab[1]));
    }
}

function update_member()
{
  if ($_POST[ADMIN_BUTTON_SELECT])
    {
	  foreach($_POST[ADMIN_BUTTON_SELECT] as $id)
        {
		  $login = sql_real_escape_string($_POST[ADMIN_POST_LOGIN][$id]);
		  $name = sql_real_escape_string($_POST[ADMIN_POST_NAME][$id]);
		  $fname = sql_real_escape_string($_POST[ADMIN_POST_FIRST][$id]);
		  $level = sql_real_escape_string($_POST[ADMIN_USR_LEVEL][$id]);
		  sql_query(sprintf(SQL_MEMBER_UPDATE_USR, $login, $level, $id));
		  sql_query(sprintf(SQL_MEMBER_UPDATE_PROFIL, $name, $fname, $id));
	    }
	}
}

function delete_member()
{
  if ($_POST[ADMIN_BUTTON_SELECT])
    {
	  foreach($_POST[ADMIN_BUTTON_SELECT] as $id)
        {
		  sql_query(sprintf(SQL_DELETE_USR_PROFIL, $id));
		  sql_query(sprintf(SQL_DELETE_USR, $id));
	    }
	}
}

?>