<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="listnotin/user">
    <tr>
      <td>
	<input type="checkbox" name="{../../../select/@name}[{@id}]" value="{@id}" />
      </td>
      <td><xsl:value-of select="@login" /></td>
      <td><xsl:value-of select="@name" /></td>
      <td><xsl:value-of select="@fname" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="listin/user">
    <tr>
      <td>
	<input type="checkbox" name="{../../../select/@name}[{@id}]" value="{@id}" />
      </td>
      <td><xsl:value-of select="@login" /></td>
      <td><xsl:value-of select="@name" /></td>
      <td><xsl:value-of select="@fname" /></td>
      <td class="little">
	<xsl:choose>
	  <xsl:when test="@editable=1">
	    <input type="text" name="{../../../txtbox_sugg/@name}[{@id}]" value="{@suggestion}" />
	  </xsl:when>
	  <xsl:otherwise>
	    <input type="text" value="{@suggestion}" disabled="disabled" />
	  </xsl:otherwise>
	</xsl:choose>
      </td>
      <xsl:choose>
	<xsl:when test="@editable=1">
	  <td>
	    <input type="submit" name="{../../../buttonunset/@name}[{@id}]" value="Unset" />
	  </td>
	  <td>
	    <input type="submit" name="{../../../buttonupdate/@name}[{@id}]" value="Update" />
	  </td>
	</xsl:when>
	<xsl:otherwise>
	  <td>
	    <input type="submit" value="X" disabled="disabled" />
	  </td>
	  <td>
	    <input type="submit" value="X" disabled="disabled" />
	  </td>
	</xsl:otherwise>
      </xsl:choose>
    </tr>
  </xsl:template>

  <xsl:template match="activity_suggestion[@developped=1]/listnotin">
    <form action="?" method="post">
      <table class="table">
	<caption>Not questioned members</caption>
	<thead>
	  <tr>
	    <th class="little" />
	    <th>Username</th>
	    <th>Last name</th>
	    <th>First name</th>
	  </tr>
	</thead>
	<tbody>
	  <xsl:apply-templates select="user" />
	</tbody>
      </table>
      <div class="form">
	<input type="submit" class="big" name="{../../buttonadd/@name}" value="Question" />
      </div>
      <br />
    </form>
  </xsl:template>

  <xsl:template match="activity_suggestion[@developped=1]/listin">
    <form action="?" method="post">
      <table class="table">
	<caption>Questioned members</caption>
	<thead>
	  <tr>
	    <th class="little" />
	    <th>Username</th>
	    <th>Last name</th>
	    <th>First name</th>
	    <th>Suggestion</th>
	    <th>Unset</th>
	    <th>Update</th>
	  </tr>
	</thead>
	<tbody>
	  <xsl:apply-templates select="user" />
	</tbody>
      </table>
      <xsl:if test="../@right=1">
	<div class="form">
	  <input class="bigbig" type="submit" name="{../buttondel/@name}" value="Remove from questioned members" />
	</div>
      </xsl:if>
      <xsl:if test="../@right=1 and result/@value!=''">
	<br />
	<table class="table" style="width: 25%;">
	  <tbody>
	    <th class="little marg">Mean</th>
	    <td class="marg"><xsl:value-of select="result/@value" /></td>
	    <th class="little"><input class="big" type="submit" name="{../../buttonset/@name}" value="Set as new workload" /></th>
	  </tbody>
	</table>
      </xsl:if>
    </form>
  </xsl:template>

  <xsl:template match="wl_suggestion/activity_suggestion[@developped=1]">
    <xsl:if test="@right=1">
      <xsl:apply-templates select="listnotin" />
    </xsl:if>
    <xsl:apply-templates select="listin" />
  </xsl:template>

  <xsl:template match="wl_suggestion">
    <fieldset>
      <legend>Workload suggestion</legend>
      <div>
	<xsl:apply-templates select="activity_suggestion" />
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
