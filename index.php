<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');

header(HEADER_CONTENT_TYPE);
printf(XML_HEADER);
printf('<home>
	  <mesg>Presentation de TechWEB</mesg>
	</home>');
printf(XML_FOOTER);

?>