


;(function ($) {

	'use strict';
	
 // SCROLL TO TOP
  
  $(window).on('scroll', function () {
    if ($(window).scrollTop() > 70) {
        $('.backtop').addClass('reveal');
    } else {
        $('.backtop').removeClass('reveal');
    }
});
 
	$('.portfolio-single-slider').slick({
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000

	});

	$('.clients-logo').slick({
		infinite: true,
		arrows: false,
		autoplay: true,
		slidesToShow: 6,
		slidesToScroll: 6,
		autoplaySpeed: 6000,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow:6,
		        slidesToScroll: 6,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow:4,
		        slidesToScroll: 4
		      }
		    },{
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 4
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    }
		  
  		]
	});

	$('.testimonial-wrap').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		dots: true,
		arrows: false,
		autoplay: true,
		vertical:true,
		verticalSwiping:true,
		autoplaySpeed: 6000,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow:1,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },{
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  
  		]
	});

	$('.testimonial-wrap-2').slick({
		slidesToShow: 2,
		slidesToScroll: 2,
		infinite: true,
		dots: true,
		arrows:false,
		autoplay: true,
		autoplaySpeed: 6000,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow:2,
		        slidesToScroll:2,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 900,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },{
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  
  		]
	});



	var map;

	function initialize() {
		var mapOptions = {
			zoom: 13,
			center: new google.maps.LatLng(50.97797382271958, -114.107718560791)
			// styles: style_array_here
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	}

	var google_map_canvas = $('#map-canvas');

	if (google_map_canvas.length) {
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	// Counter

	$('.counter-stat span').counterUp({
	      delay: 10,
	      time: 1000
	  });

		
 // Shuffle js filter and masonry
    var Shuffle = window.Shuffle;
    var jQuery = window.jQuery;

    var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
        itemSelector: '.shuffle-item',
        buffer: 1
    });

    jQuery('input[name="shuffle-filter"]').on('change', function (evt) {
        var input = evt.currentTarget;
        if (input.checked) {
            myShuffle.filter(input.value);
        }
    });

})(jQuery);
