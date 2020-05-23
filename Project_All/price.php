	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<?php include('labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['emailname'])){
		echo "welcome".$_SESSION['emailname'];
}
else
{
	//header("location:login.php");	
}
if(isset($_POST['logout']))
{
	 //session_destroy
		unset($_SESSION['emailname']);
        header("Location:index.php");
}
	 ?>
	<head>
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
		<body>
			<form method="post" enctype="multipart/form-data" action="index.php">
			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <li><a href="category.php">Category</a></li>
				          <li><a href="#">Price</a></li>
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
				          <li><a class="ticker-btn" href="register">Signup</a></li>
				          <li><button type="button" class="ticker-btn" data-toggle="modal" data-target="#myModal" style="border-width:0px;">Login</button></li>				        <?php	
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
			 if(!empty($_POST['email']) && !empty($_POST['password']))
			  {
			     
			    $email=$_POST['email'];
			    $password=$_POST['password'];

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

    <p align="left">Email *
    <input type="email" id="email" class="form-control mb-4" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"></p>
    <span id="error_email" class="text-danger"></span>

    <!-- Password -->
    <p align="left">Password *
    <input type="password" id="password" class="form-control mb-4" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" ></p>
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


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
						
								Pricing Plan				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Pricing Plan</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start price Area -->

			<section class="price-area section-gap" id="price">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Choose the best pricing for you</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
			<!-- 		<?php
					// $day='';
					// $enddate='';
					// $startdate='';
					if(!empty($_SESSION['emailname']))
					{
						if(isset($_POST['submit']))
						{
					  	    $qry="select * from payment where p_customerid='$cid'";
							// echo $qry;
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								$price=$row[3];
								$startdate=$row[4];
								if($price==39)
								{
									$day=30;
								}
								else if($price==69)
								{
									$day=90;
								}
								else if($price==99)
								{
									$day=360;			
								}

							}

							// echo 'day ='.$day;
							$enddate=date("Y-m-d",strtotime(date("Y-m-d",strtotime($startdate))."+$day day"));


							// if(date("Y-m-d")<$enddate)
							// {
							// 	echo "membership is not expired";

						  	    $customerid=$cid;
							    $method='online'; 
								$totalpayment='39';	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment',NOW())";
		                        // echo $qry;
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									// echo "insert record into payment table";
								    // header("location:index.php");
								}		
								else
								{
									echo "erro not insert payment";
								}
								// }
							// else
							// {
							// 	echo "membership is expired";
							// }
						}
						if(isset($_POST['submit1']))
						{
					  	   $qry="select * from payment where p_customerid='$cid'";
							// echo $qry;
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								$price=$row[3];
								$startdate=$row[4];								
								if($price==39)
								{
									$day=30;
								}
								else if($price==69)
								{
									$day=90;
								}
								else if($price==99)
								{
									$day=360;			
								}
							}

							// echo 'day ='.$day;
							$enddate=date("Y-m-d",strtotime(date("Y-m-d",strtotime($startdate))."+$day day"));
							// echo $enddate;
							// echo $startdate;
							// if(date("Y-m-d")<$enddate)
							// {
							// 	echo "membership is not expired";

						  	    $customerid=$cid;
							    $method='online'; 
								$totalpayment='69';	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment',NOW())";
		                        // echo $qry;
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									// echo "insert record into payment table";
								    // header("location:index.php");
								}		
								else
								{
									echo "erro not insert payment";
								}
								// }
							// else
							// {
							// 	echo "membership is expired";
							// }
						}
						if(isset($_POST['submit2']))
						{
					  	    $qry="select * from payment where p_customerid='$cid'";
							// echo $qry;
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								$price=$row[3];
								$startdate=$row[4];								
								if($price==39)
								{
									$day=30;
								}
								else if($price==69)
								{
									$day=90;
								}
								else if($price==99)
								{
									$day=360;			
								}
							}

							// echo 'day ='.$day;
							$enddate=date("Y-m-d",strtotime(date("Y-m-d",strtotime($startdate))."+$day day"));
							// echo $enddate;
							// echo $startdate;
							// if(date("Y-m-d")<$enddate)
							// {
							// 	echo "membership is not expired";

						  	    $customerid=$cid;
							    $method='online'; 
								$totalpayment='99';	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment',NOW())";
		                        // echo $qry;
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									// echo "insert record into payment table";
								    // header("location:index.php");
								}		
								else
								{
									echo "erro not insert payment";
								}
								// }
							// else
							// {
							// 	echo "membership is expired";
							// }
						}
					}
					else
					{
						// header("location:index.php");
					}
					?> -->
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Real basic</h4>
								</div>
								<ul class="lists">
									<li>2.5 GB Space</li>
									<li>Secure Online Transfer</li>
									<li>Unlimited Styles</li>
									<li>Customer Service</li>
								</ul>
								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<!-- <p class="address"><span class="lnr lnr-database"></span> &#x20a8; 500</p> -->
										<span class="price">$</span><h1> 39 </h1><span class="time">Per <br> Month</span>
									</div>
									<!-- <a href="#" class="primary-btn header-btn">Get Started</a> -->
									<input type="submit" name="package1" value="Get started" class="primary-btn header-btn" onclick="return confirm('Are you sure you want to buy this package ?')?true:false;" >
								</div>
								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Real Standred</h4>
								</div>
								<ul class="lists">
									<li>10 GB Space</li>
									<li>Secure Online Transfer</li>
									<li>Unlimited Styles</li>
									<li>Customer Service</li>
								</ul>
								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<span class="price">$</span><h1> 69 </h1><span class="time">Per Six<br> Month</span>
									</div>
									<!-- <a href="#" class="primary-btn header-btn">Get Started</a> -->
							        <input type="submit" name="package2" value="Get started" class="primary-btn header-btn" onclick="return confirm('Are you sure you want to buy this package ?')?true:false;">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Real Ultimate</h4>
								</div>
								<ul class="lists">
									<li>Unlimited Space</li>
									<li>Secure Online Transfer</li>
									<li>Unlimited Styles</li>
									<li>Customer Service</li>
								</ul>
								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<span class="price">$</span><h1> 99 </h1><span class="time">Per <br>Year</span>
									</div>
									<!-- <a href="#" class="primary-btn header-btn">Get Started</a> -->
								    <input type="submit" name="package3" value="Get started" class="primary-btn header-btn" onclick="return confirm('Are you sure you want to buy this package ?')?true:false;">
								</div>
							</div>				
						</div>								
					</div>
				</div>	
			</section>
			<!-- End price Area -->		

			<!-- Start feature Area -->
		<!-- 	<section class="feature-area">
				<div class="container-fluid">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-3 feat-img no-padding">
							<img class="img-fluid" src="img/pages/f1.jpg" alt="">
						</div>
						<div class="col-lg-3 no-padding feat-txt">
							<h6 class="text-uppercase text-white">Basic & Common Repairs</h6>
							<h1>Who we are</h1>
							<p>
								Computer users and programmers have become so accustomed to using Windows, even for the changing capabilities and the appearances of the graphical.
							</p>
						</div>
						<div class="col-lg-3 feat-img no-padding">
							<img class="img-fluid" src="img/pages/f2.jpg" alt="">							
						</div>
						<div class="col-lg-3 no-padding feat-txt">
							<h6 class="text-uppercase text-white">Basic & Common Repairs</h6>
							<h1>What we do</h1>
							<p>
								Computer users and programmers have become so accustomed to using Windows, even for the changing capabilities and the appearances of the graphical.
							</p>
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End feature Area -->

			<!-- Start submit Area -->
			<!-- <section class="submit-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="submit-left">
								<h4>Submit Your Resume Today</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
								</p>
								<a href="#" class="primary-btn header-btn">Submit Your CV</a>	
							</div>
						</div>
						<div class="col-lg-6 ">
							<div class="submit-right">
								<h4>Submit a New Job Now!</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
								</p>
								<a href="#" class="primary-btn header-btn">Post a Job</a>		
							</div>			
						</div>

					</div>
				</div>	
			</section> -->
			<!-- End submit Area -->
			
			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
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
			<script src="js/login.js"></script>	
		</form>
		</body>
	</html>



