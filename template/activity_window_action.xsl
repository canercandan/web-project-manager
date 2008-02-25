<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="activity_window/admin">
    <div>
      Activity Menu
    </div>
    <ul>
      <xsl:for-each select=".">
	<li>
	  <a href="?activity=1&amp;information=1">
	    <img src="./images/icons/less_not.png" />
	    Information
	  </a>
	</li>
	<li>
	  <a href="?activity=1&amp;member=1">
	    <img src="./images/icons/less_not.png" />
	    Membres
	  </a>
	</li>
	<li>
	  <a href="?activity=1&amp;add_activity=1">
	    <img src="./images/icons/less_not.png" />
	    Add an sub-activity
	  </a>
	</li>
      </xsl:for-each>
    </ul>
  </xsl:template>
</xsl:stylesheet>
