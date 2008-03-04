<?php

if (!MAIN)
  exit(0);

require_once('./define_profil.php');

function profil_check()
{
  $test = sql_query(sprintf(PROFIL_SQL_SELECT,
			    sql_real_escape_string($_SESSION['USER_LOGIN'])));
  $tab = sql_fetch_array($test);
  if ($tab[1] == 'NULL' || $tab[2] == 'NULL'
      || $tab[3] == 'NULL' || $tab[4] == 'NULL'
      || $tab[5] == 'NULL' || $tab[6] == '0')
    return (0);
  else
    return (1);
}

function select_location()
{
  $test = sql_query(sprintf(PROFIL_SQL_LOCATION));
  while ($row = sql_fetch_array($test, MYSQL_NUM))
    {
      printf(PROFIL_FIELD_ITEM, $row[0], $row[1]);
    }
}

function select_title()
{
  $test = sql_query(sprintf(PROFIL_SQL_TITLE));
  while ($row = sql_fetch_array($test, MYSQL_NUM))
    {
      printf(PROFIL_FIELD_ITEM, $row[0], $row[1]);
    }
}

function select_profil()
{
  $test = sql_query(sprintf(PROFIL_SQL_PROFIL, $_SESSION['USER_ID']));
  $tab = sql_fetch_array($test);
  if ($tab[2] != 'NULL')
	$_POST[PROFIL_POST_NAME] = $tab[2];
  if ($tab[3] != 'NULL')
	$_POST[PROFIL_POST_FNAME] = $tab[3];
  if ($tab[4] != 'NULL')
	$_POST[PROFIL_POST_FPHONE] = $tab[4];
  if ($tab[5] != 'NULL')
	$_POST[PROFIL_POST_MPHONE] = $tab[5];
  $_POST[PROFIL_POST_ADDRESS] = $tab[7];
  printf(PROFIL_FIELD_LOCATION_BEGIN, PROFIL_POST_LOCATION, $tab[1]);
  select_location();
  printf(PROFIL_FIELD_LOCATION_END);
  printf(PROFIL_FIELD_TITLE_BEGIN, PROFIL_POST_TITLE, $tab[6]);
  select_title();
  printf(PROFIL_FIELD_TITLE_END);
}

function profil_update()
{
  sql_query(sprintf(PROFIL_SQL_UPDATE,
					sql_real_escape_string($_POST[PROFIL_POST_LOCATION]),
					sql_real_escape_string($_POST[PROFIL_POST_NAME]), 
					sql_real_escape_string($_POST[PROFIL_POST_FNAME]),
					sql_real_escape_string($_POST[PROFIL_POST_FPHONE]), 
					sql_real_escape_string($_POST[PROFIL_POST_MPHONE]),
					sql_real_escape_string($_POST[PROFIL_POST_TITLE]),
					sql_real_escape_string($_POST[PROFIL_POST_ADDRESS]),
					sql_real_escape_string($_SESSION['USER_ID'])));
}

?>