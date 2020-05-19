	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
<?php include('../labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['laborname'])){
		echo "welcome".$_SESSION['laborname'];
}
else
{
	//header("location:index.php");	
}
if(isset($_POST['logout']))
{
	 //session_destroy();
		unset($_SESSION['laborname']);
        header("location:index.php");
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
			<script src="../Labor/jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'../Labor/ajaxdata.php',

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

        url:'../Labor/ajaxdata.php',

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
<script type="text/javascript">

function myFunction() {
	alert("hello"); 
  // location.replace("index.php");
  window.location.href ="index.php";
   
}


</script>
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
				          <li><a href="category.php">Category</a></li>
				          <!-- <li><a href="price.html">Price</a></li>
				          <li><a href="blog-home.html">Blog</a></li> -->
				          <li><a href="contact.php">Contact</a></li>
				          <li class="menu-has-children"><a href="#">Pages</a>
				            <ul>
								<!-- <li><a href="elements.html">elements</a></li> -->
								<li><a href="search.php">search</a></li>
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
								<li><a href="#">Your Order</a></li>
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


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Edit Profile Details				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#">Edit Profile Details</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<!-- <div class="single-post d-flex flex-row"> -->
								<!-- <div class="thumb">
									<img src="Labor/customer_img/<?php echo $row[13]; ?>" width="100px" height=100 alt=""> 

 									<ul class="tags"> 
										<li>
											<a href="profileedit.php" style="text-align:center;font-weight: bold;">Edit profile</a>
										</li>

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
								</div> -->
								<!-- &nbsp &nbsp &nbsp -->
								<!-- <div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="#"><h3>
											<?php echo $row[1].' '.$row[2];?>
											</h3></a>
										</div>

	 									<ul class="btns">
											<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
											<li><a href="#">hire me</a></li>
										</ul> -->
	<!-- 								</div>										
	 								<p><h6><?php echo $row[15];?></h6></p> 
									< <h5>Job Nature: Full Day</h5>
									<h5>Phone Number: <?php echo $row[4];?></h5> 
									<h5>E-mail: <?php echo $row[3];?></h5>					
									<p class="address"><span class="lnr lnr-map"></span> <?php echo $row[5];?> </p>
									 <p class="address">Location:</span><?php echo $row[6];?></p>
								</div> -->
							<!-- </div>	 -->

<!-- 							<div class="single-post job-details">
								<h4 class="single-title">Work Image</h4>
								<p>
									<?php
									$count=0;
									$qry4="select * from image where i_laborid='$row[0]' and i_flag='1'"; 
								    $res4=mysqli_query($con,$qry4);
									while($row4=mysqli_fetch_row($res4))
							        {
							        	$count++;
							        if($count==5)
							        {
							           $count=0;
							        ?>
							        	<br>
							        <?php
							        }	   
							        ?>
									<img src="labor/labor_img/<?php echo $row[0];?>/<?php echo $row4[1]; ?>" width="150px" height=150 alt="">
									<?php
								    }
								    ?>
								</p>
								<br>
								<p>
									<h4 class="single-title">Work Video Link</h4>
									<?php
									$qry4="select * from image where i_laborid='$row[0]' and i_flag='2'"; 
								    $res4=mysqli_query($con,$qry4);
									while($row4=mysqli_fetch_row($res4))
							        {
							        ?>
							        <a href="#"><?php echo $row4[1]; ?></a>	
									<?php
								    }
								    ?>

							        <iframe width="200" height="200" src="https://www.youtube.com/embed/beqprrnaKFc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</p>
							</div>
 -->
						<!-- 	<div class="single-post job-details">
								<h4 class="single-title">About Me</h4>
								<p>
									<h6><?php echo $row[12];?></h6>
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p>
							</div> -->
							<div class="single-post job-experience">
								<h4 class="single-title">Personal Information</h4>
<?php
    $qry="select * from labor where l_id='$lid'";
    $res=mysqli_query($con,$qry);
    while($row=mysqli_fetch_row($res))
    {
        $firstname=$row[1];
		$lastname=$row[2];
		$gender=$row[3];
        $age=$row[4];
        $email=$row[5];

        $aadharno=$row[7];
        $address=$row[8];
	    $location=$row[9];
	    $country=$row[10];
		$state=$row[11];
		$city=$row[12];
        $pincode=$row[13];
	    $password=$row[14];
        $about=$row[15];
        $fimage=$row[16];
        // $status=$row[17];
        $charge=$row[18];
        
        $categoryid=$row[20];
        $leaderid1=$row[21];

    }


	if(isset($_POST['submit']))
    {

	  $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
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
      
      	  
      $path="../Labor/labor_img/";
      
   if($_FILES["fimage"]["name"]!=null)
      {
      $oldimage=$path.$folder.'/'.$fimage;
      echo $oldimage;
      unlink($oldimage);

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
                echo $myimg;

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

	         // $leaderid=$_POST['leaderid'];	
 
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
		         // echo "dsvcccv";
		        }
		      	else
		     	{
		      		echo "Enter the another Leader Id";
		            $leaderid=$leaderid1;	

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
          echo "update record into customer table";
           // header("location:index.php");
        }   
        else
        {
          echo "erro not update customer";
        }
    

    }
    
  
  ?>


								
								<ul>
									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>First name:
									    <input type="text" class="form-control mb-4" placeholder="Enter First name" name="firstname" value="<?php echo $firstname; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter First name'" required="">
										</span>
									</li>


									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Last name: 
                                        <input type="text" class="form-control mb-4" placeholder="Enter Last name" name="lastname" value="<?php echo $lastname; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last name'" required="">
										</span>
									</li>


									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Gender : 
                                        <input type="radio" name="gender" value="female" 
										<?php if (isset($gender) && $gender=="female") echo "checked";?> >Female
										<input type="radio" name="gender" value="male"
										<?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
										</span>
									</li>


									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Age: 
                                        <input type="text" class="form-control mb-4" placeholder="Enter age" name="age" value="<?php echo $age; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Age'" required="">
										</span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>About Me:
										<input type="text" class="form-control mb-4" placeholder="Enter About Me" name="about" value="<?php echo $about; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter About Me'" required="">
										</span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Email:
										<input type="email" class="form-control mb-4" placeholder="Enter E-mail" name="email" value="<?php echo $email; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter E-mail'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Aadhar No.:
										<input type="text" class="form-control mb-4" placeholder="Enter Aadhar Number" name="aadharno" value="<?php echo $aadharno; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Aadhar Number'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Address:
										<input type="text" class="form-control mb-4" placeholder="Enter Address" name="address" value="<?php echo $address; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Location:
										<input type="text" class="form-control mb-4" placeholder="Enter Location" name="location" value="<?php echo $location; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Location'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">	
										<span>Country Name:</span>
										
										<?php
										$query = $con->query("SELECT * FROM country");
										$rowCount = $query->num_rows;
										?>
										<select name="country" id="country" style="border-radius:5px;">
										<option value="">Select Country</option>
										<?php

										  if($rowCount > 0){

										    while($row = $query->fetch_assoc()){
										      if($country==$row['id']){
										         ?>
										         <option value="<?php echo $row['id']; ?>" selected><?php echo $row['name']; ?></option> 

										        <?php
										      }else{
										           echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										     }
										    }
										  }
										  else
										  {
										    echo '<option value="">Country not available</option>';
										  }

										?>

                                    </select>

									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>State Name: 
											</span>
									    <select name="state" id="state" style="border-radius:5px;">
										<!-- <option value="">Select state first</option> -->
										<?php
										      $qry="select * from state where s_id='$state'"; 
										      $res=mysqli_query($con,$qry);
										      while($row=mysqli_fetch_row($res))
										      {
										        ?>
										        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>         
										      <?php
										      }   
										    ?>
										</select>

									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>City Name:</span>
										<select name="city" id="city" style="border-radius:5px;">
										<!-- <option value="">Select state first</option> -->
										<?php
										      $qry="select * from city where ci_id='$city'"; 
										      $res=mysqli_query($con,$qry);
										      while($row=mysqli_fetch_row($res))
										      {
										        ?>
										        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>     
										      <?php
										        }
										        ?>

										</select>

									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Pincode: 
										<input type="text" class="form-control mb-4" placeholder="Enter Pincode" name="pincode" value="<?php echo $pincode; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Pincode'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Password: 
										<input type="text" class="form-control mb-4" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" required=""></span>		
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Profile Image:<br>
									    <input type="file" name="fimage" value="<?php echo $fimage;?>">
									    </span>

									</li>
<!-- 
									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Status:
										<input type="radio" name="status" value="available" 
										<?php if (isset($gender) && $status=="available") echo "checked";?>
										>available
										<input type="radio" name="status" value="unavailable" 
										<?php if (isset($gender) && $status=="unavailable") echo "checked";?>
										>unavailable<br> 
										</span>
									</li> -->

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Charge: 
										<input type="text" class="form-control mb-4" placeholder="Enter  Your Per day Charge" name="charge" value="<?php echo $charge; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Per day Charge'" required=""></span>
									</li>

									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Category: 
										<select name="category" style="border-radius:5px;">
										<option value disabled selected>select category</option>
										    <?php
										      $qry="select * from category"; 
										      $res=mysqli_query($con,$qry);
										      while($row=mysqli_fetch_row($res))
										      {
										        if($categoryid==$row[0])
										        {
										        ?>
										        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>     
										        <?php
										        }
										        else
										        {
										      ?>
										        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
										      <?php
										        }
										      }
										    ?>
										</select>
										</span>
									</li>


									<li>
										<img src="../img/pages/list.jpg" alt="">
										<span>Leader Id: 
										<input type="text" class="form-control mb-4" placeholder="Enter leader Id" name="leaderid" value="<?php echo $leaderid1; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Leader Id'"></span>
									</li>

									<li>
										<input type="submit" class="ticker-btn" name="submit" value="Update profile" >
									</li>

<!-- 

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
									</li> -->

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

							<div class="single-slidebar">
								<h4>Top rated labor</h4>
								<div class="active-relatedjob-carusel">
								
							<?php
					    	    $qry5="select * from labor l,review r where l.l_id=r.r_laborid ORDER by r_rating DESC LIMIT 3"; 
							    $res5=mysqli_query($con,$qry5);
								while($row5=mysqli_fetch_row($res5))
							        {
									?>
									<div class="single-rated">
										<!-- <a href="single.php?lid=<?php echo $row5[0]; ?>"> -->
										<img style="max-width:100%;border-radius:4px;position:relative;width:150px;height:150px; z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2); left:20px; " class="img-fluid" src="../labor/labor_img/<?php echo $row5[0];?>/<?php echo $row5[16]; ?>" alt="">
									<!-- </a>											 -->
										<a href="#" class="text-uppercase"><h3>
									    <?php echo $row5[1].' '.$row5[2];?>
										</h3></a>
	                                    <h5> Age: <?php echo $row5[4];?> &nbsp &nbsp &nbsp 
	                                    	Gender: <?php echo $row5[3];?></h5>					
									    <p><h6><?php echo $row5[15];?></h6></p>
										<h5>Job Nature: Full Day</h5>
										<p class="address"><span class="lnr lnr-map"></span> <?php echo $row5[8];?> </p>
										<p class="address"><span class="lnr lnr-database"></span> &#x20a8;
										  <?php echo $row5[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row5[17];?></p>
										<!-- <a href="#" class="btns text-uppercase">Hire Me</a> -->
									</div>
									 <?php
										}
							        ?>


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
								</div>
							</div>							

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
			</section>
			<!-- End post Area -->


			<!-- Start callto-action Area -->
			<!-- <section class="callto-action-area section-gap">
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
		</form>
		</body>
	</html>



