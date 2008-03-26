<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="body/member">
    <fieldset>
      <legend>Member space</legend>
      <div>
	<h3 class="blue2">
	  <a href="./profil.php">Edit your profil</a>
	</h3>
	<br />
	<h3 class="blue2">
	  <a href="./passwd.php">Regenerate password</a>
	</h3>
	<br />
	<xsl:value-of select="memberwelcome/@value" />
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
