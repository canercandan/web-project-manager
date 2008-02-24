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
		<select name="{field_location/name}">
		  <xsl:for-each select="field_location/item">
		    <option value="{id}">
		      <xsl:value-of select="name" />
		    </option>
		  </xsl:for-each>
		</select>
	      </label><br />
	      <label>
		Title<br />
		<select name="{field_title/name}">
		  <xsl:for-each select="field_title/item">
		    <option value="{id}">
		      <xsl:value-of select="name" />
		    </option>
		  </xsl:for-each>
		</select>
	      </label><br />
	      <label>
		Name<br />
		<input type="text" name="{field_name}"
		       value="{value_name}" />
	      </label><br />
	      <label>
		First name<br />
		<input type="text" name="{field_fname}"
		       value="{value_fname}" />
	      </label><br />
	      <label>
		Phone<br />
		<input type="text" name="{field_fphone}"
		       value="{value_fphone}" />
	      </label><br />
	      <label>
		Mobile<br />
		<input type="text" name="{field_mphone}"
		       value="{value_mphone}" />
	      </label><br />
	      <label>
		Address personal<br />
		<input type="text" name="{field_address}"
		       value="{value_address}" />
	      </label><br />
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
