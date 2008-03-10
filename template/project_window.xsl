<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project_window/activity">
    <h3 class="blue1">Activity List</h3>
    <div class="list">
      <ul>
	<xsl:apply-templates select="activity" />
      </ul>
    </div>
  </xsl:template>
</xsl:stylesheet>
