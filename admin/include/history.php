<?php
 session_start();
 error_reporting(0);
 include 'db_connection.php';

 
 if($_SESSION['user_type'] !== 3){
    $true = $conn->query("INSERT INTO tbl_history_log VALUES ('',logging in','" . $_SESSION['student_id'] . "','$date')");
    header("Location: dashboard.php?page=personal_information");
}   
?>