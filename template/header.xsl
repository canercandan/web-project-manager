<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="header">
    <h1>TechWeb</h1>
    <ul id="nav">
      <xsl:choose>
	<xsl:when test="../body/home">
	  <li class="on"><a href="./index.php">Home</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./index.php">Home</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/create">
	  <li class="on"><a href="./create.php">Inscription</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./create.php">Inscription</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/connect">
	  <li class="on"><a href="./connect.php">Connexion</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./connect.php">Connexion</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/contact">
	  <li class="on"><a href="#">Contact</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="#">Contact</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/menu_project">
	  <li class="on"><a href="./root.php?project_view=1">Project</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./root.php?project_view=1">Project</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/add_project">
	  <li class="on"><a href="./root.php?project_add=1">Add a project</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./root.php?project_add=1">Add a project</a></li>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../body/admin_member_list">
	  <li class="on"><a href="./admin2.php">Admin</a></li>
	</xsl:when>
	<xsl:otherwise>
	  <li><a href="./admin2.php">Admin</a></li>
	</xsl:otherwise>
      </xsl:choose>
    </ul>
    <div class="clear" />
  </xsl:template>
</xsl:stylesheet>
