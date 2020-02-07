$(document).ready(function(){

	var winH = $(window).innerHeight();
	$(".main").css("min-height" , winH*0.75);
	
	$(window).on("scroll" , function(){
		var scrollTop = $(window).scrollTop()*0.03;
		if(scrollTop > 0.4){
			$(".main .overlay").css("background" , "linear-gradient(0deg , rgb(53, 53, 53 , " + scrollTop + " ) , rgba(0, 0, 0, " + scrollTop*0.1 +  "))");
		}else{
			$(".main .overlay").css("background" , "background: rgba(0, 0, 0, 0) linear-gradient(0deg, rgb(53, 53, 53), rgba(0, 0, 0, 0.227)) repeat scroll 0% 0%;");
		}
		
	});
	
	$(".content .content-desc img").each(function(){
		$(this).addClass("img-fluid");
	});

});