<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="administration/member_list">
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>Members' list</caption>
	    <thead>
	      <tr>
		<th class="little" />
		<th>Username</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Level</th>
		<th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	      <xsl:for-each select="member">
		<tr>
		  <td>
		    <input type="checkbox" name="{../checkbox/@name}[]"
			   value="{id}" />
		  </td>
		  <td>
		    <input type="text" name="{login/@post}[{id}]"
			   value="{login/@value}" />
		  </td>
		  <td>
		    <input type="text" name="{name/@post}[{id}]"
			   value="{name/@value}" />
		  </td>
		  <td>
		    <input type="text" name="{first_name/@post}[{id}]"
			   value="{first_name/@value}" />
		  </td>
		  <td>
		    <select name="{usr_level/@post}[{id}]">
		      <xsl:variable name="id" select="usr_level/@value" />
		      <xsl:for-each select="../level/item">
			<xsl:choose>
			  <xsl:when test="$id=@id">
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
		  <td>
		    <a href="./profil.php?memberselect={id}">Profile</a>
		  </td>
		</tr>
	      </xsl:for-each>
	    </tbody>
	  </table>
	</div>
	<div class="member_submit">
	  <input type="submit" name="{button_update/@name}"
		 value="Update" />
	  <input type="submit" name="{button_delete/@name}"
		 value="Delete" />
	</div>
      </form>
  </xsl:template>

  <xsl:template match="administration">
    <fieldset>
      <legend>Administration</legend>
      <xsl:apply-templates select="member_list" />
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
