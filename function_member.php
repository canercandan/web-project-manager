<?php

if (!MAIN)
  exit(0);

function regenerate_passwd()
{
  $passwd = passwd_generate();
  $header = sprintf(SEND_HEADER,
		    sprintf(SEND_HEADER_TO,
			    $_SESSION[SESSION_LOGIN],
			    $_SESSION[SESSION_EMAIL]),
		    sprintf(SEND_HEADER_FROM));
  mail(sql_real_escape_string($_SESSION[SESSION_EMAIL]),
       SEND_SUBJECT,
       sprintf(SEND_MESSAGE,
	       sql_real_escape_string($_SESSION[SESSION_LOGIN]),
	       $passwd),
       $header);
  $test = sql_query(sprintf(MEMBER_NEW_PASSWD, sha1($passwd)));
}

?>