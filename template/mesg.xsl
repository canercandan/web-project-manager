<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="mesg">
    <fieldset>
      <legend>Confirmation</legend>
      <div class="mesg">
	<xsl:choose>
	  <xsl:when test="line">
	    <xsl:for-each select="line">
	      <xsl:value-of select="." /><br />
	    </xsl:for-each>
	  </xsl:when>
	  <xsl:otherwise>
	    <xsl:value-of select="." />
	  </xsl:otherwise>
	</xsl:choose>
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
