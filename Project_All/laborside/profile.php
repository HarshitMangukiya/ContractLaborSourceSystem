	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
<?php include('../labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['laborname'])){
		// echo "welcome".$_SESSION['laborname'];
}
else
{
	//header("location:index.php");	
    echo "<script> window.location.href='index.php';</script>";

}
if(isset($_POST['logout']))
{
	 //session_destroy();
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

        <link rel="stylesheet" href="../Labor/module/AcidJs.RatingStars/AcidJs.RatingStars/styles/RatingStars.css" />
        	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

			<style type="text/css">
			div.gallery {
			  margin: 5px;
			  border: 1px solid #ccc;
			  float: left;
			  width: 180px;
			  border-radius:4px;			  
			}

			div.gallery:hover {
			  border: 1px solid #777;
			  max-width:100%;
			  border-radius:4px;
			  position:relative; 
			  z-index:1;
			  /*box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px;*/	
			  box-shadow: 2px 10px 20px 1px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}

			div.gallery img {
			  width:178px;
			  height:150px;
			}

			div.desc {
			  padding: 15px;
			  text-align: center;
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
				        <a href="index.php"><img src="../img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <!-- <li><a href="category.php">Category</a></li> -->
	<!-- 			          <li><a href="price.html">Price</a></li>
				          <li><a href="blog-home.html">Blog</a></li> -->
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
				        	// echo "<script> window.location.href='profile.php';</script>";
		                        // exit;
				        	header("location:profile.php");
				        	exit();
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
				          <?php
				          }
				          else
				          {?>
				          <li><a class="ticker-btn" href="index.php">Signup</a></li>
				          <li><a class="ticker-btn" href="index.php">Login</a></li>
				          <?php	
				          }
				          ?>

				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

<!-- labor profile update start -->
<?php
	      	$leaderid='';
	if(isset($_POST['xx']))
    {
     
		  $firstname=ucfirst($_POST['firstname']);
	      $lastname=ucfirst($_POST['lastname']);
	      $gender=$_POST['gender'];
	      $age=$_POST['age'];
	      $email=$_POST['email'];
	      // $phone=$_POST['phone'];
	      $aadharno=$_POST['aadharno'];
	      $address=$_POST['address'];
	      $location=$_POST['location'];
	      $country=$_POST['country'];
	      $state=$_POST['state'];
	      $city=$_POST['city'];
	      $pincode=$_POST['pincode'];
	      $password=$_POST['password'];
	      $about=$_POST['about'];
		  $flag='';

	      
	      	  
	      $path="../Labor/labor_img/";
	      
	   	  	if($_FILES["fimage"]["name"]!=null)
	      	{
	      	    $qry="select * from labor where l_id='$lid'";
				$res=mysqli_query($con,$qry);
				while($row=mysqli_fetch_row($res))
				{
					$fimage=$row[16];
					if(!empty($row[16]))
					{
						  $oldimage=$path.$folder.'/'.$fimage;
		      			// echo $oldimage;
		      			unlink($oldimage);
					}
				}
		    

		      $target_file = $path.basename($_FILES["fimage"]["name"]);
		      // Select file type
		      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		      // Valid file extensions
		      $extensions_arr = array("jpg","jpeg","png","gif");
		      // Check extension  
		      $imgSize = $_FILES['fimage']['size'];
	          if(in_array($imageFileType,$extensions_arr) )
	          {

	              if($imgSize < 5000000)   
	              {

	                $myimg=time().$_FILES['fimage']['name'];
	                // echo $myimg;

	                $targetpath=$path.$folder."/".$myimg;
	                if(move_uploaded_file($_FILES['fimage']['tmp_name'],$targetpath))
	                {
	                  // echo "insert image";
	                }
	           
	              }
	              else{
	                echo "Sorry, your file is too large.";
	              }
	                
	          }
	          else
	          {
	            echo "please Select valid extention front image file";
	          }
	        }
	        else
	        { 
	          $flag=1;
	        }

	      // $status=$_POST['status'];
	      $charge=$_POST['charge'];
	      $categoryid=$_POST['category'];


		    if(!empty($_POST['leaderid']))
		    {   
			    if(isset($_POST['leaderid']))
			    {
			      	$le=$_POST['leaderid'];
			      	$qry="select * from labor where l_id='$le'"; 
				    $res=mysqli_query($con,$qry);
			        if(mysqli_num_rows($res)==1)
			        {

			         		$leaderid=$_POST['leaderid'];	
			     		
			        }
			      	else
			     	{
			      		// echo "Enter the another Leader Id";
			            // $leaderid=$leaderid1;	
         			 	echo "<script>alert('Invalid leaderid enter another leader id')</script>";


			     	}
			    }
	        }




	    if($flag==1)
	    {  
	      $qry="update labor set l_firstname='$firstname',l_lastname='$lastname',l_gender='$gender',l_age='$age',l_email='$email',l_aadharno='$aadharno',l_address='$address',l_location='$location',l_country='$country',l_state='$state',l_city='$city',l_pincode='$pincode',l_password='$password',l_about='$about',l_charge='$charge',l_categoryid='$categoryid',l_leaderid='$leaderid' where l_id='$lid'";
	      $flag=0;
	      // echo $qry;
	    }
	    else
	    {
	      $qry="update labor set l_firstname='$firstname',l_lastname='$lastname',l_gender='$gender',l_age='$age',l_email='$email',l_aadharno='$aadharno',l_address='$address',l_location='$location',l_country='$country',l_state='$state',l_city='$city',l_pincode='$pincode',l_password='$password',l_about='$about',l_image='$myimg',l_charge='$charge',l_categoryid='$categoryid',l_leaderid='$leaderid' where l_id='$lid'";
	      // echo $qry;
	    }

	      $res=mysqli_query($con,$qry);
	        if($res>0)
	        {
	          // echo "update record into customer table";
	           // header("location:index.php");
	        	echo "<script> window.location.href='profile.php';</script>";
				   exit;
	        }   
	        else
	        {
	          echo "erro not update customer";
	        }
    }
?>
<!-- labor profile update end -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Profile Details				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Profile Details</a></p>
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

					$qry1="select * from labor where l_id='$lid'";
					// echo $qry1;
					$res1=mysqli_query($con,$qry1);
					while($row=mysqli_fetch_row($res1))
						{
						if(empty($row[16]))
						{
							$imagename1="../img/avatar-13.jpg";
						}
						else
						{
							$imagename1="../Labor/labor_img/".$row[0].'/'.$row[16];
						}
						
						if(!empty($row[20]))
						{
							$qry1="select * from category where ca_id=".$row[20];
							$res1=mysqli_query($con,$qry1);
							while($row1=mysqli_fetch_row($res1))
								{
									$category=$row1[1];
								}
						}
						$register4 = date("d-m-Y", strtotime($row[19]));  


					?>
						<div class="col-lg-8 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="<?php echo $imagename1; ?>" width="110px" height="110px"
									style="border-radius:5px;position:relative;z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2);">

									<ul class="tags">
<!-- 										<?php
											$qry1="select * from category where ca_id='$row[20]'";
											$res1=mysqli_query($con,$qry1);
											while($row1=mysqli_fetch_row($res1))
												{
										?> -->
									<!-- 	<li>
											<a href="#">
									    	<?php echo $row1[1];?>
											</a>
										</li> -->
										<li>
											<a href="profileedit.php" style="text-align:center;font-weight: bold;">Edit profile</a>
										</li>


<!-- 										<?php
										}
										?>									
 -->	
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

								<div class="details" style="margin-left:15px;">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<div class="row">
												<div  class="col-sm-12"><h5>Labor Id: <?php echo $row[0];?></h5></div>	
											</div>	
											<h3 class="text-uppercase"><?php echo $row[1].' '.$row[2];?></h3>
											<h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp Gender: <?php echo $row[3];?></h5>					
										</div>
										<!-- <ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">hire me</a></li>
										</ul> -->
									</div>
	<!-- 								<p><h6><?php echo $row[15];?></h6></p> -->
									<h5>Job Nature: Full Day</h5>
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[8];?> </p>
									<p class="address"><span class="lnr lnr-database"></span> &#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row[17];?></p>
								</div>
							</div>	
<!-- insert image start -->
<?php
	$filetype=0;
	if(isset($_POST['insertimg']))
	{

	      $filetype=$_POST['filetype'];
	      $laborid=$lid;
	        
	        if($filetype==1)
	        {
		        if(isset($_FILES["workimage"]))
		        {
		          	$path="../Labor/labor_img/";
		         	$foldername=$lid;
		          
		           	$myFile = $_FILES['workimage'];
		            $fileCount = count($myFile["name"]);

		                for ($i = 0; $i < $fileCount; $i++) {

		                  $target_file = $path.basename($_FILES["workimage"]["name"][$i]);
		                  //Select file type
		                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		                  //Valid file extensions
		                  $extensions_arr = array("jpg","jpeg","png","gif");
		                  //Check extension
		                  $imgSize = $_FILES['workimage']['size'][$i];

		 
		                  if(in_array($imageFileType,$extensions_arr) )
		                  {
		                  
		                    if($imgSize < 5000000)   
		                    {
		                      $myimg=time().$_FILES['workimage']["name"][$i];
		                      //echo $myimg;
		                      
		                      $qry="insert into image values(0,'$myimg','$filetype','$laborid')";
		                      // echo $qry;
		                      $res=mysqli_query($con,$qry);

		                      	 $targetpath=$path.$foldername."/".$myimg;
		                      if(move_uploaded_file($_FILES['workimage']['tmp_name'][$i],$targetpath))
		                      {
		                        // echo "insert multi image";
		                      }

		                      if($res>0)
		                      {
		                        // echo "insert record into image table";
		                        // header("location:profile.php");
		                   
		                        echo "<script> window.location.href='profile.php';</script>";
		                        // exit;
		                      }   
		                      else
		                      {
		                        echo "erro not insert image";
		                      }
        						

		                  

		                    }
		                    else
		                    {
		                      echo "file size too large";
		                    }
		                  }
		                  else
		                  {
		                    echo "please Select valid extention front image file";
		                  }

		                }
		        }
		        else
		        {
		          echo "please Select image file";
		        }
		    }
		    
		    if($filetype==2)
		    {
		    	
		    	$video=str_replace('https://youtu.be/', '',$_POST['video']);
		    	// echo $video;
		    	
		      	$qry="insert into image values(0,'$video','$filetype','$laborid')";
		      	$res=mysqli_query($con,$qry);
		        if($res>0)
		        {
		        	// echo "insert record into video table";
		          // header("location:categoryadmin.php");
		        	echo "<script> window.location.href='profile.php';</script>";
		                        exit;
		        }		
		        else
		        {
		        	echo "erro not insert video";
		        }
		    }

	}


	if(isset($_REQUEST['did']))
	{

	  $path1="../Labor/labor_img/";

			
			$qry1="select * from image where i_id=".$_REQUEST['did'];
			$res1=mysqli_query($con,$qry1);
			while($row1=mysqli_fetch_row($res1))
			{
				if($row1[2]==1)
				{
				//$dirpath=$path.$row[0];
				$oldimage1=$path1.$row1[3].'/'.$row1[1];
				// echo $oldimage1;
				unlink($oldimage1);
				//echo $dirpath;
				//rmdir($dirpath);
				}
			}


			$qry2="delete from image where i_id=".$_REQUEST['did'];
			$res2=mysqli_query($con,$qry2);
			if($res2==1)
			{
				// echo "delete record from image table";
				// header("location:profile.php");
				echo "<script> window.location.href='profile.php';</script>";
				   exit;
			}
			else
			{
				echo "not delete record";
			}
	}

?>
<!-- insert image End -->


							<div class="single-post job-experience">
								<!-- labor id:<input type="text" name="laborid"><br> -->
				
								 <h5>
								<img src="../img/pages/list.jpg" alt=""> File Type: 
								<select name="filetype" id="filetype" style="border-radius:4px;">
									<option value disabled selected>Select FileType</option>
									<option value="1">image</option>
									<option value="2">Video</option>
								</select>
								<span id="error_filetype" class="text-danger"></span></h5>
								
								<h5> 
								<img src="../img/pages/list.jpg"> Video Link:  
								<input type="text" name="video" id="video" >
								<span id="error_video" class="text-danger"></span></h5>


								<h5>Ex: You have to insert only red text in video link https://youtu.be/<strong style="color:red;text-decoration: underline;">Mc3Vt37d04M</strong> and You can insert share link Ex: https://youtu.be/ZVG5u3_o93U</h5>

							    <h5><img src="../img/pages/list.jpg">							
								Work Image: <input type="file" id="workimage" name="workimage[]" multiple>
								<span id="error_workimage" class="text-danger"></span></h5>

								
								<input type="submit" name="insertimg" id="insertimg" class="ticker-btn" style="border-width:0px;">

							</div>


							<!-- work image start -->
                            <div class="row" style="margin-left:1px;margin-right:1px;">
								<div class="single-post job-experience col-sm-12" >

									<h4 class="single-title job-details">Work Image</h4>
								    
									<?php
										$count=0;
										$qry4="select * from image where i_laborid='$lid' and i_flag='1' group by i_id"; 
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
								        <div class="gallery">							        
										<img src="../labor/labor_img/<?php echo $row[0];?>/<?php echo $row4[1]; ?>" >
										<div class="desc"><a href="profile.php?did=<?php echo $row4[0]; ?>" class="ticker-btn" onclick="return confirm('Are you sure to delete image ?')?true:false;">Delete</a></div>
										
										</div>
										<?php
										$count++;
									    }
									?>
									
								</div>
							</div>
							<!-- work image End -->

                            <div class="row" style="margin-left:1px;margin-right:1px;">

								<div class="single-post job-details col-sm-12">
									
									
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
							        ?>
							        <br>
							        <?php
							           $count1=0;
							        
							        }
							        ?>
							        	<div class="gallery">	   
							       		<?php
										$go_to_address="https://www.youtube.com/embed/".$row4[1];
							        	echo "<iframe SRC=\"".$go_to_address."\" width=\"180\" height=\"150\" framespacing=0 frameborder=no border=0 scrolling=auto style=\"border-radius:5px\"></iframe>";
							        	?>
							        	<div class="desc"><a href="profile.php?did=<?php echo $row4[0]; ?>" class="ticker-btn" onclick="return confirm('Are you sure to delete image ?')?true:false;">Delete</a></div>
										
										</div>
							        	<?php
									$count1++;
								    }
								    ?>
								   
								</div>	
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
										<img src="../img/pages/list.jpg" alt="">
										<span>Email: <?php echo $row[5]; ?></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Phone: <?php echo $row[6]; ?></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Category: <?php echo $category; ?></span>
										<br>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
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
										<img src="../img/pages/list.jpg" alt="">
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
										<img src="../img/pages/list.jpg" alt="">
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
										<img src="../img/pages/list.jpg" alt="">
										<span>Pincode: <?php echo $row[13]; ?></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Leader id: <?php echo $row[21]; ?></span>		
									</li>


									<li>
										<img src="../img/pages/list.jpg" alt="">
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
										<img src="../img/pages/list.jpg" alt="">
										<span>Registration Date: <?php echo $register4; ?></span>		
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
								    	<h5 style="margin-left:100px;">	
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
												  <i class='fas fa-user-alt' style='font-size:14px;'><?php echo $numR;?></i>
												    </h5>

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
															$imagename3="../img/avatar-13.jpg";
														}
													    else
														{
															$imagename3="../Labor/customer_img/".$row13[13];
														}


													?>
										<div class="single-title">		
											
											<h6><img style="max-width:100%;border-radius:50%; position:relative; z-index:1; box-shadow:0 10px 20px rgba(0,0,0,0.2); margin-right:10px;" src="<?php echo $imagename3; ?>" width="40" height="40" alt=""> <?php echo $customername?> 
												<label style="margin-left:400px;"><?php echo $reviewdate;?></label></h6>
												

	
													<h4 style="margin-left:80px;">	
													<?php	
													 for ($count = 1; $count <= 5; $count ++) {
												        $starRatingId = $row7[0] . '_' . $count;
												        
												        if ($count <= $row7[3]) {
												            ?>
												           <strong value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</strong>
												        <?php
												        } else {?>
												            <strong value="' . $count . '"  id="' . $starRatingId . '" class="star" >&#9733;</strong>
												        <?php
												    	}
												    } 
												    ?>
												    </h4>

													
										
													<h6 style="margin-left:80px;"><?php echo $row7[4] ?> </h6>
												
												</div>
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
				    ?>
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
									$qry2="select count(*) as sta from labor where l_state='$stateid' group by l_state";
									$res2=mysqli_query($con,$qry2);
									while($row2=mysqli_fetch_array($res2))
									{
									?>
            						<span><?php echo $row2['sta']; ?></span></a></li>
						            <?php
	          							}
	          						}
    	      					 ?> -->

									<!-- <li><a class="justify-content-between d-flex" href="category.html"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Chicago</p><span>17</span></a></li> -->
