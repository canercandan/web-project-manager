<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="member_activity/member_list_project">
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

  <xsl:template match="member_activity/member_list_activity">
    <thead>
      <tr>
	<th>Select</th>
	<th>Login</th>
	<th>Name</th>
	<th>First name</th>
	<th>Title</th>
	<th>Role</th>
	<th>Admin</th>
	<th>Work</th>
	<th>Date begin</th>
	<th>Date end</th>
      </tr>
    </thead>
    <tbody>
      <xsl:apply-templates select="member" />
    </tbody>
  </xsl:template>

  <xsl:template match="member_activity/member_histo_list_activity">
    <thead>
      <tr>
	<th>Select</th>
	<th>Login</th>
	<th>Name</th>
	<th>First name</th>
	<th>Title</th>
	<th>Role</th>
	<th>Admin</th>
	<th>Work</th>
	<th>Date begin</th>
	<th>Date end</th>
      </tr>
    </thead>
    <tbody>
      <xsl:apply-templates select="member" />
    </tbody>
  </xsl:template>

  <xsl:template match="member_activity/member_list_project/member">
    <tr>
      <td>
	<input type="checkbox" name="{../checkbox/@name}[]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td><xsl:value-of select="role" /></td>
    </tr>
  </xsl:template>

  <xsl:template match="member_activity/member_list_activity/member">
    <tr>
      <td>
	<input type="checkbox" name="{../checkbox/@name}[]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td><xsl:value-of select="role" /></td>
      <td>
	<xsl:choose>
	  <xsl:when test="level=1">
	    <input type="checkbox" name="{level/@post}[{id}]" value="1"
		   checked="checked" />
	  </xsl:when>
	  <xsl:otherwise>
	    <input type="checkbox" name="{level/@post}[{id}]" value="1" />
	  </xsl:otherwise>
	</xsl:choose>
      </td>
      <td>
	<xsl:choose>
	  <xsl:when test="work=1">
	    <input type="checkbox" name="{work/@post}[{id}]" value="1"
		   checked="checked" />
	  </xsl:when>
	  <xsl:otherwise>
	    <input type="checkbox" name="{work/@post}[{id}]" value="1" />
	  </xsl:otherwise>
	</xsl:choose>
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_start" />
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_end" />
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_activity/member_histo_list_activity/member">
    <tr>
      <td>
	<input type="checkbox" name="{../checkbox/@name}[]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td><xsl:value-of select="role" /></td>
      <td>
	<xsl:choose>
	  <xsl:when test="level=1">
	    <input type="checkbox" name="{level/@post}[{id}]" value="1"
		   checked="checked" />
	  </xsl:when>
	  <xsl:otherwise>
	    <input type="checkbox" name="{level/@post}[{id}]" value="1" />
	  </xsl:otherwise>
	</xsl:choose>
      </td>
      <td>
	<xsl:choose>
	  <xsl:when test="work=1">
	    <input type="checkbox" name="{work/@post}[{id}]" value="1"
		   checked="checked" />
	  </xsl:when>
	  <xsl:otherwise>
	    <input type="checkbox" name="{work/@post}[{id}]" value="1" />
	  </xsl:otherwise>
	</xsl:choose>
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_start" />
      </td>
      <td class="little2">
	<xsl:apply-templates select="date_end" />
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_activity">
    <fieldset>
      <legend>Members activity</legend>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Members list of project</caption>
	    <xsl:apply-templates select="member_list_project" />
	  </table>
	</div>
	<div class="member_submit">
	  <input type="submit" name="{btn_up/@post}" value="/\" />
	  <input type="submit" name="{btn_down/@post}" value="\/" />
	</div>
	<div class="member_list">
	  <table class="table">
	    <caption>Member list of activity</caption>
	    <xsl:apply-templates select="member_list_activity" />
	  </table>
	  <div class="form">
	    <input type="submit" name="{btn_submit/@post}" value="Update" />
	  </div>
	</div>
	<div class="member_submit">
	  <input type="submit" name="{btn_histo/@post}" value="\/" />
	</div>
	<div class="member_list">
	  <table class="table">
	    <caption>Member history list of activity</caption>
	    <xsl:apply-templates select="member_histo_list_activity" />
	  </table>
	  <div class="form">
	    <input type="submit" name="{btn_submit/@post}" value="Update" />
	    <input type="submit" name="{btn_delete_histo/@post}" value="Delete" />
	  </div>
	</div>
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
