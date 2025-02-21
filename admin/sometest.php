<?php
include('include/db_connection.php');
$sql = "SELECT si.`student_id`, si.`lrn_no`, si.`lastname`, si.`firstname`, si.`middlename`, si.`email`, si.`password`, si.`gender`, 
               si.`date_of_birth`, si.`address`, si.`birth_place`, si.`religion`, si.`contact_no`, si.`age`, si.`year_level`, 
               si.`school_year`, si.`section`, si.`status`, si.`program`, si.`verify_token`,
               g.`grade_id`, g.`subject`, g.`1st_grading`, g.`2nd_grading`, g.`3rd_grading`, g.`4th_grading`, g.`unit`, 
               g.`final_grade`, g.`passed_failed`, g.`year_level` as 'grade_year_level'
        FROM `tbl_student_info` si
        INNER JOIN `tbl_grades` g ON si.`student_id` = g.`student_id`
        WHERE si.`student_id` = 1
        GROUP BY 'grade_year_level'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Create an associative array with the required data
    $student_info = array(
        'student_id' => $data['student_id'],
                'lrn_no' => $data['lrn_no'],
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'email' => $data['email'],
                'password' => $data['password'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'address' => $data['address'],
                'birth_place' => $data['birth_place'],
                'religion' => $data['religion'],
                'contact_no' => $data['contact_no'],
                'age' => $data['age'],
                'year_level' => $data['year_level'],
                'school_year' => $data['school_year'],
                'section' => $data['section'],
                'status' => $data['status'],
                'program' => $data['program'],
                'verify_token' => $data['verify_token']
                // 'grade_id' => $data['grade_id'],
                // 'subject' => $data['subject'],
                // '1st_grading' => $data['1st_grading'],
                // '2nd_grading' => $data['2nd_grading'],
                // '3rd_grading' => $data['3rd_grading'],
                // '4th_grading' => $data['4th_grading'],
                // 'unit' => $data['unit'],
                // 'final_grade' => $data['final_grade'],
                // 'passed_failed' => $data['passed_failed'],
                // 'g_year_level'=>$data['grade_year_level']
    );
    // Encode the array as JSON and echo the result
    echo json_encode(array("student_info" => $student_info));
} else {
    echo json_encode(array("student_info" => null)); // Handle no data case differently if needed
}
?>