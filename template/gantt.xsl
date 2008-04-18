<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="line[@legend=1]/item">
    <div class="legend" style="width: {@width}%;">
      <xsl:value-of select="@legend" />
    </div>
  </xsl:template>

  <xsl:template match="line[@legend=0]/item">
    <xsl:choose>
      <xsl:when test="@title=1">
	<xsl:choose>
	  <xsl:when test="@color=1">
	    <div style="background-color: LightGrey; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:when>
	  <xsl:when test="@color=2">
	    <div style="background-color: LightSteelBlue; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:when>
	  <xsl:when test="@color=3">
	    <div style="background-color: LightSlateGray; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:when>
	  <xsl:when test="@color=4">
	    <div style="background-color: Black; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:when>
	  <xsl:when test="@color=5">
	    <div style="background-color: Black; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:when>
	  <xsl:otherwise>
	    <div style="background-color: #eee; width: {@width}%;"
		 title="{@legend}" />
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:when>
      <xsl:otherwise>
	<xsl:choose>
	  <xsl:when test="@color=1">
	    <div style="background-color: LightGrey; width: {@width}%;" />
	  </xsl:when>
	  <xsl:when test="@color=2">
	    <div style="background-color: LightSteelBlue; width: {@width}%;" />
	  </xsl:when>
	  <xsl:when test="@color=3">
	    <div style="background-color: LightSlateGray; width: {@width}%;" />
	  </xsl:when>
	  <xsl:when test="@color=4">
		<div style="background-color: Black; width: {@width}%;" />
	  </xsl:when>
	  <xsl:when test="@color=5">
		<div style="background-color: Black; width: {@width}%;" />
	  </xsl:when>
	  <xsl:otherwise>
	    <div style="background-color: #eee; width: {@width}%;" />
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:otherwise>
    </xsl:choose>

  </xsl:template>

  <xsl:template match="tab_date/line[@legend=1]">
    <div class="col">
      <div class="name" style="background-color: WhiteSmoke;" />
      <xsl:apply-templates select="item" />
    </div>
  </xsl:template>

  <xsl:template match="tab_date/line[@legend=0]">
    <div class="col">
      <xsl:choose>
	<xsl:when test="@colorbg=0">
	  <div class="name" style="background-color: #eee;">
	    <xsl:value-of select="@name" />
	  </div>
	</xsl:when>
	<xsl:otherwise>
	  <div class="name" style="background-color: LightGrey;">
	    <xsl:value-of select="@name" />
	  </div>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:apply-templates select="item" />
      <div class="clear" />
    </div>
  </xsl:template>

  <xsl:template match="gantt/tab_date">
    <div class="gantt">
	  <xsl:apply-templates select="line[@legend=1]" />
      <xsl:apply-templates select="line[@legend=0]" />
      <xsl:apply-templates select="line[@legend=1]" />
    </div>
  </xsl:template>

  <xsl:template match="project_window/gantt">
    <fieldset>
      <legend>Gantt</legend>
      <xsl:apply-templates select="tab_date" />
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
