<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_sql.php');
require_once('./function_usr.php');

session_name(SESS_NAME);
session_start();

$link = sql_connect(SQL_HOST, SQL_USER, SQL_PASSWD);
sql_select_db(SQL_DB, $link);

header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE);
else
  printf(XML_HEADER, XML_TEMPLATE);
  
/*
**	function
*/

function membre_select_all()
{
	$test = mysql_query(ADMIN_MEMBRE_SELECT);
	printf(ADMIN_MEMBRE_BEGIN);
	printf(ADMIN_MEMBRE_NAME, ADMIN_POST_NAME);
	printf(ADMIN_MEMBRE_BUTTON, ADMIN_BUTTON_SELECT, ADMIN_VALUE_SELECT);
	printf(ADMIN_MEMBRE_BUTTON, ADMIN_BUTTON_UPDATE, ADMIN_VALUE_UPDATE);
	printf(ADMIN_MEMBRE_BUTTON, ADMIN_BUTTON_DELETE, ADMIN_VALUE_DELETE);
	while ($row = mysql_fetch_array($test, MYSQL_NUM))
	{
		printf(ADMIN_MEMBRE, ADMIN_POST_ID, $row[0], 
							 ADMIN_POST_LOGIN, $row[1], 
							 ADMIN_POST_NAME, $row[2], 
							 ADMIN_POST_FIRST, $row[3], 
							 ADMIN_USR_LEVEL, $row[4]);
	}
	printf(ADMIN_MEMBRE_END);
}

/*
** 	define
*/

define('ADMIN_MEMBRE_BEGIN', '<admin_membre_list>');
define('ADMIN_MEMBRE_END', '</admin_membre_list>');
define('ADMIN_MEMBRE_NAME', '<admin_membre_name>%s</admin_membre_name>');
define('ADMIN_MEMBRE_BUTTON', '<admin_button name=\'%s\' value=\'%s\' />');

define('ADMIN_POST_NAME', 'adminlistmembre');
define('ADMIN_BUTTON_SELECT', 'adminbuttonselect');
define('ADMIN_BUTTON_UPDATE', 'adminbuttonupdate');
define('ADMIN_BUTTON_DELETE', 'adminbuttondelete');
define('ADMIN_VALUE_SELECT', 'Select');
define('ADMIN_VALUE_UPDATE', 'Update');
define('ADMIN_VALUE_DELETE', 'Delete');

define('ADMIN_POST_ID', 'adminpostid');
define('ADMIN_POST_LOGIN', 'adminpostlogin');
define('ADMIN_POST_NAME', 'adminpostname');
define('ADMIN_POST_FIRST', 'adminpostfirst');
define('ADMIN_USR_LEVEL', 'adminpostlevel');

define('ADMIN_MEMBRE', '<membre>
							<id post="%s" value="%s" />
							<login post="%s" value="%s" />
							<name post="%s" value="%s" />
							<first_name post="%s" value="%s" />
							<usr_level post="%s" value="%s" />
						</membre>');

define('ADMIN_MEMBRE_SELECT',
	   'SELECT usr_id,
			   usr_login, 
			   profil_name, 
			   profil_fname, 
			   usr_level_id
		FROM tw_usr,
			 tw_profil,
			 tw_title,
			 tw_location
		WHERE tw_usr.usr_id = tw_profil.profil_usr_id
		AND	tw_profil.profil_location_id = tw_location.location_id
		AND tw_profil.profil_title_id = tw_title.title_id;');

membre_select_all();

printf(XML_FOOTER);
sql_close($link);
?>