<?php

require_once('./dategraph.php');
require_once('define_dategraph.php');

printf(PROJECT_MEMBER_DATEGRAPH_START);
print_tab_proj_member_date($_SESSION['PROJECT_ID']);
printf(PROJECT_MEMBER_DATEGRAPH_END);

?>
