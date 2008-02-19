<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

header(HEADER_CONTENT_TYPE);
printf(XML_HEADER);
printf(USR_XML_CONNECT_BEGIN);
printf(USR_XML_FIELD_LOGIN, USR_POST_LOGIN);
printf(USR_XML_FIELD_PASSWD, USR_POST_PASSWD);
printf(USR_XML_CONNECT_END);
if ($_POST[USR_POST_LOGIN])
  {
    if (!$_POST[USR_POST_PASSWD])
      printf(XML_ERROR, USR_XML_ERROR_PASSWD_NOTFOUND);
    else
      printf(XML_MESG, USR_XML_MESG_OK);
  }
printf(XML_FOOTER);

?>