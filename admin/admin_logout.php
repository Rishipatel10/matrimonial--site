<?php
	include_once 'connection.php';
    
	if(!isset($_SESSION["name"]))
	{
		header('location:index.php');
	}
	session_destroy();
	header('location:index.php');
?>