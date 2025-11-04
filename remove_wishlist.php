<?php
	include "connection.php"; // Include your database connection file


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$profile_id = $_POST["profile_id"];
		$member_id = $_SESSION["member_id"];

		$delete_query = "DELETE FROM bookmark_profile_tbl WHERE member_id = '$member_id' AND member_profile_id = '$profile_id'";
		
		if (mysqli_query($conn, $delete_query)) {
			echo "success";
		} else {
			echo "error";
		}
	}
?>
