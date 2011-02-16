<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Install Form</title>
	<meta charset="UTF-8" />
</head>
<body>

	<?php echo validation_errors(); ?>

	<form action="/install" method="post">
	<fieldset>
	<legend>Site Settings</legend>
		<label for="name">Nome del sito</label><br />
		<input type="text" name="name" /><br />
	</fieldset>
	<fieldset>
	<legend>Database Settings</legend>
		<label for="host">Host (usually localhost)</label><br />
		<input type="text" name="host" /><br />
		<label for="uname">Database Username</label><br />
		<input type="text" name="uname" /><br />
		<label for="pswrd">Database Password</label><br />
		<input type="password" name="pswrd" /><br />
		<label for="dbname">Database Name</label><br />
		<input type="text" name="dbname" /><br />	
	</fieldset>
		<p><input type="submit" name="submit" value="Save Configuration" /></p>
	</form>

</body>
</html>