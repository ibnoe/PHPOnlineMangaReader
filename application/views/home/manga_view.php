<?php 
	$img = $sel_page - 1;
	$dir = base_url()."upload/".$series."/".$chapter_num."/";
 ?>

<img src="<?=$dir.$images_array[$img]?>" alt="Immagine" />

<br />

<?php

if ($img > 0)
	echo anchor('/manga/view/'.$series."/".$chapter_num."/".($img), '<p>Pagina Precedente');
else
	echo "<p>Pagina Precedente";
	
echo " - ";	
	
if ($img < ($page_num -1))
	echo anchor('/manga/view/'.$series."/".$chapter_num."/".($img + 2), 'Pagina Successiva</p>');	
else
	echo "Pagina Successiva</p>";
	
?>