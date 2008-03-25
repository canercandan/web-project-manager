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
	  $answer = sprintf(MEMBER_NAME, $answer, $tab[0]);
	}
  $answer = sprintf(MEMBER_PROJECT_END, $answer);
  printf($answer);
}

function member_list_charge()
{
  $test = sql_query(MEMBER_SQL_LIST_CHARGE);
  $answer = sprintf(MEMBER_CHARGE_BEGIN);
  while ($tab = sql_fetch_array($test))
    {
      $answer = sprintf(MEMBER_LIST, $answer, $tab[0], $tab[1]);
    }
  $answer = sprintf(MEMBER_CHARGE_END, $answer);
  printf($answer);
}

function member_list_answer()
{
  $test = sql_query(MEMBER_SQL_LIST_ANSWER);
  $answer = sprintf(MEMBER_ANSWER_BEGIN);
  while($tab = sql_fetch_array($test))
	{
      $answer = sprintf(MEMBER_LIST, $answer, $tab[0], $tab[1]);
	}
  $answer = sprintf(MEMBER_ANSWER_END);
  printf($answer);
}

?>