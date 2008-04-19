<?php

if (!MAIN)
  exit(0);

define('AGENDA_START', '<agenda view=\'%d\' year=\'%s\'
			 month=\'%s\' day=\'%s\' hour=\'%s\'>');
define('AGENDA_END', '</agenda>');

define('HOUR_START', '<hour name=\'%s\'>');
define('HOUR_END', '</hour>');
define('HOUR_NAME', 'hour');

define('DAY_START', '<day name=\'%s\'>');
define('DAY_END', '</day>');
define('DAY_NAME', 'day');

define('MONTH_START', '<month name=\'%s\'>');
define('MONTH_END', '</month>');
define('MONTH_NAME', 'month');

define('YEAR_START', '<year name=\'%s\'>');
define('YEAR_END', '</year>');
define('YEAR_NAME', 'year');

define('DATE_ITEM', '<item value=\'%02d\' />');

define('EVENT_START', '<event>');
define('EVENT_END', '</event>');
define('EVENT_ITEM', '<item year=\'%s\' month=\'%s\' day=\'%s\' hour=\'%s\' subject=\'%s\'>%s</item>');

define('SQL_AGENDA_GET',
       'SELECT	agenda_subject, agenda_body, agenda_date
	FROM	tw_agenda
	WHERE	agenda_date LIKE \'%s-%s-%s %s:%%\'
		AND agenda_project_id = \'%d\';');

define('GET_VIEW', 'get_view');

define('VIEW_HOUR', 1);
define('VIEW_DAY', 2);
define('VIEW_MONTH', 3);
define('VIEW_YEAR', 4);

define('DELIMIT_DATE', ' -:');

?>