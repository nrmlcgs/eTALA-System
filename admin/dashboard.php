<?php
session_start();
include 'include/db_connection.php';
include 'include/auth.php';
//announcement auto-delete
include 'include/auto_delete.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/style1.1.css">
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="images/logo_ori.png">
    <title>Student Management Information System</title>
    <style>
        /* Style for Forms */
        span {
            text-align: justify;
        }

        #diploma_header p {
            line-height: 1px;
            font-family: 'Times New Roman';
            text-align: center;
        }

        #diploma_content {
            /* margin: 100px; */
        }

        #english {
            /* margin-left: 100px; */
            font-family: 'Times New Roman';
            margin-bottom: 2px;
            text-align: center;
        }

        #tagalog {
            margin: 0;
            padding: 0;
            text-align: center;
            /* margin-left: 100px; */
            line-height: 1rem;
            /* text-align: justify; */
            font-size: 20pt;
            font-family: 'Brush Script MT';
        }

        /* Style for Forms */
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
        @import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        ::-webkit-scrollbar {
            background: #fff;
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #720000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #f7f7f7;
        }

        .navbar {
            background: #fff;
            font-family: 'Inter', sans-serif;
        }

        .navbar .container-fluid .navbar-brand {
            font-family: 'Abril Fatface', serif;
            font-size: 23px;
            font-weight: bold;
            color: #720000;
        }

        .navbar .btn-group .btn {
            background: none;
            outline: none;
            border: none;
            box-shadow: none;
        }

        .sidebar {
            font-family: 'Inter', sans-serif;
            background: #810000;
            height: 100%;
            width: 20%;
            position: fixed;
            overflow: auto;
        }

        .sidebar .nav .nav-item .nav-link {
            color: #fff;
            font-size: 15px;

        }

        .sidebar .nav .nav-item .nav-link:hover {
            color: #000;
            background: #fff;
        }

        .sidebar .nav .nav-item .collapse .nav-item .nav-link:hover {
            color: #000;
            background: #ebebeb;
        }

        .sidebar .nav .nav-item .nav-link.active {
            color: #000;
            background: #fff;
        }

        /* .sidebar .nav .nav-item .nav-link:focus {
            color: #009579;
        } */

        .content {
            width: 80%;
            padding: 8px;
            font-family: 'Inter', sans-serif;
            margin-left: 20%;
        }

        .content .box {
            padding: 5px;
            background: #fff;
            height: 100%;
            border-radius: 5px;
        }

        .content .box .card {
            margin: 10px 0px;
        }



        /*======== Card Background Color ========*/
        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }

        .bg-c-violet {
            background: linear-gradient(45deg, #d753ff, #be86ff);

        }

        .bg-c-neon_blue {
            background: linear-gradient(45deg, #53ceff, #86e3ff);

        }

        @media print {
            body {
                background: #fff;
            }

            .navbar,
            .sidebar,
            .navbar .container-fluid .navbar-brand,
            .navbar .btn-group .btn {
                display: none;
            }

            .content {
                width: 100%;
                margin-left: 0px;
                padding: 0px;
            }

            .content .box {
                padding: 0px;
                background: #fff;
                height: 100vh;
                border-radius: 0px;
                box-shadow: none;
            }

            .content .box .print {
                display: none;
            }
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
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Student</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <input required type="text" name="lrn_no" class="form-control " placeholder="Enter LRN">
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
                                        <select name="year_level" class="form-control form-select">
                                            <option disabled selected hidden>Select level</option>
                                            <option>Grade 7</option>
                                            <option>Grade 8</option>
                                            <option>Grade 9</option>
                                            <option>Grade 10</option>
                                            <option>Grade 11</option>
                                            <option>Grade 12</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Section:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="section" class="form-control form-select">
                                            <option disabled selected hidden>Select Section</option>
                                            <?php
                                            $result = $conn->query("SELECT * FROM tbl_section");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option>
                                                    <?= $row['section_name']; ?>
                                                </option>
                                            <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Track/Strand:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="track_strand" class="form-control form-select">
                                            <option disabled selected hidden>Select Status</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
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
                                            <option disabled selected hidden>Select </option>
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-student-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Students Modal -->
    <div class="modal fade" id="view-student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="action.php" method="post" id="view-student-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Student</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <input type="hidden" name="update_student_id" id="student_id" class="form-control">
                                        <input required type="text" name="update_lrn_no" id="lrn_no" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Firstname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="update_firstname" id="firstname" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Middlename:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="update_middlename" id="middlename" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Lastname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="update_lastname" id="lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Gender:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="update_gender" id="gender" class="form-control form-select">
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
                                        <textarea class="form-control" name="update_birth_place" id="birth_place" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Religion:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="update_religion" id="religion" class="form-control form-select">
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
                                        <input required type="number" name="update_contact_no" id="contact_no" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Age:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="number" name="update_age" id="age" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Date of Birth:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="date" name="update_date_of_birth" id="date_of_birth" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Address:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="update_address" id="address" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Year Level:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="update_year_level" id="update_year_level" class="form-control form-select">
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

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Section:</b></p>
                                    </div>

                                    <div class="col fetch_section">
                                        <input type="text" readonly name="update_section" id="section" class="form-control">

                                    </div>
                                </div>
                                <div class="row" id="ts_view" style="display:none;">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Track/Strand:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="update_ts" id="fetch_ts" class="form-control form-select">
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
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Status:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="update_status" id="status" class="form-control form-select">
                                            <option disabled selected hidden>Select Status</option>
                                            <option>Passed</option>
                                            <option>Retained</option>
                                            <option>Dropped</option>

                                        </select>
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
                                        <select name="update_program" id="program" class="form-control form-select">
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
                                        <select name="update_sy" id="fetch_sy" class="form-control form-select">
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
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-sm btn-danger delete-student-btn" name="delete_row" id="delete_row" class="delete_row"><i class="fa fa-trash"></i>
                            Delete</a>
                        <button type="submit" name="update-student-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Corriculum Modal -->
    <div class="modal fade" id="add-corriculum-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new Curriculum</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                        <div class="form-group row">
                            <label for="corriculum" class="col-sm-2 col-form-label p-2">Curriculum</label>
                            <div class="col-sm-10">
                                <input required type="text" name="corriculum" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="corriculum" class="col-sm-2 col-form-label p-2">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-corrriculum-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Upload docs Modal by kent-->
    <div class="modal fade" id="upload-docs-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post" enctype="multipart/form-data" id="form_docs">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Document</h5>
                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="row mb-5">
                            <div class="col"> -->
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>LRN No:</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <input type="text" name="ulrn_no" id="ulrn_no" class="form-control" disabled>
                                <input type="hidden" name="xlrn" id="xlrn" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2" style="font-size:12px;">
                                <p class="text"><b>Types of Document:</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <select class="form-select" aria-label="Diploma" name="doc_type" id="doc_type">
                                    <option selected>Diploma</option>
                                    <option value="SF 10-JHS">SF 10-JHS</option>
                                    <option value="SF 10-SHS">SF 10-SHS</option>
                                    <option value="Good Moral">Good Moral</option>
                                    <option value="Report Card">Report Card</option>
                                    <option value="Birth Certificate">Birth Certificate</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Select File</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <div class="form-group">
                                    <input type="file" class="form-control-file" accept=".xlsx, .pdf, .word" name="doc" id="doc" required>
                                </div>
                            </div>
                            <!-- </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" id="print_doc" class="btn btn-sm btn-primary"><i class="fa-solid fa-print"></i> Print</a>
                        <a type="button" id="download_doc" class="btn btn-sm btn-primary"><i class="fa-solid fa-download"></i> Download</a>
                        <button type="submit" name="upload-document-submit" class="btn btn-sm btn-success"><i class="fa-solid fa-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal FOR SF10 by kent-->
    <div class="modal fade" id="sf-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="PhpOffice/writer1.php" method="post" id="generate-sf">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Generate SF-10</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="input" list="lrn_list" id="lrn_x" placeholder="Find LRN #" name="lrn_list" class="form-control" required />
                                <datalist id="lrn_list">
                                    <option disabled selected hidden>Select LRN Number</option>
                                    <?php
                                    $result = $conn->query("SELECT * FROM tbl_student_info");
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <option>
                                            <?= $row['lrn_no']; ?>
                                        </option>
                                    <?php
                                    }

                                    ?>
                                </datalist>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="sf10" name="sf_type" id="sf_type">
                                    <!-- <option disabled selected hidden>Select SF 10</option> -->
                                    <option value="1">SF 10 - JHS </option>
                                    <option value="2">SF 10 - SHS </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="sf-document-submit" class="btn btn-primary"><i class="fa-solid fa-arrows-spin"></i> Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View  Modal -->
    <div class="modal fade" id="view-corriculum-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Curriculum</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="corriculum" class="col-sm-2 col-form-label p-2">Curriculum</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="update_program_id" id="program_id" class="form-control">
                                <input required type="text" name="update_corriculum" id="corriculum" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label p-2">Description</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="update_program_id" id="program_id" class="form-control">
                                <textarea class="form-control" name="update_description" id="description" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-corrriculum-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="add-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Firstname:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="text" name="add_user_firstname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Lastname:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="text" name="add_user_lastname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Username:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="text" name="add_user_username" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Email:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="email" name="add_user_email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <p class=""><b>Password:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input type="password" name="add_user_password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-1">
                                <p class="text"><b>Confirm Password:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input type="password" name="add_user_c_password" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-user-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Manage Account Modal -->
    <div class="modal fade" id="update-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Manage User</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="row"> -->
                        <!-- <div class="col"> -->
                        <div class="form-group row">
                            <input type="hidden" name="user_id" id="user_id" class="form-control">
                            <label for="user_firstname" class="col-sm-2 col-form-label">Firstname</label>
                            <div class="col-sm-10">
                                <input required type="text" name="user_firstname" id="user_firstname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="user_lastname" class="col-sm-2 col-form-label">Lastname</label>
                            <div class="col-sm-10">
                                <input required type="text" name="user_lastname" id="user_lastname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input required type="text" name="user_username" id="username" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input required type="email" name="user_email" id="email" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="old_user_password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="old_user_password" id="old_user_password" class="form-control">
                                <input type="password" name="user_password" class="form-control">
                            </div>
                        </div>

                        <!-- </div> -->
                        <!-- </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-user-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Section Modal -->
    <div class="modal fade" id="add-section-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new section</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Section:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="section" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Year Level:</b></p>
                                    </div>

                                    <div class="col">
                                        <select name="year_level" class="form-control form-select">
                                            <option disabled selected hidden>Select Section</option>
                                            <?php

                                            $result = $conn->query("SELECT * FROM tbl_year_level");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option value="<?php echo $row['year_level_id']; ?>">
                                                    <?php echo $row['year_level']; ?>
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
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-section-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Section Modal -->
    <div class="modal fade" id="view-section-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Section</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col p-2">
                                    <p class="text"><b>Section:</b></p>
                                </div>

                                <div class="container" style="width:80%;">
                                    <input type="hidden" name="update_section_id" id="section_id" class="form-control">
                                    <input required type="text" name="update_section_name" id="section_name" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Year Level:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="update_year_level" id="update_year_level"
                                            class="form-control">
                                        <select name="update_year_level" id="update_year_level"
                                            class="form-control form-select">
                                            <option disabled selected hidden>Select Section</option>
                                            <?php

                                            $result = $conn->query("SELECT * FROM tbl_year_level");
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <option value="<?php echo $row['year_level']; ?>">
                                                    <?php echo $row['year_level']; ?>
                                                </option>
                                                <?php
                                            }



                                                ?>
                                        </select>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-section-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <!-- Add Subject Modal -->
    <div class="modal fade" id="add-subject-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new subject</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Subject:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Description:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="description" rows="2"></textarea>
                                        <a style="font-size:12px;">Indicate in description if Grade 11-12 subject is <b>Core, Applied or Specialized</b>.</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-subject-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Track/Strand Modal -->
    <div class="modal fade" id="add-ts-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new Track/Strand</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                        <div class="row">
                            <!-- <div class="row"> -->
                            <div class="col p-2">
                                <p class="text"><b>Track:</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <input required type="text" name="track" class="form-control">
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="row">
                            <!-- <div class="row"> -->
                            <div class="col p-2">
                                <p class="text"><b>Strand:</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <input required type="text" name="strand" class="form-control">
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-ts-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Subject Modal -->
    <div class="modal fade" id="view-subject-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Subject</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Subject:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="hidden" name="update_subject_id" id="subject_id" class="form-control">
                                        <input required type="text" name="update_subject_name" id="subject_name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-end"><b>Description:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="update_subject_description" id="subject_description" rows="2"></textarea>
                                        <a style="font-size:12px;">Indicate in description if Grade 11-12 subject is <b>Core, Applied or Specialized</b>.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-subject-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- View ts Modal -->
    <div class="modal fade" id="view-ts-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Subject</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                        <!-- <div class="row">
                            <div class="col"> -->
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Track:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input type="hidden" name="update_ts_id" id="update_ts_id" class="form-control">
                                <input required type="text" name="update_t_name" id="update_t_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Strand:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="text" name="update_s_name" id="update_s_name" class="form-control">
                            </div>
                        </div>
                        <!-- </div>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-ts-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- ================================ Add Announcement Modal ================================ -->
    <div class="modal fade" id="add-announcement-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Announcement!</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>Title:</b></p>
                            </div>

                            <div class="container" style="width:80%; font-size:14px;">
                                <input required type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2" style="font-size:10px;">
                                <p class="text"><b>Date/Time from:</b></p>
                            </div>

                            <div class="container" style="width:80%;">
                                <input type="datetime-local" name="date_and_time_from" id="announcement_date_and_time_from" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2" style="font-size:10px;">
                                <p class="text"><b>Date/Time to:</b></p>
                            </div>

                            <div class="container" style="width:80%;">
                                <input type="datetime-local" name="date_and_time_to" id="announcement_date_and_time_to" class="form-control">
                            </div>
                            <div class="col" style="margin-right:auto;">
                                <input type="checkbox" id="allDayCheckbox">
                                <label for="allDayCheckbox">All Day</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text" tyle="font-size:14px;"><b>Description:</b></p>
                            </div>

                            <div class="container" style="width:100%;">
                                <textarea class="form-control" name="announcement_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="save_announcement" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ================================ Edit Announcement Modal ================================ -->

    <div class="modal fade" id="edit-announcement-modal" tabindex="-1" role="dialog" aria-labelledby="mdftitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Announcement!</h5>
                        <i class="fa fa-close close" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="modal-body m-2" id="annoucement_body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="edit_announcement" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ==================================================================================================================== -->
    <!-- Add S.Y. Modal -->
    <div class="modal fade" id="add-sy-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add School Year</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                        <div class="row">
                            <div class="col p-2">
                                <p class="text"><b>School Year:</b></p>
                            </div>

                            <div class="container" style="width:75%;">
                                <input required type="text" name="sy" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add-sy-submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- View S.Y. Modal -->
    <div class="modal fade" id="edit-sy-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit School Year</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="sy_body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-sy-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Diploma tools Modal -->
    <div class="modal fade" id="manage_diploma_id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-2">
                            <div class="col">
                                <label for="araw_id" class="col-sm-2 col-form-label">Araw</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="araw_id" id="araw_id" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <label for="buwan" class="col-sm-2 col-form-label">Buwan</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="buwan_id" id="buwan_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <label for="day_id" class="col-sm-2 col-form-label">Day</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="day_id" id="day_id" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <label for="month_id" class="col-sm-2 col-form-label">Month</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="month_id" id="month_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center p-2" style="font-size:16px;">Signatory</h4>
                        <div class="form-group row mt-2">
                            <div class="col">
                                <label for="head_name" class="form-label">Punong-Guro</label>
                            </div>
                            <div class="col-8">
                                <input required type="text" name="head_name" id="head_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col">
                                <label for="principal_name" class="form-label">Principal</label>
                            </div>
                            <div class="col-8">
                                <input required type="text" name="principal_name" id="principal_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col">
                                <label for="school_manager" class="label">Tagapamahalan ng Paaralan</label>
                            </div>
                            <div class="col-8">
                                <input required type="text" name="school_manager" id="school_manager" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="manage-diploma-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'include/nav_sidebar.php'; ?>
    <main class="content">
        <div class="box shadow-sm">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : "home";

            $file_path = $page . '.php';

            if (file_exists($file_path)) {
                include $file_path;
            } else {
                echo "Error: File '$file_path' not found.";
            }
            ?>
        </div>

    </main>
    <script src="JS/events.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/jquery/jquery-3.7.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script src="JS/filter_section.js"></script>
    <script src="JS/fetch_modal.js"></script>
    <script>
        $(document).ready(function() {
            const $startDateTimeInput = $('#announcement_date_and_time_from');
            const $endDateTimeInput = $('#announcement_date_and_time_to');
            const $allDayCheckbox = $('#allDayCheckbox');
            // const $allDayCheckbox_up = $('#allDayCheckbox_update');

            $allDayCheckbox.on('change', function() {
                if ($(this).is(':checked')) {
                    // If checkbox is checked, set time to start of day for startDateTime
                    // and end of day for endDateTime
                    const startDate = new Date($startDateTimeInput.val());
                    startDate.setUTCHours(0, 0, 0, 0);
                    $startDateTimeInput.val(startDate.toISOString().slice(0, -8));

                    const endDate = new Date($endDateTimeInput.val());
                    endDate.setUTCHours(23, 59, 59, 999);
                    $endDateTimeInput.val(endDate.toISOString().slice(0, -8));

                    // Disable input fields
                    $startDateTimeInput.prop('readonly', true);
                    $endDateTimeInput.prop('readonly', true);
                } else {
                    // Reset
                    $startDateTimeInput.val('');
                    $endDateTimeInput.val('');

                    $startDateTimeInput.prop('readonly', false);
                    $endDateTimeInput.prop('readonly', false);
                }
            });
        });
    </script>

    <script>
        new DataTable('.student_table', {
            layout: {
                topStart: {
                    buttons: ['print']
                }
            }
        });

        $(document).ready(function() {
            let path = window.location.href;
            let pageName = path.split("/").pop();
            $('.nav-link').each(function() {
                if (pageName === $(this).attr('href')) {
                    $(this).addClass('active');
                }
            });



            new DataTable('#table');



            var xValues = ['Male', 'Female'];
            var yValues = [
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tbl_student_info WHERE gender = 'Male'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>,
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tbl_student_info WHERE gender = 'Female'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>

            ];
            var barColors = ["#8baaff", "#ff8bcb"];

            new Chart("pie", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: "Monitoring Charts"
                    }
                }
            });
        });

        $("#update_year_level").change(function() {
            var u_yl = $(this).val();
            // alert(u_yl);
            $.ajax({
                type: "POST",
                cache: false,
                dataType: "text",
                data: {
                    u_yl: u_yl
                },
                url: "function/action.php",
                beforeSend: function() {
                    $(".fetch_section").html("<p>Loading...</p>");
                },
                success: function(response) {
                    // alert(response);
                    setTimeout(function() {
                        $(".fetch_section").html(response.replace('{"error":"Not set"}', ''));
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    // alert("Status: " + status);
                    // alert("Error: " + error);
                }
            });
        });
        //TOGGLE PRINT
        $("#doc_type").change(function() {
            var doc_type = $("#doc_type").val();

            if (doc_type === 'Diploma') {
                $("#print_doc").removeClass('d-none');
            } else if (doc_type === 'Good Moral') {
                $("#print_doc").removeClass('d-none');
            } else if (doc_type === 'SF 10-SHS') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        if (data === '1') {
                            $("#print_doc").addClass('d-none');
                        } else {
                            var extension = data.split('.').pop();
                            if (extension === 'pdf') {
                                $("#print_doc").removeClass('d-none');
                            } else {
                                $("#print_doc").addClass('d-none');
                            }
                        }

                    }
                });

            } else if (doc_type === 'SF 10-JHS') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        if (data === '1') {
                            $("#print_doc").addClass('d-none');
                        } else {
                            var extension = data.split('.').pop();
                            if (extension === 'pdf') {
                                $("#print_doc").removeClass('d-none');
                            } else {
                                $("#print_doc").addClass('d-none');
                            }
                        }

                    }
                });
            } else if (doc_type === 'Report Card') {
                $("#print_doc").removeClass('d-none');
            } else if (doc_type === 'Birth Certificate') {
                $("#print_doc").removeClass('d-none');
            } else {
                $("#print_doc").removeClass('d-none');
            }
        });

        //Manage diploma
        $(document).on('click', '#manage_diploma', function() {
            $("#manage_diploma_id").modal("show");
            $id = "1";

            $.ajax({
                url: "action.php?view-details=" + $id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if (res.status == 200) {
                        $("#araw_id").val(res.data.araw);
                        $("#buwan_id").val(res.data.buwan);
                        $("#day_id").val(res.data.day);
                        $("#month_id").val(res.data.month);
                        //signatory
                        $("#head_name").val(res.data.head_name);
                        $("#principal_name").val(res.data.principal_name);
                        $("#school_manager").val(res.data.school_manager);
                    }
                },
            });

        });

        //PRINT DOCUMENT
        $(document).on('click', '#print_doc', function() {
            var diploma_lrn = $("#xlrn").val();
            var doc_type = $("#doc_type").val();

            if (doc_type === 'Diploma') {
                var diploma_url = "diploma.php?diploma_lrn=" + encodeURIComponent(diploma_lrn);
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: diploma_url,
                    success: function(data) {

                        window.open(diploma_url, 'newwindow', 'width=1000, height=1000');
                        return false;
                    }
                });

            } else if (doc_type === 'Good Moral') {
                var gm_url = "good-moral.php?gm_lrn=" + encodeURIComponent(diploma_lrn);
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: gm_url,
                    success: function(data) {

                        window.open(gm_url, 'newwindow', 'width=1000, height=1000');
                        return false;
                    }
                });
            } else if (doc_type === 'SF 10-JHS') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        var url = "uploads/" + data;
                        window.open(url, 'newwindow', 'width=1000, height=1000');
                        return false;
                    }
                });
            } else if (doc_type === 'SF 10-SHS') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        var url = "uploads/" + data;
                        window.open(url, 'newwindow', 'width=1000, height=1000');
                        return false;
                    }
                });

            } else if (doc_type === 'Report Card') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        if (data === '1') {
                            window.reload();
                        } else {
                            var url = "uploads/" + data;
                            window.open(url, 'newwindow', 'width=1000, height=1000');
                            return false;
                        }
                    }
                });

            } else if (doc_type === 'Birth Certificate') {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "uploads/get.php",
                    data: $("#form_docs").serialize(),
                    success: function(data) {
                        if (data === '1') {
                            window.reload();
                        } else {
                            var url = "uploads/" + data;
                            window.open(url, 'newwindow', 'width=1000, height=1000');
                            return false;
                        }
                    }
                });

            }

        });
        // DL DOCUMENT
        $(document).on('click', '#download_doc', function() {
            $.ajax({
                type: "POST",
                cache: false,
                url: "uploads/get.php",
                data: $("#form_docs").serialize(),
                success: function(data) {
                    if (data === '1') {
                        location.reload();
                    } else {
                        // Make an AJAX request to fetch the file
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'uploads/' + data, true);
                        xhr.responseType = 'blob'; // Set response type to blob

                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Create a temporary URL to the blob
                                var blobURL = URL.createObjectURL(xhr.response);

                                // Create a link element
                                var link = document.createElement('a');
                                link.href = blobURL;
                                link.download = data;
                                // Trigger a click event on the link to start download
                                link.click();

                                // Clean up: Revoke the blob URL
                                URL.revokeObjectURL(blobURL);
                            }
                        };

                        xhr.send();
                        $("#upload-docs-modal").modal("hide");
                    }
                }
            });
        });


        // add shs record
        $(document).on('click', '#shsadd-record', function() {
            var selected_sy = $("#current_sy").val();

            var student_id = $("#student_id1").val();
            var subject = $("#selected_sub").val();
            var semester = $("#sem_select").val();
            var grade1 = $("#sgrade1").val();
            var grade2 = $("#sgrade2").val();
            var avg = $("#sem_avg").val();
            var action = $("#pass_failed").val();
            var section = $("#section1").val();
            var adviser = $("#adviser_name1").val();
            var year_level = $("#year_level1").val();

            // alert(subject);
            $.ajax({
                type: "POST",
                cache: false,
                url: "function/shs.php",
                data: {
                    student_id: student_id,
                    subject: subject,
                    semester: semester,
                    grade1: grade1,
                    grade2: grade2,
                    avg: avg,
                    action: action,
                    section: section,
                    adviser: adviser,
                    year_level: year_level,
                    selected_sy: selected_sy
                },
                success: function(data) {}
            });

        });


        $("#table-ts tbody").on("click", "#view-ts-btn", function() {
            $("#view-ts-modal").modal("show");
            $id = $(this).val();
            $.ajax({
                url: "action.php?view-ts=" + $id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if (res.status == 200) {
                        $("#update_ts_id").val(res.data.id);
                        $("#update_t_name").val(res.data.track);
                        $("#update_s_name").val(res.data.strand);
                    }
                },
            });
        });

        $(document).on('click', '#update_year_level', function() {
            var val = $(this).val();
            if (val > 4) {
                // ts_view
                $('#ts_view').show();
            } else {
                $('#ts_view').hide();
            }
        });

        $(document).on('click', '#sf-btn', function() {
            var id = $(this).val();
            // alert(id);
            $("#sf-modal").modal("show");
            $('#lrn_x').val(id);

        });

        $(document).ready(function() {
            $('#selector_sem').change(function() {
                var selectedTable = $(this).val();
                var selected_sy1 = $("#select_sy").val();
                var id1 = $("#student_idx").val();
                // $('#grade_section').val("No data");
                // alert(selectedTable);
                $.ajax({
                    url: "function/action.php",
                    type: "GET",
                    data: {
                        selected_sy1: selected_sy1,
                        id1: id1,
                        selectedTable: selectedTable
                    },
                    success: function(response) {
                        $('#tableBody1').html(response);
                        // alert(response);
                        // alert(1);
                    },
                    error: function(xhr, status, error) {
                        // alert('Request failed: ' + status + ', ' + error);
                    }
                });

            });
        });


        //sf_type
        $(document).ready(function() {
            $('#sf_type').change(function() {
                var selected = $(this).val();
                if (selected == 1) {
                    $('#generate-sf').attr('action', 'PhpOffice/writer1.php');
                } else {
                    $('#generate-sf').attr('action', 'PhpOffice/writer.php');
                }
            });
        });
        // subject
        $(document).ready(function() {
            $('#select_subject').change(function() {
                var selected_subject = $(this).val();
                var selected_sy = $("#current_sy").val();
                var id = $("#id_std").val();
                // alert(id);
                // alert(selected_sy);
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {
                        selected_subject: selected_subject,
                        selected_sy: selected_sy,
                        id: id
                    },
                    success: function(response) {
                        // Assuming response contains data in JSON format
                        // alert(response.first);
                        $('#grade1').val(response.first);
                        $('#grade2').val(response.sec);
                        $('#grade3').val(response.third);
                        $('#grade4').val(response.fourth);

                        $('#adviser_name').val(response.adviser);
                        $('#final_grades').val(response.final);
                        // alert(response.first);
                        $('#pass_failed').val(response.action);
                    }
                });
            });
        });
        //after sem_select grade 11 and 12 edit/display grades
        $(document).ready(function() {
            $('#sem_select').change(function() {
                var selected_sem = $(this).val();
                var selected_sub = $("#selected_sub").val();
                var selected_sy = $("#current_sy").val();
                var id = $("#id_std").val();

                if (selected_sem == '1') {
                    // var test = "Q3";
                    $('#quater1').text('Q 1');
                    $('#quater2').text('Q 2');
                } else {
                    $('#quater1').text('Q 3');
                    $('#quater2').text('Q 4');
                }
                // alert(id);
                $.ajax({
                    url: "function/action.php",
                    type: "POST",
                    data: {
                        selected_sem: selected_sem,
                        selected_sub: selected_sub,
                        selected_sy: selected_sy,
                        id: id
                    },
                    success: function(response) {
                        // Assuming response contains data in JSON format
                        // alert(response.first);
                        $('#sgrade1').val(response.first);
                        $('#sgrade2').val(response.sec);

                        $('#adviser_name1').val(response.adviser);
                        $('#sem_avg').val(response.final);

                        $('#action_taken').val(response.action);
                        // alert(response.action);
                        // alert(response.first);
                    }
                });
            });
        });


        //current sy

        $(document).ready(function() {
            $('#select_sy').change(function() {
                var selected_sy1 = $("#select_sy").val();
                var id1 = $("#student_idx").val();
                var year_level = $("#year_x").val();
                var grade_section = $('#grade_section').val();
                // var firstEightChars = grade_section.substring(0, 8);
                // alert(firstEightChars);
                // $('#grade_section').val("No data");
                // alert(id);
                $.ajax({
                    url: "function/action.php",
                    type: "GET",
                    data: {
                        selected_sy1: selected_sy1,
                        id1: id1
                    },
                    success: function(response) {
                        // $('#tableBody1').html(response);
                        $('#tableBody1').empty();
                        $('#tableBody').empty();
                        $('#tableBody1').html(response);
                        $('#tableBody').html(response);

                    },
                    error: function(xhr, status, error) {}
                });

                $.ajax({
                    url: "function/toggler.php",
                    type: "POST",
                    data: {
                        selected_sy1: selected_sy1,
                        id1: id1
                    },
                    success: function(response) {
                        // alert(response.section);
                        // $('#grade_section1').hide();

                        if (response.year_level === '1') {
                            $('#grade_section').text('Grade 7' + ' - ' + response.section);
                        } else if (response.year_level === '2') {
                            $('#grade_section').text('Grade 8' + ' - ' + response.section);
                        } else if (response.year_level === '3') {
                            $('#grade_section').text("Grade 9" + " - " + response.section);
                        } else if (response.year_level === '4') {
                            $('#grade_section').text("Grade 10" + " - " + response.section);
                        } else if (response.year_level === '5') {
                            $('#grade_section').text("Grade 11" + " - " + response.section);
                        } else if (response.year_level === '6') {
                            $('#grade_section').text("Grade 12" + " - " + response.section);
                        } else {
                            // $('#grade_section1').text ="dasda";
                            // alert(2);
                            var test = "No data Found";
                            $('#grade_section').text(test);
                        }

                        // alert(response.year_level);
                    }
                });
            });
        });

        $(document).on("click", ".edit-announcement-btn", function() {

            var viewannouncementid = $(this).val();
            // alert(viewannouncementid);
            $.ajax({
                url: "JS/view-modal.php",
                type: "GET",
                data: {
                    viewannouncementid: viewannouncementid
                },
                success: function(response) {
                    $("#annoucement_body").html(response);
                     const $startDateTimeInput = $('#edit_date_and_time_from');
                    const $endDateTimeInput = $('#edit_date_and_time_to');
                    const $allDayCheckbox = $('#allDayCheckbox_update');
                    // const $allDayCheckbox_up = $('#allDayCheckbox_update');

                    $allDayCheckbox.on('change', function() {
                        if ($(this).is(':checked')) {
                            // If checkbox is checked, set time to start of day for startDateTime
                            // and end of day for endDateTime
                            const startDate = new Date($startDateTimeInput.val());
                            startDate.setUTCHours(0, 0, 0, 0);
                            $startDateTimeInput.val(startDate.toISOString().slice(0, -8));

                            const endDate = new Date($endDateTimeInput.val());
                            endDate.setUTCHours(23, 59, 59, 999);
                            $endDateTimeInput.val(endDate.toISOString().slice(0, -8));

                            // Disable input fields
                            $startDateTimeInput.prop('readonly', true);
                            $endDateTimeInput.prop('readonly', true);
                        } else {
                            // Reset
                            $startDateTimeInput.val('');
                            $endDateTimeInput.val('');

                            $startDateTimeInput.prop('readonly', false);
                            $endDateTimeInput.prop('readonly', false);
                        }
                    });
                    $("#edit-announcement-modal").modal("show");
                }
            });
        });

        // add jhs record
        $(document).on('click', '#jhs-add', function() {
            var subjects = ['Filipino', 'English', 'Mathematics', 'Science', 'Araling Panlipunan', 'ESP', 'TLE', 'Music', 'Arts', 'PE', 'Health'];

            var i = 1;

            subjects.forEach(function(subject) {
                var str_id = "sub" + i;
                // alert(str_id + ' ' + subject);
                var selected_sy = $("#current_sy").val();
                var student_id = $("#id_std").val();

                var grade1 = $('#' + str_id + ' #grade1').val();
                var grade2 = $('#' + str_id + ' #grade2').val();
                var grade3 = $('#' + str_id + ' #grade3').val();
                var grade4 = $('#' + str_id + ' #grade4').val();
                var average = $('#' + str_id + ' #final_grades').val();
                var action = $('#' + str_id + ' #pass_failed').val();

                var section = $("#current_section").val();
                var adviser = $("#adviser_name").val();
                var year_level = $("#year_level").val();
                var add_record = "JHS Add record";

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "action.php",
                    data: {
                        student_id: student_id,
                        subject: subject,
                        grade1: grade1,
                        grade2: grade2,
                        grade3: grade3,
                        grade4: grade4,
                        average: average,
                        action: action,
                        section: section,
                        adviser: adviser,
                        year_level: year_level,
                        selected_sy: selected_sy,
                        add_record: add_record
                    },
                    success: function(data) {}
                });
                i++;
            });

        });
    </script>

    <!-- load grade for 7 to 10 -->
    <script>
        load_grades();

        $(document).ready(function() {
            $('#current_sy').change(function() {
                load_grades();
            });
        });

        function load_grades() {
            var subjects = ['Filipino', 'English', 'Mathematics', 'Science', 'Araling Panlipunan', 'ESP', 'TLE', 'Music', 'Arts', 'PE', 'Health'];
            var selected_sy = $("#current_sy").val();
            var id = $("#id_std").val();
            var i = 1;

            subjects.forEach(function(subject) {

                var str_id = "sub" + i;

                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {
                        selected_subject: subject,
                        selected_sy: selected_sy,
                        id: id
                    },
                    success: function(response) {
                        $('#' + str_id + ' #grade1').val(response.first);
                        $('#' + str_id + ' #grade2').val(response.sec);
                        $('#' + str_id + ' #grade3').val(response.third);
                        $('#' + str_id + ' #grade4').val(response.fourth);
                        $('#adviser_name').val(response.adviser);
                        $('#' + str_id + ' #final_grades').val(response.final);
                        $('#' + str_id + ' #pass_failed').val(response.action);
                    }
                });
                i++;
            });
        }
    </script>
    <script type="text/javascript" src="JS/jscript.js"></script>
    <script type="text/javascript" src="assets/salert/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/jquery/jquery-3.7.1.js"></script>

