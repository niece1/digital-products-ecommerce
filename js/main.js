$(document).ready(function () {

 //Slick slider
 $(".main_slider").slick({
 	infinite:true,
 	draggable: false,
 	fade: true,
 	dots: false,
 	arrows: true,
 	autoplay: true,
 	speed: 1200,
 	autoplaySpeed: 4000,
 	pauseOnDotsHover:true,
 	pauseOnHover:false,
 	cssEase: 'ease',
 // vertical: true,
 prevArrow: $('#left_arrow'),
 nextArrow: $('#right_arrow')
});

// Sticky-kit plugin
$(".about_box").stick_in_parent();

//Accordeon

$(function($){
	var contents = $('.accordeon_content');
  var titles = $('.accordeon_title');
  titles.on('click',function(){
    var title = $(this);
    contents.filter(':visible').slideUp(function(){
    	$(this).prev('.accordeon_title').removeClass('is-opened');
    });  
    
    var content = title.next('.accordeon_content'); 
    
    if (!content.is(':visible')) {
      content.slideDown(function(){title.addClass('is-opened')});
    } 
  });
})(jQuery);

//Isotope
var $grid = $('.portfolio_container').isotope({
	itemSelector: '.portfolio_item',
	stagger: 30
});

$('.filter_button_group').on( 'click', 'li', function() {
	var filterValue = $(this).attr('data-filter');
	$grid.isotope({ filter: filterValue });

	$('.filter_button_group li').removeClass('active');
	$(this).addClass('active');
});

	//Parallax
$(window).scroll(function() {
	var st = $(this).scrollTop();
	$('.parallax_text').css({
		'transform' : 'translate(0%, ' + st + '%'
	});
});
});


//Menu overlay animation
(function() {
	var triggerBttn = document.getElementById( 'trigger-overlay' ),
	overlay = document.querySelector( 'div.overlay' ),
	closeBttn = overlay.querySelector( 'button.overlay-close' );
	transEndEventNames = {
		'WebkitTransition': 'webkitTransitionEnd',
		'MozTransition': 'transitionend',
		'OTransition': 'oTransitionEnd',
		'msTransition': 'MSTransitionEnd',
		'transition': 'transitionend'
	},
	transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
	support = { transitions : Modernizr.csstransitions };

	function toggleOverlay() {
		if( classie.has( overlay, 'open' ) ) {
			classie.remove( overlay, 'open' );
			classie.add( overlay, 'close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'close' ) ) {
			classie.add( overlay, 'open' );
		}
	}

	triggerBttn.addEventListener( 'click', toggleOverlay );
	closeBttn.addEventListener( 'click', toggleOverlay );
})();

//Input underline animation
const wrapper = document.querySelector(".input-wrapper"),
textInput = document.querySelector("input[type='email']");        
textInput.addEventListener("keyup", event => {
	wrapper.setAttribute("data-text", event.target.value);
});