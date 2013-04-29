<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Wine Submission</title>
</head>
<body>
<?php
$winepage = file_get_contents($_POST["documentlink"]);
$manufacturer = substr(
					$winepage
					, strpos($winepage,"<p class=\"v65-productStoreDrilldownBrand\">")
					, strpos($winepage, "</a>&nbsp;</p>") - strpos($winepage,"<p class=\"v65-productStoreDrilldownBrand\">")
					);
$manufacturer = strip_tags(preg_replace("/<a href=\"(.*?)\">/", "", $manufacturer));
// to pull year information
preg_match("/20[0-9]{2}/", substr(
										$winepage
										, strpos($winepage, "<div class=\"v65-productAttribute\">")
										, strpos($winepage, "<h3 id=\"productReviewsAnchor\">Product Reviews</h3>") 
										- strpos($winepage, "<div class=\"v65-productAttribute\">")
										)
				, $match);
$year = $match[0];
$price = str_replace(array("<","$",">","/","d")
					, ""
					, substr(
						$winepage
						, strpos($winepage, "<div class=\"v65-productAddToCartPrice\">") 
						+ strlen("<div class=\"v65-productAddToCartPrice\">")
						, 6)	
					);
$winename = rtrim(ltrim(strip_tags(
			substr(
				$winepage
				, strpos($winepage, "<div id=\"v65-productStoreDrilldownDescription\">")
				, strpos($winepage, "<p class=\"v65-productStoreDrilldownBrand\">")
				 - strpos($winepage, "<div id=\"v65-productStoreDrilldownDescription\">")
				)
			)));
?>
<form class="form-horizontal" action="submitsearchall.php" method="post">
	<div class="formalign">
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
	Tasting Number <input type="number"  name="tastingnumber"><br>
	<input type="hidden" name="winepage" value="<?php $_POST["documentlink"]?>"><br>
	<input type="submit" value="Enter!">
</div>
</form>
</body>
</html>