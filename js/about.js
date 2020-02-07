$(document).ready(function(){
	
	
	/* for slider section */
	var count_slider = 1;
	setInterval(function(){
		
		$(".img-thumb").each(function(){
			$(this).removeClass('active');
		});
		var showNowNum = $(".show-now").data("count");
		count_slider++;
		if(count_slider > $(".slider-box").children(".slider-imgs").length){
			count_slider = 1;
		}
		$(".show-now").removeClass("show-now").fadeOut(2);
		
		$(".slider-imgs[data-count='" + count_slider + "']").fadeIn(500).addClass("show-now");
		$(".img-thumb[data-count='" + count_slider + "']").addClass('active');
		
	},5000);
	// for clicking the thumbnail of slider
	$(".img-thumb").click(function(){
		
		var dtaTo = $(this).data("count");
		count_slider = dtaTo;
		$(this).addClass("active").siblings(".img-thumb").removeClass("active");
		
		$(".show-now").removeClass("show-now").fadeOut(2);
		
		$(".slider-imgs[data-count='" + dtaTo + "']").fadeIn(500).addClass("show-now");
		
	});
	
	$('.frame-container').fitFrame({
		mode: 'resize'
	});
	
	
});