<?php

require_once('./define_project.php');

printf(ADD_PROJECT_BEGIN);

if (!isset($_POST[POST_PROJECT_NAME]))
  {
    printf(FIELD_PROJECT_NAME, POST_PROJECT_NAME);
    printf(FIELD_PROJECT_DESCRIB, POST_PORJECT_DESCRIB);
  }
 else
   {
     printf(XML_MESG, PROJECT_OK);
   }

printf(ADD_PROJECT_END);

?>