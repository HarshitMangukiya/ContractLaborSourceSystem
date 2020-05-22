$(document).ready(function(){

	$("#firstname").focusout(function(){
		 	var firstname=/^[A-za-z]+$/;
            $firstname=$("#firstname").val();
          

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_firstname").text("* Firstname is required ");
            }
            else if(!$firstname.match(firstname))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_firstname").text("* Please enter valid Firstname ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_firstname").text("");
            }
	});

	$("#lastname").focusout(function(){
		 	var lastname=/^[A-za-z]+$/;
            $lastname=$("#lastname").val();
            
            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_lastname").text("* Lastname is required ");
            }
            else if(!$lastname.match(lastname))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_lastname").text("* Please enter valid Lastname ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_lastname").text("");
            }
	});


	$("#about").focusout(function(){
		 	var about=/^[A-za-z]+$/;
            $about=$("#about").val();

            if(!$about.match(about))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_about").text("* Please enter valid characters not a digit ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_about").text("");
            }
	});


	$("#phone").focusout(function(){

            $phone=$("#phone").val();
            
            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_phone").text("* Phone Number is required !");
            }
            else if($phone.length!=10)
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_phone").text("* Invalid Contact no ");           	
            }
            else if(!$.isNumeric($phone))
            {
 	    			$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_phone").text("* Phone Number Should Be Numeric");        
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_phone").text("");
            }
	});


	$("#address").focusout(function(){
		 	var address=/^[a-zA-Z0-9\s,'-]+$/;
            $address=$("#address").val();
            
            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_address").text("* Address is required ");
            }
            else if(!$address.match(address))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_address").text("* Please enter valid address ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_address").text("");
            }
	});	


	$("#location").focusout(function(){
		 	var location=/^[a-zA-Z]+$/;
            $location=$("#location").val();
            
            if(!$location.match(location))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_location").text("* Please enter valid location ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_location").text("");
            }
	});





	 $("#pincode").focusout(function(){

            $pincode=$("#pincode").val();
        
            
            if($pincode.length!=6)
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_pincode").text("* Invalid pincode no ");           	
            }
            else if(!$.isNumeric($pincode))
            {
 	    			$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_pincode").text("* Pincode Number Should Be Numeric");        
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_pincode").text("");
            }
	});




	$("#password2").focusout(function(){

            var password=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;
            $password=$("#password2").val();
            
            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_password2").text("* Password is required !");
            }
            else if(!$password.match(password))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_password2").text("* You have to enter password between 6 to 15 characters at least one numeric digit and a special character ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#customerupdate').attr('disabled',false);
	                $("#error_password2").text("");
            }
	});




	$( "#customerupdate" ).click(function() {

			if($("#firstname").val()==''){
                	$("#firstname").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_firstname").text("* Firstname is required ");
            }

            if($("#lastname").val()==''){
                	$("#lastname").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_lastname").text("* Lastname is required ");
            }

            if($("#phone").val()==''){
                	$("#phone").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_phone").text("* Password is required !");
            }

            
            if($("#country").val()==''){
                    $("#country").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_country").text("* Country is required ");
            }
            else
            {
                    $("#country").css("border-color", "#2eb82e");
                    $('#customerupdate').attr('disabled',false);
                    $("#error_country").text("");                  
            }            

            
            if($("#state").val()==''){
                    $("#state").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_state").text("* State is required ");
            }
            else
            {
                    $("#state").css("border-color", "#2eb82e");
                    $('#customerupdate').attr('disabled',false);
                    $("#error_State").text("");                
            }

            
            if($("#city").val()==''){
                    $("#city").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_city").text("* City is required ");
            }
            else
            {
                    $("#city").css("border-color", "#2eb82e");
                    $('#customerupdate').attr('disabled',false);
                    $("#error_city").text("");                 
            } 
        
            if($("#password2").val()==''){
                	$("#password2").css("border-color", "#FF0000");
                    $('#customerupdate').attr('disabled',true);
                    $("#error_password2").text("* Password is required !");
            }


	});

});