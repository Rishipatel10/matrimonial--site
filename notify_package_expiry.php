<?php
include_once 'connection.php';

// STEP 1: Get all active package details expiring within next 7 days
$query = "SELECT * FROM package_detail_tbl 
          WHERE package_exp_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY 
          AND package_detail_status = 1";

$result = mysqli_query($conn, $query);

// STEP 2: Loop through all members whose packages are expiring soon
while ($row = mysqli_fetch_assoc($result)) {
    $member_id = $row['member_id'];
    $expire_date = $row['package_exp_date'];

    // STEP 3: Get Member Name & Image
    $memQuery = mysqli_query($conn, "SELECT member_firstname, member_lastname, member_image FROM member_tbl WHERE member_id = '$member_id'");
    $mem = mysqli_fetch_assoc($memQuery);

    $member_name = $mem ? $mem['member_firstname'] . ' ' . $mem['member_lastname'] : "Member #$member_id";
    $member_img = (!empty($mem['member_image'])) ? "member_profiles/" . $mem['member_image'] : "member_profiles/default-profile.png";

    // STEP 4: Create Notification Message
    $message = "Reminder: Dear <strong>$member_name</strong>, your package will expire on <strong>$expire_date</strong>. Please renew it in time.";

    // STEP 5: Check if Notification Already Exists (to avoid duplicates)
    $check = "SELECT * FROM notification_tbl 
              WHERE member_id = '$member_id' 
              AND notification_type = 'package_expiry_reminder' 
              AND message LIKE '%$expire_date%'";

    $check_result = mysqli_query($conn, $check);

    // STEP 6: If no duplicate, insert notification
    if (mysqli_num_rows($check_result) == 0) {
        $insert = "INSERT INTO notification_tbl (member_id, message, notification_type, created_at, is_read)
                   VALUES ('$member_id', '$message', 'package_expiry_reminder', NOW(), 0)";
        mysqli_query($conn, $insert);
    }
}
?>
