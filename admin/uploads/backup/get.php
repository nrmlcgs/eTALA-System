<?php
session_start();
include '../include/db_connection.php';
include '../include/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lrn_no = $_POST['xlrn'];
    $doc_type = $_POST['doc_type'];
    $directory = '../uploads/';



    // Prepare SQL statement
    $check = "SELECT COUNT(*) as total FROM tbl_docs WHERE lrn_no = '$lrn_no' and file_type = '$doc_type'";
    $request = mysqli_query($conn, $check);
    $cnt = mysqli_fetch_assoc($request);
    $count = $cnt['total'];

    // Check if any rows were returned
    if ($count > 0) {
        //get full file_name
        $get = "SELECT file_name FROM tbl_docs WHERE lrn_no = '$lrn_no' and file_type = '$doc_type'";
        $result = mysqli_query($conn, $get);

        // Check if the query was successful
        if ($result) {
            // Fetch the result row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Access the value of the selected column
            $file_name = $row['file_name'];

            // Concatenate the folder path with the file name to get the full file path
            $fullFilePath = $file_name;
            // Output the file data
            // readfile($fullFilePath);
            echo $fullFilePath;
        }
    } else {
        $_SESSION['no_found'] = "No document Found";
        echo '1';
    }


    // $getname = "SELECT lastname, firstname FROM tbl_student_info WHERE lrn_no = '$lrn_no'";
    // $result = $conn->query($getname);

    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     $lastname = $row['lastname'];
    //     $firstname = $row['firstname'];

    //     $filname_ex = $lrn_no . '_' . $lastname . '_' . $firstname . '_' . $doc_type;
    //     $files = glob($directory . $filname_ex . '.*');
    //     if (!empty($files)) {
    //         $fullFilename = $files[0];

    //         echo $fullFilename;
    //     } else {
    //     }
    // }
}
