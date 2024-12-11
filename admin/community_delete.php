<?php
	include_once 'connection.php';
	$del="delete from community_tbl where community_id='".$_GET['community_id']."'";
	mysqli_query($conn,$del);
	header('location:community_list.php');
?>