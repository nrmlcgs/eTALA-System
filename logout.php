<?php
session_start();
date_default_timezone_set('Asia/Manila');
include 'include/db_connection.php';

if (session_destroy()) {
    header("Location: index.php");
    $date = date("M d, Y  h:ia");
   
    $student_id = $_SESSION['student_id'];
    $true = $conn->query("INSERT INTO `tbl_history_log`(transaction, user_id, student_id, date_added) VALUES ('Logged out', '3', '$student_id', '$date')");
    if ($true) {
        header("Location: index.php");
    }

}
?>