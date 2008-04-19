<?php

if (!MAIN)
  exit(0);

require_once('./define_agenda.php');

function	agenda_select_minute()
{
  printf(MINUTE_START, MINUTE_NAME);
  for ($i = 0; $i <= 59; $i++)
    printf(DATE_ITEM, $i);
  printf(MINUTE_END);
}

function	agenda_select_hour()
{
  printf(HOUR_START, HOUR_NAME);
  for ($i = 0; $i <= 23; $i++)
    printf(DATE_ITEM, $i);
  printf(HOUR_END);
}

function	agenda_select_day()
{
  printf(DAY_START, DAY_NAME);
  for ($i = 1; $i <= 31; $i++)
    printf(DATE_ITEM, $i);
  printf(DAY_END);
}

function	agenda_select_month()
{
  printf(MONTH_START, MONTH_NAME);
  for ($i = 1; $i <= 12; $i++)
    printf(DATE_ITEM, $i);
  printf(MONTH_END);
}

function	agenda_select_year()
{
  printf(YEAR_START, YEAR_NAME);
  $ys = date('Y') - 20;
  $ye = date('Y') + 20;
  for ($i = $ys; $i <= $ye; $i++)
    printf(DATE_ITEM, $i);
  printf(YEAR_END);
}

function	agenda_date($view)
{
  $time = mktime($_GET[HOUR_NAME], $_GET[MINUTE_NAME], 0,
		 $_GET[MONTH_NAME], $_GET[DAY_NAME], $_GET[YEAR_NAME]);
  if ($view == VIEW_YEAR)
    return (date('Y', $time));
  if ($view == VIEW_MONTH)
    return (date('m', $time));
  if ($view == VIEW_DAY)
    return (date('d', $time));
  if ($view == VIEW_HOUR)
    return (date('H', $time));
  if ($view == VIEW_MINUTE)
    return (date('i', $time));
  return (0);
}

function	agenda_get_res($res)
{
  while ((list($subject, $body, $date) = sql_fetch_array($res)))
    {
      $year = strtok($date, DELIMIT_DATE);
      $month = strtok(DELIMIT_DATE);
      $day = strtok(DELIMIT_DATE);
      $hour = strtok(DELIMIT_DATE);
      $minute = strtok(DELIMIT_DATE);
      printf(EVENT_ITEM, $year, $month, $day, $hour, $minute, $subject, $body);
    }
}

function	agenda_get_year()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date(VIEW_YEAR)),
			   '%',
			   '%',
			   '%',
			   sql_real_escape_string($_GET[PROJ_ID])));
  if (!sql_num_rows($res))
    return (-1);
  agenda_get_res($res);
  return (0);
}

function	agenda_get_month()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date(VIEW_YEAR)),
			   sql_real_escape_string(agenda_date(VIEW_MONTH)),
			   '%',
			   '%',
			   sql_real_escape_string($_GET[PROJ_ID])));
  if (!sql_num_rows($res))
    return (-1);
  agenda_get_res($res);
  return (0);
}

function	agenda_get_week()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date(VIEW_YEAR)),
			   sql_real_escape_string(agenda_date(VIEW_MONTH)),
			   '%',
			   '%',
			   sql_real_escape_string($_GET[PROJ_ID])));
  if (!sql_num_rows($res))
    return (-1);
  agenda_get_res($res);
  return (0);
}

function	agenda_get_day()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date(VIEW_YEAR)),
			   sql_real_escape_string(agenda_date(VIEW_MONTH)),
			   sql_real_escape_string(agenda_date(VIEW_DAY)),
			   '%',
			   sql_real_escape_string($_GET[PROJ_ID])));
  if (!sql_num_rows($res))
    return (-1);
  agenda_get_res($res);
  return (0);
}

function	agenda_get_hours()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date(VIEW_YEAR)),
			   sql_real_escape_string(agenda_date(VIEW_MONTH)),
			   sql_real_escape_string(agenda_date(VIEW_DAY)),
			   sql_read_escape_string(agenda_date(VIEW_HOUR)),
			   sql_real_escape_string($_GET[PROJ_ID])));
  if (!sql_num_rows($res))
    return (-1);
  agenda_get_res($res);
  return (0);
}

function	agenda_add_event()
{
  $date = sprintf(DATE_FMT, $_POST[YEAR_NAME], $_POST[MONTH_NAME],
		  $_POST[DAY_NAME], $_POST[HOUR_NAME], $_POST[MINUTE_NAME]);
  if (sql_query(sprintf(SQL_AGENDA_ADD_EVENT,
			sql_real_escape_string($_POST[PROJ_ID]),
			sql_real_escape_string($_SESSION[SESSION_ID]),
			sql_real_escape_string($date),
			sql_real_escape_string($_POST[EVENT_SUBJECT]),
			sql_real_escape_string($_POST[EVENT_BODY]))))
    return (EVENT_OK);
  return (EVENT_ERR);
}

?>