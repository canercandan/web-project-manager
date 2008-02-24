<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_work">
    <xsl:value-of select="name" />
    (<xsl:value-of select="id" />)
    charge:
    <xsl:value-of select="charge" />
    <br />
    <xsl:apply-templates select="activity_work" />
  </xsl:template>
</xsl:stylesheet>
