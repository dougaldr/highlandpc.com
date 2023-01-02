<?php
$strTitle = 'Site Search';
$strDescr = 'Search our site.';
require ('start.inc');
?>

<p id="pgt">Search Our Site</p>

<p>&nbsp;</p>
<p>&nbsp;</p>

<div align="center">
<form method="get" action="http://www.highlandpc.com/cgi-bin/search/search.pl">
   <input name="Terms" id="fdse_TermsEx" />
   <input type="submit" value="Search" />
</form>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
require ('stop.inc');
?>
