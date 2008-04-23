<?php

if (!MAIN)
  exit(0);
  
DEFINE('BTN_DEL', 'delete');
DEFINE('BTN_ADD', 'add');
DEFINE('BTN_UP', 'update');
DEFINE('BTN_UNSET', 'unset');
DEFINE('SELECT', 'userselected');

DEFINE('WL_SUGGESTION_HEAD','<wl_suggestion>
<buttonset visible="" name="set_as_new_charge"/>
<buttondel name="%s"/>
<buttonupdate name="%s"/>
<buttonunset name="%s"/>
<select name="%s"/>
<buttonadd name="%s"/>');

DEFINE('WL_SUGGESTION_TAIL', '</wl_suggestion>');

DEFINE('WL_ACT_HEAD', '<activity_suggestion id="%d" name="%s" developped="%d" right="%d">');
DEFINE('WL_ACT_TAIL', '</activity_suggestion>');

DEFINE('WL_LIST_IN_HEAD', '<listin>');
DEFINE('WL_LIST_IN_TAIL', '</listin>');
DEFINE('WL_LIST_NOTIN_HEAD', '<listnotin>');
DEFINE('WL_LIST_NOTIN_TAIL', '</listnotin>');

DEFINE('WL_USER_NOTIN', '<user id="%d" name="%s" fname="%s" login="%s"/>');
DEFINE('WL_USER_IN', '<user id="%d" name="%s" fname="%s" login="%s" suggestion="%s" editable="%d"/>');
DEFINE('WL_RESULT', '<result id="result" value="%d"/>');
DEFINE('WL_RESULT_VOID', '<result id="result" value=""/>');
DEFINE('SQL_GET_ALL_SUG_USER', 'SELECT usr_id, profil_name, profil_fname, usr_login, wload_suggested 
FROM tw_wload_suggestion, tw_usr, tw_profil
WHERE profil_usr_id = usr_id
AND wload_usr_id = usr_id
AND wload_activity_id = \'%d\';');

DEFINE('SQL_GET_SUG_RESULT', 'SELECT sum(wload_suggested)/count(wload_suggested) 
FROM tw_wload_suggestion
WHERE
wload_suggested > 0
AND wload_activity_id = \'%d\';');

DEFINE('SQL_GET_NOTIN_SUG_USER', 'SELECT DISTINCT usr_id, profil_name, profil_fname, usr_login
FROM tw_usr, tw_profil, tw_member
WHERE
member_usr_id = usr_id
AND profil_usr_id = usr_id
AND usr_id not in
(	SELECT wload_usr_id 
	FROM tw_wload_suggestion
	WHERE wload_activity_id = \'%d\');');

DEFINE('SQL_GET_ACT_INFO', 'select activity_name from tw_activity where activity_id=\'%d\';');

DEFINE('SQL_UNSET_SUGGESTION', 'UPDATE tw_wload_suggestion SET wload_suggested = -1
	WHERE wload_usr_id =\'%d\'
	AND wload_activity_id=\'%d\';');

DEFINE('SQL_DELETE_SUGGESTION', 'DELETE FROM tw_wload_suggestion WHERE wload_usr_id =\'%d\'
	AND wload_activity_id=\'%d\';');

DEFINE('SQL_ADD_SUGGESTION', 'INSERT INTO tw_project (wload_usr_id, wload_activity_id, tw_wload_suggestion)
VALUES (\'%d\',\'%d\', -1);');

DEFINE('SQL_UPDATE_SUGGESTION', 'UPDATE tw_wload_suggestion SET wload_suggested = \'%d\'
	WHERE wload_usr_id =\'%d\'
	AND wload_activity_id=\'%d\';');

	
DEFINE('SQL_GET_ONE_SUG_USER', 'SELECT usr_id, profil_name, profil_fname, usr_login, wload_suggested 
	FROM tw_wload_suggestion, tw_usr, tw_profil
	WHERE profil_usr_id = usr_id
	AND wload_usr_id = usr_id
	AND wload_activity_id = \'%d\'
	AND usr_id = \'%d\';');

// Attention pour l'utiliser hors du menu act il faut .... rappeler la fonction de droit avant
function show_list_act_suggestion($id_activity, $dev_all)
{
	$res = sql_query(sprintf(SQL_GET_ACT_INFO, sql_real_escape_string($id_activity)));
	printf(WL_ACT_HEAD, htmlentities($id_activity), htmlentities(sql_result($res, 0, 0)),
		htmlentities($dev_all || (isset($_SESSION['DEVELOPPED_ACTIVITY'][$id_activity]) ? $_SESSION['DEVELOPPED_ACTIVITY'][$id_activity] : 0)),
		htmlentities($_SESSION['update_activity']));
	if ($_SESSION['update_activity'])
	{
		printf(WL_LIST_NOTIN_HEAD);
		$res = sql_query(sprintf(SQL_GET_NOTIN_SUG_USER, sql_real_escape_string($id_activity)));
		if (sql_num_rows($res))
		{
			while ($tab = sql_fetch_array($res))
			{
				printf(WL_USER_NOTIN, htmlentities($tab[0]),
				htmlentities($tab[1]), 
				htmlentities($tab[2]),
				htmlentities($tab[3]));
			}
		}
		printf(WL_LIST_NOTIN_TAIL);
		
		printf(WL_LIST_IN_HEAD);
		$res = sql_query(sprintf(SQL_GET_ALL_SUG_USER, sql_real_escape_string($id_activity)));
		if (sql_num_rows($res))
		{
			while ($tab = sql_fetch_array($res))
			{
				printf(WL_USER_IN, htmlentities($tab[0]),
				htmlentities($tab[1]), 
				htmlentities($tab[2]),
				htmlentities($tab[3]),
				htmlentities($tab[4] > 0 ? $tab[4] : ''), $tab[0] == $_SESSION[SESSION_ID]);
			}
		}
		$res = sql_query(sprintf(SQL_GET_SUG_RESULT, sql_real_escape_string($id_activity)));
		if (sql_result($res, 0, 0) != null)
		{
			printf(WL_RESULT, htmlentities(sql_result($res, 0, 0)));
		}
		else
			printf(WL_RESULT_VOID);
		printf(WL_LIST_IN_TAIL);
	}
	else
	{
		printf(WL_LIST_IN_HEAD);
		$res = sql_query(sprintf(SQL_GET_ONE_SUG_USER, sql_real_escape_string($id_activity), sql_real_escape_string($_SESSION[SESSION_ID])));
		if (sql_num_rows($res))
		{
			$tab = sql_fetch_array($res);
			printf(WL_USER_IN, htmlentities($tab[0]),
				htmlentities($tab[1]), 
				htmlentities($tab[2]),
				htmlentities($tab[3]),				
				htmlentities($tab[4] > 0 ? $tab[4] : ''), 1);
		}
		printf(WL_LIST_IN_TAIL);
	}
	printf(WL_ACT_TAIL);
}

function	unset_suggestion($id_activity, $id_user)
{
	if ($id_user == $_SESSION[SESSION_ID])
		sql_query(sprintf(SQL_UNSET_SUGGESTION, sql_real_escape_string($id_user), sql_real_escape_string($id_activity)));
}

function	delete_suggestion($id_activity, $id_user)
{
	if ($_SESSION['update_activity'])
		sql_query(sprintf(SQL_DELETE_SUGGESTION, sql_real_escape_string($id_user), sql_real_escape_string($id_activity)));
}

function	add_suggestion($id_activity, $id_user)
{
	if ($_SESSION['update_activity'])
		sql_query(sprintf(SQL_ADD_SUGGESTION, sql_real_escape_string($id_user), sql_real_escape_string($id_activity)));
}

function	update_suggestion($id_activity, $id_user, $new_wl)
{
	if ($id_user == $_SESSION[SESSION_ID])
		sql_query(sprintf(SQL_ADD_SUGGESTION, sql_real_escape_string($new_wl), sql_real_escape_string($id_user), sql_real_escape_string($id_activity)));
}

