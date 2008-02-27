<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="information_activity">
    <fieldset>
      <legend>General</legend>
      <table class="list">
	<caption>Infomation</caption>
	<thead>
	  <tr>
	    <th>Name</th>
	    <th>Describe</th>
	    <th>Date</th>
	  </tr>
	</thead>
	<tbody>
	  <tr class="little">
	    <xsl:choose>
	      <xsl:when test="editable=1">
		<td>
		  <input type="text" name="{name/@post}"
			 value="{name}" />
		</td>
		<td>
		  <textarea name="describ/@post">
		    <xsl:value-of select="describ" />
		  </textarea>
		</td>
		<td>
		  DATE
		</td>
	      </xsl:when>
	      <xsl:otherwise>
		<td>
		  <xsl:value-of select="name" />
		</td>
		<td>
		  <xsl:value-of select="describ" />
		</td>
		<td>
		  <xsl:value-of select="date" />
		</td>
	      </xsl:otherwise>
	    </xsl:choose>
	  </tr>
	</tbody>
      </table>
    </fieldset>
    <xsl:if test="activity_work">
      <fieldset>
	<legend>Charge</legend>
	<div class="list">
	  <ul>
	    <xsl:apply-templates select="activity_work" />
	  </ul>
	</div>
      </fieldset>
    </xsl:if>
  </xsl:template>
</xsl:stylesheet>
