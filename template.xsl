<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="iso-8859-1"
	      indent="yes" />
  <xsl:template match="/">
    <html>
      <head>
	<title>TechWeb</title>
	<link rel="stylesheet" type="text/css"
	      href="./css/styles.css" />
      </head>
      <body>
	<div id="content">
	  <div id="header">
	    <h1>TechWeb</h1>
	  </div>
	  <div id="body">
	    <xsl:if test="doc/content/login">
	      <xsl:apply-templates
		 select="doc/content/login" />
	    </xsl:if>
	  </div>
	  <div id="footer">
	    Copyleft by candan_c, aubry_j,
	    roser_m, lazaru_v.
	  </div>
	</div>
      </body>
    </html>
  </xsl:template>
  <xsl:template match="login">
  </xsl:template>
</xsl:stylesheet>
