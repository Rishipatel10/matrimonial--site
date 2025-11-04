<?php
include '../connection.php';
//$connect=mysqli_connect("localhost","root","","dreamwedding_db") or die("database not found");

date_default_timezone_set('Asia/Kolkata');
function fetch_user_last_activity($user_id, $conn)
{
	$query = "
	SELECT * FROM login_details 
	WHERE user_id = '$user_id' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";
	
	$statement=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($statement))
	{	
		return $row['last_activity'];
	}
	
}

function fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE (from_user_id = '".$from_user_id."' 
	AND to_user_id = '".$to_user_id."') 
	OR (from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."') 
	ORDER BY timestamp 
	";
	$statement=mysqli_query($conn,$query);
	$output = '<ul class="list-unstyled">';
	while($row=mysqli_fetch_array($statement))
	{
		$user_name = '';
		if($row["from_user_id"] == $from_user_id)
		{
			$user_name = '<b class="text-success">You</b>';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
		}
		$output .= '
		<li style="border-bottom:1px dotted #ccc">
			<p>'.$user_name.' - '.$row["chat_message"].'
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	$query = "
	UPDATE chat_message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$statement = $conn->prepare($query);
	$statement->execute();
	return $output;
}

function get_user_name($user_id, $conn)
{
	$query = "SELECT * FROM member_tbl WHERE member_id = '$user_id'";
	$statement=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($statement))
	{	
		return $row['member_firstname'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $conn)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	AND status = '1'
	";
	$statement=mysqli_query($conn,$query);
	$count = mysqli_num_rows($statement);
	$output = '';
	if($count > 0)
	{
		//$output = '<span class="label label-success">'.$count.'</span>';
		$output = '<span style="
			background-color: #633f07;
			color: white;
			border-radius: 50%;
			padding: 4px;
			font-size: 12px;
			min-width: 24px;
			height: 24px;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			font-weight: bold;
		">' . $count . '</span>';


	}
	return $output;
}

function fetch_is_type_status($user_id, $conn)
{
	$query = "
	SELECT is_type FROM login_details 
	WHERE user_id = '".$user_id."' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";	
	$statement=mysqli_query($conn,$query);
	$output = '';
	while($row=mysqli_fetch_array($statement))
	{	
		if($row["is_type"] == 'yes')
		{
			$output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
		}
	}
	
	return $output;
}

function fetch_group_chat_history($conn)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE to_user_id = '0'  
	ORDER BY timestamp DESC
	";

	$statement=mysqli_query($conn,$query);
	
	$output = '<ul class="list-unstyled">';
	while($row=mysqli_fetch_array($statement))
	{
		$user_name = '';
		if($row["from_user_id"] == $_SESSION["member_id"])
		{
			$user_name = '<b class="text-success">You</b>';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
		}

		$output .= '

		<li style="border-bottom:1px dotted #ccc">
			<p>'.$user_name.' - '.$row['chat_message'].' 
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	return $output;
}


?>