<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="footer">
    <xsl:value-of select="text" />
    <xsl:for-each select="autor">
      <span class="autor">
	<xsl:value-of select="." />
      </span>,
    </xsl:for-each>
  </xsl:template>
</xsl:stylesheet>
