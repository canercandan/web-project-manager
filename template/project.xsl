<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project">
    <h3 class="blue2">Project List</h3>
    <div class="list">
      <ul>
	<xsl:for-each select="project">
	  <li>
	    <a href="?project_id={id}">
	      <xsl:value-of select="title" />
	    </a>
	  </li>
	</xsl:for-each>
      </ul>
    </div>
  </xsl:template>
</xsl:stylesheet>
