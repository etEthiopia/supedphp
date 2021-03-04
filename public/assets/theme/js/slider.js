var $slider = $('.slider'),
	$overlay = $('.ovrly'),
	$bullets = $('.bullets');
function calculateHeight() {
	var height = $('.slide .active').outerHeight();
	//window.alert(window.innerWidth);
	if (window.innerWidth < 700) {
		height = 300;
	} else {
		height = 500;
	}
	$slider.height(height);
}

$(window).resize(function() {
	calculateHeight();
	clearTimeout($.data(this, 'resizeTimer'));
});

function resetSlides() {
	$('.slide.inactive').removeClass('inactiveRight').removeClass('inactiveLeft');
}

function gotoSlide($activeSlide, $slide, className) {
	$activeSlide.removeClass('active').addClass('inactive ' + className);
	$slide.removeClass('inactive').addClass('active');
	calculateHeight();
	resetBullets();
	$('#slider ul').animate(
		{
			left: -slideWidth
		},
		200,
		function() {
			$('#slider ul li:first-child').appendTo('#slider ul');
			$('#slider ul').css('left', '');
		}
	);
	setTimeout(resetSlides, 300);
}

$('.next').on('click', function() {
	var $activeSlide = $('.slide.active'),
		$nextSlide = $activeSlide.next('.slide').length != 0 ? $activeSlide.next('.slide') : $('.slide:first-child');
	console.log($nextSlide);
	gotoSlide($activeSlide, $nextSlide, 'inactiveLeft');
});
$('.previous').on('click', function() {
	var $activeSlide = $('.slide.active'),
		$prevSlide = $activeSlide.prev('.slide').length != 0 ? $activeSlide.prev('.slide') : $('.slide:last-child');

	gotoSlide($activeSlide, $prevSlide, 'inactiveRight');
});
// $(document).on('click', '.bullet', function() {
// 	if ($(this).hasClass('active')) {
// 		return;
// 	}
// 	var $activeSlide = $('.slide.active');
// 	var currentIndex = $activeSlide.index();
// 	var targetIndex = $(this).index();
// 	console.log(currentIndex, targetIndex);
// 	var $theSlide = $('.slide:nth-child(' + (targetIndex + 1) + ')');
// 	gotoSlide($activeSlide, $theSlide, currentIndex > targetIndex ? 'inactiveRight' : 'inactiveLeft');
// });
function addBullets() {
	var total = 3,
		index = $('.slide.active').index();
	for (var i = 0; i < total; i++) {
		var $bullet = $('<div>').addClass('bullet');
		if (i == index) {
			$bullet.addClass('active');
		}
		$bullets.append($bullet);
	}
}
function resetBullets() {
	$('.bullet.active').removeClass('active');
	var index = $('.slide.active').index() + 1;
	console.log(index);
	$('.bullet:nth-child(' + index + ')').addClass('active');
}
addBullets();
calculateHeight();

jQuery(document).ready(function($) {
	setInterval(function() {
		moveRight();
	}, 3000);

	function gotoSlide($activeSlide, $slide, className) {
		$activeSlide.removeClass('active').addClass('inactive ' + className);
		$slide.removeClass('inactive').addClass('active');
		calculateHeight();
		resetBullets();
		setTimeout(resetSlides, 300);
	}

	function moveRight() {
		var $activeSlide = $('.slide.active'),
			$nextSlide =
				$activeSlide.next('.slide').length != 0 ? $activeSlide.next('.slide') : $('.slide:first-child');
		console.log($nextSlide);
		gotoSlide($activeSlide, $nextSlide, 'inactiveLeft');
	}
});
