<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project_window">
    <xsl:choose>
      <xsl:when test="project_window/activity_window">
	<h2 class="blue3">
	  <xsl:value-of select="project_window/activity_window/name" />
	</h2>
	<xsl:if test="project_window/activity_window/admin">
	  <h3 class="blue1">Activity Menu</h3>
	  <ul class="line">
	    <li class="go">
	      <a href="?activity=1&amp;information=1">Information</a>
	    </li>
	    <li class="go">
	      <a href="?activity=1&amp;member=1">Membres</a>
	    </li>
	    <li class="go">
	      <a href="?activity=1&amp;add_activity=1">Add an sub-activity</a>
	    </li>
	    <li class="go">
	      <a href="?activity=1&amp;member_dategraph=1">History</a>
	    </li>
	  </ul>
	</xsl:if>
	<xsl:apply-templates select="project_window/activity_window" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:choose>
	  <xsl:when test="project_window/add_activity">
	    <xsl:apply-templates select="project_window/add_activity" />
	  </xsl:when>
	  <xsl:when test="project_window/member_project">
	    <xsl:apply-templates select="project_window/member_project" />
	  </xsl:when>
	  <xsl:when test="project_window/information_project">
	    <xsl:apply-templates select="project_window/information_project" />
	  </xsl:when>
	  <xsl:when test="project_window/project_member_dategraph">
	    <xsl:apply-templates select="project_window/project_member_dategraph" />
	  </xsl:when>
	</xsl:choose>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
