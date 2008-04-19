<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity/depend">
	<xsl:choose>
		<xsl:when test="@disabled=0">
		<xsl:choose>
			<xsl:when test="@value=1">
				<input type="checkbox" name="{@post}[{../id}]" value="1"
				checked="checked" />
			</xsl:when>
			<xsl:otherwise>
				<input type="checkbox" name="{@post}[{../id}]" value="1" />
			</xsl:otherwise>
		</xsl:choose>
		</xsl:when>
		<xsl:otherwise>
			<input type="checkbox" name="{@post}[{../id}]" value="1" disabled="disabled"/>
		</xsl:otherwise>
	</xsl:choose>
  </xsl:template>

  <xsl:template match="activity/title">
    <a href="./root.php?activity_id={../id}#activity_{../id}"
       id="activity_{../id}">
      <xsl:choose>
	<xsl:when test="../surline=1">
	  <span class="on">
	    <xsl:value-of select="." />
	  </span>
	</xsl:when>
	<xsl:otherwise>
	  <xsl:value-of select="." />
	</xsl:otherwise>
      </xsl:choose>
    </a>
  </xsl:template>

  <xsl:template match="activity">
    <xsl:for-each select=".">
      <xsl:choose>
	<xsl:when test="developped=1">
	  <li>
	    <xsl:apply-templates select="depend" />
	    <a href="./root.php?less=1&amp;activity={id}#activity_{id}">
	      <xsl:choose>
		<xsl:when test="activity">
		  <img src="./images/icons/less.png" />
		</xsl:when>
		<xsl:otherwise>
		  <img src="./images/icons/less_not.png" />
		</xsl:otherwise>
	      </xsl:choose>
	    </a>
	    <xsl:apply-templates select="title" />
	  </li>
	  <xsl:if test="activity">
	    <ul class="chield">
	      <xsl:apply-templates select="activity" />
	    </ul>
	  </xsl:if>
	</xsl:when>
	<xsl:otherwise>
	  <li>
	    <xsl:apply-templates select="depend" />
	    <xsl:choose>
	      <xsl:when test="activity">
		<a href="./root.php?more=1&amp;activity={id}#activity_{id}">
		  <img src="./images/icons/more.png" />
		</a>
	      </xsl:when>
	      <xsl:otherwise>
		<img src="./images/icons/less_not.png" />
	      </xsl:otherwise>
	    </xsl:choose>
	    <xsl:apply-templates select="title" />
	  </li>
	</xsl:otherwise>
      </xsl:choose>
    </xsl:for-each>
  </xsl:template>
</xsl:stylesheet>
