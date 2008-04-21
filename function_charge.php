<?php
if (!MAIN)
  exit(0);

require_once('./define_charge.php');

function info_list_project()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_PROJECT, $_SESSION[ACTIVITY_ID]));
  printf(INFO_PROJECT_BEGIN);
  while ($tab = sql_fetch_array($test))
    printf(INFO_PROJECT, $tab[0]);
  printf(INFO_PROJECT_END);
  printf($answer);
}

function info_list_charge()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_CHARGE, $_SESSION[ACTIVITY_ID]));
  printf(INFO_CHARGE_BEGIN);
  while ($tab = sql_fetch_array($test))
    printf(INFO_CHARGE, $tab[0], $tab[1], $tab[2]);
  printf(INFO_CHARGE_END);
  printf($answer);
}

function info_list_answer()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_ANSWER, $_SESSION[SESSION_ID]));
  printf(INFO_ANSWER_BEGIN);
  while($tab = sql_fetch_array($test))
    printf(INFO_ANSWER, $tab[0], $tab[1]);
  printf(INFO_ANSWER_END);
  printf($answer);
}

function info_list_average()
{
  $test = sql_query(sprintf(INFO_SQL_LIST_AVERAGE, $_SESSION[ACTIVITY_ID]));
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
  if ($number > 0)
    printf(INFO_AVERAGE, ($sum / $number));
  else
    printf(INFO_AVERAGE, "0");
}

function info_list_add()
{
  if ($_POST[INFO_BUTTON_ADD])
    foreach($_POST[INFO_POST_USR] as $name)
      sql_query(sprintf(INFO_SQL_LIST_ADD,
			sql_real_escape_string($_POST[INFO_POST_USR]),
			sql_real_escape_string($_POST[INFO_POST_ACTIVITY]),
			0));
}

function info_list_del()
{
  if ($_POST[INFO_BUTTON_DEL])
    foreach($_POST[INFO_POST_USR] as $name)
      sql_query(sprintf(INFO_SQL_LIST_DEL,
			sql_real_escape_string($_POST[INFO_POST_USR]),
			sql_real_escape_string($_POST[INFO_POST_ACTIVITY])));
}

function info_list_update()
{
  if ($_POST[INFO_BUTON_UPDATE])
    foreach($_POST[INFO_POST_NAME] as $name)
      sql_query(sprintf(INFO_SQL_LIST_UPDATE,
			sql_real_escape_string($_POST[INFO_POST_ANSWER]),
			sql_real_escape_string($_POST[INFO_POST_USR]),
			sql_real_escape_string($_POST[INFO_POST_ACTIVITY])));
}

?>