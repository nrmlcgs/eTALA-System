<?php
session_start();
date_default_timezone_set('Asia/Manila');
include 'include/db_connection.php';
if (session_destroy()) {
    header("Location: index.php");
    $date = date("M d, Y  h:ia");
    $user_id = $_SESSION['id'];
    
    $true = $conn->query("INSERT INTO `tbl_history_log`(transaction, user_id, student_id, date_added) VALUES ('Logged out', '$user_id', '0', '$date')");
        
    if ($true) {
        header("Location: index.php");
        exit();
    }

}
?>