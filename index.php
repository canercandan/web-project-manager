<?php

define('MAIN', 1);

require_once('./define_config.php');

header('Content-Type: text/xml');
printf(XML_CONTENT,
       XML_HEADER,
       '<body><login>1</login></body>',
       XML_FOOTER);

?>