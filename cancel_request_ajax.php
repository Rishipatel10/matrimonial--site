<?php
include_once "connection.php";

if (!isset($_SESSION['member_id'])) {
    echo "Session expired. Please log in again.";
    exit;
}

$sender_id = $_SESSION['member_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recipient_id'])) {
    $recipient_id = intval($_POST['recipient_id']);

    // Get the latest request entry by sender
    $sql = "SELECT * FROM send_request_tbl WHERE member_id='$sender_id' ORDER BY request_date DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $request_id = $row['request_id'];
        $send_request_id = json_decode($row['send_request_id'], true);

        if (isset($send_request_id[$recipient_id])) {
            unset($send_request_id[$recipient_id]);

            if (empty($send_request_id)) {
                // If all requests are cancelled, delete the row
                mysqli_query($conn, "DELETE FROM send_request_tbl WHERE request_id='$request_id'");
            } else {
                $updated_json = json_encode($send_request_id);
                mysqli_query($conn, "UPDATE send_request_tbl SET send_request_id='$updated_json' WHERE request_id='$request_id'");
            }

            // Remove corresponding notification (optional)
            mysqli_query($conn, "DELETE FROM notification_tbl WHERE member_id='$recipient_id' AND message LIKE '%Member #$sender_id%'");

            echo "Request cancelled successfully.";
        } else {
            echo "Recipient not found in request list.";
        }
    } else {
        echo "Request not found.";
    }
} else {
    echo "Invalid request.";
}
?>
