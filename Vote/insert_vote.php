<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../stylesheet.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<title>Classy F***ing Vote Submission</title>
</head>
<body>
	<div class='centered width-restricted'>
		<?php
		if($_POST["type"] == "red"){
			$winetype = "red";
			$table = "reds";
			} elseif ($_POST["type"] == "white"){
				$winetype = "white";
				$table = "whites";
			} elseif ($_POST["type"] == "sparkling"){
				$winetype = "sparkling";
				$table = "sparkling";
			}

		$con = mysql_connect("127.0.0.1","wino","SuperSecretPassword");
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("wine", $con);

		if (isset($_POST[vote])) {
			$sql .=" INSERT INTO votes (tastingnumber, winetype, wineid)
			SELECT
			'$_POST[vote]'
			, '$winetype'
			, wineid
			FROM $table
			WHERE tastingnumber = $_POST[vote];" ;
		}


		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "<h1>Thank You For Voting</h1>
			<p>You will be redirected momentarily.
				If not, click <a href='/wine/vote'>here</a>.</p>";
		echo "<meta http-equiv=\"REFRESH\"content=\"4;/wine/vote\">";

		mysql_close($con);
		?>
	</div>
</body>
</html>
