<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

header(HEADER_CONTENT_TYPE);
//printf(XML_HEADER, XML_TEMPLATE);
printf(XML_HEADER, XML_NO_TEMPLATE);
printf(USR_XML_CREATE_BEGIN);
printf(USR_XML_FIELD_LOGIN, USR_POST_LOGIN);
printf(USR_XML_FIELD_PASSWD, USR_POST_PASSWD);
printf(USR_XML_FIELD_REPASSWD, USR_POST_REPASSWD);
printf(USR_XML_FIELD_EMAIL, USR_POST_EMAIL);
printf(USR_XML_CREATE_END);
printf(XML_FOOTER);

?>