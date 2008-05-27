<?php

define('SQL_ARCHIVER_GET_SUB_ACT', 'Select activity_id, activity_name from tw_activity where activity_parent_id = \'%d\' and activity_project_id=\'%d\';');

define('SQL_CHECK_FOLDER', 'select archive_id from tw_archive where project_id = \'%d\' and activity_id = \'%d\' and parent_archive_id = \'%d\' and archive_name = \'%s\';');

define('SQL_CREATE_FOLDER','INSERT INTO tw_archive (
`archive_id` ,
`archive_name` ,
`project_id` ,
`activity_id` ,
`parent_archive_id` ,
`folder`,
archive_date
)
VALUES (
NULL , \'%s\', \'%d\', \'%d\', \'%d\', 1, CURDATE()
);');

define('SQL_GET_ARCH_ACT_NAME', 'select activity_name from tw_activity where activity_id = \'%d\';');

define('SQL_GET_ARCHIVE_NAME', 'select archive_name from tw_archive where archive_id = \'%d\';');

define('SQL_ARCHIVE_PARENT', 'select parent_archive_id, activity_id from tw_archive where archive_id = \'%d\';');

define('SQL_ARCHIVE_ACT_PARENT', 'select activity_parent_id from tw_activity where activity_id = \'%d\';');

define('SQL_GET_FOLDER_ACT', 'select archive_id, archive_name from tw_archive where project_id=\'%d\' and activity_id=\'%d\' and folder=1 and parent_archive_id=\'%d\';');

define('SQL_CREATE_FILE','INSERT INTO tw_archive (
`archive_id` ,
`archive_name` ,
`project_id` ,
`activity_id` ,
`parent_archive_id` ,
`folder`,
archive_date
)
VALUES (
NULL , \'%s\', \'%d\', \'%d\', \'%d\', 0, CURDATE()
);');

define('SQL_GET_IN_FOLDER', 'select archive_id, archive_name, folder, DATE_FORMAT(archive_date, \'%%a %%d %%m %%Y %%h:%%m:%%s\') from tw_archive where project_id=\'%d\' and activity_id=\'%d\' and parent_archive_id=\'%d\';');

define('ARCHIVER_START', '<archive>');
define('ARCHIVER_END', '</archive>');
define('ARCHIVER_CURRENT_FOLDER_START', '<current_folder name="%s" id="%d" parent="%d">');
define('ARCHIVER_FILE', '<file name="%s" id="%d" date="%s"/>');
define('ARCHIVER_CURRENT_FOLDER_END', '</current_folder>');
define('ARCHIVER_ACTIVITY', '<activity_archive id="%d" name="%s" selectionned="%d" developped="%d">');
define('ARCHIVER_ACTIVITY_END', '</activity_archive>');
define('ARCHIVER_FOLDER', '<folder name="%s" id="%d" selectionned="%d" developped="%d"/>');
define('ARCHIVER_FOLDER_EASY', '<folder name="%s" id="%d"/>');
?>