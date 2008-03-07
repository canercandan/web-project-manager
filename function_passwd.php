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

function passwd_generate()
{
  $config['security']['password_generator'] = array("C" => array('characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
								 'minimum' => 4,
								 'maximum' => 6),
						    "S" => array('characters' => "!@()-_=+?*^&",
								 'minimum' => 1,
								 'maximum' => 2),
						    "N" => array('characters' => '1234567890',
								 'minimum' => 2,
								 'maximum' => 2));
  $sMetaPassword = "";
  $ahPasswordGenerator = $config['security']['password_generator'];
  foreach ($ahPasswordGenerator as $cToken => $ahPasswordSeed)
    $sMetaPassword .= str_repeat($cToken, rand($ahPasswordSeed['minimum'], $ahPasswordSeed['maximum']));
  $sMetaPassword = str_shuffle($sMetaPassword);
  $arBuffer = array();
  for ($i = 0; $i < strlen($sMetaPassword); $i ++)
    $arBuffer[] = $ahPasswordGenerator[(string)$sMetaPassword[$i]]['characters'][rand(0, strlen($ahPasswordGenerator[$sMetaPassword[$i]]['characters']) - 1)];
  return (implode("", $arBuffer));
}

?>