<?php
	include_once 'connection.php';
	//echo "<pre>";
	//print_r($_SESSION);
	
				
	if(!isset($_SESSION['member_id']) && (!isset($_SESSION["member_gender"])))
	{
		header('location:login.php');
	}
	// Fetch logged-in member's age preference
	$age_query = "SELECT member_min_age, member_max_age FROM member_tbl WHERE member_id = '".$_SESSION['member_id']."'";
	$age_result = mysqli_query($conn, $age_query);
	$age_row = mysqli_fetch_assoc($age_result);
	$min_age = $age_row['member_min_age'];
	$max_age = $age_row['member_max_age'];

?>
<!doctype html>
<html lang="en">


<!-- Dream Class By all_profiles.php  [XR&CO'2014], Fri, 14 Feb 2025 06:49:11 GMT -->
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


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<style>
		.table_working_hours tr.opened_1 td {
		padding: 0 0 5px;
		}
		td.day_label {
			padding:5px 0;
		}
		
		.profile-table {
			width: 100%;
			border-collapse: collapse;
			font-family: Arial, sans-serif;
			font-size: 14px;
			background: #fff;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		}
		.profile-table td {
			padding: 10px;
			border-bottom: 1px solid #ddd;
		}
		.profile-table tr:last-child td {
			border-bottom: none;
		}
		.profile-table td:first-child {
			font-weight: bold;
			color: #444;
			width: 40%;
		}
		.lock-icon {
			color: darkred;
			font-size: 18px;
			text-decoration: none;
		}
		.profile-container {
			max-width: 400px;
			margin: 10px auto;
			background: #f9f9f9;
			padding: 15px;
			border-radius: 10px;
		}

		/* Container styling */
		.verification-container
			display: flex;
			flex-direction: column;
			background: #fff;
			padding: 0px;
			border-radius: 8px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			width: fit-content;
			margin: 15px auto;
			text-align: left;
		}

		/* Styling for verified box */
		.verification-box {
			display: flex;
			align-items: center;
			gap: 10px;
			padding: 10px;
			border-radius: 5px;
			font-weight: bold;
		}

		/* Icons */
		.verification-box i {
			font-size: 18px;
		}

		/* Verified status */
		.verified {
			background: #e8f5e9;
			color: #2e7d32;
			border-left: 5px solid #2e7d32;
		}

		.verified i {
			color: #2e7d32;
		}

		/* Not verified status */
		.not-verified {
			background: #ffebee;
			color: #c62828;
			border-left: 5px solid #c62828;
		}

		.not-verified i {
			color: #c62828;
		}

		/* Additional text */
		.verification-details {
			font-size: 14px;
			color: #555;
			margin-left: 28px;
		}
		   .blurred-image {
			filter: blur(20px);
		}
		.pro-img img {
			width: 450px;
			height: 450px;
			object-fit:cover;
		}
		
		.fa-heart:before {
			content: "\f004";
			margin-left: 666px;
			font-size: 20px;
			cursor: pointer;
		}
	</style>
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
	
	<?php
		//echo "<pre>";
			//print_r($_POST);
			if(isset($_POST['searchbtn'])) 
			{
				if(!isset($_SESSION['member_gender'])) 
				{
					$_SESSION['member_looking_for']=$_POST['member_looking_for'];
				}
				else
				{
					$_SESSION['member_gender']=="Male"?"Female":$_SESSION['member_gender'];
				}
				if (isset($_SESSION['member_id'])) 
				{
					$member_id=$_SESSION['member_id'];
					$str = "SELECT * FROM member_tbl
					JOIN member_detail_tbl AS md ON member_tbl.member_id = md.member_id
					JOIN member_qualification_tbl AS mq ON md.member_detail_id = mq.member_detail_id
					WHERE member_tbl.member_id != '$member_id'
					AND member_tbl.member_gender!='".$_SESSION["member_gender"]."'
					AND (
						member_tbl.member_looking_for = '".$_SESSION['member_looking_for']."' 
						AND member_tbl.member_age = '".$_POST['member_age']."'
						AND md.member_religion = '".$_POST['member_religion']."'
						AND member_tbl.member_city = '".$_POST['member_city']."'
						AND member_tbl.member_status = 1
					)";
					
					//echo $str;
					$data=mysqli_query($conn,$str);
					$total_profiles=mysqli_num_rows($data);
				}
				else
				{
					header('location:login.php');
				}
				//echo $str;
			}
			else
			{		
				
				$str="SELECT * 
						FROM member_tbl 
						JOIN member_detail_tbl ON member_tbl.member_id = member_detail_tbl.member_id 
						JOIN member_qualification_tbl ON member_detail_tbl.member_detail_id = member_qualification_tbl.member_detail_id 
						JOIN lifestyle_tbl ON lifestyle_tbl.member_detail_id = member_detail_tbl.member_detail_id 
						WHERE member_tbl.member_gender != '".$_SESSION["member_gender"]."' AND member_tbl.member_status = 1";
					//echo $str;	
				//$str="Select * from member_tbl,member_detail_tbl,member_qualification_tbl,lifestyle_tbl where member_tbl.member_id=member_detail_tbl.member_id and member_detail_tbl.member_detail_id=member_qualification_tbl.member_detail_id and lifestyle_tbl.member_detail_id=member_detail_tbl.member_detail_id AND member_tbl.member_gender!='".$_SESSION["member_gender"]."'";
				//echo $str;
				$data=mysqli_query($conn,$str);
				$total_profiles=mysqli_num_rows($data);
			}	
		//echo $str;die;
	?>
    
    <!-- END USER PROFILE MENU POPUP -->

    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
                    <!--<a href="sign_up.php">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>-->
                </div>
            </div>
        </div>
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START 
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-search" aria-hidden="true"></i> I'm looking for</h4>
                            <div class="form-group">
                                <select class="chosen-select" data-placeholder="Select Looking For" name="lookingfor" onchange="get_member1(this.value)";>
                                    <option selected disabled value="">I'm looking for</option>
                                    <option value="Male">Men</option>
                                    <option value="Female">Women</option>
                                </select>
                            </div>
                        </div>-->
                        <!-- END -->
                        <!-- START -->
						 <div class="filt-com lhs-cate">
							<h4><i class="fa fa-search" aria-hidden="true"></i>Name</h4>
							<div class="form-group">
								<select class="chosen-select" data-placeholder="Search Name" name="m_id" onchange="get_member1(this.value);">
									<option selected disabled value="">Select Name</option>
										<?php
											$member_DBgender="select * from member_tbl where member_id='".$_SESSION['member_id']."' AND member_status = '1'";
											$res_gender=mysqli_query($conn,$member_DBgender);
											$row_gender=mysqli_fetch_array($res_gender);          
											$member_gender=$row_gender['member_looking_for'];
											//echo "hi".$member_gender;die;
											if($member_gender=="Female")
											{
												$member_gender="Male";
											}
											else
											{
												$member_gender="Female";
											}
											$str="select * from member_tbl 
											join member_detail_tbl on member_tbl.member_id=member_detail_tbl.member_id
											where member_looking_for like '".$member_gender."' AND member_tbl.member_status = '1'";
											
											$results=mysqli_query($conn,$str);
											
											while($row=mysqli_fetch_array($results))
											{
										?>
												<option value="<?php echo $row['member_id']; ?>" ><?php echo ucfirst($row['member_firstname']) . " " . ucfirst($row['member_lastname']) ; ?> </option>
										<?php 
											} 
										?> 
								</select>
							</div>
                        </div>
                        <div class="filt-com lhs-cate">
							<h4><i class="fa fa-child" aria-hidden="true"></i>Age</h4>
							<div class="form-group">	
								<select class="chosen-select" data-placeholder="Select Min Age" name="member_min_age" onchange="get_member2(this.value);">
									<option selected disabled value="">Select Min Age</option>
									<option value="20">20</option>   
									<option value="21">21</option>   
									<option value="22">22</option>   
									<option value="23">23</option>   
									<option value="24">24</option>   
									<option value="25">25</option>   
									<option value="26">26</option>   
									<option value="27">27</option>   
									<option value="28">28</option>   
									<option value="29">29</option>   
									<option value="30">30</option> 
									<option value="31">31</option> 
									<option value="32">32</option> 
									<option value="33">33</option> 
									<option value="34">34</option> 
									<option value="35">35</option> 
								</select>
							</div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fas fa-pray" aria-hidden="true"></i>Select Religion</h4>
                            <div class="form-group">
                                <select class="chosen-select" name="member_religion" onchange="get_member3(this.value);">
                                    <option selected disabled value="">Select Religion</option>
                                    <option value="Hindu">Hindu</option>
									<option value="Sikh">Sikh</option>
									<option value="Christian">Christian</option>
									<option value="Buddhist">Buddhist</option>
									<option value="Jain">Jain</option>
									<option value="Parsi">Parsi</option>
									<option value="Hindu">Other</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
					
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h4>
                            <div class="form-group">
									<select class="chosen-select" name="city" onchange="get_member4(this.value);">
										<option selected disabled value="">Select District/City</option> 
										<?php
											$results=mysqli_query($conn,"SELECT * FROM city_tbl");
											
											while($row=mysqli_fetch_array($results))
											{
										?>
												<option value="<?php echo $row['city_id']; ?>" ><?php echo ucfirst($row['city_name']); ?> </option>
										<?php 
											} 
										?>
								   </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START 
                        <div class="filt-com lhs-rati lhs-avail lhs-cate">
                            <h4><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Availablity</h4>
                            <ul>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="" name="expert_avail" class="rating_check" id="exav1"
                                            checked>
                                        <label for="exav1">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="" name="expert_avail" class="rating_check"
                                            id="exav2">
                                        <label for="exav2">Available</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="" name="expert_avail" class="rating_check"
                                            id="exav3">
                                        <label for="exav3">Offline</label>
                                    </div>
                                </li>
                            </ul>
                        </div>-->
                        <!-- END -->

                        <!-- START -->
                        <div class="filt-com lhs-rati lhs-ver lhs-cate">
                            <h4><i class="fas fa-user-alt" aria-hidden="true"></i>Profile</h4>
                            <ul>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="2" name="package" class="rating_check" id="exver1" onchange="get_member6(this.value);" checked><label for="exver1">All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="1" name="package" class="rating_check" onchange="get_member6(this.value);" id="exver2"><label for="exver2">Premium</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="rbbox">
                                        <input type="radio" value="0" name="package" class="rating_check" onchange="get_member6(this.value);" id="exver3"><label for="exver3">Free</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- END -->
                    </div>
                    <div class="col-md-9" id="members">
                        <div class="short-all">
                            <div class="short-lhs">
                                Showing<b> <?php echo $total_profiles;?> </b> profiles
                            </div>
							<!--
                            <div class="short-rhs">
                                <ul>
                                    <li>
                                        Sort by:
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <select class="chosen-select">
                                                <option value="">Most relative</option>
                                                <option value="Men">Date listed: Newest</option>
                                                <option value="Men">Date listed: Oldest</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-1">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-2 act">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                        <div class="all-list-sh">
                            <ul>
							    <?php while ($row = mysqli_fetch_array($data)): ?>
                                    <?php
                                    $profile_id = $row['member_profile_id'];
                                    $is_bookmarked = false;
                                    $check_wishlist = "SELECT * FROM bookmark_profile_tbl WHERE member_id = '$_SESSION[member_id]' AND member_profile_id = '$profile_id'";
                                    $wishlist_result = mysqli_query($conn, $check_wishlist);
                                    if (mysqli_num_rows($wishlist_result) > 0) {
                                        $is_bookmarked = true;
                                    }
                                    ?>
									<li>
										<div class="all-pro-box user-avil-onli" data-useravil="avilyes"
											data-aviltxt="Available online">
											<!--PROFILE IMAGE-->
											<h6>Profile ID : <?php echo $row['member_profile_id']; ?>
											<?php 
											// Check if profile matches age range
											$matched = ($row['member_age'] >= $min_age && $row['member_age'] <= $max_age); 

											//echo "<p><strong>" . $row['member_firstname'] . " " . $row['member_lastname'] . "</strong> - Age: " . $row['member_age'];

											
											?>
											<span class="wishlist-icon" data-id="<?php echo $profile_id; ?>">
                                                <i class="<?php echo $is_bookmarked ? 'fas fa-heart' : 'far fa-heart'; ?>"></i>
                                            </span>
											</h6>
											<div class="pro-img">
												<a href="profile_details.php?member_id=<?php echo $row['member_id']; ?>&Religion=<?php echo $row['member_religion']; ?>&gender=<?php echo $row['member_gender']; ?>&city=<?php echo $row['member_city']; ?>">
												<?php 
												//echo "<pre>";
												//print_r($_SESSION);
												?>
												
												<?php if(isset($_SESSION['cnt_member']) && $_SESSION['cnt_member'] != 0)  { ?>
													<img  src="member_profiles/<?php echo $row['member_image']; ?>" alt="">
												<?php } else { ?>
												<a href="plans.php"><img class="blurred-image" src="member_profiles/<?php echo $row['member_image']; ?>" alt=""></a>
												<?php } ?>
												</a>
												<!--<div class="pro-ave" title="User currently available">
													<span class="pro-ave-yes"></span>
												</div>-->
												<div class="pro-avl-status">
													<?php
														$last_log = "SELECT * FROM login_details WHERE user_id = '".$row['member_id']."' ORDER BY login_details_id desc" ;
														//echo $last_log;
														$data1 = mysqli_query($conn, $last_log);

														if (!$data1) {
															die("Query failed: " . mysqli_error($conn));
														}

														$logs = mysqli_fetch_assoc($data1);

														if ($logs && isset($logs['last_activity'])) {
															$last_activity = new DateTime($logs['last_activity']); // Convert to DateTime
															$current_time = new DateTime(); // Current time
															$interval = $last_activity->diff($current_time); // Calculate difference

															// Debugging: Ensure correct format
															//echo "Raw Last Activity Timestamp: " . $last_activity->format('Y-m-d H:i:s') . "<br>";

															// Format the difference in a human-readable way
															if ($interval->y > 0) {
																$time_display = $interval->y . " year(s) ago";
															} elseif ($interval->m > 0) {
																$time_display = $interval->m . " month(s) ago";
															} elseif ($interval->d > 0) {
																$time_display = $interval->d . " day(s) ago";
															} elseif ($interval->h > 0) {
																$time_display = $interval->h . " hour(s) ago";
															} elseif ($interval->i > 0) {
																$time_display = $interval->i . " minute(s) ago";
															} else {
																$time_display = "Just now";
															}
														} else {
															$time_display = "Login not done yet";
														}
														?>

														<h5>Last login: <?php echo $time_display; ?></h5>

													<!--<span class="marqu">Last login 10 mins ago | I'll be available on 10:00
														AM</span>-->
												</div>
											</div>
											<!--END PROFILE IMAGE-->

											<!--PROFILE NAME-->
											<div class="pro-detail">
												<div class="verification-container" style="padding-right: 285px;">
													<?php if (!empty($row['member_adhar_id']) && !empty($row['member_contact'])) { ?>
														<div class="verification-box verified">
															&nbsp;<i class="fa fa-check-circle"></i> Verified Member
														</div>
														<div class="verification-details">
															✅ Verified Aadhar Card <br>
															✅ Verified Contact Number
														</div>
													<?php } else { ?>
														<div class="verification-box not-verified">
															&nbsp;<i class="fa fa-exclamation-circle"></i> Not Verified
														</div>
														<div class="verification-details">
															<?php if (!empty($row['member_adhar_id'])) { ?>
																✅ Verified Aadhar Card <br>
															<?php } else { ?>
																❌ Not Verified Aadhar Card <br>
															<?php } ?>
															
															<?php if (!empty($row['member_contact'])) { ?>
																✅ Verified Contact Number
															<?php } else { ?>
																❌ Not Verified Contact Number
															<?php } ?>
														</div>
													<?php } ?>
												</div>
												
<?php 
//echo "<pre>";
//print_r($_SESSION);
if(isset($_SESSION['cnt_member']) && $_SESSION['cnt_member'] != 0) 
{
 // Show full last name if access is granted
$lastname = ucfirst($row['member_lastname']);
$profile_url = "profile_details.php?member_id=" . $row['member_id'] . 
			   "&Religion=" . $row['member_religion'] . 
			   "&gender=" . $row['member_gender'] . 
			   "&city=" . $row['member_city'];
} else {
  // Show only the first character of the last name with a lock icon
$lastname = substr($row['member_lastname'], 0, 1) . ' <i class="fa fa-lock" aria-hidden="true"></i>';

// Redirect to plans.php if they click on the profile link
$profile_url = "plans.php";


}
?>

<h4>
<a href="<?php echo $profile_url; ?>">
	<?php echo ucfirst($row['member_firstname']) . " " . $lastname; 
	if ($matched) {
	echo " <span style='color: green; font-weight: bold;'>[Matched Profile]</span>";
}?>
</a>

</h4>
	
												<div class="col-sm-12 profile-container">
													<table class="profile-table">
														<tr>
															<td>Age / Height:</td>
															<td><?php echo $row['member_age'] . " Y / " . $row['member_height']." in"; ?></td>
														</tr>
														<tr>
															<td>Religion:</td>
															<td><?php echo ucfirst($row['member_religion']); ?></td>
														</tr>
														<tr>
															<td>Marital Status:</td>
															<td><?php echo $row['marital_status']; ?></td>
														</tr>
														<tr>
															<td>Email Address:</td>
															<td>
																<?php 
																	if(isset($_SESSION['cnt_member']) && $_SESSION['cnt_member'] != 0) 
																	{ 
																		echo ucfirst($row['member_email']);  
																	} 
																	else 
																	{ 
																?>
																	<a href="plans.php" title="Upgrade to view details" class="lock-icon">
																		<i class="fa fa-lock" aria-hidden="true"></i>
																	</a>
																<?php 
																	}
																?>
															</td>
														</tr>
														<tr>
															<td>Profile For:</td>
															<td><?php echo ucfirst($row['member_profile_for']); ?></td>
														</tr>
													</table>														
													<!-- <ul class="login_details">
													  <li>Already a member? <a href="login.php">Login Now</a></li>
													  <li>If not a member? <a href="register.php">Register Now</a></li>
													</ul> -->
												</div>
												<!--<div class="pro-bio">
													<label>Email Address :</label><?php //echo " " . ucfirst($row['member_email']);?></span><br>
													<label>Qualification :</label><?php //echo " " . ucfirst($row['member_qualification']);?></span><br>
													<label>Occupation :</label><?php //echo " " . ucfirst($row['member_occupation']);?></span><br>
													<label>Age :</label><?php //echo " " . $row['member_age'];?></span><br>
													<label>Height :</label><?php //echo " " . $row['member_height'];?></span>
												</div>-->
												<br>
												
												<div class="links">
													<!--<span class="cta-chat">Chat now</span>-->
													<!--<a href="#!">WhatsApp</a> -->
													<a href="profile_details.php?member_id=<?php echo $row['member_id']; ?>&Religion=<?php echo $row['member_religion']; ?>&gender=<?php echo $row['member_gender']; ?>&city=<?php echo $row['member_city']; ?>">More detaiils</a>
													<?php 
														if (isset($_SESSION['member_id'])) {
																$logged_member_id = $_SESSION['member_id'];
																$target_member_id = $row['member_id']; // Member to check

																// Check if they are already friends
																if (isFriend($conn, $logged_member_id, $target_member_id)) {
																	echo "✔ Friend"; // Show only if they are already friends
																} else {
																	// Check if a friend request is pending
																	$sql = "SELECT send_request_id FROM send_request_tbl WHERE member_id = '$logged_member_id'";
																	$result = mysqli_query($conn, $sql);

																	$is_pending = false;
																	while ($row_request = mysqli_fetch_assoc($result)) {
																		$requests = json_decode($row_request['send_request_id'], true); // Decode JSON data

																		// Check if request exists and is pending
																		if (isset($requests[$target_member_id]) && $requests[$target_member_id] === "pending") {
																			$is_pending = true;
																			break; // No need to check further
																		}
																	}

																	// Show "🚀 Requested" if request is pending
																	if ($is_pending) {
																		echo "🚀 Requested";
																	} else {
																		// Show "Send Request" button if no request exists
																		echo '<a href="send_request1.php?member_id=' . $target_member_id . '">➕ Send Request</a>';
																	}
																}
															}
														?>
														<a href="kundali_matching.php?member_id=<?php echo $row['member_id']; ?>&Religion=<?php echo $row['member_religion']; ?>&gender=<?php echo $row['member_gender']; ?>&city=<?php echo $row['member_city']; ?>">Kundali Match</a>
													
                                                </div>
                                            </div>
                                        </div>
											<!--END PROFILE NAME-->
										<div>
											<!--SAVE
												<span class="enq-sav" data-toggle="tooltip" title="Click to save this profile."><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>-->
											<!--END SAVE-->
										</div>										
									</li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- CHAT CONVERSATION BOX START -->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="images/user/2.jpg" class="intephoto2" alt="">
                    <h4><b class="intename2">Julia</b>,</h4>
                    <span class="avlsta avilyes">Available online</span>
                </div>
                <div class="s2 chat-box-messages">
                    <span class="chat-wel">Start a new chat!!! now</span>
                    <div class="chat-con">
                        <div class="chat-lhs">Hi</div>
                        <div class="chat-rhs">Hi</div>
                    </div>
                    <!--<span>Start A New Chat!!! Now</span>-->
                </div>
                <div class="s3">
                    <input type="text" name="chat_message" placeholder="Type a message here.." required="">
                    <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END -->
	
   
    <!-- END -->
    <!-- COPYRIGHTS -->
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
	<script>
		function get_member1(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'m_id='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}
	
		function get_member2(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'member_min_age='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}
		
		function get_member3(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'member_religion='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}
		
		function get_member4(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'city_id='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}
		
		function get_member5(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'member_status='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}

		function get_member6(val) {
			//alert(val);
			$.ajax({
				type: "POST",
				url: "get_member.php",
				data:'package='+val,
				success: function(data){
					$("#members").html(data);
				}
			});
		}
	</script>
	<script>
         $(document).ready(function() {
            $('.wishlist-icon').click(function() {
                var icon = $(this);
                var profile_id = icon.data('id');

                $.ajax({
                    url: 'wishlist_action.php',
                    type: 'POST',
                    data: { profile_id: profile_id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'not_logged_in') {
                            window.location.href = 'login.php';
                        }else if(response.status === 'expiry'){
								window.location.href = 'plans.php';
						}							
						else {
                            if (response.status === 'bookmarked') {
                                icon.find('i').removeClass('far fa-heart').addClass('fas fa-heart').css('color', 'red');
                            } else if (response.status === 'unbookmarked') {
                                icon.find('i').removeClass('fas fa-heart').addClass('far fa-heart').css('color', '');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error: " + error);
                    }
                });
            });
        });
    </script>
</body>

<?php
	function isFriend($conn, $logged_member_id, $check_member_id) {
		$friend_ids = array();

		// Step 1: Get accepted friends sent by logged-in user
		$sql = "SELECT * FROM send_request_tbl WHERE member_id = '$logged_member_id'";
		$res = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($res)) {
			$send_request_json = json_decode($row['send_request_id'], true);
			foreach ($send_request_json as $target_member_id => $status) {
				if ($status == 'accepted') {
					$friend_ids[] = $target_member_id;
				}
			}
		}

		// Step 2: Get users who accepted request from logged-in user
		$sql2 = "SELECT * FROM send_request_tbl WHERE send_request_id LIKE '%\"$logged_member_id\":\"accepted\"%'";
		$res2 = mysqli_query($conn, $sql2);

		while ($row2 = mysqli_fetch_assoc($res2)) {
			$other_member_id = $row2['member_id'];
			$send_request_json2 = json_decode($row2['send_request_id'], true);
			if (isset($send_request_json2[$logged_member_id]) && $send_request_json2[$logged_member_id] == 'accepted') {
				$friend_ids[] = $other_member_id;
			}
		}

		// Step 3: Remove duplicates
		$friend_ids = array_unique($friend_ids);

		// Step 4: Check if check_member_id exists in friend list
		if (in_array($check_member_id, $friend_ids)) {
			return true;
		} else {
			return false;
		}
	}
?>

<!-- Dream Class By all-profiles.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:13 GMT -->
</html>