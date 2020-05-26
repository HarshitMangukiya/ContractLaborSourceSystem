$(document).ready(function(){
	$("#video").focusout(function(){

            if($(this).val()==''){
                	$(this).css("border-color", "#FF0000");
                    $('#insertimg').attr('disabled',true);
                    $("#error_video").text("* video link is required ");
            }
            else
            {
	            	$(this).css("border-color", "#2eb82e");
	                $('#insertimg').attr('disabled',false);
	                $("#error_video").text("");
            }
	});


    $("#filetype").focusout(function(){
         if($("#filetype").val()==null){
                    $("#filetype").css("border-color", "#FF0000");
                    $('#insertimg').attr('disabled',true);
                    $("#error_filetype").text("* Filetype is required");
            }
            else
            {
                    $("#filetype").css("border-color", "#2eb82e");
                    $('#insertimg').attr('disabled',false);
                    $("#error_filetype").text("");                
            }
});

        


    $( "#insertimg" ).click(function() {

            if($("#filetype").val()==null){
                    $("#filetype").css("border-color", "#FF0000");
                    $('#insertimg').attr('disabled',true);
                    $("#error_filetype").text("* Filetype is required");
            }
            else
            {
                    $("#filetype").css("border-color", "#2eb82e");
                    $('#insertimg').attr('disabled',false);
                    $("#error_filetype").text("");                
            }

            $filetype=$("#filetype").val();
            if($filetype==2)
            {
                if($("#video").val()==''){
                    $("#video").css("border-color", "#FF0000");
                    $('#insertimg').attr('disabled',true);
                    $("#error_video").text("* video link is required ");
                }
            }


            if($filetype==1)
            {
                if($("#workimage").val()==''){
                    $("#workimage").css("border-color", "#FF0000");
                    $('#insertimg').attr('disabled',true);
                    $("#error_workimage").text("* Workimage is required ");
                }
            }


                       
    });

});