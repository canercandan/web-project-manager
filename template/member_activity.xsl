<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="member_activity/member_list_project">
    <thead>
      <tr>
	<th class="little" />
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

  <xsl:template match="member_activity/member_list_activity">
    <thead>
      <tr>
	<th class="little" />
	<th>Username</th>
	<th>Last Name</th>
	<th>First name</th>
	<th>Title</th>
	<th>Role</th>
	<th>Admin</th>
	<xsl:if test="../show_work=1">
	  <th>Work</th>
	</xsl:if>
	<th>Work hour</th>
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
	<xsl:if test="id=/doc/header/@id or ../../../activityright/@update_member_activity=1 or ../../../../projectright/@update_member_activity=1">
	    <input type="checkbox"
		   name="{../checkbox/@name}[]"
		   value="{key/@unique}" />
	</xsl:if>
	<input type="hidden"
	       name="{key/@name}[{key/@unique}][{key/@id}]"
	       value="{id}" />
      </td>
      <td><xsl:value-of select="login" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="fname" /></td>
      <td><xsl:value-of select="title" /></td>
      <td><xsl:value-of select="role" /></td>
      <xsl:choose>
	<xsl:when test="../../activityright/@update_member_activity=1 or ../../../../projectright/@update_member_activity=1">
	  <td>
	    <xsl:choose>
	      <xsl:when test="level=1">
		<input type="checkbox"
		       name="{level/@post}[{key/@unique}]"
		       value="1"
		       checked="checked" />
	      </xsl:when>
	      <xsl:otherwise>
		<input type="checkbox"
		       name="{level/@post}[{key/@unique}]"
		       value="1" />
	      </xsl:otherwise>
	    </xsl:choose>
	  </td>
	  <xsl:if test="../../show_work=1">
	    <td>
	      <xsl:choose>
		<xsl:when test="work=1">
		  <input type="checkbox"
			 name="{work/@post}[{key/@unique}]"
			 value="1"
			 checked="checked" />
		</xsl:when>
		<xsl:otherwise>
		  <input type="checkbox"
			 name="{work/@post}[{key/@unique}]"
			 value="1" />
		</xsl:otherwise>
	      </xsl:choose>
	    </td>
	  </xsl:if>
	</xsl:when>
	<xsl:otherwise>
	  <td>
	    <xsl:choose>
	      <xsl:when test="level=1">
		<input type="checkbox"
		       name="{level/@post}[{key/@unique}]"
		       value="1"
		       checked="checked"
		       disabled="disabled" />
	      </xsl:when>
	      <xsl:otherwise>
		<input type="checkbox"
		       name="{level/@post}[{key/@unique}]"
		       value="1"
		       disabled="disabled" />
	      </xsl:otherwise>
	    </xsl:choose>
	  </td>
	  <xsl:if test="../../show_work=1">
	    <td>
	      <xsl:choose>
		<xsl:when test="work=1">
		  <input type="checkbox"
			 name="{work/@post}[{key/@unique}]"
			 value="1"
			 checked="checked"
			 disabled="disabled" />
		</xsl:when>
		<xsl:otherwise>
		  <input type="checkbox"
			 name="{work/@post}[{key/@unique}]"
			 value="1"
			 disabled="disabled" />
		</xsl:otherwise>
	      </xsl:choose>
	    </td>
	  </xsl:if>
	</xsl:otherwise>
      </xsl:choose>
      <td class="little">
	<xsl:if test="id=/doc/header/@id or ../../../activityright/@update_member_activity=1 or ../../../../projectright/@update_member_activity=1">
	  <xsl:choose>
	    <xsl:when test="../../show_work=0">
	      <input type="text" name="{hour/@post}[{key/@unique}]"
		     value="{hour}" disabled="disabled" />
	    </xsl:when>
	    <xsl:otherwise>
	      <input type="text" name="{hour/@post}[{key/@unique}]"
		     value="{hour}" />
	    </xsl:otherwise>
	  </xsl:choose>
	</xsl:if>
      </td>
    </tr>
  </xsl:template>

  <xsl:template match="member_activity">
    <fieldset>
      <legend>Activity's members</legend>
      <xsl:if test="../activityright/@add_member_activity=1 or ../../projectright/@add_member_activity=1">
	<form action="?" method="post">
	  <div class="member_list">
	    <table class="table">
	      <caption>Project's members available</caption>
	      <xsl:apply-templates select="member_list_project" />
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
	    <caption>Active or future members</caption>
	    <xsl:apply-templates select="member_list_activity" />
	  </table>
	  <div class="form big">
	    <!--<xsl:if test="../activityright/@update_member_activity=1 or ../../projectright/@update_member_activity=1">-->
	    <input type="submit" name="{btn_update/@post}" value="Update" />
	    <!--</xsl:if>-->
	    <xsl:if test="../activityright/@kick_member_activity=1 or ../../projectright/@kick_member_activity=1">
	      <input type="submit" name="{btn_up/@post}" value="Delete" />
	    </xsl:if>
	  </div>
	</div>
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
