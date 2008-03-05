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
		Name<br />
		<input type="text" name="{field_name}" />
	      </label>
	      <hr />
	      <label>
		Describe<br />
		<textarea name="{field_descr}"></textarea>
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
