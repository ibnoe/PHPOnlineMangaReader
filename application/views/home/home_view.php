<div id="main">
	<h1>Ultimi capitoli</h1>
	
	<?php if (is_array($chapters_list)): ?>
		
		<table>
		
		<?php foreach ($chapters_list as $r):
		
		// Conversione della timestamp salvata su mysql nel formato voluto
		$timestamp = mysql_to_unix($r->data);
		$date = date('d/m/Y', $timestamp);
		
		?>
			
		<tr>
			<td class="date"><?=$date?></td>
			<td class="chapter"><?=$r->titolo_serie?> capitolo <?=$r->numero_capitolo?> - "<?=$r->titolo_capitolo?>"</td>
			<td class="link"><?=anchor('manga/view/' . $r->titolo_serie . '/' . $r->numero_capitolo, 'LEGGI ONLINE')?></td>
		</tr>
			
		<?php endforeach; ?>	

		</table>
	<?php else: ?>
		
		<p>Nessun capitolo trovato</p>
		
	<?php endif; ?>
	
</div>