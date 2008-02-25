<?php

if (!MAIN)
  exit(0);

require_once('./define_profil.php');
require_once('./function_sql.php');
session_name(SESS_NAME);
session_start();

function profil_check()
{
  $test = sql_query(sprintf(PROFIL_SQL_SELECT_PROFIL, sql_real_escape_string($_SESSION['USER_LOGIN'])));
  $tab = sql_fetch_array($test);
  if ($tab[1] == 'NULL' || $tab[2] == 'NULL' || $tab[3] == 'NULL' || $tab[4] == 'NULL' || $tab[5] == 'NULL' || $tab[6] == '0')
	return (0);
  else
    return (1);
}
?>