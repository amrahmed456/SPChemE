$(document).ready(function(){
	
	$("body").on("click" , ".email_subscribe .submit-subscribe" , function(){
		
		$(this).html('<p class="lead"style="color:#FFF;font-size:15px;margin-bottom:0px">Sending...</p>');
		
		var email = $(".email_subscribe .subscir-form-email").val().trim();
		if(email.length > 0 && email.indexOf("@") > 2){
			$.ajax({
				url:	"php/email_subscribe.php",
				method:	"POST",
				dataType:	"text",
				context:	this,
				data:	{email:email},
				success:	function(text){
					if(text == 'success'){
						$(this).parent().removeClass("sub-button").addClass("sub-success");
						$(this).html("you've succesfully subscribed :)");
					}else if(text == 'exist'){
						$(this).parent().removeClass("sub-button").addClass("sub-error");
						$(this).html("This Email is already exist");
						setTimeout(function(){
							
							$(".email_subscribe .submit-subscribe").html("SUBSCRIBE");
							$(".email_subscribe .sub").removeClass("sub-error").addClass("sub-button");
						} , 2500);
					}
				}
			});
		}else{
			$(this).parent().removeClass("sub-button").addClass("sub-error");
			$(this).html("Invalid Email Address");
			setTimeout(function(){
				
				$(".email_subscribe .submit-subscribe").html("SUBSCRIBE");
				$(".email_subscribe .sub").removeClass("sub-error").addClass("sub-button");
			} , 2500);
		}
		
	});
	
});