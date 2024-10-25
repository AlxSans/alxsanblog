<!--- Container --->
<section class="nav-container">
	<!--- Nav bar --->
	<nav class="nav-bar content-container">
		<ul class="list-style-none d-flex justify-content-between align-items-center uppercase p-3">

			<a class="text-decoration-none" href=""><li class="cursor-pointer">Resume</li></a>
			<a class="text-decoration-none" href=""><li class="cursor-pointer">Sobre mí</li></a>
			<a class="text-decoration-none" href="<?php echo $blog['dominio']; ?>"><li class="logo-blog fw-bold">alx san blog</li></a>
			<a class="text-decoration-none" href=""><li class="cursor-pointer">Proyectos</li></a>
			<a class="text-decoration-none" href=""><li class="cursor-pointer">Artículos</li></a>

			<svg id="burger-menu" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g id="SVGRepo_bgCarrier" stroke-width="0"/>
				<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
				<g id="SVGRepo_iconCarrier"> <path class="svg-burger-to-times1" d="M4 18L20 18" stroke="#1F74BF" stroke-width="1.5" stroke-linecap="round"/> <path d="M4 12L20 12" stroke="#1F74BF" stroke-width="1.5" stroke-linecap="round"/> <path class="svg-burger-to-times3" d="M4 6L20 6" stroke="#1F74BF" stroke-width="1.5" stroke-linecap="round"/> </g>
			</svg>

			<svg id="times-menu" fill="#1F74BF" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#1F74BF" stroke-width="0.00032">
				<g id="SVGRepo_bgCarrier" stroke-width="0"/>
				<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
				<g id="SVGRepo_iconCarrier"> <title>times</title> <path d="M17.062 16l9.37-9.37c0.136-0.136 0.219-0.323 0.219-0.53 0-0.415-0.336-0.751-0.751-0.751-0.208 0-0.395 0.084-0.531 0.22v0l-9.369 9.369-9.37-9.369c-0.135-0.131-0.319-0.212-0.522-0.212-0.414 0-0.75 0.336-0.75 0.75 0 0.203 0.081 0.387 0.212 0.522l9.368 9.369-9.369 9.369c-0.136 0.136-0.22 0.324-0.22 0.531 0 0.415 0.336 0.751 0.751 0.751 0.207 0 0.394-0.084 0.53-0.219v0l9.37-9.37 9.369 9.37c0.136 0.136 0.324 0.22 0.531 0.22 0.415 0 0.751-0.336 0.751-0.751 0-0.207-0.084-0.395-0.22-0.531v0z"/> </g>
			</svg>

		</ul>
	</nav>
	<!--- Mobile menu --->
	<ul class="menu-mobile-list list-style-none p-0 text-center uppercase">

		<li class="cursor-pointer p-3 border-bottom width-100p">Resume</li>
		<li class="cursor-pointer p-3 border-bottom width-100p">Sobre mí</li>
		<li class="cursor-pointer p-3 border-bottom width-100p">Proyectos</li>
		<li class="cursor-pointer p-3 border-bottom width-100p">Artículos</li>

	</ul>

</section>