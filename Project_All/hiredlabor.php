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



				<style type="text/css">
			li.x{
               pointer-events: none;                   
	           }

			</style>

			<style type="text/css">	
				strong.star {
			    list-style: none;
			    display: inline-block;
			    margin-right: 5px;
			    cursor: pointer;
			    color: #9E9E9E;

				}

				strong.star.selected {
				    color: #f5b301;
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
								<li><a href="#">Your Order</a></li>
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
<!-- 				          <li><button type="button" class="ticker-btn" data-toggle="modal" data-target="#myModal" style="border-width:0px;">Login</button></li>				      -->  
				          <?php	
				          }
				          ?>	

				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


        <!-- hiredlabor insert start -->
        <?php
		$enddate='';
		$qry="select * from payment where p_customerid='$cid' order by p_id desc limit 1";
		// echo $qry;
		$res=mysqli_query($con,$qry);
		while($row=mysqli_fetch_row($res))
		{
			$enddate=$row[5];

		}

		// // echo 'day ='.$day;
		// $enddate=date("Y-m-d",strtotime(date("Y-m-d",strtotime($startdate))."+$day day"));
		// echo $enddate;
		if(date("Y-m-d")<$enddate)
		{
			// echo "membership is not expired";

			if(isset($_REQUEST['lid']))
			{

				$qry="select * from labor where l_id=".$_REQUEST['lid'];
				$res=mysqli_query($con,$qry);
				while($row=mysqli_fetch_row($res))
				{
				 $status=$row[17];
				 $totalcharge=$row[18];
				}
             
					$customerid=$cid;
				    $laborid=$_REQUEST['lid'];
				    // $totallabor=$_POST['totallabor']; 

					$qry8="insert into hiredlabor values(0,'$customerid','$laborid','$totalcharge',NOW(),'1')";
					// $qry;
					$res8=mysqli_query($con,$qry8);
					if($res8>0)
					{
							$qry7="update labor set l_status='unavailable' where l_id='$laborid'";
							// echo $qry7;
						$res7=mysqli_query($con,$qry7);
						if($res7>0)
						{


							$qry14="select * from labor l,hiredlabor h where h.h_laborid=l.l_id and h.h_customerid='$cid' group by h.h_id order by h_id desc limit 1";
							// echo $qry;
							$res14=mysqli_query($con,$qry14);

							while($row14=mysqli_fetch_row($res14))
							{
								// echo "insert record into hiredlabor table";

								include('SendEmail/autoload.php');
    			
        
						        $name ='JOB Listing.com';
						        $email =$row14[5];
						        $subject = 'Confirm';
						        $body = 'You are hired by a customer to give me your confirmation as soon as possible.';

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
						            // echo $status;
						        } else {
						            $status = "failed";
						            // echo $status;
						        }

						       

						   header("location:hiredlabor.php");
						   exit;
							}
						 
						}		
						else
						{
							echo "error not update ";
						}   
					}		
					else
					{
						echo "erro not insert hiredlabor";
					}


					
						// echo "update record into user table";
					   // header("location:hiredlaboradmin.php");
					
			    
			}
		}
		else
		{
			// echo "<script>alert('membership has expired get new membership');</script>";
			echo "<script>swal('membership has expired get new membership');</script>";
			// echo "membership has expired";
			// echo "<script>swal("Here's the title!", "...and here's the text!");</script>";
		}

		?>
        <!-- hiredlabor insert end -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Hired Labor	Detail			
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Hired Labor Detail</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

            <!-- labor delete start-->
			<?php
			if(isset($_REQUEST['hid']))
			{

				$qry10="select * from hiredlabor where h_id=".$_REQUEST['hid'];
				$res10=mysqli_query($con,$qry10);
				while($row10=mysqli_fetch_row($res10))
				{
				 $lid7=$row10[2];
				}


				$qry16="select * from labor where l_id='$lid7'";
				$res16=mysqli_query($con,$qry16);
				while($row16=mysqli_fetch_row($res16))
				{

					$laboremail=$row16[5];	

					include('SendEmail/autoload.php');

    							// if (isset($_POST['name']) && isset($_POST['email'])) {
        
						        $name ='JOB Listing.com';
						        $email =$laboremail;
						        $subject = 'Customer cancel job';
						        $body = 'Customer canceled your job due to some reasons.';

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
						            // echo $status;
						        } else {
						            $status = "failed";
						            // echo $status;
						            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
						        }

				}


				$qry11="update labor set l_status='available' where l_id='$lid7'";
				$res11=mysqli_query($con,$qry11);
				if($res11>0)
				{
					// echo "update record into user table";
				   // header("location:hiredlaboradmin.php");
				}		
				else
				{
					echo "error not update ";
				}

				$qry13="update hiredlabor set h_flag='2' where h_id=".$_REQUEST['hid'];
				$res13=mysqli_query($con,$qry13);
				if($res13>0)
				{
					// echo "update record into user table";
				   // header("location:hiredlaboradmin.php");
    				echo "<script> window.location.href='hiredlabor.php';</script>";
				   exit;
				// echo "<script>swal('Good job!', 'Cancel Labor Job.', 'success');</script>";

				}		
				else
				{
					echo "error not update ";
				}

				// $qry3="delete from hiredlabor where h_id=".$_REQUEST['hid'];
				// $res3=mysqli_query($con,$qry3);
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
            <!-- labor delete end-->


			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<?php
							// if(isset($_REQUEST['lid']))
							// {
							// $lid=$_REQUEST['lid'];	
							$qry="select * from labor l,hiredlabor h where h.h_laborid=l.l_id and h.h_customerid='$cid' group by h_id";
							// echo $qry;
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
									<img src="<?php echo $imagename1; ?>" width="100px" height=100 alt="" >
								    </a>
									<ul class="tags">
									<!-- category start	 -->
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
									<!-- 	<li>
											<a href="#">Art</a>
										</li>
										<li>
											<a href="#">Media</a>
										</li>
										<li>
											<a href="#">Design</a>					
										</li> -->
									<!-- category end	 -->

									</ul>
								</div>

								<div class="details" style="margin-left:15px;width:600px;">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.php?lid=<?php echo $row[0]; ?>" class="text-uppercase">
											<div class="row" style="width:400px;">
												<div  class="col-sm-6"><h5>Hired Id: <?php echo $row[23];?></h5></div>
												<div style="text-align: right;" class="col-sm-6"><h5><?php echo $row[27];?></h5></div>	
											</div>		
											<h3>
												<?php echo $row[1].' '.$row[2];?> 
											</h3></a>
											<h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp Gender: <?php echo $row[3];?></h5>
											<h5>Job Nature: Full Day</h5>					
										</div>
										<ul class="btns">
				<!-- 							<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">Hire Me</a></li> -->
											<!-- <li><a href="#" style="color:green;">Confirm Job</a></li><br><br> -->

											<?php 
											if($row[28]=='2' or $row[28]=='3')
											{
											    $class='x';
											}
											else
											{
												$class='';
											}
											?>			
											<li class="<?php echo $class; ?>"><a href="hiredlabor.php?hid=<?php echo $row[23]; ?>" style="color:red;margin-right:9px;" onclick="return confirm('Are you sure to delete your order ?')?true:false;">Cancel Job</a></li>
										</ul>

									</div>
									<!-- <p><h6><?php echo $row[15];?></h6></p> -->

									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?></p>

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

 										<h5>	
													<?php	
													 for ($count = 1; $count <= 5; $count ++) {
												        $starRatingId = $avg . '_' . $count;
												        
												        if ($count <= $avg) {
												            ?>
												           <strong value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</strong>
												        <?php
												        } else {?>
												            <strong value="' . $count . '"  id="' . $starRatingId . '" class="star" >&#9733;</strong>
												        <?php
												    	}
												    } 
												    ?>
												  <strong style="font-size:12px">(<?php echo $numR;?>)</strong>
												    </h5>
												    
									<p class="address">Total Payment: &#x20a8; <?php echo $row[18];?> <!-- &nbsp &nbsp &nbsp Status: <?php echo $row[17];?> --></p>			

									<?php
								 	if($row[28]==1)
									{
										$color2='blue';
									$jobstatus="Wait for labor confirmation.";
									}
									else if($row[28]==2)
									{
										$color2='red';
									$jobstatus="Labor job cancelled by you.";							
									}
									else if($row[28]==3)
									{
										$color2='red';
									$jobstatus="Labor will not do your job thay rejected your job request.";
									
									}
									else if($row[28]==4)
									{
										$color2='green';
									$jobstatus="Labor will do your job.";
									}
									?>
								<h5 style="color:<?php echo $color2; ?>; font-style: italic;"><strong style="color:#777777;font-style:normal;">Job Status:</strong> <?php echo $jobstatus;?></h5>
								
								<?php
	
							$qry10="select * from labor l,hiredlabor h where h.h_laborid=l.l_id and h.h_customerid='$cid' group by h.h_id order by h_id desc limit 1";
							// echo $qry;
							$res10=mysqli_query($con,$qry10);

							while($row10=mysqli_fetch_row($res10))
							{
								
								if($row10[23]==$row[23])
								{

									if($row10[28]==4)
									{
										
										if(isset($_POST['review2']))
											{

										    	$x1=isset($_POST['group-1'])?$_POST['group-1']:'';
										    	// echo $x1;
										    	$x2=isset($_POST['group-2'])?$_POST['group-2']:'';
										    	// echo $x2;
										    
										    	$x3=isset($_POST['group-3'])?$_POST['group-3']:'';
										    
										    	// echo $x3;
										    	$x4=isset($_POST['group-4'])?$_POST['group-4']:'';
										    	// echo $x4;
										    	$x5=isset($_POST['group-5'])?$_POST['group-5']:'';
										    	// echo $x5;
										    	if(!empty($x1))
										    	{
										    		$rating=$x1;
										    	}
										    	else if(!empty($x2))
										    	{
										    		$rating=$x2;					    		
										    	}
										    	else if(!empty($x3))
										    	{
										    		$rating=$x3;					    				
										    	}
										    	else if(!empty($x4))
										    	{
										    		$rating=$x4;					    		
										    	}
										    	else if(!empty($x5))
										    	{
										    		$rating=$x5;					    		
										    	}
										    	else
										    	{
										    		$rating=1;					    												    		
										    	}
					    	
							
												   $customerid=$row[24];
												    $laborid=$row10[0];
												    // $rating=$_POST['rating'];
												    $review=$_POST['review'];
												   

												$qry9="insert into review values(0,'$customerid','$laborid','$rating','$review',NOW())";
												// echo $qry9;
												$res9=mysqli_query($con,$qry9);
												if($res9>0)
												{						
    										echo "<script> window.location.href='hiredlabor.php';</script>";
												   exit;
												}		
												else
												{
													echo "erro not insert review";
												}
											}
										

												
										?>
										
											Rate this labor: 
											<!-- <input type="text" name="rating"> -->
	<!-- 										 <img src="img/pages/list.jpg" alt=""> -->
										   <div class="html-chunk">
												
									            <div class="acidjs-rating-stars">  
									           
									                <form>
									                    <input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label><!--
									                    --><input type="radio" name="group-2" id="group-1-1" value="4" /><label for="group-1-1"></label><!--
									                    --><input type="radio" name="group-3" id="group-1-2" value="3" /><label for="group-1-2"></label><!--
									                    --><input type="radio" name="group-4" id="group-1-3" value="2" /><label for="group-1-3"></label><!--
									                    --><input type="radio" name="group-5" id="group-1-4"  value="1" /><label for="group-1-4"></label>
									                </form>
									            </div>
									                    <!-- <input type="submit" name="submit"> -->
									        </div>
											<!-- <br> -->
											<span>Review: 
											<input type="text" class="form-control" placeholder="Write Your review. " id="review" name="review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Write Your review.'"></span>
	    									<span id="error_review" class="text-danger"></span>
	    									<br>
										
											<input type="submit" name="review2" value="Submit" id="rating" class="ticker-btn" style="border-width:0px;">
										</form>

									<?php
										
									}
								}
							}
								?>
								</div>
							</div>
							<?php
						}
					// }
							?>
