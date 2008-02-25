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

?>