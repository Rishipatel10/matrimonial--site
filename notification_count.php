<?php
include_once 'connection.php';

$member_id = $_SESSION['member_id'];
$count_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM notification_tbl WHERE member_id = '$member_id' AND is_read = 0");
$count_row = mysqli_fetch_assoc($count_result);
echo $count_row['total'];
?>
