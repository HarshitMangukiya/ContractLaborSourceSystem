$(document).ready(function(){

	$("#email").focusout(function(){
		 	var email =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            $em1=$("#email").val();

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_email").text("* E-Mail is required ");
            }
            else if(!$em1.match(email))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_email").text("* Please enter valid email ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#login').attr('disabled',false);
	                $("#error_email").text("");
            }
	});

	$("#password").focusout(function(){

            var password1=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;
            $password1=$("#password").val();
        

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_password").text("* Password is required !");
            }
            else if(!$password1.match(password1))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_password").text("* You have to enter password between 6 to 15 characters at least one numeric digit and a special character ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#login').attr('disabled',false);
	                $("#error_password").text("");
            }
	});


	$("#phone1").focusout(function(){

            $phone=$("#phone1").val();
            // alert($phone);   

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_phone1").text("* Password is required !");
            }
            else if($phone.length!=10)
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_phone1").text("* Invalid Contact no ");           	
            }
            else if(!$.isNumeric($phone))
            {
 	    			$(this).css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_phone1").text("* Phone Number Should Be Numeric");        
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#login1').attr('disabled',false);
	                $("#error_phone1").text("");
            }
	});


	$("#password1").focusout(function(){

            var password= /^(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{6,15}$/;
            $password=$("#password1").val();
           
            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_password1").text("* Password is required !");
            }
            else if(!$password.match(password))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_password1").text("* You have to enter password between 6 to 15 characters at least one numeric digit and a special character ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#login1').attr('disabled',false);
	                $("#error_password1").text("");
            }
	});


	$( "#login" ).click(function() {
		if($("#email").val()==''){
                	$("#email").css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_email").text("* E-Mail is required !");
            }
 		
 		if($("#password").val()==''){
                	$("#password").css("border-color", "#FF0000");
                    $('#login').attr('disabled',true);
                    $("#error_password").text("* Password is required !");
            }            
	});




	$( "#login1" ).click(function() {
		if($("#phone1").val()==''){
                	$("#phone1").css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_phone1").text("* Phone is required !");
            }
 		
 		if($("#password1").val()==''){
                	$("#password1").css("border-color", "#FF0000");
                    $('#login1').attr('disabled',true);
                    $("#error_password1").text("* Password is required !");
            }            
	});

});