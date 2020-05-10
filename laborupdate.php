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
    if(isset($_REQUEST['lid']))
      {
          echo $_REQUEST['lid'];
        $con=mysqli_connect("localhost","root","","labor");

        $qry="select * from labor where l_id=".$_REQUEST['lid'];
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
          {
            $foldername=$row[0];
            $firstname=$row[1];
            $lastname=$row[2];
            $gender=$row[3];
            $age=$row[4];
            $email=$row[5];
            $phone=$row[6];
            $aadharno=$row[7];
            $address=$row[8];
            $location=$row[9];
            $country=$row[10];
            $state=$row[11];
            $city=$row[12];
            $pincode=$row[13];
            $password=$row[14];
            $about=$row[15];
            $fimage=$row[16];
            $status=$row[17];
            $charge=$row[18];
            $category=$row[20];
            $leaderid=$row[21];
          }


    if(isset($_POST['submit']))
    {
      $con=mysqli_connect('localhost','root','','labor');

      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $gender=$_POST['gender'];
      $age=$_POST['age'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $aadharno=$_POST['aadharno'];
      $address=$_POST['address'];
      $location=$_POST['location'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];
      $password=$_POST['password'];
      $about=$_POST['about'];
      
      $path="./labor_img/";
      
   if($_FILES["fimage"]["name"]!=null)
      {
      $oldimage=$path.$foldername.'/'.$fimage;
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

                $myimg=time().$_FILES['fimage']['name'];
                echo $myimg;

                $targetpath=$path.$foldername."/".$myimg;
                if(move_uploaded_file($_FILES['fimage']['tmp_name'],$targetpath))
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
            echo "please Select valid extention front image file";
          }
        }
        else
        { 
          $flag=1;
        }

      $status=$_POST['status'];
      $charge=$_POST['charge'];
      $categoryid=$_POST['category'];
      $leaderid=$_POST['leaderid'];

    if($flag==1)
    {  
      $qry="update labor set l_firstname='$firstname',l_lastname='$lastname',l_gender='$gender',l_age='$age',l_email='$email',l_phone='$phone',l_aadharno='$aadharno',l_address='$address',l_location='$location',l_country='$country',l_state='$state',l_city='$city',l_pincode='$pincode',l_password='$password',l_about='$about',l_status='$status',l_charge='$charge',l_categoryid='$categoryid',l_leaderid='$leaderid' where l_id=".$_REQUEST['lid'];
      $flag=0;
    }
    else
    {
      $qry="update labor set l_firstname='$firstname',l_lastname='$lastname',l_gender='$gender',l_age='$age',l_email='$email',l_phone='$phone',l_aadharno='$aadharno',l_address='$address',l_location='$location',l_country='$country',l_state='$state',l_city='$city',l_pincode='$pincode',l_password='$password',l_about='$about',l_image='$myimg',l_status='$status',l_charge='$charge',l_categoryid='$categoryid',l_leaderid='$leaderid' where l_id=".$_REQUEST['lid'];
    }
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
          echo "update record into customer table";
          header("location:laboradmin.php");
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
gender:
<input type="radio" name="gender" value="female" 
<?php if (isset($gender) && $gender=="female") echo "checked";?> >Female
<input type="radio" name="gender" value="male"
<?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
<br>
Age:<input type="text" name="age" value="<?php echo $age;?>"><br>
Email:<input type="text" name="email" value="<?php echo $email;?>"><br>
Phone number:<input type="text" name="phone" value="<?php echo $phone;?>"><br>
Aadhar number:<input type="text" name="aadharno" value="<?php echo $aadharno;?>"><br>
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
      if($country==$row['id']){
         ?>
         <option value="<?php echo $row['id']; ?>" selected><?php echo $row['name']; ?></option>     
        <?php
      }else{
    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
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
<!-- <option value="">Select state first</option> -->
<?php
      $qry="select * from state where s_id='$state'"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
        ?>
        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>         
      <?php
      }   
    ?>
</select>
<br>
City Name:
<select name="city" id="city">
<!-- <option value="">Select city first</option> -->
<?php
      $qry="select * from city where ci_id='$city'"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
        ?>
        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>     
      <?php
      }
?>


</select>
</div>

pincode Name:<input type="text" name="pincode" value="<?php echo $pincode;?>"><br>
password Name:<input type="password" name="password" value="<?php echo $password;?>"><br>
about Name:<input type="text" name="about" value="<?php echo $about;?>"><br>
Image Name:<input type="file" name="fimage" value="<?php echo $fimage;?>"><br>
status:
<input type="radio" name="status" value="available" 
<?php if (isset($gender) && $status=="available") echo "checked";?>
>available
<input type="radio" name="status" value="unavailable" 
<?php if (isset($gender) && $status=="unavailable") echo "checked";?>
>unavailable<br>

charge :<input type="text" name="charge" value="<?php echo $charge;?>"><br>

category Name:
<select name="category">
<!-- <option value="">select category</option> -->
    <?php
      $qry="select * from category"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
        if($category==$row[0])
        {
        ?>
        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>     
        <?php
        }
        else
        {
      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
        }
      }
    ?>
</select>
<br>
leader :<input type="text" name="leaderid" value="<?php echo $leaderid;?>"><br>


<input type="submit" name="submit"><br>
</form>
</body>
</html>