<?php
   include_once 'connection.php';
   if(!isset($_SESSION['member_id'])){
	   header('location:login.php');
   }
?>
<!doctype html>
<html lang="en">


<!-- Dream Class By plans.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:24 GMT -->
<head>
	<title><?php echo $WEB_TITLE; ?></title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
     <!-- PRELOADER -->
    <!-- END PRELOADER -->

    <!-- SEARCH -->
    <!-- END PRELOADER -->

    <!-- HEADER & MENU -->
    <?php
		include_once 'header.php';
	?>
    <!-- END HEADER & MENU -->

    <!-- HEADER & MENU -->
    <!-- END HEADER & MENU -->

    <!-- HEADER & MENU -->
    <?php
		include_once 'menu.php';
	?>
    <!-- END MOBILE MENU POPUP -->

    <!-- MOBILE USER PROFILE MENU POPUP -->
    
    <!-- END USER PROFILE MENU POPUP -->

  
    <!-- PRICING PLANS -->
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <span class="pri">Pricing</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>-->
                    <span class="nocre">No credit card required</span>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- PRICING PLANS -->
    <section>
        <div class="plans-main">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="pri-box" >
                                <h2>Free</h2>
                                <!--<p>Printer took a type and scrambled </p>-->
                                <!--<a href="sign_up.php" class="cta">Get Started</a>-->
                                <span class="pri-cou"><b>₹0</b>/mo</span>
                                <ol>
                                    <li><i class="fa fa-check " aria-hidden="true"></i>Send Request Once</li>
                                    <li><i class="fa fa-close close" aria-hidden="true"></i> View Profile</li>
                                    <li><i class="fa fa-close close" aria-hidden="true"></i>View E-Mails</li>
                                    <li><i class="fa fa-close close" aria-hidden="true"></i>Start Chat</li>
                                </ol>
                            </div>
                        </li>
						<?php
							$str="select * from package_tbl where package_status='1'";
							$data=mysqli_query($conn,$str);						
							while($row=mysqli_fetch_array($data)) 	
							{ 
						?>
                        <li>
                            <div class="pri-box pri-box-pop">
                                <span class="pop-pln">Most popular plan</span>
                                <h2>
									<?php 
										if($row['package_name'] == "Gold")
										{	
											echo "<b style='color:#bd8937;'>" . ucfirst($row['package_name']) . "</b>"; 
										}
										elseif($row['package_name'] == "Silver")
										{	
											echo "<b style='color:#8a8585;'>" . ucfirst($row['package_name']) . "</b>"; 
										}
										elseif($row['package_name'] == "Platinum")
										{	
											echo "<b style='color:brown;'>" . ucfirst($row['package_name']) . "</b>"; 
										}
										else
										{	
											echo "<b style='color:black;'>" . ucfirst($row['package_name']) . "</b>"; 
										}
									?>
								</h2>
                                <!--<p><?php //echo $row['package_duration'];?> </p>-->

						              
                                <a href="javascript:void(0)" 
								   class="cta buy_now" 
								   data-id="<?php echo $_SESSION['member_id']; ?>" 
								   data-package-id="<?php echo $row['package_id']; ?>" 
								   data-amount="<?php echo $row['package_price']; ?>" 
								   data-duration="<?php echo $row['package_duration']; ?>">
								   Get Started
								</a>

                                <span class="pri-cou"><b><?php echo "₹" . $row['package_price']; ?></b> /<?php echo $row['package_duration'];?> mo</span>
                                <ol>
                                    <!--<li><i class="fa fa-check" aria-hidden="true"></i> 20 Premium Profiles view /mo</li>-->
                                    <li><i class="fa fa-check" aria-hidden="true"></i>View Profiles</li>
                                    <!--<li><i class="fa fa-check" aria-hidden="true"></i>Free user profile can view</li>-->
                                    <!--<li><i class="fa fa-check" aria-hidden="true"></i>View Contact details</li>-->
                                    <li><i class="fa fa-check" aria-hidden="true"></i>View More details</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Send Request</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Start Chat</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Match Kundali</li>

                                </ol>
                            </div>
                        </li><br><br><br><br>
						<?php 
						}
						?>
					</ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
	
	<!-- FOOTER -->
	    <?php include_once 'footer.php';?>
    <!-- END -->
    <!-- COPYRIGHTS -->  
    <!-- END -->
</body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$('body').on('click', '.buy_now', function(e){
    e.preventDefault(); // Prevent default behavior

    var member_id = $(this).attr("data-id");
    var package_id = $(this).attr("data-package-id");
    var totalAmount = $(this).attr("data-amount");
    var duration = $(this).attr("data-duration");

    console.log("Member ID:", member_id);
    console.log("Package ID:", package_id);
    console.log("Amount:", totalAmount);
    console.log("Duration:", duration);

    var options = {
        "key": "rzp_test_TPaS0mhcHBSjSV",
        "amount": totalAmount * 100,
        "currency": "INR",
        "name": "Vivahmilan",
        "description": "Payment for Package " + package_id,
        "handler": function (response) {
            $.ajax({
                url: 'payment.php',
                type: 'POST',
                data: {
                    razorpay_payment_id: response.razorpay_payment_id,
                    totalAmount: totalAmount,
                    member_id: member_id,
                    package_id: package_id,
                    duration: duration
                },
                 success: function (msg) {
                // Play success sound
                var successSound = new Audio('sound/success_1.mp3'); // Replace with your sound file URL
                successSound.play();

                // Show SweetAlert
                Swal.fire({
                    title: 'Payment Successful!',
                    text: 'Redirecting to your dashboard...',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });

					// Redirect after 2 seconds
					setTimeout(function () {
						window.location.href = "all_profiles.php";
					}, 2000);
				},
				error: function () {
					Swal.fire({
						title: 'Payment Failed!',
						text: 'Please contact support.',
						icon: 'error',
						confirmButtonText: 'OK'
					});
				}
            });
        },
        "theme": {
            "color": "#528FF0"
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
});

</script>

</html>