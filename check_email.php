<?php
include_once 'connection.php'; // Include your database connection

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $query = "SELECT member_email FROM member_tbl WHERE member_email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 'exists'; // Email is already registered
    } else {
        echo 'available'; // Email is available
    }
}

mysqli_close($conn);
?>
