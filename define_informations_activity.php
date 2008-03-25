<?php

if (!MAIN)
  exit(0);

define('INFORMATION_ACTIVITY_BEGIN', '<information_activity>');
define('INFORMATION_ACTIVITY_END', '</information_activity>');  
define('INFORMATION_DEPENDANCE_ACTIVITY_BEGIN', '<information_dependance_activity>');
define('INFORMATION_DEPENDANCE_ACTIVITY_END', '</information_dependance_activity>');  
define('ADD_ACTIVITY_BEGIN', '<add_activity>');
define('ADD_ACTIVITY_END', '</add_activity>');
  
define('ACTIVITY_OK', 'Congratulation, activity added');
define('ACTIVITY_UPDATED', 'Congratulation, activity updated');

define('POST_ACTIVITY_DAY', 'actday');
define('POST_ACTIVITY_MONTH', 'actmonth');
define('POST_ACTIVITY_YEAR', 'actyear');
define('POST_ACTIVITY_DAY_END', 'actdayend');
define('POST_ACTIVITY_MONTH_END', 'actmonthend');
define('POST_ACTIVITY_YEAR_END', 'actyearend');  
define('POST_ACTIVITY_DEPEND', 'postdepend');

define('FIELD_ACTIVITY_NAME', '<field_activity_name value="%s">%s</field_activity_name>');
define('FIELD_ACTIVITY_DESCRIB', '<field_activity_describ value="%s">%s</field_activity_describ>');
define('FIELD_ACTIVITY_CHARGE', '<field_activity_charge value="%s">%s</field_activity_charge>');
define('FIELD_ACTIVITY_DATE', '<field_date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');
define('FIELD_ACTIVITY_DATE_END', '<field_date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');

  
define('SQL_GET_NEW_ACTIVITY_INFORMATIONS', '
SELECT p.activity_name, p.activity_describtion, p.activity_charge_total, 
day(p.activity_date_begin), month(p.activity_date_begin), year(p.activity_date_begin),
day(p.activity_date_end), month(p.activity_date_end), year(p.activity_date_end),
(count(f.activity_id) = 0)
FROM tw_activity p LEFT JOIN tw_activity f ON f.activity_parent_id = p.activity_id
WHERE 
p.activity_id = \'%d\'
GROUP BY f.activity_id');

define('SQL_SELECT_ACTIVITIES_DEPENDANCE', 'SELECT activity_id, activity_name, (activity_dependance_dependof_id is not NULL) 
FROM tw_activity LEFT JOIN tw_activity_dependance ON (activity_dependance_activity_id = \'%d\' AND activity_dependance_dependof_id = activity_id)
WHERE activity_project_id = \'%d\' 
and activity_parent_id = \'%d\'
order by activity_name;');

?>