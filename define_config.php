<?php

if (!MAIN)
  exit(0);

define('HEADER_CONTENT_TYPE', 'Content-Type: text/xml');

define('XML_HEADER',
       '<?xml version="1.0" encoding="iso-8859-1"?>
	%s
	<doc>
	  <header level="%d" />
	  <body>');

define('XML_TEMPLATE',
       '<?xml-stylesheet type="text/xsl" href="./template.xsl"?>');

define('XML_NO_TEMPLATE', '');

define('XML_FOOTER',
       '  </body>
          <footer text="Designed by">
	    <autor name="candan_c" />
	    <autor name="aubry_j" />
	    <autor name="roser_m" />
	    <autor name="lazaru_v comes back, YEAH!!!" />
	  </footer>
	</doc>');

define('XML_ERROR',
       '<error>%s</error>');

define('XML_MESG',
       '<mesg>%s</mesg>');

define('ADMIN', '<admin>%d</admin>');
define('FIELD_NOT_FILLED', 'Please fill all the fields');

define('DEBUG', 'debug');

define('SQL_HOST', 'localhost');
define('SQL_USER', 'techweb');
define('SQL_PASSWD', ',MyTFfwCvKA5SBNL');
define('SQL_DB', 'techweb');

define('MENU_PROJECT', '<menu_project/>');

define('SESS_NAME', 'techweb');

?>