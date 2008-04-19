<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="item/@value">
    <div class="title">
      <xsl:value-of select="." />
    </div>
    <xsl:variable name="day" select="." />
    <xsl:for-each select="../../../event/item[@day=$day]">
      <xsl:sort select="@hour" />
      <div class="line">
	<xsl:value-of select="@hour" /> h
	-
	<xsl:value-of select="@subject" />
      </div>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="agenda[@view=2]/hour">
    <xsl:for-each select="item">
      <xsl:choose>
	<xsl:when test="@value">
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	  <div class="clear" />
	</xsl:when>
	<xsl:otherwise>
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	</xsl:otherwise>
      </xsl:choose>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="agenda[@view=3]/day">
    <xsl:for-each select="item">
      <xsl:choose>
	<xsl:when test="@value mod 5=0">
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	  <div class="clear" />
	</xsl:when>
	<xsl:otherwise>
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	</xsl:otherwise>
      </xsl:choose>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="agenda[@view=4]/month">
    <xsl:for-each select="item">
      <xsl:choose>
	<xsl:when test="@value mod 5=0">
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	  <div class="clear" />
	</xsl:when>
	<xsl:otherwise>
	  <div class="event">
	    <xsl:apply-templates select="@value" />
	  </div>
	</xsl:otherwise>
      </xsl:choose>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="body/agenda[@view=4]">
    <fieldset>
      <legend>Agenda</legend>
      <h2>
	Year's view :<br />
	<xsl:value-of select="@year" />
      </h2>
      <div class="form">
	<a href="?get_view={@view}&amp;year={@year - 1}">Previous</a>
	-
	<a href="?get_view={@view}&amp;year={@year + 1}">Next</a>
      </div>
      <div class="agenda">
	<xsl:apply-templates select="month" />
      </div>
    </fieldset>
  </xsl:template>

  <xsl:template match="body/agenda[@view=3]">
    <fieldset>
      <legend>Agenda</legend>
      <h2>
	Month's view :<br />
	<xsl:value-of select="@year" />
	-
	<xsl:value-of select="@month" />
      </h2>
      <div class="form">
	<a href="?get_view={@view}&amp;year={@year}&amp;month={@month - 1}">Previous</a>
	-
	<a href="?get_view={@view}&amp;year={@year}&amp;month={@month + 1}">Next</a>
      </div>
      <div class="agenda">
	<xsl:apply-templates select="day" />
      </div>
    </fieldset>
  </xsl:template>

  <xsl:template match="body/agenda[@view=2]">
    <fieldset>
      <legend>Agenda</legend>
      <h2>
	Day's view :<br />
	<xsl:value-of select="@year" />
	-
	<xsl:value-of select="@month" />
	-
	<xsl:value-of select="@day" />
      </h2>
      <div class="form">
	<a href="?get_view={@view}&amp;year={@year}&amp;month={@month}&amp;day={@day - 1}">Previous</a>
	-
	<a href="?get_view={@view}&amp;year={@year}&amp;month={@month}&amp;day={@day + 1}">Next</a>
      </div>
      <div class="agenda">
	<xsl:apply-templates select="hour" />
      </div>
      <div />
    </fieldset>
  </xsl:template>

  <xsl:template match="body/agenda[@view=1]">
    <fieldset>
      <legend>Agenda</legend>
      <h2>
	Hour's view :<br />
	<xsl:value-of select="@hour" />
      </h2>
      <div class="form">
	<xsl:apply-templates select="hours" />
      </div>
      <div />
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
