<?php

require_once('./dategraph.php');
require_once('define_dategraph.php');

printf(PROJECT_MEMBER_DATEGRAPH_START);
print_tab_act_member_date($_SESSION['ACTIVITY_ID']);
printf(PROJECT_MEMBER_DATEGRAPH_END);

?>
