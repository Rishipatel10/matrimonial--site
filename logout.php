<?php
    session_start(); // Start the session

    if (!isset($_SESSION["member_id"])) {
        header('Location: login.php');
        exit; // Stop further execution
    }

    session_destroy(); // Destroy the session
    header('Location: login.php');
    exit; // Ensure the script stops after redirection
?>
