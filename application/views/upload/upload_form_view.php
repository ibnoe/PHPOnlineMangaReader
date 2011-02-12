<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Upload Form</title>
	<meta charset="UTF-8" />
</head>
<body>

<?php

	$series_t['select'] = 'Select a series';
	
	foreach ($series_titles as $title) {
		$series_t[$title] = $title; 				
	}
	
	$series_options = $series_t;

	if ($errors) {
		echo $errors['error'];
	}
	
	 echo validation_errors();
	 
	echo form_open_multipart('uploads');
	echo form_dropdown('series', $series_options, 'select') . '<br />';
	echo form_input('chapter') . '<br />';
	echo form_input('title') . '<br />';
	echo form_upload('userfile') . '<br />';
	echo form_submit('submit', 'Upload');
	echo form_close();
?>
	
</body>
</html>