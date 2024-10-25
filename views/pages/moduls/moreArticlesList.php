<?php  

	$categorieArticle = ControlerBlog::ctrDisplayArticleCategoryRows($categorieSelected);
	$num_per_page = 10;
	$total_available_pages = ceil($categorieArticle/$num_per_page);

	if($total_available_pages < 1){
		$total_available_pages = 1;
	}
?>

<!---More articles list--->
<section class="content-container mt-3 p-3">
	<!--all articles-->
	<h3 class="fw-normal color-dark_color mb-3">Te puede interesar...</h3>

	<!--- results section  --->
	<section id="articlesList" class="content-container mt-3 p-3 pl-0">


	</section>
	
</section>

<script>
	
	let total_available_pages = '<?php echo $total_available_pages; ?>';
	
	console.warn('categoryId es ::::::::', categoryId);
	request_page(1, 'category', null);
	paginacionControl(total_available_pages, 'category');

</script>