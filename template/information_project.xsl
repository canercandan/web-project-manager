<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_project">
    <fieldset>
      <legend>General</legend>
      <form action="?" method="post">
	<div class="form">
	  <label>
	    Autor<br />
	    <input type="text" value="{autor/@name} {autor/@fname}"
		   disabled="disabled"/>
	  </label>
	  <hr />
	  <label>
	    Title<br />
	    <input type="text" value="{autor/@title}"
		   disabled="disabled" />
	  </label>
	  <hr />
	  <label>
	    Name<br />
	    <xsl:choose>
	      <xsl:when test="editable=1">
		<input type="text" name="{name/@post}"
		       value="{name}" />
	      </xsl:when>
	      <xsl:otherwise>
		<input type="text" name="{name/@post}"
		       value="{name}" disabled="disabled" />
	      </xsl:otherwise>
	    </xsl:choose>
	  </label>
	  <hr />
	  <label class="big">
	    Describe<br />
	    <xsl:choose>
	      <xsl:when test="editable=1">
		<textarea name="{describ/@post}">
		  <xsl:value-of select="describ" />
		</textarea>
	      </xsl:when>
	      <xsl:otherwise>
		<textarea name="{describ/@post}" disabled="disabled">
		  <xsl:value-of select="describ" />
		</textarea>
	      </xsl:otherwise>
	    </xsl:choose>
	  </label>
	  <hr />
	  <div class="little">
	    Date<br />
	    <xsl:apply-templates select="date" />
	  </div>
	  <hr />
	  <xsl:if test="editable=1">
	    <label>
	      <input type="submit" name="{btn_update/@post}" value="Ok" />
	    </label>
	  </xsl:if>
	</div>
      </form>
    </fieldset>
    <xsl:if test="activity_work">
      <fieldset>
	<legend>Charge</legend>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity_work" />
	  </ul>
	</div>
      </fieldset>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
