$(document).ready(function(){
	
	$("#preloader").fadeOut(600).removeClass("d-flex");
	
	var navH = $(".navbar").height();
	$(".nav-top-replacer").css("height" , navH);
	
	// to top button
	$(".to_top").click(function(){
		$("html,body").animate({
			scrollTop:0
		},500);
	});

	$(window).on("scroll",function(){
		if($(window).scrollTop() > 150){
			$(".to_top").removeClass("to_top_bottom");
		}else{
			$(".to_top").addClass("to_top_bottom");
		}
	});

	
});