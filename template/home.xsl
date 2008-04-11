<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="home">
    <fieldset>
      <legend>Home</legend>
      <div>
        <xsl:value-of select="mesg" />
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
