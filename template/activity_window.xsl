<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_window">
    <xsl:if test="information_activity">
      <xsl:if test="information_activity/activity_work">
	<xsl:apply-templates select="information_activity/activity_work" />
      </xsl:if>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
