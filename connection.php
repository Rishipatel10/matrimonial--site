<?php
    session_start();
	$conn=mysqli_connect("127.0.0.1","root","","vivahmilan") or die("Database Not Connected");
	$WEB_TITLE="Vivahmilan";
	date_default_timezone_set('Asia/Kolkata'); // Set timezone
	
/* 	// Get members whose package is expiring exactly 7 days from today
	$query = "SELECT * FROM package_detail_tbl 
	         WHERE package_exp_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY AND package_detail_status = 1";
	//echo $query;
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$member_id = $row['member_id'];
		$expire_date = $row['package_exp_date'];
		$message = "Reminder: Your package will expire on $expire_date. Please renew it in time.";

		// Check if notification already sent for this expiry date
		$check = "SELECT * FROM notification_tbl 
				  WHERE member_id = '$member_id' 
				  AND notification_type = 'package_expiry_reminder' 
				  AND message LIKE '%$expire_date%'";
		$check_result = mysqli_query($conn, $check);

		if (mysqli_num_rows($check_result) == 0) {
			// Insert notification
			$insert = "INSERT INTO notification_tbl (member_id, message, notification_type, created_at, is_read)
					   VALUES ('$member_id', '$message', 'package_expiry_reminder', NOW(), 0)";
			mysqli_query($conn, $insert);
		}
	} */
?>