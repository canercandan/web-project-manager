<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="profil">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="./profil.php" method="post">
	  <fieldset>
	    <legend>Profil</legend>
	    <div class="form">
	      <label>
		Location<br />
		<xsl:apply-templates select="field_location" />
	      </label><br />
	      <label>
		Title<br />
		<xsl:apply-templates select="field_title" />
	      </label><br />
	      <label>
		Name<br />
		<input type="text" name="{field_name/@name}"
		       value="{field_name/@value}" />
	      </label><br />
	      <label>
		First name<br />
		<input type="text" name="{field_fname/@name}"
		       value="{field_fname/@value}" />
	      </label><br />
	      <label>
		Phone<br />
		<input type="text" name="{field_fphone/@name}"
		       value="{field_fphone/@value}" />
	      </label><br />
	      <label>
		Mobile<br />
		<input type="text" name="{field_mphone/@name}"
		       value="{field_mphone/@value}" />
	      </label><br />
	      <label>
		Address personal<br />
		<input type="text" name="{field_address/@name}"
		       value="{field_address/@value}" />
	      </label><br />
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
