<?php
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $query = $conn->query("SELECT * FROM `tbl_student_info` WHERE student_id = '$id'");
    $row = $query->fetch_array();
    if ($query) {
        $_SESSION['student_id'] = $id;
        $firstname = ucwords($row['firstname']);
        $middlename = ucwords($row['middlename']);
        $lastname = ucwords($row['lastname']);
        $year_level = $row['year_level'];
        $section = trim($row['section']);
        $school_year = $row['school_year'];

        if ($year_level == 1) {
            $grade_level = "Grade 7";
        } else if ($year_level == 2) {
            $grade_level = "Grade 8";
        } else if ($year_level == 3) {
            $grade_level = "Grade 9";
        } else if ($year_level == 4) {
            $grade_level = "Grade 10";
        } else if ($year_level == 5) {
            $grade_level = "Grade 11";
        } else {
            $grade_level = "Grade 12";
        }
    }
}

?>
<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Academic Records</li>
    </ol>
    <ol class="breadcrumb">
        <!-- <a type="button" class="btn btn-primary"><i class="fa-regular fa-file"></i> SF-10</a> -->
        <div class="add-student">
            <a class="btn btn-primary" href="dashboard.php?page=add_record&student_id=<?php echo $id ?>"><i class="fa fa-plus"></i>
                Add Record</a>
        </div>
    </ol>
</nav>
<hr />
<div class="d-flex justify-content-between">
    <div class="detils m-2">
        <h1>
            <?php echo $lastname . ", " . $firstname . " " . $middlename ?>
        </h1>
        <h4 id="grade_section">
            <?php echo $grade_level . ", " . $section ?>
        </h4>
    </div>
    <div class="ml-auto p-2">
        <!-- <form> -->
        <input class="form-control" value="<?php echo $id ?>" id="student_idx" name="student_idx" type="hidden" readonly>
        <input class="form-control" value="<?php echo $year_level ?>" id="year_x" name="year_x" type="hidden" readonly>
        <select name="select_sy" id="select_sy" class="form-control form-select" required>
            <option selected><?php echo $school_year ?></option>
            <?php
            $result = $conn->query("SELECT * FROM tbl_school_year order by 2 desc");
            while ($row = $result->fetch_array()) {
            ?>
                <option>
                    <?= $row['school_year']; ?>
                </option>
            <?php
            }
            ?>
        </select>
        <!-- <form> -->
    </div>
</div>
</div>

<div class="container" style="<?php if ($year_level > 4) {
                            echo 'display:none';
                        } ?>; margin-top:50px;">

    <div class="container">

        <table id="tableBody" class="table table-bordered" style="width:90%;">
            <thead>
                <tr>
                    <th style="width:40%;">Subject</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>Final</th>
                    <th>Unit</th>
                    <th>Action Taken</th>
                </tr>
            </thead>
            <tbody id="">
                <?php
                $query = $conn->query("SELECT * FROM `tbl_grades` WHERE student_id = '$id' AND school_year = '$school_year'");
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
                            <?= $row['final_grade'] ?>
                        </td>
                        <td>
                            <?= $row['unit'] ?>
                        </td>
                        <td>
                            <?= $row['passed_failed'] ?>
                        </td>

                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
    </div>
</div>

<div class="container" <?php if ($year_level < 5) {
                            echo 'style="display:none;';
                        } ?>>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-auto">
                <select class="form-select w-auto" id="selector_sem" style="margin:5px 0px;">
                    <option selected value="1">1st Sem</option>
                    <option value="2">2nd Sem</option>
                </select>
            </div>
        </div>
        <table id="tableBody1" class="table table-bordered" style="width:100%; font-size:14px;">
            <thead>
                <tr>
                    <th style="width:40%;">Subject</th>
                    <th>1</th>
                    <th>2</th>
                    <th>Sem Average</th>
                    <th>Action Taken</th>
                </tr>
            </thead>
            <tbody id="">
                <?php
                // AND sem_id >= '1'
                $query = $conn->query("SELECT * FROM `tbl_shs` WHERE student_id = '$id' AND section = '$section' AND year_level = '$year_level' AND sem_id = '1'");

                foreach ($query as $row) {
                ?>
                    <tr>
                        <td>
                            <?= $row['subject'] ?>
                        </td>
                        <td>
                            <?= $row['first'] ?>
                        </td>
                        <td>
                            <?= $row['second'] ?>
                        </td>
                        <td>
                            <?= number_format($row['average'], 0) ?>
                        </td>
                        <td>
                            <?= $row['sem_action'] ?>
                        </td>

                    </tr>
                <?php
                }

                ?>
            </tbody>

        </table>
    </div>
</div>