</body>

</html>
<?php include('function/alert.php'); ?>
<?php
// Check if the current page is dashboard.php with page=home
$current_page = basename($_SERVER['PHP_SELF']);
$page_parameter = isset($_GET['page']) ? $_GET['page'] : '';
$is_home_page = $current_page === 'dashboard.php' && $page_parameter === 'home';

// If it's the home page, include the chart code
if ($is_home_page) {
    // Include your database connection code here
    include_once 'include\db_connection.php';

    // Function to fetch gender distribution data for a specific grade
    function getGenderDistribution($gradeLevel)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT gender, COUNT(*) as count FROM `tbl_student_info` WHERE year_level = ? GROUP BY gender");
        $stmt->bind_param("s", $gradeLevel);

        $stmt->execute();
        $result = $stmt->get_result();

        $genderCount = array('Male' => 0, 'Female' => 0);

        while ($row = $result->fetch_assoc()) {
            $genderCount[$row['gender']] = $row['count'];
        }

        // Close the statement
        $stmt->close();

        return $genderCount;
    }

    // Fetch gender distribution data for each grade level
    $genderCountGrade7 = getGenderDistribution("1"); // Grade 7
    $genderCountGrade8 = getGenderDistribution("2"); // Grade 8
    $genderCountGrade9 = getGenderDistribution("3"); // Grade 9
    $genderCountGrade10 = getGenderDistribution("4"); // Grade 10
    $genderCountGrade11 = getGenderDistribution("5"); // Grade 11
    $genderCountGrade12 = getGenderDistribution("6"); // Grade 12
