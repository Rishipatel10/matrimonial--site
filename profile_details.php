<?php
	include_once 'connection.php';
	if(!isset($_SESSION['member_id'])){
		header('location:login.php');
	}
	
	//echo "<pre>";
	//print_r($_SESSION);
	if (!isset($_SESSION['cnt_member']) || $_SESSION['cnt_member'] == 0) 
	{
		header("Location: plans.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">

<!-- Dream Class By profile-details.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:24 GMT -->
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

   <style>
   .login, .db {
    float: left;
    width: 100%;
    padding: 0;
    margin-top: 0;
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
    <!-- END USER PROFILE MENU POPUP -->


    <!-- PROFILE -->
    <section>
		<?php
			if(isset($_GET['member_id']))
			{
				$memberid = $_GET['member_id'];
				$str="Select * from member_tbl,member_detail_tbl,member_qualification_tbl,lifestyle_tbl,city_tbl,state_tbl,community_tbl,sub_community_tbl where member_tbl.member_id=member_detail_tbl.member_id and member_detail_tbl.member_detail_id=member_qualification_tbl.member_detail_id and member_detail_tbl.member_detail_id=lifestyle_tbl.member_detail_id and member_tbl.member_city=city_tbl.city_id and city_tbl.state_id=state_tbl.state_id and community_tbl.community_id=sub_community_tbl.community_id and member_tbl.member_id=$memberid";
				
				//echo $str;die; 
				$data=mysqli_query($conn,$str);
				$row=mysqli_fetch_array($data);
			}									
			else
			{
				
			}
		?>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="member_profiles/<?php echo $row['member_image']; ?>" loading="lazy" class="pro" alt="">
                            </div>
                            <!--<div class="s3">
                                <a href="#!" class="cta fol cta-chat">Chat now</a>
                                <span class="cta cta-sendint" data-toggle="modal" data-target="#sendInter">Send
                                    interest</span>
                            </div>-->
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <h1><?php echo ucfirst($row['member_lastname']) . " " . ucfirst($row['member_firstname']); ?></h1>
                                <div class="pro-info-status">
                                    <!--<span class="stat-1"><b>100</b> viewers</span>-->
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
                                    <span class="stat-2"><?php echo $time_display; ?></span>
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>City: <strong><?php echo ucfirst($row['city_name']); ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-age.png" loading="lazy" alt="">
                                            <span>Age: <strong><?php echo $row['member_age'] . " " . "Year"; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-height.png" loading="lazy" alt="">
                                            <span>Height: <strong><?php echo $row['member_height'] . " " . "f.inc"; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-designation.webp" loading="lazy" alt="">
                                            <span>Designation: <strong><?php echo ucfirst($row['member_designation']); ?></strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-abo">
                                <h3>About</h3>
                                <p><?php echo $row['member_description']; ?></p>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT 
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="images/profiles/1.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="images/profiles/6.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="images/profiles/14.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-conta">
                                <h3>Contact info</h3>
                                <ul>
                                    <!--<li class="text-muted"><span><i class="fa fa-mobile" aria-hidden="true"></i><b>Phone:</b>**********</span></li>-->
                                    <li><span><i class="fa fa-envelope-o" aria-hidden="true"></i><b>Email:</b><?php echo $row['member_email']; ?></span></li>
                                    <li><span><i class="fa fa fa-map-marker" aria-hidden="true"></i><b>Address: </b><?php echo ucfirst($row['city_name']) . ", " . ucfirst($row['state_name']); ?></span></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Personal information</h3>     
                            </div>				    			
								<div class="db">
									<div class="container">
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
												<div class="row">
													<div class="col-md-12 db-sec-com">
														<!--<h2 class="db-tit">Interest request</h2>-->
														<div class="db-pro-stat" style="margin-top: -105px;">
															<!--<div class="dropdown">
																<button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown">
																	<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
																</button>
																<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="#">Edid profile</a></li>
																	<li><a class="dropdown-item" href="#">View profile</a></li>
																	<li><a class="dropdown-item" href="#">Plan change</a></li>
																	<li><a class="dropdown-item" href="#">Download invoice now</a></li>
																</ul>
															</div>-->
															<div class="db-inte-main">
																<ul class="nav nav-tabs" role="tablist">
																	<li class="nav-item">
																		<a class="nav-link active" data-bs-toggle="tab" href="#home">About Myself</a>
																	</li>
																	<li class="nav-item">
																		<a class="nav-link" data-bs-toggle="tab" href="#menu1">Education Details</a>
																	</li>
																	<li class="nav-item">
																		<a class="nav-link" data-bs-toggle="tab" href="#menu2">Partener Preferences</a>
																	</li>
																</ul>
																<!-- Tab panes -->
																<!-- Tab panes -->
																<div class="tab-content">
																	<div id="home" class="container tab-pane active" style="margin-top: -22px;"><br>
																		<div class="db-inte-prof-list">
																			<ul>	
																				<li>
																					<div class="basic_1">
																						<div class="col-md-6 basic_1-left">
																							<table class="table table_working_hours table-bordered table-striped">
																								<tbody>
																									<tr>
																										<td class="fw-bold">Name</td>
																										<td><?php echo ucfirst($row['member_firstname']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Age</td>
																										<td><?php echo $row['member_age']; ?> years</td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Body Type</td>
																										<td><?php echo ucfirst($row['member_body_type']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Marital Status</td>
																										<td><?php echo ucfirst($row['marital_status']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Height</td>
																										<td><?php echo $row['member_height'] . " ft"; ?></td>
																									</tr>
																									<!--<tr>
																										<td class="fw-bold">Contact No.</td>
																										<td class="text-muted">**********</td> 
																									</tr>-->
																									<tr>
																										<td class="fw-bold">Drinking Habits</td>
																										<td><?php echo ucfirst($row['drinking_habbits']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Smoking Habits</td>
																										<td><?php echo ucfirst($row['smoking_habbits']); ?></td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																						<div class="col-md-6 basic_1-left">
																							<table class="table table_working_hours table-bordered table-striped">
																								<tbody>
																									<tr>
																										<td class="fw-bold">Last Name</td>
																										<td><?php echo ucfirst($row['member_lastname']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Language Known</td>
																										<td><?php echo ucfirst($row['language_known']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Complexion</td>
																										<td><?php echo ucfirst($row['member_complexion']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Weight</td>
																										<td><?php echo $row['member_weight'] . " kg"; ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Blood Group</td>
																										<td><?php echo strtoupper($row['bloodgroup']); ?></td> <!-- Blood groups are usually uppercase -->
																									</tr>
																									<tr>
																										<td class="fw-bold">Diet</td>
																										<td><?php echo ucfirst($row['member_diet']); ?></td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																						<div class="clearfix"></div>
																					</div>
																					<div class="pr-bio-c pr-bio-info">
																						<br><br><h3>Religious / Social & Astro Background</h3>
																					</div>
																					<div class="col-md-6 basic_1-left" style="margin-top: -72px;">	
																						<table class="table table_working_hours table-bordered table-striped">
																							<tbody>
																								<tr>
																									<td class="fw-bold">Birth Place</td>
																									<td><?php echo ucfirst($row['member_birthplace']); ?></td>
																								</tr>
																								<tr>
																									<td class="fw-bold">Caste</td>
																									<td><?php echo ucfirst($row['community_name']); ?></td>
																								</tr>
																								<tr>
																									<td class="fw-bold">Date of Birth</td>
																									<td><?php echo date("d-M-Y", strtotime($row['member_dob'])); ?></td>
																								</tr>
																								<tr>
																									<td class="fw-bold">Place of Birth</td>
																									<td><?php echo ucfirst($row['member_birthplace']); ?></td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																					<div class="col-md-6 basic_1-left" style="margin-top: -72px;">
																						<table class="table table_working_hours table-bordered table-striped">
																							<tbody>
																								<tr>
																									<td class="fw-bold">Religion</td>
																									<td><?php echo ucfirst($row['member_religion']); ?></td>
																								</tr>
																								<tr>
																									<td class="fw-bold">Sub Caste</td>
																									<td><?php echo ucfirst($row['sub_community_name']); ?></td>
																								</tr>
																								<tr>
																									<td class="fw-bold">Rashi</td>
																									<td><?php echo ucfirst($row['member_rashi']); ?></td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																					<div class="clearfix"> </div>
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
																<br>
																<div id="menu1" class="container tab-pane fade" style="margin-top: -47px;"><br>
																	<div class="db-inte-prof-list">
																		<ul>
																			<li>
																				<div class="basic_3">
																					<div class="basic_1">
																						<!-- <h3>Basics</h3> -->
																						<div class="col-sm-12 basic_1-left">
																							<table class="table table_working_hours table-bordered table-striped">
																								<tbody>
																									<tr>
																										<td class="fw-bold">Education</td>
																										<td><?php echo ucfirst($row['member_qualification']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Education Detail</td>
																										<td><?php echo ucfirst($row['member_designation']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Occupation Detail</td>
																										<td><?php echo ucfirst($row['member_occupation']); ?></td>
																									</tr>
																									<tr>
																										<td class="fw-bold">Income ₹</td>
																										<td><?php echo number_format($row['member_income']) . " per annum"; ?></td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
																<div id="menu2" class="container tab-pane fade" style="    margin-top: -65px;;"><br>
																	<div class="db-inte-prof-list">
																		<ul>
																			<li>
																				<div class="basic_1 basic_2">	
																					<table class="table table_working_hours table-bordered table-striped">
																						<tbody>
																							<tr>
																								<td class="fw-bold">Looking for</td>
																								<td><?php echo ucfirst($row['member_looking_for']); ?></td>
																							</tr>
																							<tr>
																								<td class="fw-bold">Min age</td>
																								<td><?php echo ucfirst($row['member_min_age']); ?></td>
																							</tr>
																							<tr>
																								<td class="fw-bold">Max age</td>
																								<td><?php echo ucfirst($row['member_max_age']); ?></td>
																							</tr>
																							<tr>
																								<td class="fw-bold">Caste no bar</td>
																								<td>
																									<?php 
																										if($row['caste_no_bar'] == 1)
																										{
																											echo ucfirst('yes');
																										}
																										else
																										{
																											echo ucfirst('no');
																										}	
																									?>	
																								</td>
																							</tr>
																							<tr>
																								<td class="fw-bold">Mother Tongue</td>
																								<td>Doesn't matter</td>
																							</tr>
																						</tbody>
																					</table>	
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>Hobbies</h3>
                                <ul>
                                    <li><span><?php echo $row['hobbies_interest']; ?></span></li>
                                </ul>
                            </div>
                            <!--END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT 
                            <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                                <h3>Social media</h3>
                                <ul>
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>-->
                            <!-- END PROFILE ABOUT -->
							
							<!-- PROFILE lHS -->
							<div class="rhs">
								<!-- HELP BOX
								<div class="prof-rhs-help">
									<div class="inn">
										<h3>Tell us your Needs</h3>
										<p>Tell us what kind of service or experts you are looking.</p>
										<a href="sign_up.php">Register for free</a>
									</div>
								</div> -->
								<!-- END HELP BOX -->
								
								<!-- RELATED PROFILES -->
								<h4>Related Profiles</h4>
								<div class="slid-inn pr-bio-c wedd-rel-pro">
									<ul class="slider3">
									    <?php
											
											$memberid = $_GET['member_id'];
											$member_religion = $_GET['Religion'];
											$member_gender = $_GET['gender'];
											$user_city = $_GET['city'];

								
											$str = "SELECT * FROM member_tbl 
											JOIN city_tbl ON member_tbl.member_city = city_tbl.city_id 
											JOIN member_detail_tbl ON member_tbl.member_id = member_detail_tbl.member_id 
											WHERE member_tbl.member_city = '".$user_city."' 
											AND member_tbl.member_gender = '".$member_gender."' 
											AND member_detail_tbl.member_religion = '".$member_religion."' 
											AND member_tbl.member_id != '".$memberid."'";

											//echo $str;											
											$data=mysqli_query($conn,$str);
											while($row=mysqli_fetch_array($data))
											{ 
										?>
												<li>
													<div class="wedd-rel-box">
														<div class="wedd-rel-img">
															<img src="member_profiles/<?php echo $row['member_image'];?>" alt="">
															<span class="badge badge-success"><?php echo $row['member_age'];?></span>
														</div>
														<div class="wedd-rel-con">
															<h5><?php echo ucfirst($row['member_lastname']) . " " . ucfirst($row['member_firstname']); ?></h5>
															<span>City: <b><?php echo ucfirst($row['city_name']);?></b></span>
														</div>
														<a href="profile_details.php?member_id=<?php echo $row['member_id']; ?>&Religion=<?php echo $row['member_religion']; ?>&gender=<?php echo $row['member_gender']; ?>&city=<?php echo $row['member_city']; ?>" class="fclick"></a>
													</div>
												</li>
										<?php 
											}  
										?>
									</ul>
								</div>
								<!-- END RELATED PROFILES -->
							</div>
							<!-- END PROFILE lHS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
    <!-- END PROFILE -->
	<!-- LOGIN -->
    
    <!-- END -->
    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
		
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename">Jolia</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="images/profiles/1.jpg" alt="" class="intephoto1">
                    </div>
                    <div class="rhs">
                        <h4><span class="intename1">Jolia</span> Can able to view the below details</h4>
                        <ul>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_about" checked="">
                                    <label for="pro_about">About section</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Photo gallery</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_contact">
                                    <label for="pro_contact">Contact info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_person">
                                    <label for="pro_person">Personal info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_hobbi">
                                    <label for="pro_hobbi">Hobbies</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_social">
                                    <label for="pro_social">Social media</label>
                                </div>
                            </li>
                        </ul>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="text"
                                placeholder="Comment goes here"></textarea>
                            <label for="comment">Write some message to <span class="intename"></span></label>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send interest</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>
				
            </div>
        </div>
    </div>
    <!-- END INTEREST POPUP -->

    <!--- CHAT CONVERSATION BOX START --->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="images/profiles/2.jpg" class="intephoto2" alt="">
                    <h4><b>Angelina Jolie</b>,</h4>
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
                    <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
		
    </div>
    <!--- END --->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/custom.js"></script>
	
	<!-- FOOTER -->
    <?php
		include_once 'footer.php';
	?>
    <!-- END -->
    <!-- COPYRIGHTS -->
    <!-- END -->
</body>


<!-- Dream Class By profile-details.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:26 GMT -->
</html>