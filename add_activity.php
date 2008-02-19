<?php

require_once('./define_activity.php');

printf(ADD_ACTIVITY_BEGIN);

if (!isset($_POST[POST_ACTIVITY_NAME]))
{
	printf(FIELD_ACTIVITY_NAME, POST_ACTIVITY_NAME);
	printf(FIELD_ACTIVITY_DESCRIB, POST_ACTIVITY_DESCRIB);
	printf(FIELD_ACTIVITY_CHARGE, POST_ACTIVITY_CHARGE);
}
else
{
	printf(XML_MESG, ACTIVITY_OK);
}

printf(ADD_ACTIVITY_END);

?>