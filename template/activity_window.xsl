<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_window">
    <xsl:if test="admin">
      <h3 class="blue1">Activity Menu</h3>
      <ul>
	<li class="go">
	  <a href="?activity=1&amp;information=1">Information</a>
	</li>
	<li class="go">
	  <a href="?activity=1&amp;member=1">Membres</a>
	</li>
	<li class="go">
	  <a href="?activity=1&amp;add_activity=1">Add an sub-activity</a>
	</li>
      </ul>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
