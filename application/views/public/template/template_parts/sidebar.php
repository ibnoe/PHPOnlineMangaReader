			<div id="sidebar">
				<h1>Elenco serie</h1>
				
				<?php if (is_array($series_list)): ?>
				
                <ul>
				
				<?php foreach($series_list as $r): ?>
				
                    <li><strong><?=$r->titolo_serie?></strong> di <?=$r->autore_serie?></li>
					
				<?php endforeach; ?>	
                
				</ul>
				
				<?php else: ?>

					<p>Nessuna serie trovata</p>
				
				<?php endif; ?>
				
			</div>			
		</div>