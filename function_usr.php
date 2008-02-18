<?php

require_once('./define_usr.php');

function usr_field()
{
  $login = sprintf(USR_XML_FIELD_LOGIN, USR_POST_LOGIN);
  $passwd = sprintf(USR_XML_FIELD_PASSWD, USR_POST_PASSWD);
  $email = sprintf(USR_XML_FIELD_EMAIL, USR_POST_EMAIL);
  $field = sprintf(USR_XML_FIELD, $login, $passwd, $email);
  return (sprintf(USR_XML_CREATE, $field));
}

function usr_login_check()
{
  $test = mysql_query(sprintf(USR_SQL_SELECT_LOGIN, $_POST[USR_POST_LOGIN]));
  if (@mysql_num_rows($test))
    return (1);
  return (0);
}

function usr_email_check()
{
  $email = ereg(USR_REGEX_EMAIL, $_POST[USR_POST_EMAIL]);
  if ($email == FALSE)
    return (1);
  return (0);
}

function usr_add()
{
  $test = usr_login_check();
  if ($test)
    {
      $doc = sprintf(USR_XML_DOC, sprintf(USR_XML_ERROR, USR_XML_ERROR_LOGIN));
      return ($doc);
    }
  $test = usr_email_check();
  if ($test)
    {
      $doc = sprintf(USR_XML_DOC, sprintf(USR_XML_ERROR, USR_XML_ERROR_EMAIL));
      return ($doc);
    }
  $doc = sprintf(USR_XML_DOC, sprintf(USR_XML_MESG, USR_XML_MESG_OK));
  return ($doc);
}

?>