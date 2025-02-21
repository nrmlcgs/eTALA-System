<?php
// Include your database connection file
include('../include/db_connection.php');

if (isset($_POST['updateRecord'])) {
    // Process the form submission for updating the record

    // Retrieve values from the form
    $update_subject = $_POST['update_subject'];
    $update_1st_grading = $_POST['update_1st_grading'];
    $update_2nd_grading = $_POST['update_2nd_grading'];
    $update_3rd_grading = $_POST['update_3rd_grading'];
    $update_4th_grading = $_POST['update_4th_grading'];
    $update_grade_id = $_POST['update_grade_id'];
    // ... add other fields as needed ...

    // Perform the update query
    $updateQuery = $conn->prepare("UPDATE `tbl_grades` SET subject = ?, 1st_grading = ?, 2nd_grading = ?, 3rd_grading = ?, 4th_grading = ? WHERE grade_id = ?");
    $updateQuery->bind_param("sssssi", $update_subject, $update_1st_grading, $update_2nd_grading, $update_3rd_grading, $update_4th_grading, $update_grade_id);

    if ($updateQuery->execute()) {
        // Update successful
        echo "Record updated successfully!";
    } else {
        // Update failed
        echo "Error updating record: " . $updateQuery->error;
    }

    $updateQuery->close();
}

// Fetch the student and grade data for pre-filling the form
if (isset($_GET['student_id']) && isset($_GET['grade_id'])) {
    $student_id = $_GET['student_id'];
    $grade_id = $_GET['grade_id'];

    // Fetch past data based on student_id and grade_id
    $gradeQuery = $conn->query("SELECT * FROM `tbl_grades` WHERE student_id = '$student_id' AND grade_id = '$grade_id'");

    if ($gradeQuery) {
        $gradeData = $gradeQuery->fetch_assoc();

        // Now, $gradeData contains the past data for the specified grade_id
        // You can use $gradeData to pre-fill your update form
        $subject = $gradeData['subject'];
        $firstGrading = $gradeData['1st_grading'];
        $secondGrading = $gradeData['2nd_grading'];
        $thirdGrading = $gradeData['3rd_grading'];
        $fourthGrading = $gradeData['4th_grading'];
        // ... add other fields as needed ...
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <!-- Add your CSS stylesheets, if any -->
</head>

<body>
    <h1>Update Record</h1>

    <form method="post" action="">
        <input type="hidden" name="update_grade_id" value="<?php echo $grade_id; ?>">
        <label for="update_subject">Subject:</label>
        <input type="text" name="update_subject" value="<?php echo $subject; ?>" required><br>

        <label for="update_1st_grading">1st Grading:</label>
        <input type="text" name="update_1st_grading" value="<?php echo $firstGrading; ?>" required><br>

        <label for="update_2nd_grading">2nd Grading:</label>
        <input type="text" name="update_2nd_grading" value="<?php echo $secondGrading; ?>" required><br>

        <label for="update_3rd_grading">3rd Grading:</label>
        <input type="text" name="update_3rd_grading" value="<?php echo $thirdGrading; ?>" required><br>

        <label for="update_4th_grading">4th Grading:</label>
        <input type="text" name="update_4th_grading" value="<?php echo $fourthGrading; ?>" required><br>

        <!-- Add other fields as needed... -->

        <button type="submit" name="updateRecord">Update Record</button>
    </form>
</body>

</html>
