<?php
$con = mysql_connect("localhost","wino","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wine", $con);

if (isset($_POST[sparkling])) {
	$sql .=" INSERT INTO votes (tastingnumber, winetype, wineid)
	SELECT 
	'$_POST[sparkling]'
	, 'sparkling'
	, wineid
	FROM sparkling 
	WHERE tastingnumber = $_POST[sparkling];" ;
}


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<meta http-equiv=\"REFRESH\"content=\"0;http://www.bathrobeman.com/wine\">";

mysql_close($con);
?>
