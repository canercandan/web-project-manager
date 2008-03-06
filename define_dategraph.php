<?php

define('PROJECT_MEMBER_DATEGRAPH_START', '<project_member_dategraph>');
define('PROJECT_MEMBER_DATEGRAPH_END', '</project_member_dategraph>');

define('TAB_DATE_START','<tab_date length="%.3l">');
define('TAB_LINE_START', '<line legend="%d" name="%s">');
define('TAB_LINE_END', '</line>');
define('TAB_DATE_END','</tab_date>');
define('TAB_ITEM', '<item color="%s" color_text="%s" legend="%s"/>');



/*
** Define
*/

define('SQL_GET_DATE', 'SELECT (CURDATE() - activity_date_begin) FROM ');

define('SQL_GET_MEMBER_DATE', 'SELECT DISTINCT usr_id, usr_login as "name" FROM tw_usr, tw_member
WHERE member_usr_id = usr_id 
AND member_project_id = \'%d\';');

define('SQL_GET_PROJECT_MEMBER_DURATION', 'SELECT DATEDIFF(member_date_start,project_date), DATEDIFF(member_date_end,member_date_start)
FROM tw_member, tw_project
WHERE
project_id = member_project_id
AND project_id = \'%d\'
AND member_usr_id = \'%d\'
AND member_date_end != \'00-00-0000\'
UNION
SELECT DATEDIFF(member_date_start, project_date), DATEDIFF(CURDATE(), member_date_start)
FROM tw_member, tw_project
WHERE
project_id = member_project_id
AND project_id = \'%d\'
AND member_usr_id = \'%d\'
AND (member_date_end = \'00-00-0000\');');

define('SQL_GET_PROJECT_DURATION', 'SELECT day(project_date), month(project_date), year(project_date), DATEDIFF(CURDATE(),project_date) FROM tw_project
WHERE project_id = \'%d\';');

?>