<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="field_title">
    <select name="{@name}">
      <xsl:for-each select="item">
	<option value="{@id}">
	  <xsl:value-of select="@name" />
	</option>
      </xsl:for-each>
    </select>
  </xsl:template>
</xsl:stylesheet>
