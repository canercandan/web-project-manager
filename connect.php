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
printf(XML_FOOTER);

?>