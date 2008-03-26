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
if (isset($_SESSION['date_start']) &&isset($_SESSION['date_end']) && isset($_GET['error']) && $_GET['error'] == 'date_order')
  {
    printf(XML_ERROR, sprintf(ERR_NEW_DATE_ORDER, $_SESSION['date_start'], $_SESSION['date_end']));
    unset($_SESSION['date_start']);
    unset($_SESSION['date_end']);
  }

$today = getdate();

get_days();
get_months();
get_years();

printf(FIELD_PROJECT_NAME, '', POST_PROJECT_NAME);
printf(FIELD_PROJECT_DESCRIB, '', POST_PROJECT_DESCRIB);
printf(FIELD_PROJECT_DATE, POST_PROJECT_DAY, $today['mday'], POST_PROJECT_MONTH, $today['mon'], POST_PROJECT_YEAR, $today['year']);
printf(FIELD_PROJECT_DATE_END, POST_PROJECT_DAY_END, $today['mday'], POST_PROJECT_MONTH_END, $today['mon'], POST_PROJECT_YEAR_END, $today['year']);
printf(FIELD_PROJECT_HOUR_DAY, 8, POST_PROJECT_HOUR_DAY);

printf(ADD_PROJECT_END);

?>