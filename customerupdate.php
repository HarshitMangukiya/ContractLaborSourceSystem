<!DOCTYPE html>
<html>
<head>
  <title>update customer</title> 
  <script src="jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'ajaxdata.php',

      data:'country_id='+countryID,

      success:function(html){

      $('#state').html(html);

      $('#city').html('<option value="">Select state first</option>');

    }

    });

  }
  else{

  $('#state').html('<option value="">Select country first</option>');

  $('#city').html('<option value="">Select state first</option>');

  }

  });

$('#state').on('change',function(){

  var stateID = $(this).val();

    if(stateID){

        $.ajax({

        type:'POST',

        url:'ajaxdata.php',

        data:'state_id='+stateID,

        success:function(html){

        $('#city').html(html);

        }

        });

    }else{

    $('#city').html('<option value="">Select state first</option>');

    }

});

});

</script>
</head>
  <?php
    if(isset($_REQUEST['cid']))
      {
          echo $_REQUEST['cid'];
        $con=mysqli_connect("localhost","root","","labor");

        $qry="select * from customer where c_id=".$_REQUEST['cid'];
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
          {
            $firstname=$row[1];
            $lastname=$row[2];
            $email=$row[3];
            $phone=$row[4];
            $address=$row[5];
            $location=$row[6];
            $country=$row[7];
            $state=$row[8];
            $city=$row[9];
            $pincode=$row[10];
            $password=$row[11];
            $about=$row[12];
            $fimage=$row[13];
          }


    if(isset($_POST['submit']))
    {
      $con=mysqli_connect('localhost','root','','labor');

      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      $location=$_POST['location'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];
      $password=$_POST['password'];
      $about=$_POST['about'];
      
      $path="./customer_img/";
      
      if($_FILES["fimage"]["name"]!=null)
      {
      $oldimage=$path.$fimage;
      unlink($oldimage);

      $target_file = $path.basename($_FILES["fimage"]["name"]);
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");
      // Check extension  
      $imgSize = $_FILES['fimage']['size'];
      if(in_array($imageFileType,$extensions_arr) )
      {

        if($imgSize < 5000000)   
        {
        $myimg=$firstname.time().$_FILES['fimage']['name'];

        if(move_uploaded_file($_FILES['fimage']['tmp_name'],$path.$myimg))
        {
          echo "insert image";
        }
        
        }
        else{
          echo "Sorry, your file is too large.";
        }
          
        }
        else
        {
          echo "please Select front image file";
        }
        }
        else
        { 
            $myimg=$fimage;
        }

      $qry="update customer set c_firstname='$firstname',c_lastname='$lastname',c_email='$email',c_phone='$phone',c_address='$address',c_location='$location',c_country='$country',c_state='$state',c_city='$city',c_pincode='$pincode',c_password='$password',c_about='$about',c_image='$myimg' where c_id=".$_REQUEST['cid'];
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
          echo "update record into customer table";
          header("location:customeradmin.php");
        }   
        else
        {
          echo "erro not update customer";
        }
    }
  }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
First Name:<input type="text" name="firstname" value="<?php   echo $firstname;?>"><br>
Last Name:<input type="text" name="lastname" value="<?php echo $lastname;?>"><br>
Email:<input type="text" name="email" value="<?php echo $email;?>"><br>
Phone number:<input type="text" name="phone" value="<?php echo $phone;?>"><br>
Address:<input type="text" name="address" value="<?php echo $address;?>"><br>
Location:<input type="text" name="location" value="<?php echo $location;?>"><br>

<div class="select-boxes">
<?php
//Include database configuration file
include('dbConfig.php');
//Get all country data
$query = $con->query("SELECT * FROM country");
//Count total number of rows
$rowCount = $query->num_rows;
?>
Country Name:
<select name="country" id="country">
<option value="">Select Country</option>
<?php

  if($rowCount > 0){

    while($row = $query->fetch_assoc()){

    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Country not available</option>';
  }

?>
</select>
<br>
State Name:
<select name="state" id="state">
<option value="">Select state first</option>
</select>
<br>
City Name:
<select name="city" id="city">
<option value="">Select state first</option>
</select>
</div>

pincode Name:<input type="text" name="pincode" value="<?php echo $pincode;?>"><br>
password Name:<input type="password" name="password" value="<?php echo $password;?>"><br>
about Name:<input type="text" name="about" value="<?php echo $about;?>"><br>
Image Name:<input type="file" name="fimage" value="<?php echo $fimage;?>"><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>