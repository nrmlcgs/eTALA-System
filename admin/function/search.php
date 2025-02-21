<?php
include '../include/db_connection.php';
include '../include/auth.php';

// Get the search query
$query = $_GET['query'];

// Query the database
$sql = "SELECT * FROM tbl_student_info WHERE lrn_no LIKE '%$query%'";
$result = $conn->query($sql);

// Display results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row['lrn_no'] . "</p>";
    }
} else {
    echo "No results found";
}

?>