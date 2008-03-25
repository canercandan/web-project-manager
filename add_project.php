<?php

require_once('./define_project.php');
require_once('function_project.php');
require_once('./define_informations_project.php');

printf(ADD_PROJECT_BEGIN);
if (isset($_GET['creation']))
{
	if ($_GET['creation'] == 'project')
	{
		printf(XML_MESG, PROJECT_OK);
	}
}

$today = getdate();

get_days();
get_months();
get_years();

printf(FIELD_PROJECT_NAME, '', POST_PROJECT_NAME);
printf(FIELD_PROJECT_DESCRIB, '', POST_PROJECT_DESCRIB);
printf(FIELD_PROJECT_DATE, POST_PROJECT_DAY, $today['mday'], POST_PROJECT_MONTH, $today['mon'], POST_PROJECT_YEAR, $today['year']);
printf(FIELD_PROJECT_DATE_END, POST_PROJECT_DAY_END, $today['mday'], POST_PROJECT_MONTH_END, $today['mon'], POST_PROJECT_YEAR_END, $today['year']);

printf(ADD_PROJECT_END);

?>