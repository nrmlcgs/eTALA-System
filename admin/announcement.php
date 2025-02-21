<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Announcement</li>
    </ol>
    <div class="add-student">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-announcement-modal"><i class="fa fa-plus"></i>
            Create Announcement</button>
    </div>
</nav>
<hr />
<?php
// SQL query to fetch announcements
$sql = "SELECT * FROM tbl_announcement order by 3 asc";
$result = $conn->query($sql);

// Loop through query results and generate card for each announcement
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo '<div class="card_announcement">';
        echo '<h2><b>' . strtoupper($row["title"]) . '</b></h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<div class="details1">';
        echo '<span>Started Date: ' . date("d-M-Y g:i A", strtotime($row["date_time_from"])) . '</span>';
        echo '<span>End Date: ' . date("d-M-Y g:i A", strtotime($row["date_time_to"])) . '</span>';
        echo '</div>';
        echo '<div class="details">';
        echo '<button class="btn btn-sm btn-primary edit-announcement-btn" value=' . $row["announcement_id"] . '><i
    class="fa fa-edit"></i> Edit</button>';
    echo '<a class="btn btn-sm btn-danger delete-announcement-btn"
    onclick="return confirm(\'Are you sure you want to delete?\')"
    href="action.php?delete-announcement=' . $row['announcement_id'] .'"><i class="fa fa-trash"></i></a>';
        echo '</div>';

        echo '</div>';
    }
} else {
    echo "No announcement";
}

?>