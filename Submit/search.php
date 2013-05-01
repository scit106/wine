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
	$apikey = "5na931xwbey79ngkupjjobm2akv7da7caa7b5rhl1asux25c";
	$searchterm = $_POST["winename"];
	$searchterm = str_replace(" ", "%20", rtrim(ltrim($searchterm)));
	//Calls snooth API with query of searchterm, 20 results
	$resultpage = file_get_contents("http://api.snooth.com/wines?akey=$apikey&q=$searchterm&n=20"); 
	$jsonoutput = json_decode($resultpage);
	// str_replace(replace this, with this, in this) 
	//substr($string, starting position (int), length (int))
	// strpos(string, find, start)
?>
<table class="table table-hover">
	<tr>
		<th>Name</th>
		<th>Style</th>
		<th>Type</th>
		<th>Winery</th>
		<th>Region</th>
		<th>Price</th>
		<th hidden>External ID</th>
	</tr>
<?php
foreach ($jsonoutput->wines as $result) {
	echo "<tr><td>{$result->name}</td>
	<td>{$result->varietal}</td>
	<td>{$result->type}</td>
	<td>{$result->winery}</td>
	<td>{$result->region}</td>
	<td>{$result->price}</td>
	<td hidden>{$result->code}</td></tr>";
}
?>
<p>Don't See Your Wine Listed?<a href="editdetail.php">Click Here</a> To Enter It Manually</p>
</div>
</body>
</hmtl>

