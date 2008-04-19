<?php

require_once('function_informations_project.php');
require_once('function_informations_activity.php');
require_once('function_project.php');
require_once('function_activity.php');
require_once('function_delete.php');

if (isset($_POST[BTN_UPDATE])
    && isset($_POST[POST_ACTIVITY_DEPEND]))
  {
    $res = sql_query(sprintf(SQL_GET_ACTIVITY_DEPEND,
			     $_SESSION['ACTIVITY_ID']));
    if (sql_num_rows($res))
      while (list($id_act, $id_act_dep) = sql_fetch_array($res))
	remove_dependance($id_act, $id_act_dep);
    foreach ($_POST[POST_ACTIVITY_DEPEND] as $key => $val)
      add_dependance($_SESSION['ACTIVITY_ID'], $key);
  }
 else if (isset($_POST[BTN_UPDATE]) && isset($_POST[POST_PROJECT_NAME]) && isset($_POST[POST_PROJECT_DESCRIB])
	  && isset($_POST[POST_PROJECT_DAY]) && isset($_POST[POST_PROJECT_MONTH]) && isset($_POST[POST_PROJECT_YEAR])
	  && isset($_POST[POST_PROJECT_DAY_END]) && isset($_POST[POST_PROJECT_MONTH_END]) && isset($_POST[POST_PROJECT_YEAR_END]))
  {
    $err = new_update_project($_SESSION['PROJECT_ID'], $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB],
			      $_POST[POST_PROJECT_DAY], $_POST[POST_PROJECT_MONTH], $_POST[POST_PROJECT_YEAR],
			      $_POST[POST_PROJECT_DAY_END], $_POST[POST_PROJECT_MONTH_END], $_POST[POST_PROJECT_YEAR_END],
			      $_POST[POST_PROJECT_HOUR_DAY]);
    if (!$err)
      {
	header(sprintf('Location:root.php?project_id=%s&update=project', $_SESSION['PROJECT_ID']));
	exit(0);
      }
  }
 else if (isset($_POST[BTN_UPDATE]) && isset($_POST[POST_MOD_ACTIVITY_NAME]) && isset($_POST[POST_MOD_ACTIVITY_DESCRIB])
	  && isset($_POST[POST_ACTIVITY_YEAR]) && isset($_POST[POST_ACTIVITY_MONTH])  && isset($_POST[POST_ACTIVITY_DAY])
	  && isset($_POST[POST_ACTIVITY_YEAR_END]) && isset($_POST[POST_ACTIVITY_MONTH_END])  && isset($_POST[POST_ACTIVITY_DAY_END]))
   {
     $err = new_update_activity($_SESSION['PROJECT_ID'], $_SESSION['ACTIVITY_ID'], $_POST[POST_MOD_ACTIVITY_NAME], $_POST[POST_MOD_ACTIVITY_DESCRIB], 
				$_POST[POST_ACTIVITY_DAY], $_POST[POST_ACTIVITY_MONTH], $_POST[POST_ACTIVITY_YEAR], $_POST[POST_MOD_ACTIVITY_CHARGE],
				$_POST[POST_ACTIVITY_DAY_END], $_POST[POST_ACTIVITY_MONTH_END], $_POST[POST_ACTIVITY_YEAR_END]);
     if (!$err)
       {
	 header(sprintf('Location:root.php?activity_id=%s&update=activity', $_SESSION['ACTIVITY_ID']));
	 exit(0);
       }
   }
 else if (isset($_POST[POST_PROJECT_NAME]) && isset($_POST[POST_PROJECT_DESCRIB]) && $_SESSION['ROOT_MENU'] == ADD_PROJECT && $_POST[POST_PROJECT_NAME] != ""
	  && isset($_POST[POST_PROJECT_DAY]) && isset($_POST[POST_PROJECT_MONTH]) && isset($_POST[POST_PROJECT_YEAR])
	  && isset($_POST[POST_PROJECT_DAY_END]) && isset($_POST[POST_PROJECT_MONTH_END]) && isset($_POST[POST_PROJECT_YEAR_END]))
   {
     new_add_project($_SESSION[SESSION_ID], $_POST[POST_PROJECT_NAME], $_POST[POST_PROJECT_DESCRIB],
		     $_POST[POST_PROJECT_DAY], $_POST[POST_PROJECT_MONTH], $_POST[POST_PROJECT_YEAR],
		     $_POST[POST_PROJECT_DAY_END], $_POST[POST_PROJECT_MONTH_END], $_POST[POST_PROJECT_YEAR_END],
		     $_POST[POST_PROJECT_HOUR_DAY]);
     header('Location:root.php?creation=project');
     exit(0);
   }
 else if (isset($_POST[POST_ACTIVITY_NAME]) && isset($_POST[POST_ACTIVITY_DESCRIB]) && isset($_POST[POST_ACTIVITY_CHARGE]) && 
	  $_POST[POST_ACTIVITY_NAME] != "" && $_POST[POST_ACTIVITY_CHARGE] != "" && is_numeric($_POST[POST_ACTIVITY_CHARGE])
	  && isset($_POST[POST_ACTIVITY_YEAR]) && isset($_POST[POST_ACTIVITY_MONTH])  && isset($_POST[POST_ACTIVITY_DAY])
	  && isset($_POST[POST_ACTIVITY_YEAR_END]) && isset($_POST[POST_ACTIVITY_MONTH_END])  && isset($_POST[POST_ACTIVITY_DAY_END]))
   {
     new_add_activities($_SESSION['PROJECT_ID'] , (isset($_SESSION['ACTIVITY_ID']) ? $_SESSION['ACTIVITY_ID'] : 0), $_POST[POST_ACTIVITY_NAME], $_POST[POST_ACTIVITY_DESCRIB], 
			$_POST[POST_ACTIVITY_CHARGE],
			$_POST[POST_PROJECT_DAY], $_POST[POST_PROJECT_MONTH], $_POST[POST_PROJECT_YEAR],
			$_POST[POST_PROJECT_DAY_END], $_POST[POST_PROJECT_MONTH_END], $_POST[POST_PROJECT_YEAR_END]);
     header('Location:root.php?creation=activity');
     exit(0);
   }

?>