<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="infoactivity">
    <xsl:choose>
	  <xsl:when test="infoproject">
	  <xsl:apply-templates select="infoproject" />
	    <div class="member_list">
	      <table class="table">
	        <caption>Project's members</caption>
	        <thead>
	          <tr>
		    <th>Selection</th>
		    <th>Member</th>
		    <th>Action</th>
	          </tr>
		</thead>
	      </table>
		</div>
	  </xsl:when>
	  <xsl:when test="infocharge">
	  <xsl:apply-templates select="infocharge">
	    <div class="member_list">
	      <table class="table">
	        <caption>Member Charge</caption>
	        <thead>
	          <tr>
		    <th>Selection</th>
		    <th>Member</th>
		    <th>Activity</th>
		    <th>Answer</th>
		    <th>Action</th>
	          </tr>
	        </thead>
	      </table>
	    </div>
	  </xsl:apply-templates>
	  </xsl:when>
	  <xsl:when test="infoanswer">
	  <xsl:apply-templates select="infoanswer">
	    <div class="member_list">
	      <table class="table">
	        <caption>Project's members</caption>
	        <thead>
	          <tr>
		    <th>Selection</th>
		    <th>Acitivty</th>
		    <th>Answer</th>
		    <th>Action</th>
	          </tr>
	        </thead>
	      </table>
	    </div>
	  </xsl:apply-templates>
	</xsl:when>
	</xsl:choose>
  </xsl:template>
</xsl:stylesheet>
