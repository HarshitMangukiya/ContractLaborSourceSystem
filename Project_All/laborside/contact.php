	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<?php include('../Labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['laborname'])){
		// echo "welcome".$_SESSION['laborname'];
}
else
{
	//header("location:index.php");	
}
if(isset($_POST['logout']))
{
	 //session_destroy
		unset($_SESSION['laborname']);
        header("Location:index.php");
}
	 ?>
	<head>
		
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
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		</head>
		<body>
              <form method="post" enctype="multipart/form-data">
			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="../img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <!-- <li><a href="category.php">Category</a></li> -->
				          <!-- <li><a href="price.php">Price</a></li> -->
				          <!-- <li><a href="blog-home.html">Blog</a></li> -->
				          <li><a href="#">Contact</a></li>
				          <li class="menu-has-children"><a href="#">Pages</a>
				            <ul>
								<!-- <li><a href="elements.html">elements</a></li> -->
								<!-- <li><a href="search.php">search</a></li> -->
								<li><a href="customerprofile.php">single</a></li>
				            </ul>
				          </li>
				          
				          &nbsp &nbsp	
				          <?php
				          
				          $lid='';				          
				          if(isset($_SESSION['laborname']))
				          {
				          	$lid=$_SESSION['laborname'];
				          	$qry="select * from labor where l_id='$lid'";
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								$folder=$row[0];
								$name=$row[1]." ".$row[2];
								if(empty($row[16]))
								{
									$imagename="../img/avatar-13.jpg";
								}
								else
								{
									$imagename="../Labor/labor_img/".$row[0].'/'.$row[16];
								}

								$status=$row[17];
							    if($status=='available')
						        {
						       		$color='green';
						   	    	$status1='available';
						        }
						   	    else
						   	    {
						      		$color='red';
						   	   		$status1='unavailable';			    	  
						    	}					
							}
				          	?>
				          	<li class="menu-has-children"><a href="profile.php"><img style="max-width:100%;border-radius:4px; position:relative; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); border:1px solid; " src="<?php echo $imagename; ?>" width="40" height="40" alt="" ></a>
				            <ul>
								<li>Signed in as</li>
								<li><a href="profile.php"><?php echo $name;?></a></li>
								<div class="dropdown-divider"></div>
								<li><a href="profile.php">Your Profile</a></li>
								<!-- <li><a href="#">Your Order</a></li> -->
								<div class="dropdown-divider"></div>
								<li><input type="submit" class="ticker-btn" name="logout" value="Logout"></li>
				            </ul>
				          </li>

                            <!-- Job Status logic --> 
					    	<?php
			                
					    	if(isset($_POST['currentstatus']))
					    	{
							  $status1=$_POST['currentstatus'];


					    	   if($status1=='available')
					    	   {
					    	   	$color='red';
					    	   $status1='unavailable';
					    	   }
					    	   else
					    	   {
					    	   	$color='green';
					    	   	 $status1='available';			    	  
					    	   }


						    	$qry="update labor set l_status='$status1' where l_id='$lid'";
						    	// echo $qry;
						        $res=mysqli_query($con,$qry);
						        if($res>0)
						        {
						          //echo "update record into customer table";
						        	header("location:contact.php");
						   			exit;
						        }   
						        else
						        {
							        echo "erro not update customer";
						        }

						    }
					    	?>

				          <li>
				          	<p style="color:white;margin-left:8px;">Job Status</p>
				          	<button type="submit" name="currentstatus" value="<?php echo $status1;?>" style="width:90px;height:30px;background-color:<?php echo $color;?>;color:white;border-width:1px;border-radius:5px;border:1px solid;position:relative; box-shadow:0 5px 20px rgba(0,0,0,0.2); ">
				          	<?php echo $status1;?></button>
				          </li>	
				          	<!-- <li><input type="submit" class="ticker-btn" name="logout" value="Logout"></li> -->
				          <?php
				          }
				          else
				          {?>
				          <li><a class="ticker-btn" href="laborregister.php">Signup</a></li>
				          <li><button type="button" class="ticker-btn" data-toggle="modal" data-target="#myModal" style="border-width:0px;">Login</button></li>
       					  

				          <!-- <li><a class="ticker-btn" href="laborlogin.php">Login</a></li> -->
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
		        <img src="../img/logo.png" alt="" title="" align="left" />
		    </div> 
	        <!-- <div class="modal-header"> -->
	          <button type="button" class="close" data-dismiss="modal" style="color:black;">&times;</button>
	        <!-- </div> -->
        </h4>
        <hr>
        <?php
			if(isset($_POST['login']))
			{
			  if(!empty($_POST['phone']) && !empty($_POST['password']))
			  {
			     
			    $phone=$_POST['phone'];
			    $password=$_POST['password'];

			    $qry="select * from labor where l_phone='$phone' and l_password='$password' and l_dflag<>'1'";   
			    
			   //echo $qry;
			       if($res=mysqli_query($con,$qry))
			      {
			        if(mysqli_num_rows($res)==1)
			        {
			            while($row=mysqli_fetch_row($res))
			          {
			            $_SESSION['laborname']=$row[0];
			            header("location:index.php"); 
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
			}
        ?>
    
    <div class="modal-body">

    <p align="left">Contact Number *
    <input type="text" id="phone1" class="form-control mb-4" name="phone" placeholder="Enter Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'"></p>
    <span id="error_phone1" class="text-danger"></span>

    <!-- Password -->
    <p align="left">Password *
    <input type="password" id="password1" class="form-control mb-4" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" ></p>
    <span id="error_password1" class="text-danger"></span>
  <div class="d-flex justify-content-around">

          <a href="forgetpassword.php">Forgot password</a>
</div>
      <!-- <div class="d-flex justify-content-around"> -->
        <!-- <div>
           Remember me 
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div>
        </div> -->
        <!-- <div> -->
          <!-- Forgot password -->
        <!--   <a href="#">Forgot password?</a>
        </div>
      </div> -->

        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="login" id="login1">Log In</button>

        <p align="center">Don't Have An Account ?
	    <a href="laborregister.php">Sign up!</a>
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
<!-- login End -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
						<div class="col-lg-4 d-flex flex-column">
							<!-- <a class="contact-btns" href="#">Submit Your CV</a>
							<a class="contact-btns" href="#">Post New Job</a>
							<a class="contact-btns" href="#">Create New Account</a> -->
							<h3>Contact Us</h3>
							<p>Help us to make JobListing.com better, provide us with your suggestions and comments. Your comments will be forwarded to the appropriate editors.</p>
							<h5 style="margin-bottom:3px;">Address</h5>
							Katargam,Surat-395004,india.
							<br>
							<h5 style="margin-bottom:3px;">Email</h5>
							jobListing@gmail.com.
							<br>
							<h5 style="margin-bottom:3px;">Phone no.</h5>
							8160119895
							
						</div>
						
						<?php

						if(isset($_POST['send']))
						{
							include('autoload.php');

    						
        
						        $name =$_POST['name'];
						        $email =$_POST['email'];
						        $subject =$_POST['subject'];
						        $body =$_POST['message'];

						        require_once "PHPMailer/PHPMailer.php";
						        require_once "PHPMailer/SMTP.php";
						        require_once "PHPMailer/Exception.php";

						        // $mail = new PHPMailer();

						   		$mail = new PHPMailer\PHPMailer\PHPMailer();

						        //SMTP Settings
						        $mail->isSMTP();
						        $mail->Host = "smtp.gmail.com";
						        $mail->SMTPAuth = true;
						        $mail->Username = "mangukiyaharshit@gmail.com";
						        $mail->Password = 'harshit2211';
						        $mail->Port = 465; //587
						        $mail->SMTPSecure = "ssl"; //tls

						        //Email Settings
						        $mail->isHTML(true);
						        $mail->setFrom($email,$name);
						        $mail->addAddress('mangukiyaharshit@gmail.com');
						        $mail->Subject = $subject;
						        $mail->Body = $body;

						        if ($mail->send()) {
						            $status = "success";
						            // $response = "Email is sent!";
						            // echo $status;
						        } else {
						            $status = "failed";
						            // echo $status;
						            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
						        }

						}

						?>

    

						<div class="col-lg-8">
							<form class="form-area" class="contact-form text-right">
								<div class="row">	
									<div class="col-lg-12 form-group">
										<p>Name *
										<input name="name" id="name4" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" type="text"><span id="error_name4" class="text-danger"></span>
									</p>
    									

										<p>Email *
										<input name="email" id="email4" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" type="email">
    									<span id="error_email4" class="text-danger"></span>

										</p>

										
										<p>Subject *
										<input name="subject" id="subject4" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" type="text">
    									<span id="error_subject4" class="text-danger"></span>

										</p>

										
										<p>Messege *
										<textarea class="common-textarea mt-10 form-control" id="body4" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" ></textarea><br>

    									<span id="error_body4" class="text-danger"></span>
										</p>



										<button class="ticker-btn" style="float:center;border-width:0px;" name='send' id='send' >Send Message</button>
										

										<div class="mt-20 alert-msg" style="text-align: left;"></div>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
			
	
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>QUICK LINKS</h6>
								<ul class="footer-nav">
									<li><a href="index.php">Home</a></li>
									<li><a href="about-us.php">About Us</a></li>
									<li><a href="laborregister.php">Sign Up</a></li>
									<!-- <li><a href="category.php">Category</a></li> -->
									<!-- <li><a href="price.php">Price</a></li> -->
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
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
									<li><img src="../img/i1.jpg" alt=""></li>
									<li><img src="../img/i2.jpg" alt=""></li>
									<li><img src="../img/i3.jpg" alt=""></li>
									<li><img src="../img/i4.jpg" alt=""></li>
									<li><img src="../img/i5.jpg" alt=""></li>
									<li><img src="../img/i6.jpg" alt=""></li>
									<li><img src="../img/i7.jpg" alt=""></li>
									<li><img src="../img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><!-- 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
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

			<script src="../js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
			<script src="../js/login.js"></script>
			<script src="../js/contactvalidate.js"></script>


			</form>	
		</body>
	</html>



