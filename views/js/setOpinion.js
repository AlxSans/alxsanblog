const funcPhoto = (ev) =>{

	if(document.getElementById('error-img-message') !== null){
		document.getElementById('error-img-message').remove();
	}

	image = ev.target.files[0];
	if(image['type'] != "image/jpeg" && image['type'] != "image/png"){
		
		photoTemp.value = "";
		photoTemp.insertAdjacentHTML('afterend','<div id="error-img-message" class="alert alert-danger">¡El formato de la imagen debe ser JPG o PNG!</div>')
		setTimeout(() => {
			document.getElementById('error-img-message').remove();
		}, 5000);

	}else if(image['size'] > 2000000){

		photoTemp.value = "";
		photoTemp.insertAdjacentHTML('afterend','<div id="error-img-message" class="alert alert-danger">¡El tamaño de la imagen debe ser menor o igual a 2GB!</div>')
		setTimeout(() => {
			document.getElementById('error-img-message').remove();
		}, 5000);

	}else{//Photo is ok!

		if(document.getElementById('temporal_photo_opinion') !== null){
			document.getElementById('temporal_photo_opinion').remove();
		}

		const photoOption = document.getElementById('photoOptions');

		var imageData = new FileReader;
		imageData.readAsDataURL(image);
		imageData.addEventListener('load', function(event){
			var imageRoute = event.target.result;
			
			photoOption.insertAdjacentHTML('beforebegin', `<div id="temporal_photo_opinion" class="main-description_footer__img mr-1">
															<img src="${imageRoute}">
														</div>`);
		});

		photoOption.style.marginTop = "1rem";
		photoOption.children[0].style.display = "none";
		photoOption.children[1].innerText = "Cambiar foto";
		photoValidation = true;
	}

}

/*::::::: Upload temporary photo ::::::::*/
const photoTemp = document.getElementById('photoOpinion');
console.log(photoTemp)
photoTemp.addEventListener("change", funcPhoto);
let photoValidation = false;
let image = "";

