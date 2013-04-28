<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<title>Classy F***ing Wine Search Results</title>
</head>
<body>

<?php
	$searchterm = $_POST[winename];
	$searchterm = str_replace(" ", "+", rtrim(ltrim($searchterm))));
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
	$resulttable = ltrim(str_replace($resulttable, "id=\"v65-storeProductasList\"", ""));
	echo "$resulttable";
?>
</body>
</hmtl>

