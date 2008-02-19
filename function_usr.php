<?php

require_once('./define_usr.php');

function usr_login_check()
{
  $test = mysql_query(sprintf(USR_SQL_SELECT_LOGIN, $_POST[USR_POST_LOGIN]));
  if (@mysql_num_rows($test))
    return (1);
  return (0);
}

function usr_passwd_check()
{
  $test = mysql_query(sprintf(USR_SQL_SELECT_PASSWD, $_POST[USR_POST_LOGIN]));
  $passwd = @mysql_num_rows($test);
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

function usr_add()
{
  $login = usr_login_check();
  if ($login)
    printf(USR_ERROR, USR_ERROR_LOGIN);
  $passwd = usr_repasswd_check();
  if (!$login && !$passwd)
    printf(USR_ERROR, USR_ERROR_REPASSWD);
  $email= usr_email_check();
  if (!$login && $passwd && !$email)
    printf(USR_ERROR, USR_ERROR_EMAIL);
  if (!$login && $passwd && $email)
    printf(USR_MESG, USR_MESG_CREATE_OK);
}

function usr_connect()
{
  $login = usr_login_check();
  $passwd = usr_passwd_check();
  if (!login)
    printf(USR_ERROR, USR_ERROR_LOGIN);
  if (!passwd)
    printf(USR_ERROR, USR_ERROR_PASSWD);
  if (login && passwd)
    printf(USR_MESG, USR_MESG_CONNECT_OK);
}

?>