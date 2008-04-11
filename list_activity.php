<?php

define('MAIN', 1);

require_once('./define_config.php');
require_once('./function_usr.php');
require_once('./function_sql.php');

//$link = sql_connect(SQL_HOST, SQL_USR, SQL_PASSWD);
//sql_select_db(SQL_DB, $link);
header(HEADER_CONTENT_TYPE);
if ($_GET[DEBUG])
  printf(XML_HEADER, XML_NO_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
else
  printf(XML_HEADER, XML_TEMPLATE,
	 $_SESSION[SESSION_LEVEL], $_SESSION[SESSION_ID]);
define('PROJECT_BEGIN', '<project>');
define('PROJECT_END', '</project>');
define('ACTIVITY_CONTENT',
       '<activity>
	  <title>%s</title>
	  <developped>%d</developped>
	  <id>%d</id>
	  %s
	</activity>');
printf(PROJECT_BEGIN);
printf(ACTIVITY_CONTENT, 'coco', 1, 1,
       sprintf(ACTIVITY_CONTENT, 'kiki', 1, 2,
	       sprintf(ACTIVITY_CONTENT, 'lala', 1, 3,
		       sprintf(ACTIVITY_CONTENT, 'lala2', 1, 4,
			       sprintf(ACTIVITY_CONTENT, 'lala3', 0, 5,
				       sprintf(ACTIVITY_CONTENT, 'lala4', 0, 6,
					       '').
				       sprintf(ACTIVITY_CONTENT, 'lala4', 1, 7,
					       '')).
			       sprintf(ACTIVITY_CONTENT, 'lala3', 0, 8,
				       ''))).
	       sprintf(ACTIVITY_CONTENT, 'lolo', 1, 9,
		       '')));
printf(PROJECT_END);
printf(XML_FOOTER);
//sql_close($link);

?>