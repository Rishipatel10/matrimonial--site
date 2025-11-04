<?php
    include 'connection.php';
    $s_id = $_POST['sub_id'];
    $str = "SELECT sub_community_status FROM sub_community_tbl WHERE sub_community_id = $s_id";
    $result = mysqli_query($conn, $str);
    $row = mysqli_fetch_array($result);
    $status = $row['sub_community_status'];
    // Toggle the status
    if ($status == 1) {
        $status = 0; 
    } else {
        $status = 1; 
    }
    $qry = "UPDATE sub_community_tbl SET sub_community_status='$status' WHERE sub_community_id=$s_id";
    $data= mysqli_query($conn, $qry);
    if ($data) {
        echo $data;  
    }
?>