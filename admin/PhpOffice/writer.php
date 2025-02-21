<?php
session_start();
require 'vendor/autoload.php';
include '../include/db_connection.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Load existing Excel file
$reader = new ReaderXlsx();
$spreadsheet = $reader->load('SF10-SHS.xlsx');

$sheet = $spreadsheet->getSheetByName('FRONT'); // Replace 'Sheet1' with the name of the worksheet you want to access

//Fetch data from database
$lrn_no = $_POST['lrn_list'];
$sf_type = $_POST['sf_type'];
// AND year_level >= '$sf_type'
$sql_check = "SELECT * FROM tbl_student_info WHERE lrn_no = '$lrn_no'";
$result = $conn->query($sql_check);
if ($result->num_rows == 1) {
    while ($row = $result->fetch_assoc()) {
        if ($row["year_level"] > 4) {
            $student_id = $row["student_id"];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];

            $sql = "SELECT tbl_student_info.*, tbl_shs.*, tbl_track_strand.*
            FROM tbl_shs
            JOIN tbl_student_info ON tbl_shs.student_id = tbl_student_info.student_id
            JOIN tbl_track_strand on tbl_shs.track_strand =tbl_track_strand.id 
            WHERE tbl_student_info.student_id = '$student_id' AND tbl_shs.year_level = '5'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Fetch data and assign to variables
            while ($row = $result->fetch_assoc()) {
                // Convert the date string to a Unix timestamp
                $timestamp = strtotime($row['date_of_birth']);
                // Format the Unix timestamp to the desired format
                $bday = date("m/d/Y", $timestamp);
                // Get the active sheet
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('F8', $row['lastname']);
                $sheet->setCellValue('Y8', $row['firstname']);
                $sheet->setCellValue('AZ8', $row['middlename']);
                $sheet->setCellValue('C9',  $row['lrn_no']);
                $sheet->setCellValue('AA9', $bday);
                $sheet->setCellValue('AN9', $row['gender']);
                $sheet->setCellValue('BA23', $row['school_year']);
                $sheet->setCellValue('AS25', $row['section']);
                $sheet->setCellValue('G25', $row['track'] . '/' . $row['strand']);
            }

            $sql = "SELECT * FROM tbl_shs 
    JOIN tbl_subject on tbl_shs.subject =tbl_subject.subject_name  
    WHERE tbl_shs.student_id = '$student_id'
    AND tbl_shs.year_level = '5' AND tbl_shs.sem_id = '1'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $g_result = $stmt->get_result();
            $rowNumber = 31;
            //get average 11-1
            $totalAverage = 0;
            $count = 0;
            // Loop through each row in the result set
            while ($row = $g_result->fetch_assoc()) {
                // Set cell values in the Excel sheet
                $sheet->setCellValue('A' . $rowNumber, $row['description']);
                $sheet->setCellValue('I' . $rowNumber, $row['subject_name']);
                $sheet->setCellValue('AT' . $rowNumber, number_format($row['first']));
                $sheet->setCellValue('AY' . $rowNumber, number_format($row['second']));
                $sheet->setCellValue('BD' . $rowNumber, number_format($row['average']));
                $sheet->setCellValue('BI' . $rowNumber, $row['sem_action']);
                // Increment row number for the next iteration
                $rowNumber++;

                // Add 'average' value to the total
                $totalAverage += $row['average'];
                // Increment count
                $count++;
                $sheet->setCellValue('A49', $row['adviser_name']);
            }

            // Calculate the average
            if ($count == 0) {
                $sheet->setCellValue('BD43', '');
            } else {
                $average = number_format($totalAverage / $count, 0);
                // Set the total average in a specific cell (e.g., A49)
                $sheet->setCellValue('BD43', $average);
            }


            //END GRADE 11 - FIRST SEM

            //START GRADE 11 - SECOND SEM


            $sql = "SELECT tbl_student_info.*, tbl_shs.*, tbl_track_strand.*
    FROM tbl_shs
    JOIN tbl_student_info ON tbl_shs.student_id = tbl_student_info.student_id
    JOIN tbl_track_strand on tbl_shs.track_strand =tbl_track_strand.id 
    WHERE tbl_student_info.student_id = '$student_id' AND tbl_shs.year_level = '5'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Fetch data and assign to variables
            while ($row = $result->fetch_assoc()) {
                // Get the active sheet
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('BA66', $row['school_year']);
                $sheet->setCellValue('AS68', $row['section']);
                $sheet->setCellValue('G68', $row['track'] . '/' . $row['strand']);
            }

            //GRADE 2ND SEM FOR G11
            $sql2 = "SELECT * FROM tbl_shs 
    JOIN tbl_subject on tbl_shs.subject =tbl_subject.subject_name  
    WHERE tbl_shs.student_id = '$student_id'
    AND tbl_shs.year_level = '5' AND tbl_shs.sem_id = '2'";
            $stmt = $conn->prepare($sql2);
            $stmt->execute();

            // Get result set
            $g2_result = $stmt->get_result();
            $rowNumber = 74;
            //get average 11-2
            $totalAverage112 = 0;
            $count112 = 0;
            // Loop through each row in the result set
            while ($row = $g2_result->fetch_assoc()) {
                // Set cell values in the Excel sheet
                $sheet->setCellValue('A' . $rowNumber, $row['description']);
                $sheet->setCellValue('I' . $rowNumber, $row['subject_name']);
                $sheet->setCellValue('AT' . $rowNumber, number_format($row['first']));
                $sheet->setCellValue('AY' . $rowNumber, number_format($row['second']));
                $sheet->setCellValue('BD' . $rowNumber, number_format($row['average']));
                $sheet->setCellValue('BI' . $rowNumber, $row['sem_action']);
                // Increment row number for the next iteration
                $rowNumber++;
                $sheet->setCellValue('A92', $row['adviser_name']);
                // Add 'average' value to the total
                $totalAverage112 += $row['average'];
                // Increment count
                $count112++;
            }
            // Calculate the average
            if ($count112 == 0) {
                $sheet->setCellValue('BD86', '');
            } else {
                // Calculate the average
                $average112 = number_format($totalAverage112 / $count112);
                $sheet->setCellValue('BD86', $average112);
            }
            //END GRADE 11 - SECOND SEM

            //START GRADE 12 - 2ND SEM TO NEXT SHEET

            // Get the specific worksheet by name
            $sheet = $spreadsheet->getSheetByName('BACK'); // Replace 'Sheet1' with the name of the worksheet you want to access


            $sql = "SELECT tbl_student_info.*, tbl_shs.*, tbl_track_strand.*
    FROM tbl_shs
    JOIN tbl_student_info ON tbl_shs.student_id = tbl_student_info.student_id
    JOIN tbl_track_strand on tbl_shs.track_strand =tbl_track_strand.id 
    WHERE tbl_student_info.student_id = '$student_id' AND tbl_shs.year_level = '6'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $sheet->setCellValue('BA4', $row['school_year']);
                $sheet->setCellValue('AS5', $row['section']);
                $sheet->setCellValue('G5', $row['track'] . '/' . $row['strand']);
            }

            //GRADE 12 1ST SEM

            $sql = "SELECT * FROM tbl_shs 
    JOIN tbl_subject on tbl_shs.subject =tbl_subject.subject_name  
    WHERE tbl_shs.student_id = '$student_id'
    AND tbl_shs.year_level = '6' AND tbl_shs.sem_id = '1'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $g_result = $stmt->get_result();
            $rowNumber = 11;
            //get average 12-1
            $totalAverage121 = 0;
            $count121 = 0;
            // Loop through each row in the result set
            while ($row = $g_result->fetch_assoc()) {
                // Set cell values in the Excel sheet
                $sheet->setCellValue('A' . $rowNumber, $row['description']);
                $sheet->setCellValue('I' . $rowNumber, $row['subject_name']);
                $sheet->setCellValue('AT' . $rowNumber, number_format($row['first']));
                $sheet->setCellValue('AY' . $rowNumber, number_format($row['second']));
                $sheet->setCellValue('BD' . $rowNumber, number_format($row['average']));
                $sheet->setCellValue('BI' . $rowNumber, $row['sem_action']);
                // Increment row number for the next iteration
                $rowNumber++;
                $sheet->setCellValue('A29', $row['adviser_name']);
                // Add 'average' value to the total
                $totalAverage121 += $row['average'];
                // Increment count
                $count121++;
            }
            // Calculate the average
            if ($count121 == 0) {
            } else {
                // Calculate the average
                $average121 = number_format($totalAverage121 / $count121);
                $sheet->setCellValue('BD23', $average121);
            }

            //grade 12 second sem
            $sql = "SELECT tbl_student_info.*, tbl_shs.*, tbl_track_strand.*
    FROM tbl_shs
    JOIN tbl_student_info ON tbl_shs.student_id = tbl_student_info.student_id
    JOIN tbl_track_strand on tbl_shs.track_strand =tbl_track_strand.id 
    WHERE tbl_student_info.student_id = '$student_id' AND tbl_shs.year_level = '6'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Fetch data and assign to variables
            while ($row = $result->fetch_assoc()) {
                // Get the active sheet
                // $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('BA46', $row['school_year']);
                $sheet->setCellValue('AS48', $row['section']);
                $sheet->setCellValue('G48', $row['track'] . '/' . $row['strand']);
            }

            $sql = "SELECT * FROM tbl_shs 
    JOIN tbl_subject on tbl_shs.subject =tbl_subject.subject_name  
    WHERE tbl_shs.student_id = '$student_id'
    AND tbl_shs.year_level = '6' AND tbl_shs.sem_id = '2'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $g_result = $stmt->get_result();
            $rowNumber = 54;
            //get average 12-2
            $totalAverage122 = 0;
            $count122 = 0;
            // Loop through each row in the result set
            while ($row = $g_result->fetch_assoc()) {
                // Set cell values in the Excel sheet
                $sheet->setCellValue('A' . $rowNumber, $row['description']);
                $sheet->setCellValue('I' . $rowNumber, $row['subject_name']);
                $sheet->setCellValue('AT' . $rowNumber, number_format($row['first']));
                $sheet->setCellValue('AY' . $rowNumber, number_format($row['second']));
                $sheet->setCellValue('BD' . $rowNumber, number_format($row['average']));
                $sheet->setCellValue('BI' . $rowNumber, $row['sem_action']);
                // Increment row number for the next iteration
                $rowNumber++;
                $sheet->setCellValue('A72', $row['adviser_name']);
                // Add 'average' value to the total
                $totalAverage122 += $row['average'];
                // Increment count
                $count122++;
            }
            // Calculate the average
            if ($count122 == 0) {
                $sheet->setCellValue('BD66', '');
            } else {
                // Calculate the average
                $average122 = number_format($totalAverage122 / $count122);
                $sheet->setCellValue('BD66', $average122);
            }
            $doc_type = 'SF 10-SHS';
            $outputFolder = '../uploads/';
            $fname = $lrn_no . '_' . $lastname . '_' . $firstname . '_' . 'SHF 10-SHS.xlsx';
            $file_name = $outputFolder . $fname;
            // Save the modified Excel file
            $writer = new Xlsx($spreadsheet);
            $writer->save($file_name);

            // Check if record exists
            $save = "SELECT COUNT(*) AS count FROM tbl_docs WHERE file_type = '$doc_type' and lrn_no = '$lrn_no'";
            $r = mysqli_query($conn, $save);
            $row = mysqli_fetch_assoc($r);
            $count1 = $row['count'];

            if ($count1 > 0) {
                 $sql = "UPDATE tbl_docs set file_name = '$fname' WHERE lrn_no = '$lrn_no' and file_type = '$doc_type'";
            $saved = mysqli_query($conn, $sql);
            } else {
                // Insert record if it does not exist
                $sql = "INSERT INTO tbl_docs (lrn_no, file_type, file_name) VALUES ('$lrn_no', 'SF 10-SHS' ,'$fname')";
                $SAVED = mysqli_query($conn, $sql);
            }

            $_SESSION['sf10shs_su'] = 'available';
        
            if (isset($_SESSION['lrn_no'])) {
                header("Location: ../../dashboard.php?page=report_of_grades");
            } else {
                 header("Location: ../dashboard.php?page=record");
            }

        } else {
            $_SESSION['xsf10'] = 'Not available';
             if (isset($_SESSION['lrn_no'])) {
                header("Location: ../../dashboard.php?page=report_of_grades");
            } else {
                 header("Location: ../dashboard.php?page=record");
            }
        }
    }
} else {
    $_SESSION['xsf101'] = 'Not available';
    if (isset($_SESSION['lrn_no'])) {
        header("Location: ../../dashboard.php?page=report_of_grades");
    } else {
         header("Location: ../dashboard.php?page=record");
    }
}
