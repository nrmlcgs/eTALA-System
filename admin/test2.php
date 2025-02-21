<?php
// Establish database connection
include('include/db_connection.php');


// Check if lrn_no is set in the POST data
$lrnValue = isset($_POST['lrn_no']) ? $_POST['lrn_no'] : '';

if (empty($lrnValue)) {
    // Handle the case when lrn_no is not provided
    echo "LRN number is missing.";
} else {
    // Query to fetch student information
    $student_info_sql = "SELECT * FROM `tbl_student_info` WHERE `lrn_no`= ?";
    $stmt = $conn->prepare($student_info_sql);
    $stmt->bind_param("s", $lrnValue);
    $stmt->execute();
    $student_info_result = $stmt->get_result();

    if ($student_info_result->num_rows > 0) {
        // Fetch the first row from the result set
        $row = $student_info_result->fetch_assoc();
        $student_id = $row['student_id'];

        // Query to fetch grades for the student
        $grades_sql = "SELECT g.`grade_id`, g.`subject`, g.`1st_grading`, g.`2nd_grading`, g.`3rd_grading`, g.`4th_grading`, g.`unit`, 
                            g.`final_grade`, g.`passed_failed`, g.`year_level` as 'grade_year_level', g.`section` as 'grade_section'
                       FROM `tbl_grades` g
                       INNER JOIN `tbl_student_info` si ON si.`student_id` = g.`student_id`
                       WHERE g.`student_id` = ?";

        $stmt = $conn->prepare($grades_sql);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $grades_result = $stmt->get_result();

        if ($grades_result) {
            $student_info = $row;
            $data = [
                'student_info' => $student_info,
                'grades' => []
            ];

            while ($row = $grades_result->fetch_assoc()) {
                $yearLevel = $row['grade_year_level'];
                
                $gradeData = [
                    'grade_id' => $row['grade_id'],
                    'subject' => $row['subject'],
                    '1st_grading' => $row['1st_grading'],
                    '2nd_grading' => $row['2nd_grading'],
                    '3rd_grading' => $row['3rd_grading'],
                    '4th_grading' => $row['4th_grading'],
                    'unit' => $row['unit'],
                    'final_grade' => $row['final_grade'],
                    'passed_failed' => $row['passed_failed'],
                    'grade_year_level' => $row['grade_year_level'],
                    'grade_section' => $row['grade_section']
                ];

                $data['grades'][$yearLevel][] = $gradeData;
            }

            // Encode the array as JSON
            $json_data = json_encode($data, JSON_PRETTY_PRINT);

            // Output the JSON
            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "Query failed: " . $conn->error;
        }
    } else {
        echo "No matching records found for the provided LRN number.";
    }

    // Close the prepared statements
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
