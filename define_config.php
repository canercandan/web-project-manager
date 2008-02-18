<?php

if (!MAIN)
  exit(0);

define('XML_CONTENT', '%s%s%s');

define('XML_HEADER',
       '<?xml version="1.0" encoding="iso-8859-1"?>
	<?xml-stylesheet type="text/xsl" href="./template.xsl"?>
	<doc>
	  <body>');

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

?>