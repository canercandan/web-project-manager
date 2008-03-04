<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="date_start">
    <xsl:variable name="day_name" select="@postday" />
    <xsl:variable name="day_id" select="@day" />
    <select name="{$day_name}[{../id}]">
      <xsl:for-each select="../../../../list_day/day">
	<xsl:choose>
	  <xsl:when test="$day_id=@id">
	    <option value="{@id}" selected="selected">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:when>
	  <xsl:otherwise>
	    <option value="{@id}">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:for-each>
    </select>
    <xsl:variable name="month_name" select="@postmonth" />
    <xsl:variable name="month_id" select="@month" />
    <select name="{$month_name}[{../id}]">
      <xsl:for-each select="../../../../list_month/month">
	<xsl:choose>
	  <xsl:when test="$month_id=@id">
	    <option value="{@id}" selected="selected">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:when>
	  <xsl:otherwise>
	    <option value="{@id}">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:for-each>
    </select>
    <xsl:variable name="year_name" select="@postyear" />
    <xsl:variable name="year_id" select="@year" />
    <select name="{$year_name}[{../id}]">
      <xsl:for-each select="../../../../list_year/year">
	<xsl:choose>
	  <xsl:when test="$year_id=@id">
	    <option value="{@id}" selected="selected">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:when>
	  <xsl:otherwise>
	    <option value="{@id}">
	      <xsl:value-of select="@value" />
	    </option>
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:for-each>
    </select>
  </xsl:template>
</xsl:stylesheet>
