<!--- Social media section --->
<section class="content-container mt-4 p-3">
	<div class="d-flex justify-content-end">
		<?php 

			foreach ($social_networks as $key => $value) {
				
				echo $value[0];
			}

		?>
	</div>
</section>