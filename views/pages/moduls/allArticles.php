 <?php 

	$num_per_page = 5;
	$total_available_pages = ceil($total_articles/$num_per_page);

	if($total_available_pages < 1){
		$total_available_pages = 1;
	}

?>

<!---All articles--->
<section id="allArticlesSection" class="content-container mt-3 p-3">

	<!--all articles title-->
	<h3 class="fw-normal color-dark_color mb-3">Todos los artículos</h3>
	<div id="articlesList"></div>

</section>

<!---Pagination--->
<section id="paginationSection" class="content-container pagination_container p-3 d-flex justify-content-center">
	<label id="previousPageControler" class="mr-1 cursor-pointer"><<</label>

	<div id="pageNmContainer">
		
	</div>

	<label id="nextPageControler" class="mr-1 cursor-pointer">>></label>
</section>

<script>
	
	let total_available_pages = '<?php echo $total_available_pages; ?>';
	request_page(1, 'home', null);
	paginacionControl(total_available_pages, 'home');

</script>