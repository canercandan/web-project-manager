<?php

if (!MAIN)
  exit(0);

define('HEADER_CONTENT_TYPE', 'Content-Type: text/xml');

define('XML_HEADER',
       '<?xml version="1.0" encoding="iso-8859-1"?>
	%s
	<doc>
	  <body>');

define('XML_TEMPLATE',
       '<?xml-stylesheet type="text/xsl" href="./template.xsl"?>');

define('XML_NO_TEMPLATE', '');

define('XML_FOOTER',
       '  </body>
          <footer>
	    <text>Copyleft by </text>
	    <autor>candan_c</autor>
	    <autor>aubry_j</autor>
	    <autor>roser_m</autor>
	    <autor>lazaru_v</autor>
	  </footer>
	</doc>');

define('XML_ERROR',
       '<error>%s</error>');

define('XML_MESG',
       '<mesg>%s</mesg>');

?>