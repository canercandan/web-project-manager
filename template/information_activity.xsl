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
    <xsl:apply-templates select="warning" />
    <fieldset>
      <legend>General</legend>
      <form action="?" method="post">
	<div class="form">
	  <xsl:choose>
	    <xsl:when test="../activityright/@updateactivity=1 or ../../projectright/@updateactivity=1">
	      <label>
		Activity's name<br />
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
		Description<br />
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
		Workload<br />
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
		Estimation of start date<br />
		<xsl:apply-templates select="field_estimate_date_start" />
	      </div>
	      <hr />
	      <div class="little">
		Estimation of end date<br />
		<xsl:apply-templates select="field_estimate_date_end" />
	      </div>
	      <hr />
	      <label>
		<xsl:if test="editable=1">
		  <input type="submit" name="{btn_update/@post}" value="Ok" />
		</xsl:if>
	      </label>
	    </xsl:when>
	    <xsl:otherwise>
	      <label>
		Activity's name<br />
		<input type="text" name="{name/@post}"
		       value="{name}" disabled="disabled" />
	      </label>
	      <hr />
	      <label class="big">
		Description<br />
		<textarea name="{describ/@post}" disabled="disabled">
		  <xsl:value-of select="describ" />
		</textarea>
	      </label>
	      <hr />
	      <label class="little">
		Workload<br />
		<input type="text" name="{charge/@post}"
		       value="{charge}" disabled="disabled" />
	      </label>
	      <hr />
	      <xsl:if test="date/@day!=0 and date/@month!=0 and date/@year!=0">
		<div class="little">
		  Start date<br />
		  <xsl:value-of select="date/@day" />
		  /
		  <xsl:value-of select="date/@month" />
		  /
		  <xsl:value-of select="date/@year" />
		</div>
		<hr />
	      </xsl:if>
	      <xsl:if test="dateend/@day!=0 and dateend/@month!=0 and dateend/@year!=0">
		<div class="little">
		  End date<br />
		  <xsl:value-of select="dateend/@day" />
		  /
		  <xsl:value-of select="dateend/@month" />
		  /
		  <xsl:value-of select="dateend/@year" />
		</div>
		<hr />
	      </xsl:if>
	      <div class="little">
		Estimation of start date<br />
		<xsl:apply-templates select="field_estimate_date_start" />
	      </div>
	      <hr />
	      <div class="little">
		Estimation of end date<br />
		<xsl:apply-templates select="field_estimate_date_end" />
	      </div>
	    </xsl:otherwise>
	  </xsl:choose>
	</div>
      </form>
    </fieldset>
    <fieldset>
      <legend>This activity depend of...</legend>
      <div>
	<xsl:apply-templates select="information_dependance_activity" />
      </div>
    </fieldset>
    <xsl:if test="activity_work">
      <fieldset>
	<legend>Workload</legend>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity_work" />
	  </ul>
	</div>
      </fieldset>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
