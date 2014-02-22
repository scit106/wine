<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<title>Classy F***ing Wine Tasting</title>
</head>
<body>
	<div class = "centered width-restricted">
		<h1>Welcome!</h1>
		<h3>Please Select An Action</h3>
		<h3><a href='/vote'>[Vote]</a></h3>
		<h3><a href="/submit">[Submit A Wine]</a></h3>
		<?php if (date('dGi') >= '230430'): ?>
			<h3><a href="results.php">[View Results]</a></h3>
		<?php endif; ?>
</div>
</body>
</html>
