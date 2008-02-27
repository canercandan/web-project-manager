<?php

if (!MAIN)
  exit(0);

function get_location()
{
	printf(LOCATION_START);
	$res = sql_query(SQL_GET_LOCATIONS);
	while ($tab = sql_fetch_array($res))
		{
			printf(LOCATION_ITEM, POST_LOCATION_MODNAME, POST_LOCATION_MODADDR, POST_LOCATION_MODID, $tab[0], $tab[1], $tab[2]);
		}
	printf(LOCATION_END);
}

function add_location($name, $addr)
{
	sql_query(sprintf(SQL_ADD_LOCATION, sql_real_escape_string($name),
										sql_real_escape_string($addr)));
}

function update_location($id_loc, $name, $addr)
{
	sql_query(sprintf(SQL_UPDATE_LOCATION, sql_real_escape_string($name),
										sql_real_escape_string($addr),
										sql_real_escape_string($id_loc)));
}

function get_title()
{
	$res = sql_query(SQL_GET_TITLES);
	while ($tab = sql_fetch_array($res))
		{
			printf(TITLE_ITEM, SUBMIT_MOD_TITLE, SUBMIT_DEL_TITLE, POST_TITLE_ID, POST_TITLE_NAME, $tab[0], $tab[1]);
		}
}
?>