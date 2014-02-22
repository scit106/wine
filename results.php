<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Voting Results</title>
</head>
<body>
<div class="formalign">
<?php
$con = mysql_connect("127.0.0.1","wino","SuperSecretPassword");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("wine", $con);

	$sql .= " SELECT * FROM
			(SELECT
				winename
				, 'white' as type
				, whites.tastingnumber
				, purchaser
				, count(votes.tastingnumber) AS votes
			FROM whites
			LEFT JOIN votes
				ON votes.wineid = whites.wineid
			group by winename, purchaser

			UNION

			SELECT
				winename
				, 'red' as type
				, reds.tastingnumber
				, purchaser
				, count(votes.tastingnumber) AS votes
			FROM reds
			LEFT JOIN votes
				ON votes.wineid = reds.wineid
			group by winename, purchaser

			UNION

			SELECT
				winename
				, 'sparkling' as type
				, sparkling.tastingnumber
				, purchaser
				, count(votes.tastingnumber) AS votes
			FROM sparkling
			LEFT JOIN votes
				ON votes.wineid = sparkling.wineid
			group by winename, purchaser
			) a
			" ;

if ($_GET['sort'] == 'number')
{$sql .= " ORDER BY tastingnumber";}
elseif ($_GET['sort'] == 'numberdesc')
{$sql .= " ORDER BY tastingnumber DESC";}
elseif ($_GET['sort'] == 'vote')
{$sql .= " ORDER BY votes";}
elseif ($_GET['sort'] == 'votedesc')
{$sql .= " ORDER BY votes DESC";}

$result = mysql_query($sql) or die(mysql_error());

echo "<table class='table table-hover'>";
echo "<tr>
<th>Wine Name</th>
<th>Wine Type</th>
<th>Tasting Number<a href='results.php?sort=number'> &uarr;</a><a href='results.php?sort=numberdesc'> &darr;</a></th>
<th>Brought By</th>
<th>Votes<a href='results.php?sort=vote'> &uarr;</a><a href='results.php?sort=votedesc'> &darr;</a></th>
</tr>";

while($row = mysql_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>";
	echo $row['winename'];
	echo "</td><td>";
	echo $row['type'];
	echo "</td><td>";
	echo $row['tastingnumber'];
	echo "</td><td>";
	echo $row['purchaser'];
	echo "</td><td>";
	echo $row['votes'];
	echo "</td></tr>";
}
echo "</table>";

 mysql_close($con);

?>
<p><a href="/wine">[HOME]</a></p>
</div>
</body>
</html>
