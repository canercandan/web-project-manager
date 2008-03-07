<?php

if (!MAIN)
  exit(0);

function passwd_check()
{
  $test = sql_query(sprintf(PASSWD_GET_INFO, $_POST[PASSWD_POST_LOGIN]));
  if (!sql_num_rows($test))
    return (PASSWD_ERROR_LOGIN);
  if (ereg(PASSWD_REGEX_EMAIL, $_POST[USR_POST_EMAIL]) != FALSE)
    return (0);
  else
    return (PASSWD_ERROR_EMAIL);
}

function passwd_send()
{
  mail(sql_real_escape_string($_POST[PASSWD_POST_EMAIL]), 
       SEND_SUBJECT, 
       sprintf(SEND_MESSAGE, 
	           sql_real_escape_string($_POST[PASSWD_POST_LOGIN]), 
			   sql_real_escape_string($_POST[PASSWD_POST_LOGIN])), 
	   SEND_HEADERS);
}

?>