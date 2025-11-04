<?php
   	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from sub_community_tbl where sub_community_id='".$_GET['sub_community_id']."'";
	mysqli_query($conn,$del);
	$_SESSION['sub_del_comm']="community deleted";
    echo " <script>window.location.href = 'subcommunity_list.php';</script>";
	
?>