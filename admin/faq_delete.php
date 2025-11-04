<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from faq_tbl where faq_id='".$_GET['faq_id']."'";
	mysqli_query($conn,$del);
	header('location:faq_list.php');
?>