<?php

if (!MAIN)
  exit(0);

define('ADMIN_START','<administration>');
define('ADMIN_END','</administration>');
define('ADD_LOCATION_BEGIN', '<add_location>');
define('ADD_LOCATION_END', '</add_location>');

define('ADMIN_LOCATION', 1);

define('LOC_NAME_MISSING', 'Please fill the location name.');
define('LOCATION_OK', 'Congratulation, location added');
define('FIELD_LOCATION_NAME', '<field_name>%s</field_name>');
define('FIELD_LOCATION_ADDR', '<field_addr>%s</field_addr>');
define('POST_LOCATION_NAME', 'locname');
define('POST_LOCATION_ADDR', 'locaddr');
define('POST_LOCATION_MODNAME', '<field_name>modlocname</field_name>');
define('POST_LOCATION_MODADDR', '<field_addr>modlocaddr</field_addr>');
define('POST_LOCATION_MODID', '<field_id>modlocid</field_id>');
define('LOCATION_START', '<location>');
define('LOCATION_END', '</location>');
define('LOCATION_ITEM', '<location>%s%s%s<id>%d</id><name>%s</name><address>%s</address></location>');


/*
** SQL
*/

define('SQL_GET_LOCATIONS', 'SELECT location_id, location_name, location_address FROM tw_location');

define('SQL_ADD_LOCATION', '
INSERT INTO `tw_location` (
`location_id` ,
`location_name` ,
`location_address`
)
VALUES (
NULL , \'%s\', \'%s\'
);');

define('SQL_UPDATE_LOCATION', '
UPDATE `tw_location` SET `location_name` = \'%s\',
`location_address` = \'%s\' WHERE `tw_location`.`location_id` =\'%d\;');

?>