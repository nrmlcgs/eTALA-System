<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';
include 'include/auth.php';
//announcement auto-delete
include 'admin/include/auto_delete.php';




?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="admin/assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/assets/fontawesome/css/all.min.css">
    
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/logo_ori.png">
    <title>Student Portal</title>
    <style>
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

        }

        .sidebar .nav .nav-item .nav-link {
            color: #fff;
            font-size: 16px;
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
    <link rel="stylesheet" href="admin/assets/style1.0.css">
</head>

<body>

    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']); // unset the session message after displaying it
    }
    ?>



    <!-- Edit Students Modal -->
    <div class="modal fade" id="edit-student-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="action.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Manage Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>LRN:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="hidden" name="student_id" id="student_id" class="form-control">
                                        <input required type="text" name="lrn_no" id="lrn_no" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Firstname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="firstname" id="firstname" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Middlename:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="middlename" id="middlename" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Lastname:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="text" name="lastname" id="lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Gender:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="gender" id="gender" class="form-control form-select">
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
                                        <textarea class="form-control" name="birth_place" id="birth_place" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Religion:</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <select name="religion" id="religion" class="form-control form-select">
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
                                        <input required type="number" name="contact_no" id="contact_no" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Age:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="number" name="age" id="age" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Date of Birth:</b></p>
                                    </div>

                                    <div class="col">
                                        <input required type="date" name="date_of_birth" id="date_of_birth" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Address:</b></p>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Year Level:</b></p>
                                    </div>

                                    <div class="col">
                                        <select disabled id="select_year_level" name="year_level" class="form-control">
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

                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Section:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="text" name="section" id="section" class="form-control" disabled>
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
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Email:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="email" name="email" id="email" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-end"><b>Password:</b></p>
                                    </div>

                                    <div class="col">
                                        <input type="hidden" name="old_password" id="old_password" class="form-control">
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
                                        <select name="program" id="program" class="form-control" disabled>
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
                                        <input type="text" name="sy" id="fetch_sy" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update-student-submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal FOR SF10 by kent-->
    <div class="modal fade" id="sf-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="#" method="post" id="generate-sf">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Generate SF-10</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="input" placeholder="Find LRN #" name="lrn_list" class="form-control" value="<?php
                                                                                                                            $lrn = $_SESSION['lrn_no'];
                                                                                                                            echo $lrn; ?>" disabled />
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="sf10" name="sf_type" id="sf_type">
                                    <option disabled selected hidden>Select SF 10</option>
                                    <option value="1">SF 10 - SHS </option>
                                    <option value="2">SF 10 - JHS </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="sf-document-submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Document Modal -->
    <!-- <div class="modal fade" id="doc_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="view-doc-modal">
                    <div class="modal-header">
                        <h5 class="modal-title">Available Document</h5>
                    </div>
                    <div class="d-flex">
                        <div class="input-group-prepend p-2">
                            <span class="input-group-text" id="dtext">Document:</span>
                        </div>
                        <div class="d-flex p-2 w-50">
                            <select class="form-select" name="get_doc" id="get_doc">
                                <option value="Diploma">Diploma</option>
                                <option value="SF 10-JHS">SF 10-JHS</option>
                                <option value="SF 10-SHS">SF 10-SHS</option>
                                <option value="Good Moral">Good Moral</option>
                                <option value="Report Card">Report Card</option>
                                <option value="Birth Certificate">Birth Certificate</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="get_document" id="get_document" class="btn btn-primary">Download</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Upload docs Modal by kent-->
    <div class="modal fade" id="doc_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="action.php" method="post" enctype="multipart/form-data" id="form_docs">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload Document</h5>
                        <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col p-2" style="font-size:12px;">
                                <p class="text"><b>Types of Document:</b></p>
                            </div>
                            <div class="container" style="width:75%;">
                                <select class="form-select" aria-label="Diploma" name="doc_type" id="doc_type">
                                    <option selected>Diploma</option>
                                    <option value="SF 10-JHS">SF 10-JHS</option>
                                    <option value="SF 10-JHS">SF 10-SHS</option>
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
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="student-upload" class="btn btn-sm btn-success"><i class="fa-solid fa-upload"></i> Upload</button>
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
            include $page . '.php';
            ?>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="admin/assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin/assets/jquery/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="admin/assets/salert/sweetalert.min.js"></script>

    <script>
        $(document).on('click', '#manage', function() {
            var val = $("#select_year_level").val();
            // alert(val);
            if (val > 4) {
                // ts_view
                $('#ts_view').show();
            } else {
                $('#ts_view').hide();
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.edit-student-btn').on('click', function() {
                $('#edit-student-modal').modal('show');

                $id = $(this).val();
                $.ajax({
                    url: "action.php?view-student=" + $id,
                    type: "GET",
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 200) {
                            $("#student_id").val(res.data.student_id);
                            $("#lrn_no").val(res.data.lrn_no);
                            $("#firstname").val(res.data.firstname);
                            $("#middlename").val(res.data.middlename);
                            $("#lastname").val(res.data.lastname);
                            $("#gender").val(res.data.gender);
                            $("#birth_place").val(res.data.birth_place);
                            $("#religion").val(res.data.religion);
                            $("#contact_no").val(res.data.contact_no);
                            $("#age").val(res.data.age);
                            $("#date_of_birth").val(res.data.date_of_birth);
                            $("#address").val(res.data.address);
                            $("#select_year_level").val(res.data.year_level);
                            $("#section").val(res.data.section);
                            // alert(res.data.section);
                            $("#email").val(res.data.email);
                            $("#old_password").val(res.data.password);
                            $("#program").val(res.data.program);
                            $("#fetch_sy").val(res.data.school_year);

                        }
                    },
                });
            })

            $('#select_grade_level').change(function() {
                var id = $(this).val();


                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: "select_grade=" + id,
                    beforeSend: function() {
                        $(".container").html("<h1>Loading...</h1>");
                    },
                    success: function(res) {
                        setTimeout(function() {
                            $(".container").html(res);
                        }, 1000);
                    },
                });
            });

            $('#document').on('click', function() {
                $('#doc_modal').modal('show');
            });

            $('#get_document').on('click', function() {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "admin/uploads/get_doc.php",
                    data: $("#view-doc-modal").serialize(),
                    success: function(data) {
                        // alert(data);
                        // Construct the file URL
                        var fileUrl = 'admin/uploads/' + data; // Update with the correct file path

                        // Create a temporary anchor element
                        var downloadLink = document.createElement('a');
                        downloadLink.href = fileUrl; // URL to the file
                        downloadLink.download = data; // File name
                        downloadLink.click(); // Trigger the download
                    }
                });
            });
            // 
            $(document).on('click', '#sf-btn', function() {
                $("#sf-modal").modal("show");
            });

            $(document).on('click', '#logout_btn', function() {
                // alert(1)
            });
            //sf_type
            $(document).ready(function() {
                $('#sf_type').change(function() {
                    var selected = $(this).val();
                    if (selected == 1) {
                        $('#generate-sf').attr('action', 'admin/PhpOffice/writer1.php');
                    } else {
                        $('#generate-sf').attr('action', 'admin/PhpOffice/writer.php');
                    }
                });
            });
        });
    </script>

</body>

</html>
<?php include('admin/function/alert.php'); ?>