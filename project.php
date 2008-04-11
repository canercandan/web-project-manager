<?php

if (!MAIN || !isset($_SESSION['PROJECT_NAME']))
  exit(0);

require_once('define_project.php');
require_once('function_activity.php');
require_once('define_activity.php');
//require_once('dategraph.php');

printf(PROJECT_WINDOW_BEGIN);

//print_tab_proj_member_date(1);

if (isset($_SESSION['PROJECT_NAME']))
  {
    printf(PROJECT_NAME, htmlentities($_SESSION['PROJECT_NAME']));
  }

check_admin_for_project(isset($_SESSION['PROJECT_ID']) ? $_SESSION['PROJECT_ID'] : 0);

printf(ACTIVITY_LIST_START);
printf(ACTIVITY_TITLE, htmlentities(isset($_SESSION['PROJECT_NAME']) ? $_SESSION['PROJECT_NAME'] : UNKNOWED_PROJECT));
printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_ACTIVITY'][0]) ? $_SESSION['DEVELOPPED_ACTIVITY'][0] : 0);
printf(ACTIVITY_ID, 0);
print_activities_list($_SESSION['PROJECT_ID'], 0);
printf(ACTIVITY_LIST_END);

if (isset($_SESSION['ACTIVITY_NAME']))
  {
    // window at the right of the project menu = activity window
    include('activity.php');
  }
 else
   {
     if ((isset($_SESSION['PROJECT_MENU'])))
       {
	 // window at the right of the project menu = add activity to this project
	 if ($_SESSION['PROJECT_MENU'] == ADD_ACTIVITY)
		include('add_activity.php');
	 if ($_SESSION['PROJECT_MENU'] == GANT) 
	  include('gant.php');
	 else if ($_SESSION['PROJECT_MENU'] == INFORMATION)
	   include('informations_project.php');
	 else if ($_SESSION['PROJECT_MENU'] == MEMBER)
	   include('member_project.php');
	 else if ($_SESSION['PROJECT_MENU'] == MEMBER_DATEGRAPH)
	   include('project_member_dategraph.php');
       }

     /*
      ** TODO info projet, ajout membre, .... = Vivien
      */
   }

printf(PROJECT_WINDOW_END);

?>