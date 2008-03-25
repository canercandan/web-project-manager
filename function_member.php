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

function member_list_add()
{
  if ($_POST[MEMBER_BUTTON_SELECT_ADD])
    {
      foreach($_POST[MEMBER_ADD_NAME] as $name)
	    {
	      $test = sql_query(MEMBER_SQL_LIST_ADD, 
					        sql_real_escape_string($_POST[MEMBER_ADD_NAME]),
					        sql_real_escape_string($_POST[MEMBER_ADD_ACTIVITY]),
							0);
		}
	}
}

function member_list_del()
{
  if ($_POST[MEMBER_BUTTON_SELECT_DEL])
    {
      foreach($_POST[MEMBER_ADD_NAME] as $name)
	    {
	      $test = sql_query(MEMBER_SQL_LIST_DEL, 
					        sql_real_escape_string($_POST[MEMBER_ADD_NAME]),
					        sql_real_escape_string($_POST[MEMBER_ADD_ACTIVITY]));
		}
	}
}

?>