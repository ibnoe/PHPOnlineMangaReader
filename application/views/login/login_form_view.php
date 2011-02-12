<!DOCTYPE HTML>
<html lang="it">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="<?=base_url()?>public/css/login.css" />
<title><?=$title?></title>
</head>
<body>

<?php echo validation_errors(); ?>
<?php if (isset($login_error)) { echo $login_error; } ?>

<div id="wrapper">
	<div id="login_bg">
		<div id="form_div">
			<?php echo form_open('login/'); ?>
				<label class="nome">Nome utente</label>
					<input type="text" name="username" value="<?php echo set_value('username'); ?>" /><br />
				<label>Password</label>
					<input type="password" name="password" /><br />
				<input type="submit" name="submit" value="" />
			</form>	
		</div>	
	</div>
</div>
	
</body>
</html>