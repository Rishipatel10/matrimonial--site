<?php
   include 'connection.php';
   if(isset($_GET['member_id']))
   {
       $del="delete from member_tbl where member_id='".$_GET['member_id']."'";
	   $del=mysqli_query($conn,$del);
	   /* if(isset($del))
	   {
		   echo "Deleted";
	   } */
	   header('location:logout.php');
   }
?>