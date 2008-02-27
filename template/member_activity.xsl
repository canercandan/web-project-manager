<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="member_activity">
    <fieldset>
      <legend>Members activity</legend>
      <form action="?" method="post">
	<div class="member_top">
	  <label>
	    Members list of project<br />
	    <select multiple="multiple">
	      <xsl:for-each select="member_list_project/member">
		<option value="{id}"></option>
	      </xsl:for-each>
	    </select>
	  </label>
	</div>
	<div class="member_middle">
	  <input type="submit" name="top" value="/\" />
	  <input type="submit" name="bottom" value="\/" />
	</div>
	<div class="member_bottom">
	  <label>
	    Member list of activity
	    <select multiple="multiple">
	    </select>
	  </label>
	</div>
	<div class="clear" />
      </form>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
