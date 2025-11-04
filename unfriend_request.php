<?php
include("connection.php"); // Adjust to your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logged_id = $_POST["sender_id"];    // Logged-in user
    $friend_id = $_POST["recipient_id"]; // Friend to unfriend

    if (!empty($logged_id) && !empty($friend_id)) {
        // ✅ Fetch logged-in user's friend list
        $query = "SELECT send_request_id FROM send_request_tbl WHERE member_id = '$logged_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $friend_list = $row ? json_decode($row["send_request_id"], true) : array(); // FIX ✅

        // 📌 Remove friend from logged-in user's list
        if (isset($friend_list[$friend_id])) {
            unset($friend_list[$friend_id]);
            if (empty($friend_list)) {
                mysqli_query($conn, "DELETE FROM send_request_tbl WHERE member_id = '$logged_id'");
            } else {
                $updated_json = json_encode($friend_list);
                mysqli_query($conn, "UPDATE send_request_tbl SET send_request_id = '$updated_json' WHERE member_id = '$logged_id'");
            }
        }

        // ✅ Fetch friend's friend list
        $query = "SELECT send_request_id FROM send_request_tbl WHERE member_id = '$friend_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $friend_list = $row ? json_decode($row["send_request_id"], true) : array(); // FIX ✅

        // 📌 Remove logged-in user from the friend's list
        if (isset($friend_list[$logged_id])) {
            unset($friend_list[$logged_id]);
            if (empty($friend_list)) {
                mysqli_query($conn, "DELETE FROM send_request_tbl WHERE member_id = '$friend_id'");
            } else {
                $updated_json = json_encode($friend_list);
                mysqli_query($conn, "UPDATE send_request_tbl SET send_request_id = '$updated_json' WHERE member_id = '$friend_id'");
            }
        }

        echo "Successfully unfriended.";
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid access.";
}

mysqli_close($conn);
?>
