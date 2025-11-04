<!DOCTYPE html>
<?php
	include_once "connection.php";
	
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	
	$name="";
	$community="";
	if(isset($_GET['sub_community_id']))
	{
		$qry="select* from sub_community_tbl,community_tbl where community_tbl.community_id=sub_community_tbl.community_id and sub_community_id='".$_GET['sub_community_id']."'";
		$data=mysqli_query($conn,$qry);
		$row=mysqli_fetch_array($data);
		$name=$row['sub_community_name'];
		$community=$row['community_id'];
		echo $community;
	}
	if(isset($_POST['submit']))
	{
		$community_id = $_POST['community_id'];
		$sub_community_name = $_POST['subcommunity_name'];
		$status=1;              
		$check_query = "SELECT * FROM sub_community_tbl WHERE sub_community_name='$sub_community_name' and community_id='$community_id'";
		//echo $check_query;die;
		$check_result = mysqli_query($conn, $check_query);

		if(mysqli_num_rows($check_result) > 0)
		{
			$_SESSION['error'] = "Subcommunity is already exists for the selected Community";
			header('location:subcommunity_list.php');
		} 	
		else
		{
			if(isset($_GET['sub_community_id']))
			{
				$qry="update sub_community_tbl set sub_community_name='".$_POST['subcommunity_name']."',community_id='".$_POST['community_id']."' where sub_community_id='".$_GET['sub_community_id']."'" ;
				$success2=mysqli_query($conn,$qry);
				if(isset($success2))
				{
					$_SESSION['success']="Sub Community Updated ";
					header('location:subcommunity_list.php');
				}
			}
			else
			{
				$str="insert into sub_community_tbl values(NULL,'".$_POST['community_id']."','".$_POST['subcommunity_name']."','".$status."')";
				$success1=mysqli_query($conn,$str);
				if(isset($success1))
				{
					$_SESSION['success']="Sub Community Added ";
					header('location:subcommunity_list.php');
				}
			}
	    }		
	}
?>

<html class="loading" lang="en" data-textdirection="ltr">
  
	<!-- BEGIN: Head-->
	<!-- /app-users-list.html by,  04:44:44 GMT -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
		<meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
		<meta name="author" content="PIXINVENT">
		<title>Subcommunity | <?php echo $WEB_TITLE;?></title>
		<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
		<link rel="shortcut icon" type="image/x-icon" href="images/admin_logo1.png">
		<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

		<!-- BEGIN: Vendor CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
		<!-- END: Vendor CSS-->

		<!-- BEGIN: Theme CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
		<!-- END: Theme CSS-->

		<!-- BEGIN: Page CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
		<!-- END: Page CSS-->

		<!-- BEGIN: Custom CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!-- END: Custom CSS-->
	</head>
	<!-- END: Head-->

	<!-- BEGIN: Body-->
	<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

	<!-- BEGIN: Header-->
    <?php include_once 'header.php';?>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
	<?php include_once 'sidebar.php';?>
    <!-- END: Main Menu-->
	
    <!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-12 mb-2 mt-1">
					<div class="breadcrumbs-top">
						<h5 class="content-header-title float-left pr-1 mb-0">Community</h5>
						<div class="breadcrumb-wrapper d-none d-sm-block">
							<ol class="breadcrumb p-0 mb-0 pl-1">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a></li>
								<li class="breadcrumb-item"><a href="#">Subcommunity</a></li>
								<li class="breadcrumb-item active">Add Subcommunity</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body">
				<!-- Simple Validation start -->
				<section class="simple-validation">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Sub Community</h4>
								</div>
								<div class="card-body">
									<form id="jquery-val-form" method="POST">
										<div class="form-group">
											<label for="select-subcommunity">Community</label>
											<select class="form-control select2" id="select-subcommunity" name="community_id">
												<option selected hidden value="">Select Community</option>
												<?php 
													$qry="select* from community_tbl where community_status=1";
													$res=mysqli_query($conn,$qry);
													
													while($data=mysqli_fetch_array($res))
													{
												?>
														<option value="<?php echo $data['community_id'] ?>" <?php if($community==$data['community_id']){ echo 'selected'; } ?>><?php echo $data['community_name'] ?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label" for="subcommunity">Sub Community</label>
											<input type="text" class="form-control" id="basic-default-name" name="subcommunity_name" value="<?php echo $name;?>" placeholder="Enter SubCommunity" required />
										</div>
										
										<div class="row">
											<div class="col-12">
												<button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Input Validation end -->
			</div>
		</div>
    </div>
    <!-- END: Content-->
	
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
		<p class="clearfix mb-0"><span class="float-left d-inline-block">2021 &copy; Vivahmilan</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="PIXINVENT" target="_blank">Vivahmilan</a></span>
			<button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
		</p>
    </footer>
    <!-- END: Footer-->
<!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/validation/form-validation.js"></script>
	
	</body>
	<!-- END: Body-->
	
	<script>
		/*jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});*/
		$( "#jquery-val-form" ).validate({
			rules:
			{
			/* image: {
				required: true,
				extension: "jpeg|png|jpg",
				}, */
				/*document: {
				  required: true,
				  extension: "pdf|doc|ppt",
				  },*/
				subcommunity_name: 
				{
					lettersonly: true,
					minlength: 3
				},
				/* sub_price:
				{
					minlength: 6
					maxlength: 10				
				}*/
			}	
		});
		jQuery.validator.addMethod("lettersonly", function(value, element) {
			return this.optional(element) || /^[a-z\s]+$/i.test(value);
		}, "Only alphabetical characters");

		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
			$("#success-alert").slideUp(500);
		});
	</script>
<!-- /app-users-list.html by,  04:44:44 GMT -->
</html>