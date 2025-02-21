<?php
session_start();
ob_start();
include '../include/db_connection.php';
include '../include/auth.php';

//select sub /sem for grade 11 above
if (isset($_POST['selected_sem']) && isset($_POST['selected_sub']) && isset($_POST['selected_sy']) && isset($_POST['id'])) {
    $selected_sub = $_POST['selected_sub'];
    $selected_sy = $_POST['selected_sy'];
    $selected_sem = $_POST['selected_sem'];
    $id = $_POST['id'];
    // Perform query to fetch data based on selected category_id and type
    $sql = "SELECT * FROM tbl_shs WHERE subject = '$selected_sub' 
            AND school_year = '$selected_sy' AND student_id = '$id' AND sem_id = '$selected_sem'";
    $result = $conn->query($sql);

    // Initialize an associative array to store the fetched data
    $data = array();

    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();

        // Store the data in the associative array
        $data['first'] = $row['first'];
        $data['sec'] = $row['second'];
        $data['final'] = $row['average'];
        $data['adviser'] = $row['adviser_name'];
        $data['action'] = $row['sem_action'];
    } else {
        // $data['first'] = "no rc";
    }
    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Return an error message if not set
    echo json_encode(array('error' => 'Not set'));
}

if (isset($_GET['selected_sy1']) && isset($_GET['id1'])) {

    $selected_sy1 = $_GET['selected_sy1'];
    $id1 = $_GET['id1'];

    if (isset($_GET['selectedTable'])) {
        $sem_val = $_GET['selectedTable'];
    } else {
        $sem_val = '1';
    }

    $sem = $sem_val;

    $sql = "SELECT * FROM tbl_grades WHERE school_year = '$selected_sy1' and student_id = '$id1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<thead>";
        echo "<tr>";
        echo "<th>Subject</th>";
        echo "<th>1</th>";
        echo "<th>2</th>";
        echo "<th>3</th>";
        echo "<th>4</th>";
        echo "<th>Final</th>";
        echo "<th>Unit</th>";
        echo "<th>Pass or Failed</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $row) {

            echo "<tr>";
            echo "<td>{$row['subject']}</td>";
            echo "<td>{$row['1st_grading']}</td>";
            echo "<td>{$row['2nd_grading']}</td>";
            echo "<td>{$row['3rd_grading']}</td>";
            echo "<td>{$row['4th_grading']}</td>";
            echo "<td>{$row['final_grade']}</td>";
            echo "<td>{$row['unit']}</td>";
            echo "<td>{$row['passed_failed']}</td>";
            // Add more columns if needed

        }
        echo "</tbody>";
    } else {
        $sql1 = "SELECT * FROM tbl_shs WHERE school_year = '$selected_sy1' and student_id = '$id1' and sem_id = '$sem'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            echo "<thead>";
            echo "<tr>";
            echo "<th>Subject</th>";
            echo "<th>1</th>";
            echo "<th>2</th>";
            echo "<th>Sem Average</th>";
            echo "<th>Action Taken</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($result1 as $row) {
                echo "<tr>";
                echo "<td>{$row['subject']}</td>";
                echo "<td>{$row['first']}</td>";
                echo "<td>{$row['second']}</td>";
                echo "<td>{$row['average']}</td>";
                echo "<td>{$row['sem_action']}</td>";
                // Add more columns if needed
                echo "</tr>";
            }
            echo "<tbody>";
        } else {
            echo "<tr><td>No data found.</td></tr>";
        }
    }
}

// =========================================================================================================================


if (isset($_POST["u_yl"]) && isset($_POST["u_yl"]) != '') {
    $req = $_POST["u_yl"];

    $sql = "SELECT * FROM tbl_section WHERE year_level_id = '$req'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
        <select name="update_section" class="form-control form-select">
            <?php
            foreach ($result as $row) {
            ?>
                <option selected value=" <?php echo $row['section_name']; ?>">
                    <?php echo $row['section_name']; ?>
                </option>
            <?php
            }
            ?>
        </select>

<?php
    } else {
        echo "Error: " . $conn->error;
    }
}
if (isset($_POST["edit_announcement"])) {
    //  header("Location: dashboard.php?page=announcement");
    $announcement_id = $_POST["announcement_id"];
    $title = $_POST["title"];
    //modified by kent
    $date_and_time_to = $_POST["edit_date_and_time_to"];
    $date_and_time_from = $_POST["edit_date_and_time_from"];
    $description = $_POST["announcement_description"];

    $result = $conn->query("UPDATE tbl_announcement SET title='$title', date_time_from='$date_and_time_from', 
                            date_time_to= '$date_and_time_to', description='$description' WHERE `announcement_id`='$announcement_id'");
   
    if ($result) {
        $_SESSION['y_announcement_updated'] = 'Announcement Updated';
        header("Location: dashboard.php?page=announcement");
        echo $result;
    } else {
        $_SESSION['n_announcement_updated'] = "Announcement failed to update";
        header("Location: dashboard.php?page=announcement");
    }
}
