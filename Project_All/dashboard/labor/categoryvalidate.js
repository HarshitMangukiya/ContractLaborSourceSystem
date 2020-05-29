$(document).ready(function(){
$("#category").focusout(function(){
            var firstname=/^[A-za-z]+$/;
            $firstname=$("#category").val();
            
            if($(this).val()==''){
                    $(this).css("border-color", "#FF0000");
                    $('#signup3').attr('disabled',true);
                    $("#error_firstname3").text("* Category is required ");
            }
            else if(!$firstname.match(firstname))
            {
                    $(this).css("border-color", "#FF0000");
                    $('#signup3').attr('disabled',true);
                    $("#error_firstname3").text("* Please enter valid Category ");             
            }
            else
            {
                    $(this).css("border-color", "#2eb82e");
                    $('#signup3').attr('disabled',false);
                    $("#error_firstname3").text("");
            }
    });

    // $("#lastname3").focusout(function(){
    //         var lastname=/^[A-za-z]+$/;
    //         $lastname=$("#lastname3").val();
            

    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_lastname3").text("* Lastname is required ");
    //         }
    //         else if(!$lastname.match(lastname))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_lastname3").text("* Please enter valid Lastname ");               
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_lastname3").text("");
    //         }
    // });


     
    // $("#age3").focusout(function(){
    //         $age=$("#age3").val();
            


    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_age3").text("* Age is required ");
    //         }
    //         else if(!$.isNumeric($age))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_age3").text("* Please enter digit ");             
    //         }
    //         else if ($age<18 || $age>100)
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_age3").text("* Please enter age between 18 to 100 ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_age3").text("");
    //         }
    // });


    // $("#phone3").focusout(function(){

    //         $phone3=$("#phone3").val();
            
    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_phone3").text("* Contact Number is required !");
    //         }
    //         else if($phone3.length!=10)
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_phone3").text("* Invalid Contact no ");               
    //         }
    //         else if(!$.isNumeric($phone3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_phone3").text("* Phone Number Should Be Numeric");        
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_phone3").text("");
    //         }
    // });


    // $("#aadharno3").focusout(function(){

    //         $aadharno3=$("#aadharno3").val();
            

    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_aadharno3").text("* Aadhar Number is required !");
    //         }
    //         else if($aadharno3.length!=12)
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_aadharno3").text("* Invalid Aadhar no ");             
    //         }
    //         else if(!$.isNumeric($aadharno3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_aadharno3").text("* Aadhar Number Should Be Numeric");        
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_aadharno3").text("");
    //         }
    // });


    // $("#address3").focusout(function(){
    //         var address3=/^[a-zA-Z0-9\s,'-]*$/;
    //         $address3=$("#address3").val();
            
    //         // if($(this).val()==''){
    //         //         $(this).css("border-color", "#FF0000");
    //         //         $('#signup3').attr('disabled',true);
    //         //         $("#error_address3").text("* Address is required ");
    //         // }
    //         if(!$address3.match(address3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_address3").text("* Please enter valid address ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_address3").text("");
    //         }
    // }); 


    // $("#category3").focusout(function(){

    //     $category3=$("#category3").val();
        
    //         if($(this).val()==null){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_category3").text("* Category is required ");
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_category3").text("");                 
    //         }        
    // });        


    // $("#pincode3").focusout(function(){

    //         $pincode3=$("#pincode3").val();
        
    //         // if($(this).val()==''){
    //         //         $(this).css("border-color", "#FF0000");
    //         //         $('#signup3').attr('disabled',true);
    //         //         $("#error_pincode3").text("* Pincode Number is required !");
    //         // }
    //         if($pincode3.length!=6)
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_pincode3").text("* Invalid pincode no ");             
    //         }
    //         else if(!$.isNumeric($pincode3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_pincode3").text("* Pincode Number Should Be Numeric");        
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_pincode3").text("");
    //         }
    // });


    // $("#charge3").focusout(function(){

    //         $charge3=$("#charge3").val();
        
    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_charge3").text("* Charge is required !");
    //         }
    //         else if(!$.isNumeric($charge3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_charge3").text("* charge Should Be Numeric");        
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_charge3").text("");
    //         }
    // });


    // $("#password3").focusout(function(){

    //         var password3=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;
    //         $password3=$("#password3").val();
        
    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_password3").text("* Password is required !");
    //         }
    //         else if(!$password3.match(password3))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_password3").text("* You have to enter password between 6 to 15 characters at least one numeric digit one special character");              
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_password3").text("");
    //         }
    // });


    // $("#confirmpassword3").focusout(function(){

    //         // var confirmpassword=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;
    //         $confirmpassword3=$("#confirmpassword3").val();
            
    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_confirmpassword3").text("* Confirm password is required !");
    //         }
    //         else if($confirmpassword3!=$password3)
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_confirmpassword3").text("* Confirm password is not same !");              
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_confirmpassword3").text("");
    //         }
    // });





    // $("#email3").focusout(function(){
    //         var email =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})*$/;
    //         $em1=$("#email3").val();
            
    //         if($(this).val()==''){
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_email3").text("* E-Mail is required ");
    //         }
    //         if(!$em1.match(email))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_email3").text("* Please enter valid email ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_email3").text("");
    //         }
    // });


    // $("#location3").focusout(function(){
    //         var location=/^[A-za-z]*$/;
    //         $location=$("#location3").val();
            
    //         // if($(this).val()==''){
    //         //         $(this).css("border-color", "#FF0000");
    //         //         $('#signup3').attr('disabled',true);
    //         //         $("#error_location3").text("* Location is required ");
    //         // }
    //         if(!$location.match(location))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_location3").text("* Please enter valid Location ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_location3").text("");
    //         }
    // });


    // $("#about3").focusout(function(){
    //         var about=/^[\w\s]*$/;
    //         $about=$("#about3").val();
            
    //         // if($(this).val()==''){
    //         //         $(this).css("border-color", "#FF0000");
    //         //         $('#signup3').attr('disabled',true);
    //         //         $("#error_about3").text("* About you is required ");
    //         // }
    //         if(!$about.match(about))
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_about3").text("* Please enter valid about ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_about3").text("");
    //         }
    // });

    // $("#leaderid3").focusout(function(){
    //         var leaderid=/^[0-9]+$/;
    //         $leaderid=$("#leaderid3").val();
            
    //         if(!$leaderid.match(leaderid))  
    //         {
    //                 $(this).css("border-color", "#FF0000");
    //                 $('#signup3').attr('disabled',true);
    //                 $("#error_leaderid3").text("* Please enter valid leaderid ");             
    //         }
    //         else
    //         {
    //                 $(this).css("border-color", "#2eb82e");
    //                 $('#signup3').attr('disabled',false);
    //                 $("#error_leaderid3").text("");
    //         }
    // });






    $( "#signup3" ).click(function() {
            

            // if($("#email3").val()==''){
            //         $("#email3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_email3").text("* E-Mail is required ");
            // }

            // if($("#location3").val()==''){
            //         $("#location3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_location3").text("* Location is required ");
            // }

            // if($("#about3").val()==''){
            //         $("#about3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_about3").text("* About you is required ");
            // }

            // if($("#email3").val()==''){
            //         $("#email3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_email3").text("* E-Mail is required ");
            // }

            if($("#category").val()==''){
                    $("#category").css("border-color", "#FF0000");
                    $('#signup3').attr('disabled',true);
                    $("#error_firstname3").text("* Category is required ");
            }

            // if($("#lastname3").val()==''){
            //         $("#lastname3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_lastname3").text("* Lastname is required ");
            // }
  
            // if(!genderfemale.checked || !gendermale.checked)
            // {
            //         $('#signup3').attr('disabled',true);
            //         $("#error_gender").text("* gender is required ");            
            // }
            // else
            // {
            //         $('#signup3').attr('disabled',false);
            //         $("#error_gender").text("");                        
            // }

            // if($("#age3").val()==''){
            //         $("#age3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_age3").text("* Age is required ");
            // }

            // if($("#phone3").val()==''){
            //         $("#phone3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_phone3").text("* Contact Number is required !");
            // }

            // if($("#aadharno3").val()==''){
            //         $("#aadharno3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_aadharno3").text("* Aadhar Number is required !");
            // }

            // if($("#address3").val()==''){
            //         $("#address3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_address3").text("* Address is required ");
            // }

            
            // if($("#country").val()==''){
            //         $("#country").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_country3").text("* Country is required ");
            // }
            // else
            // {
            //         $("#country").css("border-color", "#2eb82e");
            //         $('#signup3').attr('disabled',false);
            //         $("#error_country3").text("");                  
            // }            


            
            // if($("#state").val()==''){
            //         $("#state").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_state3").text("* State is required ");
            // }
            // else
            // {
            //         $("#state").css("border-color", "#2eb82e");
            //         $('#signup3').attr('disabled',false);
            //         $("#error_State3").text("");                
            // }

            
            // if($("#city").val()==''){
            //         $("#city").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_city3").text("* City is required ");
            // }
            // else
            // {
            //         $("#city").css("border-color", "#2eb82e");
            //         $('#signup3').attr('disabled',false);
            //         $("#error_city3").text("");                 
            // } 

            // if($("#category3").val()==null){
            //         $("#category3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_category3").text("* Category is required ");
            // } 

            // if($("#pincode3").val()==''){
            //         $("#pincode3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_pincode3").text("* Pincode Number is required !");
            // }

            // if($("#charge3").val()==''){
            //         $("#charge3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_charge3").text("* Charge is required !");
            // }

            // if($("#password3").val()==''){
            //         $("#password3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_password3").text("* Password is required !");
            // }

            // if($("#confirmpassword3").val()==''){
            //         $("#confirmpassword3").css("border-color", "#FF0000");
            //         $('#signup3').attr('disabled',true);
            //         $("#error_confirmpassword3").text("* Confirm password is required !");
            // }    

    });
    
});
