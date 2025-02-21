<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';

date_default_timezone_set('Asia/Manila');

if (isset($_POST['add-student-submit'])) {
    $lrn_no = $_POST['lrn_no'];
    $firstname = ucwords($_POST['firstname']);
    $middlename = ucwords($_POST['middlename']);
    $lastname = ucwords($_POST['lastname']);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $birth_place = ucwords($_POST['birth_place']);
    $religion = $_POST['religion'];
    $contact_no = $_POST['contact_no'];
    $age = $_POST['age'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = ucwords($_POST['address']);
    $year_level = $_POST['year_level'];
    $sy = $_POST['sy'];
    $section = $_POST['section'];
    //$status = $_POST['status'];
    $program = $_POST['program'];
    $track_strand = $_POST['track_strand'];


    if (empty($gender) || empty($religion) || empty($year_level) || empty($section) || empty($email) || empty($password)) {
        $_SESSION['message'] = "<script>alert('Please select input field!')</script>";
    } else {

        $exist_lrn_no = $conn->query("SELECT * FROM `tbl_student_info` WHERE lrn_no = '$lrn_no'");
        $exist_email_no = $conn->query("SELECT * FROM `tbl_student_info` WHERE email = '$email'");

        if ($exist_lrn_no->num_rows > 0) {
            $_SESSION['lrn_exist'] = 'Exist';
        } else if ($exist_email_no->num_rows > 0) {
            $_SESSION['email_exist'] = 'Exist';
        } else {
            $result = $conn->query("INSERT INTO `tbl_student_info`(`lrn_no`, `lastname`, `firstname`, `middlename`, `email`, `password`, `gender`, `date_of_birth`, `address`, `birth_place`, `religion`, `contact_no`, `age`, `year_level`,`school_year` ,`section`, `status`, `program`, `verify_token`, `user_type`, `track_strand` ) 
                                    VALUES ('$lrn_no','$lastname','$firstname','$middlename','$email','$password','$gender','$date_of_birth','$address','$birth_place','$religion','$contact_no','$age','$year_level','$sy','$section','','$program','0','3','$track_strand')");
            if ($result) {
                $_SESSION['su_created'] = 'Success';
            } else {
                $_SESSION['er_created'] = 'Error';
            }
        }
    }
}




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="admin/assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="admin/images/logo_ori.png">
    <title>Login</title>
    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #f7f7f7;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .container .login-form {
            padding: 1rem;
        }

        .login-form header {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-form input {
            height: 40px;
            width: 100%;
            padding: 0 15px;
            font-size: 15px;
            margin-bottom: 1.3rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }

        .login-form input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }

        .login-form a {
            font-size: 16px;
            color: #720000;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        .login-form .button {
            color: #fff;
            background: #720000;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 15px 0px;
            cursor: pointer;
            transition: 0.4s;

            height: 40px;
            width: 100%;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }

        .login-form .button:hover {
            background: #570000;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']); // unset the session message after displaying it
    }
    ?>
    <!-- Add Students Modal -->
    <div class="modal fade" id="add-student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h5>Student's Personal Details</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>LRN:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="number" minlength="6" maxlength="12" name="lrn_no" class="form-control " placeholder="Enter LRN">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Firstname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="firstname" class="form-control " placeholder="Enter Firstname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Middlename:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="middlename" class="form-control " placeholder="Enter Middlename">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Lastname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="lastname" class="form-control " placeholder="Enter Lastname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Gender:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="gender" class="form-control form-select">
                                            <option disabled selected hidden>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Birth Place:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="birth_place" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Religion:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="religion" class="form-control form-select">
                                            <option disabled selected hidden>Select Religion</option>
                                            <option>Catholic</option>
                                            <option>Iglesia</option>
                                            <option>Born Again</option>
                                            <option>Muslim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Contact No:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="number" name="contact_no" class="form-control " placeholder="Enter Contact No.">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Age:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="number" name="age" class="form-control " placeholder="Enter Age">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Date of Birth:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="date" name="date_of_birth" class="form-control ">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Address:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="address" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Year Level:</b></p>
                                    </div>

                                    <div class="col">
                                        <select id="select_year_level" name="year_level" class="form-control form-select">
                                            <option disabled selected hidden>Select level</option>
                                            <?php
                                            $result = $conn->query("SELECT * FROM tbl_year_level");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option value="<?= $row['year_level_id']; ?>">
                                                    <?= $row['year_level']; ?>
                                                </option>
                                            <?php
                                            }


                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row" id="track_strand_id" style="display:none;">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Track/Strand:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="track_strand" id="fetch_ts" class="form-control form-select" required>
                                            <option disabled selected hidden>Track/Strand</option>
                                            <?php
                                            $result = $conn->query("SELECT * FROM tbl_track_strand");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option value="<?= $row['id']; ?>">
                                                    <?= $row['track'] . ' / ' . $row['strand']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Section:</b></p>
                                    </div>

                                    <div class="col sectionsss">
                                        <select disabled name="section" class="form-control form-select">
                                            <option selected hidden>Select Section</option>
                                            <?php

                                            $result = $conn->query("SELECT * FROM tbl_section");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option>
                                                    <?php echo $row['section_name']; ?>
                                                </option>
                                            <?php
                                            }



                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="row mb-5">-->
                                <!--    <div class="col-sm-4">-->
                                <!--        <p class="text-end"><b>Status:</b></p>-->
                                <!--    </div>-->

                                <!--    <div class="col">-->
                                <!--        <select name="status" class="form-control form-select">-->
                                <!--            <option disabled selected hidden>Select Status</option>-->
                                <!--            <option>Passed</option>-->
                                <!--            <option>Retained</option>-->
                                <!--            <option>Dropped</option>-->

                                <!--        </select>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Email:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Password:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Program Enrolled</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <p class="text-end"><b>Curriculum:</b></p>
                                    </div>

                                    <div class="col-md-4">
                                        <select name="program" class="form-control form-select">
                                            <option disabled selected hidden>Select Curriculum</option>
                                            <?php
                                            $result = $conn->query("SELECT * FROM tbl_program");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option>
                                                    <?= $row['program']; ?>
                                                </option>
                                            <?php
                                            }


                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-2">
                                        <p class="text-end"><b>S.Y:</b></p>
                                    </div>

                                    <div class="col-md-4">
                                        <select name="sy" id="fetch_sy" class="form-control form-select">
                                            <option disabled selected hidden>Select S.Y.</option>
                                            <?php
                                            $result = $conn->query("SELECT * FROM tbl_school_year");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option>
                                                    <?= $row['school_year']; ?>
                                                </option>
                                            <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-student-submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php echo $_SESSION['success'];
    unset($_SESSION['success']); ?>
    <div class="container shadow">
        <div class="login-form">
            <div class="text-center logo mb-5 mt-3">
                <img src="admin/images/logo_ori.png" width="80px" height="80px">
                <header>Student Portal</header>
            </div>

            <form action="action.php" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <a href="forgot-password.php" class="float-end text-decoration-none">Forgot password?</a>
                <button type="submit" name="login" class="button">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#add-student" class="text-decoration-none">Sign Up</a>
                </p>
            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="admin/assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->
    <script type="text/javascript" src="admin/assets/salert/sweetalert.min.js"></script>
    <script type="text/javascript" src="admin/assets/jquery/jquery-3.7.1.js"></script>
    <script>
        $("#select_year_level").change(function() {
            var selectedValue = $(this).val();
            // alert(selectedValue);
            $.ajax({
                url: "action.php",
                type: "POST",
                data: "request=" + selectedValue,
                beforeSend: function() {
                    $(".sectionsss").html("<p>Loading...</p>");
                },
                success: function(res) {
                    setTimeout(function() {
                        $(".sectionsss").html(res);
                    }, 1000);
                },
            });

            if (selectedValue > 4) {
                // ts_view
                $('#track_strand_id').show();
            } else {
                $('#track_strand_id').hide();
            }
        });
    </script>
</body>

</html>

<?php include('admin/function/alert.php'); ?>