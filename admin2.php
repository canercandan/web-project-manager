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
	$test = mysql_query(ADMIN_MEMBER_SELECT);
	printf(MEMBER_BEGIN);
	printf(MEMBER_NAME, ADMIN_POST_NAME);
	printf(MEMBER_BUTTON_SELECT, ADMIN_BUTTON_SELECT, ADMIN_VALUE_SELECT);
	printf(MEMBER_BUTTON_UPDATE, ADMIN_BUTTON_UPDATE, ADMIN_VALUE_UPDATE);
	printf(MEMBER_BUTTON_DELETE, ADMIN_BUTTON_DELETE, ADMIN_VALUE_DELETE);
	while ($row = mysql_fetch_array($test, MYSQL_NUM))
	{
		printf(ADMIN_MEMBER, ADMIN_POST_ID, $row[0], 
							 ADMIN_POST_LOGIN, $row[1], 
							 ADMIN_POST_NAME, $row[2], 
							 ADMIN_POST_FIRST, $row[3], 
							 ADMIN_USR_LEVEL, $row[4]);
	}
	printf(MEMBER_END);
}

/*
** 	define
*/

define('MEMBER_BEGIN', '<admin_member_list>');
define('MEMBER_END', '</admin_member_list>');
define('MEMBER_NAME', '<admin_member_name>%s</admin_member_name>');

define('MEMBER_BUTTON_SELECT', '<button_select name=\'%s\' value=\'%s\' />');
define('MEMBER_BUTTON_UPDATE', '<button_update name=\'%s\' value=\'%s\' />');
define('MEMBER_BUTTON_DELETE', '<button_delete name=\'%s\' value=\'%s\' />');

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

define('ADMIN_MEMBER', '<member>
							<id post="%s" value="%s" />
							<login post="%s" value="%s" />
							<name post="%s" value="%s" />
							<first_name post="%s" value="%s" />
							<usr_level post="%s" value="%s" />
						</member>');

define('ADMIN_MEMBER_SELECT',
	   'SELECT usr_id,
			   usr_login, 
			   profil_name, 
			   profil_fname, 
			   usr_level_id
		FROM tw_usr,
			 tw_profil
		WHERE tw_usr.usr_id = tw_profil.profil_usr_id;');

membre_select_all();

printf(XML_FOOTER);
sql_close($link);
?>