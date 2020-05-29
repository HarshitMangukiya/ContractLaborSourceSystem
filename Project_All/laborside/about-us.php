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
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="#">About Us</a></li>
				          <!-- <li><a href="category.php">Category</a></li> -->
				          <!-- <li><a href="price.php">Price</a></li> -->
				          <!-- <li><a href="blog-home.html">Blog</a></li> -->
				          <li><a href="contact.php">Contact</a></li>
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
						        	header("location:about-us.php");
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
       <!--    <a href="#">Forgot password?</a>
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
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.php"> About Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start service Area -->
			<section class="service-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Why Choose Us</h1>
							<p>
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
								<p>
									We provide expert labor for any job.  
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-license"></span>Professional Service</h4>
								<p>
									We give sufficient service for any work. Due to, Customers get satisfaction by labor.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-phone"></span>Great Support</h4>
								<p>
                                    We solve queries by telephone.
								</p>								
							</div>
						</div>
<!-- 						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
								<p>
									We provide expart 
								</p>				
							</div>
						</div> -->
						<div class="col-lg-4 col-md-6" style="margin-left:380px">
							<div class="single-service">
								<h4><span class="lnr lnr-diamond"></span>Our mission</h4>
								<p>
									We will provide labor power for any customer and We will provide a lot of job opportunities for labor.
								</p>								
							</div>
						</div><!-- 
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
								<p>
								 	
								</p>									
							</div>
						</div>	 -->					
					</div>
				</div>	
			</section>
			<!-- End service Area -->						

			<!-- Start feature Area -->
			<!-- <section class="feature-area">
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

			<!-- Start team Area -->
			<section class="team-area" id="team">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">About Us</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center d-flex align-items-center">
						<!-- <div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t1.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Ethel Davis</h4>
							    <p>Managing Director (Sales)</p>									    	
						    </div>
						</div> -->
					<!-- 	<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t2.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Rodney Cooper</h4>
							    <p>Creative Art Director (Project)</p>			    	
						    </div>
						</div>	
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t3.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Dora Walker</h4>
							    <p>Senior Core Developer</p>			    	
						    </div>
						</div> -->
						<div class="col-md-8 single-team">
						<h4 class="mb-10" style="margin-top:10px;">About Us</h4>
This website is a basic but effective solution to labor work like plumbing, painting, carpentering and many more. it will provide all types of labor services at market-cost. Using portal customers can search and filter the list of labors to find a suitable person for the job. This will create job opportunities for labor and 24x7 service for users. Users also can rate and write reviews of the labor along with write complaints against them. There is also an online payment option for ease of transaction.</div>
					    	 <div class="col-md-4 single-team">
					    	 </div>
					    	 <br>
						<div class="col-md-8 single-team">
						<h4 class="mb-10" style="margin-top:25px;">Service Quality</h4>

						We at Optima Consultancy believe in ensuring valuable service quality. Through our affirmative approach and practices, we have been able to add value propositions in our services. We aim towards improvising our service quality through comprehensive research to reach innovative answers. Our strong R&D supports us in connecting the right talent to ensure positive results. Our focused methodologies towards workforce solutions foster a competent recruiting process and improvising on talent quality delivery. 
					    </div>
					    	 <div class="col-md-4 single-team">
					    	 </div>
					    <div class="col-md-8 single-team" style="margin-bottom:150px;">
						<h4 class="mb-10">Our Commitment</h4>
						We committed to establishing leading business solutions that assist in increasing the capabilities of our clients. We strongly believe in building a value of trust, honesty, and transparency with our clients to develop long-term relationships and to adopt a flexible approach as per their needs.
					    </div>
						 <div class="col-md-4 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="../img/Labor_relation.jpg" alt="" style="height:300px;width:400px;">
						        <!-- <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div> -->
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <!-- <h4>Lena Keller</h4> -->
							    <!-- <p>Creative Content Developer</p>			    	 -->
						    </div>
						</div>							 																		
				
					</div>
				</div>	
			</section>
			<!-- End team Area -->			


			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="../register.php">I am a Customer</a>
								<a class="primary-btn" href="laborregister.php">I am a Labor</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End calto-action Area -->

			<!-- Start testimonial Area -->
	<!-- 		<section class="testimonial-area section-gap" id="review">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Testimonial from our Clients</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review">
								<img src="img/r1.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r2.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r1.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r2.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>								
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End testimonial Area -->
			
		
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
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

		</form>
		</body>
	</html>



