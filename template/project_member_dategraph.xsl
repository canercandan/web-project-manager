<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="line[@legend=1]/item">
    <xsl:for-each select=".">
      <td>
	<xsl:value-of select="@legend" />
      </td>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="line[@legend=0]/item">
    <xsl:choose>
      <xsl:when test="@color=1">
	<div style="background-color: Gray;" />
      </xsl:when>
      <xsl:when test="@color=2">
	<div style="background-color: LightSteelBlue;" />
      </xsl:when>
      <xsl:otherwise>
	<div style="background-color: WhiteSmoke;" />
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>

  <xsl:template match="tab_date/line[@legend=1]">
    <tr class="little">
      <th>Date</th>
      <xsl:apply-templates select="item" />
    </tr>
  </xsl:template>

  <xsl:template match="tab_date/line[@legend=0]">
    <xsl:for-each select=".">
      <div>
	<xsl:value-of select="@name" />
      </div>
      <xsl:apply-templates select="item" />
    </xsl:for-each>
    <br />
  </xsl:template>

  <xsl:template match="project_member_dategraph/tab_date">
    <div class="history">
      <xsl:apply-templates select="line[@legend=0]" />
    </div>
  </xsl:template>

  <xsl:template match="project_member_dategraph">
    <fieldset>
      <legend>History</legend>
      <xsl:apply-templates select="tab_date" />
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
