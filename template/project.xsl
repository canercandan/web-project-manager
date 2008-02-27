<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project">
    <h3 class="blue2">Generaly Menu</h3>
    <ul>
      <li class="add">
	<a href="./root.php?project_add=1">Add a project</a>
      </li>
    </ul>
    <br />
    <h3 class="blue2">Project List</h3>
    <ul>
      <xsl:for-each select="project">
	<li class="open">
	  <a href="?project_id={id}">
	    <xsl:value-of select="title" />
	  </a>
	</li>
      </xsl:for-each>
    </ul>
  </xsl:template>
</xsl:stylesheet>
