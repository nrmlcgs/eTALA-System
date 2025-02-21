<?php
session_start();
include '../include/db_connection.php';
include '../include/auth.php';

if (isset($_POST['selected_sy1']) && isset($_POST['id1'])) {

    $selected_sy1 = $_POST['selected_sy1']; 
    $id1 = $_POST['id1']; 

    $sql = "SELECT * FROM tbl_grades WHERE school_year = '$selected_sy1' and student_id = '$id1'";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data['section'] = $row['section'];
        $data['year_level'] = $row['year_level'];
    } else {
        
        $sql = "SELECT * FROM tbl_shs WHERE school_year = '$selected_sy1' and student_id = '$id1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data['section'] = $row['section'];
            $data['year_level'] = $row['year_level'];
        }else{
            // $data['x'] = "no data";
        }
    }
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
