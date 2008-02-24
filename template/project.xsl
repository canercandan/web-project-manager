<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project">
    <ul>
      <xsl:for-each select=".">
	<li>
	  <img src="./images/icons/less_not.png" />
	  <xsl:value-of select="." />
	</li>
      </xsl:for-each>
    </ul>
  </xsl:template>
</xsl:stylesheet>
