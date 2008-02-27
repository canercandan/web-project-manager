<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="add_activity">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="?" method="post">
	  <fieldset>
	    <legend>Add an activity</legend>
	    <div class="form">
	      <xsl:if test="field_activity_name">
		<label>
		  Name<br />
		  <input type="text" name="{field_activity_name}" />
		</label><br />
	      </xsl:if>
	      <xsl:if test="field_activity_describ">
		<label>
		  Describe<br />
		  <textarea name="{field_activity_describ}"></textarea>
		</label><br />
	      </xsl:if>
	      <xsl:if test="field_activity_charge">
		<label>
		  Charge<br />
		  <input type="text" name="{field_activity_charge}" />
		</label><br />
	      </xsl:if>
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
