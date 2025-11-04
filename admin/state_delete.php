<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from state_tbl where state_id='".$_GET['state_id']."'";
	mysqli_query($conn,$del);
	$_SESSION['del_state']="community deleted";
    echo " <script>window.location.href = 'state_list.php';</script>";
	//header('location:state_list.php');
?>