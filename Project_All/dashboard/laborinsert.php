<!DOCTYPE html>
<html lang="en">
<?php include('labor/dbConfig.php');
	session_start();
	if(isset($_SESSION['admin'])){
		// echo "welcome".$_SESSION['admin'];
}
else
{
	header("location:login.php");	
}
if(isset($_POST['logout']))
{
	 //session_destroy
		unset($_SESSION['admin']);
        header("Location:login.php");
}
?>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Forms - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
	<script src="../../../Labor/jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'../../../Labor/ajaxdata.php',

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

        url:'../../../Labor/ajaxdata.php',

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
<body>
<form method="post" enctype="multipart/form-data">

	<div class="wrapper sidebar_minimize">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="../index.html" class="logo">
					<img src="../../../img/logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">			
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="../../assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../../assets/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../../assets/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../../assets/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="../../assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>

						<?php
						$qry="select * from customer where c_id=".$_SESSION['admin'];

						$res=mysqli_query($con,$qry);
						while($row=mysqli_fetch_row($res))
						{
							$name=$row[1];
						?>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $row[1];?> <?php echo $row[2];?></h4>
											
												<p class="text-muted"><?php echo $row[3];?></p>
												<!-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div><!-- 
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a> -->
										<input type="submit" name="logout" value="Logout" class="dropdown-item">

									</li>
								</div>
							</ul>
						</li>
					<?php } ?>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $name;?>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
							<!-- 		<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li> -->
									<li>
										<input type="submit" name="logout" value="Logout" class="dropdown-item">
									</li>
								</ul>
							</div>
						</div>
					</div>

					<ul class="nav nav-primary">
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Base</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
									<li>
										<a href="../components/gridsystem.html">
											<span class="sub-item">Grid System</span>
										</a>
									</li>
									<li>
										<a href="../components/panels.html">
											<span class="sub-item">Panels</span>
										</a>
									</li>
									<li>
										<a href="../components/notifications.html">
											<span class="sub-item">Notifications</span>
										</a>
									</li>
									<li>
										<a href="../components/sweetalert.html">
											<span class="sub-item">Sweet Alert</span>
										</a>
									</li>
									<li>
										<a href="../components/font-awesome-icons.html">
											<span class="sub-item">Font Awesome Icons</span>
										</a>
									</li>
									<li>
										<a href="../components/simple-line-icons.html">
											<span class="sub-item">Simple Line Icons</span>
										</a>
									</li>
									<li>
										<a href="../components/flaticons.html">
											<span class="sub-item">Flaticons</span>
										</a>
									</li>
									<li>
										<a href="../components/typography.html">
											<span class="sub-item">Typography</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Sidebar Layouts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="../sidebar-style-1.html">
											<span class="sub-item">Sidebar Style 1</span>
										</a>
									</li>
									<li>
										<a href="../overlay-sidebar.html">
											<span class="sub-item">Overlay Sidebar</span>
										</a>
									</li>
									<li>
										<a href="../compact-sidebar.html">
											<span class="sub-item">Compact Sidebar</span>
										</a>
									</li>
									<li>
										<a href="../static-sidebar.html">
											<span class="sub-item">Static Sidebar</span>
										</a>
									</li>
									<li>
										<a href="../icon-menu.html">
											<span class="sub-item">Icon Menu</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="#">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li>
										<a href="../tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-map-marker-alt"></i>
								<p>Maps</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="../maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Charts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="../charts/charts.html">
											<span class="sub-item">Chart Js</span>
										</a>
									</li>
									<li>
										<a href="../charts/sparkline.html">
											<span class="sub-item">Sparkline</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="../widgets.html">
								<i class="fas fa-desktop"></i>
								<p>Widgets</p>
								<span class="badge badge-success">4</span>
							</a>
						</li> -->

						<li class="nav-item active">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Category</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="categoryinsert.php">
														<span class="sub-item">Add New Category</span>
													</a>
												</li>
												<li>
													<a href="categorydisplay.php">
														<span class="sub-item">Edit Category</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Labor</span>
											<span class="caret"></span>
										</a>
										<div class="collapse show" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li class="active">
													<a href="#">
														<span class="sub-item">Add New Labor</span>
													</a>
												</li>
												<li>
													<a href="labordisplay.php">
														<span class="sub-item">Edit Labor Detail</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav3">
											<span class="sub-item">Customer</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav3">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="customerdb/customerinsert.php">
														<span class="sub-item">Add New Customer</span>
													</a>
												</li>
												<li>
													<a href="customerdb/customerdisplay.php">
														<span class="sub-item">Edit Customer Detail</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav4">
											<span class="sub-item">Country</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav4">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="countrydb/countryinsert.php">
														<span class="sub-item">Add New Country</span>
													</a>
												</li>
												<li>
													<a href="countrydb/countrydisplay.php">
														<span class="sub-item">Edit Country Detail</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav5">
											<span class="sub-item">State</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav5">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="statedb/stateinsert.php">
														<span class="sub-item">Add New State</span>
													</a>
												</li>
												<li>
													<a href="statedb/statedisplay.php">
														<span class="sub-item">Edit State Detail</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav6">
											<span class="sub-item">City</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav6">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="citydb/cityinsert.php">
														<span class="sub-item">Add New City</span>
													</a>
												</li>
												<li>
													<a href="citydb/citydisplay.php">
														<span class="sub-item">Edit City Detail</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="paymentdisplay.php">
											<span class="sub-item">Payment</span>
										</a>
									</li>
									<li>
										<a href="hiredlabordisplay.php">
											<span class="sub-item">Hired Labor</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Labor Form</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Labor</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add New Labor</a>
							</li>
						</ul>
					</div>

	<?php
	if(isset($_POST['insert']))
	{
    
      $qry="SELECT `AUTO_INCREMENT` as id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'labor' AND TABLE_NAME ='labor'";
       $res=mysqli_query($con,$qry);

      while($row=mysqli_fetch_array($res))  
      {
        $folder=$row['id'];
      }

      $firstname=ucfirst($_POST['firstname']);
      $lastname=ucfirst($_POST['lastname']);
      $gender=$_POST['gender'];
      $age=$_POST['age'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $aadharno=$_POST['aadharno']; 
      $address=$_POST['address'];
      $location=$_POST['location'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];
      $password=$_POST['confirmpassword'];
      $about=$_POST['about'];
      $flag='';
      
		$path="../../../Labor/labor_img/";
       $foldername=$folder;
      if(!is_dir($path.$foldername))
       {
           mkdir($path.$foldername);     
       }       

      	if($_FILES["fimage"]["name"]!=null)
	      {
          $path="../../../Labor/labor_img/";
          $foldername=$folder;
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

                  $targetpath=$path.$foldername."/".$myimg;
                  // echo $targetpath;
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
      $category=$_POST['category'];
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
            }
            else
            {
              echo "Enter the another Leader Id"; 
            }
        }
      }

      if($flag==1)
      {
      // $qry="insert into labor values(0,'$firstname','$lastname','$gender','$age','$email','$phone','$aadharno','$address','$location','$country','$state','$city','$pincode','$password','$about','$myimg','available','$charge',NOW(),'$category','$leaderid')";
     
       $qry="insert into labor(l_id,l_firstname,l_lastname,l_gender,l_age,l_email,l_phone,l_aadharno,l_address,l_location,l_country,l_state,l_city,l_pincode,l_password,l_about,l_status,l_charge,l_date,l_categoryid,l_leaderid) values(0,'$firstname','$lastname','$gender','$age','$email','$phone','$aadharno','$address','$location','$country','$state','$city','$pincode','$password','$about','available','$charge',NOW(),'$category','$leaderid')";
// echo $qry;
  		}
  		else
  		{

       $qry="insert into labor(l_id,l_firstname,l_lastname,l_gender,l_age,l_email,l_phone,l_aadharno,l_address,l_location,l_country,l_state,l_city,l_pincode,l_password,l_about,l_image,l_status,l_charge,l_date,l_categoryid,l_leaderid) values(0,'$firstname','$lastname','$gender','$age','$email','$phone','$aadharno','$address','$location','$country','$state','$city','$pincode','$password','$about','$myimg','available','$charge',NOW(),'$category','$leaderid')";
  		// echo $qry;
  		}



      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	// echo "insert record into customer table";
			echo "<script> window.location.href='labordisplay.php';</script>";
          
        }		
        else
        {
        	echo "erro not insert customer";
        }
    }
    ?>
					<form method="post" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Add Category</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-lg-4">
										
												<div class="form-group">
													<label for="password">First Name: </label>
													<input type="text" class="form-control" id="firstname3" name="firstname" placeholder="Enter First name ">
												    <span id="error_firstname3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Last Name: </label>
													<input type="text" class="form-control" id="lastname3" name="lastname" placeholder="Enter Last name ">
												    <span id="error_lastname3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">gender: </label>
													 
												      <input type="radio" name="gender" id="genderfemale" value="female"> Female
												      <input type="radio" name="gender" id="gendermale" value="male"> male
												      <span id="error_gender" class="text-danger"></span>
												
												<div class="form-group">
													<label for="password">Age: </label>
													<input type="text" class="form-control" id="age3" name="age" placeholder="Enter Age ">
												      <span id="error_age3" class="text-danger"></span>

												</div>

												<div class="form-group">
													<label for="password">Email: </label>
													<input type="text" class="form-control" id="email3" name="email" placeholder="Enter email ">
												    <span id="error_email3" class="text-danger"></span>

												</div>

												<div class="form-group">
													<label for="password">Contact no.: </label>
													<input type="text" class="form-control" id="phone3" name="phone" placeholder="Enter Contact Number ">
												    <span id="error_phone3" class="text-danger"></span>
												</div>


												<div class="form-group">
													<label for="password">Aadhar no.: </label>
													<input type="text" class="form-control" id="aadharno3" name="aadharno" placeholder="Enter Aadhar Number ">
												    <span id="error_aadharno3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Address: </label>
													<input type="text" class="form-control" id="address3" name="address" placeholder="Enter Address ">
												    <span id="error_address3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Location Name: </label>
													<input type="text" class="form-control" id="location3"
													 name="location" placeholder="Enter Location ">
												    <span id="error_location3" class="text-danger"></span>
												</div>

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
    <span id="error_country3" class="text-danger"></span>


