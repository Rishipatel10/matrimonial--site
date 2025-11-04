<?php

//insert_chat.php

include('database_connection.php');

/* $data = array(
	':to_user_id'		=>	$_POST['to_user_id'],
	':from_user_id'		=>	$_SESSION['user_id'],
	':chat_message'		=>	$_POST['chat_message'],
	':status'			=>	'1'
); */

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES ('".$_POST['to_user_id']."','".$_SESSION['member_id']."','".$_POST['chat_message']."','1');
";

$statement=mysqli_query($conn,$query);

if($statement)
{
	echo fetch_user_chat_history($_SESSION['member_id'], $_POST['to_user_id'], $conn);
}

?>