<!-- 								</ul>
							</div>
 -->
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
											$imagename2="../img/avatar-13.jpg";
										}
										else
										{
											$imagename2="../Labor/labor_img/".$row5[0].'/'.$row5[16];
										}
									?>
									<div class="single-rated"> -->
										<!-- <a href="single.php?lid=<?php echo $row5[0]; ?>"> -->
										<!-- <img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " class="img-fluid" src="<?php echo $imagename2; ?>" alt=""> -->
									<!-- </a>											 -->
										<!-- <a href="#" class="text-uppercase"><h3>
									    <?php echo $row5[1].' '.$row5[2];?>
										</h3></a>
	                                    <h5> Age: <?php echo $row5[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row5[3];?></h5>					
									    <p><h6><?php echo $row5[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row5[8];?> </p>
										<p class="address"><span class="lnr lnr-database"></span> &#x20a8;
										 <?php echo $row5[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row5[17];?></p> -->
										<!-- <a href="#" class="btns text-uppercase">Hire Me</a> -->
									<!-- </div>
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
								<!-- </div>
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
	 					            <li><a class="justify-content-between d-flex" href="#">
	 								<p><?php echo $row1[1];?></p>
									<?php
									$qry2="select count(*) as cat from labor where l_categoryid='$catid' group by l_categoryid";
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
		<!-- 	<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="register.php">I am a Customer</a>
								<a class="primary-btn" href="#">i am a labor</a>
							</div>
						</div>
					</div>	
				</div>	
			</section> -->
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
			<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
			<script src="../js/vendor/bootstrap.min.js"></script>			
			<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> -->
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
			<script src="../js/image.js"></script>	

		</form>
		</body>
	</html>



