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
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="./create.php" method="post">
	  <fieldset>
	    <legend>Inscription</legend>
	    <div class="form">
	      With this form, you can create an account.<br />
	      <br />
	      <label>
		Login<br />
		<input type="text" name="{field_login}"
		       value="{value_login}" />
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
		<input type="text" name="{field_email}"
		       value="{value_email}" />
	      </label><br />
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <xsl:template match="profil">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="./profil.php" method="post">
	  <fieldset>
	    <legend>Profil</legend>
	    <div class="form">
	      <label>
		Location<br />
		<select name="{field_location/name}">
		  <xsl:for-each select="field_location/item">
		    <option value="{id}">
		      <xsl:value-of select="name" />
		    </option>
		  </xsl:for-each>
		</select>
	      </label><br />
	      <label>
		Title<br />
		<select name="{field_title/name}">
		  <xsl:for-each select="field_title/item">
		    <option value="{id}">
		      <xsl:value-of select="name" />
		    </option>
		  </xsl:for-each>
		</select>
	      </label><br />
	      <label>
		Name<br />
		<input type="text" name="{field_name}"
		       value="{value_name}" />
	      </label><br />
	      <label>
		First name<br />
		<input type="text" name="{field_fname}"
		       value="{value_fname}" />
	      </label><br />
	      <label>
		Phone<br />
		<input type="text" name="{field_fphone}"
		       value="{value_fphone}" />
	      </label><br />
	      <label>
		Mobile<br />
		<input type="text" name="{field_mphone}"
		       value="{value_mphone}" />
	      </label><br />
	      <label>
		Address personal<br />
		<input type="text" name="{field_address}"
		       value="{value_address}" />
	      </label><br />
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <xsl:template match="connect">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="./connect.php" method="post">
	  <fieldset>
	    <legend>Connexion</legend>
	    <div class="form">
	      With this form, you can sign in an account.<br />
	      <br />
	      <label>
		Login<br />
		<input type="text" name="{field_login}" value="{value_login}" />
	      </label><br />
	      <label>
		Password<br />
		<input type="password" name="{field_passwd}" />
	      </label><br />
	      <input type="submit" value="Ok" />
	    </div>
	  </fieldset>
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <xsl:template match="add_activity">
    <xsl:choose>
      <xsl:when test="mesg">
	<xsl:apply-templates select="mesg" />
      </xsl:when>
      <xsl:otherwise>
	<xsl:if test="error">
	  <xsl:apply-templates select="error" />
	</xsl:if>
	<form action="#" method="post">
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
	</form>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <xsl:template match="activity">
    <ul>
    <xsl:for-each select=".">
      <xsl:choose>
	<xsl:when test="developped=1">
	  <li>
	    <a href="./root.php?less=1&amp;activity={id}">
	      <img src="./images/icons/less.png" />
	    </a>
	    <xsl:value-of select="title" />
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
		<xsl:value-of select="title" />
	      </li>
	    </xsl:when>
	    <xsl:otherwise>
	      <li>
		<img src="./images/icons/less_not.png" />
		<xsl:value-of select="title" />
	      </li>
	    </xsl:otherwise>
	  </xsl:choose>
	</xsl:otherwise>
      </xsl:choose>
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
