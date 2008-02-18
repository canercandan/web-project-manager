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
	    <xsl:if test="doc/body/login">
	      <xsl:apply-templates select="doc/body/login" />
	    </xsl:if>
	  </div>
	  <div id="footer">
	    <xsl:apply-templates select="doc/footer" />
	  </div>
	</div>
      </body>
    </html>
  </xsl:template>
  <xsl:template match="footer">
    <xsl:value-of select="text" />
    <xsl:for-each select="autor">
      <span class="autor">
	<xsl:value-of select="." />,
      </span>
    </xsl:for-each>
  </xsl:template>
  <xsl:template match="login">
    <form action="#">
      <div>
	Login<br />
	<input type="text" name="login" /><br />
	Email<br />
	<input type="text" name="email" /><br />
      </div>
    </form>
  </xsl:template>
</xsl:stylesheet>
