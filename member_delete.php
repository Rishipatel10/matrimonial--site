<?php
   include_once 'connection.php';
   if(isset($_GET['member_id']))
   {
       $del="delete from member_tbl where member_id=$_GET['member_id']";
	   mysqli_query($conn,$str);
   }
?> 