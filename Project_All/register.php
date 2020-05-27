<!DOCTYPE html>
<html>
  <?php include('labor/dbConfig.php'); 
  session_start();
  if(isset($_SESSION['emailname']))
  {
    header("location:index.php");        
  }
  else
  {
    // header("location:index.php");
  }
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <style type="text/css">
        div.gallery{
        /*border: 1px solid #777;*/
        max-width:100%;
        border-radius:5px;
        position:relative; 
        z-index:1;
        /*box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px;*/ 
        box-shadow: 2px 10px 20px 1px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      </style>

<script src="Labor/jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'Labor/ajaxdata.php',

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

        url:'Labor/ajaxdata.php',

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
 if(isset($_POST['register']))
 {

    $firstname=ucfirst($_POST['firstname']);
    $lastname=ucfirst($_POST['lastname']);
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $password=$_POST['confirmpassword'];
// echo $email;
//     echo $password;
//     echo $phone;
     // $qry="insert into customer(c_firstname,c_lastname,c_email,c_phone,c_password,c_date) values(0,'$firstname','$lastname','$email','$phone','$password',NOW())";

   $qry="insert into customer(c_id,c_firstname,c_lastname,c_email,c_phone,c_country,c_state,c_city,c_password,c_date) values(0,'$firstname','$lastname','$email','$phone','$country','$state','$city','$password',NOW());";
  // echo $qry;
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
                  echo "<script> window.location.href='index.php';</script>";
                  
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
    ?>
<body style="overflow-x:hidden;">


    <form method="post" enctype="multipart/form-data">

        <header id="header" id="home" style="background-color:black;">
          <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
              <div id="logo">
                <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
              </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="#">Home</a></li>
                  <li><a href="about-us.php">About Us</a></li>
                  <li><a href="category.php">Category</a></li>
                  <li><a href="price.php">Price</a></li>
                  <!-- <li><a href="blog-home.html">Blog</a></li> -->
                  <li><a href="contact.php">Contact</a></li>
                  <li class="menu-has-children"><a href="#">Pages</a>
                    <ul>
                <!-- <li><a href="elements.html">elements</a></li> -->
                <li><a href="search.php">search</a></li>
                <li><a href="single.php">single</a></li>
                    </ul>
                  </li>
                 &nbsp &nbsp  
                  <?php
                  if(isset($_SESSION['emailname']))
                  {
                    $cid=$_SESSION['emailname'];
                    $qry="select * from customer where c_id='$cid'";
              $res=mysqli_query($con,$qry);
              while($row=mysqli_fetch_row($res))
              {
                $name=$row[1]." ".$row[2];
                // $imagename=$row[13];
                $startdate=$row[14];
                // echo $startdate;
                if(empty($row[13]))
                {
                  $imagename="img/avatar-13.jpg";
                }
                else
                {
                  $imagename="Labor/customer_img/".$row[13];
                }
              }
                    ?>
                    <li class="menu-has-children"><a href="profile.php"><img style="max-width:100%;border-radius:4px; position:relative; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); border:1px solid; " src="<?php echo $imagename; ?>" width="40" height="40" alt="" ></a>
                    <ul>
                <li>Signed in as</li>
                <li><a href="profile.php"><?php echo $name;?></a></li>
                <div class="dropdown-divider"></div>
                <li><a href="profile.php">Your Profile</a></li>
                <li><a href="hiredlabor.php">Your Order</a></li>
                <div class="dropdown-divider"></div>
                <li><input type="submit" class="ticker-btn" name="logout" value="Logout"></li>
                    </ul>
                  </li>
                    <!-- <li><input type="submit" class="ticker-btn" name="logout" value="Logout"></li> -->
                  <?php
                  }
                  else
                  {?>
                  <li><a class="ticker-btn" href="register.php">Signup</a></li>
                  <li><button type="button" class="ticker-btn" data-toggle="modal" data-target="#myModal" style="border-width:0px;">Login</button></li>

                  <?php 
                  }
                  ?>
                  
               </ul>
              </nav><!-- #nav-menu-container -->            
            </div>
          </div>
        </header><!-- #header -->

<!-- login page -->
<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <h4 class="card-header info-color white-text text-center py-4" style="background-color: #17a2b8;color:white;" >
        <div id="logo">
            <img src="img/logo.png" alt="" title="" align="left" />
        </div> 
          <!-- <div class="modal-header"> -->
            <button type="button" class="close" data-dismiss="modal" style="color:black;">&times;</button>
          <!-- </div> -->
        </h4>
        <hr>
        <?php
      if(isset($_POST['login']))
      {
       if(!empty($_POST['email4']) && !empty($_POST['password4']))
        {
           
          $email=$_POST['email4'];
          $password=$_POST['password4'];

          $qry="select * from customer where c_email='$email' and c_password='$password'";    
         echo $qry;
             if($res=mysqli_query($con,$qry))
            {
              if(mysqli_num_rows($res)==1)
              {
                  while($row=mysqli_fetch_row($res))
                {
                  $_SESSION['emailname']=$row[0];
                  // echo $email;
                 // header("location:index.php"); 
                    echo "<script> window.location.href='index.php';</script>";
              // echo "<script>swal('Good job!', 'Login Successful.', 'success');</script>";


                }
              }
              else
              {
                // header("location:index.php"); 
                    echo "<script> window.location.href='index.php';</script>";
          // echo "<script>swal('Invalid Uasename or Password...');</script>";
                    

                echo "Invalid Uasename or Password..."; 
              }
            }else
            {
              echo "Error while fetch database...";
            }
        }
      }
        ?>
    
    <div class="modal-body">

    <p align="left">Email *
    <input type="email" id="email" class="form-control mb-4" name="email4" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"></p>
    <span id="error_email" class="text-danger"></span>

    <!-- Password -->
    <p align="left">Password *
    <input type="password" id="password" class="form-control mb-4" name="password4" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" ></p>
    <span id="error_password" class="text-danger"></span>


      <div class="d-flex justify-content-around">
        <!-- <div>
           Remember me 
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div>
        </div> -->
        <div>
          <!-- Forgot password -->
          <a href="#">Forgot password?</a>
        </div>
      </div>

        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="login" id="login">Log In</button>

        <p align="center">Don't Have An Account ?
      <a href="register.php">Sign up!</a>
      </p>

      <p align="center">Are you labor ?
        <a href="laborside/index.php">Login</a>
        </p>

        </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              Register
        </div> -->
      </div>
      
    </div>
  </div>  
</div>
<!-- login page end -->




  <!-- Material form login -->
  <div class="row" style="margin-right:30px;margin-top:4%;">
  <!-- <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3"> -->
  <div class="col-sm-4"></div>  
<div class="col-sm-4 gallery" style="margin:4%;" >

  <!-- <div class="form-group col-md-4 col-md-offset-5 align-center">  -->
  <div class="gallery" style="margin-top:15px;">
    <h4 class="card-header info-color white-text text-center py-4 " style="background-color: #17a2b8;color:white;border-radius:5px;" >

      <div id="logo">
        <img src="img/logo.png" alt="" title="" align="left" />
        <strong>Sign Up</strong>
      </div> 
    </h4>
  </div>
  <!--Card content-->

    <br>
    <!-- Form -->
    <form class="text-center" style="color:#757575;" method="post" enctype="multipart/form-data">

    <p align="left">First Name *
    <input type="text" class="form-control mb-4" placeholder="Enter First name" id="firstname" name="firstname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter First name '" ></p>
    <span id="error_firstname" class="text-danger"></span>

    <p align="left">Last Name *
    <input type="text" class="form-control mb-4" placeholder="Enter Last name" id="lastname" name="lastname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last name '" ></p>
    <span id="error_lastname" class="text-danger"></span>

   
    <p align="left">Phone Number *
    <input type="text" class="form-control mb-4" placeholder="Enter Phone Number" id="phone" name="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" ></p>
    <span id="error_phone" class="text-danger"></span>


    <p align="left">Email *
    <input type="email" class="form-control mb-4" placeholder="Enter E-mail" id="email2" name="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter E-mail'" ></p>
    <span id="error_email2" class="text-danger"></span>


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
    <span id="error_country2" class="text-danger"></span>


<p align="left">State Name:
<select name="state" id="state" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select>
</p>
<span id="error_state2" class="text-danger"></span>

<p align="left">City Name:
<select name="city" id="city" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select></p>
<span id="error_city2" class="text-danger"></span>

</div>
<br>


    <p align="left">Password *
    <input type="password" class="form-control mb-4" placeholder="Enter Password" id="password2" name="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password '"></p>
    <span id="error_password2" class="text-danger"></span>


    <p align="left">Confirm Password *
    <input type="password" class="form-control mb-4" placeholder="Enter Confirm password" id="confirmpassword" name="confirmpassword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password '"></p>
    <span id="error_confirmpassword" class="text-danger"></span>


    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
     At least 6 characters and 1 digit and 1 special character (Ex:@#$&*!)
     </small>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="register" id="signup">Sign Up</button>
</div>

      <div class="col-sm-4"></div>
      </div>
    </form>


      <!-- Start callto-action Area -->
      <section class="callto-action-area section-gap" id="join">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-9">
              <div class="title text-center">
                <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <a class="primary-btn" href="register.php">I am a Customer</a>
                <a class="primary-btn" href="laborside/laborregister.php">I am a Labor</a>
              </div>
            </div>
          </div>  
        </div>  
      </section>
      <!-- End calto-action Area -->


      <!-- start footer Area -->    
      <footer class="footer-area section-gap">
        <div class="container">
          <div class="row">
            <div class="col-lg-3  col-md-12">
              <div class="single-footer-widget">
                <h6>Top Products</h6>
                <ul class="footer-nav">
                  <li><a href="#">Managed Website</a></li>
                  <li><a href="#">Manage Reputation</a></li>
                  <li><a href="#">Power Tools</a></li>
                  <li><a href="#">Marketing Service</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6  col-md-12">
              <div class="single-footer-widget newsletter">
                <h6>Newsletter</h6>
                <p>You can trust us. we only send promo offers, not a single spam.</p>
                <div id="mc_embed_signup">
                  <form target="_blank" novalidate="true" method="get" class="form-inline">

                    <div class="form-group row" style="width: 100%">
                      <div class="col-lg-8 col-md-12">
                        <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" type="email">
                        <div style="position: absolute; left: -5000px;">
                          <!-- <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text"> -->
                        </div>
                      </div> 
                    
                      <div class="col-lg-4 col-md-12">
                        <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                      </div> 
                    </div>    
                    <div class="info"></div>
                  </form>
                </div>    
              </div>
            </div>
            <div class="col-lg-3  col-md-12">
              <div class="single-footer-widget mail-chimp">
                <h6 class="mb-20">Instragram Feed</h6>
                <ul class="instafeed d-flex flex-wrap">
                  <li><img src="img/i1.jpg" alt=""></li>
                  <li><img src="img/i2.jpg" alt=""></li>
                  <li><img src="img/i3.jpg" alt=""></li>
                  <li><img src="img/i4.jpg" alt=""></li>
                  <li><img src="img/i5.jpg" alt=""></li>
                  <li><img src="img/i6.jpg" alt=""></li>
                  <li><img src="img/i7.jpg" alt=""></li>
                  <li><img src="img/i8.jpg" alt=""></li>
                </ul>
              </div>
            </div>            
          </div>

          <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-behance"></i></a>
            </div>
          </div>
        </div>
      </footer>
      <!-- End footer Area -->  


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
      <script src="js/signup.js"></script>
      <script src="js/login.js"></script>      

</form>
</body>
</html>