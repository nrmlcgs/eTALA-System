<?php
session_start();
// ob_start();
include '../include/db_connection.php';
include '../include/auth.php';


if (isset($_GET["view-sy"])) {
    $id = $_GET["view-sy"];

    $sqlx = "SELECT * FROM tbl_school_year WHERE sy_id = '$id'";
    // Initialize an associative array to store the fetched data
    $result = $conn->query($sqlx);
    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();
        $sy_id = $row['sy_id'];
        $school_year = $row['school_year'];
    } 

}
?>
<div class="row">
<div class="col">
    <div class="row mb-3">
        <div class="col-sm-3">
            <p class="text-end"><b>School Year:</b></p>
        </div>

        <div class="col">
            <input type="hidden" id="sy_id" name="update_sy_id" value="<?php echo $sy_id; ?>" class="form-control">
            <input required type="text" id="sy" name="update_sy" value="<?php echo $school_year; ?>" class="form-control">
        </div>
    </div>
</div>
</div>