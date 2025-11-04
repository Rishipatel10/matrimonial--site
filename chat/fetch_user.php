<?php

//fetch_user.php

include('database_connection.php');

$query = " SELECT * FROM member_tbl 
WHERE member_gender != '".$_SESSION['member_gender']."' and member_id != '".$_SESSION['member_id']."' 
";

$statement=mysqli_query($conn,$query);

//$statement->execute();

//$result = $statement->fetchAll();

$output = '<div style="border-bottom:3px solid #d2d2d2;font-family:system-ui;text-align:center;background-color:#c32143b8;padding:8px;color:#ffffff;text-transform: uppercase;border-radius:5px 5px 0px 0px;font-weight:500">Lets Chat</div>
<table style="width:100%;">';
 
while($row=mysqli_fetch_array($statement))
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['member_id'], $conn);
	//echo $user_last_activity;
	//2021-06-23 12:03:12
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="label label-success text-success">Online</span>';
	}
	else
	{
		$status = '<span class="label label-danger text-danger">Offline</span>';
	}
	if($row['member_image']==NULL){
		$img_member = "profile.png";
	}
	else{
		$img_member = $row['member_image'];
	}
	$output .= '
	<tr>
        <td style="text-align:left;"><img src="member_profiles/'.$img_member.'" style="height:55px;width:55px;border-radius:100%;padding:2px;margin:5px 0px;border:1px solid #ffffff;"></td>
		<td style="color:black;text-align:left;">'.$row['member_firstname'].' '.$row['member_lastname'].' '.count_unseen_message($row['member_id'], $_SESSION['member_id'], $conn).' '.fetch_is_type_status($row['member_id'], $conn).'</td>
		<td style="text-align:center;">'.$status.'</td>
		<td style="text-align:right;"><button type="button" class="btn btn-info start_chat" data-touserid="'.$row['member_id'].'" data-tousername="'.$row['member_firstname'].'" style="padding:1px 5px;font-size:75%">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>