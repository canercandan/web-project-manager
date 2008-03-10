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
	<th>Date begin</th>
	<th>Date end</th>
      </tr>
    </thead>
    <tbody>
      <xsl:apply-templates select="member" />
    </tbody>
  </xsl:template>

  <xsl:template match="member_project/member_histo_list_project">
    <thead>
      <tr>
	<th>Select</th>
	<th>Login</th>
	<th>Name</th>
	<th>First name</th>
	<th>Title</th>
	<th>Role</th>
	<th>Date begin</th>
	<th>Date end</th>
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
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td>
	<xsl:variable name="id" select="id" />
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
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_start" />
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_end" />
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_project/member_histo_list_project/member">
    <tr>
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
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td>
	<xsl:variable name="id" select="id" />
	<select name="{role/@post}[{$id}]">
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
      <td class="little2">
	<xsl:apply-templates select="date_start" />
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_end" />
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_project">
    <fieldset>
      <legend>Members project</legend>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Project's members</caption>
	    <xsl:apply-templates select="member_list" />
	  </table>
	  <div class="form big">
	    <input type="submit" name="{btn_down/@post}" value="Add to active members" />
	  </div>
	</div>
      </form>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Active or future members</caption>
	    <xsl:apply-templates select="member_list_project" />
	  </table>
	  <div class="form big">
	    <input type="submit" name="{btn_update/@post}" value="Update" />
	    <input type="submit" name="{btn_up/@post}" value="Delete" />
	    <input type="submit" name="{btn_histo/@post}" value="Move to old members" />
	  </div>
	</div>
      </form>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Old members' entries</caption>
	    <xsl:apply-templates select="member_project/member_histo_list_project" />
	  </table>
	  <div class="form big">
	    <input type="submit" name="{btn_update_histo/@post}" value="Update" />
	    <input type="submit" name="{btn_delete_histo/@post}" value="Delete" />
	  </div>
	</div>
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
