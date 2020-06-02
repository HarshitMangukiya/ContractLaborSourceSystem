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
					<style type="text/css">
			li.x{
               pointer-events: none;                   
	           }

			</style>

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
				    	echo $qry;
				        $res=mysqli_query($con,$qry);
				        if($res>0)
				        {
				          //echo "update record into customer table";
				        	header("location:index.php");
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
			  </header> <!-- #header -->

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
			    
			   // echo $qry;
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
         			 echo "<script>alert('Invalid phone number or Password...')</script>";
			        	
			          // header("location:index.php"); 

			          // echo "Invalid Uasename or Password..."; 
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
			<form method="post" enctype="multipart/form-data">
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg" ></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<span>1500+</span> Labors Get Job by Customer				
							</h1>	
							<!-- <form action="search.php" class="serach-form-area"> -->
								<!-- <div class="row justify-content-center form-wrap"> -->
									<!-- <div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="search" placeholder="what are you looging for?">
									</div> -->
								<!-- 	<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects">
											<select name="city">
                                            <option value disabled selected>Select City
												</option>
												
											<?php
									    	    $qry="select * from city"; 
											    $res=mysqli_query($con,$qry);
												while($row=mysqli_fetch_row($res))
										        {
												?>
										        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
										        <?php
										        }
										        ?>	
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select name="category">
												<option value disabled selected>Select Category
												</option>
												
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
										</div>										
									</div>
									<?php 
									
										if(!empty($_POST['city']))
										{
											if(!empty($_POST['category']))
											{
									
										      $city=$_POST['city'];
										      $category=$_POST['category'];
										      $_SESSION['city']=$city;
										      $_SESSION['category']=$category;	
										      
											}
										}	
									?> -->
									<!-- <div class="col-lg-2 form-cols" style="margin-top:11px;"> -->

<!-- 
									    <button type="submit" class="btn btn-info" name="search">									    --> 	
									      <!-- <a href="search.php?ciid=<?php echo $city; ?>&caid=<?php echo $category; ?>" class="ticker-btn"> -->
									     <!--  <a href="search.php" class="ticker-btn">
									      <span class="lnr lnr-magnifier"></span> &nbsp Search
									      </a> -->
									    <!-- </button> -->
									<!-- </a> -->
										
									<!-- </div>								 -->
								<!-- </div> -->
							<!-- </form>	 -->
							<!-- <p class="text-white"> <span>Search by tags:</span> Tecnology, Business, Consulting, IT Company, Design, Development</p> -->
						</div>											
					</div>
				</div>
			</section>
			</form>
			<!-- End banner Area -->	



			<!-- Start features Area -->
<!-- 			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Searching</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Applying</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Security</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Notifications</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section> -->
			<!-- End features Area -->
			
			<!-- Start popular-post Area -->
			<!-- <section class="popular-post-area pt-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="active-popular-post-carusel">
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img class="img-fluid" src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p1.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img src="img/p2.png" alt="">
									<a class="btns text-uppercase" href="#">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>Creative Designer</h4></a>
									<h6>Los Angeles</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
									</p>
								</div>
							</div>																																							
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End popular-post Area -->
			
			<!-- Start feature-cat Area -->
			<!-- <section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Featured Labor Categories</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "1"; ?>">
									<img src="img/wall-work.png" alt="">
								</a>
								<p>Wall Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "2"; ?>">
									<img src="img/construction-building.png" alt="">
								</a>
								<p>construction-building</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "3"; ?>">
									<img src="img/labor-work.png" alt="">
								</a>
								<p>Labor Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "4"; ?>">
									<img src="img/industrial-worker.png" alt="">
								</a>
								<p>industrial-worker</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "5"; ?>">
									<img src="img/manual-handling-64.png" alt="">
								</a>
								<p>Manual Labor Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "6"; ?>">
									<img src="img/construction-64.png" alt="">
								</a>
								<p>Construction</p>
							</div>			
						</div>																											
					</div>
				</div>	
			</section> -->
			<!-- End feature-cat Area -->
			
			<?php
			if(isset($_REQUEST['upid']))
			{

				$qry11="select * from hiredlabor where h_id=".$_REQUEST['upid'];
				$res11=mysqli_query($con,$qry11);
				while($row11=mysqli_fetch_row($res11))
				{
				 $customername=$row11[1];		
				 $lid=$row11[2];
				}


				$qry16="select * from customer where c_id='$customername'";
				$res16=mysqli_query($con,$qry16);
				while($row16=mysqli_fetch_row($res16))
				{

					$customeremail=$row16[3];	

					include('../SendEmail/autoload.php');

    							// if (isset($_POST['name']) && isset($_POST['email'])) {
        
						        $name ='JOB Listing.com';
						        $email =$customeremail;
						        $subject = 'Confirm';
						        $body = 'Labor confirmed your job.';

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
						        $mail->addAddress($email);
						        $mail->Subject = $subject;
						        $mail->Body = $body;

						        if ($mail->send()) {
						            $status = "success";
						            // $response = "Email is sent!";
						            echo $status;
						        } else {
						            $status = "failed";
						            echo $status;
						            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
						        }

				}

								




				$qry12="update labor set l_status='unavailable' where l_id='$lid'";
				$res12=mysqli_query($con,$qry12);
				if($res12>0)
				{
					// echo "update record into user table";
				   // header("location:hiredlaboradmin.php");
				}		
				else
				{
					echo "error not update ";
				}

				$qry6="update hiredlabor set h_flag='4' where h_id=".$_REQUEST['upid'];
				$res6=mysqli_query($con,$qry6);
				if($res6>0)
				{
					// echo "update record into user table";
				   // header("location:index.php");
    				echo "<script> window.location.href='index.php';</script>";
				   exit;
					// echo "<script>swal('Good job!', 'Confirm your job.', 'success');</script>";

				}		
				else
				{
					echo "error not update ";
				}
			}



			if(isset($_REQUEST['hid']))
			{

				$qry9="select * from hiredlabor where h_id=".$_REQUEST['hid'];
				$res9=mysqli_query($con,$qry9);
				while($row9=mysqli_fetch_row($res9))
				{
				 $customername=$row9[1];		
				 $lid3=$row9[2];
				}


				$qry16="select * from customer where c_id='$customername'";
				$res16=mysqli_query($con,$qry16);
				while($row16=mysqli_fetch_row($res16))
				{

					$customeremail=$row16[3];	

					include('../SendEmail/autoload.php');

    							// if (isset($_POST['name']) && isset($_POST['email'])) {
        
						        $name ='JOB Listing.com';
						        $email =$customeremail;
						        $subject = 'Cancel your order';
						        $body = 'Labor canceled your job due to some reasons.';

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
						        $mail->addAddress($email);
						        $mail->Subject = $subject;
						        $mail->Body = $body;

						        if ($mail->send()) {
						            $status = "success";
						            // $response = "Email is sent!";
						            echo $status;
						        } else {
						            $status = "failed";
						            echo $status;
						            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
						        }

				}

				$qry10="update labor set l_status='available' where l_id='$lid3'";
				$res10=mysqli_query($con,$qry10);
				if($res10>0)
				{
					// echo "update record into user table";
				   // header("location:hiredlaboradmin.php");
				}		
				else
				{
					echo "error not update ";
				}

				$qry8="update hiredlabor set h_flag='3' where h_id=".$_REQUEST['hid'];
				$res8=mysqli_query($con,$qry8);
				if($res8>0)
				{
					// echo "update record into user table";
				   	echo "<script> window.location.href='index.php';</script>";
				   exit;
					// echo "<script>swal('Good job!', 'Cancel your job.', 'success');</script>";

				}		
				else
				{
					echo "error not update ";
					
				}

			 //    $qry3="delete from hiredlabor where h_id=".$_REQUEST['hid'];
			 //    $res3=mysqli_query($con,$qry3);
				// if($res3==1)
				// {
				// 	// echo "delete record from hiredlabor table";
				// 	// header("location:index.php");	
				// }
				// else
				// {
				// 	echo "not delete record";
				// }
			}
			?>


			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
						<!-- 	<ul class="cat-list">
								<li><a href="#">Recent</a></li>
								<li><a href="#">Full Time</a></li>
								<li><a href="#">Intern</a></li>
								<li><a href="#">part Time</a></li>
							</ul> -->
<!-- 
					<?php
					$qry1="select * from hiredlabor where h_laborid='$lid'";
					echo $qry1;
					$res1=mysqli_query($con,$qry1);
					while($row1=mysqli_fetch_row($res1))
					{
					echo $row1[0];
					$a[]=$row1[1];
					$x=$row1[2];
					}
					?> -->

					<!-- display customer order start-->

					<?php
					
							$qry="select * from hiredlabor h,customer c,labor l where h.h_laborid='$lid' and 
							h.h_customerid=c.c_id group by h_id order by h_date desc";
							// echo $qry;

							$res=mysqli_query($con,$qry);

							while($row=mysqli_fetch_row($res))
							{
								if(empty($row[19]))
											{
												$imagename1="../img/avatar-13.jpg";
											}
											else
											{
												$imagename1="../Labor/customer_img/".$row[19];
											}			
							?>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<a href="customerprofile.php?cid=<?php echo $row[6]; ?>">
									<img src="<?php echo $imagename1; ?>" width="100" height="100" >
								    </a>
								</div>
								<!-- &nbsp &nbsp &nbsp -->
								<div class="details" style="margin-left:15px;width:600px;">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											
											<div class="row" style="width:600px;">
												<div  class="col-sm-6"><h5>Hired Id: <?php echo $row[0];?></h5></div>
												<div style="text-align:right;" class="col-sm-6"><h5><?php echo $row[4];?></h5></div>	
											</div>		
																	
											<a href="customerprofile.php?cid=<?php echo $row[6]; ?>" class="text-uppercase"><h3>
												<?php echo $row[7].' '.$row[8];?> 
											</h3></a>
		                                    <h5>Phone Number: <?php echo $row[10];?></h5> 
											<h5>E-mail: <?php echo $row[9];?></h5>	
											
										</div>
									</div>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[11];?> </p>
											<h5>Total Payment: <?php echo $row[40];?></h5>	
									
									<ul class="btns">
										<?php 
											if($row[5]=='2' or $row[5]=='3' or $row[5]=='4')
											{
											    $class='x';
											}
											else
											{
												$class='';
											}
											?>			
										<li class="<?php echo $class; ?>"><a href="index.php?upid=<?php echo $row[0]; ?>" style="color:green;" onclick="return confirm('Are you sure to Confirm job request ?')?true:false;">Confirm Job</a></li>
										<li class="<?php echo $class; ?>"><a href="index.php?hid=<?php echo $row[0]; ?>" style="color:red;" onclick="return confirm('Are you sure to delete job request ?')?true:false;">Cancel Job</a></li>								
									</ul>
									
									<?php
								 	if($row[5]==1)
									{
										$color2='blue';
									$jobstatus="Wait for Your confirmation.";
									}
									else if($row[5]==2)
									{
										$color2='red';
									$jobstatus="Customer canceled your job.";							
									}
									else if($row[5]==3)
									{
										$color2='red';
									$jobstatus="Job canceled by you.";
									
									}
									else if($row[5]==4)
									{
										$color2='green';
									$jobstatus="Job confirm by you.";
								
									}
									?>
									<br>
									<h5 style="color:<?php echo $color2; ?>; font-style: italic;"><strong style="color:#777777;font-style:normal;">Job Status:</strong> <?php echo $jobstatus;?></h5>
								</div>
							</div>

					<?php		
					}
					?>
				    <!-- end customer order -->


							<!-- <div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div>		
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div>															
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="img/post.png" alt="">
									<ul class="tags">
										<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li>
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Creative Art Designer</h4></a>
											<h6>Premium Labels Limited</h6>					
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Apply</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
									<h5>Job Nature: Full time</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
								</div>
							</div> -->	
							
							<a class="text-uppercase loadmore-btn mx-auto d-block" href="#">Load More job Posts</a>

						</div>
						<div class="col-lg-4 sidebar">
							<!-- <div class="single-slidebar">
								<h4>Total labor in every state</h4>
								<ul class="cat-list">
                                <?php
									$qry1="select * from state";
									$res1=mysqli_query($con,$qry1);
									while($row1=mysqli_fetch_row($res1))
									{
									$stateid=$row1[0];
										?>
	 					            <li><a class="justify-content-between d-flex" href="#">
	 								<p><?php echo $row1[1];?></p>
									<?php
									$qry2="select count(*) as sta from labor where l_dflag<>'1' and l_state='$stateid' group by l_state";
									$res2=mysqli_query($con,$qry2);
									while($row2=mysqli_fetch_array($res2))
									{
									?>
            						<span><?php echo $row2['sta']; ?></span></a></li>
						            <?php
	          							}
	          						}
    	      					 ?> -->
<!-- 
									<li><a class="justify-content-between d-flex" href="category.php"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Chicago</p><span>17</span></a></li> -->
								<<!-- /ul>
							</div> -->

<!-- 							<div class="single-slidebar">
								<h4>Top rated labor</h4>
								<div class="active-relatedjob-carusel">
 -->

							<!-- <?php
					    	    $qry="select * from labor l,review r where l.l_id=r.r_laborid ORDER by r.r_rating DESC LIMIT 3";
					    	    
							    $res=mysqli_query($con,$qry);
								while($row=mysqli_fetch_row($res))
							        {
							        	?>
									
									<div class="single-rated"> -->
										<!-- <a href="single.php?lid=<?php echo $row[0]; ?>"> -->
										<!-- <img class="img-fluid"src="labor/labor_img/<?php echo $row[0];?>/<?php echo $row[16]; ?>" width="100" height="100" alt=""></a> -->
										<!-- <img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " src="../labor/labor_img/<?php echo $row[0];?>/<?php echo $row[16]; ?>" alt="">
									 </a> -->
										<!-- <a href="#" class="text-uppercase">
											<h3>
									    <?php echo $row[1].' '.$row[2];?>
										</h3>
									</a>
	                                    <h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row[3];?></h5>					
									    <p><h6><?php echo $row[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>
										<p class="address"><span class="lnr lnr-database"></span>
										&#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row[17];?></p>
									</div>
									 <?php
										}
							        ?>  -->

									<!-- <div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div> -->																		
								<!-- </div>
							</div>	 -->						

							<div class="single-slidebar">
								<h4>Labor by Category</h4>
								<ul class="cat-list">

								<?php
									$qry1="select * from category";
									$res1=mysqli_query($con,$qry1);
									while($row1=mysqli_fetch_row($res1))
									{	
									$catid=$row1[0];
										?>
	 					            <li><a class="justify-content-between d-flex" href="#">
	 								<p><?php echo $row1[1];?></p>
									<?php
									$qry2="select count(*) as cat from labor where l_dflag<>'1' and l_categoryid='$catid' group by l_categoryid";
									$res2=mysqli_query($con,$qry2);
									while($row2=mysqli_fetch_array($res2))
									{
									?>
            						<span><?php echo $row2['cat']; ?></span></a></li>
						            <?php
	          							}
	          						}
    	      					 ?>
									<!-- <li><a class="justify-content-between d-flex" href="category.php"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Accounting</p><span>17</span></a></li> -->
 								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Leader</h4>
								<ul class="cat-list">

									<?php
									$qry6="select * from labor where l_leaderid<>'' and l_dflag<>'1' group by l_leaderid";
									$res6=mysqli_query($con,$qry6);
									while($row6=mysqli_fetch_row($res6))
									{
										$ladid=$row6[21];

										$qry8="select * from labor where l_id='$row6[21]'";
										$res8=mysqli_query($con,$qry8);
										while($row8=mysqli_fetch_row($res8))
										{
											
										      $qry14="select * from city where ci_id='$row8[12]'"; 
										      $res14=mysqli_query($con,$qry14);
										      while($row14=mysqli_fetch_row($res14))
										      {
										        
										      	$cityname=$row14[1];     
										      }
										        
											$leadername=$row8[1].' '.$row8[2].' ('.$cityname.')';

										}
									
										?>
	 					      		<li><a class="justify-content-between d-flex" href="single.php?lid=<?php echo $row6[21]; ?>">
	 								<?php echo $leadername;?>
									<?php
									$qry7="select count(*) as led from labor where l_dflag<>'1' and l_leaderid='$ladid' group by l_leaderid";
									// echo $qry
									$res7=mysqli_query($con,$qry7);
									while($row7=mysqli_fetch_array($res7))
									{
									?>
            						<span><?php echo $row7['led']; ?></span></a></li>
						            <?php
	          							}
	          						}?>
	          					</ul>
							</div>
<!-- 
							<div class="single-slidebar">
								<h4>Carrer Advice Blog</h4>
								<div class="blog-list">
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog2.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>																		
								</div>
							</div> -->							

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->
				

			<!-- Start callto-action Area -->
		<!-- 	<section class="callto-action-area section-gap" id="join">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="register.php">I am a Customer</a>
								<a class="primary-btn" href="#">I am a Labor</a>
							</div>
						</div>
					</div>	
				</div>	
			</section> -->
			<!-- End calto-action Area -->

			<!-- Start download Area -->
			<!-- <section class="download-area section-gap" id="app">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 download-left">
							<img class="img-fluid" src="../img/d1.png" alt="">
						</div>
						<div class="col-lg-6 download-right">
							<h1>Download the <br>
							Job Listing App Today!</h1>
							<p class="subs">
								It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.
							</p>
							<div class="d-flex flex-row">
								<div class="buttons">
									<i class="fa fa-apple" aria-hidden="true"></i>
									<div class="desc">
										<a href="#">
											<p>
												<span>Available</span> <br>
												on App Store
											</p>
										</a>
									</div>
								</div>
								<div class="buttons">
									<i class="fa fa-android" aria-hidden="true"></i>
									<div class="desc">
										<a href="#">
											<p>
												<span>Available</span> <br>
												on Play Store
											</p>
										</a>
									</div>
								</div>									
							</div>						
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End download Area -->
		
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