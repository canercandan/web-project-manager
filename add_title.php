<?php

require_once('./define_admin.php');
require_once('function_admin.php');

printf(ADD_TITLE_START);
if (isset($_POST['SUBMIT_MOD_TITLE'])
{
	//printf(XML_MESG, sprintf(TITLE_MODIFIED,));
	//_title($_POST['POST_TITLE_ID']);
}

else if (isset($_POST['SUBMIT_DEL_TITLE'] && isset($_POST['POST_TITLE_ID']))
{
	printf(XML_MESG, TITLE_DELETED);
	delete_title($_POST['POST_TITLE_ID'])
}
else if (isset($_POST['POST_TITLE_NAME']) && $_POST['POST_TITLE_NAME'] != "")
{
	printf(XML_MESG, TITLE_OK);
	add_title($_POST['POST_TITLE_NAME'])
}

get_title();
printf(FIELD_TITLE_NAME, '', POST_TITLE_NAME);
printf(ADD_TITLE_END);
?>