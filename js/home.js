$(document).ready(function(){
	
	
	$(".intro").css("min-height",winH);
	
	$(window).resize(function(){
		winH = $(window).innerHeight();
		$(".intro").css("min-height",winH);
	});
	
	// to top button
	$(".leave-main").click(function(){
		winH = $(window).innerHeight();
		$("html,body").animate({
			scrollTop:winH-50
		},500);
	});
	
	
	
	// for features carousel plugin
	$('.owl-features').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		dots:true,
		autoplay:true,
		autoplayTimeout:6000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	$('.owl-features').on('changed.owl.carousel', function(e) {
		var color = $(".owl-features .active .item").data("color");
		$(".main").css("background-color",color);
	});
	
	
	$('.owl-events').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:6000,
		responsive:{
			0:{
				items:1.3
			},
			600:{
				items:1.8
			},
			1000:{
				items:2.6
			}
		}
	});
	$('.owl-magazine').owlCarousel({
		 rtl:true,
		loop:true,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:6000,
		responsive:{
			0:{
				items:1.2
			},
			600:{
				items:1.8
			},
			1000:{
				items:2.6
			}
		}
	});
	
});