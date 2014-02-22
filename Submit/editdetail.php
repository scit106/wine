<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../stylesheet.css" />
	<title>Classy F***ing Wine Submission</title>
</head>
<body>
<?php
$apikey = "5na931xwbey79ngkupjjobm2akv7da7caa7b5rhl1asux25c";
$wineid = $_GET["wineid"];
$winepage = file_get_contents("http://api.snooth.com/wine?akey=$apikey&id=$wineid");
$jsonoutput = json_decode($winepage, TRUE);
$wineinfo = $jsonoutput["wines"];
$winery = $wineinfo[0]["winery"];
$year = $wineinfo[0]["vintage"];
$price = $wineinfo[0]["price"];
$winename = $wineinfo[0]["name"];
$style = $wineinfo[0]["varietal"];
$type = $wineinfo[0]["type"];
$externalid = $wineinfo[0]["code"];
$pic = $wineinfo[0]["image"];
$description = $wineinfo[0]["wm_notes"];
$tastenotes = $wineinfo[0]["winery_tasting_notes"];
?>
<div class="detail-page">
	<h1>Edit Your Wine Details</h1>
	<div class="form-details">
		<form class="form-horizontal" action="submit.php" method="post">
			<label>
				<div class='form-label'>Wine Name</div>
				<input type="text" name="winename" value="<?php echo $winename; ?>">
			</label>
			<label>
				<div class='form-label'>Style</div>
				<input type="text" name="style" value="<?php echo $style; ?>" >
			</label>
			<label>
				<div class='form-label'>Type</div>
				<select name="type">
					<option value="red" <?php if($type == "Red Wine") echo "selected";?>>Red</option>
					<option value="white" <?php if($type == "White Wine") echo "selected";?>>White</option>
					<option value="sparkling" <?php if($type == "Sparkling Wine") echo "selected";?>>Sparkling</option>
				</select>
			</label>
			<label>
				<div class='form-label'>Vineyard</div>
				<input type="text" name="winery" value="<?php echo $winery; ?>">
			</label>
			<label>
				<div class='form-label'>Year</div>
				<input type="number" name="year" value="<?php echo $year; ?>">
			</label>
			<label>
				<div class='form-label'>Price</div>
				<input type="number" step=".01" name="price" value="<?php echo $price; ?>">
			</label>
			<label>
				<div class='form-label'>Purchaser</div>
				<input type="text" name="purchaser">
			</label>
			<label>
				<div class='form-label'>Tasting Number</div>
				<input type="number"  name="tastingnumber" required><br>
			</label>
			<input type="hidden" name="externalid" value="<?php echo $externalid; ?>">
			<input type="hidden" name = "externalsource" value="snooth">
			<button class="full-button" type="submit" value="Enter!">Enter</button>
		</form>
	</div>
	<div class="wine-details">
		<img src="<?php echo $pic; ?>">
		<!-- To Do: Add sciencey info here like alcohol content, sugar, ph -->
		<?php if ($description): ?>
			<h3>Description</h3>
			<p><?php echo $description; ?></p>
		<?php endif; ?>
		<?php if ($tastenotes): ?>
			<h3>What You'll Taste</h3>
			<p><?php echo $tastenotes; ?></p>
		<?php endif; ?>
	</div>
</div>
</body>
</html>
