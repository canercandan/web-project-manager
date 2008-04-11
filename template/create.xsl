<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="create">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="./create.php" method="post">
	  <fieldset>
	    <legend>Sign up</legend>
	    <div class="form">
	      <label>
		Username<br />
		<input type="text" name="{field_login/@name}"
		       value="{field_login/@value}" />
	      </label>
	      <hr />
	      <label>
		Email<br />
		<input type="text" name="{field_email/@name}"
		       value="{field_email/@value}" />
	      </label>
	      <hr />
	      <input type="submit" value="Sign up" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
