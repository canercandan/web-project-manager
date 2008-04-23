<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_project">
    <fieldset>
      <legend>General</legend>
      <form action="?" method="post">
	<div class="form">
	  <label>
	    Author<br />
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
	  <xsl:choose>
	    <xsl:when test="../projectright/@updateproject=1">
	      <label>
		Project's name<br />
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
	      <label class="little">
		Hour per day<br />
		<input type="text" name="{hour_day/@post}"
		       value="{hour_day}" />
	      </label>
	      <hr />
	      <label class="little">
		Workload<br />
		<input type="text" value="{charge/@value}" disabled="disabled" />
	      </label>
	      <hr />
	      <xsl:if test="editable=1">
		<label>
		  <input type="submit" name="{btn_update/@post}" value="Ok" />
		</label>
	      </xsl:if>
	    </xsl:when>
	    <xsl:otherwise>
	      <label>
		Project's name<br />
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
	      <div class="little">
		Start date<br />
		<xsl:value-of select="date/@day" />
		/
		<xsl:value-of select="date/@month" />
		/
		<xsl:value-of select="date/@year" />
	      </div>
	      <hr />
	      <div class="little">
		End date<br />
		<xsl:value-of select="dateend/@day" />
		/
		<xsl:value-of select="dateend/@month" />
		/
		<xsl:value-of select="dateend/@year" />
	      </div>
	      <hr />
	      <label class="little">
		Hour per day<br />
		<input type="text" name="{hour_day/@post}"
		       value="{hour_day}" disabled="disabled" />
	      </label>
	      <hr />
	      <label class="little">
		Workload<br />
		<input type="text" value="{charge/@value}" disabled="disabled" />
	      </label>
	    </xsl:otherwise>
	  </xsl:choose>
	</div>
      </form>
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
