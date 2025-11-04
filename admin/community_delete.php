<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from community_tbl where community_id='".$_GET['community_id']."'";
	mysqli_query($conn,$del);
	$_SESSION['del_comm']="community deleted";
    echo " <script>window.location.href = 'community_list.php';</script>";
	//header('location:community_list.php');
?>