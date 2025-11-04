<?php
include_once 'connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = intval($_POST['request_id']);
    $logged_member_id = intval($_POST['logged_member_id']);
    $accepted_member_id = intval($_POST['accepted_member_id']);

    // Fetch the current JSON data and sender from `send_request_tbl`
    $query = "SELECT send_request_id, member_id FROM send_request_tbl WHERE request_id = $request_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $send_request_data = json_decode($row['send_request_id'], true); // Decode JSON
        $sender_member_id = $row['member_id']; // The one who sent the original request

        // Check if accepted_member_id exists in JSON and is "pending"
        if (isset($send_request_data[$accepted_member_id]) && $send_request_data[$accepted_member_id] === "pending") {
            // Update the request status to "accepted"
            $send_request_data[$accepted_member_id] = "accepted";

            // Convert back to JSON
            $updated_json = mysqli_real_escape_string($conn, json_encode($send_request_data));

            // Update the database
            $update_query = "UPDATE send_request_tbl SET send_request_id = '$updated_json' WHERE request_id = $request_id";

            if (mysqli_query($conn, $update_query)) {
                // ✅ Send notification to original sender
                $message = "Your connection request was accepted by Member #$accepted_member_id";

                $notify_query = "INSERT INTO notification_tbl (member_id, message, notification_type)
                                 VALUES ('$sender_member_id', '$message', 'request_accepted')";
                mysqli_query($conn, $notify_query);

                echo "success";
            } else {
                echo "error: " . mysqli_error($conn);
            }
        } else {
            echo "invalid_request";
        }
    } else {
        echo "not_found";
    }
}

mysqli_close($conn);
?>
