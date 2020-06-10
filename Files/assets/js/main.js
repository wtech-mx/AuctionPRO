(function ($) {
	"use strict";

    jQuery(document).ready(function($){

    	$(".testimonial-section").owlCarousel({
		    items: 1,
		    autoplay: 3000,
		    margin: 60,
			loop: true,
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		    smartSpeed: 800
		});

    	/*  Blog Carousel  */
		$(".blog-area-slider").owlCarousel({
	    items: 3,
	    autoplay: 3000,
	    margin: 20,
		loop: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	    smartSpeed: 800,
	    responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			992 : {
				items: 3
			}
		}
	});	


	/*  Featured Carousel  */
	$(".featured-list").owlCarousel({
	    items: 3,
	    autoplay: 3000,
	    margin: 20,
		loop: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	    smartSpeed: 800,
	    responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			992 : {
				items: 3
			}
		}
	});

	/*  Partnership logo carousel  */
	$(".logo-carousel").owlCarousel({
        items: 7,
        loop: true,
        nav: true,
        dots: false,
		margin: 30,
		autoplay: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		smartSpeed: 300,
		responsive : {
			0 : {
				items: 2,
			},
			768 : {
				items: 4,
			},
			992 : {
				items: 7
			}
		}
       });

        /*  Slick Nav Mobile menu  */
	   $('#menuResponsive').slicknav({
		   prependTo: "#mobile-menu-wrap",
		   allowParentLinks : false,
		   label: ''	
	   });


       $(window).bind('scroll', function() {
        var navHeight = $(".header-top-area").height();
        ($(window).scrollTop() > navHeight) ? $('.header-area-wrapper').addClass('goToTop') : $('.header-area-wrapper').removeClass('goToTop');
    	});


		/*  Counter Active  */
		$(".counter-number").counterUp({
			delay: 10,
        	time: 1000
		});

		/*  Image popUp  */
		$(".image-popup").magnificPopup({
		   type: 'image',
		   mainClass: 'mfp-zoom-in',
		   removalDelay: 1000,
		   overflowY: 'scroll',
		   gallery:{
		    enabled:true
		   },
		   callbacks: {
		    beforeOpen: function() {
		     this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
		    },
		    open: function() {$('.goToTop').css('overflow-y', 'scroll');},
		    close: function() {$('.goToTop').css('overflow-y', 'hidden');}
		   },
		   closeOnContentClick: true,
		   midClick: true
		  });

		new WOW().init();



		$(".slicknav_btn").on('click', function() {
		  if ( $(this).hasClass("slicknav_collapsed")) {
			$(".slicknav_icon").html('<i class="fa fa-bars"></i>');
		  } else {
			$(".slicknav_icon").html('<i class="fa fa-times"></i>');
		  }
		});



    });


    jQuery(window).load(function(){

        
    });


}(jQuery));	