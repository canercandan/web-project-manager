<?php

if (!MAIN)
  exit(0);

define('POST_PROJECT_DAY', 'projday');
define('POST_PROJECT_MONTH', 'projmonth');
define('POST_PROJECT_YEAR', 'projyear');
define('POST_PROJECT_DAY_END', 'projdayend');
define('POST_PROJECT_MONTH_END', 'projmonthend');
define('POST_PROJECT_YEAR_END', 'projyearend');

define('FIELD_PROJECT_NAME', '<field_name value="%s">%s</field_name>');
define('FIELD_PROJECT_DESCRIB', '<field_descr value="%s">%s</field_descr>');
define('FIELD_PROJECT_DATE', '<field_date postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');
define('FIELD_PROJECT_DATE_END', '<field_date_end postday="%s" day="%d" postmonth="%s" month="%d" postyear="%s" year="%d"/>');

define('SQL_NEW_INFORMATION', 'SELECT f.project_name, f.project_describ, day(f.project_date), month(f.project_date), year(f.project_date),
									day(f.project_date_end), month(f.project_date_end), year(f.project_date_end),
									p.profil_name, p.profil_fname, title_name
FROM tw_project f LEFT JOIN tw_profil p ON f.project_autor_usr_id = p.profil_usr_id LEFT JOIN tw_title ON title_id = p.profil_title_id   
WHERE
f.project_id = \'%d\';');

?>