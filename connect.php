<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
printf(USR_CONNECT_BEGIN);
printf(USR_FIELD_LOGIN, USR_POST_LOGIN);
printf(USR_FIELD_PASSWD, USR_POST_PASSWD);
printf(USR_CONNECT_END);
if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
      printf(XML_ERROR, USR_ERROR_PASSWD_NOTFOUND);
    else
      printf(XML_MESG, USR_MESG_OK);
  }
printf(XML_FOOTER);

?>