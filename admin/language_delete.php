<?php
	include_once 'connection.php';
	if(!isset($_SESSION["Email"]))
	{
		header('location:index.php');
	}
	$del="delete from language_tbl where language_id='".$_GET['language_id']."'";
	mysqli_query($conn,$del);
	header('location:language_list.php');
?>