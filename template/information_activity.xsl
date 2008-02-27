<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_activity">
    <div class="list">
      <xsl:if test="activity_work">
	<xsl:apply-templates select="activity_work" />
      </xsl:if>
    </div>
  </xsl:template>
</xsl:stylesheet>
