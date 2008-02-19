<?php

/*
** a completer par viven
*/


define('MAIN', 1);

require_once('./define_config.php');

header(HEADER_CONTENT_TYPE);
printf(XML_HEADER);

/*
** TODO Project list
*/


// if ....  projet selectionne
// right window = project window (project menu, activity list ... )
include('project.php');

printf(XML_FOOTER);

?>