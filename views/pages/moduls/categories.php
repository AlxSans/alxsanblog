<!---Categories section--->
<section class="content-container categories-container mt-3 p-3">
	<h3 class="fw-normal color-dark_color mb-3">Categorías</h3>
	<div class="categories-container_ul overflow-x-scroll">
		<ul class="list-style-none d-flex justify-content-between pl-0">

			<?php foreach ($categories as $key => $value): ?>

				<a class="text-decoration-none" href="<?php echo $value[5]; ?>">
					<li class="categories-container_ul-li__category-label <?php echo $value[4]; ?> border-r1 color-pure_white first-uppercase cursor-pointer click_active text-nowrap"><?php echo $value[1]; ?></li>
				</a>
			
			<?php endforeach ?>

		</ul>
	</div>
</section>