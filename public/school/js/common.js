$(function() {

// menu bg
$('.bg-nav').click( function(){
	$(this).removeClass('is-active');
	$('.card').removeClass('is-active');
	$('.card-header img.logoaos').removeClass('rotate');
	$('.c-hamburger--htx').removeClass('is-active');
	$('.c-hamburger--htx span').removeClass('is-active').addClass('rotate');
	setTimeout(function () {
	  $('.c-hamburger--htx span').removeClass('rotate');
}, 700);
});

$('.c-hamburger').click( function(){
	$('.bg-nav').toggleClass('is-active');
	$('.card').toggleClass('is-active');
	$('.card-header img.logoaos').toggleClass('rotate');
	$('.c-hamburger--htx').toggleClass('is-active');
	$('.c-hamburger--htx span').toggleClass('is-active').addClass('rotate');
	setTimeout(function () {
	  $('.c-hamburger--htx :before').toggleClass('is-active');
		$('.c-hamburger--htx :after').toggleClass('is-active');
}, 700);
	setTimeout(function () {
	  $('.c-hamburger--htx span').removeClass('rotate');
}, 700);

});

// end menu bg


// запускаем отображение аккордеона
makeAccordion();
// при клике по заголовку
$('.accordion .click').click(function(){
		// снимаем со всех div`ов класс active
		$('.accordion').each(function(){
				$(this).removeClass('active');
		});

		makeAccordion();
		// задаем родительскому элементу класс active
		$(this).parent().parent().parent().parent().addClass('active');
		// запускаем отображение аккордеона
		makeAccordion();
});
// функция для отображения аккордеона. Сворачивает и разворачивает
function makeAccordion(){
var speed = 600; // скорость анимации
// перебираем все блоки аккордеона
$('.accordion').each(function(){
		if($(this).hasClass('active')){
				// если находим активный, то разворачиваем его
				$(this).find('.accordion_content').slideDown(speed);
		}else{
				// не активный сворачиваем
				$(this).find('.accordion_content').slideUp(speed);
		}
});

}




$(document).ready(function() {
// loadings
	$('#loader-wrapper').delay(700).fadeOut(800);

});


});
