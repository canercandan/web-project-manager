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
	    <legend>Inscription</legend>
	    <div class="form">
	      With this form, you can create an account.<br />
	      <br />
	      <label>
		Login<br />
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
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
