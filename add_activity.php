<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./define_activity.php');

header(HEADER_CONTENT_TYPE);
printf(XML_HEADER);

printf(ADD_ACTIVITY_BEGIN);

printf(PROJECT_NAME,"blabla");
printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);

printf(ADD_ACTIVITY_END);

printf(XML_FOOTER);

?>