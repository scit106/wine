<?php
$con = mysql_connect("localhost","wino","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wine", $con);

if (isset($_POST[white])) {
	$sql .=" INSERT INTO votes (tastingnumber, winetype, wineid)
	SELECT 
	'$_POST[white]'
	, 'white'
	, wineid 
	FROM whites 
	WHERE tastingnumber = $_POST[white];";
}


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<meta http-equiv=\"REFRESH\"content=\"0;http://www.bathrobeman.com/wine\">";

mysql_close($con);
?>
