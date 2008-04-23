<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_dependance_activity">
    <form action="?" method="post">
      <div class="list">
	<ul>
	  <xsl:apply-templates select="activity/activity" />
	</ul>
      </div>
      <xsl:if test="../../activityright/@updateactivity=1 or ../../../projectright/@updateactivity=1">
	<div class="form">
	  <label>
	    <input type="submit" name="{btn_update/@post}" value="Update" />
	  </label>
	</div>
      </xsl:if>
    </form>
  </xsl:template>
</xsl:stylesheet>
