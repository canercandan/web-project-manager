<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project">
    <div class="menu">
      project menu
      <xsl:if test="doc/body/project/project">
	<div class="list">
	  <xsl:apply-templates select="doc/body/project/project" />
	</div>
      </xsl:if>
    </div>
    <div class="box">
      <div class="menu">
	<xsl:apply-templates select="doc/body/project_window/admin" />
	activity menu
	<xsl:if test="doc/body/project_window/activity">
	  <div class="list">
	    <xsl:apply-templates select="doc/body/project_window/activity" />
	  </div>
	</xsl:if>
      </div>
      <div class="box">
	<div class="menu">
	  <xsl:apply-templates select="doc/body/project_window/activity_window/admin" />
	</div>
	<div class="box">
	  activity box
	  <xsl:if test="doc/body/project_window/add_activity">
	    <xsl:apply-templates select="doc/body/project_window/add_activity" />
	  </xsl:if>
	  <xsl:if test="doc/body/project_window/activity_window">
	    <xsl:apply-templates select="doc/body/project_window/activity_window" />
	  </xsl:if>
	</div>
	<br class="clear" />
      </div>
      <br class="clear" />
    </div>
    <br class="clear" />
  </xsl:template>
</xsl:stylesheet>
