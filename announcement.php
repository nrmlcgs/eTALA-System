<nav class="mb-5">
    <h3 class="announcement"><i class="fa fa-bullhorn"></i> Announcement!</h3>
</nav>
<?php
// SQL query to fetch announcements
$sql = "SELECT * FROM tbl_announcement order by 3 asc";
$result = $conn->query($sql);

// Loop through query results and generate card for each announcement
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    
    echo '<div class="card_announcement">';
    echo '<h2><b>' . strtoupper($row["title"]) . '</b></h2>';
    echo '<p>' . $row["description"] . '</p>';
    echo '<div class="details">';
    echo '<span>Started Date: ' . date("d-M-Y g:i A", strtotime($row["date_time_from"])) . '</span>';
    echo '<span>End Date: ' . date("d-M-Y g:i A", strtotime($row["date_time_to"])) . '</span>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo "No announcement";
}

?>