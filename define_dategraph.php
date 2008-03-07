<?php

define('PROJECT_MEMBER_DATEGRAPH_START', '<project_member_dategraph>');
define('PROJECT_MEMBER_DATEGRAPH_END', '</project_member_dategraph>');

define('TAB_DATE_START','<tab_date length="%.3f">');
define('TAB_LINE_START', '<line legend="%d" name="%s" colorbg="%d">');
define('TAB_LINE_END', '</line>');
define('TAB_DATE_END','</tab_date>');
define('TAB_ITEM', '<item date_start="%s" date_end="%s" color="%s" color_text="%s" legend="%s" start="%.3f" width="%.3f"/>');



/*
** Define
*/

define('SQL_GET_MEMBER_DATE', 'SELECT DISTINCT usr_id, usr_login as "name" FROM tw_usr, tw_member
WHERE member_usr_id = usr_id 
AND member_project_id = \'%d\';');

define('SQL_GET_ACTIVITY_MEMBER_DATE', 'SELECT DISTINCT usr_id, usr_login as "name" FROM tw_usr, tw_activity_member
WHERE activity_member_usr_id = usr_id 
AND activity_member_activity_id = \'%d\';');

define('SQL_GET_ACTIVITY_MEMBER_DURATION', 'SELECT DATEDIFF(activity_member_date_start, activity_date_begin), DATEDIFF(activity_member_date_end,activity_member_date_start), 
DATE_FORMAT(activity_member_date_start, \'%%W %%D %%M %%Y\'), DATE_FORMAT(activity_member_date_end, \'%%W %%D %%M %%Y\')
FROM tw_activity_member, tw_activity
WHERE
activity_id = activity_member_activity_id
AND activity_id = \'%d\'
AND activity_member_usr_id = \'%d\'
order by activity_member_date_start, activity_member_date_end
');

define('SQL_GET_PROJECT_MEMBER_DURATION', 'SELECT DATEDIFF(member_date_start,project_date), DATEDIFF(member_date_end,member_date_start), 
DATE_FORMAT(member_date_start, \'%%W %%D %%M %%Y\'), DATE_FORMAT(member_date_end, \'%%W %%D %%M %%Y\')
FROM tw_member, tw_project
WHERE
project_id = member_project_id
AND project_id = \'%d\'
AND member_usr_id = \'%d\'
order by member_date_start, member_date_end
');

define('SQL_GET_PROJECT_DURATION', 'SELECT day(project_date), month(project_date), year(project_date), DATEDIFF(CURDATE(),project_date) FROM tw_project
WHERE project_id = \'%d\';');

define('SQL_GET_ACTIVITY_DURATION', '
SELECT day(activity_date_begin), month(activity_date_begin), year(activity_date_begin), DATEDIFF(CURDATE(),activity_date_begin) 
FROM tw_activity
WHERE activity_id = \'%d\'
AND activity_date_end = DATE(\'0000-00-00\')
UNION
SELECT day(activity_date_begin), month(activity_date_begin), year(activity_date_begin), DATEDIFF(activity_date_end, activity_date_begin) 
FROM tw_activity
WHERE activity_id = \'%d\'
AND activity_date_end != DATE(\'0000-00-00\');');

?>