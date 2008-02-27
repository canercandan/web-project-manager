<?php

if (!MAIN)
  exit(0);
  
function get_months()
{
	printf('<list_month>');
	printf('<month id="1" name="January"/>');
	printf('<month id="2" name="February"/>');
	printf('<month id="3" name="March"/>');
	printf('<month id="4" name="April"/>');
	printf('<month id="5" name="May"/>');
	printf('<month id="6" name="June"/>');
	printf('<month id="7" name="July"/>');
	printf('<month id="8" name="August"/>');
	printf('<month id="9" name="September"/>');
	printf('<month id="10" name="October"/>');
	printf('<month id="11" name="November"/>');
	printf('<month id="12" name="December"/>');
	printf('</list_month>');
}

?>