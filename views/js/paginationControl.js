let articles;
let currentPage = 1;
let total_ps;
let articlesQuery;
let booleanListeners = false;
let origin2; //to know the origin of information
let searchParam2;
let k = 1;
let total_print = 5;

const paginacionControl = (total, origin) => {
	total_ps = total;
}

//Arrows and numbers in pagination
const setListeners = () => {

	if(!booleanListeners){

		const previousButton = document.getElementById('previousPageControler');
		const nextButton = document.getElementById('nextPageControler');

		previousButton.addEventListener('click', function(ev){
			ev.stopPropagation();
			console.log('::::prev button', 'current page:', currentPage)
			if (currentPage != 1) {
				request_page(currentPage - 1, origin2);
			}else{
				console.log(':: theres no more pages to load');
			}
		});

		nextButton.addEventListener('click', function(ev){
			ev.stopPropagation();
			console.log(':::next button','currentPage:', currentPage, 'total_ps', total_ps);
			if (currentPage != total_ps) {
				request_page(currentPage + 1, origin2);
			}else{
				console.log(':: theres no more pages to load');
			}
		});

	}
	
	const labels = document.querySelectorAll('.page_control');
	labels.forEach(label => label.addEventListener('click', function(ev){
		console.log(ev, 'value:::', ev.target.dataset.id);
		const toNumber = parseInt(ev.target.dataset.id);
		if (currentPage != toNumber) {
			request_page(toNumber, origin2);
		}
	}));

	booleanListeners = true;
	
}

const checkingPagination = (pageNm) => {

	let pageNmContainer = document.getElementById('pageNmContainer');
	let classActive;
	pageNmContainer.innerHTML = "";
	
	//Cheking the number to print in the pagination
	if(total_ps > 5){
		if ((pageNm + 4) < total_ps) {
		
			k = pageNm;
	
		}else{
	
			k = (total_ps - 5) + 1;
	
		}
	}else{

		k = pageNm;
		total_print = pageNm;
	}

	//If the total pages number is now in the HTML document no need to add more labels
	for (var i = 1; i <= total_print; i++) { //total_ps is the total pages

		if (pageNm === k) {
			classActive= `<label data-id=${k} class="mr-1 cursor-pointer active page_control">${k}</label>`;
		}else{
			classActive= `<label data-id=${k} class="mr-1 cursor-pointer page_control">${k}</label>`;;
		}

		pageNmContainer.innerHTML += classActive;

		k++;

	}

}

//Articles list in HOMEPAGE
const setArticlesResquest = (result, pageNm) => {

	let articles = document.getElementById('articlesList');
	articles.innerHTML = " ";
	result.forEach(element => {

		articles.innerHTML += `

			<div class="card border-0 mr-1 all-articles-container__card d-flex flex-row">
			  <a href="${domain}${element[4]}/${element[3]}">
			  	<img class="border-r2" src="${element[0]}" class="card-img-top" alt="...">
			  </a>
			  <div class="card-body pt-0">
			  	<a class="text-decoration-none" href="${domain}${element[4]}/${element[3]}">
			    	<h5 class="card-title fw-normal color-mid_black">${element[1]}</h5>
			    </a>
			    <p class="card-text color-text_gray mb-0">${element[2]}...</p>
			    <a href="${domain}${element[4]}/${element[3]}" class="color-dark_color">  Leer más</a>
			    
			  </div>

			</div>

		`;

	});

	checkingPagination(pageNm);
	setListeners();

}
//Articles list in CATEGORIES
const setCategoryRequest = (result, pageNm) => {

	document.getElementById('category_breadcrumb').setAttribute('href', domain+result[0][16]);
	document.getElementById('category_breadcrumb').innerText = result[0][12];
	const title_breadcrumb = document.querySelectorAll('#title_breadcrumb');
	if(!title_breadcrumb.length > 0){
		document.getElementById('category_breadcrumb').classList.add('fw-bold');
	}

	console.log('setCategoryRequest:::::::::::::::::::')
	let articles = document.getElementById('articlesList');
	articles.innerHTML = " ";
	result.forEach(element => {

		articles.innerHTML += `

			<div class="search-results-container d-flex flex-column flex-sm-row mb-5">
			<div class="search-results-container__div mr-3 mb-small-half text-tablet-center mr-small-0">
				<a class="text-decoration-none" href="${domain}${element[16]}/${element[7]}">
					<img class="border-r2" src="${domain}${element[3]}" alt="1984 book cover">
				</a>
			</div>
			<div class="main-description">
				<div class="main-description_top">
					<div class="d-flex justify-content-between align-items-center flex-wp-tablet">
						<a class="text-decoration-none" href="${domain}${element[16]}/${element[7]}">
							<h5 class="main-description_top__title color-dark_color mb-0">${element[4]}</h5>
						</a>
						<div class="main-description_footer__img d-flex">
							<p class="m-0 color-pure_black">${element[20]} ${element[23]}</p>
						</div>
					</div>
					<p class="main-description_top__text color-text_gray">${element[5]}</p>
				</div>
				<div class="main-description_footer d-flex justify-content-between align-items-center flex-wp-tablet">
					
					<div class="main-description_footer__cta">
						<a class="text-decoration-none" href="${domain}${element[16]}/${element[7]}">
							<button class="bg-secondary_color color-pure_white border-r1 border-0 fw-bold click_active first-uppercase">leer más</button>	
						</a>
					</div>
					<div class="main-description_cat">
						<div class="text-end text-tablet-left">
							<label class="main-description__category-label ${element[15]} border-r2 color-pure_white first-uppercase">${element[12]}</label>
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

		`;

	});

	checkingPagination(pageNm);
	setListeners();
}
//Articles list in SEARCH
const setSearchRequest = (result, pageNm) => {

	let articles = document.getElementById('articlesList');
	articles.innerHTML = " ";

	result.forEach(el => {
		console.warn(el);
		articles.innerHTML +=  `
		
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
		
		`;

	});

	checkingPagination(pageNm);
	setListeners();

}

//Fetch function 
const request_page = (pageNm, origin, searchParam) => {

	if (searchParam != null) {
		searchParam2 = searchParam;
	}

	currentPage = pageNm;
	
	let data;

	//articles.innerHTML = "loading results..."
	if(origin === "home"){

		articlesQuery = "articlesRequest";
		origin2 = "home"
		data = parseInt(pageNm);

	}else if(origin === "category"){

		articlesQuery = "categoryRequest";
		origin2 = "category"
		data = {
			'pageNm': pageNm,
			'id': categoryId
		}

	}else{

		articlesQuery = "finishSearching";
		origin2 = "search";
		data = {
			'pageNm': (pageNm - 1)*5,
			'input': searchParam2
		}
		console.warn({data})
	}

	fetch(domain + 'views/pages/fetch/'+articlesQuery+'.php', {
		'method':'POST',
		'header':{
			'Content-Type':'application/json; charset=utf-8'
		},
		'body':JSON.stringify(data)
	}).then(function(response){
		return response.text();
	}).then(function(data){

		result = JSON.parse(data);

		if(articlesQuery === "articlesRequest"){
			setArticlesResquest(result, pageNm);
		}else if(articlesQuery === "categoryRequest"){
			setCategoryRequest(result, pageNm);
		}else if(articlesQuery === "finishSearching"){
			setSearchRequest(result, pageNm);
		}

	})
}



