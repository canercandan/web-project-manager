<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

$text = usr_field();

header('Content-Type: text/xml');
printf(XML_CONTENT,
       XML_HEADER,
       $text,
       XML_FOOTER);

?>