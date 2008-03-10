<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="body">
    <xsl:if test="project!=''">
      <xsl:apply-templates select="project" />
    </xsl:if>
    <xsl:choose>
      <xsl:when test="project_window">
	<div class="box2">
	  <h2 class="blue2">
	    <xsl:value-of select="project_window/name" />
	  </h2>
	  <xsl:if test="project_window/admin">
	    <h3 class="blue1">Project Menu</h3>
	    <ul class="line">
	      <li class="go">
		<a href="?project=1&amp;information=1">Information</a>
	      </li>
	      <li class="go">
		<a href="?project=1&amp;member=1">Membres</a>
	      </li>
	      <li class="go">
		<a href="?project=1&amp;add_activity=1">Add an activity</a>
	      </li>
	      <li class="go">
		<a href="?project=1&amp;member_dategraph=1">History</a>
	      </li>
	    </ul>
	  </xsl:if>
	  <div class="menu blue2">
	    <xsl:if test="project_window/activity">
	      <xsl:apply-templates select="project_window/activity" />
	    </xsl:if>
	  </div>
	  <div class="box">
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
	  </div>
	  <div class="clear" />
	</div>
      </xsl:when>
      <xsl:when test="add_project">
	<div class="box2">
	  <xsl:apply-templates select="add_project" />
	</div>
      </xsl:when>
      <xsl:otherwise>
	<div>
	  <xsl:if test="home">
	    <xsl:apply-templates select="home" />
	  </xsl:if>
	  <xsl:if test="create">
	    <xsl:apply-templates select="create" />
	  </xsl:if>
	  <xsl:if test="connect">
	    <xsl:apply-templates select="connect" />
	  </xsl:if>
	  <xsl:if test="profil">
	    <xsl:apply-templates select="profil" />
	  </xsl:if>
	  <xsl:if test="administration">
	    <xsl:apply-templates select="administration" />
	  </xsl:if>
	</div>
      </xsl:otherwise>
    </xsl:choose>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
