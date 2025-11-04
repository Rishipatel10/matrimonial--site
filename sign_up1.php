<?php
	include_once 'connection.php';
	
	//echo "<pre>";
	//print_r($_POST);die;
?>
<!doctype html>
<html lang="en">

<!-- Dream Class By user-profile-edit.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:34 GMT -->
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

	<script>
		$(document).ready(function(){
			$(".dropdown").hover(
				function() {
					$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
					$(this).toggleClass('open');
				},
				function() {
					$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});

		function getSub_community(val) {
			//alert("hiii");
			$.ajax({
				type: "POST",
				url: "get_sub_community.php",
				data:'community_id='+val,
				success: function(data){
					$("#sub_id").html(data);
				}
			});
		}

		function get_city(val) {
			$.ajax({
				type: "POST",
				url: "get_sub_community.php",
				data:'state_id='+val,
				success: function(data){
					$("#city_id").html(data);
				}
			});
		}

        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
					$(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
             );
         });

		function have_children(val)
		{
			if(val=="Single")
			{
				$("#Childrens_id").hide();
				$("#No_of_Childrens").hide();
			}
			else
			{
				$("#Childrens_id").show();
			}
		}

		function check_no_of_children(val)
		{
			if(val=="1" || val=="2")
			{
				$("#No_of_Childrens").show();
			}
			else
			{
				$("#No_of_Childrens").hide();
			}
		}
    </script>
	<script src="../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
	<script>
	(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
	  _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
	}
	})();
	</script>
	<script>
	(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
	}
	})();
	</script>
	<script>
	(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
	  _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
	}
	})();
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src='https://www.googletagmanager.com/gtag/js?id=UA-149859901-1'></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-149859901-1');
	</script>
	<script>
	window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
	ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
	ga('require', 'eventTracker');
	ga('require', 'outboundLinkTracker');
	ga('require', 'urlChangeTracker');
	ga('send', 'pageview');
	</script>
	<script async src='../../../js/autotrack.js'></script>

	<style>
		.error{
			color: red;
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
    <?php
		
        //$fname=$dob=$place=$lname=$contact=$aadhar="";
		if(isset($_POST['btnInsert']))
		{
			$_SESSION['member_looking']=$_POST['looking'];
			$_SESSION['member_profile']=$_POST['profilefor'];
			$_SESSION['member_min']=$_POST['minage'];
			$_SESSION['member_max']=$_POST['maxage'];
			$_SESSION['member_eadd']=$_POST['email'];
			$_SESSION['member_pass']=$_POST['pwd'];
		}
		
		if(isset($_POST['submit']))
		{	
			$gender=$_POST['gen'];
			$img=$_SESSION['Member_Image']='image_placeholder.jpg';
			
			/*$_SESSION['Member_Firstname']=$_POST['Fname'];
			$_SESSION['Member_Contact']=$_POST['contact'];*/
			$_SESSION['member_gender']=$_POST['gen'];
			$_SESSION["user_fname"]=$_POST['Fname'];
			$_SESSION["user_lname"]=$_POST['Lname'];
			
			//$_SESSION["user_Email"]=$data['member_email'];
			//$str="update member_tbl set member_city = ".$_POST['cityname'].", member_image = '".$img."',member_firstname = '".$_POST['Fname']."',member_lastname = '".$_POST['Lname']."', member_adhar_id='".$_POST['aadhar']."', member_contact = '".$_POST['contact']."', member_status = '1', member_age = '".$_POST['age']."' , registration_date = '".$reg_date."',member_gender='".$gender."',member_dob = '".$_POST['dob']."' , member_profile_id = '".$member_profile_id."' where member_id =".$Last_ID;
		
			date_default_timezone_set('Asia/Kolkata');
			$register_date=date('Y-m-d');
			$current=date('Ys');
			$dob=$_POST['dob'];
			$myDateTime = DateTime::createFromFormat('Y-m-d', $dob);
			$memb_pro_id = $myDateTime->format('dm');
			$member_profile_id=$current.$memb_pro_id;
			$reg_date=date("Y-m-d");
		

			$str="insert into member_tbl values(NULL,'".$_POST['cityname']."','".$img."','".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['aadhar']."','".$_POST['contact']."','".$_SESSION['member_eadd']."','".$_SESSION['member_pass']."','".$_SESSION['member_profile']."','".$_SESSION['member_looking']."','".$gender."','".$_POST['dob']."','".$member_profile_id."','".$_POST['age']."','".$_SESSION['member_min']."','".$_SESSION['member_max']."','".$reg_date."',1)";
			//echo $str;die;
			mysqli_query($conn,$str);
			
			//echo $str;
			$_SESSION['member_id'] = mysqli_insert_id($conn);
			$_SESSION['member_email'] = $_POST['email'];
			$Last_ID = $_SESSION['member_id'];
			$hobbies=$_POST['hobby'];
			$hbs=implode(",",$hobbies);
			$language=$_POST['lang'];
			$lng=implode(",",$language); 
			if($_POST['maritalstatus']=="Never Married")
			{
				$childd="0";
			}
			else
			{
				$childd=$_POST['childs'];
			}

			$str1="insert into member_detail_tbl values (NULL,".$Last_ID.",'".$_POST['subcommunity_id']."','".$_POST['religion']."','".$_POST['family']."','".$childd."','".$_POST['height']."','".$_POST['weight']."','".$_POST['cast']."','".$_POST['maritalstatus']."','".$_POST['bithplace']."','".$_POST['body']."','".$_POST['complexion']."','".$_POST['rashi']."')";
			mysqli_query($conn,$str1);
			$_SESSION['Detail_ID'] = mysqli_insert_id($conn);
			

			$Last_ID=$L_ID='';
			$Last_ID = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : '';
			$L_ID = isset($_SESSION['Detail_ID']) ? $_SESSION['Detail_ID'] : '';
			$Family = $_POST['family'];

			$str="insert into lifestyle_tbl values (NULL,".$L_ID.",'".$_POST['bloodgroup']."','".$hbs."','".$_POST['diet1']."','".$lng."','".$_POST['residential_add']."','".$_POST['smoke1']."','".$_POST['drink1']."','".$_POST['vehicles']."')";
			mysqli_query($conn,$str);
		
		
			$_SESSION['ID1']=$L_ID;

			if(isset($_SESSION['ID1']))
			{
				$ID = $_SESSION['ID1'];
			}
			$str="insert into member_qualification_tbl values (NULL,".$ID.",'".$_POST['qualific']."','".$_POST['work']."','".$_POST['occupation']."','".$_POST['designation']."','".$_POST['company']."','".$_POST['income']."','".$_POST['aboutyou']."')";
			mysqli_query($conn,$str);
			
			
			
			echo "<script type='text/javascript'> window.location='send_request.php'; </script>";
			//header('location:login.php');
			
			
		}	
	?>
	
	<!-- REGISTER -->
    <section>
        <div class="login pro-edit-update">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="rhs">
							<div class="form-login">
								<form id="form-registeration" method="POST">
									<!--PROFILE BIO-->
									<div class="edit-pro-parti">
										<div class="form-tit">
											<h1>Basic info</h1>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">First Name:</label>
												<input type="text" class="form-control" placeholder="Enter your First Name" name="Fname" id="Fname" oninput="generateAboutYou()"/>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Last Name:</label>
												<input type="text" class="form-control" placeholder="Enter your Last Name" name="Lname" id="Lname"/>
											</div>
										</div>
										<div class="row">
											<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
												<label class="lb">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" checked="checked" name="gen" value="Male" id="male" />
												<label for="Male">Male</label>
												<input type="radio" name="gen" value="Female" id="female" />
												<label for="Female">Female</label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
											<label class="lb">Date Of Birth:</label>
											<input type="date" id="dob" name="dob" class="form-control" max="2004-03-26" onchange="calculateAge()"/>
										</div>
										<div class="col-md-6 form-group">
											<label class="lb">Age:</label>
											<input type="text" id="age" name="age" class="form-control" oninput="generateAboutYou()" readonly/>
										</div>
										</div>
										<div class="form-group">
											<label class="lb">Contact No.:</label>
											<input type="text" class="form-control" placeholder="Contact Detail" name="contact" pattern="^[0-9]+$" title="Only positive numbers allowed."/>
										</div>
										<div class="form-group">
											<label class="lb">Aadhar Card :</label>
											<input type="text" class="form-control" placeholder="Aadhar Card Detail" name="aadhar"/>
										</div>
									</div>
									<!--END PROFILE BIO-->
									<!--PROFILE BIO-->
									<div class="edit-pro-parti">
										<div class="form-tit">
											<h1>Location & Cast Detail</h1>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="lb">Birth Place:</label>
												<input type="text" id="city-input" class="form-control" placeholder="Your birthplace" name="bithplace" required>
												<div id="city-dropdown" class="list-group position-absolute w-100"></div>			
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">State:</label>
												<select class="form-control form-select chosen-select" onChange="get_city(this.value);" name="State_ID" id="State_ID" onchange="generateAboutYou()">
													<option selected disabled value="">Select State</option>
													<?php
														$State_ID="";
														$str_state="Select * from state_tbl";
														$res=mysqli_query($conn,$str_state);
														while($row=mysqli_fetch_array($res))
														{
													?>
															<option value="<?php echo $row['state_id']; ?>" <?php if($row['state_id']==$State_ID) { echo 'selected'; }?> > <?php echo ucfirst($row['state_name']); ?> </option>
													<?php
														}
													?>
												</select>
											</div>
											 <p style="display:none">Selected State Name: <span id="output">-</span></p>
											<div class="col-md-6 form-group">
												<label class="lb">District / City:</label>
												<select name="cityname" id="city_id" class="form-control form-select">
													<option selected disabled value="">Select District/City</option>
												</select>
											</div>
										</div>

										<div class="row">
											<div class="form-group">
												<label class="lb">Residential Address:</label>
												<textarea class="form-control" name="residential_add"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="lb">Religion:</label>
												<select name="religion" class="form-control form-select chosen-select" data-placeholder="Select your Religion" id="religion">
													<option selected disabled value="">Select Religion</option>
													<option value="Hindu">Hindu</option>
													<option value="Muslim">Muslim</option>
													<option value="Christian">Christian</option>
													<option value="Sikh">Sikh</option>
													<option value="Buddhist">Buddhist</option>
													<option value="Jain">Jain</option>
													<option value="Parsi">Parsi</option>
													<option value="Jewish">Jewish</option>
													<option value="Hindu">Other</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Your Community:</label>
												<select onChange="getSub_community(this.value);" name="Community_ID" class="form-control form-select chosen-select" data-placeholder="Select your Community">
												<option selected disabled value="">Select Community</option>
												<?php
													$Community_ID="";
													$str_community="select * from community_tbl where community_status != '0' ";
													$res=mysqli_query($conn,$str_community);

													while($row=mysqli_fetch_array($res))
													{
												?>
														<option value="<?php echo $row['community_id']; ?>" <?php if($row['community_id']==$Community_ID) { echo 'selected'; }?> > <?php echo ucfirst($row['community_name']); ?> </option>
												<?php
													}
												?>
												<div class="clearfix"> </div>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Your Sub-Community:</label>
												<select id="sub_id" name="subcommunity_id" class="form-control form-select" data-placeholder="Select your Sub-Community">
													<option selected disabled value="">Select Sub Community</option>
												</select>
											</div>
										</div>
									</div>
									<!--END PROFILE BIO-->
									<!--PROFILE BIO-->
									<div class="edit-pro-parti">
										<div class="form-tit">
											<h1>Family Info.</h1>
										</div>
										<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
											<label class="lb">You live with family?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" checked="checked" name="family" value="yes" id="yes" />
											<label for="yes">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" value="no" name="family" id="no" />
											<label for="no">No</label>
										</div>

										<div class="form-group">
											<label class="lb">Marital Status:</label>
											<select name="maritalstatus" onChange="have_children(this.value);" class="form-control form-select chosen-select" data-placeholder="Select Marital Status">
												<option selected disabled value="">Select Marital Status</option>
												<option value="Annulled">Annulled</option>
												<option value="Awaiting">Awaiting Divorced</option>
												<option value="Divorced">Divorced</option>
												<option value="Single">Never Married</option>
												<option value="Separated">Separated</option>
												<option value="Widowed/Widower">Widowed/Widower</option>
											</select>
										</div>
										<!-- Parent divs initially hidden -->
											<!-- Parent divs initially hidden -->
										<div class="form-group form_but1" id="Childrens_id" style="display: none; align-items: center; gap: 15px; flex-wrap: wrap;">
											<label class="lb" style="white-space: nowrap;">Do you have any children?</label>
											<input type="radio" value="0" onChange="check_no_of_children(this.value);" class="radio_1" checked="checked" name="child" /> NO
											<input type="radio" value="1" onChange="check_no_of_children(this.value);" class="radio_1" name="child" /> Yes, Living together
											<input type="radio" value="2" onChange="check_no_of_children(this.value);" class="radio_1" name="child" /> Yes, Not Living together
										</div>

										<div class="form-group form_but1" id="No_of_Childrens" style="display: none; align-items: center; gap: 15px; flex-wrap: wrap;">
											<label class="lb" style="white-space: nowrap;">Childrens:</label>
											<input type="radio" class="radio_1" checked="checked" value="1" name="childs" /> 1
											<input type="radio" class="radio_1" name="childs" value="2" /> 2
											<input type="radio" class="radio_1" name="childs" value="3" /> 3 or More
										</div>

										<script>
											function check_no_of_children(value) {
												const childrenDiv = document.getElementById("Childrens_id");
												const numberOfChildrenDiv = document.getElementById("No_of_Childrens");
												
												if (value == "1" || value == "2") {
													childrenDiv.style.display = "flex";
													childrenDiv.style.alignItems = "center";
													childrenDiv.style.gap = "15px";
													childrenDiv.style.flexWrap = "wrap";

													numberOfChildrenDiv.style.display = "flex";
													numberOfChildrenDiv.style.alignItems = "center";
													numberOfChildrenDiv.style.gap = "15px";
													numberOfChildrenDiv.style.flexWrap = "wrap";
												} else {
													childrenDiv.style.display = "none"; // Hide initially and when 'NO' is selected
													numberOfChildrenDiv.style.display = "none";
												}
											}
										</script>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Height (* In f.inc):</label>
												<input type="numbers" name="height" class="form-control" id="heightInput" placeholder="Enter Height">
												<span class="error" id="heightError" style="display: none; color: red;">Invalid height format (Example: 5.8)</span>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Weight (* In kg):</label>
												<input type="numeric" name="weight" class="form-control" id="weightInput" placeholder="Enter Weight"/>
												<span class="error" id="weightError" style="display: none; color: red;">Enter a valid weight (35 - 225 kg)</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Physical Status:</label>
												<select name="body" class="form-control form-select chosen-select" data-placeholder="Select Body Type">
													<option selected disabled value="">Body Type</option>
													<option value="Fat">Fat</option>
													<option value="Skinny">Skinny</option>
													<option value="Normal">Normal</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb"></label>
												<select name="complexion" class="form-control form-select chosen-select" data-placeholder="Select Complexion">
													<option selected disabled value="">Select Complexion</option>
													<option value="Brown">Brown</option>
													<option value="Dark">Dark</option>
													<option value="Normal">Normal</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="lb">Your Rashi:</label>
											<select name="rashi" class="form-control" data-placeholder="Select Rashi"  id="rashi">
												
												<option value="Mesh">Mesh (Aries)</option>
												<option value="Varishabha">Varishabha (Taurus)</option>
												<option value="Mithuna">Mithuna (Gemini)</option>
												<option value="Karka">Karka (Cancer)</option>
												<option value="Sinha">Sinha (Leo)</option>
												<option value="Kanya">Kanya (Virgo)</option>
												<option value="Tula">Tula (Libra)</option>
												<option value="Vrischika">Vrischika (Scorpio)</option>
												<option value="Dhanur">Dhanur (Sagittarius)</option> <!-- Fixed spelling -->
												<option value="Makara">Makara (Capricorn)</option>
												<option value="Kumbha">Kumbha (Aquarius)</option>
												<option value="Meena">Meena (Pisces)</option> <!-- Made consistent -->
											</select>
										</div>
										<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
											<label class="lb">Cast no Bar:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" checked="checked" name="cast" value="1" id="yes" />
											<label for="yes">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" value="0" name="cast" id="no" />
											<label for="no">No</label>
										</div>
									</div>
									<!--END PROFILE BIO-->
									<!--PROFILE BIO-->
									<div class="edit-pro-parti">
										<div class="form-tit">
											<h1>Lifestyle Info.</h1>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="lb">Your Diet:</label>
												<select name="diet1" class="form-control form-select chosen-select" data-placeholder="Select Diet" id="diet">
													<option selected disabled value="">Select Diet</option>
													<option value="Any">Any</option>
													<option value="Veg">Veg</option>
													<option value="Non-Veg">Non-Veg</option>
												</select>
											</div>
											<div class="form-group">
												<label class="lb">Your Bloodgroup:</label>
												<select name="bloodgroup" class="form-control form-select chosen-select" data-placeholder="Select Diet">
													<option selected disabled value="">Bloodgroup</option>
													<option value="A+">A+ (A Positive)</option>
													<option value="A-">A- (A Negative)</option>
													<option value="B+">B+ (B Positive)</option>
													<option value="B-">B- (B Negative)</option>
													<option value="O+">O+ (O Positive)</option>
													<option value="O-">O- (O Negative)</option>
													<option value="AB+">AB+ (AB Positive)</option>
													<option value="AB-">AB- (AB Negative)</option>
												</select>
											</div>
											<div class="form-group">
												<label class="lb">Your Hobbies & Intrest:</label>
												<div class="chosenini">
													<div class="form-group">
														<select name="hobby[]" class="chosen-select" data-placeholder="Select your Hobbies"  id="hobby" multiple onchange="generateAboutYou()">
															<option></option>
															<option value="Adventure Travel">Adventure Travel</option>
															<option value="Astronomy">Astronomy</option>
															<option value="Blogging">Blogging</option>
															<option value="Books Reading">Books Reading</option>
															<option value="Chess">Chess</option>
															<option value="Collecting Stamps">Collecting Stamps</option>
															<option value="Cooking">Cooking</option>
															<option value="Cycling">Cycling</option>
															<option value="Dancing">Dancing</option>
															<option value="Drawing">Drawing</option>
															<option value="Fishing">Fishing</option>
															<option value="Gardening">Gardening</option>
															<option value="Graphic Designing">Graphic Designing</option>
															<option value="Gyming">Gyming</option>
															<option value="Hangout with Family">Hangout with Family</option>
															<option value="Hiking">Hiking</option>
															<option value="Horse Riding">Horse Riding</option>
															<option value="Modelling">Modelling</option>
															<option value="Movies">Movies</option>
															<option value="Music">Music</option>
															<option value="Painting">Painting</option>
															<option value="Photography">Photography</option>
															<option value="Playing">Playing</option>
															<option value="Playing Musical Instruments">Playing Musical Instruments</option>
															<option value="Poetry">Poetry</option>
															<option value="Singing">Singing</option>
															<option value="Sketching">Sketching</option>
															<option value="Swimming">Swimming</option>
															<option value="Traveling">Traveling</option>
															<option value="Video Editing">Video Editing</option>
															<option value="Volleyball">Volleyball</option>
															<option value="Watching">Watching</option>
															<option value="Watching Documentaries">Watching Documentaries</option>
															<option value="Woodworking">Woodworking</option>
															<option value="Writing">Writing</option>
															<option value="Yoga">Yoga</option>
															<option value="Others">Others</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="lb">Language Known:</label>
												<div class="chosenini">
													<div class="form-group">
														<select name="lang[]" class="chosen-select" data-placeholder="Select Languages" id="lang" multiple>
															<option></option>
															<option value="Gujarati"> Gujarati </option>
															<option value="English"> English </option>
															<option value="Hindi"> Hindi </option>
															<option value="Kannad"> Kannad </option>
															<option value="Marathi"> Marathi </option>
															<option value="Punjabi"> Punjabi </option>
															<option value="Telugu"> Telugu </option>
															<option value="Urdu"> Urdu </option>
															<option value="Sanskrit"> Sanskrit </option>
															<option value="Dogri"> Dogri </option>
															<option value="Nepali"> Nepali </option>
															<option value="Tamil"> Tamil </option>
															<option value="Telugu"> Telugu </option>
															<option value="Sindhi"> Sindhi </option>
															<option value="Bengali"> Bengali </option>
															<option value="Malayalam"> Malayalam </option>
															<option value="Oriya"> Oriya </option>
															<option value="Bodo"> Bodo </option>
															<option value="Maithili"> Maithili </option>
															<option value="Konkani"> Konkani </option>
															<option value="Kashmiri"> Kashmiri </option>
															<option value="Manipuri"> Manipuri </option>
															<option value="Other"> Other </option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
												<label class="lb">Vehicles having:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" class="radio_1" checked="checked" value="0" name="vehicles" id="v0" />
												<label for="v0">0</label>
												<input type="radio" class="radio_1" checked="checked" value="1" name="vehicles" id="v1" />
												<label for="v1">1</label>
												<input type="radio" class="radio_1" name="vehicles" value="2" id="v2" />
												<label for="v2">2</label>
												<input type="radio" class="radio_1" name="vehicles" value="3" id="v3" />
												<label for="v3">3 or More</label>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label class="lb">Habbits:</label>
													<select name="drink1" class="form-control form-select chosen-select" data-placeholder="Select Habbits" id="drink">
														<option selected disabled value="">Drinking Habbits</option>
														<option value="NO">NO</option>
														<option value="Occasionally">Occasionally</option>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label class="lb"></label>
													<select name="smoke1" class="form-control form-select chosen-select" data-placeholder="Select Habbits" id="smoke">
														<option selected disabled value="">Smoking Habbits</option>
														<option value="NO">NO</option>
														<option value="Occasionally">Occasionally</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<!--PROFILE BIO-->
									<div class="edit-pro-parti">
										<div class="form-tit">
											<h1>Career Info.</h1>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Your Qualification:</label>
												<select name="qualific" class="form-control form-select chosen-select" data-placeholder="Select Qualification" >
													<option selected disabled value="">Select Qualification:</option>
													<option value="B.A">B.A</option>
													<option value="B.Arch">B.Arch</option>
													<option value="B.B.A">B.B.A</option>
													<option value="B.C.A">B.C.A</option>
													<option value="B.Com">B.Com</option>
													<option value="B.Des">B.Des</option>
													<option value="B.Ed.">B.Ed.</option>
													<option value="B.H.M.">B.H.M.</option>
													<option value="B.Lib">B.Lib</option>
													<option value="B.P.Ed">B.P.Ed</option>
													<option value="B.Pharm">B.Pharm</option>
													<option value="B.Sc">B.Sc</option>
													<option value="B.Tech">B.Tech</option>
													<option value="B.Voc">B.Voc</option>
													<option value="D.Ed">D.Ed</option>
													<option value="D.Pharma">D.Pharma</option>
													<option value="L.L.B.">L.L.B.</option>
													<option value="M.A">M.A</option>
													<option value="M.Arch">M.Arch</option>
													<option value="M.B.A">M.B.A</option>
													<option value="M.B.B.S.">M.B.B.S.</option>
													<option value="M.C.A">M.C.A</option>
													<option value="M.Com">M.Com</option>
													<option value="M.Des">M.Des</option>
													<option value="M.Ed.">M.Ed.</option>
													<option value="M.Lib">M.Lib</option>
													<option value="M.P.Ed">M.P.Ed</option>
													<option value="M.Pharm">M.Pharm</option>
													<option value="M.Sc">M.Sc</option>
													<option value="M.Tech">M.Tech</option>
													<option value="M.Voc">M.Voc</option>
													<option value="Ph.D.">Ph.D.</option>
													<option value="Other">Other</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Your Occupation:</label>
												<select name="occupation" class="form-control form-select chosen-select" data-placeholder="Select Qualification" id="occupation" onchange="generateAboutYou()">
													<option selected disabled value="">Select Occupation</option>
													<option value="Accountant">Accountant</option>
													<option value="Architect">Architect</option>
													<option value="Artist">Artist</option>
													<option value="Banker">Banker</option>
													<option value="Businessman">Businessman</option>
													<option value="Chef">Chef</option>
													<option value="Consultant">Consultant</option>
													<option value="Dentist">Dentist</option>
													<option value="Doctor">Doctor</option>
													<option value="Engineer">Engineer</option>
													<option value="Farmer">Farmer</option>
													<option value="Fashion Designer">Fashion Designer</option>
													<option value="Graphic Designer">Graphic Designer</option>
													<option value="Journalist">Journalist</option>
													<option value="Lawyer">Lawyer</option>
													<option value="Librarian">Librarian</option>
													<option value="Manager">Manager</option>
													<option value="Mechanic">Mechanic</option>
													<option value="Nurse">Nurse</option>
													<option value="Pharmacist">Pharmacist</option>
													<option value="Pilot">Pilot</option>
													<option value="Police Officer">Police Officer</option>
													<option value="Professor">Professor</option>
													<option value="Psychologist">Psychologist</option>
													<option value="Scientist">Scientist</option>
													<option value="Software Developer">Software Developer</option>
													<option value="Social Worker">Social Worker</option>
													<option value="Soldier">Soldier</option>
													<option value="Teacher">Teacher</option>
													<option value="Writer">Writer</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Your Designation:</label>
												<select name="designation" class="form-control form-select chosen-select" data-placeholder="Select Designation">
													<option selected disabled value="">Select Designation</option>
													<option value="Admin">Admin</option>
													<option value="Accountant">Accountant</option>
													<option value="Assistant Manager">Assistant Manager</option>
													<option value="Branch Manager">Branch Manager</option>
													<option value="Chief Executive Officer">Chief Executive Officer</option>
													<option value="Chief Financial Officer">Chief Financial Officer</option>
													<option value="Chief Operating Officer">Chief Operating Officer</option>
													<option value="Clerk">Clerk</option>
													<option value="Consultant">Consultant</option>
													<option value="Creative Director">Creative Director</option>
													<option value="Customer Support Executive">Customer Support Executive</option>
													<option value="Data Analyst">Data Analyst</option>
													<option value="Data Entry Operator">Data Entry Operator</option>
													<option value="Department Head">Department Head</option>
													<option value="Director">Director</option>
													<option value="Executive Assistant">Executive Assistant</option>
													<option value="Finance Manager">Finance Manager</option>
													<option value="Financer">Financer</option>
													<option value="General Manager">General Manager</option>
													<option value="Graphic Designer">Graphic Designer</option>
													<option value="HR">HR</option>
													<option value="HR Manager">HR Manager</option>
													<option value="IT Manager">IT Manager</option>
													<option value="Legal Advisor">Legal Advisor</option>
													<option value="Marketing Manager">Marketing Manager</option>
													<option value="Operations Manager">Operations Manager</option>
													<option value="Product Manager">Product Manager</option>
													<option value="Project Manager">Project Manager</option>
													<option value="Public Relations Officer">Public Relations Officer</option>
													<option value="Regional Manager">Regional Manager</option>
													<option value="Sales Executive">Sales Executive</option>
													<option value="Senior Analyst">Senior Analyst</option>
													<option value="Software Developer">Software Developer</option>
													<option value="Supervisor">Supervisor</option>
													<option value="Team Leader">Team Leader</option>
													<option value="Vice President">Vice President</option>
													<option value="Other">Other</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Company Name:</label>
												<input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="company"/>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Work With:</label>
												<select name="work" class="form-control form-select chosen-select" data-placeholder="Select your Work">
													<option selected disabled value="">Select your Work</option>
													<option value="Government">Government</option>
													<option value="Private">Private</option>
													<option value="Self Employee">Self Employee</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Your Income Per Annum :</label>
												<input type="number" class="form-control" id="income" name="income" placeholder="* (Income Per Annum)" min="10000"  id="income"required />
												<span id="incomeError" style="color: red; display: none;"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="lb">Something About You:</label>
											<textarea id="aboutyou" name="aboutyou" class="textarea1 form-control" 
													  placeholder="Example: Your name, age, and a brief description about yourself (Max 100 words)" 
													  onfocus="fillAutoText()"></textarea>
											
										</div>
									</div>
									<!--END PROFILE BIO-->
									<div class="form-actions">
										<input type="submit" id="edit-submit" name="submit" value="Submit" class="btn btn-primary">
									</div>
								</form>
							</div>
						</div>
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

	<script src="js/validation/jquery.validate.min.js"></script>
    <script src="js/validation/additional-methods.min.js"></script>
	
	<!-- FOOTER -->
    <?php
		include_once 'footer.php';
	?>
    <!-- END -->
    <!-- COPYRIGHTS -->
    <!-- END -->

	<div id = "v-w3layouts"></div>
	<script src="js/city.js"></script>
	
	<script>
    document.getElementById("income").addEventListener("input", function () {
        let income = this.value;
        let errorSpan = document.getElementById("incomeError");

        if (income <= 10000) {
            errorSpan.style.display = "block";
        } else {
            errorSpan.style.display = "none";
        }
	});
	</script>
	<script>
	$(document).ready(function() {
		// Validate Height (Feet.Inches Format)
		$('#heightInput').on('input', function() {
			let heightVal = $(this).val();
			let heightRegex = /^[4-7]\.[0-9]$/; // Valid range: 4.0 - 7.9
			if (!heightRegex.test(heightVal)) {
				$('#heightError').show();
			} else {
				$('#heightError').hide();
			}
		});

		// Validate Weight (20 - 300 kg)
		$('#weightInput').on('input', function() {
			let weightVal = $(this).val();
			if (!/^\d+$/.test(weightVal) || weightVal < 35 || weightVal > 225) {
				$('#weightError').show();
			} else {
				$('#weightError').hide();
			}
		});
	});
	</script>
	<script>
		$(function() {
		  $("#form-registeration").validate({
			rules: {
			  Fname: {
				required: true,
				minlength: 2,
				maxlength: 15,
				pattern: /^[A-Za-z]+$/
			  },
			  Lname: {
				required: true,
				minlength: 3,
				maxlength: 15,
				pattern: /^[A-Za-z]+$/
			  },
			  dob: {
				required: true,
			  },
			  age: {
				required: true,
			  },
			  religion: {
				required: true,
			  },
			  State_ID: {
				required: true,
			  },
			  subcommunity_id: {
				required: true,
			  },
			  Community_ID: {
				required: true,
			  },
			  aadhar: {
				maxlength: 12,
				minlength: 12
			  },
			  contact: {
				maxlength: 10,
				minlength: 10
			  },
			  cityname: {
				required: true,
			  }
			},
			messages: {
			  Fname: {
				required: "<p style='color:red; font-size:14px;'>Your data must be at least 3 characters</p>",
				minlength: "<p style='color:red;'>Your data must be at least 2 characters</p>",
				maxlength: "<p style='color:red;'>Your data is too long</p>",
				pattern: "Please enter letters only."
			  },
			  Lname: {
				required: "<p style='color:red; font-size:14px;'>Your data must be at least 3 characters</p>",
				minlength: "<p style='color:red;'>Your data must be at least 3 characters</p>",
				maxlength: "<p style='color:red;'>Your data is too long</p>",
				pattern: "Please enter letters only."
			  },
			  dob: {
				required: "<p style='color:red; font-size:14px;'>Birth Date is required.</p>"
			  },
			  contact: {
				maxlength: "<p style='color:red;'>Number should be of 10 digit.</p>",
			  },
			  aadhar: {
				minlength: "<p style='color:red;'>Enter valid card details</p>",
				maxlength: "<p style='color:red;'>Enter valid card details</p>",
			  },
			  age: {
				required: "<p style='color:red; font-size:14px;margin-top: 5px;margin-left: -11px;'>Age is required.</p>"
			  },
			  religion: {
				required: "<p style='color:red; font-size:14px;'>Religion is required.</p>"
			  },
			  State_ID: {
				required: "<p style='color:red; font-size:14px;'>State is required.</p>"
			  },
			  cityname: {
				required: "<p style='color:red; font-size:14px;'>City is required.</p>"
			  },
			  Community_ID: {
				required: "<p style='color:red; font-size:14px;'>Community is required.</p>"
			  },
			  subcommunity_id: {
				required: "<p style='color:red; font-size:14px;'>Sub-community is required.</p>"
			  }
			}
		  });
		});

		$(function() {
			$("#form-registeration").validate({
				rules: {
				  maritalstatus: {
					required: true,
				  },
				  
				  rashi: {
					required: true,
				  },
				  diet1: {
					required: true,
				  },
				  bloodgroup: {
					required: true,
				  },
				  cityname: {
					required: true,
				  }
				},
				messages: {
				  maritalstatus: {
					required: "This field is required.",
				  },
				  
				  rashi: {
					required: "This field is required.",
				  },
				  diet1: {
					required: "This field is required.",
				  },
				  bloodgroup: {
					required: "This field is required.",
				  },
				  cityname: {
					required: "This field is required.",
				  },
				  income: {
					required: "This field is required.",
				  }
				}
			});
		});

		$(function() {
			$("#form-registeration").validate({
                rules: {
                  qualific: {
                    required: true,
                  },
                  occupation: {
                    required: true,
                  },
                  work: {
                    required: true,
                  },
                  designation: {
                    required: true,
                  }
                },
                messages: {
                  qualific: {
                    required: "This field is required.",
                  },
                  occupation: {
                    required: "This field is required.",
                  },
                  work: {
                    required: "This field is required.",
                  },
                  designation: {
                    required: "This field is required.",
                  }
                }
            });
        });
		
		function calculateAge() {
			var dob = document.getElementById('dob').value;
			if (dob) {
				var birthDate = new Date(dob);
				var today = new Date();
				var age = today.getFullYear() - birthDate.getFullYear();
				var m = today.getMonth() - birthDate.getMonth();
				if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
					age--;
				}
				document.getElementById('age').value = age;
			} else {
				document.getElementById('age').value = '';
			}
		}
		
	</script>
	<script>

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact = $_POST['contact'];
    
    if (!preg_match("/^[0-9+]+$/", $contact)) {
			echo "Invalid contact number! Only digits and '+' are allowed.";
		} else {
			echo "Valid contact number.";
		}
	}
	</script>
	 <script>
        // Rashi Mapping based on the first letter
        const rashiMapping = {
            "Mesh": ["A","O", "L", "E"],
            "Varishabha": ["B", "V", "U"],
            "Mithuna": ["K", "C", "G"],
            "Karka": ["D", "H"],
            "Sinha": ["M", "T"],
            "Kanya": ["P", "N"],
            "Tula": ["R", "T"],
            "Vrischika": ["N", "Y"],
            "Dhanur": ["Bh", "F", "Dh"],
            "Makara": ["Kh", "J"],
            "Kumbha": ["G", "S", "Sh"],
            "Meena": ["D", "Ch", "Z", "Th"]
        };

        $(document).ready(function () {
            $('#Fname').on('input', function () {
                let firstName = $(this).val().trim().toUpperCase();
				//console.log(firstName);
				//alert(firstName);
                if (firstName.length > 0) {
                    let firstLetter = firstName.charAt(0);
                    let matchedRashi = null;

                    for (let rashi in rashiMapping) {
                        if (rashiMapping[rashi].includes(firstLetter)) {
                            matchedRashi = rashi;
                            break;
                        }
                    }

                    if (matchedRashi) {
                        $('#rashi').val(matchedRashi);
                    } else {
                        $('#rashi').val(""); // Reset if no match
                    }
                }
            });
        });
    </script>
	    <script>
		let state = "";
        $(document).ready(function(){
            $("#State_ID").change(function(){
                let stateID = $(this).val(); // Get selected state_id

                $.ajax({
                    url: "get_state_name.php", // PHP file to fetch state name
                    type: "POST",
                    data: { State_ID: stateID },
                    success: function(response) {
                        $("#output").text(response); // Update <span> dynamically

                        // Now, assign the value to a JavaScript variable
                         state = response;
                        console.log("hieee Selected State Name:", state);
                    }
                });
            });
        });
   
		function generateAboutYou() {
			
			let name = document.getElementById("Fname").value.trim();
			let age = document.getElementById("age").value.trim();
			let occupation = document.getElementById("occupation").value;
			//let state = document.getElementById("output").value;
			// Get selected hobbies and join them into a sentence
			let hobbiesSelect = document.getElementById("hobby");
			let selectedHobbies = Array.from(hobbiesSelect.selectedOptions).map(option => option.value);
			let hobbiesText = selectedHobbies.length > 0 ? `I love ${selectedHobbies.join(", ")}.` : "";

			// Generate the profile description
			let aboutYou = "";

			if (name && age && occupation) {
				aboutYou = `Hi, I am ${name}, ${age} years old. I am a ${occupation} working in ${state}. ${hobbiesText} Looking for a compatible life partner with shared values.`;
			}

			document.getElementById("aboutyou").value = aboutYou;
		}

    </script>

</body>
<!-- Dream Class By user-profile-edit.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:34 GMT -->
</html>
