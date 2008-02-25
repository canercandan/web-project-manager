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
        <legend>Connexion</legend>
        <div class="form">
          With this form, you can sign in an account.<br />
          <br />
          <label>
            Login<br />
            <input type="text" name="{field_login}" value="{value_login}" />
          </label><br />
          <label>
            Password<br />
            <input type="password" name="{field_passwd}" />
          </label><br />
          <input type="submit" value="Ok" />
        </div>
      </fieldset>
    </form>
  </xsl:template>
</xsl:stylesheet>
