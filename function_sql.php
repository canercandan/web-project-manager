<?php

require_once("./define_sql.php");

function	sql_connect($host, $user, $passwd)
{
  $link = @mysql_connect($host, $user, $passwd);
  if (!$link)
    die(mysql_error());
  return ($link);
}

function	sql_close($link)
{
  mysql_close($link);
}

function	sql_select_db($name, $link)
{
  $db = @mysql_select_db($name, $link);
  if (!$db)
    die(sprintf(ERR_SQL_SELECT_DB, mysql_error()));
}

function	sql_query($q)
{
  $res = @mysql_query($q);
  if (!$res)
    die(sprintf(ERR_SQL_QUERY, mysql_error()));
  return ($res);
}

function	sql_result($res, $row, $field)
{
  return (mysql_result($res, $row, $field));
}

function	sql_insert_id()
{
  return (mysql_insert_id());
}

function	sql_num_rows($res)
{
  return (mysql_num_rows($res));
}

function	sql_fetch_array($res)
{
  return (mysql_fetch_array($res));
}

function	sql_fetch_assoc($res)
{
  return (mysql_fetch_assoc($res));
}

function	sql_free_result($res)
{
  mysql_free_result($res);
}

function	sql_real_escape_string($s)
{
  return (mysql_real_escape_string($s));
}

?>