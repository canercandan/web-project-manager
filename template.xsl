<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="iso-8859-1"
	      indent="yes" />
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
	    <ul id="menu">
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
	    <br class="clear" />
	  </div>
	  <div id="body">
	    <xsl:choose>
	      <xsl:when test="doc/body/project">
		<div id="nav">
		  Actions
		</div>
		<div id="box">
		  <xsl:if test="doc/body/project/add_activity">
		    <xsl:apply-templates select="doc/body/project/add_activity" />
		  </xsl:if>
		  <xsl:if test="doc/body/project/activity">
		    <div id="activity">
		      <xsl:apply-templates select="doc/body/project/activity" />
		    </div>
		  </xsl:if>
		</div>
	      </xsl:when>
	      <xsl:otherwise>
		<div>
		  <xsl:if test="doc/body/error">
		    <xsl:apply-templates select="doc/body/error" />
		  </xsl:if>
		  <xsl:if test="doc/body/mesg">
		    <xsl:apply-templates select="doc/body/mesg" />
		  </xsl:if>
		  <xsl:if test="doc/body/home">
		    <xsl:apply-templates select="doc/body/home" />
		  </xsl:if>
		  <xsl:if test="doc/body/create">
		    <xsl:apply-templates select="doc/body/create" />
		  </xsl:if>
		  <xsl:if test="doc/body/connect">
		    <xsl:apply-templates select="doc/body/connect" />
		  </xsl:if>
		</div>
	      </xsl:otherwise>
	    </xsl:choose>
	    <br class="clear" />
	  </div>
	  <div id="footer">
	    <xsl:apply-templates select="doc/footer" />
	  </div>
	</div>
      </body>
    </html>
  </xsl:template>
  <xsl:template match="footer">
    <xsl:value-of select="text" />
    <xsl:for-each select="autor">
      <span class="autor">
	<xsl:value-of select="." />
      </span>,
    </xsl:for-each>
  </xsl:template>
  <xsl:template match="home">
    <fieldset>
      <legend>Presentation</legend>
      <div>
	<xsl:value-of select="mesg" />
      </div>
    </fieldset>
  </xsl:template>
  <xsl:template match="create">
    <form action="./create.php" method="post">
      <fieldset>
	<legend>Inscription</legend>
	<div class="form">
	  With this form, you can create an account.<br />
	  <br />
	  <label>
	    Login<br />
	    <input type="text" name="{field_login}" />
	  </label><br />
	  <label>
	    Password<br />
	    <input type="password" name="{field_passwd}" />
	  </label><br />
	  <label>
	    Repeat password<br />
	    <input type="password" name="{field_repasswd}" />
	  </label><br />
	  <label>
	    Email<br />
	    <input type="text" name="{field_email}" />
	  </label><br />
	  <input type="submit" value="Ok" />
	</div>
      </fieldset>
    </form>
  </xsl:template>
  <xsl:template match="connect">
    <form action="./connect.php" method="post">
      <fieldset>
	<legend>Connexion</legend>
	<div class="form">
	  With this form, you can sign in an account.<br />
	  <br />
	  <label>
	    Login<br />
	    <input type="text" name="{field_login}" />
	  </label><br />
	  <label>
	    Password<br />
	    <input type="password" name="{field_passwd}" />
	  </label><br />
	  <input type="submit" value="Ok" />
	</div>
      </fieldset>
    </form>
  </xsl:template>
  <xsl:template match="add_activity">
    <form action="#" method="post">
      <xsl:choose>
	<xsl:when test="mesg">
	  <fieldset>
	    <legend>Confirmation</legend>
	    <div class="mesg">
	      <xsl:value-of select="mesg" />
	    </div>
	  </fieldset>
	</xsl:when>
	<xsl:otherwise>
	  <xsl:if test="error">
	    <fieldset>
	      <legend>Error</legend>
	      <div class="error">
		<xsl:value-of select="error" />
	      </div>
	    </fieldset>
	  </xsl:if>
	  <fieldset>
	    <legend>Add an activity</legend>
	    <div class="form">
	      <xsl:if test="field_activity_name">
		<label>
		  Name<br />
		  <input type="text" name="{field_activity_name}" />
		</label><br />
	      </xsl:if>
	      <xsl:if test="field_activity_describ">
		<label>
		  Describe<br />
		  <textarea name="{field_activity_describ}"></textarea>
		</label><br />
	      </xsl:if>
	      <xsl:if test="field_activity_charge">
		<label>
		  Charge<br />
		  <input type="text" name="{field_activity_charge}" />
		</label><br />
	      </xsl:if>
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</xsl:otherwise>
      </xsl:choose>
    </form>
  </xsl:template>
  <xsl:template match="activity">
    <ul>
    <xsl:for-each select=".">
      <xsl:if test="developped">
	<li><xsl:value-of select="title" /></li>
	<xsl:if test="activity">
	  <xsl:apply-templates select="activity" />
	</xsl:if>
      </xsl:if>
    </xsl:for-each>
    </ul>
  </xsl:template>
  <xsl:template match="error">
    <fieldset>
      <legend>Error</legend>
      <div class="error">
	<xsl:value-of select="." />
      </div>
    </fieldset>
  </xsl:template>
  <xsl:template match="mesg">
    <fieldset>
      <legend>Confirmation</legend>
      <div class="mesg">
	<xsl:value-of select="." />
      </div>
    </fieldset>
  </xsl:template>
</xsl:stylesheet>
