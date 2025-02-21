<?php
session_start();
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
    $section = $_POST['section'];
    $status = $_POST['status'];
    $program = $_POST['program'];

    if (empty($gender) || empty($religion) || empty($year_level) || empty($section) || empty($status) || empty($program)) {
        $_SESSION['message'] = "<script>alert('Please select input field!')</script>";

    } else {

        $exist_lrn_no = $conn->query("SELECT * FROM `tbl_student_info` WHERE lrn_no = '$lrn_no'");
        if ($exist_lrn_no->num_rows > 0) {
            $_SESSION['message'] = "<script>alert('Oops! LRN number is already exist!')</script>";

        } else {
            $result = $conn->query("INSERT INTO `tbl_student_info`(`lrn_no`, `lastname`, `firstname`, `middlename`, `email`, `password`, `gender`, `date_of_birth`, `address`, `birth_place`, `religion`, `contact_no`, `age`, `year_level`, `section`, `status`, `program`) VALUES ('$lrn_no','$lastname','$firstname','$middlename','$email','$password','$gender','$date_of_birth','$address','$birth_place','$religion','$contact_no','$age','$year_level','$section','$status','$program')");
            if ($result) {
                $_SESSION['message'] = "<script>alert('Create successfully!')</script>";

            } else {
                $_SESSION['message'] = "<script>alert('Create failed!')</script>";

            }
        }


    }

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="admin/assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="admin/images/logo_ori.png">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">



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
                            <input required type="text" name="lrn_no" class="form-control " placeholder="Enter LRN">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-end"><b>Firstname:</b></p>
                        </div>

                        <div class="col">
                            <input required type="text" name="firstname" class="form-control "
                                placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-end"><b>Middlename:</b></p>
                        </div>

                        <div class="col">
                            <input required type="text" name="middlename" class="form-control "
                                placeholder="Enter Middlename">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <p class="text-end"><b>Lastname:</b></p>
                        </div>

                        <div class="col">
                            <input required type="text" name="lastname" class="form-control "
                                placeholder="Enter Lastname">
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
                            <input required type="number" name="contact_no" class="form-control "
                                placeholder="Enter Contact No.">
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
                                    <option value="<?= $row['year_level']; ?>">
                                        <?= $row['year_level']; ?>
                                    </option>
                                    <?php
                                }


                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="row sectionsss">
                        <div class="col-sm-4">
                            <p class="text-end"><b>Section:</b></p>
                        </div>

                        <div class="col ">
                            <select disabled name="section" class="form-control form-select">
                                <option selected hidden>Select Section</option>
                                <?php

                                $result = $conn->query("SELECT * FROM tbl_year_level");
                                $row = $result->fetch_array();
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <option>
                                        <?= $row['section']; ?>
                                    </option>
                                    <?php
                                }



                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-sm-4">
                            <p class="text-end"><b>Status:</b></p>
                        </div>

                        <div class="col">
                            <select name="status" class="form-control form-select">
                                <option disabled selected hidden>Select Status</option>
                                <option>Passed</option>
                                <option>Retained</option>
                                <option>Dropped</option>

                            </select>
                        </div>
                    </div>
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
                        <div class="col-sm-4">
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
                    </div>
                </div>
            </div>


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="add-student-submit" class="btn btn-success">Save</button>

        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="admin/assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(".container .row .col .row .col #select_year_level").change(function () {
            var selectedValue = $(this).val();
            // alert(selectedValue);
            $.ajax({
                url: "action.php",
                type: "POST",
                data: "gradess=" + selectedValue,
                beforeSend: function () {
                    $(".sectionsss").html("<p>Loading...</p>");
                },
                success: function (res) {
                    setTimeout(function () {
                        $(".sectionsss").html(res);
                    }, 1000);
                },
            });
        });
    </script>
</body>

</html>