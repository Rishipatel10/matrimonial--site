<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from city_tbl where city_id='".$_GET['city_id']."'";
	mysqli_query($conn,$del);
	$_SESSION['del_city']="commuCitynity deleted";
    echo " <script>window.location.href = 'city_list.php';</script>";
//	header('location:city_list.php');
?>