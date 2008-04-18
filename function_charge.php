<?php

if (!MAIN)
  exit(0);
require_once('./define_charge.php');

function info_list_project()
{
  $test = sql_query(INFO_SQL_LIST_PROJECT);
  $answer = sprintf(INFO_PROJECT_BEGIN); 
  while ($tab = sql_fetch_array($test))
    {
	  $answer = sprintf(INFO_PROJECT, $answer, $tab[0]);
	}
  $answer = sprintf(INFO_PROJECT_END, $answer);
  printf($answer);
}

function info_list_charge()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_CHARGE,
							$_SESSION['ACTIVITY_ID']));
  $answer = sprintf(INFO_CHARGE_BEGIN);
  while ($tab = sql_fetch_array($test))
    {
      $answer = sprintf(INFO_CHARGE, $answer, $tab[0], $tab[1], $tab[2]);
    }
  $answer = sprintf(INFO_CHARGE_END, $answer);
  printf($answer);
}

function info_list_answer()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_ANSWER, $_SESSION[SESSION_ID]));
  $answer = sprintf(INFO_ANSWER_BEGIN);
  while($tab = sql_fetch_array($test))
	{
      $answer = sprintf(INFO_ANSWER, $answer, $tab[0], $tab[1]);
	}
  $answer = sprintf(INFO_ANSWER_END, $answer);
  printf($answer);
}

function info_list_average()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_AVERAGE, 
							$_SESSION['ACTIVITY_ID']));
  $sum = 0;
  $number = 0;
  while($value = sql_fetch_array($test))
    {
	  if ($value[0] > 0)
	    {
	      $sum = $sum + $value[0];
		  $number = $number + 1;
		}
	}
  if (number > 0)
    printf(INFO_AVERAGE, ($sum / $number));
  else
    printf(INFO_AVERAGE, "0");
}

function info_list_add()
{
  if ($_POST[INFO_BUTTON_ADD])
    {
      foreach($_POST[INFO_POST_USR] as $name)
	    {
	      $test = sql_query(sprintf(INFO_SQL_LIST_ADD,
								    sql_real_escape_string($_POST[INFO_POST_USR]),
									sql_real_escape_string($_POST[INFO_POST_ACTIVITY]),
									0));
		}
	}
}

function info_list_del()
{
  if ($_POST[INFO_BUTTON_DEL])
    {
      foreach($_POST[INFO_POST_USR] as $name)
	    {
	      $test = sql_query(sprintf(INFO_SQL_LIST_DEL, 
									sql_real_escape_string($_POST[INFO_POST_USR]),
									sql_real_escape_string($_POST[INFO_POST_ACTIVITY])));
		}
	}
}

function info_list_update()
{
  if ($_POST[INFO_BUTON_UPDATE])
    {
	  foreach($_POST[INFO_POST_NAME] as $name)
	    {
	      $test = sql_query(sprintf(INFO_SQL_LIST_UPDATE, 
									sql_real_escape_string($_POST[INFO_POST_ANSWER]),
									sql_real_escape_string($_POST[INFO_POST_USR]),
									sql_real_escape_string($_POST[INFO_POST_ACTIVITY])));
		}
	}
}

?>