	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<?php include('labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['emailname'])){
		// echo "welcome".$_SESSION['emailname'];

}
else
{
	// header("location:index.php");
    // echo "<script> window.location.href='index.php';</script>";
    // exit;

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
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

			<style type="text/css">
			li.x{
               pointer-events: none;                   
	           }

			</style>
		</head>
		<body>
			<form method="post" enctype="multipart/form-data" action="search.php">

			  <header id="header" id="home">
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
				          // $startdate='';
				          if(isset($_SESSION['emailname']))
				          {
				          	$cid=$_SESSION['emailname'];
				          	$qry="select * from customer where c_id='$cid'";
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								$name=$row[1]." ".$row[2];
								// $imagename=$row[13];
								// $startdate=$row[14];
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

			  		<?php
					// $day='';
					// $enddate='';
					// $startdate='';
					$flag='';
					if(!empty($_SESSION['emailname']))
					{
						if(isset($_POST['package1']))
						{	
							$currentdate=date('Y/m/d');
					  	    $qry="select * from payment where p_customerid='$cid' and p_date<>'$currentdate' and p_enddate<>'$currentdate' order by p_id desc limit 1";

							// echo $qry;
							$res=mysqli_query($con,$qry);
							// print_r($res);
							while($row=mysqli_fetch_row($res))
							{			
								
								$startdate=$row[4];
								$enddate=$row[5];
								if($cid==$row[1]){		
									$flag=1;
									// break;
								}
			
							}

							 $sql = $con->query("SELECT * FROM payment where p_customerid='$cid'");
    						$numR = $sql->num_rows;
    						if($numR==0)
    						{
    							// echo $numR;
    							$flag=2;
    						}

											
							if($flag==1)
							{
								$currentdate=date('Y/m/d');
								// echo $currentdate;
								// echo $startdate;
								
								if($currentdate>$enddate)
								{
									$customerid=$cid;
								    $method='online'; 
									$totalpayment='100';
									$start=date('Y/m/d');
									$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+30 day"));
									// $startdate = date("d-m-Y", strtotime($start));	    		
									// $enddate = date("d-m-Y", strtotime($end));	      

			                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
			                        echo $qry;
			                        
			                        
									$res=mysqli_query($con,$qry);
									if($res>0)
									{
			                        	$flag=0;
										// echo "insert record into payment table condition one";
									    // header("location:index.php");
									     	echo "<script> window.location.href='index.php';</script>";
				   							exit;
										// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";

									}		
									else
									{
										echo "erro not insert payment";
									}
							  	  
							  	}
							  	else 
								{
									  	// echo "membership not expired";
										echo "<script>swal('Good job!', 'membership not expired.', 'success');</script>";

							  	    $flag=0;
								}

							 
							}
							else  if($flag==2)
							{
								 $customerid=$cid;
							    $method='online'; 
								$totalpayment='100';
								$start=date('Y/m/d');
								$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+30 day"));
								// $startdate = date("d-m-Y", strtotime($start));	    		
								// $enddate = date("d-m-Y", strtotime($end));	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
		                        // echo $qry;
		                        
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									$flag=0;
									// echo "insert record into payment table conditon two";
									echo "<script> window.location.href='index.php';</script>";
				   							exit;
									// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";

								    // header("location:index.php");
								}		
								else
								{
									echo "<script>swal('Good job!', 'Some Error Payment.', 'success');</script>";

									// echo "erro not insert payment";
								}
							}
						}
							
						if(isset($_POST['package2']))
						{
					  	  $currentdate=date('Y/m/d');
					  	    $qry="select * from payment where p_customerid='$cid' and p_date<>'$currentdate' and p_enddate<>'$currentdate' order by p_id desc limit 1";

							// echo $qry;
							$res=mysqli_query($con,$qry);
							// print_r($res);
							while($row=mysqli_fetch_row($res))
							{			
								
								$startdate=$row[4];
								$enddate=$row[5];
								if($cid==$row[1]){		
									$flag=1;
									// break;
								}
			
							}

							 $sql = $con->query("SELECT * FROM payment where p_customerid='$cid'");
    						$numR = $sql->num_rows;
    						if($numR==0)
    						{
    							// echo $numR;
    							$flag=2;
    						}

											
							if($flag==1)
							{
								$currentdate=date('Y/m/d');
								// echo $currentdate;
								// echo $startdate;
								
								if($currentdate>$enddate)
								{
									$customerid=$cid;
								    $method='online'; 
									$totalpayment='150';
									$start=date('Y/m/d');
									$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+90 day"));
									// $startdate = date("d-m-Y", strtotime($start));	    		
									// $enddate = date("d-m-Y", strtotime($end));	      

			                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
			                        echo $qry;
			                        
			                        
									$res=mysqli_query($con,$qry);
									if($res>0)
									{
			                        	$flag=0;
										// echo "insert record into payment table condition one";
									    // header("location:index.php");
										// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";
										echo "<script> window.location.href='index.php';</script>";
				   							exit;

									}		
									else
									{
										echo "erro not insert payment";
									}
							  	  
							  	}
							  	else 
								{
									  	// echo "membership not expired";
										echo "<script>swal('Good job!', 'membership not expired.', 'success');</script>";

							  	    $flag=0;
								}

							 
							}
							else  if($flag==2)
							{
								 $customerid=$cid;
							    $method='online'; 
								$totalpayment='150';
								$start=date('Y/m/d');
								$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+90 day"));
								// $startdate = date("d-m-Y", strtotime($start));	    		
								// $enddate = date("d-m-Y", strtotime($end));	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
		                        // echo $qry;
		                        
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									$flag=0;
									// echo "insert record into payment table conditon two";
									// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";
									echo "<script> window.location.href='index.php';</script>";
				   							exit;

								    // header("location:index.php");
								}		
								else
								{
									echo "<script>swal('Good job!', 'Some Error Payment.', 'success');</script>";

									// echo "erro not insert payment";
								}
							}

						}
						if(isset($_POST['package3']))
						{
					  	   $currentdate=date('Y/m/d');
					  	    $qry="select * from payment where p_customerid='$cid' and p_date<>'$currentdate' and p_enddate<>'$currentdate' order by p_id desc limit 1";

							// echo $qry;
							$res=mysqli_query($con,$qry);
							// print_r($res);
							while($row=mysqli_fetch_row($res))
							{			
								
								$startdate=$row[4];
								$enddate=$row[5];
								if($cid==$row[1]){		
									$flag=1;
									// break;
								}
			
							}

							 $sql = $con->query("SELECT * FROM payment where p_customerid='$cid'");
    						$numR = $sql->num_rows;
    						if($numR==0)
    						{
    							// echo $numR;
    							$flag=2;
    						}

											
							if($flag==1)
							{
								$currentdate=date('Y/m/d');
								// echo $currentdate;
								// echo $startdate;
								
								if($currentdate>$enddate)
								{
									$customerid=$cid;
								    $method='online'; 
									$totalpayment='200';
									$start=date('Y/m/d');
									$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+365 day"));
									// $startdate = date("d-m-Y", strtotime($start));	    		
									// $enddate = date("d-m-Y", strtotime($end));	      

			                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
			                        echo $qry;
			                        
			                        
									$res=mysqli_query($con,$qry);
									if($res>0)
									{
			                        	$flag=0;
										// echo "insert record into payment table condition one";
									    // header("location:index.php");
										// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";
										echo "<script> window.location.href='index.php';</script>";
				   							exit;

									}		
									else
									{
										echo "erro not insert payment";
									}
							  	  
							  	}
							  	else 
								{
									  	// echo "membership not expired";
										echo "<script>swal('Good job!', 'membership not expired.', 'success');</script>";

							  	    $flag=0;
								}

							 
							}
							else  if($flag==2)
							{
								 $customerid=$cid;
							    $method='online'; 
								$totalpayment='200';
								$start=date('Y/m/d');
								$end=date("Y-m-d",strtotime(date("Y-m-d",strtotime($start))."+365 day"));
								// $startdate = date("d-m-Y", strtotime($start));	    		
								// $enddate = date("d-m-Y", strtotime($end));	      

		                        $qry="insert into payment values(0,'$customerid','$method','$totalpayment','$start','$end')";
		                        // echo $qry;
		                        
								$res=mysqli_query($con,$qry);
								if($res>0)
								{
									$flag=0;
									// echo "insert record into payment table conditon two";
									// echo "<script>swal('Good job!', 'Payment Successful.', 'success');</script>";
								    // header("location:index.php");
								    echo "<script> window.location.href='index.php';</script>";
				   							exit;
								}		
								else
								{
									echo "<script>swal('Good job!', 'Some Error Payment.', 'success');</script>";

									// echo "erro not insert payment";
								}
							}

						}
					}
					
				
					?> 

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

			    $qry="select * from customer where c_email='$email' and c_password='$password' and c_dflag<>'1'";    
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
					  	// echo "<script>swal('Good job!', 'Login Successful.', 'success');</script>";
			           
			          }
			        }
			        else
			        {
			          // header("location:index.php"); 
          echo "<script>alert('Invalid Uasename or Password...')</script>";

					// echo "<script>swal('Invalid Uasename or Password...');</script>";


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

    <p align="left">Email *
    <input type="email" id="email" class="form-control mb-4" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"></p>
    <span id="error_email" class="text-danger"></span>

    <!-- Password -->
    <p align="left">Password *
    <input type="password" id="password" class="form-control mb-4" name="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" ></p>
    <span id="error_password" class="text-danger"></span>


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
         <!--  <a href="#">Forgot password?</a>
        </div>
      </div> -->

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
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>1500+</span> Labors Get Job by Customer	 			
							</h1>	
							<form  method="post" action="search.php" enctype="multipart/form-data">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="searchname" placeholder="what are you looging for?">
									</div>
									<div class="col-lg-3 form-cols">
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
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info" name="search">
									      <span class="lnr lnr-magnifier"></span>Search
									    </button>
									</div>			
								</div>
							</form>	
							<!-- <p class="text-white"> <span>Search by tags:</span> Tecnology, Business, Consulting, IT Company, Design, Development</p> -->
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	



			<!-- Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">	
								<h4>Searching</h4>
								<p>
									You can search anything in this website.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Applying</h4>
								<p>
									You can apply for labor work and get more money.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Security</h4>
								<p>
									We will protect your information and we will make secure data.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Notifications</h4>
								<p>
									 We will notify the new offer and celebration related to our work.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
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
			<section class="feature-cat-area pt-100" id="category">
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
								<a href="category.php?caid=<?php echo "7"; ?>">
									<img src="img/wall-work.png" alt="">
								</a>
								<p>Wall Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "4"; ?>">
									<img src="img/construction-building.png" alt="">
								</a>
								<p>Color Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "8"; ?>">
									<img src="img/labor-work.png" alt="">
								</a>
								<p>Labor Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "11"; ?>">
									<img src="img/industrial-worker.png" alt="">
								</a>
								<p>General work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "9"; ?>">
									<img src="img/manual-handling-64.png" alt="">
								</a>
								<p>Manual Labor Work</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.php?caid=<?php echo "10"; ?>">
									<img src="img/construction-64.png" alt="">
								</a>
								<p>Construction</p>
							</div>			
						</div>																											
					</div>
				</div>	
			</section>
			<!-- End feature-cat Area -->
			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<!-- <ul class="cat-list">
								<li><a href="#">Recent</a></li>
								<li><a href="#">Full Time</a></li>
								<li><a href="#">Intern</a></li>
								<li><a href="#">part Time</a></li>
							</ul> -->

						<?php
							$qry="select * from labor where l_dflag<>'1'";					    
							$res=mysqli_query($con,$qry);
							while($row=mysqli_fetch_row($res))
							{
								if(empty($row[16]))
								{
									$imagename1="img/avatar-13.jpg";
								}
								else
								{
									$imagename1="Labor/labor_img/".$row[0].'/'.$row[16];
								}
							?>
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<a href="single.php?lid=<?php echo $row[0]; ?>">
									<img src="<?php echo $imagename1;?>" width="100" height="100" >
								    </a>
									<ul class="tags">
										<?php
											$qry1="select * from category where ca_id='$row[20]'";
											$res1=mysqli_query($con,$qry1);
											while($row1=mysqli_fetch_row($res1))
												{
										?>
										<li>
											<a href="category.php?caid=<?php echo $row1[0]; ?>">
											
									    	<?php echo $row1[1];?>
											</a>
										</li>


										<?php
										}
										?>									
	
										<!-- <li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li> -->
									</ul>
								</div>
								
								<div class="details" style="margin-left:15px;width:600px;">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.php?lid=<?php echo $row[0]; ?>" class="text-uppercase"><h3>
												<?php echo $row[1].' '.$row[2];?> 
											</h3></a>
											<h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp Gender: <?php echo $row[3];?></h5>
										</div>
										<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<?php 
											if($row[17]=='unavailable')
											{
												$color='red';
											    $class='x';
											}
											else
											{
												$color='green';
												$class='';
											}
											?>											
											<li class="<?php echo $class; ?>"><a href="hiredlabor.php?lid=<?php echo $row[0]; ?>" onclick="return confirm('Are you sure you want to hire labor ?')?true:false;">hire me</a></li>

											<!-- <?php
											if(isset($_POST['hireme']))
											{
												if(empty($_SESSION['emailname']))
												{
													$datatoggle='modal';
													$datatarget='#myModal';

												}
												else
												{
												}
											}

											?> -->
<!-- 											<style type="text/css">
											#btnTrigger
											{
											display:none;
											}
											</style> -->

				          					<!-- <li><input type="submit" name="hireme" class="ticker-btn" tyle="border-width:0px;" id="myText" data-toggle="modal" data-target="#myModal">Login</li> -->

										</ul>
									</div>
									<!-- <p><h6><?php echo $row[15];?></h6></p> -->
									<h5>Job Nature: Full Day</h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>
									<p class="address"><span class="lnr lnr-database"></span> &#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status:<strong style="color:<?php echo $color;?>;text-transform:capitalize;"> <?php echo $row[17];?></strong></p>
								</div>
							</div>

						<?php
						}
						?>

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
							
							<a class="text-uppercase loadmore-btn mx-auto d-block" href="category.php">Load More job Posts</a>

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Labor by Location</h4>
								<ul class="cat-list">
                                <?php
									$qry1="select * from state";
									$res1=mysqli_query($con,$qry1);
									while($row1=mysqli_fetch_row($res1))
									{
									$stateid=$row1[0];
										?>
	 					            <li><a class="justify-content-between d-flex" href="search.php?stateid=<?php echo $row1[0]?>">
	 								<p><?php echo $row1[1];?></p>
									<?php
									$qry2="select count(*) as sta from labor where l_state='$stateid' and l_dflag<>'1' group by l_state";
									$res2=mysqli_query($con,$qry2);
									while($row2=mysqli_fetch_array($res2))
									{
									?>
            						<span><?php echo $row2['sta']; ?></span></a></li>
						            <?php
	          							}
	          						}
    	      					 ?>
<!-- 
									<li><a class="justify-content-between d-flex" href="category.php"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Chicago</p><span>17</span></a></li> -->
								</ul>
							</div>
<!-- 
							<div class="single-slidebar">
								<h4>Top rated labor</h4>
								<div class="active-relatedjob-carusel">


							<?php
					    	    $qry="select * from labor l,review r where l.l_id=r.r_laborid ORDER by r.r_rating DESC LIMIT 3";
					    	    
							    $res=mysqli_query($con,$qry);
								while($row=mysqli_fetch_row($res))
							        {

										if(empty($row[16]))
										{
											$imagename2="img/avatar-13.jpg";
										}
										else
										{
											$imagename2="Labor/labor_img/".$row[0].'/'.$row[16];
										}

							        	?>
									
									<div class="single-rated">
										<a href="single.php?lid=<?php echo $row[0]; ?>">
										<img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " src="<?php echo $imagename2; ?>" alt=""></a>

										<a href="single.php?lid=<?php echo $row[0]; ?>" class="text-uppercase"><h3>
									    <?php echo $row[1].' '.$row[2];?>
										</h3></a>
	                                    
	                                    <h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row[3];?></h5>					
									    
									    <p><h6><?php echo $row[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>

										<p class="address"><span class="lnr lnr-database"></span>
										&#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <strong style="color:<?php echo $color1;?>;text-transform:capitalize;"> <?php echo $row[17];?></strong></p>
										
										<?php 
											if($row[17]=='unavailable')
											{
												$color1='red';
											    $class='x';
											}
											else
											{
												$color1='green';
												$class='';
											}
										?>

										<ul>
										<li class="<?php echo $class; ?>"><a href="hiredlabor.php?lid=<?php echo $row[0]; ?>" class="btns text-uppercase"  onclick="return confirm('Are you sure you want to hire labor ?')?true:false;">Hire Me</a></li>
										</ul>
									</div>
									 <?php
										}
							        ?> -->

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
									</div>				 -->																
								<!-- </div>
							</div>					
 -->
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
	 					      <li><a class="justify-content-between d-flex" href="category.php?caid=<?php echo $row1[0]; ?>">
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
								<h4>Total labor under leader</h4>
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
											$leadername=$row8[1].' '.$row8[2];
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

			<!-- Start download Area -->
			<!-- <section class="download-area section-gap" id="app">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 download-left">
							<img class="img-fluid" src="img/d1.png" alt="">
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
									<li><a href="register.php">Sign Up</a></li>
									<li><a href="category.php">Category</a></li>
									<li><a href="price.php">Price</a></li>
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
			<script src="js/login.js"></script>

			</form>	
		</body>
	</html>