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
$jsonoutput = json_decode($winepage, TRUE);
$wineinfo = $jsonoutput["wines"];
$manufacturer = $wineinfo[0]["winery"];
$year = $wineinfo[0]["vintage"];
$price = $wineinfo[0]["price"];
$winename = $wineinfo[0]["name"];
$style = $wineinfo[0]["type"];
$externalid = $wineinfo[0]["code"];
$pic = $wineinfo[0]["image"];
$description = $wineinfo[0]["wm_notes"];
$tastenotes = $wineinfo[0]["winery_tasting_notes"];
?>
<div class="left">
<form class="form-horizontal" action="submit.php" method="post">
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
	<input type="hidden" name="externalid" value="<?php echo $externalid; ?>">
	<input type="submit" value="Enter!">
</form>
</div>
<div class="right">
	<img src="<?php echo $pic; ?>">
	<!-- To Do: Add sciencey info here like alcohol content, sugar, ph -->
	<h3>Description</h3>
	<p><?php echo $description; ?></p>
	<h3>What You'll Taste</h3>
	<p><?php echo $tastenotes; ?></p>

</div>
</body>
</html>