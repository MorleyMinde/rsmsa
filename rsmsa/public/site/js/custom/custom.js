// JavaScript Document

$(document).ready(function(){				
	
    'use strict';

/************************************************************************************ PARALLAX STARTS */
	
	$('.parallax-1').parallax("50%", 0.05);
	$('.parallax-2').parallax("50%", 0.2);
	$('.parallax-3').parallax("50%", 0.01);
	$('.parallax-4').parallax("50%", 0.01);
	$('.parallax-5').parallax("50%", 0.01);
	$('.parallax-6').parallax("50%", 0.8);
	$('.parallax-7').parallax("50%", 0.02);
	$('.parallax-8').parallax("50%", 0.01);

/************************************************************************************ PARALLAX ENDS */

/************************************************************************************ STICKY NAVIGATION STARTS */

    $("#navigation").sticky({
        topSpacing: 0
    });

/************************************************************************************ STICKY NAVIGATION ENDS */

/************************************************************************************ ONEPAGE NAVIGATION STARTS */

    $('.nav').onePageNav({
        filter: ':not(.external)',
        begin: function () {
            console.log('start')
        },
        end: function () {
            console.log('stop')
        }
    });

/************************************************************************************ ONEPAGE NAVIGATION ENDS */

/************************************************************************************ PAGE ANIMATED ITEMS STARTS */

    $('.animated').appear(function () {
        var elem = $(this);
        var animation = elem.data('animation');
        if (!elem.hasClass('visible')) {
            var animationDelay = elem.data('animation-delay');
            if (animationDelay) {

                setTimeout(function () {
                    elem.addClass(animation + " visible");
                }, animationDelay);

            } else {
                elem.addClass(animation + " visible");
            }
        }
    });

/************************************************************************************ PAGE ANIMATED ITEMS ENDS */

/************************************************************************************ ABOUT CAROUSEL STARTS */

    //Sort random function

    function random(owlSelector) {
        owlSelector.children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).each(function () {
            $(this).appendTo(owlSelector);
        });
    }

    $(".about-carousel").owlCarousel({
        autoPlay: 10000,
        slideSpeed: 500,
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        autoHeight: false,
        pagination: true,
        navigation: false,
        transitionStyle: "fade",        
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        
        /*beforeInit: function (elem) {
            random(elem);
        }
*/
    });


/************************************************************************************ ABOUT CAROUSEL ENDS */

/************************************************************************************ TEAM CAROUSEL STARTS */

    //Sort random function

    function random(owlSelector) {
        owlSelector.children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).each(function () {
            $(this).appendTo(owlSelector);
        });
    }

    $(".team-carousel").owlCarousel({
        autoPlay: 10000,
        slideSpeed: 500,
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 4],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        autoHeight: false,
        pagination: true,
        navigation: false,
        transitionStyle: "fade",        
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        
        /*beforeInit: function (elem) {
            random(elem);
        }
*/
    });

/************************************************************************************ TEAM CAROUSEL ENDS */


/************************************************************************************ PORTFOLIO GALLERY START */

    //Sort random function

    function random(owlSelector) {
        owlSelector.children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).each(function () {
            $(this).appendTo(owlSelector);
        });
    }

    $("#portfolio-gallery").owlCarousel({
        autoPlay: 5000,
        slideSpeed: 500,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",        
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        
        /*beforeInit: function (elem) {
            random(elem);
        }
*/
    });
			
/************************************************************************************ PORTFOLIO GALLERY ENDS */				

/************************************************************************************ QUOTES CAROUSEL STARTS */

    //Sort random function

    function random(owlSelector) {
        owlSelector.children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).each(function () {
            $(this).appendTo(owlSelector);
        });
    }

    $(".quotes-carousel").owlCarousel({
        autoPlay: 5000,
        slideSpeed: 500,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: true,
        navigation: false,
        transitionStyle: "fade",        
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        
        /*beforeInit: function (elem) {
            random(elem);
        }
*/
    });


/************************************************************************************ QUOTES CAROUSEL ENDS */

/************************************************************************************ TESTIMONIALS CAROUSEL STARTS */

    //Sort random function

    function random(owlSelector) {
        owlSelector.children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).each(function () {
            $(this).appendTo(owlSelector);
        });
    }

    $(".testimonial-carousel").owlCarousel({
        autoPlay: 5000,
        slideSpeed: 500,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: true,
        navigation: false,
        transitionStyle: "fade",        
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        
        /*beforeInit: function (elem) {
            random(elem);
        }
*/
    });

/************************************************************************************ TESTIMONIALS CAROUSEL ENDS */

/************************************************************************************ TO TOP STARTS */

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

/************************************************************************************ TO TOP ENDS */

/************************************************************************************ FITVID STARTS */

    $(".fitvid").fitVids();

/************************************************************************************ FITVID ENDS */

/************************************************************************************ MAGNIFIC POPUP STARTS */

	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		/*disableOn: 700,*/
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});

	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

	$('.simple-ajax-popup-align-top').magnificPopup({
		type: 'ajax',
		alignTop: true,
		overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
	});

	$('.simple-ajax-popup').magnificPopup({
		type: 'ajax'
	});
	
/************************************************************************************ MAGNIFIC POPUP ENDS */

/************************************************************************************ SWITCHER CSS STARTS */

    "use strict";

    $("#hide, #show").click(function () {
        if ($("#show").is(":visible")) {

            $("#show").animate({
                "margin-left": "-500px"
            }, 500, function () {
                $(this).hide();
            });

            $("#switch").animate({
                "margin-left": "0px"
            }, 500).show();
        } else {
            $("#switch").animate({
                "margin-left": "-500px"
            }, 500, function () {
                $(this).hide();
            });
            $("#show").show().animate({
                "margin-left": "0"
            }, 500);
        }
    });


/************************************************************************************ SWITCHER CSS ENDS */

})//$(document).ready(function(){


/************************************************************************************ PRELOADER STARTS */

jQuery(window).load(function () {


    $('#preloader').fadeOut('slow');

});

/************************************************************************************ PRELOADER ENDS */