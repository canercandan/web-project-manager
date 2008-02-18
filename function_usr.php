<?php
session_start();
require_once("define_usr.php");

function usr_login_check()
{
  $test = mysql_query(sprintf(USR_SQL_SELECT_LOGIN, $_POST[USR_POST_LOGIN]));
  if (@mysql_num_rows($test))
    return (1);
  return (0);
}

function usr_email_check()
{
	$email = ereg("^[[:alpha:]]{1}[[:alnum:]]*((\.|_|-)[[:alnum:]]+)*@[[:alpha:]]{1}[[:alnum:]]*((\.|-)[[:alnum:]]+)*(\.[[:alpha:]]{2,4})$", $_POST[USR_POST_EMAIL]);
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
