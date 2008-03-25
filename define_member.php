<?php

if (!MAIN)
  exit(0);
  
/*
** Define member : name
*/

define('HEADER_CONNECT', 'Location:connect.php');

define('MEMBER_BEGIN', '<member>');
define('MEMBER_END', '</member>');

define('DESTROY', 'deco');
define('SESSION_DESTROY', '<sessdestroy post="%s" />');

define('MEMBER_WELCOME', '<memberwelcome value="Welcome on Techweb" />');

?>