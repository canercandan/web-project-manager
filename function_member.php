<?php

if (!MAIN)
  exit(0);

require_once('./define_member.php');

function member_list_project()
{
  $test = sql_query(MEMBER_SQL_LIST_PROJECT);
  $answer = sprintf(MEMBER_PROJECT_BEGIN); 
  while ($tab = sql_fetch_array($test))
    {
	  $answer = $answer . sprintf(MEMBER_LIST_PROJECT, $tab[0]);
	}
  $answer = $answer . sprintf(MEMBER_PROJECT_END);
  printf($answer);
}

function member_list_charge()
{
  $test = sql_query(MEMBER_SQL_LIST_CHARGE);
  $answer = sprintf(MEMBER_CHARGE_BEGIN);
  while ($tab = sql_fetch_array($test))
    {
      $answer = $answer . sprintf(MEMBER_LIST_CHARGE, $tab[0], $tab[1], $tab[1]);
    }
  $answer = $answer . sprintf(MEMBER_CHARGE_END);
  printf($answer);
}

?>