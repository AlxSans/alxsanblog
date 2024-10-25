<!---About me section--->
<section class="content-container aboutme_newsletter_container mt-3 p-3 d-flex justify-content-between">
	<!-- About me --->
	<div class="aboutme_container d-flex">
		<div class="aboutme_container-img">
			<img class="mr-1 border-r2" src='<?php echo $blog['dominio'].'views/img/profile/profile.jpg' ?>' alt="profile image">
		</div>
		<div class="aboutme_container-info">
			<?php 

				echo $blog['sobre_mi'];

			?>
			<div class="d-flex justify-content-end">
				<a href="">¡Ir a la sección!</a>
			</div>
		</div>
	</div>
	<!--News letter-->
	<div class="newsletter_container bg-primary_color p-3 border-r1">
		<p class="text-white">Make sure to subscribe to the newsletter and be the first to know the news.</p>
		<input class="w-100 p-3 border-r2 border-0" type="text" placeholder="Email address">
		<div class="text-right mt-3">
			<button class="float-right border-0 border-r1">Suscribirse</button>
		</div>
		
	</div>
</section>