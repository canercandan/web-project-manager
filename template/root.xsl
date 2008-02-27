<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
	<title>TechWeb</title>
	<link rel="stylesheet" type="text/css"
	      href="./css/styles.css" />
      </head>
      <body>
	<div id="content">
	  <div id="header">
	    <h1>TechWeb</h1>
	    <ul id="nav">
	      <xsl:choose>
		<xsl:when test="doc/body/home">
		  <li class="on"><a href="./index.php">Home</a></li>
		</xsl:when>
		<xsl:otherwise>
		  <li><a href="./index.php">Home</a></li>
		</xsl:otherwise>
	      </xsl:choose>
	      <xsl:choose>
		<xsl:when test="doc/body/create">
		  <li class="on"><a href="./create.php">Inscription</a></li>
		</xsl:when>
		<xsl:otherwise>
		  <li><a href="./create.php">Inscription</a></li>
		</xsl:otherwise>
	      </xsl:choose>
	      <xsl:choose>
		<xsl:when test="doc/body/connect">
		  <li class="on"><a href="./connect.php">Connexion</a></li>
		</xsl:when>
		<xsl:otherwise>
		  <li><a href="./connect.php">Connexion</a></li>
		</xsl:otherwise>
	      </xsl:choose>
	      <xsl:choose>
		<xsl:when test="doc/body/contact">
		  <li class="on"><a href="#">Contact</a></li>
		</xsl:when>
		<xsl:otherwise>
		  <li><a href="#">Contact</a></li>
		</xsl:otherwise>
	      </xsl:choose>
	      <xsl:choose>
		<xsl:when test="doc/body/project">
		  <li class="on"><a href="./root.php">Project</a></li>
		</xsl:when>
		<xsl:otherwise>
		  <li><a href="./root.php">Project</a></li>
		</xsl:otherwise>
	      </xsl:choose>
	    </ul>
	    <div class="clear" />
	  </div>
	  <div id="body">
	    <xsl:choose>
	      <xsl:when test="doc/body/project">
		<div class="box2">
		  <div class="menu blue1">
		    <xsl:if test="doc/body/project">
		      <xsl:apply-templates select="doc/body/project" />
		    </xsl:if>
		  </div>
		  <div class="box">
		    <xsl:choose>
		      <xsl:when test="doc/body/add_project">
			<xsl:apply-templates select="doc/body/add_project" />
		      </xsl:when>
		      <xsl:otherwise>
			<xsl:if test="doc/body/project_window">
			  <h2 class="blue2">
			    <xsl:value-of select="doc/body/project_window/name" />
			  </h2>
			  <div class="menu blue2">
			    <xsl:apply-templates select="doc/body/project_window" />
			  </div>
			</xsl:if>
			<div class="box">
			  <xsl:choose>
			    <xsl:when test="doc/body/project_window/activity_window">
			      <xsl:apply-templates select="doc/body/project_window/activity_window" />
			    </xsl:when>
			    <xsl:otherwise>
			      <xsl:if test="doc/body/project_window/add_activity">
				<xsl:apply-templates select="doc/body/project_window/add_activity" />
			      </xsl:if>
			    </xsl:otherwise>
			  </xsl:choose>
			</div>
			<div class="clear" />
		      </xsl:otherwise>
		    </xsl:choose>
		  </div>
		  <div class="clear" />
		</div>
	      </xsl:when>
	      <xsl:otherwise>
		<div>
		  <xsl:if test="doc/body/home">
		    <xsl:apply-templates select="doc/body/home" />
		  </xsl:if>
		  <xsl:if test="doc/body/create">
		    <xsl:apply-templates select="doc/body/create" />
		  </xsl:if>
		  <xsl:if test="doc/body/connect">
		    <xsl:apply-templates select="doc/body/connect" />
		  </xsl:if>
		  <xsl:if test="doc/body/profil">
		    <xsl:apply-templates select="doc/body/profil" />
		  </xsl:if>
		</div>
	      </xsl:otherwise>
	    </xsl:choose>
	    <div class="clear" />
	  </div>
	  <div id="footer">
	    <xsl:apply-templates select="doc/footer" />
	  </div>
	</div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
