<?php

require_once('./define_project.php');
require_once('function_project.php');

printf(ADD_PROJECT_BEGIN);

if (!isset($_POST[POST_PROJECT_NAME]) || !isset($_POST[POST_PROJECT_DESCRIB]) || $_POST[POST_PROJECT_NAME] == "")
  {
    printf(FIELD_PROJECT_NAME, POST_PROJECT_NAME);
    printf(FIELD_PROJECT_DESCRIB, POST_PROJECT_DESCRIB);
  }
 else
   {
		add_project(/*$_SESSION['USER_ID']*/ 0, $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB]);
		header('Location:root.php?creation=project');
		exit(0);
   }

printf(ADD_PROJECT_END);

?>