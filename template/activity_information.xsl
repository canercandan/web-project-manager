<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="infoactivity">
    <xsl:choose>
	<xsl:when test="infoproject">
	  <xsl:apply-templates select="infoproject" />
	    <div class="member_list">
	    <table class="table">
	      <caption>Member project</caption>
	      <thead>
	        <tr>
			  <th>Select</th>
			  <th>Member</th>
			  <th>Action</th>
	        </tr>
	      </thead>
	    </table>
	  </div>
	<xsl:when test="infocharge">
	  <xsl:template match="infocharge">
	    <div class="member_list">
	      <table class="table">
	        <caption>Member Charge</caption>
	        <thead>
	          <tr>
			    <th>Select</th>
			    <th>Member</th>
			    <th>Activity</th>
			    <th>Answer</th>
			    <th>Action</th>
	          </tr>
	        </thead>
	      </table>
	    </div>
	<xsl:when test="infoanswer">
	  <xsl:template match="infoanswer">
	    <div class="member_list">
	      <table class="table">
	        <caption>Member project</caption>
	        <thead>
	          <tr>
			    <th>Select</th>
			    <th>Acitivty</th>
			    <th>Answer</th>
			    <th>Action</th>
	          </tr>
	        </thead>
	      </table>
	    </div>
    <xsl:apply-templates select="infoproject" />
    </xsl:template>
</xsl:stylesheet>