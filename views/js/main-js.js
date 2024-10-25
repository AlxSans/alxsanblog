/*

	MAIN JS

*/

/* Menu mobile functionality */
const svgPath1 = document.querySelector('.svg-burger-to-times1');
const svgPath3 = document.querySelector('.svg-burger-to-times3');
const mobileMenu = document.querySelector('.menu-mobile-list');

const burgerMenu = document.querySelector('#burger-menu');
const timesMenu = document.querySelector('#times-menu');
burgerMenu.addEventListener('click', () => {
	
	svgPath1.classList.remove('times-inactive');
	svgPath3.classList.remove('times-inactive');
	svgPath1.classList.add('times-active');
	svgPath3.classList.add('times-active');

	setTimeout(() => {
		burgerMenu.style.display = "none";
		timesMenu.style.display = "block";
		mobileMenu.style.display = "flex";
	},300)
});

timesMenu.addEventListener('click', () => {

	burgerMenu.style.display = "block";
	timesMenu.style.display = "none";

	setTimeout(() => {
		
		svgPath1.classList.remove('times-active');
		svgPath3.classList.remove('times-active');
		svgPath1.classList.add('times-inactive');
		svgPath3.classList.add('times-inactive');
		mobileMenu.style.display = "none";

	},300)

});


