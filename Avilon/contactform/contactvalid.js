$(document).ready(function(){
	$("#name4").focusout(function(){
		 	var name4=/^[A-za-z ]+$/;
            $name4=$("#name4").val();
          

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_name4").text("* Name is required ");
            }
            else if(!$name4.match(name4))
            {
            	    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_name4").text("* Please enter valid Name ");           	
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#send').attr('disabled',false);
	                $("#error_name4").text("");
            }
	});

    $("#email4").focusout(function(){
            var email =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            $em1=$("#email4").val();
            
            if($(this).val()==''){
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_email4").text("* E-Mail is required ");
            }
            else if(!$em1.match(email))
            {
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_email4").text("* Please enter valid email ");             
            }
            else
            {
                    $(this).css("border-color", "#2eb82e");
                    $('#send').attr('disabled',false);
                    $("#error_email4").text("");
            }
    });



    $("#subject4").focusout(function(){
            var subject4=/^[A-za-z\\. ]+$/;
            $subject4=$("#subject4").val();
            
            if($(this).val()==''){
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_subject4").text("* Please enter subject ");
            }
            else if(!$subject4.match(subject4))
            {
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_subject4").text("* Please enter valid character not a digit ");             
            }
            else
            {
                    $(this).css("border-color", "#2eb82e");
                    $('#subject4').attr('disabled',false);
                    $("#error_subject4").text("");
            }
    });



    $("#body4").focusout(function(){
            var body4=/^[A-za-z\\. ]+$/;
            $body4=$("#body4").val();
            // alert($body4);
            if($(this).val()==''){
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_body4").text("* Please enter subject ");
            }
            else if(!$body4.match(body4))
            {
                    $(this).css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_body4").text("* Please enter valid character not a digit ");             
            }
            else
            {
                    $(this).css("border-color", "#2eb82e");
                    $('#body4').attr('disabled',false);
                    $("#error_body4").text("");
            }
    });

    $( "#send" ).click(function() {

          if($('#name4').val()==''){
                    $('#name4').css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_name4").text("* Name is required ");
            }


            if($('#email4').val()==''){
                    $('#email4').css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_email4").text("* E-Mail is required ");
            }

            if($('#subject4').val()==''){
                    $('#subject4').css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_subject4").text("* Please enter subject ");
            }

            if($('#body4').val()==''){
                    $('#body4').css("border-color", "#FF0000");
                    $('#send').attr('disabled',true);
                    $("#error_body4").text("* Please enter message ");
            }



    });


});