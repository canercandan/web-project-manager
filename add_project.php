<?php

require_once('./define_project.php');
require_once('function_project.php');

printf(ADD_PROJECT_BEGIN);
if (isset($_GET['creation']))
{
	if ($_GET['creation'] == 'project')
	{
		printf(XML_MESG, PROJECT_OK);
	}
}
printf(FIELD_PROJECT_NAME, POST_PROJECT_NAME);
printf(FIELD_PROJECT_DESCRIB, POST_PROJECT_DESCRIB);
printf(ADD_PROJECT_END);

?>