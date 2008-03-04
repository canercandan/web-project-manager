<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_profil.php');

session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if ($_POST[PROFIL_POST_LOCATION] && $_POST[PROFIL_POST_NAME] &&
    $_POST[PROFIL_POST_FNAME] && $_POST[PROFIL_POST_FPHONE] &&
	$_POST[PROFIL_POST_MPHONE] && $_POST[PROFIL_POST_TITLE] &&
	$_POST[PROFIL_POST_ADDRESS])
  {
	profil_update();
	header(LOCATION_MEMBRE);
	exit(0);
  }

if ($_POST)
  {
    if (!$_POST[PROFIL_POST_LOCATION])
      $error = sprintf(XML_ERROR, PROFIL_LOCATION_ERROR);
    else if (!$_POST[PROFIL_POST_TITLE])
      $error = sprintf(XML_ERROR, PROFIL_TITLE_ERROR);
    else if (!$_POST[PROFIL_POST_NAME])
      $error = sprintf(XML_ERROR, PROFIL_NAME_ERROR);
    else if (!$_POST[PROFIL_POST_FNAME])
      $error = sprintf(XML_ERROR, PROFIL_FNAME_ERROR);
    else if (!$_POST[PROFIL_POST_FPHONE])
      $error = sprintf(XML_ERROR, PROFIL_FPHONE_ERROR);
    else if (!$_POST[PROFIL_POST_MPHONE])
      $error = sprintf(XML_ERROR, PROFIL_MPHONE_ERROR);
    else if (!$_POST[PROFIL_POST_ADDRESS])
      $error = sprintf(XML_ERROR, PROFIL_ADDRESS_ERROR);
  }

header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
 else
   printf(XML_HEADER, XML_TEMPLATE);
printf(PROFIL_BEGIN);
printf($error);

printf(PROFIL_FIELD_LOCATION_BEGIN, PROFIL_POST_LOCATION);
select_location();
printf(PROFIL_FIELD_LOCATION_END);

printf(PROFIL_FIELD_TITLE_BEGIN, PROFIL_POST_TITLE);
select_title();
printf(PROFIL_FIELD_TITLE_END);

printf(PROFIL_FIELD_NAME,
       PROFIL_POST_NAME, $_POST[PROFIL_POST_NAME]);
printf(PROFIL_FIELD_FNAME,
       PROFIL_POST_FNAME, $_POST[PROFIL_POST_FNAME]);
printf(PROFIL_FIELD_FPHONE,
       PROFIL_POST_FPHONE, $_POST[PROFIL_POST_FPHONE]);
printf(PROFIL_FIELD_MPHONE,
       PROFIL_POST_MPHONE, $_POST[PROFIL_POST_MPHONE]);
printf(PROFIL_FIELD_ADDRESS,
       PROFIL_POST_ADDRESS, $_POST[PROFIL_POST_ADDRESS]);
printf(PROFIL_END);
printf(XML_FOOTER);
sql_close($link);

?>