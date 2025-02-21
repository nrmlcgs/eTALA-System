<?php
session_start();
include '../../include/db_connection.php';
include '../../include/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lrn_no = $_SESSION['lrn_no'];
    $doc_type = $_POST['get_doc'];
    $fileNameToCheck = $lrn_no . "_" . $doc_type;

    // Prepare SQL statement
    $check = "SELECT COUNT(*) as total FROM tbl_docs WHERE file_name LIKE '%$fileNameToCheck%'";
    $request = mysqli_query($conn, $check);
    $cnt = mysqli_fetch_assoc($request);
    $count = $cnt['total'];

    // Check if any rows were returned
    if ($count > 0) {
        //get full file_name
        $get = "SELECT file_name FROM tbl_docs WHERE file_name LIKE '%$fileNameToCheck%'";
        $result = mysqli_query($conn, $get);

        // Check if the query was successful
        if ($result) {
            // Fetch the result row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Access the value of the selected column
            $file_name = $row['file_name'];

            // $_SESSION['message'] = "<script>alert('Update failed!')</script>";
        // Concatenate the folder path with the file name to get the full file path
        $fullFilePath = $file_name;
        // Output the file data
        // readfile($fullFilePath);
        echo $fullFilePath;
        // header("Location: dashboard.php?page=personal_information");
        }
    } else {
        $_SESSION['no_found'] = "No document Found";
        header("Location: dashboard.php?page=personal_information");
    }
}
