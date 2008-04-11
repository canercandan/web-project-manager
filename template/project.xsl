<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project">
    <h3 class="blue2">Project's list</h3>
    <ul class="line">
      <xsl:for-each select="project">
	<li class="open">
	  <a href="./root.php?project_id={id}">
	    <xsl:value-of select="title" />
	  </a>
	</li>
      </xsl:for-each>
    </ul>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
