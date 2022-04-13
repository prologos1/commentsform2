function Send() {
	let name = $("#comment_name").val();
	let email = $("#comment_email").val();
	let message = $("#comment_text").val();
	const new_message = new Commentsvalid(name, email, message);
	if( new_message.isValidMessage(message) === true || new_message.isEmptyName(name) || isValidEmailAddress(email) ) {
		$.post("",  
		{
			act: "send",         
			name: $("#comment_name").val(),
			email:  $("#comment_email").val(),
			text: $("#comment_text").val()	
		},
		 function(response,status){
			if( status=='success' ){ 
					let res = $("#res");
					res.show(); 
					res.css({"visibility":"visible"}); 
					$('#blockcomms').load(window.location.href + "?lastcom="+response + ' #blockcomms');					
					setTimeout(function () { 
						res.css({"visibility":"hidden"}); 
						NewElement = $("#comm-"+response); 
						$("html,body").scrollTop($(NewElement).offset().top)
					}, 3000);				
				}
					console.log(status);
					console.log(response);
			 } ); 

		$("#comment_text").val("");  
		$("#comment_text").focus();  
    } else {		
		$("#err").css({"visibility":"visible"}); 
		setTimeout(function () { 
			$("#err").css({"visibility":"hidden"}); 
		}, 3000);	
	}
    return false; 
}


$(document).ready(function () {
    $("#comment").submit(Send); 
    $("#comment_text").focus();
	$("#res").css({"visibility":"hidden"}); 
	$("#err").css({"visibility":"hidden"}); 
}); 