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
	var $window = $(window);
	if($('div[data-type="background"]').length){
		$('div[data-type="background"]').each(function(){

			var $obj = $(this);
			var offset = $obj.offset().top;

			$(window).scroll(function()
			{
				offset = $obj.offset().top;

				if ($window.scrollTop() > (offset - window.innerHeight))
				{
					var yPos = -(($window.scrollTop() - offset) / 2 );
					var coords = '50% ' + ( yPos ) + 'px';
					$obj.css({ backgroundPosition:  coords });
				}
			});
			$(window).resize(function()
			{
				offset = $obj.offset().top;
			});
		});
	}

	// Counter 
function visible(partial) {
    var $t = partial,
        $w = jQuery(window),
        viewTop = $w.scrollTop(),
        viewBottom = viewTop + $w.height(),
        _top = $t.offset().top,
        _bottom = _top + $t.height(),
        compareTop = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));
}

$(window).scroll(function(){

  if(visible($('.count_number')))
    {
      if($('.count_number').hasClass('counter-loaded')) return;
      $('.count_number').addClass('counter-loaded');
      
$('.count_number').each(function () {
  var $this = $(this);
  jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
    duration: 3000,
    easing: 'swing',
    step: function () {
      $this.text(Math.ceil(this.Counter));
    }
  });
});
    }
})

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