<?php

if (!MAIN)
  exit(0);

define('XML_BODY', '%s%s%s');

define('XML_HEADER',
       '<?xml version="1.0" encoding="iso-8859-1"?>
	<?xml-stylesheet type="text/xsl" href="./template.xsl"?>
	<doc>
	  <body>');

define('XML_FOOTER',
       '  </body>
          <footer>
	    Copyleft by == candan_c, aubry_j, roser_m, lazaru_v
	  </footer>
	</doc>');

?>