<!---Footer--->
<footer class="mt-3 bg-lightergray_color">
	<div class="content-container p-3">
		<div class="content-container_logo_icons">
			<h2 class="logo-blog fw-bold">ALX SAN BLOG</h2>
			<div>

				<?php 

					foreach ($social_networks as $key => $value) {
						
						echo $value[0];
					}

				?>
				
			</div>
		</div>
	</div>
	<div class="content-container p-3" style="padding-top: 0 !important;">
		<ul class="list-style-none p-0">
			<li class="pb-3">Sobre mí</li>
			<li class="pb-3">Resume</li>
			<li class="pb-3">Todos los artículos</li>
			<li class="pb-3">Proyectos</li>
		</ul>
	</div>

	<div class="bg-dark_color d-flex justify-content-center p-4 color-pure_white">
		All rights reserved  @2022
	</div>
</footer>