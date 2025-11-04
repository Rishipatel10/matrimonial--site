<?php
	include_once 'connection.php';
?>
<!doctype html>
<html lang="en">
<!-- Dream Class By faq.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:14 GMT -->
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
    <!-- REGISTER -->
    <section>
        <div class="login pg-faq">
            <div class="container">
                <div class="row">
                    <div class="inn ab-faq-lhs">
                        <div class="form-tit">
                            <!--<h4>FAQ</h4>-->
                            <h1>Frequently asked questions</h1>
                        </div>
						<div id="accordion">
							<?php
							$str="select * from faq_tbl where faq_status='1'";
							$show=mysqli_query($conn,$str);
							$count = 1;
							while ($row = mysqli_fetch_array($show)) 
							{
								$collapseId = "collapse" . $count;
							?>
								<div class="card">
									<div class="card-header">
										<span class="card-link d-flex justify-content-between text-decoration-none" data-toggle="collapse" href="#<?php echo $collapseId; ?>">
											<?php echo ucfirst($row['faq_que']); ?>
											<span class="icon">+</span>
										</span>
									</div>
									<div id="<?php echo $collapseId; ?>" class="collapse" data-parent="#accordion">
										<div class="card-body">
											<?php echo ucfirst($row['faq_ans']); ?>
										</div>
									</div>
								</div>
							<?php
								$count++;
							}
							?>
						</div>

						<script>
							// Wait for the DOM to be ready
							document.addEventListener("DOMContentLoaded", function () {
								let links = document.querySelectorAll("#accordion .card-link");

								links.forEach(link => {
									link.addEventListener("click", function () {
										let icon = this.querySelector(".icon");
										let isExpanded = this.getAttribute("aria-expanded") === "true";

										// Reset all icons to "+"
										document.querySelectorAll(".icon").forEach(i => i.innerText = "+");

										// If the clicked item is expanding, change its icon to "-"
										if (!isExpanded) {
											icon.innerText = "-";
										}
									});
								});
							});
						</script>

						<!-- Bootstrap CSS & JS (Include in your page) -->
						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    </div>
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
    <?php
		include_once 'footer.php';
	?>
    <!-- END -->
</body>


<!-- Dream Class By faq.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:14 GMT -->
</html>