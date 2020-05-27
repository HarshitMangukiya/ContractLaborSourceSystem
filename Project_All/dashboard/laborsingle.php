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
	<title>Tables - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
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
	<!-- <link rel="stylesheet" href="../../assets/css/demo.css"> -->
	<style type="text/css">
		.detail1{
		padding: 30px;background-color: #f9f9ff; margin-bottom: 30px;color: #777777;
	    font-family: Poppins, sans-serif;
	    font-size: 17px;
	    font-weight: 300;
	    line-height: 1.625em;
		}


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
</head>
<!-- <?php


											if(isset($_POST['update']))
											{
												$name=ucfirst($_POST['category']);

										   $qry="update category set ca_name='$name' where ca_id=".$_REQUEST['caid'];
										      	// echo $qry;
												$res=mysqli_query($con,$qry);
												if($res>0)
												{
													// header("location:index.php");
													echo "update record";
												}		
												else
											    {
											      	echo "erro not insert category";
											    }
											}
									  	?> -->
<body>
    <form method="post" enctype="multipart/form-data">

	<div class="wrapper">
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
										<div class="dropdown-divider"></div>
									<!-- 	<a class="dropdown-item" href="#">My Profile</a>
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
									<!-- <li>
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
					<!-- 	<li class="nav-item">
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
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../forms/forms.html">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
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
												<li>
													<a href="laborinsert.php">
														<span class="sub-item">Add New Labor</span>
													</a>
												</li>
												<li>
													<a href="labordisplay.php">
														<span class="sub-item">Edit Labor Detail</span>
													</a>
												</li>
												<li class="active">
													<a href="#">
														<span class="sub-item">View Labor Detail</span>
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
						<h4 class="page-title">Database</h4>
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
								<a href="#">Edit Labor Detail</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">View Labor Detail</a>
							</li>
						</ul>
					</div>
					<div class="row">
<!-- 						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Basic</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Age</th>
													<th>Start date</th>
													<th>Salary</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Age</th>
													<th>Start date</th>
													<th>Salary</th>
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td>Tiger Nixon</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
													<td>61</td>
													<td>2011/04/25</td>
													<td>$320,800</td>
												</tr>
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
 -->
