<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_activity">
    <fieldset>
      <legend>Generaly</legend>
      <xsl:if test="name">
	<xsl:value-of select="name" />
      </xsl:if>
    </fieldset>
    <xsl:if test="activity_work">
      <fieldset>
	<legend>Charge</legend>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity_work" />
	  </ul>
	</div>
      </fieldset>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
