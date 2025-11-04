<!DOCTYPE html>
<?php
	include_once "connection.php";	
	
	// Initialize the timer session variable if it doesn't exist
	if (!isset($_SESSION['timer_start'])) {
		$_SESSION['timer_start'] = time();  // Set start time to current timestamp
	}

	// Handle OTP verification after form submission
	if (isset($_POST['sbtn'])) {
		$code = $_POST['a'] . $_POST['b'] . $_POST['c'] . $_POST['d'] . $_POST['e'] . $_POST['f'];
		$qry = "SELECT * FROM otp_status_tbl WHERE otp='" . $code . "'"; // Query to check OTP
		$result = mysqli_query($conn, $qry);
		$data = mysqli_fetch_array($result);

		if (mysqli_num_rows($result) > 0) {
			// OTP is valid, check if it's within the allowed time limit (2 minutes)
			if (time() - $_SESSION['timer_start'] < 120) {
				header("location:set_password.php");
			} else {
				echo "<script>swal({title: 'OOPS!', text: 'Session/OTP Expired', icon: 'error'});</script>";
			}
		} else {
			echo "<script>swal({title: 'OOPS!', text: 'Invalid OTP', icon: 'error'});</script>";
		}
	}
?>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Verification Page | <?php echo $WEB_TITLE;?></title>
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <link rel="icon" type="image/x-icon" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/assets/img/favicon/favicon.ico" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">

  <!-- Custom Styles -->
  <style>
    /* Custom Styles for the Page Layout */
    body {
      font-family: 'IBM Plex Sans', sans-serif;
      background-color: #f0f4f8;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .authentication-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: 0 1rem;
    }

    .authentication-inner {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .card {
      border: none;
      box-shadow: none;
    }

    .app-brand {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
    }

    .app-brand-logo svg {
      fill: #4880EA;
    }

    .app-brand-text {
      font-size: 1.5rem;
      color: #1f3a5a;
      font-weight: 700;
      margin-left: 0.5rem;
    }

    .auth-input-wrapper {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .auth-input-wrapper input {
      width: 40px;
      height: 40px;
      text-align: center;
      font-size: 1.5rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .auth-input-wrapper input:focus {
      border-color: #4880EA;
    }

    .btn-primary {
      background-color: #4880EA;
      border: none;
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #1a66b0;
    }

    .text-center a {
      text-decoration: none;
      color: #4880EA;
      font-weight: bold;
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    .timer {
      display: inline-block;
      margin-top: 10px;
    }
  </style>

  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/vendor/js/template-customizer.js"></script>
  <script src="assets/js/config.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>

<div class="authentication-wrapper">
  <div class="authentication-inner">
    <div class="card">
      <div class="card-body">
        <div class="app-brand justify-content-center">
          <a href="index.php" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
              <!-- SVG logo here -->
            </span>
            <img src="images/admin_logo.png" alt="" height="30px" width="30px"> 
            <span class="app-brand-text demo h3 mb-0 fw-bold">Vivahmilan</span>
          </a>
        </div>

        <h4 class="mb-2">Enter Verification Code</h4>
        <p class="text-start mb-4">
          We sent a verification code to your mail. Enter the code from the email in the field below.
          <span class="fw-bold d-block mt-2"><?php echo $_SESSION['member_email']; ?></span>
        </p>

        <p class="mb-0 fw-semibold">Type your 6 digit security code</p>
        <form id="twoStepsForm" method="POST" class="mb-2">
          <div class="mb-3">
            <div class="auth-input-wrapper">
              <input type="text" name="a" maxlength="1" autofocus required oninput="moveFocus(this, 'b')" />
              <input type="text" name="b" maxlength="1" required oninput="moveFocus(this, 'c')" />
              <input type="text" name="c" maxlength="1" required oninput="moveFocus(this, 'd')" />
              <input type="text" name="d" maxlength="1" required oninput="moveFocus(this, 'e')" />
              <input type="text" name="e" maxlength="1" required oninput="moveFocus(this, 'f')" />
              <input type="text" name="f" maxlength="1" required />
            </div>
            <input type="hidden" name="otp" />
          </div>
          <br>
          <button type="submit" name="sbtn" class="btn btn-primary">Verify my account</button>
          <br>
          <div class="text-center mt-3">
            Didn't get the code?
            <a href="resend_otp.php">Resend</a>
            <div class="timer" id="hidetimer">
              <time id="countdown">2:00</time>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // Move the focus to the next input field
  function moveFocus(currentElement, nextElementId) {
    if (currentElement.value.length === 1) {
      document.getElementsByName(nextElementId)[0].focus();
    }
  }

  // Function to handle timer countdown and display
  var timerStart = <?php echo time() - $_SESSION['timer_start']; ?>;  // Calculate elapsed time in seconds
  var seconds = 120 - timerStart;  // Set the remaining time to 120 seconds minus elapsed time
  var countdownTimer; // To store the interval ID for stopping the timer

  function secondPassed() {
    var minutes = Math.floor(seconds / 60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
      remainingSeconds = "0" + remainingSeconds;
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;

    // When time is up
    if (seconds === 0) {
      clearInterval(countdownTimer); // Stop the countdown timer
      document.getElementById('countdown').innerHTML = ''; // Clear the countdown display
      document.getElementById('hidetimer').style.display = 'none'; // Hide the timer
      document.querySelector('a[href="resend_otp.php"]').style.pointerEvents = 'none'; // Disable the resend link
      document.querySelector('a[href="resend_otp.php"]').style.color = '#ccc'; // Change color to indicate it's disabled
    } else {
      seconds--;
    }
  }

  // Start the countdown timer immediately when the page loads
  countdownTimer = setInterval(secondPassed, 1000);

  // Event listener to restart the timer when the user clicks "Resend OTP"
  document.querySelector('a[href="resend_otp.php"]').addEventListener('click', function(e) {
    // Prevent the action if timer has expired
    if (seconds === 0) {
      e.preventDefault(); // Prevent the default action of resending OTP when the time has expired
      return;
    }

    // Optionally, send an AJAX request here to trigger OTP resend
    // For now, we'll just restart the timer.

    // Reset timer
    seconds = 120;  // Reset the remaining time to 120 seconds
    document.getElementById('countdown').innerHTML = '2:00'; // Reset the timer display
    document.getElementById('hidetimer').style.display = 'inline-block'; // Show the timer again

    // Restart the countdown
    countdownTimer = setInterval(secondPassed, 1000);
  });
</script>

</body>
</html>
