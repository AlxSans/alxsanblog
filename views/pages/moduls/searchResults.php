<!-- Search results -->
<section class="content-container mt-3 p-3">
	
	<h6 class="text-small-center">Search term gave these results: </h6>

	<!--- results section  --->
	<section class="content-container mt-3 p-3">

		<!-- article card result -->
		<div id="articlesList"></div>

	</section>

	<!---Pagination--->
	<section id="paginationSection" class="content-container pagination_container p-3 d-flex justify-content-center">
		
		<label id="previousPageControler" class="mr-1 cursor-pointer"><<</label>

		<div id="pageNmContainer">
			
		</div>

		<label id="nextPageControler" class="mr-1 cursor-pointer">>></label>

	</section>

</section>

<script>

	let domine = '<?php echo $blog['dominio'] ?>';
	let result;
	const urlString = window.location.href;

	const url = new URL(urlString);

	const searchParams = url.searchParams.get("search");

	if(searchParams !== ''){

		fetch(domain + 'views/pages/fetch/startSearching.php', {
			'method':'POST',
			'header':{
				'Content-Type':'application/json; charset=utf-8'
			},
			'body':searchParams
		}).then(function(response){
			return response.text();
		}).then(function(data){
			result = JSON.parse(data);
			console.warn('RESULT :::::::::: ', result);

			let num_per_page = 5;
			let total_available_pages = Math.ceil(result/num_per_page);
			console.warn({total_available_pages});
			if(total_available_pages < 1){
				total_available_pages = 1;
			}

			request_page(1, 'search', searchParams);
			paginacionControl(total_available_pages, 'search');

			
			let searchContainer = document.getElementById('search-result');
			/*result.forEach((el, i)=> {
				console.warn(el);
				searchContainer.insertAdjacentHTML('afterend', `
				
				<div class="search-results-container d-flex flex-column flex-sm-row mb-5">
					<div class="search-results-container__div mr-3 mb-small-half text-tablet-center mr-small-0">
						<img class="border-r2" src="${domine}${el.portada_articulo}" alt="1984 book cover">
					</div>
					<div class="main-description">
						<div class="main-description_top">
							<div class="d-flex justify-content-between align-items-center flex-wp-tablet">
								<h5 class="main-description_top__title color-dark_color mb-0">${el.titulo_articulo}</h5>
								<div class="main-description_footer__img d-flex">
									<p class="m-0 color-pure_black">${el.name_author} ${el.fecha_articulo}</p>
								</div>
							</div>
							<p class="main-description_top__text color-text_gray">${el.descripcion_articulo}</p>
						</div>
						<div class="main-description_footer d-flex justify-content-between align-items-center flex-wp-tablet">
							
							<div class="main-description_footer__cta">
								<a href="${domine}${el.ruta_categoria}/${el.ruta_articulo}">
									<button class="bg-secondary_color color-pure_white border-r1 border-0 fw-bold click_active first-uppercase">leer más</button>
								</a>
							</div>
							<div class="main-description_cat">
								<div class="text-end text-tablet-left">
									<label class="main-description__category-label bg-book_category border-r2 color-pure_white first-uppercase cursor-pointer">${el.titulo_categoria}</label>
								</div>
								<div class="main-description_cat__hashtag">
									<label class="mr-half cursor-pointer">#1984</label>
									<label class="mr-half cursor-pointer">#leer</label>
									<label class="mr-half cursor-pointer">#opinion</label>
								</div>
							</div>
						</div>	
						
					</div>
				</div>
				
				`)

			})*/
			
		})



	}else{

		console.warn('EL INPUT NO PUEDE ESTAR VACÍO');

	}

	

</script>