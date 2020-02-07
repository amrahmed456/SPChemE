$(document).ready(function(){
	
	$(".slide-up").slideUp(1);
	$(".user-details .show-details").click(function(){
		$(this).siblings(".position-details").slideToggle();
		$(this).toggleClass("active-show");
		if($(this).hasClass("active-show")){
			$(this).html(' <i class="fas fa-chevron-up mr-2"></i> SHOW LESS');
		}else{
			$(this).html('<i class="fas fa-chevron-down mr-2"></i> SHOW MORE');
		}
	});
	new WOW().init();
	
});