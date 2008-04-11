<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="connect">
    <xsl:if test="mesg">
      <xsl:apply-templates select="mesg" />
    </xsl:if>
    <xsl:if test="error">
      <xsl:apply-templates select="error" />
    </xsl:if>
    <form action="./connect.php" method="post">
      <fieldset>
        <legend>Sign in</legend>
        <div class="form">
          <label>
            Username<br />
            <input type="text" name="{field_login/@name}"
		   value="{field_login/@value}" />
          </label>
	  <hr />
          <label>
            Password<br />
            <input type="password" name="{field_passwd/@name}" />
          </label>
	  <hr />
	  <div>
	    <a href="./passwd.php">Password forgot ?</a>
	  </div>
          <input type="submit" value="Sign in" />
        </div>
      </fieldset>
    </form>
  </xsl:template>
</xsl:stylesheet>
