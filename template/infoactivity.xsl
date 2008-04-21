<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="infoproject/infoproject">
    <tr>
      <td><xsl:value-of select="@name" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="infocharge/infocharge">
    <tr>
      <td><xsl:value-of select="@name" /></td>
      <td><xsl:value-of select="@activity" /></td>
      <td><xsl:value-of select="@answer" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="infoanswer/infoanswer">
    <div>
      <xsl:value-of select="@name" />
    </div>
  </xsl:template>

  <xsl:template match="infoactivity/infoproject">
    <table class="table">
      <caption>Projects' list</caption>
      <thead>
	<tr>
	  <th class="little">Projects' id</th>
	</tr>
      </thead>
      <tbody>
	<xsl:apply-templates select="infoproject" />
      </tbody>
    </table>
  </xsl:template>

  <xsl:template match="infoactivity/infocharge">
    <table class="table">
      <caption>Workload's table</caption>
      <thead>
	<tr>
	  <th class="little">Name</th>
	  <th class="little">Activity</th>
	  <th>Answer</th>
	</tr>
      </thead>
      <tbody>
	<xsl:apply-templates select="infocharge" />
      </tbody>
    </table>
  </xsl:template>

  <xsl:template match="infoactivity/infoaverage">
    <div class="box2 blue3">
      <h3 class="blue1">Average</h3>
      <div class="marg">
	<div class="bar">
	  <xsl:choose>
	    <xsl:when test="@average &gt; 50">
	      <div class="ok" style="width: {@average}%;">
		<xsl:value-of select="@average" />%
	      </div>
	      <div class="nok" />
	    </xsl:when>
	    <xsl:otherwise>
	      <div class="ok" style="width: {@average}%;" />
	      <div class="nok">
		<xsl:value-of select="@average" />%
	      </div>
	    </xsl:otherwise>
	  </xsl:choose>
	  <div class="clear" />
	</div>
      </div>
    </div>
  </xsl:template>

  <xsl:template match="infoactivity/infoanswer">
  </xsl:template>

  <xsl:template match="body/infoactivity">
    <div class="box2">
      <h3 class="blue1">Workload's infos</h3>
      <div class="marg">
	<xsl:apply-templates select="infoproject" />
	<xsl:apply-templates select="infocharge" />
	<xsl:apply-templates select="infoaverage" />
	<xsl:apply-templates select="infoanswer" />
      </div>
    </div>
  </xsl:template>
</xsl:stylesheet>
