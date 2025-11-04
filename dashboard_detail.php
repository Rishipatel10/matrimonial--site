<?php 
	include_once 'connection.php';
	$currentPage = basename($_SERVER['PHP_SELF']);
	$memberid=$_SESSION['member_id'];
	$str="SELECT *
        FROM member_tbl
        JOIN member_detail_tbl 
            ON member_tbl.member_id = member_detail_tbl.member_id
        JOIN sub_community_tbl 
            ON member_detail_tbl.member_sub_community_id = sub_community_tbl.sub_community_id
        JOIN community_tbl 
            ON sub_community_tbl.community_id = community_tbl.community_id
        JOIN city_tbl 
            ON member_tbl.member_city = city_tbl.city_id
        JOIN state_tbl 
            ON city_tbl.state_id = state_tbl.state_id
        JOIN lifestyle_tbl 
            ON member_detail_tbl.member_detail_id = lifestyle_tbl.member_detail_id
        LEFT JOIN package_detail_tbl 
            ON member_detail_tbl.member_id = package_detail_tbl.member_id
        LEFT JOIN package_tbl 
            ON package_detail_tbl.package_id = package_tbl.package_id
        JOIN member_qualification_tbl 
            ON member_detail_tbl.member_detail_id = member_qualification_tbl.member_detail_id
        WHERE member_tbl.member_id = $memberid and member_tbl.member_status = '1'";
	//echo $str;
	$data=mysqli_query($conn,$str);
    $row=mysqli_fetch_array($data);
?>
<ul>
    <li><a href="user_dashboard.php?member_id=<?php echo $row['member_id']; ?>&religion=<?php echo $row['member_religion']; ?>&gen=<?php echo $row['member_gender']; ?>&city=<?php echo $row['member_city']; ?>" class="<?php echo ($currentPage == 'user_dashboard.php') ? 'act' : ''; ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
    
   <!-- <li><a href="user_profile.php" class="<?php echo ($currentPage == 'user_profile.php') ? 'act' : ''; ?>"><i class="fa fa-male" aria-hidden="true"></i>Profile</a></li>-->
    
    <li><a href="user_interests.php" class="<?php echo ($currentPage == 'user_interests.php') ? 'act' : ''; ?>"><i class="fa fa-handshake-o" aria-hidden="true"></i>Interests</a></li>
    
    <!--<li><a href="user_chat.php" class="<?php echo ($currentPage == 'user_chat.php') ? 'act' : ''; ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>Chat list</a></li>-->
    
    <li><a href="user_plan.php" class="<?php echo ($currentPage == 'user_plan.php') ? 'act' : ''; ?>"><i class="fa fa-money" aria-hidden="true"></i>Plan</a></li>
    
    <!--<li><a href="user_setting.php" class="<?php echo ($currentPage == 'user_setting.php') ? 'act' : ''; ?>"><i class="fa fa-cog" aria-hidden="true"></i>Setting</a></li>-->
	<li><a href="user_biodata.php" class="<?php echo ($currentPage == 'user_biodata.php') ? 'act' : ''; ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i>Biodata</a></li>
    
    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
</ul>
