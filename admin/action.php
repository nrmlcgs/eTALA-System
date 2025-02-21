<?php
session_start();
include 'include/db_connection.php';
include 'include/auth.php';

if (isset($_POST["edit_announcement"])) {
    //  header("Location: dashboard.php?page=announcement");
    $announcement_id = $_POST["announcement_id"];
    $title = $_POST["title"];
    //modified by kent
    $date_and_time_to = $_POST["edit_date_and_time_to"];
    $date_and_time_from = $_POST["edit_date_and_time_from"];
    $description = $_POST["announcement_description"];

    if (empty($date_and_time_from)) {
        $_SESSION['x_date'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    } elseif (empty($date_and_time_from)) {
        $_SESSION['x_date'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    } else {
        $result = $conn->query("UPDATE tbl_announcement SET title='$title', date_time_from='$date_and_time_from', 
                            date_time_to= '$date_and_time_to', description='$description' WHERE `announcement_id`='$announcement_id'");

        if ($result) {
            $_SESSION['y_announcement_updated'] = 'Announcement Updated';
            header("Location: dashboard.php?page=announcement");
        } else {
            $_SESSION['n_announcement_updated'] = "Announcement failed to update";
            header("Location: dashboard.php?page=announcement");
        }
    }
}

// =========================================================================================================================

if (isset($_POST["save_announcement"])) {
    $title = $_POST["title"];
    //modified by kent
    $date_and_time_from = $_POST["date_and_time_from"];
    $date_and_time_to = $_POST["date_and_time_to"];
    $description = $_POST["announcement_description"];

    if (empty($date_and_time_from)) {
        $_SESSION['x_date'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    } elseif (empty($date_and_time_from)) {
        $_SESSION['x_date'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    } else {
        $result = $conn->query("INSERT INTO tbl_announcement(title, date_time_from, date_time_to, description) 
                            VALUES ('$title','$date_and_time_from', '$date_and_time_to', '$description')");
        if ($result) {
            $_SESSION['insert_grade'] = "xyz";
            header("Location: dashboard.php?page=announcement");
        } else {
            $_SESSION['x_grade'] = "xyz";
            header("Location: dashboard.php?page=announcement");
        }
    }
}

if (isset($_GET["delete-announcement"])) {
    $announcement_id = $_GET["delete-announcement"];

    $result = $conn->query("DELETE FROM `tbl_announcement` WHERE announcement_id = '$announcement_id'");
    if ($result) {

        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=announcement");
    }
}

// =============================================     School Year     ==============================================
if (isset($_POST['add-sy-submit'])) {
    $sy = $_POST['sy'];

    $result = $conn->query("INSERT INTO `tbl_school_year`(`school_year`) VALUES ('$sy ')");
    if ($result) {
        $_SESSION['insert_grade'] = "xyz";
        header("Location: dashboard.php?page=sy");
    } else {
        $_SESSION['grade_x'] = "xyz";
        header("Location: dashboard.php?page=sy");
    }
}


if (isset($_POST['update-sy-submit'])) {
    $sy_id = $_POST['update_sy_id'];
    $sy = $_POST['update_sy'];
    
    $check = $conn->query("SELECT * FROM tbl_student_info WHERE school_year = '$sy'");
    
    if ($check->num_rows > 0) {
        $_SESSION['failed_update'] = "xyz";
        header("Location: dashboard.php?page=sy");
    }else{
        
        $result = $conn->query("UPDATE `tbl_school_year` SET `school_year`='$sy' WHERE `sy_id` = '$sy_id'");
    
        if ($result) {
            $_SESSION['su_update'] = "xyz";
            header("Location: dashboard.php?page=sy");
        } else {
            $_SESSION['er_update'] = "xyz";
            header("Location: dashboard.php?page=sy");
        }
    
    }
    
    
}
if (isset($_GET["delete-sy"])) {
    $id = $_GET["delete-sy"];

    $delete_student = $conn->query("DELETE FROM `tbl_school_year` WHERE  sy_id = '$id'");
    if ($delete_student) {
        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=sy");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=sy");
    }
}



if (isset($_POST['add-student-submit'])) {
    $lrn_no = $_POST['lrn_no'];
    $firstname = ucwords($_POST['firstname']);
    $middlename = ucwords($_POST['middlename']);
    $lastname = ucwords($_POST['lastname']);
    $gender = $_POST['gender'];
    $birth_place = ucwords($_POST['birth_place']);
    $religion = $_POST['religion'];
    $contact_no = $_POST['contact_no'];
    $age = $_POST['age'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = ucwords($_POST['address']);
    $year_level = $_POST['year_level'];
    $section = $_POST['section'];
    $status = $_POST['status'];
    $program = $_POST['program'];
    $email = $_POST['email'];

    if (empty($gender) || empty($religion) || empty($year_level) || empty($section) || empty($status) || empty($program)) {
        $_SESSION['message'] = "<script>alert('Please select input field!')</script>";
        header("Location: dashboard.php?page=student");
    } else {

        $exist_lrn_no = $conn->query("SELECT * FROM `tbl_student_info` WHERE lrn_no = '$lrn_no'");
        $exist_email_no = $conn->query("SELECT * FROM `tbl_student_info` WHERE email = '$email'");

        if ($exist_lrn_no->num_rows > 0) {
            $_SESSION['message'] = "<script>alert('Oops! LRN number already exist!')</script>";
            header("Location: dashboard.php?page=student");
        } else if ($exist_email_no->num_rows > 0) {
            $_SESSION['message'] = "<script>alert('Oops! Email already exist!')</script>";
            header("Location: dashboard.php?page=student");
        } else {
            $result = $conn->query("INSERT INTO `tbl_student_info`( `lrn_no`, `lastname`, `firstname`, `middlename`, `gender`, `date_of_birth`, `address`, `birth_place`, `religion`, `contact_no`, `age`, `year_level`, `section`, `status`, `program`) VALUES ('$lrn_no','$lastname','$firstname','$middlename','$gender','$date_of_birth','$address','$birth_place','$religion','$contact_no','$age','$year_level','$section','$status','$program')");
            if ($result) {
                $_SESSION['message'] = "<script>alert('Add students successfully!')</script>";
                header("Location: dashboard.php?page=student");
            } else {
                $_SESSION['message'] = "<script>alert('Add students failed!')</script>";
                header("Location: dashboard.php?page=student");
            }
        }
    }
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

if (isset($_POST['update-student-submit'])) {
    $student_id = $_POST['update_student_id'];
    $lrn_no = $_POST['update_lrn_no'];
    $firstname = $_POST['update_firstname'];
    $middlename = $_POST['update_middlename'];
    $lastname = $_POST['update_lastname'];
    $gender = $_POST['update_gender'];
    $birth_place = $_POST['update_birth_place'];
    $religion = $_POST['update_religion'];
    $contact_no = $_POST['update_contact_no'];
    $age = $_POST['update_age'];
    $date_of_birth = $_POST['update_date_of_birth'];
    $address = $_POST['update_address'];
    $year_level = $_POST['update_year_level'];
    $sy = $_POST['update_sy'];
    $section = trim($_POST['update_section']);
    $status = $_POST['update_status'];
    $program = $_POST['update_program'];
    $ts = $_POST['update_ts'];

    if (empty($gender) || empty($religion) || empty($year_level) || empty($status) || empty($program)) {
        $_SESSION['message'] = "<script>alert('Please select input field!')</script>";
        header("Location: dashboard.php?page=student");
    } else {
        $result = $conn->query("UPDATE `tbl_student_info` SET `lrn_no`='$lrn_no',`lastname`='$lastname',`firstname`='$firstname',`middlename`='$middlename',`gender`='$gender',`date_of_birth`='$date_of_birth',`address`='$address',`birth_place`='$birth_place',`religion`='$religion',`contact_no`='$contact_no',`age`='$age',`year_level`='$year_level',`school_year`='$sy',`section`='$section',`status`='$status',`program`='$program', `track_strand`='$ts' WHERE `student_id` = '$student_id'");
        if ($result) {
            $_SESSION['y_student_updated'] = "Updated";
            header("Location: dashboard.php?page=student");
        } else {
            $_SESSION['n_student_updated'] = "Updated";
            header("Location: dashboard.php?page=student");
        }
    }
}

// =====================================================================================================================

if (isset($_POST['add-corrriculum-submit'])) {
    $corriculum = $_POST['corriculum'];
    $description = $_POST['description'];

    $result = $conn->query("INSERT INTO `tbl_program`(`program`, `description`) VALUES ('$corriculum','$description')");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    } else {
        $_SESSION['er_update'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    }
}


if (isset($_POST['update-corrriculum-submit'])) {
    $id = $_POST['update_program_id'];
    $corriculum = $_POST['update_corriculum'];
    $description = $_POST['update_description'];

    $result = $conn->query("UPDATE `tbl_program` SET `program`='$corriculum', `description`='$description' WHERE program_id = '$id'");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    } else {
        $_SESSION['er_update'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    }
}

if (isset($_POST['manage-diploma-submit'])) {
    $id = '1';
    $day = $_POST['day_id'];
    $month = $_POST['month_id'];
    $araw = $_POST['araw_id'];
    $buwan = $_POST['buwan_id'];
    $head_name = $_POST['head_name'];
    $principal_name = $_POST['principal_name'];
    $school_manager = $_POST['school_manager'];

    $result = $conn->query("UPDATE `tbl_signatory` SET head_name = '$head_name', principal_name = '$principal_name', school_manager = '$school_manager'
                            , day = '$day', month = '$month', araw = '$araw', buwan = '$buwan' WHERE id = '$id'");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        // header('Location: '.$_SERVER['PHP_SELF']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $_SESSION['er_update'] = "abc";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if (isset($_GET["view-details"])) {
    $id = $_GET["view-details"];

    $query = $conn->query("SELECT * FROM tbl_signatory WHERE id = '$id'");
    $result = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $result));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}

if (isset($_GET["view-program"])) {
    $id = $_GET["view-program"];

    $query = $conn->query("SELECT * FROM tbl_program WHERE program_id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}

if (isset($_GET["delete-corriculum"])) {
    $id = $_GET["delete-corriculum"];

    $query = $conn->query("DELETE FROM `tbl_program` WHERE  program_id = '$id'");
    if ($query) {

        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=corriculum");
    }
}

// =====================================================================================================================

if (isset($_POST['add_record'])) {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $grade1 = $_POST['grade1'];
    $grade2 = $_POST['grade2'];
    $grade3 = $_POST['grade3'];
    $grade4 = $_POST['grade4'];
    $final_grades = $_POST['average'];
    $adviser_name = $_POST['adviser'];
    $pass_failed = $_POST['action'];
    $year_level = $_POST['year_level'];
    $school_year = $_POST['selected_sy'];
    $section = $_POST['section'];
    if (empty($subject)) {
        $_SESSION['message'] = "<script>alert('Please select subjects!')</script>";
        header("Location: dashboard.php?page=add_record&student_id=" . $student_id . "");
    } else {

        $result = $conn->query("SELECT * FROM `tbl_grades` WHERE subject = '$subject' AND school_year = '$school_year' AND student_id = '$student_id'");
        if ($result->num_rows > 0) {
            // $_SESSION['message'] = "<script>alert('Subject " . $subject . " is already exist!')</script>";
            $result = $conn->query("UPDATE tbl_grades SET 1st_grading = '$grade1' , 2nd_grading = '$grade2', 3rd_grading = '$grade3' , 4th_grading = '$grade4', final_grade = '$final_grades', passed_failed = '$pass_failed', adviser_name = '$adviser_name'
                                    WHERE subject = '$subject' AND school_year ='$school_year' AND student_id = '$student_id'");
            if ($result) {
                $_SESSION['update_grade'] = 'Record Updated Successfully';
                header("Location: dashboard.php?page=records&student_id=" . $student_id . "");
            } else {
                $_SESSION['grade_x'] = 'Something went wrong';
                header("Location: dashboard.php?page=records&student_id=" . $student_id . "");
            }

            // header("Location: dashboard.php?page=add_record&student_id=" . $student_id . "");
        } else {
            $result1 = $conn->query("INSERT INTO `tbl_grades`(`student_id`, `subject`, `1st_grading`, `2nd_grading`, `3rd_grading`, `4th_grading`, `adviser_name`, `final_grade`, `passed_failed`, `year_level`, `section`, `school_year`) VALUES ('$student_id','$subject','$grade1','$grade2','$grade3','$grade4','$adviser_name','$final_grades','$pass_failed','$year_level','$section','$school_year')");
            if ($result1) {
                $_SESSION['insert_grade'] = 'Record Added Successfully';
                header("Location: dashboard.php?page=records&student_id=" . $student_id . "");
            } else {
                $_SESSION['grade_x'] = 'Something went wrong';
                header("Location: dashboard.php?page=records&student_id=" . $student_id . "");
            }
        }
    }
}

// =====================================================================================================================

if (isset($_POST['add-user-submit'])) {
    $firstname = $_POST['add_user_firstname'];
    $lastname = $_POST['add_user_lastname'];
    $username = $_POST['add_user_username'];
    $email = $_POST['add_user_email'];
    $password = md5($_POST['add_user_password']);
    $c_password = md5($_POST['add_user_c_password']);

    if ($password == $c_password) {

        $query = $conn->query("INSERT INTO `tbl_user`(`lastname`, `firstname`, `username`, `email`, `password`, `user_type`) VALUES ('$lastname','$firstname','$username','$email','$password','0')");
        if ($query) {
            $_SESSION['message'] = "<script>alert('Add user successfully!')</script>";
            header("Location: dashboard.php?page=user");
        } else {
            $_SESSION['message'] = "<script>alert('Add user failed!')</script>";
            header("Location: dashboard.php?page=user");
        }
    } else {
        $_SESSION['message'] = "<script>alert('Email or password is incorrect!')</script>";
        header("Location: dashboard.php?page=user");
    }
}

if (isset($_GET["view-user"])) {
    $id = $_GET["view-user"];

    $query = $conn->query("SELECT * FROM tbl_user WHERE user_id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}

if (isset($_POST['update-user-submit'])) {

    $user_id = $_POST['user_id'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $username = $_POST['user_username'];
    $email = $_POST['user_email'];
    $password = md5($_POST['user_password']);
    if ($password == "d41d8cd98f00b204e9800998ecf8427e") {
        $query = $conn->query("UPDATE `tbl_user` SET `lastname`='$lastname',`firstname`='$firstname',`username`='$username',`email`='$email' WHERE user_id = '$user_id'");
        if ($query) {
            $_SESSION['name'] = ucwords($firstname);
            $_SESSION['name'] .= " " . ucwords($lastname);
            $_SESSION['su_update'] = "xyz";
            header("Location: dashboard.php?page=home");
        } else {

            $_SESSION['er_update'] = "xyz";
            header("Location: dashboard.php?page=home");
        }
    } else {
        $query = $conn->query("UPDATE `tbl_user` SET `lastname`='$lastname',`firstname`='$firstname',`username`='$username',`email`='$email',`password`='$password' WHERE user_id = '$user_id'");
        if ($query) {
            $_SESSION['name'] = ucwords($firstname);
            $_SESSION['name'] .= " " . ucwords($lastname);
            $_SESSION['message'] = "<script>alert('Update user successfully!')</script>";
            header("Location: dashboard.php?page=home");
        } else {
            $_SESSION['message'] = "<script>alert('Update user failed!')</script>";
            header("Location: dashboard.php?page=home");
        }
    }
}

if (isset($_GET["delete-user"])) {
    $id = $_GET["delete-user"];

    $delete_student = $conn->query("DELETE FROM `tbl_user` WHERE  user_id = '$id'");
    if ($delete_student) {
        $_SESSION['y_delete_user'] = 'User Deleted';
        header("Location: dashboard.php?page=user");
    } else {
        $_SESSION['n_delete_user'] = 'Failed to Delete';
        header("Location: dashboard.php?page=user");
    }
}

// =====================================================================================================================

if (isset($_POST['add-section-submit'])) {
    $section = $_POST['section'];
    $year_level = $_POST['year_level'];

    $result = $conn->query("INSERT INTO `tbl_section`(`year_level_id`, `section_name`) VALUES ('$year_level','$section')");
    if ($result) {
        $_SESSION['insert_grade'] = "xyz";
        header("Location: dashboard.php?page=section");
    } else {
        $_SESSION['grade_x'] = "xyz";
        header("Location: dashboard.php?page=section");
    }
}

if (isset($_GET["view-section"])) {
    $id = $_GET["view-section"];

    $query = $conn->query("SELECT * FROM tbl_section WHERE section_id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}

if (isset($_POST['update-section-submit'])) {
    $section_id = $_POST['update_section_id'];
    $section = $_POST['update_section_name'];

    $result = $conn->query("UPDATE `tbl_section` SET `section_name`='$section' WHERE `section_id` = '$section_id'");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        header("Location: dashboard.php?page=section");
    } else {
        $_SESSION['er_update'] = "xyz";
        header("Location: dashboard.php?page=section");
    }
}

if (isset($_POST['update-ts-submit'])) {
    $id = $_POST['update_ts_id'];
    $t = $_POST['update_t_name'];
    $s = $_POST['update_s_name'];

    $result = $conn->query("UPDATE tbl_track_strand SET track = '$t', strand = '$s' WHERE id = '$id'");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    } else {
        $_SESSION['er_update'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    }
}

if (isset($_GET["delete-section"])) {
    $id = $_GET["delete-section"];

    $delete_student = $conn->query("DELETE FROM `tbl_section` WHERE  section_id = '$id'");
    if ($delete_student) {
        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=section");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=section");
    }
}


if (isset($_GET["delete-track-strand"])) {
    $id = $_GET["delete-track-strand"];

    $sql = $conn->query("DELETE FROM `tbl_track_strand` WHERE  id = '$id'");
    if ($sql) {
        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    }
}

// =====================================================================================================================

if (isset($_POST['add-subject-submit'])) {
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    $result = $conn->query("INSERT INTO `tbl_subject`(subject_name, description, order_id) VALUES ('$subject','$description', '0')");
    if ($result) {
        $_SESSION['message'] = "<script>alert('Add subject successfully!')</script>";
        header("Location: dashboard.php?page=subject");
    } else {
        $_SESSION['message'] = "<script>alert('Add subject failed!')</script>";
        header("Location: dashboard.php?page=subject");
    }
}
//add track strand
if (isset($_POST['add-ts-submit'])) {
    $track = $_POST['track'];
    $strand = $_POST['strand'];

    $result = $conn->query("INSERT INTO `tbl_track_strand`(track, strand) VALUES ('$track', '$strand')");
    if ($result) {
        $_SESSION['message'] = "<script>alert('Track/Strand Addedd successfully!')</script>";
        header("Location: dashboard.php?page=track-strand");
    } else {
        $_SESSION['message'] = "<script>alert('Failed to Add!')</script>";
        header("Location: dashboard.php?page=track-strand");
    }
}
if (isset($_GET["view-subject"])) {
    $id = $_GET["view-subject"];

    $query = $conn->query("SELECT * FROM tbl_subject WHERE subject_id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}

//view track / strand
if (isset($_GET["view-ts"])) {
    $id = $_GET["view-ts"];

    $query = $conn->query("SELECT * FROM tbl_track_strand WHERE id = '$id'");
    $user = $query->fetch_array();
    if ($query) {

        echo json_encode(array('status' => 200, 'data' => $user));
        return false;
    } else {
        echo json_encode(array('status' => 201,));
        return false;
    }
}


//select subject to edit fpr grade 10 below


//select subject to edit fpr grade 10 below
if (isset($_POST['selected_subject']) && isset($_POST['selected_sy']) && isset($_POST['id'])) {
    $selected_subject = $_POST['selected_subject'];
    $selected_sy = $_POST['selected_sy'];
    $id = $_POST['id'];
    // Perform query to fetch data based on selected category_id and type
    $sql = "SELECT * FROM tbl_grades WHERE subject = '$selected_subject' AND school_year = '$selected_sy' AND student_id = '$id'";
    $result = $conn->query($sql);

    // Initialize an associative array to store the fetched data
    $data = array();

    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();

        // Store the data in the associative array
        $data['first'] = $row['1st_grading'];
        $data['sec'] = $row['2nd_grading'];
        $data['third'] = $row['3rd_grading'];
        $data['fourth'] = $row['4th_grading'];
        $data['final'] = $row['final_grade'];
        $data['adviser'] = $row['adviser_name'];
        $data['action'] = $row['passed_failed'];
    } else {
        // $data['first'] = "no rc";
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}


if (isset($_POST['update-subject-submit'])) {
    $subject_id = $_POST['update_subject_id'];
    $subject = $_POST['update_subject_name'];
    $description = $_POST['update_subject_description'];

    $result = $conn->query("UPDATE `tbl_subject` SET `subject_name`='$subject',`description`='$description' WHERE `subject_id` = '$subject_id'");
    if ($result) {
        $_SESSION['su_update'] = "xyz";
        header("Location: dashboard.php?page=subject");
    } else {
        $_SESSION['er_update'] = "xyz";
        header("Location: dashboard.php?page=subject");
    }
}
if (isset($_GET["delete-subject"])) {
    $id = $_GET["delete-subject"];

    $delete_student = $conn->query("DELETE FROM `tbl_subject` WHERE   subject_id = '$id'");
    if ($delete_student) {
        $_SESSION['message'] = "<script>alert('Delete successfully!')</script>";
        header("Location: dashboard.php?page=subject");
    } else {
        $_SESSION['message'] = "<script>alert('Delete failed!')</script>";
        header("Location: dashboard.php?page=subject");
    }
}
//delete track strand
if (isset($_GET["delete-track-strand"])) {
    $id = $_GET["delete-track-strand"];

    $delete_ts = $conn->query("DELETE FROM `tbl_track_strand` WHERE id = '$id'");
    if ($delete_ts) {
        $_SESSION['su_deleted'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    } else {
        $_SESSION['er_deleted'] = "xyz";
        header("Location: dashboard.php?page=track-strand");
    }
}

// ================================================== Filter Section ====================================================


if (isset($_POST["grade7"])) {
    $request = $_POST["grade7"];

    $result = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = '1' AND `section` like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN NO.</th>
                    <th>Name</tear Level <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '1' ? '<p>Grade 7</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>


            </tbody>
    </table>
<?php
}

if (isset($_POST["grade8"])) {
    $request = $_POST["grade8"];

    $result = $conn->query("SELECT * FROM tbl_student_info WHERE and year_level = '2' section like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN NO.</th>
                    <th>Name</tear Level <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '2' ? '<p>Grade 8</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>


            </tbody>
    </table>
<?php
}

if (isset($_POST["grade9"])) {
    $request = $_POST["grade9"];

    $result = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = '3' AND `section` like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN NO.</th>
                    <th>Name</tear Level <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '3' ? '<p>Grade 9</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>



            </tbody>
    </table>
<?php
}


if (isset($_POST["grade10"])) {
    $request = $_POST["grade10"];

    $result = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = '4' AND `section` like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN NO.</th>
                    <th>Name</tear Level <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '4' ? '<p>Grade 10</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>



            </tbody>
    </table>
<?php
}


if (isset($_POST["grade11"])) {
    $request = $_POST["grade11"];

    $result = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = '5' AND `section` like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN No.</th>
                    <th>Name</th>
                    <th>Year Level</th>
                    <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '5' ? '<p>Grade 11</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>



            </tbody>
    </table>
<?php
}


if (isset($_POST["records_grade7"])) {
    $request = $_POST["records_grade7"];

    $result = $conn->query("SELECT * FROM `tbl_grades` WHERE year_level = '$request'");
    $count = $result->num_rows;
    $row = $result->fetch_array()
?>
    <h4>
        <?php echo $row['year_level'] . ", " . $row['section'] ?>
    </h4>
    <table class="table table-bordered table-hover mt-4">
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
                    <th>Pass or Failed</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row['subject'] ?>
                        </td>
                        <td>
                            <?php echo $row['1st_grading'] ?>
                        </td>
                        <td>
                            <?php echo $row['2nd_grading'] ?>
                        </td>
                        <td>
                            <?php echo $row['3rd_grading'] ?>
                        </td>
                        <td>
                            <?php echo $row['4th_grading'] ?>
                        </td>
                        <td>
                            <?php echo $row['final_grade'] ?>
                        </td>
                        <td>
                            <?php echo $row['unit'] ?>
                        </td>
                        <td>
                            <?php echo $row['passed_failed'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>


            </tbody>
    </table>
<?php
}






if (isset($_POST["grade12"])) {
    $request = $_POST["grade12"];

    $result = $conn->query("SELECT * FROM `tbl_student_info` WHERE year_level = 6 AND `section` like '%$request%'");
    $count = $result->num_rows;
?>
    <table class="table table-bordered table-hover">
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th>LRN No.</th>
                    <th>Name</tear Level <th>Section</th>
                </tr>
            <?php
        } else {
            echo "No record";
        }
            ?>
            </thead>


            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_array()) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['lrn_no'] ?>
                        </td>
                        <td>
                            <?php echo $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                        </td>
                        <td>
                            <?php echo $row['year_level'] == '6' ? '<p>Grade 12</p>' : '' ?>
                        </td>
                        <td>
                            <?php echo $row['section'] ?>
                        </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
    </table>
<?php
}


if (isset($_POST["upload-document-submit"])) {
    $lrn_no = $_POST['xlrn'];
    $file = $_FILES["doc"]["name"];
    $file_type = $_POST['doc_type'];


    $sql_check = "SELECT * FROM tbl_student_info WHERE lrn_no = '$lrn_no'";
    $result_check = $conn->query($sql_check);

    while ($row = $result_check->fetch_assoc()) {
        $lastname = $row['lastname'];
        $firstname = $row['firstname'];

        $uname = $lrn_no . "_" . $lastname . "_" . $firstname . "_" . $file_type;
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $newName = $uname . "." . $extension;
        $targetFilePath = "uploads/" . $newName;

        $sql = "DELETE FROM tbl_docs where file_type = '$file_type' and lrn_no = '$lrn_no'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Upload the file with the new name
            if (move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO `tbl_docs`(lrn_no, file_type, file_name) values ('$lrn_no','$file_type','$newName')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard.php?page=student");
                $_SESSION['document_uploaded'] = "Success";
            }
        } else {
            // Upload the file with the new name
            if (move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO `tbl_docs`(lrn_no, file_type, file_name) values ('$lrn_no','$file_type','$newName')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard.php?page=student");
                $_SESSION['document_uploaded'] = "Success";
            }
        }
    }
}


?>