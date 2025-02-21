<?php
session_start();
// ob_start();
include '../include/db_connection.php';
include '../include/auth.php';

if (isset($_GET['viewannouncementid'])) {
    $announcement_id = $_GET['viewannouncementid']; // Should be $_GET, not $_POST

    $sqlx = "SELECT * FROM tbl_announcement WHERE announcement_id = '$announcement_id'";
    // Initialize an associative array to store the fetched data
    $resultx = $conn->query($sqlx);
    if ($resultx->num_rows > 0) {
        // Fetch the first row
        $row = $resultx->fetch_assoc();
        $id = $row['announcement_id'];
        $title = $row['title'];
        $date_time_from = $row['date_time_from'];
        $date_time_to = $row['date_time_to'];
        $description = $row['description'];
    } else {
    }
} 
?>
    <div class="row">
        <div class="col p-2">
            <p class="text"><b>Title:</b></p>
        </div>

        <div class="container" style="width:80%;">
            <input required type="hidden" name="announcement_id" id="announcement_id" value="<?php echo $id ?>" class="form-control">
            <input required type="text" name="title" id="announcement_title" value="<?php echo $title ?>" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col p-2" style="font-size:10px;">
            <p class="text"><b>Date/Time from:</b></p>
        </div>

        <div class="container" style="width:80%;">
            <input type="datetime-local" name="edit_date_and_time_from" value="<?php echo $date_time_from ?>" id="edit_date_and_time_from" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col p-2" style="font-size:10px;">
            <p class="text"><b>Date/Time to:</b></p>
        </div>

        <div class="container" style="width:80%;">
            <input type="datetime-local" name="edit_date_and_time_to" value="<?php echo $date_time_to ?>" id="edit_date_and_time_to" class="form-control">
        </div>
        <div class="col" style="margin-right:auto;">
        <input type="checkbox" id="allDayCheckbox_update">
        <label for="allDayCheckbox">All Day</label>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <p class="text" tyle="font-size:14px;"><b>Description:</b></p>
        </div>

        <div class="container" style="width:100%;">
            <textarea class="form-control" name="announcement_description" id="announcement_description" rows="3"><?php echo $description ?></textarea>
        </div>

    </div>
