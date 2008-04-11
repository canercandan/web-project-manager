<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_profil.php');
require_once('./define_session.php');

session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

if (!($_SESSION[SESSION_ID]))
  {
    header(LOCATION_EXIT);
    exit (0);
  }
if ($_POST[PROFIL_POST_LOCATION] && $_POST[PROFIL_POST_NAME] &&
    $_POST[PROFIL_POST_FNAME] && $_POST[PROFIL_POST_FPHONE] &&
    $_POST[PROFIL_POST_MPHONE] && $_POST[PROFIL_POST_TITLE] &&
    $_POST[PROFIL_POST_ADDRESS])
  {
    if ($_SESSION[SESSION_LEVEL] == IS_A_ADMIN && $_POST[MEMBER_SELECT])
      {
		admin_profil_update();
		header(LOCATION_ADMIN);
		exit(0);
      }
    else
      {
        profil_update();
        header(LOCATION_MEMBER);
		exit(0);
      }
  }
if ($_POST)
  {
    if (!$_POST[PROFIL_POST_LOCATION])
      $error = sprintf(XML_ERROR, PROFIL_LOCATION_ERROR);
    else if (!$_POST[PROFIL_POST_TITLE])
      $error = sprintf(XML_ERROR, PROFIL_TITLE_ERROR);
    else if (!$_POST[PROFIL_POST_NAME])
      $error = sprintf(XML_ERROR, PROFIL_NAME_ERROR);
    else if (!(profil_name_check($_POST[PROFIL_POST_NAME])))
      $error = sprintf(XML_ERROR, PROFIL_NAME_ERROR_NOTCHAR);
    else if (!$_POST[PROFIL_POST_FNAME])
      $error = sprintf(XML_ERROR, PROFIL_FNAME_ERROR);
    else if (!(profil_name_check($_POST[PROFIL_POST_FNAME])))
      $error = sprintf(XML_ERROR, PROFIL_FNAME_ERROR_NOTCHAR);
    else if (!$_POST[PROFIL_POST_FPHONE])
      $error = sprintf(XML_ERROR, PROFIL_FPHONE_ERROR);
    else if (!(profil_number_check($_POST[PROFIL_POST_FPHONE])))
      $error = sprintf(XML_ERROR, PROFIL_FPHONE_ERROR_NOTNUM);
    else if (!$_POST[PROFIL_POST_MPHONE])
      $error = sprintf(XML_ERROR, PROFIL_MPHONE_ERROR);
    else if (!(profil_number_check($_POST[PROFIL_POST_MPHONE])))
      $error = sprintf(XML_ERROR, PROFIL_MPHONE_ERROR_NOTNUM);
    else if (!$_POST[PROFIL_POST_ADDRESS])
      $error = sprintf(XML_ERROR, PROFIL_ADDRESS_ERROR);
	else if (!$_POST[PROFIL_POST_EMAIL])
	  $error = sprintf(XML_ERROR, PROFIL_EMAIL_ERROR_NOTFOUND);
  }

header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
 else
   printf(XML_HEADER, XML_TEMPLATE,
	  $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
printf(SESSION_DESTROY, DESTROY);
printf(PROFIL_BEGIN);
printf($error);
if ($_GET[MEMBER_SELECT]);
  printf(XML_MEMBER_SELECT, MEMBER_SELECT, $_GET[MEMBER_SELECT]);
if (!$_POST)
  {
    if ($_SESSION[SESSION_LEVEL] == IS_A_ADMIN && $_GET[MEMBER_SELECT])
      {
	admin_select_profil();
      }
    else if (!$_SESSION[SESSION_LOCATION] || !$_SESSION[SESSION_TITLE] ||
	     !$_SESSION[SESSION_NAME] || !$_SESSION[SESSION_FNAME] ||
	     !$_SESSION[SESSION_FPHONE] || !$_SESSION[SESSION_MPHONE] ||
	     !$_SESSION[SESSION_ADDRESS] || !$_SESSION[SESSION_EMAIL])
      user_select_profil();
    else
      select_session();
  }
 else
   {
     printf(PROFIL_FIELD_LOCATION_BEGIN, PROFIL_POST_LOCATION, '');
     select_location();
     printf(PROFIL_FIELD_LOCATION_END);

     printf(PROFIL_FIELD_TITLE_BEGIN, PROFIL_POST_TITLE, '');
     select_title();
     printf(PROFIL_FIELD_TITLE_END);
   }
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
printf(PROFIL_FIELD_EMAIL,
       PROFIL_POST_EMAIL, $_POST[PROFIL_POST_EMAIL]);
printf(PROFIL_END);
printf(XML_FOOTER);
sql_close($link);

?>