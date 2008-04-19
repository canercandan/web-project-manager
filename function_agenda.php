<?php

if (!MAIN)
  exit(0);

require_once('./define_agenda.php');

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

function	agenda_date($date, $view)
{
  if ($view == VIEW_YEAR)
    {
      if ($date)
	return (sprintf('%04d', $date));
      return (date('Y'));
    }
  if ($view == VIEW_MONTH)
    {
      if ($date)
	return (sprintf('%02d', $date));
      return (date('m'));
    }
  if ($view == VIEW_DAY)
    {
      if ($date)
	return (sprintf('%02d', $date));
      return (date('d'));
    }
  if ($view == VIEW_HOUR)
    {
      if ($date)
	return (sprintf('%02d', $date));
      return (date('H'));
    }
}

function	agenda_get_year()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date($_GET[YEAR_NAME],
							      VIEW_YEAR)),
			   '%',
			   '%',
			   '%',
			   sql_real_escape_string($_SESSION[PROJECT_ID])));
  if (!sql_num_rows($res))
    return (-1);
  while ((list($subject, $body) = sql_fetch_array($res)))
    printf(EVENT_ITEM, $subject, $body);
  return (0);
}

function	agenda_get_month()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date($_GET[YEAR_NAME],
							      VIEW_YEAR)),
			   sql_real_escape_string(agenda_date($_GET[MONTH_NAME],
							      VIEW_MONTH)),
			   '%',
			   '%',
			   sql_real_escape_string($_SESSION[PROJECT_ID])));
  if (!sql_num_rows($res))
    return (-1);
  while ((list($subject, $body, $date) = sql_fetch_array($res)))
    {
      $year = strtok($date, DELIMIT_DATE);
      $month = strtok(DELIMIT_DATE);
      $day = strtok(DELIMIT_DATE);
      $hour = strtok(DELIMIT_DATE);
      printf(EVENT_ITEM, $year, $month, $day, $hour, $subject, $body);
    }
  return (0);
}

function	agenda_get_week()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date($_GET[YEAR_NAME],
							      VIEW_YEAR)),
			   sql_real_escape_string(agenda_date($_GET[MONTH_NAME],
							      VIEW_MONTH)),
			   '%',
			   '%',
			   sql_real_escape_string($_SESSION[PROJECT_ID])));
  if (!sql_num_rows($res))
    return (-1);
  while ((list($subject, $body) = sql_fetch_array($res)))
    printf(EVENT_ITEM, $subject, $body);
  return (0);
}

function	agenda_get_day()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date($_GET[YEAR_NAME],
							      VIEW_YEAR)),
			   sql_real_escape_string(agenda_date($_GET[MONTH_NAME],
							      VIEW_MONTH)),
			   sql_real_escape_string(agenda_date($_GET[DAY_NAME],
							      VIEW_DAY)),
			   '%',
			   sql_real_escape_string($_SESSION[PROJECT_ID])));
  if (!sql_num_rows($res))
    return (-1);
  while ((list($subject, $body) = sql_fetch_array($res)))
    printf(EVENT_ITEM, $subject, $body);
  return (0);
}

function	agenda_get_hours()
{
  $res = sql_query(sprintf(SQL_AGENDA_GET,
			   sql_real_escape_string(agenda_date($_GET[YEAR_NAME],
							      VIEW_YEAR)),
			   sql_real_escape_string(agenda_date($_GET[MONTH_NAME],
							      VIEW_MONTH)),
			   sql_real_escape_string(agenda_date($_GET[DAY_NAME],
							      VIEW_DAY)),
			   sql_read_escape_string(agenda_date($_GET[HOUR_NAME],
							      VIEW_HOUR)),
			   sql_real_escape_string($_SESSION[PROJECT_ID])));
  if (!sql_num_rows($res))
    return (-1);
  while ((list($subject, $body) = sql_fetch_array($res)))
    printf(EVENT_ITEM, $subject, $body);
  return (0);
}

?>