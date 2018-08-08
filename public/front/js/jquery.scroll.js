
//totop
$(document).ready(function () {
	"use strict";
	$("#totop").hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			$("#totop").fadeIn();
		} else {
			$("#totop").fadeOut();
		}
	});
});
