<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_work/name">
    <xsl:value-of select="." />
    (<xsl:value-of select="../work" /> /
    <xsl:value-of select="../charge" /> days/man)
    <div class="bar">
      <div class="ok" style="width: {../percent}%">
	<xsl:value-of select="../percent" />%
      </div>
    </div>
  </xsl:template>

  <xsl:template match="activity_work">
    <xsl:choose>
      <xsl:when test="developped=1">
	<li id="work_{id}">
	  <a href="./root.php?less=1&amp;work_id={id}#work_{id}">
	    <xsl:choose>
	      <xsl:when test="activity_work">
		<img src="./images/icons/less.png" />
	      </xsl:when>
	      <xsl:otherwise>
		<img src="./images/icons/less_not.png" />
	      </xsl:otherwise>
	    </xsl:choose>
	  </a>
	  <xsl:apply-templates select="name" />
	</li>
	<xsl:if test="activity_work">
	  <ul class="chield">
	    <xsl:apply-templates select="activity_work" />
	  </ul>
	</xsl:if>
      </xsl:when>
      <xsl:otherwise>
	<li id="work_{id}">
	  <xsl:choose>
	    <xsl:when test="activity_work">
	      <a href="./root.php?more=1&amp;work_id={id}#work_{id}">
		<img src="./images/icons/more.png" />
	      </a>
	    </xsl:when>
	    <xsl:otherwise>
	      <img src="./images/icons/less_not.png" />
	    </xsl:otherwise>
	  </xsl:choose>
	  <xsl:apply-templates select="name" />
	</li>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
</xsl:stylesheet>