const sendOpinionToReview = (ev) => {
	
	ev.preventDefault();
	console.warn('**** opinion will send');
	
	let proceedName = false, proceedMail = false, opinionProceed = false;
	console.log(proceedName, proceedMail, opinionProceed)

	//Get the input elements
	const nameInput = document.querySelector('input[name="name_opinion"]');
	const emailInput = document.querySelector('input[name="email_opinion"]');
	const opinionInput = document.querySelector('textarea[name="opinion"]');

	//Set the default border value
	nameInput.style.border = "";
	emailInput.style.border = "";
	opinionInput.style.border = "";

	//each label with the classes
	const validFeedback = document.querySelectorAll('.valid-feedback');
	const invalidFeedback = document.querySelectorAll('.invalid-feedback');
	//After each submit:
	validFeedback.forEach(element => element.style.display = "none");
	invalidFeedback.forEach(element => element.style.display = "none");

	//Each div with label validation messages inside
	const nameValidation = document.getElementById('name-validation');
	const emailValidation = document.getElementById('email-validation');
	const opinionValidation = document.getElementById('opinion-validation');

	const nameValue = document.querySelector('input[name="name_opinion"]').value;
	const emailValue = document.querySelector('input[name="email_opinion"]').value;
	const opinionValue = document.querySelector('textarea[name="opinion"]').value;
	const reference = document.querySelector('input[name="articleReference"]').value;
	const id = parseInt(reference);

	const nameRegex = /^[A-Za-z]{1,40}$/;
	const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
	const textareaRegex = /^[A-Za-z0-9.,!?()\sáéíóúüñÁÉÍÓÚÜÑ]{1,1000}$/;

	//checking name
	if (nameRegex.test(nameValue)) {
		nameInput.style.border ="2px solid #146c43";
	    nameValidation.children[0].style.display = "block";
	    proceedName = true;
	}else if(nameValue == ""){
		nameInput.style.border ="2px solid #b02a37";
		nameValidation.children[1].innerText = "El nombre no puede estar vacío";
	    nameValidation.children[1].style.display = "block";
	}else{
		nameInput.style.border ="2px solid #b02a37";
		nameValidation.children[1].innerText = "Sólo se permiten letras";
	    nameValidation.children[1].style.display = "block";
	}

	//Checking email
	if (emailRegex.test(emailValue)) {
	    emailInput.style.border ="2px solid #146c43";
	    emailValidation.children[0].style.display = "block";
	    proceedMail = true;
	}else if(emailValue == ""){
		emailInput.style.border ="2px solid #b02a37";
		emailValidation.children[1].innerText = "El e-mail no puede estar vacío";
	    emailValidation.children[1].style.display = "block";
	}else{
		emailInput.style.border ="2px solid #b02a37";
		emailValidation.children[1].innerText = "Verifica que el formato del e-mail sea correcto";
	    emailValidation.children[1].style.display = "block";
	}

	//Checking opinion
	if (textareaRegex.test(opinionValue)) {
	    opinionInput.style.border ="2px solid #146c43";
	    opinionValidation.children[0].style.display = "block";
	    opinionProceed = true;
	}else if(emailValue == ""){
		opinionInput.style.border ="2px solid #b02a37";
		opinionValidation.children[1].innerText = "La opinion no puede estar vacía";
	    opinionValidation.children[1].style.display = "block";
	}else{
		opinionInput.style.border ="2px solid #b02a37";
		opinionValidation.children[1].innerText = "No se admiten carácteres especiales";
	    opinionValidation.children[1].style.display = "block";
	}

	if(proceedName && proceedMail && opinionProceed){

		/*let data = {
			'name': nameValue,
			'email': emailValue,
			'opinion': opinionValue,
			'id': id
		}*/
		console.log('the image before formDate', photoTemp.files[0])
		const formData = new FormData();
		formData.append('name', nameValue);
		formData.append('email', emailValue);
		formData.append('opinion', opinionValue);
		formData.append('id', id);
		formData.append('photo', photoTemp.files[0])


		console.log(formData);

		const section = document.getElementById('opinion-section');
		section.style.display = "none";
		document.querySelector('#loader-container').style.display="flex";

		setTimeout(()=>{

			fetch(domain + 'views/pages/fetch/setOpinion.php', {
			'method':'POST',
			/*'header':{
				'Content-Type':'application/json; charset=utf-8'
			},*/
			'body':formData//JSON.stringify(data)
			}).then(function(response){
				console.warn(':::::::::: ', response);
				return response.text();
			}).then(function(data){
				result = JSON.parse(data);
				let alert = document.querySelector('#alertMessage');
				if(result === "OK"){

					document.querySelector('#loader-container').style.display="none";
					alert.classList.add('alert', 'alert-success');
					alert.innerHTML = "¡Tu opinion ha sido enviada. Una vez aprobada estará disponible en la página, Gracias!"

					setTimeout(() => {
						alert.classList.remove('alert', 'alert-success');
						alert.innerHTML = "";
					},10000)
					
					section.style.display = "block";
					nameInput.value = "";
					emailInput.value = "";
					opinionInput.value = "";
					nameInput.style.border ="";
					emailInput.style.border ="";
					opinionInput.style.border ="";
					nameValidation.children[0].style.display = "none";
					emailValidation.children[0].style.display = "none";
					opinionValidation.children[0].style.display = "none";
					document.getElementById('photoOptions').children[1].innerText = "Subir foto";
					
					//remove image
					if(document.getElementById('temporal_photo_opinion') !== null){
						document.getElementById('temporal_photo_opinion').remove();
					}

				}else{
					document.querySelector('#loader-container').style.display="none";
					alert.classList.add('alert', 'alert-danger');
					alert.innerHTML = "¡Algo salió mal, por favor intenta de nuevo más tarde!"

					setTimeout(() => {
						alert.classList.remove('alert', 'alert-danger');
						alert.innerHTML = "";
					},10000)
				}
			})

		},2000)

	}
	

}