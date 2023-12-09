$(document).ready(function() {
    $(".toggle-nav").click(function(){
		$(this).toggleClass("active");
		$(".owerlay").toggleClass("active");
		$("header section.section-header .menu").toggleClass("active");
		$(".overflow").toggleClass("active");
	});
	$(".owerlay").click(function(){
		$(this).removeClass("active");
		$(".toggle-nav").removeClass("active");
		$("header section.section-header .menu").removeClass("active");
		$(".overflow").removeClass("active");
	});
	$('.reviews .strong-content').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 800,
		slidesToShow: 4,
  		slidesToScroll: 1,
		  responsive: [
			{
				breakpoint: 768,
				settings: {
				  infinite: true,
				  slidesToShow: 2,
				}
			},
			{
				breakpoint: 576,
				settings: {
				  infinite: true,
				  slidesToShow: 1,
				}
			}
		]
    });
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('header').addClass("sticky");
		}
		else{
			$('header').removeClass("sticky");
		}
	});
});

 //retrieve current state
 $('#click-color, .switch div').toggleClass(localStorage.toggled);
 /* Toggle */
$('.switch').on('click',function(){
 //localstorage values are always strings (no booleans)  

 if (localStorage.toggled != "bg-site" ) {
	 $('#click-color, .switch div').toggleClass("bg-site", true );
	 localStorage.toggled = "bg-site";
 } else {
	 $('#click-color, .switch div').toggleClass("bg-site", false );
	 localStorage.toggled = "";
 }
});