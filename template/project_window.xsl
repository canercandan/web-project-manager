<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project_window">
    <xsl:if test="admin">
      <h3 class="blue1">Project Menu</h3>
      <ul>
	<li>
	  <a href="?project=1&amp;information=1">Information</a>
	</li>
	<li>
	  <a href="?project=1&amp;member=1">Membres</a>
	</li>
	<li>
	  <a href="?project=1&amp;add_activity=1">Add an activity</a>
	</li>
      </ul>
      <br />
    </xsl:if>
    <xsl:if test="activity">
      <h3 class="blue1">Activity List</h3>
      <div class="list">
	<ul>
	  <xsl:apply-templates select="activity" />
	</ul>
      </div>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
