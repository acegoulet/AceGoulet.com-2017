// define $
$ = jQuery.noConflict();

// Width detector. Good for triggering responsive actions
$(document).ready(function(){
	var compareWidth; 
	var detector;
	detector = $('#wrapper'); // whatever container accurately reflects the site width
	compareWidth = detector.width();
	$(window).resize(function(){
		if(detector.width()!=compareWidth){
			compareWidth = detector.width();
			if(detector.width()>500){ //if wrapper is greater than 500px wide
			//	do something
			}
		}
	});
	
	//home nav scrolling
	$('#main-nav .anchor a').click(function(){
		var option = $(this).attr('href');
		option = option.split('#')[1];
		option = option+'-scroll';
		$('html,body').animate({scrollTop: $('#'+option).offset().top},800);
		return false;
	});
	
	//homepage scrolling colors
	bg_colors = ['blue', 'red', 'yellow', 'grey'];
	
	$('#who-scroll').waypoint(function(direction) {
		if (direction === 'down') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('blue');
			$('header a').removeClass('active');
			$('header .who-nav a').addClass('active');
		}
	}, {
		offset: '0'
	});

	$('#who-scroll').waypoint(function(direction) {
		if (direction === 'up') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('blue');
			$('header a').removeClass('active');
			$('header .who-nav a').addClass('active');
		}
	}, {
		offset: '-25%'
	});
	
	$('#where-scroll').waypoint(function(direction) {
		if (direction === 'down') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('red');
			$('header a').removeClass('active');
			$('header .where-nav a').addClass('active');
		}
	}, {
		offset: '25%'
	});

	$('#where-scroll').waypoint(function(direction) {
		if (direction === 'up') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('red');
			$('header a').removeClass('active');
			$('header .where-nav a').addClass('active');
		}
	}, {
		offset: '-25%'
	});
	
	$('#what-scroll').waypoint(function(direction) {
		if (direction === 'down') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('yellow');
			$('header a').removeClass('active');
			$('header .what-nav a').addClass('active');
		}
	}, {
		offset: '25%'
	});

	$('#what-scroll').waypoint(function(direction) {
		if (direction === 'up') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('yellow');
			$('header a').removeClass('active');
			$('header .what-nav a').addClass('active');
		}
	}, {
		offset: '-25%'
	});
	
	$('#contact-scroll').waypoint(function(direction) {
		if (direction === 'down') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('grey');
			$('header a').removeClass('active');
			$('header .contact-nav a').addClass('active');
		}
	}, {
		offset: '25%'
	});

	$('#contact-scroll').waypoint(function(direction) {
		if (direction === 'up') {
			$.each( bg_colors, function( i, val ) {
				$('body').removeClass(val);
			});
			$('body').addClass('grey');
			$('header a').removeClass('active');
			$('header .contact-nav a').addClass('active');
		}
	}, {
		offset: '-25%'
	});
	
	//scroll fading
	scrollfade_in_up($('.fade-in-out-scroll'), 100, 300, 2.5);
	setTimeout(function(){
		$('.fade-in-load').css('opacity', 1);
    }, 600);
    
    
    //hello there
    console.log('o_0 https://www.youtube.com/watch?v=7YvAYIJSSZY');
});

//home nav scroll on load
$(window).load(function(){
	if(document.location.href.split('#')[1]){
		var page_hash = document.location.href.split('#')[1];
		page_hash = '#'+page_hash+'-scroll';
		$('html,body').animate({scrollTop: $(page_hash).offset().top},800);
	}
});

function scrollfade_in_up(element, range, manualoffset, emthreshold){
	if($(window).height() < 450){
		manualoffset = manualoffset / 4;
	}
	$(window).scroll(function() {
		$(element).each(function(){
			var scrollTop = $(window).scrollTop(); 
			var offset = $(this).offset().top; 
			var height = $(this).outerHeight(); 
			var window_height = $(window).outerHeight(); 
			var window_offset_bottom = window_height - manualoffset; 
			var window_offset_top = window_height - manualoffset - range; 
		
			var calc = 1 + (scrollTop - offset + window_offset_bottom) / range;
			top_calc = emthreshold - calc;
			$(this).css({ 'opacity': calc });
			$(this).css({ 'top': top_calc + 'rem' });
			
			var section_accent = $(this).data('section');
			var section_accent_offset = $(this).data('accent-offset');
			$('.accent.'+section_accent).css({ 'opacity': calc });
			
			if ( calc > '1' ) {
				$(this).css({ 'opacity': 1 });
			} else if ( calc < '0' ) {
				$(this).css({ 'opacity': 0 });
			}
			if ( top_calc >= emthreshold ) {
				$(this).css({ 'top': emthreshold +'rem' });
			} else if ( top_calc < '0' ) {
				$(this).css({ 'top': 0 });
			}
			if (($(this).offset().top - $(window).scrollTop()) < section_accent_offset) { 
				$('.accent.'+section_accent).css('opacity',0); 
			} else {
				if(calc > 0){
					$('.accent.'+section_accent).css({ 'opacity': 1 });
				}
				else {
					$('.accent.'+section_accent).css({ 'opacity': 0 });
				}
			}
		});
		
	}).scroll();
}