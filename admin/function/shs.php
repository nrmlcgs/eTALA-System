<?php
session_start();
include '../include/db_connection.php';
include '../include/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $grade1 = $_POST['grade1'];
    $grade2 = $_POST['grade2'];
    $avg = $_POST['avg'];
    $action = $_POST['action'];
    $section = $_POST['section'];   
    $adviser = $_POST['adviser'];
    $year_level = $_POST['year_level'];
    $school_year = $_POST['selected_sy'];

    $sql_check = "SELECT * FROM tbl_shs WHERE student_id = '$student_id' AND subject like '%$subject%' AND sem_id = '$semester' AND year_level = '$year_level'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows == 0) {

        $stmt = "SELECT * FROM tbl_student_info WHERE student_id = '$student_id'";
        $result = $conn->query($stmt);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $ts = $row['track_strand'];
            $sql_insert = "INSERT INTO tbl_shs VALUES ('','$student_id','$ts','$subject', '$semester', '$grade1', '$grade2',
                        '$section', '$year_level', '$adviser','','','$school_year')";
            if ($conn->query($sql_insert) === TRUE) {
                $_SESSION['shs_rec_su'] = 'Record Successfully Added!';
                header("Location: dashboard.php?page=page=add_record&student_id=" + $student_id);
            } else {
                $_SESSION['grade_x'] = 'x!';
                header("Location: dashboard.php?page=page=add_record&student_id=" + $student_id);
            }
        }
    } else {
        $stmt = "SELECT * FROM tbl_student_info WHERE student_id = '$student_id'";
        $result = $conn->query($stmt);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $ts = $row['track_strand'];
            $sql_insert = "UPDATE tbl_shs SET first = '$grade1', second = '$grade2' WHERE student_id = '$student_id' 
                            AND sem_id = '$semester' AND subject = '$subject'";
            if ($conn->query($sql_insert) === TRUE) {
                $_SESSION['update_grade'] = 'Record Successfully Updated!';
                header("Location: dashboard.php?page=page=add_record&student_id=" + $student_id);
            } else {
                $_SESSION['grade_x'] = 'x!';
                header("Location: dashboard.php?page=page=add_record&student_id=" + $student_id);
            }
        }
    }
}
