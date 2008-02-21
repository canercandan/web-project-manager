<?php

define('ADD_ACTIVITY_BEGIN', '<add_activity>');
define('ADD_ACTIVITY_END', '</add_activity>');

define('FIELD_ACTIVITY_NAME', '<field_activity_name>%s</field_activity_name>');
define('FIELD_ACTIVITY_DESCRIB', '<field_activity_describ>%s</field_activity_describ>');
define('FIELD_ACTIVITY_CHARGE', '<field_activity_charge>%s</field_activity_charge>');

define('ACTIVITY_NAME', '<activity_name>%s</activity_name>');
define('ACTIVITY_DESCRIB', '<activity_describ>%s</activity_describ>');
define('ACTIVITY_CHARGE', '<activity_charge>%s</activity_charge>');

define('ERROR_ACTIVITY_NAME', 'error : activity\'s name already used');
define('ERROR_ACTIVITY_CHARGE', 'error : activity charge invalid');

define('ACTIVITY_OK', 'Congratulation, activity added');
define('CHARGE_NOT_INT', 'The unit of the charge of an activity is \'day per man\', that\'s why the charge must be an integer.');
define('FIELD_NOT_FILLED', 'Please fill all the fields');
define('POST_ACTIVITY_NAME', 'activityname');
define('POST_ACTIVITY_DESCRIB', 'activitydescrib');
define('POST_ACTIVITY_CHARGE', 'activitycharge');

/*
** Define activity sql request
*/

define('SQL_ADD_ACTIVITY','INSERT INTO `tw_activity` (
`activity_id` ,
`activity_project_id` ,
`activity_parent_id` ,
`activity_name` ,
`activity_charge_total` ,
`activity_date_begin` ,
`activity_date_end` ,
`activity_describtion`
)
VALUES (
NULL , \'%d\', \'%d\', \'%s\', \'%d\', CURDATE(), NULL, \'%s\'
);');

define('SQL_SELECT_ACTIVITIES', 'SELECT activity_id, activity_name FROM tw_activity 
WHERE activity_project_id = \'%d\' 
and activity_parent_id = \'%d\';');

define('SQL_GET_CHARGE', 'SELECT SUM(activity_charge_total) 
	FROM tw_activity 
	WHERE activity_parent_id = \'%d\';');

define('SQL_UPDATE_CHARGE', 'UPDATE tw_activity 
SET activity_charge_total = \'%d\' 
WHERE activity_id = \'%d\';');

define('SQL_GET_PARENT_ID', 'SELECT activity_parent_id FROM tw_activity WHERE activity_id = \'%d\';');

?>