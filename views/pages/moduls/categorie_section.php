<?php  

	$categorieArticle = ControlerBlog::ctrDisplayArticleCategoryRows($categorieSelected);
	$num_per_page = 10;
	$total_available_pages = ceil($categorieArticle/$num_per_page);

	if($total_available_pages < 1){
		$total_available_pages = 1;
	}
?>

<style>
	
	#search-app_input--container{
		display: none;
	}

</style>

<!--- section cover  --->
<div class="res-img pb-5">
	<img src="./views/img/covers/categories_cover_example.jpg" alt="">
</div>

<!--- Breadcrumbs --->
<section class="content-container pl-1 pt-0">
	<div class="d-flex align-items-center pl-1">
		<div class="mr-half"><a href="<?php echo $blog['dominio'] ?>" class="text-decoration-none color-dark_color">Inicio</a></div>
		<div class="mr-half fs-1-half">&gt;</div>
		<div class="mr-half"><a id="category_breadcrumb" class="text-decoration-none color-dark_color" href=""></a></div>
	</div>
</section>

<!-- Search results -->
<section class="content-container p-3 pt-0">

	<!--- results section  --->
	<section id="articlesList" class="content-container mt-3 p-3">

	</section>


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
	let categoryId = '<?php echo $categorieSelected; ?>';
	request_page(1, 'category', null);
	paginacionControl(total_available_pages, 'category');

</script>

