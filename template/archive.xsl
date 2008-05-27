<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="folder/@name">
    <a href="./root.php?activity_archive={../../@id}&amp;folder={../@id}#activity_{../@id}"
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
<!--  
  <xsl:template match="folder">
    <li>
		<a href="./root.php?activity_archive={../@id}&amp;folder={@id}">
      <img src="./images/icons/folder.png" />-
      <xsl:apply-templates select="@name" />
	  </a>
	  <xsl:if test="folder">
		<ul class="chield">
			<xsl:apply-templates select="folder" />
		</ul>
		</xsl:if>
    </li>
  </xsl:template>
-->
  <xsl:template match="archive/current_folder/folder">
    <tr>
		<td><img src="./images/icons/folder.png" /></td>
		<td>
			<a href="./root.php?activity_archive={../@id}&amp;folder={@id}">
			<xsl:value-of select="@name" />
			</a>
		</td>
		<td><xsl:value-of select="@date" /></td>
	</tr>
  </xsl:template>

  <xsl:template match="archive/current_folder/file">
    <tr>
		<td><img src="./images/icons/page_attach.png" /></td>
		<td>
			<a href="./root.php?activity_archive={../@id}&amp;file={@id}">
			<xsl:value-of select="@name" />
			</a>
		</td>
		<td><xsl:value-of select="@date" /></td>
	</tr>
  </xsl:template>
  
  <xsl:template match="activity_archive/@name">
    <a href="./root.php?activity_archive={../@id}&amp;folder=0#activity_{../@id}"
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

  <xsl:template match="activity_archive|folder">
    <xsl:for-each select=".">
      <xsl:choose>
	<xsl:when test="@developped=1">
	  <li>
	      <xsl:choose>
		<xsl:when test="activity_archive">
			<a href="./root.php?less=1&amp;activity={@id}#activity_{@id}">
			<img src="./images/icons/less.png" />
			</a>
		</xsl:when>
		<xsl:when test="folder">
			<a href="./root.php?less=1&amp;archive={@id}#activity_{@id}">
			<img src="./images/icons/less.png" />
			</a>
		</xsl:when>
		<xsl:otherwise>
		  <img src="./images/icons/less_not.png" />
		</xsl:otherwise>
	      </xsl:choose>
	    <xsl:apply-templates select="@name" />
	  </li>
	  <xsl:if test="folder">
		<ul class="chield">
			<xsl:apply-templates select="folder" />
		</ul>
		</xsl:if>
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
		<a href="./root.php?more=1&amp;activity={@id}#activity_{@id}">
		  <img src="./images/icons/more.png" />
		</a>
	      </xsl:when>
		  <xsl:when test="folder">
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
	<table class="table">
	  <thead>
		<tr>
			<th>Filename</th>
			<th>Date</th>
		</tr>
		</thead>
		<tbody>
		<xsl:if test="current_folder/@parent!=-1">
			<tr>
				<td><a href="./root.php?activity_archive={current_folder/@parent}&amp;folder=0">[ .. ]</a></td>
			<td />
		</tr>
		</xsl:if>
		<xsl:apply-templates select="current_folder/folder" />
		<xsl:apply-templates select="current_folder/file" />
	  </tbody>
	</table>
      </div>
	  <div class="clear" />	
    </fieldset>
	<xsl:if test="showform/@value=1">
	<fieldset>
		<legend>Actions</legend>
		<div class="menu">
			<h3 class="blue1">Create directory</h3>
			<div>
				<form action="?" method="post">
					<input type="text" name="dir" />
					<input type="submit" value="Ok" />
				</form>
			</div>
		</div>
		<div class="box">
			<h3 class="blue1">Upload</h3>
			<div class="form">
				<br />
				<form action="?" method="post" enctype="multipart/form-data">
					<input type="file" name="file" /><br />
					<input type="submit" value="Ok" />
				</form>
				<br />
			</div>
		</div>
	</fieldset>
	</xsl:if>
  </xsl:template>
</xsl:stylesheet>
