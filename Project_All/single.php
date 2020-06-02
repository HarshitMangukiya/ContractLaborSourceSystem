	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
<?php include('labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['emailname'])){
		// echo "welcome".$_SESSION['emailname'];
}
else
{
	//header("location:index.php");	
    echo "<script> window.location.href='index.php';</script>";
	
}
if(isset($_POST['logout']))
{
	 //session_destroy();
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
        <link rel="stylesheet" href="Labor/module/AcidJs.RatingStars/AcidJs.RatingStars/styles/RatingStars.css" />
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>


			<style type="text/css">
			li.x{
               pointer-events: none;
	           }

	        img.gallery:hover {
			  /*border: 1px solid #777;*/
			  max-width:100%;
			  border-radius:4px;
			  position:relative; 
			  z-index:1;
			  /*box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px;*/	
			  box-shadow: 2px 10px 20px 1px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}
			img.gallery {
			  margin: 5px;
			  border: 1px solid #ccc;
			  float: left;
			  width: 180px;
			  border-radius:4px;	
			  height:150px;		  
			}


			</style>
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
								Labor Details				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Labor Details</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
                    <?php
                    if(isset($_REQUEST['lid']))
                    {
					$qry="select * from labor where l_dflag<>'1' and l_id=".$_REQUEST['lid'];
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
					
							$register1 = date("d-m-Y", strtotime($row[19]));  

							?>
						<div class="col-lg-8 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="<?php echo $imagename1; ?>" width="110px" height="110px" style="border-radius:5px;position:relative;z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2);">

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
	
<!-- 										<li>
											<a href="#">Art</a>
										</li>
										<li>
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
											<h5>Labor Id: <?php echo $row[0];?></h5>

											<a href="#"><h3>
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
											<li class="<?php echo $class; ?>"><a href="hiredlabor.php?lid=<?php echo $row[0]; ?>"  onclick="return confirm('Are you sure you want to hire labor ?')?true:false;">hire me</a></li>
										</ul>
									</div>
	<!-- 								<p><h6><?php echo $row[15];?></h6></p> -->
									<h5>Job Nature: Full Day</h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>
									<p class="address"><span class="lnr lnr-database"></span> &#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <strong style="color:<?php echo $color;?>;text-transform:capitalize;"> <?php echo $row[17];?></strong></p>
								</div>
							</div>	
                            <div class="row" style="margin-right:1px;margin-left:1px;">
							<div class="single-post job-details col-sm-12">
								<div>
								<h4 class="single-title">Work Image</h4>
								
									<?php
									$count=0;
									$qry4="select * from image where i_laborid='$row[0]' and i_flag='1'"; 
								    $res4=mysqli_query($con,$qry4);
									while($row4=mysqli_fetch_row($res4))
							        {							        	
							        if($count==4)
							        {
							           $count=0;
							        ?>
							        <br>
							        <?php
							        }	   
							        ?>
									<img src="labor/labor_img/<?php echo $row[0];?>/<?php echo $row4[1]; ?>" class="gallery">
									<?php
									$count++;
								    }
								    ?>
								
								</div>
							</div>
							</div>
							<div class="single-post job-details">			
									<h4 class="single-title">Work Video Link</h4>
									<?php
									$count1=0;
									$qry4="select * from image where i_laborid='$row[0]' and i_flag='2'"; 
									// echo $qry4;
								    $res4=mysqli_query($con,$qry4);
								    
									while($row4=mysqli_fetch_row($res4))	
							        {
								        if($count1==3)
								        {
								           $count1=0;
								        ?>
								        <br>
								        <?php
								        }	   
							       
									$go_to_address="https://www.youtube.com/embed/".$row4[1];
							        	echo "<iframe SRC=\"".$go_to_address."\" width=\"180\" height=\"150\" framespacing=0 frameborder=no border=0 scrolling=auto style=\"border-radius:5px;margin-right:10px;\"></iframe>";

									$count1++;
								    }
								    ?>
							</div>

							<div class="single-post job-details">
								<h4 class="single-title">About Me</h4>
								<p>
									<h6><?php echo $row[15];?></h6>
								</p>
	<!-- 							<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p> -->
							</div>
							<div class="single-post job-experience">
								<h4 class="single-title">Personal Information</h4>
								<ul>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Email: <?php echo $row[5]; ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Phone: <?php echo $row[6]; ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Country: 
												<?php
									    	    $qry3="select * from country where id='$row[10]'"; 
											    $res3=mysqli_query($con,$qry3);
												while($row3=mysqli_fetch_row($res3))
										        {
										        	echo $row3[1];
											    }
										        ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>State: 
											<?php
									    	    $qry3="select * from state where s_id='$row[11]'"; 
											    $res3=mysqli_query($con,$qry3);
												while($row3=mysqli_fetch_row($res3))
										        {
										        	echo $row3[1];
											    }
										        ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>City:
										 	<?php
									    	    $qry3="select * from city where ci_id='$row[12]'"; 
											    $res3=mysqli_query($con,$qry3);
												while($row3=mysqli_fetch_row($res3))
										        {
										        	echo $row3[1];
											    }
										        ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Pincode: <?php echo $row[13]; ?></span>
									</li>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Leader id: <?php echo $row[21]; ?></span>		
									</li>


									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Leader Name: 
											<?php
									    	    $qry3="select * from labor where l_id='$row[21]'"; 
											    $res3=mysqli_query($con,$qry3);
												while($row3=mysqli_fetch_row($res3))
										        {
										        	echo $row3[1].' '.$row3[2];
											    }
										        ?></span>
									</li>


									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Registration Date: <?php echo $register1; ?></span>		
									</li>
									<!-- <li>	
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>	
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>																	 -->										
								</ul>
							</div>

							<div class="single-post job-details">
								<h4 class="single-title">Review</h4>
								<?php

									$avg='';
								    $sql = $con->query("SELECT * FROM review where  r_laborid='$row[0]'");
								    $numR = $sql->num_rows;
								   	if($numR>0)
								   	{
								    $sql = $con->query("SELECT SUM(r_rating) AS total FROM review");
								    $rData = $sql->fetch_array();
								    $total = $rData['total'];

								    $avg = $total / $numR;
									}
								    ?>
								    <h5>Average Rating: <strong style="max-width:100%;border-radius:5px; position:relative; z-index:1; box-shadow:0 10px 20px rgba(0,0,0,0.2); margin-right:10px;background-color:green;color:white; font-size: 150%;padding-left:15px;padding-right:15px;"> <?php echo round($avg,1);?></strong></h5>
								    <i class='fas fa-user-alt' style='font-size:24px;margin-left:130px;'><?php echo $numR;?></i>
								    <br>
								    <?php
									$qry7="select * from review where r_laborid='$row[0]'";
									// echo $qry7;
									$res7=mysqli_query($con,$qry7);
									while($row7=mysqli_fetch_row($res7))
										{
											$reviewd=$row7[5];  
											$reviewdate = date("d-m-Y", strtotime($reviewd));  

											$qry13="select * from customer where c_id='$row7[1]'";
												$res13=mysqli_query($con,$qry13);
												while($row13=mysqli_fetch_row($res13))
													{
														$customername=$row13[1].' '.$row13[2];
														if(empty($row13[13]))
														{
															$imagename3="img/avatar-13.jpg";
														}
													    else
														{
															$imagename3="Labor/customer_img/".$row13[13];
														}


													?>
											<div class="single-title">		
											
											<h6><img style="max-width:100%;border-radius:50%; position:relative; z-index:1; box-shadow:0 10px 20px rgba(0,0,0,0.2); margin-right:10px;" src="<?php echo $imagename3; ?>" width="40" height="40" alt=""> <?php echo $customername?> 
												<label style="margin-left:400px;"><?php echo $reviewdate;?></label></h6>
												
											<!-- <div class="row"> -->
												<!-- <dir class="col-sm-3"> -->

														<div class="acidjs-rating-stars" style="margin-left:80px;">
														<div class="acidjs-rating-stars acidjs-rating-disabled">

													<?php
														for($a=0;$a<5;$a++)
														 {
															if($a>$row7[3]){
																?>
															
																<input type="radio" value="1" disabled="disabled" checked><label for="group-1-0" ></label>

														<?php	} 
														else
															{
																?>
     												<input disabled="disabled" type="radio" name="group-3" id="group-3-4"  value="5" /><label for="group-3-4"></label>
															
															<?php
															}
														}
														?>
<!-- 														<?php
														for ($i=0; $i<$row7[3]; $i++) { 
															// echo $row7[3];
															
															?>
 -->														   <!--  <input type="radio" value="1" disabled="disabled" checked><label for="group-1-0" ></label>								 -->
														    
	   													<!-- <input type="radio" id="group-2-0" value="5"><label for="group-2-0"></label> -->
											<!-- 		<?php																	
														   			    				
													}
													?>
													<?php
													for ($j=0; $j<5-$row7[3]; $j++) { 
															// echo $row7[3];
															?>
											 -->			    <!-- <input type="radio"><label for="group-1-0" ></label>								 -->
														    <!-- <input type="radio"> -->
     												<!-- <input disabled="disabled" type="radio" name="group-3" id="group-3-4"  value="5" /><label for="group-3-4"></label>
 -->
	   													<!-- <input type="radio" id="group-2-0" value="5"><label for="group-2-0"></label> -->
													<!-- <?php	
																
														   			    				
													}
													?> -->
													
													</div>
													<h6><?php echo $row7[4] ?> </h6>
												</div>
												
												</div>
												
												<!-- </div> -->
											<!-- </div> -->
											<?php
									}	}

								?>

								<p>

								</p>

							</div>
						<!-- 	<div class="single-post job-experience">
								<h4 class="single-title">Job Features & Overviews</h4>
								<ul>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>	
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>													
								</ul>
							</div>	
							<div class="single-post job-experience">
								<h4 class="single-title">Education Requirements</h4>
								<ul>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
									</li>																										
								</ul>
							</div> -->														
						</div> 
                        <?php
					}
}
				    ?>
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
									$qry2="select count(*) as sta from labor where l_dflag<>'1' and l_state='$stateid' group by l_state";
									$res2=mysqli_query($con,$qry2);
									while($row2=mysqli_fetch_array($res2))
									{
									?>
            						<span><?php echo $row2['sta']; ?></span></a></li>
						            <?php
	          							}
	          						}
    	      					 ?>

									<!-- <li><a class="justify-content-between d-flex" href="category.html"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Chicago</p><span>17</span></a></li> -->
								</ul>
							</div>

							<!-- <div class="single-slidebar">
								<h4>Top rated labor</h4>
								<div class="active-relatedjob-carusel">
								
							<?php
					    	    $qry5="select * from labor l,review r where l.l_id=r.r_laborid ORDER by r_rating DESC
					    	    LIMIT 3"; 
							    $res5=mysqli_query($con,$qry5);
								while($row5=mysqli_fetch_row($res5))
							        {
										if(empty($row5[16]))
										{
											$imagename2="img/avatar-13.jpg";
										}
										else
										{
											$imagename2="Labor/labor_img/".$row5[0].'/'.$row5[16];
										}
									?>
									<div class="single-rated">
										<a href="single.php?lid=<?php echo $row5[0]; ?>">
										<img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " class="img-fluid" src="<?php echo $imagename2; ?>" alt=""></a>											
										<a href="single.php?lid=<?php echo $row5[0]; ?>" class="text-uppercase"><h3>
									    <?php echo $row5[1].' '.$row5[2];?>
										</h3></a>
	                                    <h5> Age: <?php echo $row5[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row5[3];?></h5>					
									    <p><h6><?php echo $row5[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row5[8];?> </p>
										<p class="address"><span class="lnr lnr-database"></span> &#x20a8;
										 <?php echo $row5[18];?> &nbsp &nbsp &nbsp Status: <strong style="color:<?php echo $color1;?>;text-transform:capitalize;"> <?php echo $row5[17];?></strong></p>
										<?php 
											if($row5[17]=='unavailable')
											{
												$color1='green';
											    $class='x';
											}
											else
											{
												$color1='red';
												$class='';
											}
										?>

										<ul>
										<li class="<?php echo $class; ?>"><a href="hiredlabor.php?lid=<?php echo $row5[0]; ?>" class="btns text-uppercase"  onclick="return confirm('Are you sure you want to hire labor ?')?true:false;">Hire Me</a></li>
										</ul>
									</div>
									 <?php
										}
							        ?> -->


								<!-- 	<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.php"><h4>Creative Art Designer</h4></a>
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
										<a href="single.php"><h4>Creative Art Designer</h4></a>
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
										<a href="single.php"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div> -->																		
							<!-- 	</div>
							</div>		 -->					

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
	 					            <li><a class="justify-content-between d-flex"  href="category.php?caid=<?php echo $row1[0]; ?>">
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
									<!-- <li><a class="justify-content-between d-flex" href="category.html"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li> -->
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

<!-- 							<div class="single-slidebar">
								<h4>Carrer Advice Blog</h4>
								<div class="blog-list">
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.php"><h4>Home Audio Recording <br>
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
										<a href="single.php"><h4>Home Audio Recording <br>
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
										<a href="single.php"><h4>Home Audio Recording <br>
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
							</div>	 -->						

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->


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



