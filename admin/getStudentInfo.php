<?php

include('include/db_connection.php');
// if(isset($_GET['goodmoral']) && $_GET['goodmoral'] == 1){
//     $student_lrn = $_GET['student_lrn'];;

// }
if (isset($_GET['find']) && $_GET['find'] == 1) {
    $student_lrn = $_GET['student_lrn'];

    // Perform any necessary validation or sanitation on $student_lrn

    // Your database connection code goes here

    $student_info_sql = "SELECT * FROM `tbl_student_info` WHERE `lrn_no`= ?";
    $stmt = $conn->prepare($student_info_sql);

    if ($stmt) {
        $stmt->bind_param("s", $student_lrn);
        $stmt->execute();

        $student_info_result = $stmt->get_result();

        if ($student_info_result->num_rows > 0) {
            $row = $student_info_result->fetch_assoc();

            // Build an associative array with the retrieved data
            $response = array(
                'lrn_no'=> $row['lrn_no'],
                'firstname' => $row['firstname'],
                'middlename' => $row['middlename'],
                'lastname' => $row['lastname'],
                'section'=>$row['section'],
                'year_level'=>$row['year_level']
            );

            // Extract the first letter of the middle name
            $middleInitial = !empty($row['middlename']) ? strtoupper(substr($row['middlename'], 0, 1)) . '.' : '';

            // Add the complete name to the array
            $response['completeName'] = $row['firstname'] . ' ' . $middleInitial . ' ' . $row['lastname'];

            // Encode the array as JSON
            $json_data = json_encode($response, JSON_PRETTY_PRINT);

            // Output the JSON
            header('Content-Type: application/json');
            echo $json_data;
        } else {
            // Return a JSON response indicating no records found
            echo json_encode(array('message' => 'No records found.'));
        }

        $stmt->close();

        // Close your database connection here
        $conn->close();
    } else {
        // Handle the error (e.g., log it, show a user-friendly message)
        echo json_encode(array('error' => 'Error preparing query: ' . $conn->error));
    }
} else {
    // Handle the case where 'find' is not set or has an incorrect value
    echo json_encode(array('error' => 'Invalid request.'));
}

?>
