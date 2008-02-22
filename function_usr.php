<?php

require_once('./define_usr.php');
require_once('./function_sql.php');

function usr_login_check()
{
  $test = sql_query(sprintf(USR_SQL_SELECT_PASSWD, sql_real_escape_string($_POST[USR_POST_LOGIN])));
  if (sql_num_rows($test))
    return (1);
  return (0);
}

function usr_passwd_check()
{
  $test = sql_query(sprintf(USR_SQL_SELECT_PASSWD, sql_real_escape_string($_POST[USR_POST_LOGIN])));
  $passwd = sql_result($test, 0, 0);
  var_dump($passwd);
  if (strcmp(sha1($_POST[USR_POST_PASSWD]), $passwd) == 0)
    return (1);
  return (0);
}

function usr_repasswd_check()
{
  if (strcmp($_POST[USR_POST_PASSWD], $_POST[USR_POST_REPASSWD]) == 0)
    return (1);
  return (0);
}

function usr_email_check()
{
  if (ereg(USR_REGEX_EMAIL, $_POST[USR_POST_EMAIL]) != FALSE)
    return (1);
  return (0);
}

/*
function usr_select_location()
{
  $test = sql_query(sprintf(USR_SQL_SELECT_LOCATION_BEGIN));
  $item = sprintf(USR_FIELD_SELECT_LOCATION_BEGIN, USR_POST_LOCATION);
  $i = 0;
  while (sql_num_rows($test, $i, 0))
    {
      $item = sprintf(USR_XML_SELECT, $item, sprintf(USR_XML_ITEM, sql_num_rows($test, $i, 0), sql_num_rows($test, $i, 1)));
      $i++;
    }
  $item = sprintf(USR_XML_SELECT, $item, sprintf(USR_FIELD_SELECT_LOCATION_END));
  return ($item);
}

function usr_select_title()
{
  $test = sql_query(sprintf(USR_SQL_SELECT_TITLE_BEGIN));
  $item = sprintf(USR_FIELD_SELECT_TITLE_BEGIN, USR_POST_TITLE);
  $i = 0;
  while (sql_num_rows($test, $i, 0))
    {
      $item = sprintf(USR_XML_SELECT, $item, sprintf(USR_XML_ITEM, sql_num_rows($test, $i, 0), sql_num_rows($test, $i, 1)));
      $i++;
    }
  $item = sprintf(USR_XML_SELECT, $item, sprintf(USR_FIELD_SELECT_TITLE_END));
  return ($item);
}
*/

function usr_add()
{
  $login = usr_login_check();
  if ($login)
    printf(XML_ERROR, USR_ERROR_LOGIN_EXIST);
  $passwd = usr_repasswd_check();
  if (!$login && !$passwd)
    printf(XML_ERROR, USR_ERROR_REPASSWD);
  $email= usr_email_check();
  if (!$login && $passwd && !$email)
    printf(XML_ERROR, USR_ERROR_EMAIL);
  if (!$login && $passwd && $email)
    {
	  sql_query(sprintf(USR_SQL_ADD_USR, sql_real_escape_string($_POST[USR_POST_LOGIN]), 
						sha1(sql_real_escape_string($_POST[USR_POST_PASSWD])), sql_real_escape_string($_POST[USR_POST_EMAIL])));
	  $user = mysql_insert_id();
	  sql_query(sprintf(USR_SQL_ADD_PROFIL, $user));
	  return (1);
    }
  return (0);
}

function usr_connect()
{
  $login = usr_login_check();
  $passwd = usr_passwd_check();
  if (!$login)
    printf(XML_ERROR, USR_ERROR_LOGIN_EXIST);
  if ($login && !$passwd)
    printf(XML_ERROR, USR_ERROR_PASSWD);
  if ($login && $passwd)
    {
	  return (1);
    }
  return (0);
}

?>