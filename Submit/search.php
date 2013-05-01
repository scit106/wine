<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Wine Search Results</title>
</head>
<body>
<div class="formalign">
<?php
	$searchterm = $_POST["winename"];
	$searchterm = str_replace(" ", "+", rtrim(ltrim($searchterm)));
	$resultpage = file_get_contents("http://www.ballsquarefinewines.com/index.cfm?method=products.search&searchText=$searchterm"); //pulls bsfws result page
	// str_replace(replace this, with this, in this) 
	//substr($string, starting position (int), length (int))
	// strpos(string, find, start)
	// extracts the result table
	$resulttable = substr(
			$resultpage
			, strpos(
					$resultpage
					, "<div id=\"v65-storeProductasList\">"
					)
			, strrpos(
					$resultpage
					, "<!--/Products-->"
					)
				- strpos(
					$resultpage
					, "<div id=\"v65-storeProductasList\">"
					)
				) ;
	$resulttable = ltrim(str_replace("id=\"v65-storeProductasList\"", "", $resulttable));
	$resulttable = str_replace("<th class=\"right\">&nbsp;</th>", "<th hidden>&nbsp;</th>", $resulttable);
	$resulttable = str_replace("<td class=\"right\" id=\"v65-td-productListAddToCart\">", "<td hidden class=\"right\" id=\"v65-td-productListAddToCart\">", $resulttable);
	$resulttable = str_replace("href=\"", "href=\"http://www.ballsquarefinewines.com", $resulttable); //links each row back to bsfw
	$resulttable = preg_replace(
				"/<a href=\"(.*?)\">(.*?)<\/a>/"
				, "<form method=\"post\" action=\"editdetail.php\">
				<input type=\"hidden\" name=\"documentlink\" value=\"$1\">
				<input class=\"btn btn-link\" type=\"submit\" value=\"$2\">"
				, $resulttable);
	$resulttable = str_replace("<table", "<table class=\"table table-hover\"", $resulttable);
	echo "$resulttable";
?>
<p>Don't See Your Wine Listed?<a href="editdetail.php">Click Here</a> To Enter It Manually</p>
</div>
</body>
</hmtl>

