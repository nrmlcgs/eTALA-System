<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';


if (isset($_POST["update-student-submit"])) {
    $student_id = $_POST["student_id"];
    $lrn_no = $_POST["lrn_no"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $birth_place = $_POST["birth_place"];
    $religion = $_POST["religion"];
    $contact_no = $_POST["contact_no"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $date_of_birth = $_POST["date_of_birth"];
    $old_password = $_POST["old_password"];
    $password = md5($_POST["password"]);


    if ($password == "d41d8cd98f00b204e9800998ecf8427e") {
        $query = $conn->query("UPDATE `tbl_student_info` SET `lrn_no`='$lrn_no',`lastname`='$lastname',`firstname`='$firstname',`middlename`='$middlename',`email`='$email',`gender`='$gender',`date_of_birth`='$date_of_birth',`address`='$address',`birth_place`='$birth_place',`religion`='$religion',`contact_no`='$contact_no',`age`='$age' WHERE `student_id`='$student_id'");
        if ($query) {
            $_SESSION['name'] = ucwords($firstname);
            $_SESSION['name'] .= " " . ucwords($lastname);
            $_SESSION['su_update'] = 'Record updated!';
            header("Location: dashboard.php?page=home");
        } else {

            $_SESSION['er_update'] = 'Failed to update';
            header("Location: dashboard.php?page=home");
        }
    } else {
        $query = $conn->query("UPDATE `tbl_student_info` SET `lrn_no`='$lrn_no',`lastname`='$lastname',`firstname`='$firstname',`middlename`='$middlename',`email`='$email',`gender`='$gender',`date_of_birth`='$date_of_birth',`address`='$address',`birth_place`='$birth_place',`religion`='$religion',`contact_no`='$contact_no',`age`='$age',`password` = '$password' WHERE `student_id`='$student_id'");
        if ($query) {
            $_SESSION['name'] = ucwords($firstname);
            $_SESSION['name'] .= " " . ucwords($lastname);
            // $_SESSION['message'] = "<script>alert('Update successfully!')</script>";
            $_SESSION['su_update'] = 'Record updated!';
            header("Location: dashboard.php?page=home");
        } else {
            $_SESSION['er_update'] = 'Failed to update';
            header("Location: dashboard.php?page=home");
        }
    }
}

if (isset($_POST["student-upload"])) {
    $lrn_no = $_SESSION['lrn_no'];
    $file = $_FILES["doc"]["name"];
    $file_type = $_POST['doc_type'];


    // $sql_check = "SELECT * FROM tbl_student_info WHERE lrn_no = '$lrn_no'";
    // $result_check = $conn->query($sql_check);

    // while ($row = $result_check->fetch_assoc()) {
    $lastname =  $_SESSION['lastname'];
    $firstname =  $_SESSION['firstname'];

    $uname = $lrn_no . "_" . $lastname . "_" . $firstname . "_" . $file_type;
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $newName = $uname . "." . $extension;
    $targetFilePath = "admin/uploads/" . $newName;

    $sql = "DELETE FROM tbl_docs where file_type = '$file_type' and lrn_no = '$lrn_no'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
            // Upload the file with the new name
            if (move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO `tbl_docs`(lrn_no, file_type, file_name) values ('$lrn_no','$file_type','$newName')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard.php?page=personal_information");
                $_SESSION['document_uploaded'] = "Success";
            }
    } else {
        // Upload the file with the new name
        if (move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO `tbl_docs`(lrn_no, file_type, file_name) values ('$lrn_no','$file_type','$newName')";
            $result = mysqli_query($conn, $sql);
            header("Location: dashboard.php?page=personal_information");
            $_SESSION['document_uploaded'] = "Success";
        }
    }
    // }
}

if (isset($_GET["view-student"])) {
    $id = $_GET["view-student"];

    $query = $conn->query("SELECT * FROM tbl_student_info WHERE student_id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}



if (isset($_POST["request"])) {
    $request = $_POST["request"];

    $result = $conn->query("SELECT * FROM `tbl_section` WHERE year_level_id = '$request'");
?>
    <select name="section" class="form-control form-select">
        <option selected hidden>Select Section</option>
        <?php
        while ($row = $result->fetch_array()) {
        ?>
            <option value=" <?php echo $row['section_name']; ?>">
                <?php echo $row['section_name']; ?>
            </option>
        <?php
        }



        ?>
    </select>
    <?php
}


if (isset($_POST["select_grade"])) {
    $year_level_id = $_POST["select_grade"];

    $query = $conn->query("SELECT * FROM `tbl_grades` WHERE year_level = '$year_level_id' AND student_id = '" . $_SESSION['student_id'] . "'");
    $count = $query->num_rows;

    if ($count > 0) {
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
            <?php
            if ($count) {
            ?>
                <?php echo $grade_level . ", " . $row['section'] ?>
            <?php
            } else {
            }
            ?>

        </h4>
        <table class="table table-bordered table-hover" style="width:100%;">
            <?php
            if ($count) {
            ?>
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
            <?php
            } else {
                echo "No recordx";
            }
            ?>
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
                            <?= number_format($row['final_grade'], 0) ?>
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
    <?php
    } else {
        $query = $conn->query("SELECT * FROM tbl_shs WHERE year_level = '$year_level_id' AND student_id = '" . $_SESSION['student_id'] . "' ORDER BY sem_id asc");
        $count = $query->num_rows;

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
            <?php
            if ($count) {
            ?>
                <?php echo $grade_level . ", " . $row['section'] ?>
            <?php
            } else {
            }
            ?>

        </h4>
        <table class="table table-bordered table-hover" style="width:100%;">
            <?php
            if ($count) {
            ?>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Quarter[1,3]</th>
                        <th>Quarter[2,4]</th>
                        <th>Sem Average</th>
                        <th>Action Taken</th>
                        <th>Semester</th>
                    </tr>
                </thead>
            <?php
            } else {
                echo "No record";
            }
            ?>
            <tbody>
                <?php

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
                            <?= $row['average'] ?>
                        </td>
                        <td>
                            <?= strtoupper($row['sem_action']) ?>
                        </td>
                        <td>
                            <?= $row['sem_id'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
<?php
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $date = date("M d, Y  h:i:a");

    $result = $conn->query("SELECT * FROM tbl_student_info WHERE email = '$email' AND password = '$password'");
    $row = $result->fetch_array();
    if ($result->num_rows == 1) {
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['name'] = ucwords($row['firstname']);
        $_SESSION['name'] .= " " . ucwords($row['lastname']);
        $_SESSION['lrn_no'] = $row['lrn_no'];
        $_SESSION['year_level'] = $row['year_level'];
        $_SESSION['section'] = $row['section'];
        $_SESSION['auth'] = true;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        
        $student_id = $_SESSION['student_id'];
        $true = $conn->query("INSERT INTO `tbl_history_log`(transaction, user_id, student_id, date_added) VALUES ('Logged in', '3', '$student_id', '$date')");
        
        if($true){
            header("Location: dashboard.php?page=personal_information");
        }else{
            session_destroy();
        }
        
    } else {
         header("Location: index.php");
        $_SESSION['invalid_login'] = 'Email or Password is incorrect!';
        // echo "<script>alert('this part!')</script>";
    }
}

?>

