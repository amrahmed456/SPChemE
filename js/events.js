$(document).ready(function(){
	
	$(".main").css("height", winH*0.80);
	
	if($(".mixes").length > 0){
			var mixer = mixitup('.mixes');
	}
	
	// for sorting events
	$(".prev-events li").click(function(){
		
		$(this).siblings("li").each(function(){
			$(this).removeClass("active");
		});
		$(this).addClass("active");
		
	});
	
	
	$('.owl-testmonials').owlCarousel({
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
	$(".owl-dots").css("visibility","hidden");
	// for clicking imgs in testmonials section
	$(".custom-nav .nav-img img").click(function(){
		$(this).siblings("img").removeClass("active").end().addClass("active");
		count = $(".custom-nav .nav-img img").length;
		var counter
		var i = 1;
		$(".custom-nav .nav-img img").each(function(){
			if($(this).hasClass("active")){
				counter = i;
			}else{
				i++;
			}
		});
		
		$(".owl-dots button:nth-child(" + counter + ")").click();
		
	});
	
	$('.owl-testmonials').on('changed.owl.carousel', function(e) {
		
		var counter
		var i = 1;
		$(".owl-dots button").each(function(){
			if($(this).hasClass("active")){
				counter = i;
			}else{
				i++;
			}
		});
		
		
		$(".custom-nav .nav-img img:nth-child(" + counter + ")").click();
	});
	
	
});