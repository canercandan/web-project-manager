<?php

if (!MAIN)
  exit(0);
require_once('define_archiver.php');
require_once('function_right.php');


function delete_archive($archive_id)
{
	$res = sql_query(sprintf(SQL_GET_ARCH_CHILD, sql_real_escape_string($archive_id)));
	if (sql_num_rows($res))
		{
			while (($tab = sql_fetch_array($res)))
			{
				delete_archive($tab[0]);
				@unlink(sprintf("%s/%d", ROOT_FOLDER, $tab[0]));
			}
		}
	sql_query(sprintf(SQL_DELETE_ARCHIVE, sql_real_escape_string($archive_id)));
}
function create_folder($name, $parent_id, $activity_id, $project_id)
{
	get_activity_right($activity_id, $project_id, $id_usr, 0);
	if ($_SESSION['add_file'])
	{
		$res = sql_query(sprintf(SQL_CHECK_FOLDER, sql_real_escape_string($project_id), sql_real_escape_string($activity_id), sql_real_escape_string($parent_id), sql_real_escape_string($name)));
		if (!sql_num_rows($res))
		{
			sql_query(sprintf(SQL_CREATE_FOLDER, sql_real_escape_string($name), sql_real_escape_string($project_id), sql_real_escape_string($activity_id), sql_real_escape_string($parent_id)));
			return (true);	
		}
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
		move_uploaded_file($tmp_pwd, sprintf("%s/%d", ROOT_FOLDER, $id));
		return (true);
	}
	return (false);
}



function recursive_show_activity_folders($project_id, $activity_id, $act_name, $id_usr)
{	
	
	if ($activity_id != 0)
		{
			get_activity_right($activity_id, $project_id, $id_usr, 0);
			if (($right = $_SESSION['read_file']))
			{
				printf(ARCHIVER_ACTIVITY, $activity_id, htmlentities($act_name), isset($_SESSION['project_activity_folder']) && $_SESSION['project_activity_folder'] == $activity_id && $_SESSION['cur_folder'] == 0,
				isset($_SESSION['DEVELOPPED_ACTIVITY'][$activity_id]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$activity_id] : 0);
				recursive_show_folder($project_id, $activity_id, $id_usr, 0);
			}
		}
	else
	{
		get_project_right($project_id, $id_usr, 0);
		if (($right = $_SESSION['read_file']))
		{
			printf(ARCHIVER_ACTIVITY, 0, htmlentities($_SESSION['PROJECT_NAME']), 1, isset($_SESSION['DEVELOPPED_ACTIVITY'][$activity_id]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$activity_id] : 0);
			recursive_show_folder($project_id, $activity_id, $id_usr, 0);
		}
	}
	$res = sql_query(sprintf(SQL_ARCHIVER_GET_SUB_ACT, $activity_id, $project_id));
	if (sql_num_rows($res))
		while (($tab = sql_fetch_array($res)))
			{
				recursive_show_activity_folders($project_id, $tab[0], $tab[1], $id_usr);
			}
	if ($right)
		printf(ARCHIVER_ACTIVITY_END);
}

function recursive_show_folder($project_id, $activity_id, $id_usr, $id_archive)
{
	$res = sql_query(sprintf(SQL_GET_FOLDER_ACT,  sql_real_escape_string($project_id), sql_real_escape_string($activity_id), $id_archive));
	if (sql_num_rows($res))
		{
			while (($tab = sql_fetch_array($res)))
			{
				printf(ARCHIVER_FOLDER, htmlentities($tab[1]), htmlentities($tab[0]), (isset($_SESSION['cur_folder']) && $_SESSION['cur_folder']== $tab[0]), (isset($_SESSION['dev_folder'][$tab[0]]) ? $_SESSION['dev_folder'][$tab[0]] : 0));
				recursive_show_folder($project_id, $activity_id, $id_usr, $tab[0]);
				printf(ARCHIVER_FOLDER_END);
			}
		}
}

function show_current_folder($project_id, $activity_id, $id_usr, $id_archive, $act_name)
{
	if ($activity_id)
		get_activity_right($activity_id, $project_id, $id_usr, 0);
	else
		get_project_right($project_id, $id_usr, 0);
	if ($_SESSION['add_file'])
	{
		printf("<showform value=\"1\"/>");
	}
	else
		printf("<showform value=\"0\"/>");
	if ($_SESSION['read_file'])
	{
		if (!$id_archive)
		{
			if ($activity_id)
			{
				$res = sql_query(sprintf(SQL_GET_ARCH_ACT_NAME, $activity_id));
				$tab = sql_fetch_array($res);
				$name = $tab[0];
			}
			else	
				$name = $act_name;
		}
		else
		{
			$res = sql_query(sprintf(SQL_GET_ARCHIVE_NAME, $id_archive));
			$tab = sql_fetch_array($res);
			$name = $tab[0];
		}
		if ($id_archive)
		{
			$res = sql_query(sprintf(SQL_ARCHIVE_PARENT, $id_archive));
			$tab = sql_fetch_array($res);
			if (!$tab[0])
				$parent = 0;
			else
				$parent = $tab[0];
			$activity_id = $tab[1];	
		}
		if ($activity_id)
			{
				$res = sql_query(sprintf(SQL_ARCHIVE_ACT_PARENT, $activity_id));
				if (sql_num_rows($res))
				{
					$tab = sql_fetch_array($res);
					$parent_act = $tab[0];
				}
				else
					$parent_act = 0;
			}
			else
				$parent_act = -1;
		printf(ARCHIVER_CURRENT_FOLDER_START, $name , $id_archive ? $id_archive : $activity_id, $id_archive ? $parent : 0, $id_archive ? $activity_id : $parent_act);
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