<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_profil.php');

session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

/*
if (PROFIL_POST_TITLE || PROFIL_POST_LOCATION || PROFIL_POST_NAME ||
    PROFIL_POST_FNAME || PROFIL_POST_FPHONE || PROFIL_POST_MPHONE || PROFIL_POST_ADDRESS)
  profil_update();
  */

if (($profil = profil_check()))
  {
    header(HEADER_LOCATION_MEMBRE);
    exit(0);
  }
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
 else
   printf(XML_HEADER, XML_TEMPLATE);
printf(PROFIL_BEGIN);
printf(PROFIL_FIELD_TITLE, PROFIL_POST_TITLE);
printf(PROFIL_FIELD_LOCATION, PROFIL_POST_LOCATION);
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