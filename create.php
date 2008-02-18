<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

header('Content-Type: text/xml');
printf(XML_CONTENT,
       XML_HEADER,
       usr_field(),
       XML_FOOTER);

?>