?>
    <?php

    $dataPoints1 = array(
        array("label" => "Grade 7", "y" => $genderCountGrade7['Male']),
        array("label" => "Grade 8", "y" => $genderCountGrade8['Male']),
        array("label" => "Grade 9", "y" => $genderCountGrade9['Male']),
        array("label" => "Grade 10", "y" => $genderCountGrade10['Male']),
        array("label" => "Grade 11", "y" => $genderCountGrade11['Male']),
        array("label" => "Grade 12", "y" => $genderCountGrade12['Male'])

    );
    $dataPoints2 = array(
        array("label" => "Grade 7", "y" => $genderCountGrade7['Female']),
        array("label" => "Grade 8", "y" => $genderCountGrade8['Female']),
        array("label" => "Grade 9", "y" => $genderCountGrade9['Female']),
        array("label" => "Grade 10", "y" => $genderCountGrade10['Female']),
        array("label" => "Grade 11", "y" => $genderCountGrade11['Female']),
        array("label" => "Grade 12", "y" => $genderCountGrade12['Female'])

    );

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <!-- Include Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Include chartjs-plugin-datalabels -->
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script src="assets/chart/canvasjs.min.js"></script>
    </head>

    <body>

        <!-- Your existing dashboard content -->

        <div style="display: flex; flex-wrap: wrap; margin-left: 21%;">

            <div id="chartContainer" style="width: 99%;"></div>

        </div>
        <script>
            window.onload = function() {
                // "#8baaff", "#ff8bcb"
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light1",
                    title: {
                        text: "Students in OMNHS per Grade level"
                    },
                    axisY: {
                        includeZero: true
                    },
                    legend: {
                        cursor: "pointer",
                        verticalAlign: "center",
                        horizontalAlign: "right",
                        itemclick: toggleDataSeries
                    },
                    data: [{
                        type: "column",
                        name: "Male",
                        indexLabel: "{y}",
                        color: "#8baaff",
                        // yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                    }, {
                        type: "column",
                        name: "Female",
                        color: "#ff8bcb",
                        indexLabel: "{y}",
                        // yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();

                function toggleDataSeries(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }

            }
        </script>

    </body>

    </html>
<?php } ?>