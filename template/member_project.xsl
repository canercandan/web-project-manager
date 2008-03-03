<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="member_project/member_list">
    <thead>
      <tr>
	<th>Select</th>
	<th>Login</th>
	<th>Name</th>
	<th>First name</th>
	<th>Title</th>
      </tr>
    </thead>
    <tbody>
      <xsl:apply-templates select="member" />
    </tbody>
  </xsl:template>

  <xsl:template match="member_project/member_list_project">
    <thead>
      <tr>
	<th>Select</th>
	<th>Login</th>
	<th>Name</th>
	<th>First name</th>
	<th>Title</th>
	<th>Role</th>
      </tr>
    </thead>
    <tbody>
      <xsl:apply-templates select="member" />
    </tbody>
  </xsl:template>

  <xsl:template match="member_project/member_list/member">
    <tr>
      <td>
	<input type="checkbox" name="{../checkbox/@name}[]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="member_project/member_list_project/member">
    <tr>
      <td>
	<input type="checkbox" name="{../checkbox/@name}[]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td>
	<xsl:variable name="id" select="id" />
	<select name="{role/@post}">
	  <xsl:for-each select="../role_list/role">
	    <xsl:choose>
	      <xsl:when test="@id=$id">
		<option value="{@id}" selected="selected">
		  <xsl:value-of select="@name" />
		</option>
	      </xsl:when>
	      <xsl:otherwise>
		<option value="{@id}">
		  <xsl:value-of select="@name" />
		</option>
	      </xsl:otherwise>
	    </xsl:choose>
	  </xsl:for-each>
	</select>
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_project">
    <fieldset>
      <legend>Members activity</legend>
      <form action="?" method="post">
	<div class="member_top">
	  <table class="table">
	    <caption>Members list</caption>
	    <xsl:apply-templates select="member_list" />
	  </table>
	</div>
	<div class="member_middle">
	  Role<br />
	  <select name="{member_list_project/role_list/@post}">
	    <xsl:for-each select="member_list_project/role_list/role">
	      <option value="{@id}">
		<xsl:value-of select="@name" />
	      </option>
	    </xsl:for-each>
	  </select>
	  <br />
	  <br />
	  <input type="submit" name="{btn_up/@post}" value="/\" />
	  <input type="submit" name="{btn_down/@post}" value="\/" />
	</div>
	<div class="member_bottom">
	  <table class="table">
	    <caption>Member list of project</caption>
	    <xsl:apply-templates select="member_list_project" />
	  </table>
	  <div class="form">
	    <input type="submit" name="{btn_submit/@post}" value="Update" />
	  </div>
	</div>
	<div class="clear" />
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
