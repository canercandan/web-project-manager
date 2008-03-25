<?php

require_once('./define_informations_activity.php');

if (!MAIN)
  exit(0);

function get_new_activity_informations($id_activity)
{
  $res = sql_query(sprintf(SQL_GET_NEW_ACTIVITY_INFORMATIONS, sql_real_escape_string($id_activity)));
  $tab = sql_fetch_array($res);
  get_months();
  get_days();
  get_years();
  printf('<editable>1</editable><name post="%s">%s</name><describ post="%s">%s</describ>%s
  <date postyear="%s" postmonth="%s" postday="%s" day="%s" month="%s" year= "%s"/>
  <dateend postyear="%s" postmonth="%s" postday="%s" day="%s" month="%s" year= "%s"/>', 
  POST_MOD_ACTIVITY_NAME,
  htmlentities($tab[0]), 
  POST_MOD_ACTIVITY_DESCRIB,
  htmlentities($tab[1]),
  sprintf(ACTIVITY_CHARGE_EDITABLE, POST_MOD_ACTIVITY_CHARGE, $tab[8], $tab[2]),
  POST_ACTIVITY_YEAR, POST_ACTIVITY_MONTH, POST_ACTIVITY_DAY,
	$tab[3], $tab[4], $tab[5],
POST_ACTIVITY_YEAR_END, POST_ACTIVITY_MONTH_END, POST_ACTIVITY_DAY_END,
	$tab[6], $tab[7], $tab[8]);
}  


function print_activities_list_dependance($id_project, $id_activity, $id_root_activity)
{
  $res = SQL_QUERY(sprintf(SQL_SELECT_ACTIVITIES_DEPENDANCE, sql_real_escape_string($id_root_activity), sql_real_escape_string($id_project), sql_real_escape_string($id_activity)));
  if (sql_num_rows($res))
    while ($tab = sql_fetch_array($res))
      {
		printf(ACTIVITY_START);
		printf('<depend post="%s" value="%s"/>', POST_ACTIVITY_DEPEND, $tab[2]);
		printf(ACTIVITY_TITLE, htmlentities($tab[1] == "" ? UNNAMED_ACTIVITY : $tab[1]));
		printf(ACTIVITY_DEV, isset($_SESSION['DEVELOPPED_DEPEND_ACTIVITY'][$tab[0]]) ? $_SESSION['DEVELOPPED_DEPEND_ACTIVITY'][$tab[0]] : 0);
		printf(ACTIVITY_ID, $tab[0]);
		print_activities_list_dependance($id_project, $tab[0], $id_root_activity);
		printf(ACTIVITY_END);
      }
}
  
?>