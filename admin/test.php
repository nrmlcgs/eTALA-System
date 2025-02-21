<?php
// Establish database connection
include('include/db_connection.php');

$sql = "SELECT si.`student_id`, si.`lrn_no`, si.`lastname`, si.`firstname`, si.`middlename`, si.`email`, si.`password`, si.`gender`, 
               si.`date_of_birth`, si.`address`, si.`birth_place`, si.`religion`, si.`contact_no`, si.`age`, si.`year_level`, 
               si.`school_year`, si.`section`, si.`status`, si.`program`, si.`verify_token`,
               g.`grade_id`, g.`subject`, g.`1st_grading`, g.`2nd_grading`, g.`3rd_grading`, g.`4th_grading`, g.`unit`, 
               g.`final_grade`, g.`passed_failed`, g.`year_level` as 'grade_year_level', g.`section` as 'grade_section'
        FROM `tbl_student_info` si
        INNER JOIN `tbl_grades` g ON si.`student_id` = g.`student_id`
        WHERE si.`student_id` = 1";


$result = $conn->query($sql);

$data = []; // Create an empty array to store the fetched data

if ($result) {
    if ($result->num_rows > 0) {
            // $data=array(
            // 'student_id' => $data['student_id'],
            //     'lrn_no' => $data['lrn_no'],
            //     'lastname' => $data['lastname'],
            //     'firstname' => $row['firstname'],
            //     'middlename' => $row['middlename'],
            //     'email' => $row['email'],
            //     'password' => $row['password'],
            //     'gender' => $row['gender'],
            //     'date_of_birth' => $row['date_of_birth'],
            //     'address' => $row['address'],
            //     'birth_place' => $row['birth_place'],
            //     'religion' => $row['religion'],
            //     'contact_no' => $row['contact_no'],
            //     'age' => $row['age'],
            //     'year_level' => $row['year_level'],
            //     'school_year' => $row['school_year'],
            //     'section' => $row['section'],
            //     'status' => $row['status'],
            //     'program' => $row['program'],
            //     'verify_token' => $row['verify_token'],
            //     'grade_id' => $row['grade_id']
            // );
        while ($row = $result->fetch_assoc()) {
            // Process and store data in an associative array grouped by year_level
            $yearLevel = $row['grade_year_level'];
            
            $data[$yearLevel][] = [
                'subject' => $row['subject'],
                '1st_grading' => $row['1st_grading'],
                '2nd_grading' => $row['2nd_grading'],
                '3rd_grading' => $row['3rd_grading'],
                '4th_grading' => $row['4th_grading'],
                'unit' => $row['unit'],
                'final_grade' => $row['final_grade'],
                'passed_failed' => $row['passed_failed'],
                'grade_section'=>$row['grade_section']
            ];
        }
        
        // Encode the array as JSON
        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        // Output the JSON
        header('Content-Type: application/json');
        echo $json_data;
    } else {
        echo "No results found";
    }
} else {
    echo "Query failed: " . $conn->error;
}

$conn->close();
?>
