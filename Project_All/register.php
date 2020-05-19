<!DOCTYPE html>
<html>
  <?php include('labor/dbConfig.php'); 
  session_start();
  ?>

<head>
  <title></title>
<!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
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
      <link rel="stylesheet" href="css/linearicons.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/nice-select.css">          
      <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/main.css">

</head>
 <?php
 if(isset($_POST['register']))
 {
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    if($_POST['password']==$_POST['confirmpassword'])
    {
      $password=$_POST['confirmpassword'];
    
     // $qry="insert into customer(c_firstname,c_lastname,c_email,c_phone,c_password,c_date) values(0,'$firstname','$lastname','$email','$phone','$password',NOW())";

   $qry="insert into customer(c_id,c_firstname,c_lastname,c_email,c_phone,c_country,c_state,c_city,c_password,c_date) values(0,'$firstname','$lastname','$email','$phone','5','16','24','$password',NOW());";

    $res=mysqli_query($con,$qry);
        if($res>0)
        {
          echo "insert record into customer table";

         if(!empty($_POST['email']) && !empty($password))
          {
             
            $email=$_POST['email'];

            $qry="select * from customer where c_email='$email' and c_password='$password'";    
           // echo $qry;
               if($res=mysqli_query($con,$qry))
              {
                if(mysqli_num_rows($res)==1)
                {
                    while($row=mysqli_fetch_row($res))
                  {
                    $_SESSION['emailname']=$row[0];
                    //echo $email;
                    header("location:price.php");
                  }
                }
                else
                {
                  header("location:index.php"); 
                  echo "Invalid Uasename or Password..."; 
                }
              }else
              {
                echo "Error while fetch database...";
              }
          }
      
          // header("location:price.php");
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
  <!-- <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3"> -->
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="margin:4%;">

   <!-- <div class="form-group col-md-4 col-md-offset-5 align-center">  -->
  <h4 class="card-header info-color white-text text-center py-4" style="background-color: #17a2b8;color:white;" >

    <div id="logo">
                <img src="img/logo.png" alt="" title="" align="left" />
                  <strong>Sign In</strong>
    </div> 
  </h4>

  <!--Card content-->

<br>
    <!-- Form -->
    <form class="text-center" style="color:#757575;" method="post" enctype="multipart/form-data">

    <p align="left">First Name *
    <input type="text" class="form-control mb-4" placeholder="Enter First name" name="firstname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter First name '" required=""></p>

    <p align="left">Last Name *
    <input type="text" class="form-control mb-4" placeholder="Enter Last name" name="lastname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last name '" required=""></p>
   
    <p align="left">Phone Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Phone Number" name="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" required=""></p>

    <p align="left">Email *
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Enter E-mail" name="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter E-mail'" required=""></p>

    <p align="left">Password *
    <input type="password" class="form-control mb-4" placeholder="Enter Password" name="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password '" required=""></p>

    <p align="left">Confirm Password *
    <input type="password" class="form-control mb-4" placeholder="Enter Confirm password" name="confirmpassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password '" required=""></p>

    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
     At least 6 characters and 1 digit
     </small>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="register">Sign In</button>


      <script src="js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="js/vendor/bootstrap.min.js"></script>      
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="js/easing.min.js"></script>      
      <script src="js/hoverIntent.js"></script>
      <script src="js/superfish.min.js"></script> 
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script> 
      <script src="js/owl.carousel.min.js"></script>      
      <script src="js/jquery.sticky.js"></script>
      <script src="js/jquery.nice-select.min.js"></script>      
      <script src="js/parallax.min.js"></script>    
      <script src="js/mail-script.js"></script> 
      <script src="js/main.js"></script>
      
      <!-- </div> -->
  </div>
<div class="col-sm-4"></div>

</div>

    </form>
    <!-- Form -->

<!-- Material form login -->

</body>
</html>