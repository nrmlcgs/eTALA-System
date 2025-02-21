<?php
session_start();
include '../include/db_connection.php';
include '../include/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the ID from the form data
    $id = $_POST["update_student_id"];

    $delete_student = $conn->query("DELETE FROM `tbl_student_info` WHERE  student_id = '$id'");
}
?>