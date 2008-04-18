<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="body/passwd">
    <xsl:if test="mesg">
      <xsl:apply-templates select="mesg" />
    </xsl:if>
    <xsl:if test="error">
      <xsl:apply-templates select="error" />
    </xsl:if>
    <form action="./passwd.php" method="post">
      <fieldset>
        <legend>Password forgotten ?</legend>
        <div class="form">
          <label>
            Username<br />
            <input type="text" name="{passwdlogin/@post}"
		   value="{passwdlogin/@value}" />
          </label>
	  <hr />
          <label>
            Email<br />
            <input type="text" name="{passwdemail/@post}"
		   value="{passwdemail/@value}" />
          </label>
	  <hr />
          <input type="submit" value="Send" />
        </div>
      </fieldset>
    </form>
  </xsl:template>
</xsl:stylesheet>
