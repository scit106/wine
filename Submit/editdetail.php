<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Wine Submission</title>
</head>
<body>
<?php
$apikey = "5na931xwbey79ngkupjjobm2akv7da7caa7b5rhl1asux25c";
$wineid = "cupcake-vineyards-pinot-noir-central-coast-2009";
$winepage = file_get_contents("http://api.snooth.com/wine?akey=$apikey&id=$wineid");
$jsonoutput = json_decode($winepage);
$wineinfo = {$jsonoutput->wine};
$manufacturer = null;
$manufacturer = null;
$year = null;
$price = null;
$winename = null;
?>
<form class="form-horizontal" action="submit.php" method="post">
	<div class="left">
	Wine Name <input type="text" name="winename" value="<?php echo $winename; ?>"><br>
	Style <input type="text" name="style"><br>
	Type <select name="type">
		<option value="red">Red</option>
		<option value="white">White</option>
		<option value="sparkling">Sparkling</option>
	</select><br>
	Vineyard <input type="text" name="manufacturer" value="<?php echo $manufacturer; ?>"><br>
	Year <input type="number" name="year" value="<?php echo $year; ?>"><br>
	Price <input type="number" step=".01" name="price" value="<?php echo $price; ?>"><br>
	Purchaser <input type="text" name="purchaser"><br>
	Tasting Number <input type="number"  name="tastingnumber" required><br>
	<input type="submit" value="Enter!">
</div>
<div class="right">
	<!--<img src= -->
</div>
</form>
</body>
</html>