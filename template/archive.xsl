<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="archive/current_folder/folder">
    <li>
      <img src="./images/icons/less_not.png" />
      <xsl:value-of select="@name" />
    </li>
  </xsl:template>

  <xsl:template match="project_window/archive">
    <fieldset>
      <legend>Archive</legend>
      <div class="menu blue2">
	<h3 class="blue1">
	  Current folder:
	  <xsl:value-of select="current_folder/@name" />
	</h3>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="current_folder/folder" />
	  </ul>
	</div>
      </div>
      <div class="box">
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
