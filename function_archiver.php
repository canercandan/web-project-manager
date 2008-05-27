<?php

if (!MAIN)
  exit(0);
require_once('define_archiver.php');

function create_folder($name, $parent_id, $activity_id, $project_id)
{
	get_activity_right($activity_id, $project_id, $id_usr, 0);
	if ($_SESSION['add_file'])
	{
		sql_query(sprintf(SQL_CREATE_FOLDER, sql_real_escape_string($name), sql_real_escape_string($project_id), sql_real_escape_string($activity_id), sql_real_escape_string($parent_id)));
		return (true);
	}
	return (false);
}

function create_file($tmp_pwd, $name, $parent_id, $activity_id, $project_id)
{
	get_activity_right($activity_id, $project_id, $id_usr, 0);
	if ($_SESSION['add_file'])
	{
		sql_query(sprintf(SQL_CREATE_FILE, sql_real_escape_string($name), sql_real_escape_string($project_id), sql_real_escape_string($activity_id), sql_real_escape_string($parent_id)));
		$id = sql_insert_id();
		move_uploaded_file($tmp_pwd, sprinft("%s/%d", ROOT_FOLDER, $id));
		return (true);
	}
	return (false);
	
}



function recursive_show_activity_folders($project_id, $activity_id, $act_name, $id_usr)
{		
	if ($activity_id != 0)
		{
			get_activity_right($activity_id, $project_id, $id_usr, 0);
			if ($_SESSION['read_file'])
			{
				printf(ARCHIVER_ACTIVITY, $activity_id, htmlentities($act_name), isset($_SESSION['project_activity_folder']) && $_SESSION['project_activity_folder'] == $activity_id && $_SESSION['cur_folder'] == 0,
				isset($_SESSION['DEVELOPPED_ACTIVITY'][$activity_id]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$activity_id] : 0);
				recursive_show_folder($project_id, $activity_id, $id_usr, 0);
			}
		}
	else
	{
		get_project_right($project_id, $id_usr, 0);
		if ($_SESSION['read_file'])
		{
			printf(ARCHIVER_ACTIVITY, 0, htmlentities($_SESSION['PROJECT_NAME']), 1, !isset($_SESSION['project_activity_folder']) && $_SESSION['cur_folder'] == 0);
			recursive_show_folder($project_id, $activity_id, $id_usr, 0);
		}
	}
	$res = sql_query(sprintf(SQL_ARCHIVER_GET_SUB_ACT, $activity_id, $project_id));
	if (sql_num_rows($res))
		while (($tab = sql_fetch_array($res)))
			{
				recursive_show_activity_folders($project_id, $tab[0], $tab[1], $id_usr);
			}
	printf(ARCHIVER_ACTIVITY_END);
}

function recursive_show_folder($project_id, $activity_id, $id_usr, $id_archive)
{
	$res = sql_query(sprintf(SQL_GET_FOLDER_ACT,  sql_real_escape_string($project_id), sql_real_escape_string($activity_id), $id_archive));
	if (sql_num_rows($res))
		{
			while (($tab = sql_fetch_array($res)))
			{
				printf(ARCHIVER_FOLDER, htmlentities($tab[1]), htmlentities($tab[0]), (isset($_SESSION['cur_folder']) && $_SESSION['cur_folder'] == $tab[0]), (isset($_SESSION['dev_folder'][$tab[0]]) && $_SESSION['dev_folder'][$tab[0]]));
				recursive_show_folder($project_id, $activity_id, $id_usr, $tab[0]);
			}
		}
}

function show_current_folder($project_id, $activity_id, $id_usr, $id_archive, $act_name)
{
	if ($activity_id)
		get_activity_right($activity_id, $project_id, $id_usr, 0);
	else
		get_project_right($project_id, $id_usr, 0);
	if ($_SESSION['read_file'])
	{
		printf(ARCHIVER_CURRENT_FOLDER_START, htmlentities("test"), $activity_id);
		$res = sql_query(sprintf(SQL_GET_IN_FOLDER, $project_id, $activity_id, $id_archive));
		if (sql_num_rows($res))
		{
			while (($tab = sql_fetch_array($res)))
			{
				if ($tab[2])
					printf(ARCHIVER_FOLDER_EASY, htmlentities($tab[1]), htmlentities($tab[0]));
				else
					printf(ARCHIVER_FILE, htmlentities($tab[1]), htmlentities($tab[0]), htmlentities($tab[3]));
			}
		}
		printf(ARCHIVER_CURRENT_FOLDER_END);
	}
}

?>