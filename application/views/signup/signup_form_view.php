<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Signup Form</title>
	<meta charset="UTF-8" />
</head>
<body>

	<?php
	
		echo validation_errors();
		if ($success_message)
			echo $success_message;
		
		echo form_open('signup');
		echo 'Username: <br />' . form_input('username') . '<br />';
		echo 'Password: <br />' . form_password('password') . '<br />';
		echo 'Password confirmation: <br />' . form_password('passconf') . '<br />';
		echo 'Email: <br />' . form_input('email') . '<br />';
		echo form_submit('submit', 'Signup');
		echo form_close();
	?>

</body>
</html>