<!-- 						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Multi Filter Select</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Age</th>
													<th>Start date</th>
													<th>Salary</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Age</th>
													<th>Start date</th>
													<th>Salary</th>
												</tr>
											</tfoot>
												<tbody>
												<tr>
													<td>Tiger Nixon</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
													<td>61</td>
													<td>2011/04/25</td>
													<td>$320,800</td>
												</tr>
												<tr>
													<td>Garrett Winters</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>63</td>
													<td>2011/07/25</td>
													<td>$170,750</td>
												</tr>
												<tr>
													<td>Ashton Cox</td>
													<td>Junior Technical Author</td>
													<td>San Francisco</td>
													<td>66</td>
													<td>2009/01/12</td>
													<td>$86,000</td>
												</tr>
												<tr>
													<td>Cedric Kelly</td>
													<td>Senior Javascript Developer</td>
													<td>Edinburgh</td>
													<td>22</td>
													<td>2012/03/29</td>
													<td>$433,060</td>
												</tr>
												<tr>
													<td>Airi Satou</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>33</td>
													<td>2008/11/28</td>
													<td>$162,700</td>
												</tr>
												<tr>
													<td>Brielle Williamson</td>
													<td>Integration Specialist</td>
													<td>New York</td>
													<td>61</td>
													<td>2012/12/02</td>
													<td>$372,000</td>
												</tr>
												<tr>
													<td>Herrod Chandler</td>
													<td>Sales Assistant</td>
													<td>San Francisco</td>
													<td>59</td>
													<td>2012/08/06</td>
													<td>$137,500</td>
												</tr>
												<tr>
													<td>Rhona Davidson</td>
													<td>Integration Specialist</td>
													<td>Tokyo</td>
													<td>55</td>
													<td>2010/10/14</td>
													<td>$327,900</td>
												</tr>
												<tr>
													<td>Colleen Hurst</td>
													<td>Javascript Developer</td>
													<td>San Francisco</td>
													<td>39</td>
													<td>2009/09/15</td>
													<td>$205,500</td>
												</tr>
												<tr>
													<td>Sonya Frost</td>
													<td>Software Engineer</td>
													<td>Edinburgh</td>
													<td>23</td>
													<td>2008/12/13</td>
													<td>$103,600</td>
												</tr>
												<tr>
													<td>Jena Gaines</td>
													<td>Office Manager</td>
													<td>London</td>
													<td>30</td>
													<td>2008/12/19</td>
													<td>$90,560</td>
												</tr>
												<tr>
													<td>Quinn Flynn</td>
													<td>Support Lead</td>
													<td>Edinburgh</td>
													<td>22</td>
													<td>2013/03/03</td>
													<td>$342,000</td>
												</tr>
												<tr>
													<td>Charde Marshall</td>
													<td>Regional Director</td>
													<td>San Francisco</td>
													<td>36</td>
													<td>2008/10/16</td>
													<td>$470,600</td>
												</tr>
												<tr>
													<td>Haley Kennedy</td>
													<td>Senior Marketing Designer</td>
													<td>London</td>
													<td>43</td>
													<td>2012/12/18</td>
													<td>$313,500</td>
												</tr>
												<tr>
													<td>Tatyana Fitzpatrick</td>
													<td>Regional Director</td>
													<td>London</td>
													<td>19</td>
													<td>2010/03/17</td>
													<td>$385,750</td>
												</tr>
												<tr>
													<td>Michael Silva</td>
													<td>Marketing Designer</td>
													<td>London</td>
													<td>66</td>
													<td>2012/11/27</td>
													<td>$198,500</td>
												</tr>
												<tr>
													<td>Paul Byrd</td>
													<td>Chief Financial Officer (CFO)</td>
													<td>New York</td>
													<td>64</td>
													<td>2010/06/09</td>
													<td>$725,000</td>
												</tr>
												<tr>
													<td>Gloria Little</td>
													<td>Systems Administrator</td>
													<td>New York</td>
													<td>59</td>
													<td>2009/04/10</td>
													<td>$237,500</td>
												</tr>
												<tr>
													<td>Bradley Greer</td>
													<td>Software Engineer</td>
													<td>London</td>
													<td>41</td>
													<td>2012/10/13</td>
													<td>$132,000</td>
												</tr>
												<tr>
													<td>Dai Rios</td>
													<td>Personnel Lead</td>
													<td>Edinburgh</td>
													<td>35</td>
													<td>2012/09/26</td>
													<td>$217,500</td>
												</tr>
												<tr>
													<td>Jenette Caldwell</td>
													<td>Development Lead</td>
													<td>New York</td>
													<td>30</td>
													<td>2011/09/03</td>
													<td>$345,000</td>
												</tr>
												<tr>
													<td>Yuri Berry</td>
													<td>Chief Marketing Officer (CMO)</td>
													<td>New York</td>
													<td>40</td>
													<td>2009/06/25</td>
													<td>$675,000</td>
												</tr>
												<tr>
													<td>Caesar Vance</td>
													<td>Pre-Sales Support</td>
													<td>New York</td>
													<td>21</td>
													<td>2011/12/12</td>
													<td>$106,450</td>
												</tr>
												<tr>
													<td>Doris Wilder</td>
													<td>Sales Assistant</td>
													<td>Sidney</td>
													<td>23</td>
													<td>2010/09/20</td>
													<td>$85,600</td>
												</tr>
												<tr>
													<td>Angelica Ramos</td>
													<td>Chief Executive Officer (CEO)</td>
													<td>London</td>
													<td>47</td>
													<td>2009/10/09</td>
													<td>$1,200,000</td>
												</tr>
												<tr>
													<td>Gavin Joyce</td>
													<td>Developer</td>
													<td>Edinburgh</td>
													<td>42</td>
													<td>2010/12/22</td>
													<td>$92,575</td>
												</tr>
												<tr>
													<td>Jennifer Chang</td>
													<td>Regional Director</td>
													<td>Singapore</td>
													<td>28</td>
													<td>2010/11/14</td>
													<td>$357,650</td>
												</tr>
												<tr>
													<td>Brenden Wagner</td>
													<td>Software Engineer</td>
													<td>San Francisco</td>
													<td>28</td>
													<td>2011/06/07</td>
													<td>$206,850</td>
												</tr>
												<tr>
													<td>Fiona Green</td>
													<td>Chief Operating Officer (COO)</td>
													<td>San Francisco</td>
													<td>48</td>
													<td>2010/03/11</td>
													<td>$850,000</td>
												</tr>
												<tr>
													<td>Shou Itou</td>
													<td>Regional Marketing</td>
													<td>Tokyo</td>
													<td>20</td>
													<td>2011/08/14</td>
													<td>$163,000</td>
												</tr>
												<tr>
													<td>Michelle House</td>
													<td>Integration Specialist</td>
													<td>Sidney</td>
													<td>37</td>
													<td>2011/06/02</td>
													<td>$95,400</td>
												</tr>
												<tr>
													<td>Suki Burks</td>
													<td>Developer</td>
													<td>London</td>
													<td>53</td>
													<td>2009/10/22</td>
													<td>$114,500</td>
												</tr>
												<tr>
													<td>Prescott Bartlett</td>
													<td>Technical Author</td>
													<td>London</td>
													<td>27</td>
													<td>2011/05/07</td>
													<td>$145,000</td>
												</tr>
												<tr>
													<td>Gavin Cortez</td>
													<td>Team Leader</td>
													<td>San Francisco</td>
													<td>22</td>
													<td>2008/10/26</td>
													<td>$235,500</td>
												</tr>
												<tr>
													<td>Martena Mccray</td>
													<td>Post-Sales support</td>
													<td>Edinburgh</td>
													<td>46</td>
													<td>2011/03/09</td>
													<td>$324,050</td>
												</tr>
												<tr>
													<td>Unity Butler</td>
													<td>Marketing Designer</td>
													<td>San Francisco</td>
													<td>47</td>
													<td>2009/12/09</td>
													<td>$85,675</td>
												</tr>
												<tr>
													<td>Howard Hatfield</td>
													<td>Office Manager</td>
													<td>San Francisco</td>
													<td>51</td>
													<td>2008/12/16</td>
													<td>$164,500</td>
												</tr>
												<tr>
													<td>Hope Fuentes</td>
													<td>Secretary</td>
													<td>San Francisco</td>
													<td>41</td>
													<td>2010/02/12</td>
													<td>$109,850</td>
												</tr>
												<tr>
													<td>Vivian Harrell</td>
													<td>Financial Controller</td>
													<td>San Francisco</td>
													<td>62</td>
													<td>2009/02/14</td>
													<td>$452,500</td>
												</tr>
												<tr>
													<td>Timothy Mooney</td>
													<td>Office Manager</td>
													<td>London</td>
													<td>37</td>
													<td>2008/12/11</td>
													<td>$136,200</td>
												</tr>
												<tr>
													<td>Jackson Bradshaw</td>
													<td>Director</td>
													<td>New York</td>
													<td>65</td>
													<td>2008/09/26</td>
													<td>$645,750</td>
												</tr>
												<tr>
													<td>Olivia Liang</td>
													<td>Support Engineer</td>
													<td>Singapore</td>
													<td>64</td>
													<td>2011/02/03</td>
													<td>$234,500</td>
												</tr>
												<tr>
													<td>Bruno Nash</td>
													<td>Software Engineer</td>
													<td>London</td>
													<td>38</td>
													<td>2011/05/03</td>
													<td>$163,500</td>
												</tr>
												<tr>
													<td>Sakura Yamamoto</td>
													<td>Support Engineer</td>
													<td>Tokyo</td>
													<td>37</td>
													<td>2009/08/19</td>
													<td>$139,575</td>
												</tr>
												<tr>
													<td>Thor Walton</td>
													<td>Developer</td>
													<td>New York</td>
													<td>61</td>
													<td>2013/08/11</td>
													<td>$98,540</td>
												</tr>
												<tr>
													<td>Finn Camacho</td>
													<td>Support Engineer</td>
													<td>San Francisco</td>
													<td>47</td>
													<td>2009/07/07</td>
													<td>$87,500</td>
												</tr>
												<tr>
													<td>Serge Baldwin</td>
													<td>Data Coordinator</td>
													<td>Singapore</td>
													<td>64</td>
													<td>2012/04/09</td>
													<td>$138,575</td>
												</tr>
												<tr>
													<td>Zenaida Frank</td>
													<td>Software Engineer</td>
													<td>New York</td>
													<td>63</td>
													<td>2010/01/04</td>
													<td>$125,250</td>
												</tr>
												<tr>
													<td>Zorita Serrano</td>
													<td>Software Engineer</td>
													<td>San Francisco</td>
													<td>56</td>
													<td>2012/06/01</td>
													<td>$115,000</td>
												</tr>
												<tr>
													<td>Jennifer Acosta</td>
													<td>Junior Javascript Developer</td>
													<td>Edinburgh</td>
													<td>43</td>
													<td>2013/02/01</td>
													<td>$75,650</td>
												</tr>
												<tr>
													<td>Cara Stevens</td>
													<td>Sales Assistant</td>
													<td>New York</td>
													<td>46</td>
													<td>2011/12/06</td>
													<td>$145,600</td>
												</tr>
												<tr>
													<td>Hermione Butler</td>
													<td>Regional Director</td>
													<td>London</td>
													<td>47</td>
													<td>2011/03/21</td>
													<td>$356,250</td>
												</tr>
												<tr>
													<td>Lael Greer</td>
													<td>Systems Administrator</td>
													<td>London</td>
													<td>21</td>
													<td>2009/02/27</td>
													<td>$103,500</td>
												</tr>
												<tr>
													<td>Jonas Alexander</td>
													<td>Developer</td>
													<td>San Francisco</td>
													<td>30</td>
													<td>2010/07/14</td>
													<td>$86,500</td>
												</tr>
												<tr>
													<td>Shad Decker</td>
													<td>Regional Director</td>
													<td>Edinburgh</td>
													<td>51</td>
													<td>2008/11/13</td>
													<td>$183,000</td>
												</tr>
												<tr>
													<td>Michael Bruce</td>
													<td>Javascript Developer</td>
													<td>Singapore</td>
													<td>29</td>
													<td>2011/06/27</td>
													<td>$183,000</td>
												</tr>
												<tr>
													<td>Donna Snider</td>
													<td>Customer Support</td>
													<td>New York</td>
													<td>27</td>
													<td>2011/01/25</td>
													<td>$112,000</td>
												</tr>
											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div> -->

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
										<h4 class="card-title">View Labor Detail</h4>
								</div>
								<div class="card-body">
									
									
