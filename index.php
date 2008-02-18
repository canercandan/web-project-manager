<?php

define('MAIN', 1);

require_once('./define_config.php');

header('Content-Type: text/xml');
printf(XML_BODY,
       XML_HEADER,
       '',
       XML_FOOTER);

?>