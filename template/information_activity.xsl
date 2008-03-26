<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_activity/field_estimate_date_start|information_activity/field_estimate_date_end">
    <xsl:choose>
      <xsl:when test="@ok=0">
	<input type="text" value="{@value}" disabled="disabled"
	       style="background-color: Red; color: White;" />
      </xsl:when>
      <xsl:otherwise>
	<input type="text" value="{@value}" disabled="disabled" />
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>

  <xsl:template match="information_activity">
    <fieldset>
      <legend>General</legend>
      <form action="?" method="post">
	<div class="form">
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
	  <label class="little">
	    Charge<br />
	    <xsl:choose>
	      <xsl:when test="editable=0">
		<input type="text" name="{charge/@post}"
		       value="{charge}" disabled="disabled" />
	      </xsl:when>
	      <xsl:when test="@editable=0">
		<input type="text" name="{charge/@post}"
		       value="{charge}" disabled="disabled" />
	      </xsl:when>
	      <xsl:otherwise>
		<input type="text" name="{charge/@post}"
		       value="{charge}" />
	      </xsl:otherwise>
	    </xsl:choose>
	  </label>
	  <hr />
	  <div class="little">
	    Start date<br />
	    <xsl:apply-templates select="date" />
	  </div>
	  <hr />
	  <div class="little">
	    End date<br />
	    <xsl:apply-templates select="dateend" />
	  </div>
	  <hr />
	  <div class="little">
	    Start date estimation<br />
	    <xsl:apply-templates select="field_estimate_date_start" />
	  </div>
	  <hr />
	  <div class="little">
	    End date estimation<br />
	    <xsl:apply-templates select="field_estimate_date_end" />
	  </div>
	  <hr />
	  <label>
	    <xsl:if test="editable=1">
	      <input type="submit" name="{btn_update/@post}" value="Ok" />
	    </xsl:if>
	  </label>
	</div>
      </form>
    </fieldset>
    <fieldset>
      <legend>Dependance</legend>
      <div>
	<xsl:apply-templates select="information_dependance_activity" />
      </div>
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
