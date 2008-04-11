<?php

if (!MAIN)
  exit(0);

require_once('./define_passwd.php');

function passwd_check()
{
  if (!$_POST[PASSWD_POST_LOGIN])
    return (PASSWD_ERROR_LOGIN_NOTFOUND);
  if (!$_POST[PASSWD_POST_EMAIL])
    return (PASSWD_ERROR_EMAIL_NOTFOUND);
  $test = sql_query(sprintf(PASSWD_GET_INFO, $_POST[PASSWD_POST_LOGIN]));
  if (!(sql_num_rows($test)))
    return (PASSWD_ERROR_PASSWD);
  if (ereg(PASSWD_REGEX_EMAIL, $_POST[USR_POST_EMAIL]) == FALSE)
    return (PASSWD_ERROR_PASSWD);
  if (strcmp($_POST[USR_POST_EMAIL], sql_result(0, 0)) != 0)
    return (PASSWD_ERROR_PASSWD);
  return (1);
}

function passwd_generate()
{
  $config['sec']['generator'] = array("C" => array('char' => PASSWD_CHAR,
						   'min' => 4,
						   'max' => 6),
				      "S" => array('char' => PASSWD_SPECIAL,
						   'min' => 1,
						   'max' => 2),
				      "N" => array('char' => PASSWD_NUMBER,
						   'min' => 2,
						   'max' => 2));
  $Password = "";
  $Generator = $config['sec']['generator'];
  foreach ($Generator as $Token => $Seed)
    $Password .= str_repeat($Token, rand($Seed['min'], $Seed['max']));
  $Password = str_shuffle($Password);
  $Buffer = array();
  for ($i = 0; $i < strlen($Password); $i ++)
    $Buffer[] = $Generator[(string)$Password[$i]]['char'][rand(0, strlen($Generator[$Password[$i]]['char']) - 1)];
  return (implode("", $Buffer));
}

function passwd_send()
{
  $passwd = passwd_generate();
  $header = sprintf(SEND_HEADER,
		    sprintf(SEND_HEADER_TO,
			    $_POST[PASSWD_POST_LOGIN],
			    $_POST[PASSWD_POST_EMAIL]),
		    sprintf(SEND_HEADER_FROM));
  var_dump($passwd);
  mail(sql_real_escape_string($_POST[PASSWD_POST_EMAIL]),
       SEND_SUBJECT,
       sprintf(SEND_MESSAGE,
	       sql_real_escape_string($_POST[PASSWD_POST_LOGIN]),
	       $passwd),
       $header);
}

?>