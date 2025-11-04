<!DOCTYPE html>
<?php
	include_once "connection.php";
?>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>Set Password | <?php echo $WEB_TITLE;?></title>
		<link rel="icon" type="image/x-icon" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/assets/img/favicon/favicon.ico" />
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600&family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
		<link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
		<link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
		<link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="assets/css/demo.css" />
		<link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
		<link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
		<link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">
		<script src="assets/vendor/js/helpers.js"></script>
		<script src="assets/vendor/js/template-customizer.js"></script>
		<script src="assets/js/config.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<style>
			/* Custom styles for Reset Password Page */
			body {
				background-color: #f4f6f9;
				font-family: 'IBM Plex Sans', sans-serif;
				color: #333;
			}

			.container-xxl {
				display: flex;
				justify-content: center;
				align-items: center;
				min-height: 100vh;
			}

			.authentication-wrapper {
				background: white;
				padding: 2rem;
				box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
				border-radius: 10px;
				max-width: 400px;
				width: 100%;
			}

			.app-brand {
				display: flex;
				justify-content: center;
				margin-bottom: 1.5rem;
			}

			.app-brand-logo {
				width: 40px;
				height: 40px;
			}

			.app-brand-text {
				font-size: 24px;
				font-weight: 600;
				color: #4880EA;
				margin-left: 10px;
			}

			.card-body {
				padding: 2rem;
			}

			.card-body h4 {
				font-size: 1.5rem;
				font-weight: 600;
				color: #333;
				margin-bottom: 1rem;
			}

			.card-body p {
				font-size: 1rem;
				color: #888;
				margin-bottom: 1.5rem;
			}

			.form-label {
				font-weight: 600;
				color: #333;
			}

			.form-control {
				border-radius: 8px;
				border: 1px solid #ddd;
				padding: 0.75rem;
				margin-bottom: 1.5rem;
				font-size: 1rem;
			}

			.form-control:focus {
				border-color: #4880EA;
				box-shadow: 0 0 8px rgba(72, 128, 234, 0.3);
			}

			.btn-primary {
				background-color: #4880EA;
				border-color: #4880EA;
				color: white;
				font-size: 1.1rem;
				padding: 0.75rem 1.5rem;
				width: 100%;
				border-radius: 8px;
				cursor: pointer;
			}

			.btn-primary:hover {
				background-color: #3774c6;
				border-color: #3774c6;
			}

			.text-center {
				text-align: center;
				margin-top: 1rem;
			}

			.text-center a {
				color: #4880EA;
				font-weight: 500;
			}

			.text-center a:hover {
				text-decoration: underline;
			}

			/* Responsive Design */
			@media (max-width: 600px) {
				.container-xxl {
					padding: 0 1rem;
				}
			}
		</style>
	</head>
	<body>
	<?php
		if(isset($_POST['sbtn']))
		{
			if ($_POST['pwd'] == $_POST['cpwd'])  
			{
				$mail = $_SESSION['member_email'];
				$str = "UPDATE member_tbl SET member_password = '".$_POST['cpwd']."' WHERE member_email = '".$mail."'";
				mysqli_query($conn, $str);
	?>
				<script>
					swal({
						title: 'Good Job',
						text: 'Your Password is successfully reset..',
						icon: "success",
					}).then(function() {
						window.location.href = "logout.php";
					});
				</script>
	<?php
			}
			else
			{
	?>
				<script>
					swal({
						title: "OOPS!",
						text: "Password Did Not Match",
						icon: "error",
					});
				</script>
	<?php
			}
		}
	?> 

	<!-- Content -->
	<div class="container-xxl">
		<div class="authentication-wrapper">
			<div class="authentication-inner">
				<div class="card">
					<div class="card-body">
						<div class="app-brand">
							<a href="index.php" class="app-brand-link">
								<span class="app-brand-logo"></span>
								<span class="app-brand-text">Vivahmilan</span>
							</a>
						</div>
						<h4>Reset Password 🔒</h4>
						<p>for <span class="fw-bold"><?php echo $_SESSION['member_email'];?></span></p>
						<form id="custom_val" class="mb-3" method="POST">
							<div class="mb-3 form-password-toggle">
								<label class="form-label" for="password">New Password</label><br>
								<input type="password" id="password" class="form-control" name="pwd" placeholder="••••••••" style="width: 320px;" aria-describedby="password" />
							</div>
							<div class="mb-3 form-password-toggle">
								<label class="form-label" for="confirm-password">Confirm Password</label>
								<input type="password" id="confirm-password" class="form-control" name="cpwd" placeholder="••••••••" style="width: 320px;" aria-describedby="password" />
							</div>
							<button type="submit" name="sbtn" class="btn btn-primary">Set New Password</button>
							<div class="text-center">
								<a href="login.php">
									<i class="bx bx-chevron-left"></i> Back to login
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Content -->
	<!-- Core JS -->
	<script src="assets/vendor/libs/jquery/jquery.js"></script>
	<script src="assets/vendor/libs/popper/popper.js"></script>
	<script src="assets/vendor/js/bootstrap.js"></script>
	<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="assets/vendor/js/menu.js"></script>
	<script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
	<script src="app-assets/js/scripts/forms/validation/form-validation.js"></script>
	<script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
	<script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

	<script>
	$('#custom_val').validate({
		rules: {
			pwd: 'required',
			cpwd: 'required',
		},
		messages: {
			pwd: "Enter New Password",
			cpwd: "Enter Confirm Password"
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
	</script>
	</body>
</html>
