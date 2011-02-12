<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href='<?php echo base_url(); ?>public/css/style.css' type="text/css" media="screen, projection" />
<title>Userlist</title>
</head>
<body>

	<h1>Lista utenti</h1>

	<?php foreach ($users_list as $users): ?>
	
		<ul>
			<li><?=$users->id?> - <?=$users->username?> - <?=$users->email?> - <?=$users->rango?></li>
		</ul>
		
	<?php endforeach; ?>
	
	<?php $this->pagination->create_links(); ?>
	

</body>
</html>