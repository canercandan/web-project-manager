<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="add_activity">
    <xsl:if test="mesg">
      <xsl:apply-templates select="mesg" />
    </xsl:if>
    <xsl:if test="error">
      <xsl:apply-templates select="error" />
    </xsl:if>
    <form action="?" method="post">
      <fieldset>
	<legend>Add an activity</legend>
	<div class="form">
	  <label>
	    Name<br />
	    <input type="text" name="{field_activity_name}" />
	  </label>
	  <hr />
	  <label class="big">
	    Describe<br />
	    <textarea name="{field_activity_describ}"></textarea>
	  </label>
	  <hr />
	  <label>
	    Charge<br />
	    <input type="text" name="{field_activity_charge}" />
	  </label>
	  <hr />
	  <input type="submit" value="Ok" />
	</div>
      </fieldset>
    </form>
  </xsl:template>
</xsl:stylesheet>
