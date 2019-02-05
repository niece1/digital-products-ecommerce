$(document).ready(function () {

$('.hamburger_holder').on('click', function() {
		$('.hamburger_icon').toggleClass('animate');
		$("#menu").toggleClass("show_menu");

	});

	$(".main_slider").slick({
		infinite:true,
		draggable: false,
		fade: true,
		dots: false,
		arrows: false,
		autoplay: true,
		speed: 1300,
		autoplaySpeed: 4000,
		pauseOnDotsHover:true,
		pauseOnHover:false,
		cssEase: 'ease',
 // vertical: true,
  //rtl: true,
 // prevArrow: $('#arrow_slick_left'),
 // nextArrow: $('#arrow_slick_right')
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

});