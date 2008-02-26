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

function profil_update()
{
  sql_query(sprintf(PROFIL_SQL_UPDATE, $_SESSION['USER_ID'],
					sql_real_escape_string($_POST[PROFIL_POST_LOCATION]), 
					sql_real_escape_string($_POST[PROFIL_POST_NAME]), 
					sql_real_escape_string($_POST[PROFIL_POST_FNAME]),
					sql_real_escape_string($_POST[PROFIL_POST_FPHONE]), 
					sql_real_escape_string($_POST[PROFIL_POST_MPHONE]),
					sql_real_escape_string($_POST[PROFIL_POST_TITLE]), 
					sql_real_escape_string($_POST[PROFIL_POST_ADDRESS])));
}

?>