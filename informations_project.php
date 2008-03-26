<?php

require_once('./define_project.php');
require_once('./function_informations_project.php');
require_once('./define_informations_project.php');

if (isset($_GET['update']) && $_GET['update'] == 'project')
  {
    printf(XML_MESG, PROJECT_UPDATED);
  }
if (isset($_SESSION['date_start'])
    && isset($_SESSION['date_end'])
    && isset($_GET['error'])
    && $_GET['error'] == 'date_order')
  {
    printf(XML_ERROR, sprintf(ERR_NEW_DATE_ORDER,
			      $_SESSION['date_start'],
			      $_SESSION['date_end']));
    unset($_SESSION['date_start']);
    unset($_SESSION['date_end']);
  }
printf(INFORMATION_PROJECT_BEGIN);
printf(MEMBER_BTN_UPDATE);
get_new_information_project($_SESSION['PROJECT_ID']);
printf(INFORMATION_PROJECT_END);

?>