<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <label for="" class="form-label">Grade Level</label>
        <select class="form-control form-select" name="select_grade_level" id="select_grade_level">
            <option selected disabled hidden>Grade 7</option>
            <?php
            $result = $conn->query("SELECT * FROM tbl_year_level");
            while ($row = $result->fetch_array()) {
            ?>
                <option value="<?php echo $row['year_level_id'] ?>">
                    <?php echo $row['year_level'] ?>
                </option>
            <?php
            }
            ?>
        </select>
    </ol>
    <!-- Show below code if want each student to generate their own sf10-->
    <!-- <ol class="">
        <a type="button" id="sf-btn" class="btn btn-primary"><i class="fa-regular fa-file"></i> SF-10</a>
    </ol> -->
</nav>
<hr />
<?php

$query = $conn->query("SELECT * FROM `tbl_student_info` WHERE student_id = '" . $_SESSION['student_id'] . "'");
$row = $query->fetch_array();
if ($query) {
    $firstname = ucwords($row['firstname']);
    $middlename = ucwords($row['middlename']);
    $lastname = ucwords($row['lastname']);
    $year_level = $row['year_level'];
    $section = $row['section'];
    $id = $row['student_id'];


    // if ($year_level == 1) {
    //     $grade_level = "Grade 7";
    // } else if ($year_level == 2) {
    //     $grade_level = "Grade 8";
    // } else if ($year_level == 3) {
    //     $grade_level = "Grade 9";
    // } else if ($year_level == 4) {
    //     $grade_level = "Grade 10";
    // } else if ($year_level == 5) {
    //     $grade_level = "Grade 11";
    // } else {
    //     $grade_level = "Grade 12";
    // }
}

?>
<h1>
    <?php echo $lastname . ", " . $firstname . " " . $middlename ?>
</h1>

<div class="container">
    <?php
    $query = $conn->query("SELECT * FROM `tbl_grades` WHERE student_id = '$id'");
    $row = $query->fetch_array();
    if ($row['year_level'] == 1) {
        $grade_level = "Grade 7";
    } else if ($row['year_level'] == 2) {
        $grade_level = "Grade 8";
    } else if ($row['year_level'] == 3) {
        $grade_level = "Grade 9";
    } else if ($row['year_level'] == 4) {
        $grade_level = "Grade 10";
    } else if ($row['year_level'] == 5) {
        $grade_level = "Grade 11";
    } else if ($row['year_level'] == 6) {
        $grade_level = "Grade 12";
    }
    ?>
    <h4>
        <?php echo $grade_level . ", " . $row['section'] ?>
    </h4>
    <table class="table table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th>Subject</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>Final</th>
                <th>Unit</th>
                <th>Action Taken</th>
            </tr>

        </thead>
        <tbody>
            <?php

            foreach ($query as $row) {
            ?>
                <tr>
                    <td>
                        <?= $row['subject'] ?>
                    </td>
                    <td>
                        <?= $row['1st_grading'] ?>
                    </td>
                    <td>
                        <?= $row['2nd_grading'] ?>
                    </td>
                    <td>
                        <?= $row['3rd_grading'] ?>
                    </td>
                    <td>
                        <?= $row['4th_grading'] ?>
                    </td>
                    <td>
                        <?= ($row['final_grade'] !== '') ? number_format($row['final_grade']) : '' ?>
                    </td>
                    <td>
                        <?= $row['unit'] ?>
                    </td>
                    <td>
                        <?= strtoupper($row['passed_failed']) ?>
                    </td>
                </tr>
            <?php
            }

            ?>


        </tbody>
    </table>
</div>