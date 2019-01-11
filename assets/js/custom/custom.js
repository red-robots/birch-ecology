/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

	var scrollTop = $(".scrollTop");
    $(window).scroll(function() {
        var topPos = $(this).scrollTop();
        // if user scrolls down - show scroll to top button
        if (topPos > 100) {
          $(scrollTop).css({
            "opacity":1,
            "z-index":3000
          });
        } else {
          $(scrollTop).css({
            "opacity":0,
            "z-index":"-999"
          });
        }
    });

    $(scrollTop).click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 800);
        return false;
    });
	
    if( $("#secondary_mobile").length > 0 ) {
        $('body').addClass('hasSidebar');
    }

    $(".sticky-sidebar").stick_in_parent({
        recalc_every: 1,
        bottoming: false
    });
    
    /* Smooth Scroll to Anchor */
    if( $('.services-item-section').length > 0 ) {
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 ) {
                $('.scrollup').fadeIn();
                $('body').addClass('scrolled');
                $('#secondary_mobile').addClass('show');
            } else {
                $('.scrollup').fadeOut();
                $('body').removeClass('scrolled');
                $('#secondary_mobile').removeClass('show');
            }
        }); 
    }
    
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            && location.hostname == this.hostname) {
            
            $(".services_sublinks li").removeClass('active');
            $(this).parents("li").addClass('active');
            $('#sidebarNavMobile').trigger("click");
            //$('.active-section').text( $(this).text() );
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top - 50 //offsets for fixed header
                }, 1000);
                return false;
            }
        }
    });
    
    $('body').on('click','#sidebarNavMobile',function(e){
        e.preventDefault();
        $(this).toggleClass('open');
        $('#svclinks').slideToggle();
        $('#secondary_mobile').toggleClass('open-nav');
    });
    
	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

});// END #####################################    END