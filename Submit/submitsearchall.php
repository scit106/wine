<?php

$con = mysql_connect("localhost","wino","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wine", $con);

	$sql .=" INSERT INTO reds (wineid, style, manufacturer, year, price, purchaser, tastingnumber, winename)
	VALUES(
	UUID()
	, '$style'
	, '$manufacturer'
	, '$year'
	, '$price'
	, '$purchaser'
	, '$tastingnumber'
	, '$winename'
	);";



if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<meta http-equiv=\"REFRESH\"content=\"0;http://www.bathrobeman.com/\">";

mysql_close($con);
?>
