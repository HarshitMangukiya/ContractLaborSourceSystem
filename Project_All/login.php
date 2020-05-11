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
if(isset($_POST['login']))
{
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
     
    $email=$_POST['email'];
    $password=$_POST['password'];

    $qry="select * from customer where c_email='$email' and c_password='$password'";    
   //echo $qry;
       if($res=mysqli_query($con,$qry))
      {
        if(mysqli_num_rows($res)==1)
        {
            while($row=mysqli_fetch_row($res))
          {
            $_SESSION['emailname']=$row[0];
            //echo $email;
           header("location:index.php"); 

          }
        }
        else
        {
          header("location:login.php"); 
          echo "Invalid Uasename or Password..."; 
        }
      }else
      {
        echo "Error while fetch database...";
      }
  }
}
    ?>
<body>
  <!-- Material form login -->
<div class="card">

  <h4 class="card-header info-color white-text text-center py-4" style="background-color: #17a2b8;color:white;" >

    <div id="logo">
                <img src="img/logo.png" alt="" title="" align="left" />
                  <strong>Log In</strong>
    </div> 
  </h4>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">
<br>
    <!-- Form -->
    <form class="text-center" style="color:#757575;" action="#!" method="post" enctype="multipart/form-data">

      <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'"  required="">


      <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div>
        </div>
        <div>
          <!-- Forgot password -->
          <a href="">Forgot password?</a>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="login">Log In</button>

      <!-- Register -->
      <p>Not a member?
        <a href="register.php">Register</a>
      </p>

      <!-- Social login -->
      <p>or sign in with:</p>
      <a type="button" class="btn-floating btn-fb btn-sm">
        <i class="fa fa-facebook"></i>
      </a>
      <a type="button" class="btn-floating btn-tw btn-sm">
        <i class="fa fa-twitter"></i>
      </a>
      <a type="button" class="btn-floating btn-li btn-sm">
        <i class="fa fa-dribbble"></i>
      </a>
      <a type="button" class="btn-floating btn-git btn-sm">
        <i class="fa fa-github"></i>
      </a>

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

  </div>

</div>

    </form>
    <!-- Form -->

<!-- Material form login -->

</body>
</html>