<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="archive/current_folder/folder">
    <li>
      <img src="./images/icons/folder.png" />
      <xsl:value-of select="@name" />
    </li>
  </xsl:template>

  <xsl:template match="archive/current_folder/file">
    <li>
      <img src="./images/icons/page_attach.png" />
      <xsl:value-of select="@name" />
    </li>
  </xsl:template>

  <xsl:template match="activity_archive/@name">
    <a href="./root.php?archive={../@id}#activity_{../@id}"
       id="activity_{../@id}">
      <xsl:choose>
	<xsl:when test="../@selectionned=1">
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

  <xsl:template match="activity_archive">
    <xsl:for-each select=".">
      <xsl:choose>
	<xsl:when test="@developped=1">
	  <li>
	    <a href="./root.php?less=1&amp;archive={@id}#activity_{@id}">
	      <xsl:choose>
		<xsl:when test="activity_archive">
		  <img src="./images/icons/less.png" />
		</xsl:when>
		<xsl:otherwise>
		  <img src="./images/icons/less_not.png" />
		</xsl:otherwise>
	      </xsl:choose>
	    </a>
	    <xsl:apply-templates select="@name" />
	  </li>
	  <xsl:if test="activity_archive">
	    <ul class="chield">
	      <xsl:apply-templates select="activity_archive" />
	    </ul>
	  </xsl:if>
	</xsl:when>
	<xsl:otherwise>
	  <li>
	    <xsl:choose>
	      <xsl:when test="activity_archive">
		<a href="./root.php?more=1&amp;archive={@id}#activity_{@id}">
		  <img src="./images/icons/more.png" />
		</a>
	      </xsl:when>
	      <xsl:otherwise>
		<img src="./images/icons/less_not.png" />
	      </xsl:otherwise>
	    </xsl:choose>
	    <xsl:apply-templates select="@name" />
	  </li>
	</xsl:otherwise>
      </xsl:choose>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="project_window/archive">
    <fieldset>
      <legend>Archive</legend>
      <div class="menu blue2">
	<h3 class="blue1">File list</h3>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity_archive" />
	  </ul>
	</div>
      </div>
      <div class="box">
	<h3 class="blue2">
	  Current folder:
	  <xsl:value-of select="current_folder/@name" />
	</h3>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="current_folder/folder" />
	    <xsl:apply-templates select="current_folder/file" />
	  </ul>
	</div>
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
