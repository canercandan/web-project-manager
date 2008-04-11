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
	  <xsl:apply-templates select="project_window" />
	</div>
      </xsl:when>
      <xsl:when test="add_project">
	<div class="box2">
	  <xsl:apply-templates select="add_project" />
	</div>
      </xsl:when>
      <xsl:otherwise>
	<div>
	  <xsl:if test="mesg">
	    <xsl:apply-templates select="mesg" />
	  </xsl:if>
	  <xsl:if test="error">
	    <xsl:apply-templates select="error" />
	  </xsl:if>
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
	  <xsl:if test="member">
	    <xsl:apply-templates select="member" />
	  </xsl:if>
	  <xsl:if test="passwd">
	    <xsl:apply-templates select="passwd" />
	  </xsl:if>
	</div>
      </xsl:otherwise>
    </xsl:choose>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
