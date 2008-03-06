<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_window">
    <xsl:if test="error">
      <xsl:apply-templates select="error" />
    </xsl:if>
    <xsl:choose>
      <xsl:when test="add_activity">
	<xsl:apply-templates select="add_activity" />
      </xsl:when>
      <xsl:when test="information_activity">
	<xsl:apply-templates select="information_activity" />
      </xsl:when>
      <xsl:when test="member_activity">
	<xsl:apply-templates select="member_activity" />
      </xsl:when>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
