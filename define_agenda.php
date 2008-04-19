<?php

if (!MAIN)
  exit(0);

define('AGENDA_START', '<agenda add=\'%d\' id=\'%d\' view=\'%d\'
				year=\'%s\' month=\'%s\' day=\'%s\'
				hour=\'%s\' minute=\'%s\'>');
define('AGENDA_END', '</agenda>');

define('PROJ_ID', 'id');

define('ADD_EVENT', 'add');
define('EVENT_FORM', 1);
define('EVENT_OK', 2);
define('EVENT_ERR', 3);
define('EVENT_SUBJECT', 'subject');
define('EVENT_BODY', 'body');

define('LOCATION_NOTLOG', 'Location: connect.php');
define('LOCATION_NOPROJ', 'Location: root.php');
define('LOCATION_DATE', 'Location: ?%s=%s&%s=%s&%s=%s&%s=%s&%s=%s&%s=%s&%s=%s');

define('MINUTE_START', '<minute name=\'%s\'>');
define('MINUTE_END', '</minute>');
define('MINUTE_NAME', 'minute');

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
define('EVENT_ITEM', '<item year=\'%s\' month=\'%s\' day=\'%s\'
			    hour=\'%s\' minute=\'%s\' subject=\'%s\'>%s</item>');

define('SQL_AGENDA_GET',
       'SELECT	agenda_subject, agenda_body, agenda_date
	FROM	tw_agenda
	WHERE	agenda_date LIKE \'%s-%s-%s %s:%%\'
		AND agenda_project_id = \'%d\';');

define('SQL_AGENDA_ADD_EVENT',
       'INSERT INTO	tw_agenda
	(agenda_project_id, agenda_usr_id, agenda_date,
	 agenda_subject, agenda_body)
	VALUES (\'%d\', \'%d\', \'%s\', \'%s\', \'%s\');');

define('DATE_FMT', '%04d-%02d-%02d %02d:%02d:00');

define('GET_VIEW', 'get_view');

define('VIEW_MINUTE', 1);
define('VIEW_HOUR', 2);
define('VIEW_DAY', 3);
define('VIEW_MONTH', 4);
define('VIEW_YEAR', 5);

define('DELIMIT_DATE', ' -:');

?>