<!-- 							<div class="single-post d-flex flex-row">
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
											<a href="single.php"><h4>Creative Art Designer</h4></a>
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
							</div>	 -->

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

<!-- 									<li><a class="justify-content-between d-flex" href="category.php"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Chicago</p><span>17</span></a></li> -->
								 </ul>
							</div> 

							<!-- <div class="single-slidebar">
								<h4>Top rated job posts</h4>
								<div class="active-relatedjob-carusel">
									<?php
					    	    $qry="select * from labor l,review r where l.l_id=r.r_laborid ORDER by r_rating DESC
					    	    LIMIT 3"; 
							    $res=mysqli_query($con,$qry);
								while($row=mysqli_fetch_row($res))
							        {
							        	// print_r($row);
							        	// die;
									?>
									<div class="single-rated">
										<a href="single.php?lid=<?php echo $row[0]; ?>">
										<img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " class="img-fluid" src="labor/labor_img/<?php echo $row[0];?>/<?php echo $row[16]; ?>" alt=""></a>
										<a href="single.php?lid=<?php echo $row[0]; ?>" class="text-uppercase"><h3>
									    <?php echo $row[1].' '.$row[2];?>
										</h3></a>
	                                    <h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row[3];?></h5>					
									    <p><h6><?php echo $row[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>
										<p class="address"><span class="lnr lnr-database"></span> &#x20a8; 
											<?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row[17];?></p>
										<a href="#" class="btns text-uppercase">Hire Me</a>
									</div>
									 <?php
										}
							        ?>
 -->
									<!-- <div class="single-rated">
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
									</div> -->																		<!-- 
								</div>
							</div>							 -->

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
	 								<?php echo $row1[1];?>
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

									<!-- <li><a class="justify-content-between d-flex" href="category.php"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.php"><p>Media & News</p><span>57</span></a></li>
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
							</div> -->							

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->

	
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
			<script src="js/main.js"></script>
			<script src="js/review1.js"></script>

			</form>	
		</body>
	</html>



