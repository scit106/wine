<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Wine Submission Confirmation</title>
</head>
<body>
	<div class="formalign">
<?php

if($_POST["type"] == "red"){
	$table = "reds";
	} elseif ($_POST["type"] == "white"){
		$table = "whites";
	} elseif ($_POST["type"] == "sparkling"){
		$table = "sparkling";
	} 

$style = $_POST["style"];
$manufacturer = $_POST["manufacturer"];
$year = $_POST["year"];
$price = $_POST["price"];
$purchaser = $_POST["purchaser"];
$tastingnumber = $_POST["tastingnumber"];
$winename = $_POST["winename"];
$externalid = $_POST["externalid"];
$externalsource = $_POST["externalsource"];

//lets clean up these inputs a bit
$style = strip_tags(str_replace("'", "''", $style));
$manufacturer = strip_tags(str_replace("'", "''", $manufacturer));
$purchaser = strip_tags(str_replace("'", "''", $purchaser));
$winename = strip_tags(str_replace("'", "''", $winename));

//Set up the SQL inserts
$con = mysql_connect("localhost","wino","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wine", $con);

	$sql .=" INSERT INTO $table (
			wineid
			, style
			, manufacturer
			, year
			, price
			, purchaser
			, tastingnumber
			, winename
			, externalid
			, externalsource)
	VALUES(
	UUID()
	, '$style'
	, '$manufacturer'
	, '$year'
	, '$price'
	, '$purchaser'
	, '$tastingnumber'
	, '$winename'
	, '$externalid'
	, '$externalsource'
	);";



if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<h1>Thank You For Submitting</h1>
		<p>You will be redirected momentarily. 
		If not, click <a href=\"http://www.bathrobeman.com\">here</a></p>";
echo "<meta http-equiv=\"REFRESH\"content=\"5;http://www.bathrobeman.com/\">";

mysql_close($con);
?>
</div>
</body>
</html>