<!-- 									<?php 
										if(isset($_REQUEST['caid']))
										{
											$con=mysqli_connect("localhost","root","","labor");
											$qry="delete from category where ca_id=".$_REQUEST['caid'];
											$res=mysqli_query($con,$qry);
											if($res==1)
											{
												// echo "delete record from category table";
												// header("location:category.php");
											}
											else
											{
												echo "not delete";
											}
										}
									?> -->

									<!-- <div class="table-responsive"> -->
										<!-- <table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th style="width:10">Id</th>
													<th>Firstname</th>
													<th>Lastname</th>
													<th>Gender</th>
													<th>Age</th>
													<th>Email</th>
													<th>Phone no.</th>
													<th>Aadhar no.</th>
													<th>Address</th>
													<th>Location</th>
													<th>Country</th>
													<th>State</th>
													<th>City</th>
													<th>Pincode</th>
													<th>About Labor</th>
													<th>Profile Picture</th>		
													<th>Category</th>
													<th>Status</th>
													<th>Charge</th>
													<th>Password</th>
													<th>Leader Id</th>
													<th>Reg.date</th>		
													<th style="width: 10%">Action</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Id</th>
													<th>Firstname</th>
													<th>Lastname</th>
													<th>Gender</th>
													<th>Age</th>
													<th>Email</th>
													<th>Phone no.</th>
													<th>Aadhar no.</th>
													<th>Address</th>
													<th>Location</th>
													<th>Country</th>
													<th>State</th>
													<th>City</th>
													<th>Pincode</th>
													<th>About Labor</th>
													<th>Profile Picture</th>		
													<th>Category</th>
													<th>Status</th>
													<th>Charge</th>
													<th>Password</th>
													<th>Leader Id</th>
													<th>Reg.date</th>
													<th>Action</th>
													<th>Action</th>
											</tr>
											</tfoot>
											<tbody> -->
											
											<?php
											if(isset($_REQUEST['laid']))
											{
												unset($_SESSION['laborname']);
												$_SESSION['laborname']=$_REQUEST['laid'];
											}

											if(isset($_SESSION['laborname']))
											{

												$qry="select * from labor where l_id=".$_SESSION['laborname'];
												$res=mysqli_query($con,$qry);
												while($row=mysqli_fetch_row($res))
													{
														if(empty($row[16]))
														{
															$imagename="../../../img/avatar-13.jpg";
														}
														else
														{
															$imagename="../../../Labor/labor_img/".$row
															[0].'/'.$row[16];
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
														if(!empty($row[10]))
														{
														$qry1="select * from country where id=".$row[10];
														$res1=mysqli_query($con,$qry1);
														while($row1=mysqli_fetch_row($res1))
															{
																$country=$row1[1];
															}
														}
														if(!empty($row[11]))
														{
														$qry1="select * from state where s_id=".$row[11];
														$res1=mysqli_query($con,$qry1);
														while($row1=mysqli_fetch_row($res1))
															{
																$state=$row1[1];
															}
														}
														if(!empty($row[12]))
														{
														$qry1="select * from city where ci_id=".$row[12];
														$res1=mysqli_query($con,$qry1);
														while($row1=mysqli_fetch_row($res1))
															{
																$city=$row1[1];
															}
														}
													?>
													<!-- <tr>
													<td><?php echo $row[0];?></td>
													<td><a href="laborsingle.php?laid=<?php echo $row[0]; ?>"><?php echo $row[1];?></a></td>
													<td><?php echo $row[2];?></td>
													<td><?php echo $row[3];?></td>
													<td><?php echo $row[4];?></td>
													<td><?php echo $row[5];?></td>
													<td><?php echo $row[6];?></td>
													<td><?php echo $row[7];?></td>
													<td><?php echo $row[8];?></td>
													<td><?php echo $row[9];?></td>
													<td><?php echo $country;?></td>
													<td><?php echo $state;?></td>
													<td><?php echo $city;?></td>
													<td><?php echo $row[13];?></td>
													<td><?php echo $row[15];?></td>
													<td><img src="<?php echo $imagename; ?>" width="100px" height=100></td>
													<td><?php echo $category;?></td>
													<td><?php echo $row[17];?></td>
													<td><?php echo $row[18];?></td>
													<td><?php echo $row[14];?></td>	
													<td><?php echo $row[21];?></td>
													<td><?php echo $row[19];?></td>
													<td>
														<div class="form-button-action">
															<a href="labortable.php?laid=<?php echo $row[0]; ?>" class="btn btn-link btn-primary btn-lg">		
																<i class="fa fa-edit"></i>
															</a>
														</div></td>						
													<td>
														<div class="form-button-action">
														<a href="labortable.php?laid=<?php echo $row[0]; ?>" class="btn btn-link btn-danger">	
														<i class="fa fa-times"></i>
														</a>
														</div>

													</td>		
													</tr> -->
							
							<div class="detail1">
								<div class="row">
										<div class="col-sm-2">
											<img src="<?php echo $imagename; ?>" width="110px" height="110px"
											style="border-radius:5px;position:relative;z-index:1; box-shadow:0 5px 20px rgba(0,0,0,0.2);">

										</div>
										<div class="col-sm-10">

											<div class="row">
												<div  class="col-sm-12"><h5>Labor Id: <?php echo $row[0];?></h5></div>	
											</div>	
											<h3 class="text-uppercase"><?php echo $row[1].' '.$row[2];?></h3>
											<h5> Age: <?php echo $row[4];?> &nbsp &nbsp &nbsp Gender: <?php echo $row[3];?></h5>					
										
										<h5><span class="icon-phone"> </span><?php echo $row[6];?></h5>
										<h5><span class="icon-map"></span> <?php echo $row[8];?></h5>
										<h4><span class="lnr lnr-database"></span> &#x20a8; <?php echo $row[18];?> &nbsp &nbsp &nbsp Status: <?php echo $row[17];?></h4>
									<!-- </div> -->
								    </div>
								</div>
							</div>


							<!-- insert image start -->
<?php
	// $filetype=0;
	if(isset($_POST['insertimg']))
	{

	      $filetype=$_POST['filetype'];

	      $lid=$_SESSION['laborname'];
	      $laborid=$lid;
	        
	        if($filetype==1)
	        {
		        if(isset($_FILES["workimage"]))
		        {
		          	$path="../../../Labor/labor_img/";
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
		                      // echo $myimg;
		                      
		                      $qry3="insert into image values(0,'$myimg','$filetype','$laborid')";
		                    
		                      // echo $qry3;
		                      $res3=mysqli_query($con,$qry3);
		                      if($res3>0)
		                      {
		                        // echo "insert record into image table";
		                        // header("location:profile.php");
		                        echo "<script> window.location.href='laborsingle.php';</script>";

		                      }   
		                      else
		                      {
		                        echo "erro not insert image";
		                      }


		                      $targetpath=$path.$foldername."/".$myimg;
		                      if(move_uploaded_file($_FILES['workimage']['tmp_name'][$i],$targetpath))
		                      {
		                        // echo "insert multi image";
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
		    	
		    	$video=str_replace('https://youtu.be/','',$_POST['video']);
		    	// echo $video;
		    	
		      	$qry="insert into image values(0,'$video','$filetype','$laborid')";
		      	$res=mysqli_query($con,$qry);
		        if($res>0)
		        {
		        	// echo "insert record into video table";
		          // header("location:categoryadmin.php");
		            echo "<script> window.location.href='laborsingle.php';</script>";
		        }		
		        else
		        {
		        	echo "erro not insert video";
		        }
		    }

	}


	if(isset($_REQUEST['did']))
	{

	  $path1="../../../Labor/labor_img/";

			
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
		        echo "<script> window.location.href='laborsingle.php';</script>";

			}
			else
			{
				echo "not delete record";
			}
	}

?>
<!-- insert image End -->

							<div class="detail1">
								<div class="row">
									<div class="col-sm-12">
									<h3>Add Image & Video</h3>

								 <h5>
								<img src="../../../img/pages/list.jpg" alt=""> File Type: 
								<select name="filetype" id="filetype" style="border-radius:4px;">
									<option value disabled selected>Select FileType</option>
									<option value="1">image</option>
									<option value="2">Video</option>
								</select>
								<span id="error_filetype" class="text-danger"></span></h5>
								
								<h5> 
								<img src="../../../img/pages/list.jpg"> Video Link:  
								<input type="text" name="video" id="video" >
								<span id="error_video" class="text-danger"></span></h5>


								<h5>Ex: You have to insert only red text in video link https://youtu.be/<strong style="color:red;text-decoration: underline;">Mc3Vt37d04M</strong> and You can insert share link Ex: https://youtu.be/ZVG5u3_o93U</h5>

							    <h5><img src="../../../img/pages/list.jpg">							
								Work Image: <input type="file" id="workimage" name="workimage[]" multiple>
								<span id="error_workimage" class="text-danger"></span></h5>

								
								<input type="submit" name="insertimg" id="insertimg" class="btn btn-success">

									</div>
								</div>
							</div>

							<div class="detail1">
								<div class="row">
									<div class="col-sm-12">
									<h3>Work Image</h3>	
									<?php
										$count=0;
										$qry4="select * from image where i_laborid='$row[0]' and i_flag='1' group by i_id"; 
									    $res4=mysqli_query($con,$qry4);
										while($row4=mysqli_fetch_row($res4))
								        {

								        if($count==5)
								        {
								           $count=0;
								        ?>
								        <br>
								        <?php
								        }	   
								        ?>
								        <div class="gallery">							        
										<img src="../../../labor/labor_img/<?php echo $row[0];?>/<?php echo $row4[1]; ?>" >
										<div class="desc"><a href="laborsingle.php?did=<?php echo $row4[0]; ?>" class="ticker-btn" onclick="return confirm('Are you sure to delete image ?')?true:false;">Delete</a></div>
										
										</div>
										<?php
										$count++;
									    }
									?>
									</div>
								</div>
							</div>

							<div class="detail1">
								<div class="row">
									<div class="col-sm-12">
									<h3>Work Video</h3>	
									<?php
									$count1=0;
									$qry4="select * from image where i_laborid='$row[0]' and i_flag='2'"; 
									// echo $qry4;
								    $res4=mysqli_query($con,$qry4);
								    
									while($row4=mysqli_fetch_row($res4))
							        {
							        
							        if($count1==5)
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
							        	<div class="desc"><a href="laborsingle.php?did=<?php echo $row4[0]; ?>" class="ticker-btn" onclick="return confirm('Are you sure to delete image ?')?true:false;">Delete</a></div>
										
										</div>
							        	<?php
									$count1++;
								    }
								    ?>
									</div>
								</div>
							</div>
							<div class="detail1">

								<h3>Personal Information</h3>
								
								
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Email: <?php echo $row[5]; ?></span>
										<br>

										<img src="../../../img/pages/list.jpg" alt="">
										<span>Aadhar no.: <?php echo $row[7]; ?></span>
										<br>
									
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Location: <?php echo $row[9]; ?></span>
										<br>
									
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Country: <?php echo $country; ?></span>
										<br>

										<img src="../../../img/pages/list.jpg" alt="">
										<span>State: <?php echo $state; ?></span>
										<br>

										<img src="../../../img/pages/list.jpg" alt="">
										<span>City: <?php echo $city; ?></span>
										<br>

										<img src="../../../img/pages/list.jpg" alt="">
										<span>Pincode: <?php echo $row[13]; ?></span>
										<br>

										<img src="../../../img/pages/list.jpg" alt="">
										<span>About Labor: <?php echo $row[15]; ?></span>
										<br>
									
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Category: <?php echo $category; ?></span>
										<br>
									
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Password: <?php echo $row[14]; ?></span>
										<br>
									
									
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Leader id: <?php echo $row[21]; ?></span>		
										<br>								
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Leader Name: 
											<?php
									    	    $qry3="select * from labor where l_id='$row[21]'"; 
											    $res3=mysqli_query($con,$qry3);
												while($row3=mysqli_fetch_row($res3))
										        {
										        	echo $row3[1].' '.$row3[2];
											    }
										        ?></span>
										
										<br>
										<img src="../../../img/pages/list.jpg" alt="">
										<span>Registration Date: <?php echo $row[19]; ?></span>		
							</div>
													<?php
													}
											}
											?>

								<!-- 			</tbody>
										</table> -->
									<!-- </div> -->
								</div>
							</div>
						</div>
					</div>
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
	<!-- Datatables -->
	
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
				"pageLength": 5,	
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').dataTable();

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
	<script src="labor/image.js"></script>
</form>
</body>
</html>