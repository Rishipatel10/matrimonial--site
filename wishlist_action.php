<?php
include 'connection.php';

if(!isset($_SESSION['cnt_member']) || $_SESSION['cnt_member'] == 0)  
{
	echo json_encode(array('status' => 'expiry'));
    exit();
}

// Redirect if user is not logged in
if (!isset($_SESSION['member_id'])) {
    echo json_encode(array('status' => 'not_logged_in'));
    exit();
}

$member_id = $_SESSION['member_id'];

if (isset($_POST['profile_id'])) {
    $profile_id = $_POST['profile_id'];

    // Check if the profile is already in the wishlist
    $query = "SELECT * FROM bookmark_profile_tbl WHERE member_id = '$member_id' AND member_profile_id = '$profile_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Remove from wishlist
        $delete_query = "DELETE FROM bookmark_profile_tbl WHERE member_id = '$member_id' AND member_profile_id = '$profile_id'";
        if (mysqli_query($conn, $delete_query)) {
            echo json_encode(array('status' => 'unbookmarked', 'message' => 'Profile removed from wishlist'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to remove profile'));
        }
    } else {
        // Add to wishlist
        $insert_query = "INSERT INTO bookmark_profile_tbl (member_id, member_profile_id) VALUES ('$member_id', '$profile_id')";
        if (mysqli_query($conn, $insert_query)) {
            echo json_encode(array('status' => 'bookmarked', 'message' => 'Profile added to wishlist'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to add profile'));
        }
    }
}
?>
