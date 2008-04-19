<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="member_project/member_list">
    <thead>
      <tr>
	<th class="little" />
	<th>Username</th>
	<th>Last Name</th>
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
	<xsl:if test="../../projectright/@update_member=1">
	  <th class="little" />
	</xsl:if>
	<th>Username</th>
	<th>Last Name</th>
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
      <xsl:if test="../../../projectright/@update_member=1">
	<td>
	  <input type="checkbox"
		 name="{../checkbox/@name}[]"
		 value="{key/@unique}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@day_start}]"
		 value="{date_start/@day}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@month_start}]"
		 value="{date_start/@month}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@year_start}]"
		 value="{date_start/@year}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@day_end}]"
		 value="{date_end/@day}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@month_end}]"
		 value="{date_end/@month}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@year_end}]"
		 value="{date_end/@year}" />
	  <input type="hidden"
		 name="{key/@name}[{key/@unique}][{key/@id}]"
		 value="{id}" />
	</td>
      </xsl:if>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td>
	<xsl:variable name="id" select="role" />
	<xsl:choose>
	  <xsl:when test="../../../projectright/@update_member=1">
	    <select name="{role/@post}[{key/@unique}]">
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
	  </xsl:when>
	  <xsl:otherwise>
	    <xsl:for-each select="../role_list/role[@id=$id]">
	      <xsl:value-of select="@name" />
	    </xsl:for-each>
	  </xsl:otherwise>
	</xsl:choose>
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_project">
    <fieldset>
      <legend>Project's members</legend>
      <xsl:if test="../projectright/@add_member=1">
	<form action="?" method="post">
	  <div class="member_list">
	    <table class="table">
	      <caption>Users available</caption>
	      <xsl:apply-templates select="member_list" />
	    </table>
	    <div class="form big">
	      <input type="submit" name="{btn_down/@post}" value="Add to members" />
	    </div>
	  </div>
	</form>
      </xsl:if>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Members</caption>
	    <xsl:apply-templates select="member_list_project" />
	  </table>
	  <div class="form big">
	    <xsl:if test="../projectright/@update_member=1">
	      <input type="submit" name="{btn_update/@post}" value="Update" />
	    </xsl:if>
	    <xsl:if test="../projectright/@kick_member=1">
	      <input type="submit" name="{btn_up/@post}" value="Delete" />
	    </xsl:if>
	  </div>
	</div>
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
