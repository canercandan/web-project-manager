<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="add_project">
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
	    <legend>Add a project</legend>
	    <div class="form">
	      <label>
		Project's name<br />
		<input type="text" name="{field_name}"
		       value="{field_name/@value}" />
	      </label>
	      <hr />
	      <label>
		Description<br />
		<textarea name="{field_descr}">
		  <xsl:value-of select="field_descr/@value" />
		</textarea>
	      </label>
	      <hr />
	      <div class="little">
		Date start<br />
		<xsl:apply-templates select="field_date" />
	      </div>
	      <hr />
	      <div class="little">
		Date end<br />
		<xsl:apply-templates select="field_date_end" />
	      </div>
	      <hr />
	      <label class="little">
		Hour per day<br />
		<input type="text" name="{field_hour_day}"
		       value="{field_hour_day/@value}" />
	      </label>
	      <hr />
	      <label>
		<input type="submit" value="Ok" />
	      </label>
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
