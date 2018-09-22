// anchor in page
$(window).bind('load',function(){
	"use strict";
	$(function(){
		$('a[href^="#"]').click(function(){
			if ( $( $(this).attr('href') ).length ) {
				var p = $( $(this).attr('href') ).offset();
				if($(window).width() > 640){
					$('html,body').animate({ scrollTop: p.top -75}, 600);
				}
				else {
					$('html,body').animate({ scrollTop: p.top -75}, 600);
				}
			}
			return false;
		});
	});
});

// anchor top page #
$(window).bind('load',function(){
	"use strict";
 var hash = location.hash;
 if(hash){
	  var p1 = $(hash).offset();
	if($(window).width() > 640){
		
					$('html,body').animate({ scrollTop: p1.top -75}, 600);
				}
				else {
					$('html,body').animate({ scrollTop: p1.top -75}, 600);
				}
	}

});



/*==== MENU SP =====*/
$(document).ready(function () {
	"use strict";
	$('#icon_menu').click(function () {
		$(this).toggleClass('open');
		$("#menu").toggleClass("menu_active");
	});
});
/*==== GNAVI sub =====*/
$(document).ready(function () {
	"use strict";
	if ($(window).width() > 640) {
		$('.sub').hover(function () {
			$(this).toggleClass("active");
			$(this).find('.sub_menu').stop(0, 1).slideToggle();
		});
	} else {
		$("#gnavi .sub>a").click(function () {
			$(this).toggleClass("active");
			$(this).parent().find(".sub_menu").slideToggle("");
		});
	}
});




/*==== GNAVI SCROLL =====*/
$(document).ready(function () {
	"use strict";
	if ($(window).width() > 640) {
		$(window).scroll(function () {

			var h_gnavi = $('#menu').height();
			var h_header = $('#header').height();
			if ($(this).scrollTop() > h_header - h_gnavi) {
				$("#menu").css('position', 'fixed');
				$('#menu').css('top', 0);
				$("#menu").addClass('fixed');
				$("#header").css('margin-bottom', 70);
			} else {
				$("#menu").css('position', 'static');
				$('#menu').css('top', 0);
				$("#menu").removeClass('fixed');
				$("#header").css('margin-bottom', 0);
			}
		});
	}
});

//contact_header fix
$(window).bind('resize load scroll', function () {
	"use strict";
	if ($(window).width() <= 640) {
		if ($(this).scrollTop() > 200) {
			$(".i_contact").fadeIn();
			$(".i_contact").addClass("fixed");
			$(".header_contact").fadeIn();
			$(".header_contact").addClass("fixed");
		}
		else {
			$(".i_contact").fadeOut();
			$(".i_contact").removeClass("fixed");
			$(".header_contact").fadeOut();
			$(".header_contact").removeClass("fixed");
		}
	}
});


function validateContact()
{
    $('#contactForm .text-danger').css('display', 'none');
    var formName = $('#contactName').val();
    var formEmail = $('#contactEmail').val();
    var formPhone = $('#contactPhone').val();
    var formMessage = $('#contactMessage').val();

    var isValidName = validateName(formName);
    var isValidEmail = validateEmail(formEmail);
    var isValidPhone = validatePhone(formPhone);
    var isValidMessage = validateMessage(formMessage);
    if (!isValidName) {
        $('.validate-name').css('display', 'block');
    } else if (!isValidPhone) {
        $('.validate-phone').css('display', 'block');
    } else if (!isValidEmail) {
        $('.validate-email').css('display', 'block');
    }  else if (!isValidMessage) {
        $('.validate-message').css('display', 'block');
    } else {
        $('#contactForm').submit();
    }
}
function validateName(formName)
{
    if (formName.length <= 1) {
        return false;
    }
    return true;
}
function validateEmail(formEmail)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(formEmail);
}
function validatePhone(formPhone)
{
    if (formPhone.length <= 0 || formPhone.length >= 20) {
        return false;
    }
    return true;
}
function validateMessage(formMessage)
{
    if (formMessage.length <= 10) {
        return false;
    }
    return true;
}
