<?php
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $query = $conn->query("SELECT * FROM `tbl_student_info` WHERE student_id = '$id'");
    $row = $query->fetch_array();
    if ($query) {
        $firstname = ucwords($row['firstname']);
        $middlename = ucwords($row['middlename']);
        $lastname = ucwords($row['lastname']);
        $year_level = $row['year_level'];
        $section = $row['section'];
        $school_year = $row['school_year'];
        $lrn_no = $row['lrn_no'];
        // Ensure "subject" is selected in your query
        $subject = isset($row['subject']) ? $row['subject'] : ''; // Set default value if "subject" is not present
    }
}
?>

<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modify Record</li>
    </ol>
    <ol class="breadcrumb">
        <select name="current_sy" id="current_sy" class="form-control form-select" required>
            <option selected><?php echo $school_year ?></option>
            <?php
            $result = $conn->query("SELECT * FROM tbl_school_year order by school_year asc");
            while ($row = $result->fetch_array()) {
            ?>
                <option>
                    <?= $row['school_year']; ?>
                </option>
            <?php
            }


            ?>
        </select>
    </ol>
</nav>
<hr />
<h1 class="text-center">
    <?php echo $lastname . ", " . $firstname . " " . $middlename . "" . $subject ?>
</h1>
<div class="container" <?php if ($year_level > 4) {
                            echo 'style="display:none;';
                        } ?>>
    <form action="#" method="post" id="gradeForm">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control" value="<?php echo $year_level ?>" id="year_level" name="year_level" type="hidden" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control" value="<?php echo $section ?>" id="current_section" name="section" type="hidden" readonly>
                </div>
            </div>
        </div>

        <table class="table table-bordered" style="width:100%;margin:auto;">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>Final</th>
                    <th>Action Taken</th>
                </tr>
            </thead>
            <tbody>
                <tr id="sub1">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Filipino" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub2">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="English" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub3">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Mathematics" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub4">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Science" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub5">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Araling Panlipunan" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub6">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="ESP" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub7">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="TLE" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub8">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Music" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub9">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Arts" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub10">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Physical Education" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
                <tr id="sub11">
                    <td style="width:20%;">
                        <input type="text" id="selected_subject" name="selected_subject" value="Health" class="form-control" readonly>
                    </td>

                    <td>
                        <input type="number" id="grade1" name="grade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade2" name="grade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade3" name="grade3" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="grade4" name="grade4" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="final_grades" name="final_grades" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="pass_failed" name="pass_failed" class="form-control" readonly>
                        <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="d-flex justify-content-start m-1">
            <div>
                <a>Adviser Name</a>
                <input type="input" list="adviser_list" name="adviser_name" id="adviser_name" placeholder="Select Adviser Name" class="form-control" required />
                <datalist id="adviser_list">
                    <?php
                    $result = $conn->query("SELECT * FROM tbl_user where user_id > 1");
                    while ($row = $result->fetch_array()) {
                    ?>
                        <option>
                            <?= capitalizeAfterSpace($row['firstname'] . ' ' . $row['lastname']); ?>
                        </option>
                    <?php
                    }
                    ?>
                </datalist>
            </div>
            <div class="add-records">
                <button class="btn btn-success" id="jhs-add" name="add-record" style="margin:25px; width: 100%;" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>


<div class="container" <?php if ($year_level < 5) {
                            echo 'style="display:none;';
                        } ?>>
    <form action="#" method="post" id="grade-shs">
        <div class="row m-5 mb-3">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control" value="<?php echo $year_level ?>" id="year_level1" name="year_level" type="hidden" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control" value="<?php echo $section ?>" id="section1" name="section" type="hidden" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control" value="<?php echo $id ?>" id="student_id1" name="student_id" type="hidden" readonly>
                </div>
            </div>
            <input type="hidden" id="id_std" name="id_std" value="<?php echo $id ?>" class="form-control">
        </div>
        <table class="table table-bordered" style="width:90%;margin:auto;">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th id="quarter1">Q 1</th>
                    <th id="quarter2">Q 2</th>
                    <th>Sem Avg.</th>
                    <th>Action Taken</th>
                    <th>Adviser Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width:20%;">
                        <select name="subject" id="selected_sub" class="form-control form-select" required>
                            <option selected hidden>Select Subjects</option>
                            <?php
                            $result = $conn->query("SELECT * FROM tbl_subject WHERE description in ('Core','Specialized','Applied')");
                            while ($row = $result->fetch_array()) {
                            ?>
                                <option>
                                    <?= $row['subject_name']; ?>
                                </option>
                            <?php
                            }


                            ?>
                        </select>
                    </td>
                    <td style="width:20%;">
                        <select name="sem" id="sem_select" class="form-control form-select" required>
                            <option selected hidden>Select Sem.</option>
                            <option value="1">1st Sem</option>
                            <option value="2">2nd Sem</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" id="sgrade1" name="sgrade1" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="sgrade2" name="sgrade2" class="form-control" min="0" max="100">
                    </td>
                    <td>
                        <input type="number" id="sem_avg" name="sem_avg" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" id="action_taken" name="action_taken" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="input" list="adviser_list" name="adviser_name" id="adviser_name1" class="form-control" />
                        <datalist id="adviser_list">
                            <!-- <option disabled selected hidden>Select </option> -->
                            <?php
                            function capitalizeAfterSpace($str)
                            {
                                $words = explode(" ", $str);
                                $capitalizedWords = array_map('ucfirst', $words);
                                return implode(" ", $capitalizedWords);
                            }
                            $result = $conn->query("SELECT * FROM tbl_user where user_id > 1");
                            while ($row = $result->fetch_array()) {
                            ?>
                                <option>
                                    <?= capitalizeAfterSpace($row['firstname'] . ' ' . $row['lastname']); ?>
                                </option>
                            <?php
                            }
                            ?>
                        </datalist>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="add-records text-end">
            <button class="btn btn-sm btn-success" name="shsadd-record" id="shsadd-record" style="margin:30px 100px 10px 0px" type="submit">Save</button>
        </div>
    </form>
</div>