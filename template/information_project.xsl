<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_project">
    <fieldset>
      <legend>General</legend>
      <form action="?" method="post">
	<div class="form">
	  <label>
	    Name<br />
	    <input type="text" name="{name/@post}"
		   value="{name}" />
	  </label>
	  <hr />
	  <label class="big">
	    Describe<br />
	    <textarea name="describ/@post">
	      <xsl:value-of select="describ" />
	    </textarea>
	  </label>
	  <hr />
	  <div class="little">
	    Date<br />
	    <xsl:apply-templates select="date" />
	  </div>
	  <hr />
	  <label>
	    <input type="submit" name="{btn_update/@post}" value="Ok" />
	  </label>
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
