<?php
include_once 'connection.php';

// Check if the session is active
if (!isset($_SESSION['member_id'])) {
    echo "<script>alert('Session expired. Please log in again.'); window.location='login.php';</script>";
    exit;
}

// Get the sender's member ID from the session
$sender_member_id = intval($_SESSION['member_id']);

// Check if recipient member IDs are provided
if (isset($_GET['member_id']) && !empty($_GET['member_id'])) {
    $recipient_member_ids = $_GET['member_id'];
    
    if (!is_array($recipient_member_ids)) {
        $recipient_member_ids = array($recipient_member_ids); // Convert to array if it's not
    }

    // Validate and sanitize recipient member IDs
    $recipient_member_ids = array_map('intval', $recipient_member_ids);
    $recipient_member_ids = array_filter($recipient_member_ids); // Remove invalid IDs

    if (empty($recipient_member_ids)) {
        echo "<script>alert('Invalid recipient member IDs. Please try again.'); window.location='plans.php';</script>";
        exit;
    }

    // Create a JSON string for send_request_id
    $send_request_data = array();
    foreach ($recipient_member_ids as $recipient_id) {
        $send_request_data[$recipient_id] = "pending";
    }
    $send_request_id = json_encode($send_request_data);

    // Get the current date and time
    $req_datetime = date("Y-m-d H:i:s");

    // Insert request into send_request_tbl
    $query = "INSERT INTO send_request_tbl (member_id, send_request_id, request_date) 
              VALUES ('$sender_member_id', '$send_request_id', '$req_datetime')";

    if (mysqli_query($conn, $query)) {
        // Insert notifications for each recipient
        foreach ($recipient_member_ids as $recipient_id) {
            $message = "You have received a new connection request from Member #$sender_member_id";
            $notification_type = "request_sent";
            $is_read = 0;

            $insert_notification = "INSERT INTO notification_tbl (member_id, message, notification_type, created_at, is_read)
                                    VALUES ('$recipient_id', '$message', '$notification_type', '$req_datetime', '$is_read')";
            mysqli_query($conn, $insert_notification);
        }

        // Redirect based on plan
        if (isset($_SESSION['cnt_member']) && $_SESSION['cnt_member'] != 0) { 
            echo "<script>window.location='user_interests.php';</script>";
        } else {
            echo "<script>window.location='plans.php';</script>";
        }
    } else {
        echo "<script>alert('Something went wrong, please try again.');</script>";
    }

} else {
    echo "<script>alert('No recipient selected.'); window.location='plans.php';</script>";
    exit;
}
?>
