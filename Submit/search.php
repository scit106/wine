<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<title>Classy F***ing Wine Search Results</title>
</head>
<body>

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
	$resulttable = str_replace(
						"<th hidden>&nbsp;</th>"
						, "<th hidden>&nbsp;</th>
							<th>Select Your Wine</th>"
						, $resulttable
						); //to add a "use this!" column
	$resulttable = str_replace(array("\n", "\r", "\r\n","\t","\n\t","\r\n\t","\r\t"), '', $resulttable); //removes tabs and returns for easier replaces
	$resulttable = str_replace(	"</td></tr>"
					, "</td><td><a href=\"placeholder\">Use This!<a></td>
					</tr>"
					, $resulttable);
	echo "$resulttable";
?>
</body>
</hmtl>

