<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_window">
    <h2 class="blue3">
      <xsl:value-of select="name" />
    </h2>
    <div class="menu blue3">
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
    </div>
    <div class="box marg">
      <xsl:choose>
	<xsl:when test="add_activity">
	  <xsl:apply-templates select="add_activity" />
	</xsl:when>
	<xsl:when test="information_activity">
	  <xsl:apply-templates select="information_activity" />
	</xsl:when>
	<xsl:when test="member_activity">
	  <xsl:apply-templates select="member_activity" />
	</xsl:when>
      </xsl:choose>
    </div>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
