<?php
include_once "connection.php";

$member_id = $_SESSION['member_id'];

// Mark all unread notifications as read
$query = "UPDATE notification_tbl SET is_read = 1 WHERE member_id = '$member_id' AND is_read = 0";
mysqli_query($conn, $query);

echo "success";
?>
