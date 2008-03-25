<?php

if (!MAIN)
  exit(0);

require_once('./define_member.php');
require_once('./define_session.php');

function member_project_list()
{
  $test = sql_query(MEMBER_SQL_LIST_ALL)
  foreach($tab = sql_fetch_array($test))
    {
	  $answer = $answer . sprintf(MEMBER_LIST, $tab[0], $tab[1]);
	}
}


?>