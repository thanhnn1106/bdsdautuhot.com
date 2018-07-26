//Slider top_info
$(document).ready(function () {
	"use strict";
	$('#slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 1000,
		dots: true,	
		arrows: false,
		fade: true,
		cssEase: 'linear'
	});
});


//tiny toppage
$(document).ready(function () {
	"use strict";
	$("#tiny").load("tiny/news.php");
});

	
