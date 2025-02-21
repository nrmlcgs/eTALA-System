<?php
// Get the current date
$currentDateTime = date("Y-m-d H:i:s");

// SQL query to select records with date less than the current date
$sql = "SELECT announcement_id FROM tbl_announcement WHERE date_time_to < '$currentDateTime'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the results and delete each record
    while ($row = $result->fetch_assoc()) {
        $id = $row["announcement_id"];
        $deleteSql = "DELETE FROM tbl_announcement WHERE announcement_id = $id";
        if ($conn->query($deleteSql) === TRUE) {
        }
    }
}
?>