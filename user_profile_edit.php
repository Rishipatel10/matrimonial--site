<?php
	include_once 'connection.php';
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
	    $selected_hobbies = array();
		$selected_languages = array();
        $fname=$lname=$gender=$dob=$age=$contact=$aadhar=$bplace=$state=$district=$add=$religion=$community=$scommunity=$family=$mstatus=$child=$rashi=$body_type=$complexion=$height=$weight=$caste=" ";
		$vehicle=$drink=$smoke=$diet=$language=$hob_int=$bg=$qualification=$description=$designation=$income=$occupation=$company=$work_with="";
		if(isset($_GET['member_id']))
		{
			$qry="select*from member_tbl,lifestyle_tbl,member_qualification_tbl,member_detail_tbl where member_tbl.member_id='".$_GET['member_id']."' and member_tbl.member_id=member_detail_tbl.member_id and member_detail_tbl.member_detail_id=lifestyle_tbl.member_detail_id and member_detail_tbl.member_detail_id=member_qualification_tbl.member_detail_id";
			
			$query="select * from state_tbl,city_tbl,member_tbl where member_tbl.member_id='".$_GET['member_id']."' and member_tbl.member_city=city_tbl.city_id and state_tbl.state_id=city_tbl.state_id";
			
			$data=mysqli_query($conn,$qry);
			$row=mysqli_fetch_array($data);
			
			$dataa=mysqli_query($conn,$query);
			$roww=mysqli_fetch_array($dataa);
			
			$fname=$row['member_firstname'];
			$lname=$row['member_lastname'];
			$gender=$row['member_gender'];
			//echo $gender;
			$dob=$row['member_dob'];
			$age=$row['member_age'];
			$contact=$row['member_contact'];
			$aadhar=$row['member_adhar_id'];
			$bplace=$row['member_birthplace'];
			$_SESSION['district']=$roww['member_city'];
			$add=$row['residential_status'];
			$religion=$row['member_religion'];
			$family=$row['member_with_family'];
			$mstatus=$row['marital_status'];
			$child=$row['member_childrens'];
			$rashi=$row['member_rashi'];
			$body_type=$row['member_body_type'];
			$complexion=$row['member_complexion'];
			$height=$row['member_height'];
			$weight=$row['member_weight'];
			$caste=$row['caste_no_bar'];
			$bg=$row['bloodgroup'];
			$hob_int=$row['hobbies_interest'];
			$diet=$row['member_diet'];
			$language=$row['language_known'];
			$smoke=$row['smoking_habbits'];
			$drink=$row['drinking_habbits'];
			$vehicle=$row['vehicles_having'];
			$occupation=$row['member_occupation'];
			$qualification=$row['member_qualification'];
			$designation=$row['member_designation'];
			$income=$row['member_income'];
			$description=$row['member_description'];
			$work_with=$row['member_work_with'];
			$company=$row['member_company_name'];
			
		
			$sql = "SELECT hobbies_interest , language_known FROM lifestyle_tbl,member_tbl,member_detail_tbl WHERE member_tbl.member_id=member_detail_tbl.member_id and member_detail_tbl.member_detail_id=lifestyle_tbl.member_detail_id and member_tbl.member_id = '".$_GET['member_id']."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$dataa = $result->fetch_assoc();
				// Assuming hobbies_interest is stored as a comma-separated list
				$selected_hobbies = explode(",", $dataa['hobbies_interest']);
				$selected_languages = explode(",", $dataa['language_known']);
			}else {
				// Handle the case where no rows were returned
				echo "No hobbies found for this user.";
			}
			
			
		}
		if(isset($_POST['submit']))
		{
			if(!empty($_GET['member_id']))
			{
				 $selected_hobbies = $_POST['hobby'];
				 $hobbies_string = implode(",", $selected_hobbies);
				 $selected_languages = $_POST['lang'];
                 $languages_string = implode(",", $selected_languages);
    
				 $str="update member_tbl,lifestyle_tbl,member_qualification_tbl,member_detail_tbl,community_tbl,sub_community_tbl set language_known='".$languages_string."',hobbies_interest='".$hobbies_string."', member_firstname='".$_POST['fname']."' , member_lastname='".$_POST['lname']."' , member_gender='".$_POST['gen']."' , member_dob='".$_POST['dob']."', member_age='".$_POST['age']."', member_contact='".$_POST['contact']."', member_adhar_id='".$_POST['aadhar']."', member_birthplace='".$_POST['bithplace']."', residential_status='".$_POST['residential_add']."', member_religion='".$_POST['religion']."', member_with_family='".$_POST['family']."', marital_status='".$_POST['maritalstatus']."', member_childrens='".$_POST['child']."', member_rashi='".$_POST['rashi']."', member_body_type='".$_POST['body']."', member_complexion='".$_POST['complexion']."',member_height='".$_POST['height']."',member_weight='".$_POST['weight']."',caste_no_bar='".$_POST['cast']."', bloodgroup='".$_POST['bloodgroup']."', member_diet='".$_POST['diet1']."', smoking_habbits='".$_POST['smoke1']."',drinking_habbits='".$_POST['drink1']."',vehicles_having='".$_POST['vehicles']."',member_occupation='".$_POST['occupation']."',member_qualification='".$_POST['qualific']."',member_designation='".$_POST['designation']."',member_income='".$_POST['income']."',member_description='".$_POST['aboutyou']."',member_work_with='".$_POST['work']."',member_company_name='".$_POST['company']."' where member_tbl.member_id='".$_GET['member_id']."' and member_tbl.member_id=member_detail_tbl.member_id and member_detail_tbl.member_detail_id=lifestyle_tbl.member_detail_id and member_detail_tbl.member_detail_id=member_qualification_tbl.member_detail_id";
				 //echo $str;
				 mysqli_query($conn,$str);
				 
				 header('location:user_interests.php');
				 $_SESSION["Fname"]=$_POST['fname'];
				 $_SESSION["Lname"]=$_POST['lname'];
				 
			}
			else
			{
				 echo "<strong><div class='alert alert-danger'>Can not update</div></strong>";
			}
			
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
												<input type="text" class="form-control" placeholder="Enter your First Name" name="fname" value="<?php echo $fname; ?>"/>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Last Name:</label>
												<input type="text" class="form-control" placeholder="Enter your Last Name" name="lname" value="<?php echo $lname; ?>"/>
											</div>
										</div>
										<div class="row">
											<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
												<label class="lb">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" name="gen" value="Male" <?php if($gender=="Male"){ echo 'checked';}?> id="male" />
												<label for="Male">Male</label>
												<input type="radio" name="gen" value="Female" <?php if($gender=="Female"){ echo 'checked';}?> id="female" />
												<label for="Female">Female</label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
											<label class="lb">Date Of Birth:</label>
											<input type="date" id="dob" name="dob" class="form-control" value="<?php echo $dob; ?>" max="2004-03-26" onchange="calculateAge()"/>
										</div>
										<div class="col-md-6 form-group">
											<label class="lb">Age:</label>
											<input type="text" id="age" name="age" value="<?php echo $age; ?>" class="form-control" readonly/>
										</div>
										</div>
										<div class="form-group">
											<label class="lb">Contact No.:</label>
											<input type="text" class="form-control" placeholder="Contact Detail" name="contact" value="<?php echo $contact; ?>" pattern="^[0-9]+$" title="Only positive numbers allowed."/>
										</div>
										<div class="form-group">
											<label class="lb">Aadhar Card :</label>
											<input type="text" class="form-control" placeholder="Aadhar Card Detail" name="aadhar" value="<?php echo $aadhar; ?>"/>
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
												<input type="text" id="city-input" class="form-control" placeholder="Your birthplace" name="bithplace" value="<?php echo $bplace; ?>">
												<div id="city-dropdown" class="list-group position-absolute w-100"></div>			
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">State:</label>
												<select class="form-control form-select" onChange="get_city(this.value);" name="State_ID">
													<option selected disabled>Select State</option>
													<?php
														$State_ID="";
														$str_state="Select * from state_tbl";
														$res=mysqli_query($conn,$str_state);
														while($row=mysqli_fetch_array($res))
														{
													?>
															<option value="<?php echo $row['state_id']; ?>"> <?php echo ucfirst($row['state_name']); ?> </option>
													<?php
														}
													?>
												</select>
											</div>
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
												<textarea class="form-control" name="residential_add"><?php echo $add;?></textarea>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="lb">Religion:</label>
												<select name="religion" class="form-control form-select chosen-select" data-placeholder="Select your Religion">
													<option selected disabled value="">Select Religion</option>
													<option value="Hindu" <?php if($religion=="Hindu"){echo 'selected';}?>>Hindu</option>
													<option value="Muslim" <?php if($religion=="Muslim"){echo 'selected';}?>>Muslim</option>
													<option value="Christian" <?php if($religion=="Christian"){echo 'selected';}?>>Christian</option>
													<option value="Sikh" <?php if($religion=="Sikh"){echo 'selected';}?>>Sikh</option>
													<option value="Buddhist" <?php if($religion=="Buddhist"){echo 'selected';}?>>Buddhist</option>
													<option value="Jain" <?php if($religion=="Jain"){echo 'selected';}?>>Jain</option>
													<option value="Parsi" <?php if($religion=="Parsi"){echo 'selected';}?>>Parsi</option>
													<option value="Other" <?php if($religion=="Other"){echo 'selected';}?>>Other</option>
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
													$str_community="select * from community_tbl where community_status != '0'";
													$res=mysqli_query($conn,$str_community);

													while($row=mysqli_fetch_array($res))
													{
												?>
														<option value="<?php echo $row['community_id']; ?>"> <?php echo ucfirst($row['community_name']);?> </option>
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
											<input type="radio" class="radio_1" name="family" value="yes" <?php if($family=="yes"){echo 'checked';}?> id="yes" />
											<label for="yes">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" value="no" name="family" <?php if($family=="no"){echo 'checked';}?> id="no" />
											<label for="no">No</label>
										</div>

										<div class="form-group">
											<label class="lb">Marital Status:</label>
											<select name="maritalstatus" onChange="have_children(this.value);" class="form-control form-select chosen-select" data-placeholder="Select Marital Status">
												<option selected disabled value="">Select Marital Status</option>
												<option value="Separated" <?php if($mstatus=="Separated"){echo 'selected';}?>>Separated</option>
												<option value="Annulled" <?php if($mstatus=="Separated"){echo 'selected';}?>>Annulled</option>
												<option value="Awaiting" <?php if($mstatus=="Awaiting"){echo 'selected';}?>>Awaiting Divorced</option>
												<option value="Divorced" <?php if($mstatus=="Divorced"){echo 'selected';}?>>Divorced</option>
												<option value="Single" <?php if($mstatus=="Single"){echo 'selected';}?>>Never Married</option>
												<option value="Widowed/Widower" <?php if($mstatus=="Widowed/Widower"){echo 'selected';}?>>Widowed/Widower</option>
											</select>
										</div>
										<div class="form-group form_but1" id="Childrens_id" style="display: none; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
											<label class="lb" style="white-space: nowrap;">Do you have any children?</label>
											<input type="radio" value="0" onChange="check_no_of_children(this.value);" class="radio_1" <?php if($child=="0"){echo 'checked';}?> name="child" /> NO
											<input type="radio" value="1" onChange="check_no_of_children(this.value);" class="radio_1" <?php if($child=="1"){echo 'checked';}?> name="child" /> Yes, Living together
											<input type="radio" value="2" onChange="check_no_of_children(this.value);" class="radio_1" <?php if($child=="2"){echo 'checked';}?> name="child" /> Yes, Not Living together
										</div>
										<div class="form-group form_but1" id="No_of_Childrens" style="display: none; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
											<label class="lb" style="white-space: nowrap;">Childrens:</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" checked="checked" value="1" name="childs" /> 1
											<input type="radio" class="radio_1" name="childs" value="2" <?php if($child=="2"){echo 'checked';}?> /> 2
											<input type="radio" class="radio_1" name="childs" value="3" <?php if($child=="3"){echo 'checked';}?> /> 3 or More
										</div>	
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Height (* In f.inc):</label>
												<input type="numbers" name="height" class="form-control" id="heightInput"  value="<?php echo $height;?>" placeholder="Enter Height">
												<span class="error" id="heightError" style="display: none; color: red;">Invalid height format (Example: 5.8)</span>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Weight (* In kg):</label>
												<input type="numeric" name="weight" class="form-control" id="weightInput" value="<?php echo $weight;?>" placeholder="Enter Weight"/>
												<span class="error" id="weightError" style="display: none; color: red;">Enter a valid weight (35 - 225 kg)</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Physical Status:</label>
												<select name="body" class="form-control form-select chosen-select" data-placeholder="Select Body Type">
													<option selected disabled value="">Body Type</option>
													<option value="Skinny" <?php if($body_type=="Skinny"){echo 'selected';}?>>Skinny</option>
													<option value="Fat" <?php if($body_type=="Fat"){echo 'selected';}?>>Fat</option>
													<option value="Normal" <?php if($body_type=="Normal"){echo 'selected';}?>>Normal</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb"></label>
												<select name="complexion" class="form-control form-select chosen-select" data-placeholder="Select Complexion">
													<option selected disabled value="">Select Complexion</option>
													<option value="Dark" <?php if($complexion=="Dark"){echo 'selected';}?>>Dark</option>
													<option value="Brown"<?php if($complexion=="Brown"){echo 'selected';}?>>Brown</option>
													<option value="Normal"<?php if($complexion=="Normal"){echo 'selected';}?>>Normal</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="lb">Your Rashi:</label>
											<select name="rashi" class="form-control form-select chosen-select" data-placeholder="Select Rashi">
												<option selected disabled value="">Select Rashi</option>
												<option value="Mesh" <?php if($rashi=="Mesh"){echo 'selected';}?>>Mesh (Aries)</option>
												<option value="Varishabha" <?php if($rashi=="Varishabha"){echo 'selected';}?>>Varishabha (Taurus)</option>
												<option value="Mithuna" <?php if($rashi=="Mithuna"){echo 'selected';}?>>Mithuna (Gemini)</option>
												<option value="Karka" <?php if($rashi=="Karka"){echo 'selected';}?>>Karka (Cancer)</option>
												<option value="Sinha" <?php if($rashi=="Sinha"){echo 'selected';}?>>Sinha (Leo)</option>
												<option value="Kanya" <?php if($rashi=="Kanya"){echo 'selected';}?>>Kanya (Virgo)</option>
												<option value="Tula" <?php if($rashi=="Tula"){echo 'selected';}?>>Tula (Libra)</option>
												<option value="Vrischika" <?php if($rashi=="Vrischika"){echo 'selected';}?>>Vrischika (Scorpio)</option>
												<option value="Dhanur" <?php if($rashi=="Dhanur"){echo 'selected';}?>>Dhanur (Sagittarius)</option> <!-- Fixed spelling -->
												<option value="Makara" <?php if($rashi=="Makara"){echo 'selected';}?>>Makara (Capricorn)</option>
												<option value="Kumbha" <?php if($rashi=="Kumbha"){echo 'selected';}?>>Kumbha (Aquarius)</option>
												<option value="Meena" <?php if($rashi=="Meena"){echo 'selected';}?>>Meena (Pisces)</option> <!-- Fixed for consistency -->
											</select>
										</div>
										<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
											<label class="lb">Cast no Bar:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" name="cast" value="1" <?php if($caste=="1"){echo 'checked';}?> id="yes" />
											<label for="yes">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" class="radio_1" value="0" <?php if($caste=="0"){echo 'checked';}?> name="cast" id="no" />
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
												<select name="diet1" class="form-control form-select chosen-select" data-placeholder="Select Diet">
													<option selected disabled value="">Select Diet</option>
													<option value="Veg" <?php if($diet=="Veg"){echo 'selected';}?>>Veg</option>
													<option value="Non-Veg" <?php if($diet=="Non-Veg"){echo 'selected';}?>>Non-Veg</option>
													<option value="Any" <?php if($diet=="Any"){echo 'selected';}?>>Any</option>
												</select>
											</div>
											<div class="form-group">
												<label class="lb">Your Bloodgroup:</label>
												<select name="bloodgroup" class="form-control form-select chosen-select" data-placeholder="Select Diet">
													<option selected disabled value="">Bloodgroup</option>
													<option value="A+" <?php if($bg=="A+"){echo 'selected';}?>>A+ (A Positive)</option>
													<option value="B+"<?php if($bg=="B+"){echo 'selected';}?>>B+ (B Positive)</option>
													<option value="A-" <?php if($bg=="A-"){echo 'selected';}?>>A- (A Negative)</option>
													<option value="B-"<?php if($bg=="B-"){echo 'selected';}?>>B- (B Negative)</option>
													<option value="O+"<?php if($bg=="o+"){echo 'selected';}?>>O+ (O Positive)</option>
													<option value="O-" <?php if($bg=="O-"){echo 'selected';}?>>O- (O Negative)</option>
													<option value="AB+" <?php if($bg=="AB+"){echo 'selected';}?>>AB+ (AB Positive)</option>
													<option value="AB-" <?php if($bg=="AB-"){echo 'selected';}?>>AB- (AB Negative)</option>
												</select>
											</div>
											<div class="form-group">
												<label class="lb">Your Hobbies & Interest:</label>
												<div class="chosenini">
													<div class="form-group">
														<select name="hobby[]" class="chosen-select" data-placeholder="Select your Hobbies" multiple>
															<option></option>
															<option value="Adventure Travel" <?php echo in_array("Adventure Travel", $selected_hobbies) ? 'selected' : ''; ?>>Adventure Travel</option>
															<option value="Astronomy" <?php echo in_array("Astronomy", $selected_hobbies) ? 'selected' : ''; ?>>Astronomy</option>
															<option value="Blogging" <?php echo in_array("Blogging", $selected_hobbies) ? 'selected' : ''; ?>>Blogging</option>
															<option value="Books Reading" <?php echo in_array("Books Reading", $selected_hobbies) ? 'selected' : ''; ?>>Books Reading</option>
															<option value="Chess" <?php echo in_array("Chess", $selected_hobbies) ? 'selected' : ''; ?>>Chess</option>
															<option value="Collecting Stamps" <?php echo in_array("Collecting Stamps", $selected_hobbies) ? 'selected' : ''; ?>>Collecting Stamps</option>
															<option value="Cooking" <?php echo in_array("Cooking", $selected_hobbies) ? 'selected' : ''; ?>>Cooking</option>
															<option value="Cycling" <?php echo in_array("Cycling", $selected_hobbies) ? 'selected' : ''; ?>>Cycling</option>
															<option value="Dancing" <?php echo in_array("Dancing", $selected_hobbies) ? 'selected' : ''; ?>>Dancing</option>
															<option value="Drawing" <?php echo in_array("Drawing", $selected_hobbies) ? 'selected' : ''; ?>>Drawing</option>
															<option value="Fishing" <?php echo in_array("Fishing", $selected_hobbies) ? 'selected' : ''; ?>>Fishing</option>
															<option value="Gardening" <?php echo in_array("Gardening", $selected_hobbies) ? 'selected' : ''; ?>>Gardening</option>
															<option value="Graphic Designing" <?php echo in_array("Graphic Designing", $selected_hobbies) ? 'selected' : ''; ?>>Graphic Designing</option>
															<option value="Gyming" <?php echo in_array("Gyming", $selected_hobbies) ? 'selected' : ''; ?>>Gyming</option>
															<option value="Hangout with Family" <?php echo in_array("Hangout with Family", $selected_hobbies) ? 'selected' : ''; ?>>Hangout with Family</option>
															<option value="Hiking" <?php echo in_array("Hiking", $selected_hobbies) ? 'selected' : ''; ?>>Hiking</option>
															<option value="Horse Riding" <?php echo in_array("Horse Riding", $selected_hobbies) ? 'selected' : ''; ?>>Horse Riding</option>
															<option value="Modelling" <?php echo in_array("Modelling", $selected_hobbies) ? 'selected' : ''; ?>>Modelling</option>
															<option value="Movies" <?php echo in_array("Movies", $selected_hobbies) ? 'selected' : ''; ?>>Movies</option>
															<option value="Music" <?php echo in_array("Music", $selected_hobbies) ? 'selected' : ''; ?>>Music</option>
															<option value="Painting" <?php echo in_array("Painting", $selected_hobbies) ? 'selected' : ''; ?>>Painting</option>
															<option value="Photography" <?php echo in_array("Photography", $selected_hobbies) ? 'selected' : ''; ?>>Photography</option>
															<option value="Playing" <?php echo in_array("Playing", $selected_hobbies) ? 'selected' : ''; ?>>Playing</option>
															<option value="Playing Musical Instruments" <?php echo in_array("Playing Musical Instruments", $selected_hobbies) ? 'selected' : ''; ?>>Playing Musical Instruments</option>
															<option value="Poetry" <?php echo in_array("Poetry", $selected_hobbies) ? 'selected' : ''; ?>>Poetry</option>
															<option value="Singing" <?php echo in_array("Singing", $selected_hobbies) ? 'selected' : ''; ?>>Singing</option>
															<option value="Sketching" <?php echo in_array("Sketching", $selected_hobbies) ? 'selected' : ''; ?>>Sketching</option>
															<option value="Swimming" <?php echo in_array("Swimming", $selected_hobbies) ? 'selected' : ''; ?>>Swimming</option>
															<option value="Traveling" <?php echo in_array("Traveling", $selected_hobbies) ? 'selected' : ''; ?>>Traveling</option>
															<option value="Video Editing" <?php echo in_array("Video Editing", $selected_hobbies) ? 'selected' : ''; ?>>Video Editing</option>
															<option value="Volleyball" <?php echo in_array("Volleyball", $selected_hobbies) ? 'selected' : ''; ?>>Volleyball</option>
															<option value="Watching" <?php echo in_array("Watching", $selected_hobbies) ? 'selected' : ''; ?>>Watching</option>
															<option value="Watching Documentaries" <?php echo in_array("Watching Documentaries", $selected_hobbies) ? 'selected' : ''; ?>>Watching Documentaries</option>
															<option value="Woodworking" <?php echo in_array("Woodworking", $selected_hobbies) ? 'selected' : ''; ?>>Woodworking</option>
															<option value="Writing" <?php echo in_array("Writing", $selected_hobbies) ? 'selected' : ''; ?>>Writing</option>
															<option value="Yoga" <?php echo in_array("Yoga", $selected_hobbies) ? 'selected' : ''; ?>>Yoga</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="lb">Language Known:</label>
												<div class="chosenini">
													<div class="form-group">
														<select name="lang[]" class="chosen-select" data-placeholder="Select Languages" multiple>
															<option></option>
															<option value="Gujarati" <?php if (in_array("Gujarati", $selected_languages)) { echo 'selected'; } ?>> Gujarati </option>
															<option value="English" <?php if (in_array("English", $selected_languages)) { echo 'selected'; } ?>> English </option>
															<option value="Hindi" <?php if (in_array("Hindi", $selected_languages)) { echo 'selected'; } ?>> Hindi </option>
															<option value="Kannad" <?php if (in_array("Kannad", $selected_languages)) { echo 'selected'; } ?>> Kannad </option>
															<option value="Marathi" <?php if (in_array("Marathi", $selected_languages)) { echo 'selected'; } ?>> Marathi </option>
															<option value="Punjabi" <?php if (in_array("Punjabi", $selected_languages)) { echo 'selected'; } ?>> Punjabi </option>
															<option value="Telugu" <?php if (in_array("Telugu", $selected_languages)) { echo 'selected'; } ?>> Telugu </option>
															<option value="Urdu" <?php if (in_array("Urdu", $selected_languages)) { echo 'selected'; } ?>> Urdu </option>
															<option value="Sanskrit" <?php if (in_array("Sanskrit", $selected_languages)) { echo 'selected'; } ?>> Sanskrit </option>
															<option value="Dogri" <?php if (in_array("Dogri", $selected_languages)) { echo 'selected'; } ?>> Dogri </option>
															<option value="Nepali" <?php if (in_array("Nepali", $selected_languages)) { echo 'selected'; } ?>> Nepali </option>
															<option value="Tamil" <?php if (in_array("Tamil", $selected_languages)) { echo 'selected'; } ?>> Tamil </option>
															<option value="Sindhi" <?php if (in_array("Sindhi", $selected_languages)) { echo 'selected'; } ?>> Sindhi </option>
															<option value="Bengali" <?php if (in_array("Bengali", $selected_languages)) { echo 'selected'; } ?>> Bengali </option>
															<option value="Malayalam" <?php if (in_array("Malayalam", $selected_languages)) { echo 'selected'; } ?>> Malayalam </option>
															<option value="Oriya" <?php if (in_array("Oriya", $selected_languages)) { echo 'selected'; } ?>> Oriya </option>
															<option value="Bodo" <?php if (in_array("Bodo", $selected_languages)) { echo 'selected'; } ?>> Bodo </option>
															<option value="Maithili" <?php if (in_array("Maithili", $selected_languages)) { echo 'selected'; } ?>> Maithili </option>
															<option value="Konkani" <?php if (in_array("Konkani", $selected_languages)) { echo 'selected'; } ?>> Konkani </option>
															<option value="Kashmiri" <?php if (in_array("Kashmiri", $selected_languages)) { echo 'selected'; } ?>> Kashmiri </option>
															<option value="Manipuri" <?php if (in_array("Manipuri", $selected_languages)) { echo 'selected'; } ?>> Manipuri </option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group" style="display: flex; align-items: center; gap: 15px;">
												<label class="lb">Vehicles having:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" class="radio_1" checked="checked" value="0" <?php if($vehicle=="0"){echo 'checked';}?> name="vehicles" id="v0" />
												<label for="v0">0</label>
												<input type="radio" class="radio_1" checked="checked" value="1" <?php if($vehicle=="1"){echo 'checked';}?> name="vehicles" id="v1" />
												<label for="v1">1</label>
												<input type="radio" class="radio_1" name="vehicles" value="2" <?php if($vehicle=="2"){echo 'checked';}?> id="v2" />
												<label for="v2">2</label>
												<input type="radio" class="radio_1" name="vehicles" value="3"  <?php if($vehicle=="3"){echo 'checked';}?> id="v3" />
												<label for="v3">3 or More</label>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label class="lb">Habbits:</label>
													<select name="drink1" class="form-control form-select chosen-select" data-placeholder="Select Habbits">
														<option selected value="NULL">Drinking Habbits</option>
														<option value="NO" <?php if($drink=="No"){echo 'selected';}?>>NO</option>
														<option value="Occasionaly" <?php if($drink=="Occasionaly"){echo 'selected';}?>>Occasionaly</option>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label class="lb"></label>
													<select name="smoke1" class="form-control form-select chosen-select" data-placeholder="Select Habbits">
														<option selected value="NULL">Smoking Habbits</option>
														<option value="NO" <?php if($smoke=="No"){echo 'selected';}?>>NO</option>
														<option value="Occasionaly" <?php if($smoke=="Occasionaly"){echo 'selected';}?>>Occasionaly</option>
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
												<select name="qualific" class="form-control form-select chosen-select" data-placeholder="Select Qualification">
													<option selected disabled value="">Select Qualification:</option>
													<option value="B.A" <?php if($qualification=="B.B.A"){echo 'selected';}?>>B.A</option>
													<option value="B.Arch" <?php if($qualification=="B.Arch"){echo 'selected';}?>>B.Arch</option>
													<option value="B.B.A" <?php if($qualification=="B.B.A"){echo 'selected';}?>>B.B.A</option>
													<option value="B.C.A" <?php if($qualification=="B.C.A"){echo 'selected';}?>>B.C.A</option>
													<option value="B.Com" <?php if($qualification=="B.Com"){echo 'selected';}?>>B.Com</option>
													<option value="B.Des" <?php if($qualification=="B.Des"){echo 'selected';}?>>B.Des</option>
													<option value="B.Ed." <?php if($qualification=="B.Ed."){echo 'selected';}?>>B.Ed.</option>
													<option value="B.H.M." <?php if($qualification=="B.H.M."){echo 'selected';}?>>B.H.M.</option>
													<option value="B.Lib" <?php if($qualification=="B.Lib"){echo 'selected';}?>>B.Lib</option>
													<option value="B.P.Ed" <?php if($qualification=="B.P.Ed"){echo 'selected';}?>>B.P.Ed</option>
													<option value="B.Pharm" <?php if($qualification=="B.Pharm"){echo 'selected';}?>>B.Pharm</option>
													<option value="B.Sc" <?php if($qualification=="B.Sc"){echo 'selected';}?>>B.Sc</option>
													<option value="B.Tech" <?php if($qualification=="B.Tech"){echo 'selected';}?>>B.Tech</option>
													<option value="B.Voc" <?php if($qualification=="B.Voc"){echo 'selected';}?>>B.Voc</option>
													<option value="D.Ed" <?php if($qualification=="D.Ed"){echo 'selected';}?>>D.Ed</option>
													<option value="D.Pharma" <?php if($qualification=="D.Pharma"){echo 'selected';}?>>D.Pharma</option>
													<option value="L.L.B." <?php if($qualification=="L.L.B."){echo 'selected';}?>>L.L.B.</option>
													<option value="M.A" <?php if($qualification=="M.A"){echo 'selected';}?>>M.A</option>
													<option value="M.Arch" <?php if($qualification=="M.Arch"){echo 'selected';}?>>M.Arch</option>
													<option value="M.B.A" <?php if($qualification=="M.B.A"){echo 'selected';}?>>M.B.A</option>
													<option value="M.B.B.S." <?php if($qualification=="M.B.B.S."){echo 'selected';}?>>M.B.B.S.</option>
													<option value="M.C.A" <?php if($qualification=="M.C.A"){echo 'selected';}?>>M.C.A</option>
													<option value="M.Com" <?php if($qualification=="M.Com"){echo 'selected';}?>>M.Com</option>
													<option value="M.Des" <?php if($qualification=="M.Des"){echo 'selected';}?>>M.Des</option>
													<option value="M.Ed." <?php if($qualification=="M.Ed."){echo 'selected';}?>>M.Ed.</option>
													<option value="M.Lib" <?php if($qualification=="M.Lib"){echo 'selected';}?>>M.Lib</option>
													<option value="M.P.Ed" <?php if($qualification=="M.P.Ed"){echo 'selected';}?>>M.P.Ed</option>
													<option value="M.Pharm" <?php if($qualification=="M.Pharm"){echo 'selected';}?>>M.Pharm</option>
													<option value="M.Sc" <?php if($qualification=="M.Sc"){echo 'selected';}?>>M.Sc</option>
													<option value="M.Tech" <?php if($qualification=="M.Tech"){echo 'selected';}?>>M.Tech</option>
													<option value="M.Voc" <?php if($qualification=="M.Voc"){echo 'selected';}?>>M.Voc</option>
													<option value="Ph.D." <?php if($qualification=="Ph.D."){echo 'selected';}?>>Ph.D.</option>
													<option value="Other" <?php if($qualification=="Other"){echo 'selected';}?>>Other</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Your Occupation:</label>
												<select name="occupation" class="form-control form-select chosen-select" data-placeholder="Select Occupation">
													<option selected disabled value="">Select Occupation</option>
													<option value="Accountant" <?php if($occupation=="Accountant"){echo 'selected';}?>>Accountant</option>
													<option value="Architect" <?php if($occupation=="Architect"){echo 'selected';}?>>Architect</option>
													<option value="Artist" <?php if($occupation=="Artist"){echo 'selected';}?>>Artist</option>
													<option value="Banker" <?php if($occupation=="Banker"){echo 'selected';}?>>Banker</option>
													<option value="Businessman" <?php if($occupation=="Businessman"){echo 'selected';}?>>Businessman</option>
													<option value="Chef" <?php if($occupation=="Chef"){echo 'selected';}?>>Chef</option>
													<option value="Consultant" <?php if($occupation=="Consultant"){echo 'selected';}?>>Consultant</option>
													<option value="Dentist" <?php if($occupation=="Dentist"){echo 'selected';}?>>Dentist</option>
													<option value="Doctor" <?php if($occupation=="Doctor"){echo 'selected';}?>>Doctor</option>
													<option value="Engineer" <?php if($occupation=="Engineer"){echo 'selected';}?>>Engineer</option>
													<option value="Farmer" <?php if($occupation=="Farmer"){echo 'selected';}?>>Farmer</option>
													<option value="Fashion Designer" <?php if($occupation=="Fashion Designer"){echo 'selected';}?>>Fashion Designer</option>
													<option value="Graphic Designer" <?php if($occupation=="Graphic Designer"){echo 'selected';}?>>Graphic Designer</option>
													<option value="Journalist" <?php if($occupation=="Journalist"){echo 'selected';}?>>Journalist</option>
													<option value="Lawyer" <?php if($occupation=="Lawyer"){echo 'selected';}?>>Lawyer</option>
													<option value="Librarian" <?php if($occupation=="Librarian"){echo 'selected';}?>>Librarian</option>
													<option value="Manager" <?php if($occupation=="Manager"){echo 'selected';}?>>Manager</option>
													<option value="Mechanic" <?php if($occupation=="Mechanic"){echo 'selected';}?>>Mechanic</option>
													<option value="Nurse" <?php if($occupation=="Nurse"){echo 'selected';}?>>Nurse</option>
													<option value="Pharmacist" <?php if($occupation=="Pharmacist"){echo 'selected';}?>>Pharmacist</option>
													<option value="Pilot" <?php if($occupation=="Pilot"){echo 'selected';}?>>Pilot</option>
													<option value="Police Officer" <?php if($occupation=="Police Officer"){echo 'selected';}?>>Police Officer</option>
													<option value="Professor" <?php if($occupation=="Professor"){echo 'selected';}?>>Professor</option>
													<option value="Psychologist" <?php if($occupation=="Psychologist"){echo 'selected';}?>>Psychologist</option>
													<option value="Scientist" <?php if($occupation=="Scientist"){echo 'selected';}?>>Scientist</option>
													<option value="Software Developer" <?php if($occupation=="Software Developer"){echo 'selected';}?>>Software Developer</option>
													<option value="Social Worker" <?php if($occupation=="Social Worker"){echo 'selected';}?>>Social Worker</option>
													<option value="Soldier" <?php if($occupation=="Soldier"){echo 'selected';}?>>Soldier</option>
													<option value="Teacher" <?php if($occupation=="Teacher"){echo 'selected';}?>>Teacher</option>
													<option value="Writer" <?php if($occupation=="Writer"){echo 'selected';}?>>Writer</option>
													<option value="Other" <?php if($occupation=="Other"){echo 'selected';}?>>Other</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Your Designation:</label>
												<select name="designation" class="form-control form-select chosen-select" data-placeholder="Select Designation">
													<option selected disabled value="">Select Designation</option>
													<option value="Admin" <?php if($designation=="Admin"){echo 'selected';}?>>Admin</option>
													<option value="Accountant" <?php if($designation=="Accountant"){echo 'selected';}?>>Accountant</option>
													<option value="Assistant Manager" <?php if($designation=="Assistant Manager"){echo 'selected';}?>>Assistant Manager</option>
													<option value="Branch Manager" <?php if($designation=="Branch Manager"){echo 'selected';}?>>Branch Manager</option>
													<option value="Chief Executive Officer" <?php if($designation=="Chief Executive Officer"){echo 'selected';}?>>Chief Executive Officer</option>
													<option value="Chief Financial Officer" <?php if($designation=="Chief Financial Officer"){echo 'selected';}?>>Chief Financial Officer</option>
													<option value="Chief Operating Officer" <?php if($designation=="Chief Operating Officer"){echo 'selected';}?>>Chief Operating Officer</option>
													<option value="Clerk" <?php if($designation=="Clerk"){echo 'selected';}?>>Clerk</option>
													<option value="Consultant" <?php if($designation=="Consultant"){echo 'selected';}?>>Consultant</option>
													<option value="Creative Director" <?php if($designation=="Creative Director"){echo 'selected';}?>>Creative Director</option>
													<option value="Customer Support Executive" <?php if($designation=="Customer Support Executive"){echo 'selected';}?>>Customer Support Executive</option>
													<option value="Data Analyst" <?php if($designation=="Data Analyst"){echo 'selected';}?>>Data Analyst</option>
													<option value="Data Entry Operator" <?php if($designation=="Data Entry Operator"){echo 'selected';}?>>Data Entry Operator</option>
													<option value="Department Head" <?php if($designation=="Department Head"){echo 'selected';}?>>Department Head</option>
													<option value="Director" <?php if($designation=="Director"){echo 'selected';}?>>Director</option>
													<option value="Executive Assistant" <?php if($designation=="Executive Assistant"){echo 'selected';}?>>Executive Assistant</option>
													<option value="Finance Manager" <?php if($designation=="Finance Manager"){echo 'selected';}?>>Finance Manager</option>
													<option value="Financer" <?php if($designation=="Financer"){echo 'selected';}?>>Financer</option>
													<option value="General Manager" <?php if($designation=="General Manager"){echo 'selected';}?>>General Manager</option>
													<option value="Graphic Designer" <?php if($designation=="Graphic Designer"){echo 'selected';}?>>Graphic Designer</option>
													<option value="HR" <?php if($designation=="HR"){echo 'selected';}?>>HR</option>
													<option value="HR Manager" <?php if($designation=="HR Manager"){echo 'selected';}?>>HR Manager</option>
													<option value="IT Manager" <?php if($designation=="IT Manager"){echo 'selected';}?>>IT Manager</option>
													<option value="Legal Advisor" <?php if($designation=="Legal Advisor"){echo 'selected';}?>>Legal Advisor</option>
													<option value="Marketing Manager" <?php if($designation=="Marketing Manager"){echo 'selected';}?>>Marketing Manager</option>
													<option value="Operations Manager" <?php if($designation=="Operations Manager"){echo 'selected';}?>>Operations Manager</option>
													<option value="Product Manager" <?php if($designation=="Product Manager"){echo 'selected';}?>>Product Manager</option>
													<option value="Project Manager" <?php if($designation=="Project Manager"){echo 'selected';}?>>Project Manager</option>
													<option value="Public Relations Officer" <?php if($designation=="Public Relations Officer"){echo 'selected';}?>>Public Relations Officer</option>
													<option value="Regional Manager" <?php if($designation=="Regional Manager"){echo 'selected';}?>>Regional Manager</option>
													<option value="Sales Executive" <?php if($designation=="Sales Executive"){echo 'selected';}?>>Sales Executive</option>
													<option value="Senior Analyst" <?php if($designation=="Senior Analyst"){echo 'selected';}?>>Senior Analyst</option>
													<option value="Software Developer" <?php if($designation=="Software Developer"){echo 'selected';}?>>Software Developer</option>
													<option value="Supervisor" <?php if($designation=="Supervisor"){echo 'selected';}?>>Supervisor</option>
													<option value="Team Leader" <?php if($designation=="Team Leader"){echo 'selected';}?>>Team Leader</option>
													<option value="Vice President" <?php if($designation=="Vice President"){echo 'selected';}?>>Vice President</option>
													<option value="Other" <?php if($designation=="Other"){echo 'selected';}?>>Other</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Company Name:</label>
												<input type="text" class="form-control" placeholder="Enter Company Name" name="company" value="<?php echo $company;?>"/>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="lb">Work With:</label>
												<select name="work" class="form-control form-select chosen-select" data-placeholder="Select your Work" re>
													<option selected disabled value="">Select your Work</option>
													<option value="Government" <?php if($work_with=="Government"){echo 'selected';}?>>Government</option>
													<option value="Private" <?php if($work_with=="Private"){echo 'selected';}?>>Private</option>
													<option value="Self Employee" <?php if($work_with=="Self Employee"){echo 'selected';}?>>Self Employee</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label class="lb">Your Income Per Annum :</label>
												<input type="number" class="form-control" id="income" name="income" placeholder="* (Income Per Annum)" min="10000" value="<?php echo $income;?>"/>
												<span id="incomeError" style="color: red; display: none;"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="lb">Something About You:</label>
											<textarea name="aboutyou" placeholder="example : about you in 100 Words..." class="textarea1 form-control"><?php echo $description;?></textarea>
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

    <!-- FOOTER -->
    <?php
		include_once 'footer.php';
	?>
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

	<script src="js/validation/jquery.validate.min.js"></script>
    <script src="js/validation/additional-methods.min.js"></script>

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
			  },
			  Lname: {
				required: true,
				minlength: 3,
				maxlength: 15
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
			/*  State_ID: {
				required: true,
			  },
			  subcommunity_id: {
				required: true,
			  },
			  Community_ID: {
				required: true,
			  },*/
			  aadhar: {
				maxlength: 12,
				minlength: 12
			  },
			  contact: {
				maxlength: 10,
				minlength: 10
			  },
			  /*cityname: {
				required: true,
			  }*/
			},
			messages: {
			  Fname: {
				required: "<p style='color:red; font-size:14px;'>Your data must be at least 3 characters</p>",
				minlength: "<p style='color:red;'>Your data must be at least 3 characters</p>",
				maxlength: "<p style='color:red;'>Your data is too long</p>",
			  },
			  Lname: {
				required: "<p style='color:red; font-size:14px;'>Your data must be at least 3 characters</p>",
				minlength: "<p style='color:red;'>Your data must be at least 3 characters</p>",
				maxlength: "<p style='color:red;'>Your data is too long</p>"
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
</body>

<!-- Dream Class By user-profile-edit.html  [XR&CO'2014], Fri, 14 Feb 2025 06:49:34 GMT -->
</html>
