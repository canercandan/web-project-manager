<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="project_window">
    <h2 class="blue2">
      <xsl:value-of select="name" />
    </h2>
    <xsl:if test="admin">
      <h3 class="blue1">Project's menu</h3>
      <ul class="line">
	<li class="go">
	  <a href="?project=1&amp;information=1">Informations</a>
	</li>
	<li class="go">
	  <a href="?project=1&amp;member=1">Members</a>
	</li>
	<xsl:if test="projectright/@add_activity=1">
	  <li class="go">
	    <a href="?project=1&amp;add_activity=1">Add an activity</a>
	  </li>
	</xsl:if>
	<li class="go">
	  <a href="?project=1&amp;gantt=1">Gantt</a>
	</li>
	<xsl:if test="projectright/@read_file=1">
	<li class="go">
	  <a href="?project=1&amp;archive=1">Archive</a>
	</li>
	</xsl:if>
	<li class="go">
	  <a href="agenda.php">Agenda</a>
	</li>
	<li class="go">
	  <a href="phorum/?{@id}">Forum</a>
	</li>
	<xsl:if test="projectright/@remove_project=1">
	  <li class="go">
	    <a href="?project=1&amp;delete_project=1">Remove</a>
	  </li>
	</xsl:if>
      </ul>
    </xsl:if>
    <div class="menu blue2">
      <xsl:if test="activity">
	<h3 class="blue1">Activity's list</h3>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity" />
	  </ul>
	</div>
      </xsl:if>
    </div>
    <div class="box">
      <xsl:if test="error">
	<xsl:apply-templates select="error" />
      </xsl:if>
      <xsl:if test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:if>
      <xsl:choose>
	<xsl:when test="activity_window">
	  <h2 class="blue3">
	    <xsl:value-of select="activity_window/name" />
	  </h2>
	  <xsl:if test="activity_window/admin">
	    <h3 class="blue1">Activity's menu</h3>
	    <ul class="line">
	      <li class="go">
		<a href="?activity=1&amp;information=1">Informations</a>
	      </li>
	      <li class="go">
		<a href="?activity=1&amp;member=1">Members</a>
	      </li>
	      <xsl:if test="projectright/@add_subactivity=1 or activity_window/activityright/@add_subactivity=1">
		<li class="go">
		  <a href="?activity=1&amp;add_activity=1">Add a sub-activity</a>
		</li>
	      </xsl:if>
	      <li class="go">
		<a href="?activity=1&amp;wl_suggestion=1">Workload suggestions</a>
	      </li>
	      <li class="go">
		<a href="phorum/?{activity_window/@id + 1000000}">Forum</a>
	      </li>
	      <xsl:if test="projectright/@remove_activity=1 or activity_window/activityright/@remove_activity=1">
		<li class="go">
		  <a href="?activity=1&amp;delete_activity=1">Remove</a>
		</li>
	      </xsl:if>
	    </ul>
	  </xsl:if>
	  <xsl:apply-templates select="activity_window" />
	</xsl:when>
	<xsl:otherwise>
	  <xsl:choose>
	    <xsl:when test="add_activity">
	      <xsl:apply-templates select="add_activity" />
	    </xsl:when>
	    <xsl:when test="member_project">
	      <xsl:apply-templates select="member_project" />
	    </xsl:when>
	    <xsl:when test="information_project">
	      <xsl:apply-templates select="information_project" />
	    </xsl:when>
	    <xsl:when test="project_member_dategraph">
	      <xsl:apply-templates select="project_member_dategraph" />
	    </xsl:when>
	    <xsl:when test="gantt">
	      <xsl:apply-templates select="gantt" />
	    </xsl:when>
	    <xsl:when test="archive">
	      <xsl:apply-templates select="archive" />
	    </xsl:when>
	  </xsl:choose>
	</xsl:otherwise>
      </xsl:choose>
    </div>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
