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
	    <div id="nav">
	      <a href="#">Home</a><br />
	      <a href="#">Inscription</a><br />
	      <a href="#">Connexion</a><br />
	      <a href="#">Contact</a><br />
	    </div>
	    <div id="box">
	      <xsl:if test="doc/body/create">
		<xsl:apply-templates select="doc/body/create" />
	      </xsl:if>
	    </div>
	    <br class="clear" />
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
	<xsl:value-of select="." />
      </span>,
    </xsl:for-each>
  </xsl:template>
  <xsl:template match="create">
    <form action="#">
      <fieldset>
	<legend>Inscription</legend>
	<div class="form">
	  <label>
	    Login<br />
	    <input type="text" name="{field_login}" />
	  </label><br />
	  <label>
	    Password<br />
	    <input type="text" name="{field_passwd}" />
	  </label><br />
	  <label>
	    Email<br />
	    <input type="text" name="{field_email}" />
	  </label><br />
	  <input type="submit" value="Ok" />
	</div>
      </fieldset>
    </form>
  </xsl:template>
</xsl:stylesheet>
