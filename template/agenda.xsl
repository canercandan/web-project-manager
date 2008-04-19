<?xml version="1.0" encoding="ISO-8859-1"?>

<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="agenda[@view=5]/month/item/@value">
    <div class="title">
      <a href="?id={../../../@id}&amp;get_view=4&amp;minute={../../../@minute}&amp;hour={../../../@hour}&amp;day={../../../@day}&amp;month={.}&amp;year={../../../@year}">
	<xsl:value-of select="." />
      </a>
    </div>
    <xsl:variable name="month" select="." />
    <xsl:for-each select="../../../event/item[@month=$month]">
      <xsl:sort select="@day" />
      <div class="line">
	<a href="?id={../../@id}&amp;get_view=6&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year}">
	  <xsl:value-of select="@month" />/<xsl:value-of select="@day" />
	  -
	  <xsl:value-of select="@subject" />
	</a>
      </div>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="agenda[@view=4]/day/item/@value">
    <div class="title">
      <a href="?id={../../../@id}&amp;get_view=3&amp;minute={../../../@minute}&amp;hour={../../../@hour}&amp;day={.}&amp;month={../../../@month}&amp;year={../../../@year}">
	<xsl:value-of select="." />
      </a>
    </div>
    <xsl:variable name="day" select="." />
    <xsl:for-each select="../../../event/item[@day=$day]">
      <xsl:sort select="@hour" />
      <div class="line">
	<a href="?id={../../@id}&amp;get_view=6&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year}">
	  <xsl:value-of select="@hour" />h<xsl:value-of select="@minute" />
	  -
	  <xsl:value-of select="@subject" />
	</a>
      </div>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="agenda[@view=3]/hour/item/@value">
    <div class="title">
      <a href="#">
	<xsl:value-of select="." />
      </a>
    </div>
    <xsl:variable name="hour" select="." />
    <xsl:for-each select="../../../event/item[@hour=$hour]">
      <xsl:sort select="@minute" />
      <div class="line">
	<a href="?id={../../@id}&amp;get_view=6&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year}">
	  <xsl:value-of select="@hour" />h<xsl:value-of select="@minute" />
	  -
	  <xsl:value-of select="@subject" />
	</a>
      </div>
    </xsl:for-each>
  </xsl:template>

  <xsl:template match="agenda[@view=3]/hour">
    <xsl:for-each select="item">
      <div class="event">
	<xsl:apply-templates select="@value" />
      </div>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="agenda[@view=4]/day">
    <xsl:for-each select="item">
      <div class="event">
	<xsl:apply-templates select="@value" />
      </div>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="agenda[@view=5]/month">
    <xsl:for-each select="item">
      <div class="event">
	<xsl:apply-templates select="@value" />
      </div>
    </xsl:for-each>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="agenda/@view">
    <div class="view">
      <div>View</div>
      <xsl:choose>
	<xsl:when test="../@view=5">
	  <div class="on">
	    <a href="?id={../@id}&amp;get_view=5&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Year</a>
	  </div>
	</xsl:when>
	<xsl:otherwise>
	  <div>
	    <a href="?id={../@id}&amp;get_view=5&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Year</a>
	  </div>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../@view=4">
	  <div class="on">
	    <a href="?id={../@id}&amp;get_view=4&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Month</a>
	  </div>
	</xsl:when>
	<xsl:otherwise>
	  <div>
	    <a href="?id={../@id}&amp;get_view=4&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Month</a>
	  </div>
	</xsl:otherwise>
      </xsl:choose>
      <xsl:choose>
	<xsl:when test="../@view=3">
	  <div class="on">
	    <a href="?id={../@id}&amp;get_view=3&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Day</a>
	  </div>
	</xsl:when>
	<xsl:otherwise>
	  <div>
	    <a href="?id={../@id}&amp;get_view=3&amp;minute={../@minute}&amp;hour={../@hour}&amp;day={../@day}&amp;month={../@month}&amp;year={../@year}">Day</a>
	  </div>
	</xsl:otherwise>
      </xsl:choose>
    </div>
    <div class="clear" />
  </xsl:template>

  <xsl:template match="body/agenda">
    <div class="box2">
      <h3 class="blue1">Agenda</h3>
      <ul class="line">
	<li class="go">
	  <a href="?id={@id}&amp;get_view=4&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year}">
	    Browse
	  </a>
	</li>
	<li class="go">
	  <a href="?add=1&amp;id={@id}&amp;get_view=4&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year}">
	    Add an event
	  </a>
	</li>
      </ul>
      <xsl:choose>
	<xsl:when test="@view=6">
	  <fieldset>
	    <legend>Event's detail</legend>
	    <xsl:variable name="year" select="@year" />
	    <xsl:variable name="month" select="@month" />
	    <xsl:variable name="day" select="@day" />
	    <xsl:variable name="hour" select="@hour" />
	    <xsl:variable name="minute" select="@minute" />
	    <xsl:for-each select="event/item[@year=$year and @month=$month and @day=$day and @hour=$hour and @minute=$minute]">
	      <div class="form">
		<label>
		  <xsl:value-of select="@year" />
		  /
		  <xsl:value-of select="@month" />
		  /
		  <xsl:value-of select="@day" />
		  <br />
		  <xsl:value-of select="@hour" />
		  :
		  <xsl:value-of select="@minute" />
		</label>
		<hr />
		<label>
		  Event's subject<br />
		  <input type="text" value="{@subject}" disabled="disabled" />
		</label>
		<hr />
		<label class="big">
		  Event's comment<br />
		  <textarea disabled="disabled">
		    <xsl:value-of select="." />
		  </textarea>
		</label>
		<hr />
		<br />
	      </div>
	    </xsl:for-each>
	  </fieldset>
	</xsl:when>
	<xsl:when test="@add=1 or @add=2 or @add=3">
	  <xsl:if test="@add=2 or @add=3">
	    <fieldset>
	      <xsl:choose>
		<xsl:when test="@add=2">
		  <legend>Added</legend>
		  <div class="form">
		    Your event has been added with success.
		  </div>
		</xsl:when>
		<xsl:when test="@add=3">
		  <legend>Error</legend>
		  <div class="form">
		    There are errors in your form.
		  </div>
		</xsl:when>
	      </xsl:choose>
	    </fieldset>
	  </xsl:if>
	  <form action="?" method="post">
	    <input type="hidden" name="add" value="{@add}" />
	    <input type="hidden" name="id" value="{@id}" />
	    <fieldset>
	      <legend>Add an event</legend>
	      <div class="form">
		<div class="little">
		  Event's date<br />
		  <select name="{day/@name}">
		    <xsl:variable name="day" select="@day" />
		    <xsl:for-each select="day/item">
		      <xsl:choose>
			<xsl:when test="@value=$day">
			  <option value="{@value}" selected="selected">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:when>
			<xsl:otherwise>
			  <option value="{@value}">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:otherwise>
		      </xsl:choose>
		    </xsl:for-each>
		  </select>
		  /
		  <select name="{month/@name}">
		    <xsl:variable name="month" select="@month" />
		    <xsl:for-each select="month/item">
		      <xsl:choose>
			<xsl:when test="@value=$month">
			  <option value="{@value}" selected="selected">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:when>
			<xsl:otherwise>
			  <option value="{@value}">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:otherwise>
		      </xsl:choose>
		    </xsl:for-each>
		  </select>
		  /
		  <select name="{year/@name}">
		    <xsl:variable name="year" select="@year" />
		    <xsl:for-each select="year/item">
		      <xsl:choose>
			<xsl:when test="@value=$year">
			  <option value="{@value}" selected="selected">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:when>
			<xsl:otherwise>
			  <option value="{@value}">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:otherwise>
		      </xsl:choose>
		    </xsl:for-each>
		  </select>
		</div>
		<hr />
		<div class="little">
		  Event's time<br />
		  <select name="{hour/@name}">
		    <xsl:variable name="hour" select="@hour" />
		    <xsl:for-each select="hour/item">
		      <xsl:choose>
			<xsl:when test="@value=$hour">
			  <option value="{@value}" selected="selected">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:when>
			<xsl:otherwise>
			  <option value="{@value}">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:otherwise>
		      </xsl:choose>
		    </xsl:for-each>
		  </select>
		  :
		  <select name="{minute/@name}">
		    <xsl:variable name="minute" select="@minute" />
		    <xsl:for-each select="minute/item">
		      <xsl:choose>
			<xsl:when test="@value=$minute">
			  <option value="{@value}" selected="selected">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:when>
			<xsl:otherwise>
			  <option value="{@value}">
			    <xsl:value-of select="@value" />
			  </option>
			</xsl:otherwise>
		      </xsl:choose>
		    </xsl:for-each>
		  </select>
		</div>
		<hr />
		<label>
		  Event's subject<br />
		  <input type="text" name="subject" />
		</label>
		<hr />
		<label class="big">
		  Event's comment<br />
		  <textarea name="body" />
		</label>
		<hr />
		<label>
		  <input type="submit" value="Save" />
		</label>
	      </div>
	    </fieldset>
	  </form>
	</xsl:when>
	<xsl:otherwise>
	  <xsl:apply-templates select="@view" />
	  <br />
	  <xsl:choose>
	    <xsl:when test="@view=5">
	      <h2 class="blue2">
		Year's view :<br />
		<xsl:value-of select="@year" />
	      </h2>
	      <h2 class="blue3">
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year - 1}">Previous</a>
		-
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month}&amp;year={@year + 1}">Next</a>
	      </h2>
	      <div class="agenda">
		<xsl:apply-templates select="month" />
	      </div>
	    </xsl:when>
	    <xsl:when test="@view=4">
	      <h2 class="blue2">
		Month's view :<br />
		<xsl:value-of select="@year" />
		-
		<xsl:value-of select="@month" />
	      </h2>
	      <h2 class="blue3">
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month - 1}&amp;year={@year}">Previous</a>
		-
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day}&amp;month={@month + 1}&amp;year={@year}">Next</a>
	      </h2>
	      <div class="agenda">
		<xsl:apply-templates select="day" />
	      </div>
	    </xsl:when>
	    <xsl:when test="@view=3">
	      <h2 class="blue2">
		Day's view :<br />
		<xsl:value-of select="@year" />
		-
		<xsl:value-of select="@month" />
		-
		<xsl:value-of select="@day" />
	      </h2>
	      <h2 class="blue3">
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day - 1}&amp;month={@month}&amp;year={@year}">Previous</a>
		-
		<a href="?id={@id}&amp;get_view={@view}&amp;minute={@minute}&amp;hour={@hour}&amp;day={@day + 1}&amp;month={@month}&amp;year={@year}">Next</a>
	      </h2>
	      <div class="agenda">
		<xsl:apply-templates select="hour" />
	      </div>
	    </xsl:when>
	  </xsl:choose>
	  <br />
	  <xsl:apply-templates select="@view" />
	</xsl:otherwise>
      </xsl:choose>
    </div>
  </xsl:template>
</xsl:stylesheet>
