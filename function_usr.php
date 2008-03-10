<?php

require_once('./define_usr.php');

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

function usr_email_exist()
{
  $test = sql_query(sprintf(USR_SQL_EMAIL));
  while ($tab = sql_fetch_array($test))
    {
	  if (strcmp($_POST[USR_POST_EMAIL], $tab[0]) == 0)
	    return (1);
	}
  return(0);
}

function usr_profil_check()
{
  $test = sql_query(sprintf(USR_SQL_SELECT_PROFIL, $_SESSION[SESSION_ID]));
  $tab = sql_fetch_array($test);
  if ($tab[1] == 'NULL' || $tab[2] == 'NULL' || $tab[3] == 'NULL' || $tab[4] == 'NULL' || $tab[5] == 'NULL' || $tab[6] == '0')
	return (0);
  else
    return (1);
}

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

function usr_add()
{
  $passwd = passwd_generate();
  $header = sprintf(SEND_HEADER_TO, $_POST[USR_POST_LOGIN], $_POST[USR_POST_EMAIL]) . "\r\n" . sprintf(SEND_HEADER_FROM);
  $mail = @mail(sql_real_escape_string($_POST[USR_POST_EMAIL]), 
       SEND_SUBJECT, 
       sprintf(SEND_MESSAGE, 
	           sql_real_escape_string($_POST[USR_POST_LOGIN]), 
			   $passwd), 
	   $header);
  if ($mail == FALSE)
    return (0);
  else
    {
	   sql_query(sprintf(USR_SQL_ADD_USR, sql_real_escape_string($_POST[USR_POST_LOGIN]), 
		    sha1($passwd), sql_real_escape_string($_POST[USR_POST_EMAIL])));
	   $user = mysql_insert_id();
       sql_query(sprintf(USR_SQL_ADD_PROFIL, $user));
	   return (1);
	}
}

function usr_session_id()
{
  $test = sql_query(sprintf(USR_SQL_SESSION_ID, sql_real_escape_string($_POST[USR_POST_LOGIN])));
  if (sql_num_rows($test))
    return (sql_result($test, 0, 0));
  else
    return (0);
}

function session_create()
{
  $test = sql_query(sprintf(USR_SQL_SESSION, sql_real_escape_string($_POST[USR_POST_LOGIN])));
  $row = sql_fetch_array($test);
  $_SESSION[SESSION_ID] = usr_session_id();
  $_SESSION[SESSION_LOGIN] = $_POST[USR_POST_LOGIN];
  $_SESSION[SESSION_LOCATION] = $row[0];
  $_SESSION[SESSION_TITLE] = $row[1];
  $_SESSION[SESSION_NAME] = $row[2];
  $_SESSION[SESSION_FNAME] = $row[3];
  $_SESSION[SESSION_FPHONE] = $row[4];
  $_SESSION[SESSION_MPHONE] = $row[5];
  $_SESSION[SESSION_ADDRESS] = $row[6];
  $_SESSION[SESSION_LEVEL] = $row[7];
}

?>