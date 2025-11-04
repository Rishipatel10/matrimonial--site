<?php
include_once 'connection.php';

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Kolkata');

// Check login
if (!isset($_SESSION['member_id'])) {
    echo "<h3>Please login to view notifications.</h3>";
    exit;
}

$member_id = $_SESSION['member_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .notification {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding: 12px 0;
            text-decoration: none;
            color: #000;
            transition: background 0.2s ease;
        }
        .notification:hover {
            background: #f1f1f1;
        }
        .profile-img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            margin-right: 16px;
            object-fit: cover;
            border: 2px solid #ccc;
        }
        .message {
            flex: 1;
        }
        .timestamp {
            font-size: 12px;
            color: gray;
        }
        .home-link {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 18px;
            text-decoration: none;
            color: #007bff;
        }
        .home-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="home-link" href="index.php">🏠 Home</a>
        <h2>📩 My Notifications</h2>

        <?php
        $sql = "SELECT * FROM notification_tbl WHERE member_id = '$member_id' ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $notification_type = $row['notification_type'];
                $created_at = date('d-m-Y h:i A', strtotime($row['created_at']));
                $message = $row['message'];

                // Detect sender ID in message
                preg_match('/Member #(\d+)/', $message, $matches);
                $sender_id = isset($matches[1]) ? $matches[1] : null;

                if ($sender_id) {
                    $sender_query = mysqli_query($conn, "SELECT member_firstname, member_lastname, member_image FROM member_tbl WHERE member_id = '$sender_id'");
                    $sender = mysqli_fetch_assoc($sender_query);

                    if ($sender) {
                        $sender_name = $sender['member_firstname'] . ' ' . $sender['member_lastname'];
                        $sender_img = !empty($sender['member_image']) ? "member_profiles/" . $sender['member_image'] : "member_profiles/default-profile.png";

                        // Replace Member ID with actual name
                        $message = str_replace("Member #$sender_id", "<strong>$sender_name</strong>", $message);
                    } else {
                        $sender_img = "member_profiles/default-profile.png";
                    }
                } else {
                    $sender_img = "member_profiles/default-profile.png";
                }
				
                // Determine redirect link
                // Check if cnt_member is not set or equals 0
				if (!isset($_SESSION['cnt_member']) || $_SESSION['cnt_member'] == 0) {
					$link = "plans.php"; // If true, redirect to plans.php
				} else {
					// If cnt_member is set and not equal to 0, use the normal link based on notification type
					$link = ($notification_type == 'package_expiry_reminder') ? "plans.php" : "user_interests.php#tab=menu1";
				}


                echo '<a class="notification" href="' . $link . '">';
                echo '<img src="' . $sender_img . '" class="profile-img">';
                echo '<div class="message">' . $message . '<div class="timestamp">🕒 ' . $created_at . '</div></div>';
                echo '</a>';
            }
        } else {
            echo "<p>No notifications available.</p>";
        }
        ?>
    </div>
</body>
</html>
