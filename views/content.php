
	<section>
		<article>
			<div class="row gy-3">			
				<div class="col-12 bg-light">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>
				<div class="pt-2"></div>
			</div>
		</article>	
			<div class="row gy-3 custom-height25 p-3 mb-2 bg-secondary text-white">
			<h4>Last comments</h4>
			</div>
			<span id="lastcom" class="custom-height25"></span>
			<div class="row gy-3 custom-height25" id="blockcomms">				
				<?php
				if (!empty($messages)) {
				 foreach ( $messages as $value )
				 {
				?>	
				<div class="row gy-2" id="comm-<?=$value['id']?>">				
					<div class="col-md-1"></div>
					<div class="col-sm-2 col-md-2"><span class="text-primary">Name:</span> <b style="word-break: break-word;"><?=($value['names'])?></b></div>
					<div class="col-sm-3 col-md-3"><span class="text-primary">E-mail:</span> <u style="word-break: break-word;"><?=($value['emails'])?></u></div>
					<div class="col-sm-6 col-md-6"><span class="text-primary">Comment:</span> <i style="word-break: break-word;"><?=($value['comments'])?></i></div>
				</div>
				<?php
				 }	
				}	
				?>

			</div>
	</section>
