<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="listnotin/user">
    <tr>
      <td>
	<input type="checkbox" name="{../../../select/@name}" value="{@id}" />
      </td>
      <td><xsl:value-of select="@login" /></td>
      <td><xsl:value-of select="@name" /></td>
      <td><xsl:value-of select="@fname" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="listin/user">
    <tr>
      <td>
	<input type="checkbox" name="{../../../select/@name}" value="{@id}" />
      </td>
      <td><xsl:value-of select="@login" /></td>
      <td><xsl:value-of select="@name" /></td>
      <td><xsl:value-of select="@fname" /></td>
      <td><xsl:value-of select="@suggestion" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="activity_suggestion[@developped=1]/listnotin">
    <table>
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
  </xsl:template>

  <xsl:template match="activity_suggestion[@developped=1]/listin">
    <table>
      <thead>
	<tr>
	  <th class="little" />
	  <th>Username</th>
	  <th>Last name</th>
	  <th>First name</th>
	  <th>Suggestion</th>
	</tr>
      </thead>
      <tbody>
	<xsl:apply-templates select="user" />
      </tbody>
    </table>
  </xsl:template>

  <xsl:template match="wl_suggestion/activity_suggestion[@developped=1]">
    <xsl:if test="@right=1">
      <xsl:apply-templates select="listnotin" />
    </xsl:if>
    <xsl:apply-templates select="listin" />
  </xsl:template>

  <xsl:template match="wl_suggestion">
    <fieldset>
      <legend>Charge suggestion</legend>
      <div>
	<xsl:apply-templates select="activity_suggestion" />
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
