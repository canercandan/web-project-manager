<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="admin_member_list">
    <fieldset>
      <legend>Administration</legend>
      <form action="?" method="post">
	<div class="member_list">
	  <table class="table">
	    <caption>List of member</caption>
	    <thead>
	      <tr>
		<th>Select</th>
		<th>Login</th>
		<th>Name</th>
		<th>First Name</th>
		<th>Level</th>
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
		    <input type="text" name="{usr_level/@post}[{id}]"
			   value="{usr_level/@value}" />
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
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
