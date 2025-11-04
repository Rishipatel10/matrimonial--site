<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from package_tbl where package_id='".$_GET['package_id']."'";
	mysqli_query($conn,$del);
	header('location:package_list.php');
?>