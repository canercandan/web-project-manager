<?php

if (!MAIN)
  exit(0);

require_once('./define_member.php');

function member_project_list()
{
  $test = sql_query(MEMBER_SQL_LIST_ALL);
  $answer = sprintf(MEMBER_PROJECT_BEGIN); 
  while ($tab = sql_fetch_array($test))
    {
	  $answer = $answer . sprintf(MEMBER_LIST_PROJECT, $tab[0]);
	}
  $answer = $answer . sprintf(MEMBER_PROJECT_END);
  printf($answer);
}

?>