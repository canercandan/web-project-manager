<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity">
    <ul>
      <xsl:for-each select=".">
	<xsl:choose>
	  <xsl:when test="developped=1">
	    <li>
	      <a href="./root.php?less=1&amp;activity={id}">
		<img src="./images/icons/less.png" />
	      </a>
	      <a href="./root.php?activity_infos={id}">
		<xsl:value-of select="title" />
	      </a>
	    </li>
	    <xsl:if test="activity">
	      <xsl:apply-templates select="activity" />
	    </xsl:if>
	  </xsl:when>
	  <xsl:otherwise>
	    <xsl:choose>
	      <xsl:when test="activity">
		<li>
		  <a href="./root.php?more=1&amp;activity={id}">
		    <img src="./images/icons/more.png" />
		  </a>
		  <a href="./root.php?activity_infos={id}">
		    <xsl:value-of select="title" />
		  </a>
		</li>
	      </xsl:when>
	      <xsl:otherwise>
		<li>
		  <img src="./images/icons/less_not.png" />
		  <a href="./root.php?activity_infos={id}">
		    <xsl:value-of select="title" />
		  </a>
		</li>
	      </xsl:otherwise>
	    </xsl:choose>
	  </xsl:otherwise>
	</xsl:choose>
      </xsl:for-each>
    </ul>
  </xsl:template>
</xsl:stylesheet>