<p align="left">State Name:
<select name="state" id="state" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select>
</p>
<span id="error_state3" class="text-danger"></span>

<p align="left">City Name:
<select name="city" id="city" style="border-radius:4px;border-width:1px;">
<option value="">Select state first</option>
</select></p>
<span id="error_city3" class="text-danger"></span>

</div>
<br>

<div class="form-control col-sm-12">
<p align="left">Select Category:
<select name="category" id="category3" style="border-radius:4px;border-width:1px;">
<option value disabled selected>select category</option>
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
</p>
<span id="error_category3" class="text-danger"></span>

</div>


												<div class="form-group">
													<label for="password">Pincode: </label>
													<input type="text" class="form-control" id="pincode3"
													 name="pincode" placeholder="Enter Pincode ">
												    <span id="error_pincode3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">About Labor: </label>
													<input type="text" class="form-control" id="about3"
													 name="about" placeholder="Enter Location ">
												    <span id="error_about3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Charge: </label>
													<input type="text" class="form-control" id="charge3"
													 name="charge" placeholder="Enter Charge ">
												    <span id="error_charge3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Leader Id: </label>
													<input type="text" class="form-control" id="leaderid3"
													 name="leaderid" placeholder="Enter Leader id ">
												    <span id="error_leaderid3" class="text-danger"></span>
												</div>


												<div class="form-group">
													<label for="password">Profile Image: </label>
													<input type="file" class="form-control"
													 name="fimage">
												</div>


												<div class="form-group">
													<label for="password">Password: </label>
													<input type="text" class="form-control" id="password3"
													 name="password" placeholder="Enter Password ">
												    <span id="error_password3" class="text-danger"></span>
												</div>

												<div class="form-group">
													<label for="password">Confirm Password: </label>
													<input type="text" class="form-control" id="confirmpassword3"
													 name="confirmpassword" placeholder="Enter Confirm Password ">
												    <span id="error_confirmpassword3" class="text-danger"></span>
												</div>



											</div>
											<div class="col-md-6 col-lg-4">				
												<!-- <div class="form-group">
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1">@</span>
														</div>
														<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group mb-3">
														<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
														<div class="input-group-append">
															<span class="input-group-text" id="basic-addon2">@example.com</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="basic-url">Your vanity URL</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
														</div>
														<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text">$</span>
														</div>
														<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
														<div class="input-group-append">
															<span class="input-group-text">.00</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">With textarea</span>
														</div>
														<textarea class="form-control" aria-label="With textarea"></textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-prepend">
															<button class="btn btn-default btn-border" type="button">Button</button>
														</div>
														<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<input type="text" class="form-control" aria-label="Text input with dropdown button">
														<div class="input-group-append">
															<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Action</a>
																<a class="dropdown-item" href="#">Another action</a>
																<a class="dropdown-item" href="#">Something else here</a>
																<div role="separator" class="dropdown-divider"></div>
																<a class="dropdown-item" href="#">Separated link</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-icon">
														<input type="text" class="form-control" placeholder="Search for...">
														<span class="input-icon-addon">
															<i class="fa fa-search"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<div class="input-icon">
														<span class="input-icon-addon">
															<i class="fa fa-user"></i>
														</span>
														<input type="text" class="form-control" placeholder="Username">
													</div>
												</div>
												<div class="form-group">
													<label class="form-label">Image Check</label>
													<div class="row">
														<div class="col-6 col-sm-4">
															<label class="imagecheck mb-4">
																<input name="imagecheck" type="checkbox" value="1" class="imagecheck-input">
																<figure class="imagecheck-figure">
																	<img src="../../assets/img/examples/product1.jpg" alt="title" class="imagecheck-image">
																</figure>
															</label>
														</div>
														<div class="col-6 col-sm-4">
															<label class="imagecheck mb-4">
																<input name="imagecheck" type="checkbox" value="2" class="imagecheck-input" checked="">
																<figure class="imagecheck-figure">
																	<img src="../../assets/img/examples/product4.jpg" alt="title" class="imagecheck-image">
																</figure>
															</label>
														</div>
														<div class="col-6 col-sm-4">
															<label class="imagecheck mb-4">
																<input name="imagecheck" type="checkbox" value="3" class="imagecheck-input">
																<figure class="imagecheck-figure">
																	<img src="../../assets/img/examples/product3.jpg" alt="title" class="imagecheck-image">
																</figure>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="form-label">Color Input</label>
													<div class="row gutters-xs">
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="dark" class="colorinput-input">
																<span class="colorinput-color bg-dark"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="primary" class="colorinput-input">
																<span class="colorinput-color bg-primary"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="secondary" class="colorinput-input">
																<span class="colorinput-color bg-secondary"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="info" class="colorinput-input">
																<span class="colorinput-color bg-info"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="success" class="colorinput-input">
																<span class="colorinput-color bg-success"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="danger" class="colorinput-input">
																<span class="colorinput-color bg-danger"></span>
															</label>
														</div>
														<div class="col-auto">
															<label class="colorinput">
																<input name="color" type="checkbox" value="warning" class="colorinput-input">
																<span class="colorinput-color bg-warning"></span>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="form-label">Size</label>
													<div class="selectgroup w-100">
														<label class="selectgroup-item">
															<input type="radio" name="value" value="50" class="selectgroup-input" checked="">
															<span class="selectgroup-button">S</span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="value" value="100" class="selectgroup-input">
															<span class="selectgroup-button">M</span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="value" value="150" class="selectgroup-input">
															<span class="selectgroup-button">L</span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="value" value="200" class="selectgroup-input">
															<span class="selectgroup-button">XL</span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<label class="form-label">Icons input</label>
													<div class="selectgroup w-100">
														<label class="selectgroup-item">
															<input type="radio" name="transportation" value="2" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="icon-screen-smartphone"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="transportation" value="1" class="selectgroup-input" checked="">
															<span class="selectgroup-button selectgroup-button-icon"><i class="icon-screen-tablet"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="transportation" value="6" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="icon-screen-desktop"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="transportation" value="6" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times"></i></span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<label class="form-label d-block">Icon input</label>
													<div class="selectgroup selectgroup-secondary selectgroup-pills">
														<label class="selectgroup-item">
															<input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="">
															<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-sun"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="icon-input" value="2" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-moon"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="icon-input" value="3" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-tint"></i></span>
														</label>
														<label class="selectgroup-item">
															<input type="radio" name="icon-input" value="4" class="selectgroup-input">
															<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-cloud"></i></span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<label class="form-label">Your skills</label>
													<div class="selectgroup selectgroup-pills">
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
															<span class="selectgroup-button">HTML</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="CSS" class="selectgroup-input">
															<span class="selectgroup-button">CSS</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="PHP" class="selectgroup-input">
															<span class="selectgroup-button">PHP</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
															<span class="selectgroup-button">JavaScript</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
															<span class="selectgroup-button">Ruby</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
															<span class="selectgroup-button">Ruby</span>
														</label>
														<label class="selectgroup-item">
															<input type="checkbox" name="value" value="C++" class="selectgroup-input">
															<span class="selectgroup-button">C++</span>
														</label>
													</div>
												</div> -->
											</div>
											<div class="col-md-6 col-lg-4">
												<!-- <label class="mb-3"><b>Form Group Default</b></label>
												<div class="form-group form-group-default">
													<label>Input</label>
													<input id="Name" type="text" class="form-control" placeholder="Fill Name">
												</div>
												<div class="form-group form-group-default">
													<label>Select</label>
													<select class="form-control" id="formGroupDefaultSelect">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<label class="mt-3 mb-3"><b>Form Floating Label</b></label>
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required>
													<label for="inputFloatingLabel" class="placeholder">Input</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required>
														<option value="">&nbsp;</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
													<label for="selectFloatingLabel" class="placeholder">Select</label>
												</div>
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
													<label for="inputFloatingLabel2" class="placeholder">Input</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-solid" id="selectFloatingLabel2" required>
														<option value="">&nbsp;</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
													<label for="selectFloatingLabel2" class="placeholder">Select</label>
												</div>
												
												<div class="form-group">
													<label for="largeInput">Large Input</label>
													<input type="text" class="form-control form-control-lg" id="largeInput" placeholder="Large Input">
												</div>
												<div class="form-group">
													<label for="largeInput">Default Input</label>
													<input type="text" class="form-control form-control" id="defaultInput" placeholder="Default Input">
												</div>
												<div class="form-group">
													<label for="smallInput">Small Input</label>
													<input type="text" class="form-control form-control-sm" id="smallInput" placeholder="Small Input">
												</div>
												<div class="form-group">
													<label for="largeSelect">Large Select</label>
													<select class="form-control form-control-lg" id="largeSelect">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<div class="form-group">
													<label for="defaultSelect">Default Select</label>
													<select class="form-control form-control" id="defaultSelect">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<div class="form-group">
													<label for="smallSelect">Small Select</label>
													<select class="form-control form-control-sm" id="smallSelect">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div> -->
											</div>
										</div>
									</div>
									<div class="card-action">
										<button class="btn btn-success" type="submit" id="signup3" name="insert">Submit</button>
										<a class="btn btn-danger" href="index.php">Cancel</a>
										<!-- <button class="btn btn-danger" type="submit" >Cancel</button> -->
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>

		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script src="./labor/laborvalidate.js"></script>

</form>
</body>
</html>