<?php
$id = $_SESSION['student_id'];
$result = $conn->query("SELECT * FROM tbl_student_info WHERE student_id = '$id' ");


if ($row = $result->fetch_array()) {
    $lrn_no = $row['lrn_no'];
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $religion = $row['religion'];
    $contact_no = $row['contact_no'];
    $age = $row['age'];
    $year_level = $row['year_level'];
    $section = $row['section'];
    $status = $row['status'];
    $program = $row['program'];
    $birth_place = $row['birth_place'];
    $address = $row['address'];
}




?>

<div class="container" style="background:#ffffff00;">
    <div class="row justify-content-between p-2">
        <div class="col-auto mt-2">
            <h1>Hello! <b><?php echo $firstname; ?></b></h1>
        </div>
        <div class="col-auto">
            <a type="button" class="btn btn-primary" id="document" name="document"> <i class="fa-regular fa-file"></i> Requirement</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card p-2">
                <div class="row">
                    <div class="col">
                        <p class=""><b>LRN:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $lrn_no ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class=""><b>Name:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $firstname . " " . $middlename . " " . $lastname ?>
                        </h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class=""><b>Gender:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $gender ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class=""><b>Birth Place:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $birth_place ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class=""><b>Religion:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $religion ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class=""><b>Contact No:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $contact_no ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Age:</b></p>
                    </div>

                    <div class="col">
                        <h6>
                            <?php echo $age ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card p-2">
                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Date of Birth:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php echo $date_of_birth ?>
                        </h6>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Address:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php echo $address ?>
                        </h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Year Level:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php
                            if ($year_level == 1) {
                                echo "Grade 7";
                            } else if ($year_level == 2) {
                                echo "Grade 8";
                            } else if ($year_level == 3) {
                                echo "Grade 9";
                            } else if ($year_level == 4) {
                                echo "Grade 10";
                            } else if ($year_level == 5) {
                                echo "Grade 11";
                            } else {
                                echo "Grade 12";
                            }


                            ?>
                        </h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Section:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php echo $section ?>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Status:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php echo $status ?>
                        </h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="p-1"><b>Curriculum:</b></p>
                    </div>

                    <div class="col">
                        <h6 class="p-1">
                            <?php echo $program ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>