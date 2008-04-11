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
	<form action="?" method="post">
	  <xsl:if test="memberselect">
	    <input type="hidden" name="{memberselect/@post}" value="{memberselect/@value}" />
	  </xsl:if>
	  <fieldset>
	    <legend>Profile</legend>
	    <div class="form">
	      <label>
		Location<br />
		<xsl:apply-templates select="field_location" />
	      </label>
	      <hr />
	      <label>
		Title<br />
		<xsl:apply-templates select="field_title" />
	      </label>
	      <hr />
	      <label>
		Email<br />
		<input type="text" name="{field_email/@name}"
		       value="{field_email/@value}" />
	      </label>
	      <hr />
	      <label>
		Last Name<br />
		<input type="text" name="{field_name/@name}"
		       value="{field_name/@value}" />
	      </label>
	      <hr />
	      <label>
		First name<br />
		<input type="text" name="{field_fname/@name}"
		       value="{field_fname/@value}" />
	      </label>
	      <hr />
	      <label>
		Phone<br />
		<input type="text" name="{field_fphone/@name}"
		       value="{field_fphone/@value}" />
	      </label>
	      <hr />
	      <label>
		Cell phone<br />
		<input type="text" name="{field_mphone/@name}"
		       value="{field_mphone/@value}" />
	      </label>
	      <hr />
	      <label>
		Personal address<br />
		<textarea name="{field_address/@name}">
		  <xsl:value-of select="field_address/@value" />
		</textarea>
	      </label>
	      <hr />
	      <label>
		<input type="submit" value="Save" />
	      </label>
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
