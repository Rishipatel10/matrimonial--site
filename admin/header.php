<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
?>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="navbar-wrapper">
        <div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
					</ul>
				</div>
				<ul class="nav navbar-nav float-right">
					<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
					<!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a> -->
						<!-- <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
							<li class="dropdown-menu-header">
								<div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
							</li>
							<li class="scrollable-container media-list">
							<a class="d-flex justify-content-between" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar mr-1 m-0"><img src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="39" width="39"></div>
									</div>
									<div class="media-body">
									  <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between read-notification cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar mr-1 m-0"><img src="app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6><small class="notification-text">You have 18 unread messages</small>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center py-0">
									<div class="media-left pr-0"><img class="mr-1" src="app-assets/images/icon/sketch-mac-icon.png" alt="avatar" height="39" width="39"></div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6><small class="notification-text">Sketch 50.2 is currently newly added</small>
									</div>
									<div class="media-right pl-0">
										<div class="row border-left text-center">
											<div class="col-12 px-50 py-75 border-bottom">
											  <h6 class="media-heading text-bold-500 mb-0">Update</h6>
											</div>
											<div class="col-12 px-50 py-75">
											  <h6 class="media-heading mb-0">Close</h6>
											</div>
										</div>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
									</div>
								</div>
							</a>
							<a href="javascript:void(0);">
								<div class="media d-flex align-items-center justify-content-between">
									<div class="media-left pr-0">
										<div class="media-body">
											<h6 class="media-heading">New Offers</h6>
										</div>
									</div>
									<div class="media-right">
										<div class="custom-control custom-switch">
											<input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
											<label class="custom-control-label" for="notificationSwtich"></label>
										</div>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6><small class="notification-text">6 hrs ago</small>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between read-notification cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar mr-1 m-0"><img src="app-assets/images/portrait/small/avatar-s-4.jpg" alt="avatar" height="39" width="39"></div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6><small class="notification-text">4 hrs ago</small>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
								<div class="media d-flex align-items-center">
									<div class="media-left pr-0">
										<div class="avatar bg-rgba-danger m-0 mr-1 p-25">
											<div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
									</div>
								</div>
							</a>
							<a class="d-flex justify-content-between cursor-pointer" href="javascript:void(0);">
							<div class="media d-flex align-items-center border-0">
									<div class="media-left pr-0">
										<div class="avatar mr-1 m-0"><img src="app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
									</div>
									<div class="media-body">
										<h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
									</div>
							</div></a></li>
							<li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
						</ul>
					</li> -->
					<li class="dropdown dropdown-user nav-item">
						<a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
							<div class="user-nav d-sm-flex d-none">
								<?php 
									$str="select* from admin_tbl where admin_id='".$_SESSION['id']."'";
									$data=mysqli_query($conn,$str);
									$row=mysqli_fetch_array($data);
								?>
								<span class="user-name"><?php if(isset($_SESSION["name"])){echo $row["admin_name"]; }?></span><span class="user-status text-muted">Admin</span>
							</div>
							
							<span>
								<img class="round" src="admin_profiles/<?php if(isset($_SESSION["profile"])){echo $row["admin_profile"];}?>" alt="avatar" height="40" width="40">
							</span>
						</a>
						
						<div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="admin_edit_profile.php"><i class="bx bx-user mr-50"></i>Edit Profile</a>
							<div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="change_password.php"><i class="fa fa-pencil mr-50" style='font-size:16px'></i>Change Password</a>
							<!-- <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="index.php"><i class="bx bx-power-off mr-50"></i>Login</a>	 -->
							<div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="admin_logout.php"><i class="fa fa-sign-out mr-50" style='font-size:16px'></i>Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
	