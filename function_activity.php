<?php

require_once('./define_activity.php');

function add_activities($id_project, $id_activity, $name, $describ, $charge)
{
	sql_query(sprintf(SQL_ADD_ACTIVITY, $id_project, $id_activity, $name, $charge, $describ));

}

?>