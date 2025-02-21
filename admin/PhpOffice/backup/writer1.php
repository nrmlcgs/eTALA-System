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
$spreadsheet = $reader->load('SF10-JHS.xlsx');

$sheet = $spreadsheet->getSheetByName('front'); // Replace 'Sheet1' with the name of the worksheet you want to access

if (isset($_SESSION['lrn_no'])) {
    $lrn = $_SESSION['lrn_no'];
} else {
    $lrn = $_POST['lrn_list'];
}

//Fetch data from database
$lrn_no = $lrn;

$sql_check = "SELECT * FROM tbl_student_info WHERE lrn_no = '$lrn_no'";
$result_check = $conn->query($sql_check);
if ($result_check->num_rows == 1) {
    while ($row = $result_check->fetch_assoc()) {
        // if ($row["year_level"] < 5) {
        $student_id = $row["student_id"];
        $lastname = $row['lastname'];
        $firstname = $row['firstname'];

        $sql = "SELECT * FROM tbl_grades g
                    INNER JOIN tbl_student_info si ON si.student_id = g.student_id
                    INNER JOIN tbl_subject s ON s.subject_name = g.subject
                    WHERE g.student_id = '$student_id' AND g.year_level = '1' AND s.order_id < 8 order by s.order_id asc";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Convert the date string to a Unix timestamp
        $timestamp = strtotime($row['date_of_birth']);
        // Format the Unix timestamp to the desired format
        $bday = date("m/d/Y", $timestamp);

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('C7', $row['lastname']);
        $sheet->setCellValue('G7', $row['firstname']);
        //set extension/ currently no data to database.... :-)
        $sheet->setCellValue('K7', '');
        $sheet->setCellValue('M7', $row['middlename']);
        $sheet->setCellValue('E8',  $row['lrn_no']);
        $sheet->setCellValue('I8', $bday);
        $sheet->setCellValue('M8', $row['gender']);

        // Get result set
        $result1 = $stmt->get_result();

        //validation if grades are not completed in database for all sbject
        if ($result1->num_rows == 7) {
            $rowNumber = 25;
            //get average 11-1
            $totalAverage = 0;
            $count = 0;
            // Fetch data and assign to variables
            while ($row = $result1->fetch_assoc()) {
                //Grades for G7
                $sheet->setCellValue('K21', $row['adviser_name']);
                $sheet->setCellValue('H21', $row['school_year']);
                $sheet->setCellValue('F21', $row['section']);
                // Set cell values in the Excel sheet
                $sheet->setCellValue('G' . $rowNumber, number_format($row['1st_grading']));
                $sheet->setCellValue('H' . $rowNumber, number_format($row['2nd_grading']));
                $sheet->setCellValue('I' . $rowNumber, number_format($row['3rd_grading']));
                $sheet->setCellValue('J' . $rowNumber, number_format($row['4th_grading']));
                $sheet->setCellValue('K' . $rowNumber, number_format($row['final_grade']));
                $sheet->setCellValue('L' . $rowNumber, strtoupper($row['passed_failed']));
                // Increment row number for the next iteration
                $rowNumber++;

                // Add 'average' value to the total
                $totalAverage += $row['final_grade'];
                // Increment count
                $count++;
            }

            $sql = "SELECT * FROM tbl_grades g
                INNER JOIN tbl_student_info si ON si.student_id = g.student_id
                INNER JOIN tbl_subject s ON s.subject_name = g.subject
                WHERE g.student_id = '$student_id' AND g.year_level = '1' AND s.order_id > 7 order by s.order_id asc";

            $stmt0 = $conn->prepare($sql);
            $stmt0->execute();

            // Get result set
            $result1 = $stmt0->get_result();
            if ($result1->num_rows == 4) {
                $rowNumber = 33;

                while ($row = $result1->fetch_assoc()) {
                    $sheet->setCellValue('G' . $rowNumber, number_format($row['1st_grading']));
                    $sheet->setCellValue('H' . $rowNumber, number_format($row['2nd_grading']));
                    $sheet->setCellValue('I' . $rowNumber, number_format($row['3rd_grading']));
                    $sheet->setCellValue('J' . $rowNumber, number_format($row['4th_grading']));
                    $sheet->setCellValue('K' . $rowNumber, number_format($row['final_grade']));
                    $sheet->setCellValue('L' . $rowNumber, strtoupper($row['passed_failed']));

                    $rowNumber++;
                }
                mysqli_free_result($result1);
                //compute MAPEH
                $m1 = $sheet->getCell('G33')->getValue();
                $a1 = $sheet->getCell('G34')->getValue();
                $pe1 = $sheet->getCell('G35')->getValue();
                $h1 = $sheet->getCell('G36')->getValue();
                $mapeh1 = number_format(($m1 + $a1 + $pe1 + $h1) / 4, 0);
                $sheet->setCellValue('G32', $mapeh1);

                $m2 = $sheet->getCell('H33')->getValue();
                $a2 = $sheet->getCell('H34')->getValue();
                $pe2 = $sheet->getCell('H35')->getValue();
                $h2 = $sheet->getCell('H36')->getValue();
                $mapeh2 = number_format(($m2 + $a2 + $pe2 + $h2) / 4, 0);
                $sheet->setCellValue('H32', $mapeh2);

                $m3 = $sheet->getCell('I33')->getValue();
                $a3 = $sheet->getCell('I34')->getValue();
                $pe3 = $sheet->getCell('I35')->getValue();
                $h3 = $sheet->getCell('I36')->getValue();
                $mapeh3 = number_format(($m3 + $a3 + $pe3 + $h3) / 4, 0);
                $sheet->setCellValue('I32', $mapeh3);

                $m4 = $sheet->getCell('J33')->getValue();
                $a4 = $sheet->getCell('J34')->getValue();
                $pe4 = $sheet->getCell('J35')->getValue();
                $h4 = $sheet->getCell('J36')->getValue();
                $mapeh4 = number_format(($m4 + $a4 + $pe4 + $h4) / 4, 0);
                $sheet->setCellValue('J32', $mapeh4);

                $mapeh5 = $sheet->getCell('G32')->getValue();
                $mapeh6 = $sheet->getCell('H32')->getValue();
                $mapeh7 = $sheet->getCell('I32')->getValue();
                $mapeh8 = $sheet->getCell('J32')->getValue();

                $mapeh_avg = number_format(($mapeh5 + $mapeh6 + $mapeh7 + $mapeh8) / 4);
                $sheet->setCellValue('K32', $mapeh_avg);


                if ($mapeh_avg > 74.4) {
                    $remarks1 = 'PASSED';
                } else {
                    $remarks1 = 'FAILED';
                }

                $sheet->setCellValue('L32', $remarks1);
            }



            // Set the range of rows and columns
            $startRow = 25;
            $endRow = 36;
            $startColumn = 'H';
            $endColumn = 'J';

            // Variable to store if any cell is null
            $isNull = false;

            // Iterate through the rows and columns
            for ($row = $startRow; $row <= $endRow; $row++) {
                for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                    $cellValue = $sheet->getCell(chr($col) . $row)->getValue();
                    if (is_null($cellValue)) {
                        $isNull = true;
                        break 2; // Break out of both loops
                    }
                }
            }

            if ($isNull) {
                // echo "One or more cells are null.";
            } else {
                $startRow = 25;
                $endRow = 36;
                $column = 'K';
                // Initialize sum variable
                $sum = 0;
                // Loop through each row in the specified range
                for ($row = $startRow; $row <= $endRow; $row++) {
                    // Get cell value
                    $rate = $sheet->getCell($column . $row)->getValue();

                    // Add cell value to sum
                    $sum += $rate;
                }
                $total_avg = number_format($sum / 12);
                if ($total_avg > 74.4) {
                    $remarks = 'PASSED';
                } else {
                    $remarks = 'FAILED';
                }

                $sheet->setCellValue('K39', $total_avg);
                $sheet->setCellValue('L39', $remarks);
            }
        }

        //GRADE 8

        $sql1 = "SELECT * FROM tbl_grades g
                    INNER JOIN tbl_student_info si ON si.student_id = g.student_id
                    INNER JOIN tbl_subject s ON s.subject_name = g.subject
                    WHERE g.student_id = '$student_id' AND g.year_level = '2' AND s.order_id < 8 order by s.order_id asc";

        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result2 = $stmt1->get_result();
        if ($result2->num_rows == 7) {
            // Get result set
            $rowNumber = 51;
            //get average 11-1
            $totalAverage = 0;
            $count = 0;
            // Fetch data and assign to variables
            while ($row = $result2->fetch_assoc()) {
                //Grades for G7
                $sheet->setCellValue('K47', $row['adviser_name']);
                $sheet->setCellValue('H47', $row['school_year']);
                $sheet->setCellValue('F47', $row['section']);
                // Set cell values in the Excel sheet
                $sheet->setCellValue('G' . $rowNumber, number_format($row['1st_grading']));
                $sheet->setCellValue('H' . $rowNumber, number_format($row['2nd_grading']));
                $sheet->setCellValue('I' . $rowNumber, number_format($row['3rd_grading']));
                $sheet->setCellValue('J' . $rowNumber, number_format($row['4th_grading']));
                $sheet->setCellValue('K' . $rowNumber, number_format($row['final_grade']));
                $sheet->setCellValue('L' . $rowNumber, strtoupper($row['passed_failed']));
                // Increment row number for the next iteration
                $rowNumber++;

                // Add 'average' value to the total
                $totalAverage += $row['final_grade'];
                // Increment count
                $count++;
            }
            mysqli_free_result($result2);
            $sql = "SELECT * FROM tbl_grades g
                INNER JOIN tbl_student_info si ON si.student_id = g.student_id
                INNER JOIN tbl_subject s ON s.subject_name = g.subject
                WHERE g.student_id = '$student_id' AND g.year_level = '2' AND s.order_id > 7 order by s.order_id asc";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result3 = $stmt->get_result();
            if ($result3->num_rows == 4) {
                $rowNumber = 59;

                while ($row = $result3->fetch_assoc()) {
                    $sheet->setCellValue('G' . $rowNumber, number_format($row['1st_grading']));
                    $sheet->setCellValue('H' . $rowNumber, number_format($row['2nd_grading']));
                    $sheet->setCellValue('I' . $rowNumber, number_format($row['3rd_grading']));
                    $sheet->setCellValue('J' . $rowNumber, number_format($row['4th_grading']));
                    $sheet->setCellValue('K' . $rowNumber, number_format($row['final_grade']));
                    $sheet->setCellValue('L' . $rowNumber, strtoupper($row['passed_failed']));

                    $rowNumber++;
                }
                mysqli_free_result($result3);
                //compute MAPEH
                $m1 = $sheet->getCell('G59')->getValue();
                $a1 = $sheet->getCell('G60')->getValue();
                $pe1 = $sheet->getCell('G61')->getValue();
                $h1 = $sheet->getCell('G62')->getValue();
                $mapeh1 = number_format(($m1 + $a1 + $pe1 + $h1) / 4, 0);
                $sheet->setCellValue('G58', $mapeh1);

                $m2 = $sheet->getCell('H59')->getValue();
                $a2 = $sheet->getCell('H60')->getValue();
                $pe2 = $sheet->getCell('H61')->getValue();
                $h2 = $sheet->getCell('H62')->getValue();
                $mapeh2 = number_format(($m2 + $a2 + $pe2 + $h2) / 4, 0);
                $sheet->setCellValue('H58', $mapeh2);

                $m3 = $sheet->getCell('I59')->getValue();
                $a3 = $sheet->getCell('I60')->getValue();
                $pe3 = $sheet->getCell('I61')->getValue();
                $h3 = $sheet->getCell('I62')->getValue();
                $mapeh3 = number_format(($m3 + $a3 + $pe3 + $h3) / 4, 0);
                $sheet->setCellValue('I58', $mapeh3);

                $m4 = $sheet->getCell('J59')->getValue();
                $a4 = $sheet->getCell('J60')->getValue();
                $pe4 = $sheet->getCell('J61')->getValue();
                $h4 = $sheet->getCell('J62')->getValue();
                $mapeh4 = number_format(($m4 + $a4 + $pe4 + $h4) / 4, 0);
                $sheet->setCellValue('J58', $mapeh4);

                $mapeh5 = $sheet->getCell('G58')->getValue();
                $mapeh6 = $sheet->getCell('H58')->getValue();
                $mapeh7 = $sheet->getCell('I58')->getValue();
                $mapeh8 = $sheet->getCell('J58')->getValue();

                $mapeh_avg = number_format(($mapeh5 + $mapeh6 + $mapeh7 + $mapeh8) / 4);
                $sheet->setCellValue('K58', $mapeh_avg);


                if ($mapeh_avg > 74.4) {
                    $remarks1 = 'PASSED';
                } else {
                    $remarks1 = 'FAILED';
                }

                $sheet->setCellValue('L38', $remarks1);
            }


            // Set the range of rows and columns
            $startRow = 51;
            $endRow = 62;
            $startColumn = 'H';
            $endColumn = 'J';

            // Variable to store if any cell is null
            $isNull = false;

            // Iterate through the rows and columns
            for ($row = $startRow; $row <= $endRow; $row++) {
                for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                    $cellValue = $sheet->getCell(chr($col) . $row)->getValue();
                    if (is_null($cellValue)) {
                        $isNull = true;
                        break 2; // Break out of both loops
                    }
                }
            }

            if ($isNull) {
                // echo "One or more cells are null.";
            } else {
                $startRow = 51;
                $endRow = 62;
                $column = 'K';
                // Initialize sum variable
                $sum = 0;
                // Loop through each row in the specified range
                for ($row = $startRow; $row <= $endRow; $row++) {
                    // Get cell value
                    $rate = $sheet->getCell($column . $row)->getValue();

                    // Add cell value to sum
                    $sum += $rate;
                }
                $total_avg = number_format($sum / 12);
                if ($total_avg > 74.4) {
                    $remarks = 'PASSED';
                } else {
                    $remarks = 'FAILED';
                }
                $sheet->setCellValue('K65', $total_avg);
                $sheet->setCellValue('L65', $remarks);
            }
        }




        $sheet = $spreadsheet->getSheetByName('back');
        //GRADE 9

        $sql2 = "SELECT * FROM tbl_grades g
             INNER JOIN tbl_student_info si ON si.student_id = g.student_id
             INNER JOIN tbl_subject s ON s.subject_name = g.subject
             WHERE g.student_id = '$student_id' AND g.year_level = '3' AND s.order_id < 8 order by s.order_id asc";

        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result3 = $stmt2->get_result();
        if ($result3->num_rows == 7) {
            // Get result set

            $rowNumber = 8;
            //get average 11-1
            $totalAverage = 0;
            $count = 0;
            // Fetch data and assign to variables
            while ($row = $result3->fetch_assoc()) {
                //Grades for G7
                $sheet->setCellValue('J4', $row['adviser_name']);
                $sheet->setCellValue('G4', $row['school_year']);
                $sheet->setCellValue('E4', $row['section']);
                // Set cell values in the Excel sheet
                $sheet->setCellValue('F' . $rowNumber, number_format($row['1st_grading']));
                $sheet->setCellValue('G' . $rowNumber, number_format($row['2nd_grading']));
                $sheet->setCellValue('H' . $rowNumber, number_format($row['3rd_grading']));
                $sheet->setCellValue('I' . $rowNumber, number_format($row['4th_grading']));
                $sheet->setCellValue('J' . $rowNumber, number_format($row['final_grade']));
                $sheet->setCellValue('K' . $rowNumber, strtoupper($row['passed_failed']));
                // Increment row number for the next iteration
                $rowNumber++;

                // Add 'average' value to the total
                $totalAverage += $row['final_grade'];
                // Increment count
                $count++;
            }

            $sql = "SELECT * FROM tbl_grades g
         INNER JOIN tbl_student_info si ON si.student_id = g.student_id
         INNER JOIN tbl_subject s ON s.subject_name = g.subject
         WHERE g.student_id = '$student_id' AND g.year_level = '2' AND s.order_id > 7 order by s.order_id asc";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result4 = $stmt->get_result();
            if ($result4->num_rows == 4) {
                $rowNumber = 16;

                while ($row = $result4->fetch_assoc()) {
                    $sheet->setCellValue('F' . $rowNumber, number_format($row['1st_grading']));
                    $sheet->setCellValue('G' . $rowNumber, number_format($row['2nd_grading']));
                    $sheet->setCellValue('H' . $rowNumber, number_format($row['3rd_grading']));
                    $sheet->setCellValue('I' . $rowNumber, number_format($row['4th_grading']));
                    $sheet->setCellValue('J' . $rowNumber, number_format($row['final_grade']));
                    $sheet->setCellValue('K' . $rowNumber, strtoupper($row['passed_failed']));

                    $rowNumber++;
                }
                mysqli_free_result($result4);
                //compute MAPEH
                $m1 = $sheet->getCell('F16')->getValue();
                $a1 = $sheet->getCell('F17')->getValue();
                $pe1 = $sheet->getCell('F18')->getValue();
                $h1 = $sheet->getCell('F19')->getValue();
                $mapeh1 = number_format(($m1 + $a1 + $pe1 + $h1) / 4, 0);
                $sheet->setCellValue('F15', $mapeh1);

                $m2 = $sheet->getCell('G16')->getValue();
                $a2 = $sheet->getCell('G17')->getValue();
                $pe2 = $sheet->getCell('G18')->getValue();
                $h2 = $sheet->getCell('G19')->getValue();
                $mapeh2 = number_format(($m2 + $a2 + $pe2 + $h2) / 4, 0);
                $sheet->setCellValue('G15', $mapeh2);

                $m3 = $sheet->getCell('H16')->getValue();
                $a3 = $sheet->getCell('H17')->getValue();
                $pe3 = $sheet->getCell('H18')->getValue();
                $h3 = $sheet->getCell('H19')->getValue();
                $mapeh3 = number_format(($m3 + $a3 + $pe3 + $h3) / 4, 0);
                $sheet->setCellValue('H15', $mapeh3);

                $m4 = $sheet->getCell('I16')->getValue();
                $a4 = $sheet->getCell('I17')->getValue();
                $pe4 = $sheet->getCell('I18')->getValue();
                $h4 = $sheet->getCell('I19')->getValue();
                $mapeh4 = number_format(($m4 + $a4 + $pe4 + $h4) / 4, 0);
                $sheet->setCellValue('I15', $mapeh4);

                $mapeh5 = $sheet->getCell('F15')->getValue();
                $mapeh6 = $sheet->getCell('G15')->getValue();
                $mapeh7 = $sheet->getCell('H15')->getValue();
                $mapeh8 = $sheet->getCell('I15')->getValue();

                $mapeh_avg = number_format(($mapeh5 + $mapeh6 + $mapeh7 + $mapeh8) / 4);
                $sheet->setCellValue('J15', $mapeh_avg);


                if ($mapeh_avg > 74.4) {
                    $remarks1 = 'PASSED';
                } else {
                    $remarks1 = 'FAILED';
                }

                $sheet->setCellValue('K15', $remarks1);
            }


            // Set the range of rows and columns
            $startRow = 8;
            $endRow = 19;
            $startColumn = 'G';
            $endColumn = 'I';

            // Variable to store if any cell is null
            $isNull = false;

            // Iterate through the rows and columns
            for ($row = $startRow; $row <= $endRow; $row++) {
                for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                    $cellValue = $sheet->getCell(chr($col) . $row)->getValue();
                    if (is_null($cellValue)) {
                        $isNull = true;
                        break 2; // Break out of both loops
                    }
                }
            }

            if ($isNull) {
                // echo "One or more cells are null.";
            } else {
                $startRow = 8;
                $endRow = 19;
                $column = 'J';
                // Initialize sum variable
                $sum = 0;
                // Loop through each row in the specified range
                for ($row = $startRow; $row <= $endRow; $row++) {
                    // Get cell value
                    $rate = $sheet->getCell($column . $row)->getValue();

                    // Add cell value to sum
                    $sum += $rate;
                }
                $total_avg = number_format($sum / 12);
                if ($total_avg > 74.4) {
                    $remarks = 'PASSED';
                } else {
                    $remarks = 'FAILED';
                }
                $sheet->setCellValue('J21', $total_avg);
                $sheet->setCellValue('K21', $remarks);
            }
        }



        //GRADE 10

        $sql1 = "SELECT * FROM tbl_grades g
             INNER JOIN tbl_student_info si ON si.student_id = g.student_id
             INNER JOIN tbl_subject s ON s.subject_name = g.subject
             WHERE g.student_id = '$student_id' AND g.year_level = '4' AND s.order_id < 8 order by s.order_id asc";

        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result5 = $stmt1->get_result();
        if ($result5->num_rows == 7) {
            // Get result set

            $rowNumber = 32;
            //get average 11-1
            $totalAverage = 0;
            $count = 0;
            // Fetch data and assign to variables
            while ($row = $result5->fetch_assoc()) {
                //Grades for G7
                $sheet->setCellValue('J29', $row['adviser_name']);
                $sheet->setCellValue('G29', $row['school_year']);
                $sheet->setCellValue('E29', $row['section']);
                // Set cell values in the Excel sheet
                $sheet->setCellValue('F' . $rowNumber, number_format($row['1st_grading']));
                $sheet->setCellValue('G' . $rowNumber, number_format($row['2nd_grading']));
                $sheet->setCellValue('H' . $rowNumber, number_format($row['3rd_grading']));
                $sheet->setCellValue('I' . $rowNumber, number_format($row['4th_grading']));
                $sheet->setCellValue('J' . $rowNumber, number_format($row['final_grade']));
                $sheet->setCellValue('K' . $rowNumber, strtoupper($row['passed_failed']));
                // Increment row number for the next iteration
                $rowNumber++;

                // Add 'average' value to the total
                $totalAverage += $row['final_grade'];
                // Increment count
                $count++;
            }

            $sql = "SELECT * FROM tbl_grades g
         INNER JOIN tbl_student_info si ON si.student_id = g.student_id
         INNER JOIN tbl_subject s ON s.subject_name = g.subject
         WHERE g.student_id = '$student_id' AND g.year_level = '2' AND s.order_id > 7 order by s.order_id asc";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Get result set
            $result6 = $stmt->get_result();
            if ($result6->num_rows == 4) {
                $rowNumber = 40;

                while ($row = $result6->fetch_assoc()) {
                    $sheet->setCellValue('F' . $rowNumber, number_format($row['1st_grading']));
                    $sheet->setCellValue('G' . $rowNumber, number_format($row['2nd_grading']));
                    $sheet->setCellValue('H' . $rowNumber, number_format($row['3rd_grading']));
                    $sheet->setCellValue('I' . $rowNumber, number_format($row['4th_grading']));
                    $sheet->setCellValue('J' . $rowNumber, number_format($row['final_grade']));
                    $sheet->setCellValue('K' . $rowNumber, strtoupper($row['passed_failed']));

                    $rowNumber++;
                }
                mysqli_free_result($result6);
                //compute MAPEH
                $m1 = $sheet->getCell('F40')->getValue();
                $a1 = $sheet->getCell('F41')->getValue();
                $pe1 = $sheet->getCell('F42')->getValue();
                $h1 = $sheet->getCell('F43')->getValue();
                $mapeh1 = number_format(($m1 + $a1 + $pe1 + $h1) / 4, 0);
                $sheet->setCellValue('F39', $mapeh1);

                $m2 = $sheet->getCell('G40')->getValue();
                $a2 = $sheet->getCell('G41')->getValue();
                $pe2 = $sheet->getCell('G42')->getValue();
                $h2 = $sheet->getCell('G43')->getValue();
                $mapeh2 = number_format(($m2 + $a2 + $pe2 + $h2) / 4, 0);
                $sheet->setCellValue('G39', $mapeh2);

                $m3 = $sheet->getCell('H40')->getValue();
                $a3 = $sheet->getCell('H41')->getValue();
                $pe3 = $sheet->getCell('H42')->getValue();
                $h3 = $sheet->getCell('H43')->getValue();
                $mapeh3 = number_format(($m3 + $a3 + $pe3 + $h3) / 4, 0);
                $sheet->setCellValue('H39', $mapeh3);

                $m4 = $sheet->getCell('I40')->getValue();
                $a4 = $sheet->getCell('I41')->getValue();
                $pe4 = $sheet->getCell('I42')->getValue();
                $h4 = $sheet->getCell('I43')->getValue();
                $mapeh4 = number_format(($m4 + $a4 + $pe4 + $h4) / 4, 0);
                $sheet->setCellValue('I39', $mapeh4);

                $mapeh5 = $sheet->getCell('F39')->getValue();
                $mapeh6 = $sheet->getCell('G39')->getValue();
                $mapeh7 = $sheet->getCell('H39')->getValue();
                $mapeh8 = $sheet->getCell('I39')->getValue();

                $mapeh_avg = number_format(($mapeh5 + $mapeh6 + $mapeh7 + $mapeh8) / 4);
                $sheet->setCellValue('J39', $mapeh_avg);

                // Execute the query
                $result_f = mysqli_query($connection, $sql);

                if ($mapeh_avg > 74.4) {
                    $remarks1 = 'PASSED';
                } else {
                    $remarks1 = 'FAILED';
                }

                $sheet->setCellValue('K39', $remarks1);
            }

            // Set the range of rows and columns
            $startRow = 32;
            $endRow = 43;
            $startColumn = 'G';
            $endColumn = 'I';

            // Variable to store if any cell is null
            $isNull = false;

            // Iterate through the rows and columns
            for ($row = $startRow; $row <= $endRow; $row++) {
                for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                    $cellValue = $sheet->getCell(chr($col) . $row)->getValue();
                    if (is_null($cellValue)) {
                        $isNull = true;
                        break 2; // Break out of both loops
                    }
                }
            }

            if ($isNull) {
                // echo "One or more cells are null.";
            } else {
                $startRow = 32;
                $endRow = 43;
                $column = 'J';
                // Initialize sum variable
                $sum = 0;
                // Loop through each row in the specified range
                for ($row = $startRow; $row <= $endRow; $row++) {
                    // Get cell value
                    $rate = $sheet->getCell($column . $row)->getValue();

                    // Add cell value to sum
                    $sum += $rate;
                }
                $total_avg = number_format($sum / 12);
                if ($total_avg > 74.4) {
                    $remarks = 'PASSED';
                } else {
                    $remarks = 'FAILED';
                }
                $sheet->setCellValue('J46', $total_avg);
                $sheet->setCellValue('K46', $remarks);
            }
        }

        $outputFolder = '../uploads/';
        $fname = $lrn_no . '_' . $lastname . '_' . $firstname . '_' . 'SHF10-JHS.xlsx';
        $file_name = $outputFolder . $fname;

        // // Set headers
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename="' . $file_name . '"');
        // header('Cache-Control: max-age=0');

        // Save the modified Excel file
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_name);
        // $writer->save('php://output');
        // echo $file_name;

        // Check if record exists
        $save = "SELECT COUNT(*) AS count FROM tbl_docs WHERE file_name = '$fname'";
        $r = mysqli_query($conn, $save);
        $row = mysqli_fetch_assoc($r);
        $count1 = $row['count'];

        if ($count1 > 0) {
            // Update record if it exists
            // $sql = "UPDATE tbl_docs SET column1 = '$value1', column2 = '$value2' WHERE condition";
        } else {
            // Insert record if it does not exist
            $sql = "INSERT INTO tbl_docs (lrn_no, file_type, file_name) VALUES ('$lrn_no', 'SF 10-JHS' ,'$fname')";
            $SAVED = mysqli_query($conn, $sql);
        }

        $_SESSION['sf10jhs_su'] = 'available';

        if (isset($_SESSION['lrn_no'])) {
            header("Location: ../../dashboard.php?page=report_of_grades");
        } else {
             header("Location: ../dashboard.php?page=record");
        }

        // } else {
        //     $_SESSION['xsf10'] = 'Not available';
        //     if ($_SESSION['lrn_no'] == '') {
        //         header("Location: ../dashboard.php?page=record");
        //     } else {
        //         header("Location: ../../dashboard.php?page=report_of_grades");
        //     }
        // }
    }
} else {
    $_SESSION['xsf10'] = 'Not available';
    if (isset($_SESSION['lrn_no'])) {
        header("Location: ../../dashboard.php?page=report_of_grades");
    } else {
         header("Location: ../dashboard.php?page=record");
    }
}
