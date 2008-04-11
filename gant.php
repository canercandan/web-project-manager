<?php

require_once('function_gant.php');

printf(GANTT_BEGIN);
show_gant($_SESSION['PROJECT_ID']);
printf(GANTT_END);

?>