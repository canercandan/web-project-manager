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
	while ($row = mysql_fetch_array($test, MYSQL_NUM))
	{
		printf(ADMIN_MEMBRE, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]); 
	}
	printf(ADMIN_MEMBRE_END);
}

/*
** 	define
*/

define('ADMIN_MEMBRE_BEGIN', '<admin_membre_list>');

define('ADMIN_MEMBRE_END', '</admin_membre_list>');

define('ADMIN_MEMBRE', '<membre>
							<id post="%s" value="%s" />
							<login>\'%s\'</login>
							<name>\'%s\'</name>
							<first_name>\'%s\'</first_name>
							<title>\'%s\'</title>
							<email>\'%s\'</email>
							<location>\'%s\'</location>
							<usr_level>\'%s\'</usr_level>
						</membre>');

define('ADMIN_MEMBRE_SELECT',
	   'SELECT usr_id,
			   usr_login, 
			   profil_name, 
			   profil_fname, 
			   title_name, 
			   usr_email, 
			   location_name, 
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