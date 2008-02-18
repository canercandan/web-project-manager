<?php

/*
** Define user : name for xml
*/

define('USR_XML_DOC', "<doc>%s</doc>");

define('USR_XML_LOGIN', "<login>%s</login>");
define('USR_XML_PASSWD', "<passwd>%s</passwd>");
define('USR_XML_EMAIL', "<email>%s</email>");

define('USR_XML_ERROR', "<error>%s</error>");
define('USR_XML_ERROR_LOGIN', "error : login already exist");
define('USR_XML_ERROR_EMAIL', "error : email invalid");

define('USR_XML_MESG', "<mesg>%s</mesg>");
define('USR_XML_MESG_OK', "congratulation, user create");

define('USR_REGEX_EMAIL', '^[[:alpha:]]{1}[[:alnum:]]*((\.|_|-)[[:alnum:]]+)*@[[:alpha:]]{1}[[:alnum:]]*((\.|-)[[:alnum:]]+)*(\.[[:alpha:]]{2,4})$');

/*
** Define user : name for request
*/

define('USR_POST_LOGIN', 'usrlogin');
define('USR_POST_PASSWD', 'usrpasswd');
define('USR_POST_EMAIL', 'usremail');

/*
** Define user : sql  select request
*/

define('USR_SQL_SELECT_LOGIN', 'SELECT usr_login
							   FROM tw_usr
							   WHERE usr_login = \'%s\';');

define('USR_SQL_SELECT_PASSWD', 'SELECT usr_passwd
							    FROM tw_usr
								WHERE usr_login = %s;');

/*
** Define user : sql add request
*/

define('USR_SQL_ADD_TABLE_USR', "INSERT INTO tw_usr
							    VALUES(0, 0, %s, sha1(%s), %s, 2000-01-01);");

define('USR_SQL_ADD_TABLE_PROFIL', "INSERT INTO tw_profil
								   VALUES(0, 0, AAA, AAA, AAA, 000);");

define('USR_SQL_ADD_TABLE_LOCATION', "INSERT INTO tw_location
									 VALUES(0, AAA, AAA);");

/*
** Define user : sql update request 
*/

define('USR_SQL_UPDATE_TABLE_USR', "UPDATE tw_usr
								   SET %s = %s
								   WHERE usr_login = %s;");

define('USR_SQL_UPDATE_TABLE_PROFIL', "UPDATE tw_profil
									  SET %s = %s
									  WHERE profil_id = ( SELECT usr_profil_id
														  FROM tw_usr
														  WHERE usr_login = %s );");

define('USR_SQL_UPDATE_TABLE_LOCATION', "UPDATE tw_location
									    SET %s = %s
										WHERE location_id = ( SELECT usr_profil_id
															  FROM tw_usr
															  WHERE usr_login = %s );");

?>
