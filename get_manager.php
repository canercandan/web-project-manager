<?php

require_once('function_project.php');
require_once('function_activity.php');
require_once('function_delete.php');

if (isset($_GET['project_id']))
  {
    if (($checked = check_project($_SESSION[SESSION_ID], $_GET['project_id'])))
      {
	unset($_SESSION['ROOT_MENU']);
	$_SESSION['PROJECT_NAME'] = $checked;
	$_SESSION['PROJECT_ID'] = $_GET['project_id'];
	if (!isset($_SESSION['PROJECT_MENU']))
	  $_SESSION['PROJECT_MENU'] = INFORMATION;
	unset($_SESSION['ACTIVITY_NAME']);
	unset($_SESSION['ACTIVITY_ID']);
	unset($_SESSION['ACTIVITY_MENU']);
      }
    else
      {
	;
      }
  }
 else if (isset($_GET['activity_id']))
   {
     if ($_GET['activity_id'] == 0)
       {
	 unset($_SESSION['ACTIVITY_NAME']);
	 unset($_SESSION['ACTIVITY_ID']);
	 unset($_SESSION['ACTIVITY_MENU']);
	 if (!isset($_SESSION['PROJECT_MENU']))
	   $_SESSION['PROJECT_MENU'] = INFORMATION;
       }
     else if (($checked = check_activity(0, $_GET['activity_id'])))
       {
	 $_SESSION['ACTIVITY_NAME'] = $checked;
	 $_SESSION['ACTIVITY_ID'] = $_GET['activity_id'];
	 if (!isset($_SESSION['ACTIVITY_MENU']))
	   $_SESSION['ACTIVITY_MENU'] = INFORMATION_ACTIVITY;
       }
     else
       {
	 ;
       }
   }
 else if (isset($_GET['activity_archive']) && isset($_GET['folder']))
   {
		$_SESSION['project_activity_folder'] = $_GET['activity_archive'];
		$_SESSION['cur_folder'] = $_GET['folder'];
   }
 else if (isset($_GET['less']) && isset($_GET['activity']))
   {
     $_SESSION['DEVELOPPED_ACTIVITY'][$_GET['activity']] = 0;
   }
 else if (isset($_GET['more']) && isset($_GET['activity']))
   {
     $_SESSION['DEVELOPPED_ACTIVITY'][$_GET['activity']] = 1;
   }
  else if (isset($_GET['less']) && isset($_GET['archive']))
   {
     $_SESSION['dev_folder'][$_GET['archive']] = 0;
   }
 else if (isset($_GET['more']) && isset($_GET['archive']))
   {
     $_SESSION['dev_folder'][$_GET['archive']] = 1;
   }
 else if (isset($_GET['more']) && isset($_GET['work_id']))
   {
     $_SESSION['DEVELOPPED_WORK'][$_GET['work_id']] = 1;
   }
 else if (isset($_GET['less']) && isset($_GET['work_id']))
   {
     $_SESSION['DEVELOPPED_WORK'][$_GET['work_id']] = 0;
   }
 else if (isset($_GET['project']) && isset($_GET['information']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = INFORMATION;
   }
else if (isset($_GET['project']) && isset($_GET['archive']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = PROJECT_ARCHIVE;
   }
  else if (isset($_GET['project']) && isset($_GET['gantt']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = GANT;
   }
 else if (isset($_GET['project']) && isset($_GET['member']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = MEMBER;
   }
 else if (isset($_GET['project']) && isset($_GET['member_dategraph']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = MEMBER_DATEGRAPH;
   }
 else if (isset($_GET['project']) && isset($_GET['add_activity']))
   {
     unset($_SESSION['ACTIVITY_NAME']);
     unset($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_MENU']);
     $_SESSION['PROJECT_MENU'] = ADD_ACTIVITY;
   }
 else if (isset($_GET['activity']) && isset($_GET['member_dategraph']))
   {
     $_SESSION['ACTIVITY_MENU'] = MEMBER_DATEGRAPH_ACTIVITY;
   }
 else if (isset($_GET['activity']) && isset($_GET['information']))
   {
     $_SESSION['ACTIVITY_MENU'] = INFORMATION_ACTIVITY;
   }
 else if (isset($_GET['activity']) && isset($_GET['member']))
   {
     $_SESSION['ACTIVITY_MENU'] = MEMBER_ACTIVITY;
   }
 else if (isset($_GET['activity']) && isset($_GET['add_activity']))
   {
     $_SESSION['ACTIVITY_MENU'] = ADD_ACTIVITY_ACTIVITY;
   }
 else if (isset($_GET['activity']) && isset($_GET['archive']))
   {
     $_SESSION['ACTIVITY_MENU'] = ACTIVITY_ARCHIVE;
   }
 else if (isset($_GET['activity']) && isset($_GET['wl_suggestion']))
   {
     $_SESSION['ACTIVITY_MENU'] = ACTIVITY_WL_SUGGESTION;
   }
 else if (isset($_GET['project_add']))
   {
     /*unset($_SESSION['ACTIVITY_NAME']);
      unset($_SESSION['ACTIVITY_ID']);
      unset($_SESSION['ACTIVITY_MENU']);
      unset($_SESSION['PROJECT_NAME']);
      unset($_SESSION['PROJECT_ID']);
      unset($_SESSION['PROJECT_MENU']);*/
     $_SESSION['ROOT_MENU'] = ADD_PROJECT;
   }
 else if (isset($_GET['project_view']))
   {
     unset($_SESSION['ROOT_MENU']);
   }
 else if (isset($_GET['project']) && isset($_GET['delete_project']))
   {
     delete_project($_SESSION['PROJECT_ID']);
     unset($_SESSION['PROJECT_ID']);
   }
 else if (isset($_GET['activity']) && isset($_GET['delete_activity']))
   {
     delete_activity($_SESSION['ACTIVITY_ID']);
     unset($_SESSION['ACTIVITY_ID']);
   }

?>