<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../stylesheet.css" />
	<title>Classy F***ing Wine Search Results</title>
</head>
<body>
<div class="table-page">
	<h1>Search Results</h1>
	<div class="centered">
		<p>Select the wine which most closely resembles the one you brought</p>
		<p>Don't see your wine listed? <a href="editdetail.php">[Click Here]</a> to enter it manually</p>
	</div>
	<?php
		$apikey = "5na931xwbey79ngkupjjobm2akv7da7caa7b5rhl1asux25c";
		$searchterm = $_POST["winename"];
		$searchterm = str_replace(" ", "%20", rtrim(ltrim($searchterm)));
		//Calls snooth API with query of searchterm, 20 results
		$resultpage = file_get_contents("http://api.snooth.com/wines?akey=$apikey&q=$searchterm&n=20&a=0");
		$jsonoutput = json_decode($resultpage);
	?>
	<table class="table table-hover">
		<tr>
			<th>Name</th>
			<th>Style</th>
			<th>Type</th>
			<th>Winery</th>
			<th>Region</th>
			<th>Price</th>
		</tr>
	<?php
	foreach ($jsonoutput->wines as $result) {
		echo "<tr><td><a href=\"editdetail.php?wineid={$result->code}\">{$result->name}</a></td>
		<td><a href=\"editdetail.php?wineid={$result->code}\">{$result->varietal}</a></td>
		<td><a href=\"editdetail.php?wineid={$result->code}\">{$result->type}</a></td>
		<td><a href=\"editdetail.php?wineid={$result->code}\">{$result->winery}</a></td>
		<td><a href=\"editdetail.php?wineid={$result->code}\">{$result->region}</a></td>
		<td><a href=\"editdetail.php?wineid={$result->code}\">{$result->price}</a></td></tr>";
	}
	?>
	</table>
</div>
</body>
</hmtl>

