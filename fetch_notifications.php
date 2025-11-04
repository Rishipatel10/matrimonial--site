<style>
.notification-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
    background-color: #fff;
    transition: background-color 0.3s ease;
}

.notification-item:hover {
    background-color: #f9f9f9;
}

.notification-item img.notif-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ccc;
    box-shadow: 0 0 3px rgba(0,0,0,0.1);
}

.notification-item .notif-text {
    flex: 1;
    font-size: 14px;
    line-height: 1.5;
    color: #333;
}

.notification-item .notif-text strong {
    color: #000;
}

.notification-item .notif-time {
    font-size: 12px;
    color: #888;
    margin-top: 3px;
}

.view-all-link {
    text-align: center;
    padding: 10px;
    background-color: #f7f7f7;
    border-top: 1px solid #ddd;
}

.view-all-link a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.view-all-link a:hover {
    text-decoration: underline;
}
</style>


    <?php
    include_once 'connection.php';
    
    $sql = "SELECT * FROM notification_tbl WHERE member_id='" . $_SESSION['member_id'] . "' ORDER BY created_at DESC";
	//echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message = $row['message'];
            $created_at = $row['created_at'];

            // Extract sender ID
            preg_match('/Member\s*#(\d+)/', $message, $matches);

            if (!empty($matches[1])) {
                $sender_id = intval($matches[1]);

                // Get sender details
                $memQuery = mysqli_query($conn, "SELECT member_firstname, member_lastname, member_image FROM member_tbl WHERE member_id = $sender_id");
				
                $mem = mysqli_fetch_assoc($memQuery);

                $sender_name = $mem ? $mem['member_firstname'] . ' ' . $mem['member_lastname'] : "Unknown Member";
                $sender_img = (!empty($mem['member_image'])) ? "member_profiles/" . $mem['member_image'] : "member_profiles/default-profile.png";

                // Replace ID in message with name
                $message = str_replace("Member #$sender_id", "<strong>$sender_name</strong>", $message);
            } else {
                $sender_name = "Unknown Member";
                $sender_img = "member_profiles/default-profile.png";
            }

            echo '<div class="notification-item">';
            echo '<img src="' . htmlspecialchars($sender_img) . '" alt="' . htmlspecialchars($sender_name) . '" class="notif-img">';
            echo '<div class="notif-text">' . $message . '<br><div class="notif-time">' . $created_at . '</div></div>';
            echo '</div>';
        }
    } 
else {
        echo '<div class="notification-item">No new notifications.</div>';
    }
    ?>
    <div class="view-all-link">
        <a href="view_All_notfication.php">View All Notifications</a>
    </div>
