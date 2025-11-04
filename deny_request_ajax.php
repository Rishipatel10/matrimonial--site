<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = intval($_POST['sender_id']);       // The one who sent the request
    $recipient_id = intval($_POST['recipient_id']); // The logged-in user
    $request_id = intval($_POST['request_id']);

    // Fetch existing request JSON
    $query = "SELECT send_request_id FROM send_request_tbl WHERE request_id = $request_id AND member_id = $sender_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $json_data = json_decode($row['send_request_id'], true);

        // Remove recipient ID from JSON
        if (isset($json_data[$recipient_id])) {
            unset($json_data[$recipient_id]);

            if (empty($json_data)) {
                // ❌ No more recipients left — delete the entire row
                $delete_sql = "DELETE FROM send_request_tbl WHERE request_id = $request_id";
                if (mysqli_query($conn, $delete_sql)) {
                    echo "Request denied and request entry deleted.";
                } else {
                    echo "Failed to delete request.";
                }
            } else {
                // ✅ Update the JSON without the denied recipient
                $new_json = json_encode($json_data);
                $update_sql = "UPDATE send_request_tbl SET send_request_id = '$new_json' WHERE request_id = $request_id";
                if (mysqli_query($conn, $update_sql)) {
                    echo "Request denied successfully.";
                } else {
                    echo "Failed to update request.";
                }
            }
        } else {
            echo "Recipient not found in request.";
        }
    } else {
        echo "Request not found.";
    }
}
?>
