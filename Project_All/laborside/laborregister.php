<!DOCTYPE html>
<html>
  <?php include('../labor/dbConfig.php'); 
  session_start();
  
    if(isset($_SESSION['laborname'])){
      echo "welcome".$_SESSION['laborname'];
      header("location:index.php"); 
    }
    else
    {
      //header("location:index.php"); 
    }
  
  ?>

<head>
  <title></title>
<!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Job Listing</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
      <!--
      CSS
      ============================================= -->
      <link rel="stylesheet" href="../css/linearicons.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/magnific-popup.css">
      <link rel="stylesheet" href="../css/nice-select.css">          
      <link rel="stylesheet" href="../css/animate.min.css">
      <link rel="stylesheet" href="../css/owl.carousel.css">
      <link rel="stylesheet" href="../css/main.css">

<script src="../Labor/jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'../Labor/ajaxdata.php',

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

        url:'../Labor/ajaxdata.php',

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
<script type="text/javascript">
  function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
</script>


</head>
 <?php
 if(isset($_POST['register']))
 {

      $qry="SELECT `AUTO_INCREMENT` as id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'labor' AND TABLE_NAME ='labor'";
      
      $res=mysqli_query($con,$qry);
      $path="../Labor/labor_img/";

      while($row=mysqli_fetch_array($res))  
      {
        $folder=$row['id'];
      }

      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $gender=$_POST['gender'];
      $age=$_POST['age'];
      $phone=$_POST['phone'];
      $aadharno=$_POST['aadharno']; 
      $address=$_POST['address'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];

      $status='available';
      $charge=$_POST['charge'];
      $category=$_POST['category'];
      // $leaderid=$_POST['leaderid'];
      
      if(!empty($_POST['leaderid']))
      {
        if(isset($_POST['leaderid']))
        {     
            $le=$_POST['leaderid'];
            $qry="select * from labor where l_id='$le'"; 
            $res=mysqli_query($con,$qry);
            if(mysqli_num_rows($res)==1)
            {
             $leaderid=$_POST['leaderid'];  
            }
            else
            {
              echo "Enter the another Leader Id"; 
            }
        }
      }

     // $qry="insert into customer(c_firstname,c_lastname,c_email,c_phone,c_password,c_date) values(0,'$firstname','$lastname','$email','$phone','$password',NOW())";
   if($_POST['password']==$_POST['confirmpassword'])
   {
        $password=$_POST['confirmpassword'];
        $errpassword="";

    $qry="insert into labor(l_id,l_firstname,l_lastname,l_gender,l_age,l_phone,l_aadharno,l_address,l_country,l_state,l_city,l_pincode,l_password,l_status,l_charge,l_date,l_categoryid,l_leaderid) values(0,'$firstname','$lastname','$gender','$age','$phone','$aadharno','$address','$country','$state','$city','$pincode','$password','$status','$charge',NOW(),'$category','$leaderid')";
// echo $qry;
     $res=mysqli_query($con,$qry);
        if($res>0)
        {

          if(!is_dir($path.$folder))
          {
            mkdir($path.$folder);
          }     
        echo "insert record into customer table";
        header("location:index.php");
        }   
        else
        {
          echo "erro not insert customer";
        }
    }
    else
    { 
      echo "Enter the same password";
    }
    
}
    ?>

<body style="overflow-x:hidden;">
 
 <!-- Material form login -->
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
  <h4 class="card-header info-color white-text text-center py-4" style="background-color: #17a2b8;color:white;" >

    <div id="logo">
    <img src="../img/logo.png" alt="" title="" align="left" />
    <strong>Labor&nbsp Sign In</strong>
    </div> 
  </h4>
  <!--Card content-->
<br>
    <!-- Form -->
    <form class="text-center" style="color:#757575;" method="post" enctype="multipart/form-data" >
    <p align="left">First Name *   
    <input type="text" class="form-control mb-4" placeholder="Enter First name" name="firstname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter First name '" required=""></p>

    <p align="left">Last Name *
    <input type="text" class="form-control mb-4" placeholder="Enter Last name" name="lastname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last name '" required=""></p>
<div class="form-control mb-4">
    gender: 
    <input type="radio" name="gender" value="female"> Female
    <input type="radio" name="gender" value="male"> male
    &nbsp&nbsp&nbsp&nbsp
    Age:
    <input type="text" class="col-sm-4" placeholder="Enter Age" name="age" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Age '" required="" style="border-radius:4px;border-width:1px;">
</div>

    <p align="left">Contact Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Phone Number" name="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" required=""></p>

    <p align="left">Aadhar Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Aadhar Number" name="aadharno" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Aadhar Number'" required=""></p>
    
    <p align="left">Address Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Address" name="address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" required=""></p>

<div class="form-control col-sm-12">
<?php

$query = $con->query("SELECT * FROM country");

//Count total number of rows

$rowCount = $query->num_rows;

?>
<p align="left">Country Name:
<select name="country" id="country" style="border-radius:4px;border-width:1px;">

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
</p>

<p align="left">State Name:
<select name="state" id="state" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select>
</p>
<p align="left">City Name:
<select name="city" id="city" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select></p>
</div>
<br>

<div class="form-control col-sm-12">
<p align="left">Select Category:
<select name="category" style="border-radius:4px;border-width:1px;">
<option value disabled selected>select category</option>
    <?php
      $qry="select * from category"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {

      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
      }
    ?>
</select>
</p>
</div>
<br>
    <p align="left">Pincode Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Pincode Number" name="pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Pincode Number '" required=""></p>

    <p align="left">Your Per Day Charge *
    <input type="text" class="form-control mb-4" placeholder="Enter Your Charge" name="charge" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Charge '" required=""></p>

    <!-- Password -->
    <p align="left">Password *
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Enter Password" name="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password '" required=""></p>

    <p align="left">Confirm Password *
    <input type="password" class="form-control mb-4" placeholder="Enter Confirm password" name="confirmpassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password '" required=""></p>

    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
     At least 6 characters and 1 digit
     </small>

    <label for="chkPassport">
    <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
    Do you have Leader id?
    </label>
    <hr>
    <div id="dvPassport" style="display: none">
    
    <p align="left">Leader Id *
    <input type="text" class="form-control mb-4" placeholder="Enter Leader Id" name="leaderid" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Leader Id'"></p>
    </div>
   
      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="register">Sign In</button>


      <script src="../js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="../js/vendor/bootstrap.min.js"></script>      
      <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> -->
      <script src="../js/easing.min.js"></script>      
      <script src="../js/hoverIntent.js"></script>
      <script src="../js/superfish.min.js"></script> 
      <script src="../js/jquery.ajaxchimp.min.js"></script>
      <script src="../js/jquery.magnific-popup.min.js"></script> 
      <script src="../js/owl.carousel.min.js"></script>      
      <script src="../js/jquery.sticky.js"></script>
      <script src="../js/jquery.nice-select.min.js"></script>      
      <script src="../js/parallax.min.js"></script>    
      <script src="../js/mail-script.js"></script> 
      <script src="../js/main.js"></script>
      
      <!-- </div> -->
  </div>
<div class="col-sm-4"></div>

</div>

    </form>
    <!-- Form -->

<!-- Material form login -->

</body>
</html>