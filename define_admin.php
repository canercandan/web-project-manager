<?php

if (!MAIN)
  exit(0);

define('ADMIN_START','<administration>');
define('ADMIN_END','</administration>');
define('ADD_LOCATION_BEGIN', '<add_location>');
define('ADD_LOCATION_END', '</add_location>');
define('ADD_TITLE_START', '<add_title>');
define('ADD_TITLE_END', '</add_title>');

define('ADMIN_LOCATION', 1);
define('ADMIN_TITLE', 2);
define('LOC_NAME_MISSING', 'Please fill the location name.');
define('LOCATION_OK', 'Congratulation, location added');
define('SUBMIT_MOD_TITLE', 'modif');
define('SUBMIT_DEL_TITLE', 'delete');
define('POST_TITLE_ID', 'titleid');
define('POST_TITLE_NAME', 'titlename');
define('TITLE_ITEM', '<title submitmod="%s" submitdel="%s" postid="%s" postvalue="%s" id="%d" value="%s"/>');
define('FIELD_LOCATION_NAME', '<field_name>%s</field_name>');
define('FIELD_LOCATION_ADDR', '<field_addr>%s</field_addr>');
define('FIELD_TITLE_NAME', '<field_name value="%s">%s</field_name>');
define('POST_LOCATION_NAME', 'locname');
define('POST_LOCATION_ADDR', 'locaddr');
define('POST_LOCATION_MODNAME', 'modlocname');
define('POST_LOCATION_MODADDR', 'modlocaddr');
define('POST_LOCATION_MODID', 'modlocid');
define('LOCATION_START', '<location>');
define('LOCATION_END', '</location>');
define('LOCATION_ITEM', '<location><field_name>%s</field_name><field_addr>%s</field_addr><field_id>%s</field_id><id>%d</id><name>%s</name><address>%s</address></location>');


/*
** SQL
*/

define('SQL_GET_TITLES', 'SELECT title_id, title_name FROM tw_title');
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