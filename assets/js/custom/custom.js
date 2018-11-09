/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
    
    
    /* Sticky Sidebar */
    var $sticky = $('.sticky');
    var $stickyrStopper = $('.sticky-stopper');
    if (!!$sticky.offset()) { // make sure ".sticky" element exists
        var generalSidebarHeight = $sticky.innerHeight();
        var stickyTop = $sticky.offset().top;
        var stickOffset = 0;
        var stickyStopperPosition = $stickyrStopper.offset().top;
        var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
        var diff = stopPoint + stickOffset;

        $(window).scroll(function(){ // scroll event
          var windowTop = $(window).scrollTop(); // returns number

          if (stopPoint < windowTop) {
              $sticky.css({ position: 'absolute', top: diff, right:'3%'});
              $sticky.removeClass('padTop');
          } else if (stickyTop < windowTop+stickOffset) {
              $sticky.css({ position: 'fixed', top: stickOffset, right:'3%' });
              $sticky.addClass('padTop');
          } else {
              $sticky.css({position: 'absolute', top: 'initial', right:'3%'});
              $sticky.removeClass('padTop');
          }
        });
    }
 
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
                //$('.active-section').text("");
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