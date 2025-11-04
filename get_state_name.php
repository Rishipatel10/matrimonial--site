<?php 
	include_once 'connection.php';

	if (isset($_POST["State_ID"])) {
    $stateID = htmlspecialchars($_POST["State_ID"]);

    // Query to get the state name
    $query = "SELECT state_name FROM state_tbl WHERE state_id = '$stateID'";
    $res = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_array($res)) {
        echo ucfirst($row["state_name"]); // Send state name back to JavaScript
    } else {
        echo "State not found";
    }
}
?>