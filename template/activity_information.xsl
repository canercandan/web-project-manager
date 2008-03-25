<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="administration/member_list">
	<div class="member_list">
	  <table class="table">
	    <caption>Member project</caption>
	    <thead>
	      <tr>
			<th>Select</th>
			<th>Member</th>
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
		    <input type="text" name="{infoname/@post}[{id}]"
			   value="{infoname/@value}" />
		  </td>
		</tr>
	    </tbody>
	  </table>
	</div>
  </xsl:template>
</xsl:stylesheet>