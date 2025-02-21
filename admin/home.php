<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<hr />

<div class="row">
    <div class="col ">

        <a href="dashboard.php?page=grade7" class="text-decoration-none">
            <div class="card bg-c-blue shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 7</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">

                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '1'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col ">

        <a href="dashboard.php?page=grade8" class="text-decoration-none">
            <div class="card bg-c-green shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 8</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '2'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col ">

        <a href="dashboard.php?page=grade9" class="text-decoration-none">
            <div class="card bg-c-yellow shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 9</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '3'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col ">

        <a href="dashboard.php?page=grade10" class="text-decoration-none">
            <div class="card bg-c-pink shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 10</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '4'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col ">

        <a href="dashboard.php?page=grade11" class="text-decoration-none">
            <div class="card bg-c-violet shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 11</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '5'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col ">

        <a href="dashboard.php?page=grade12" class="text-decoration-none">
            <div class="card bg-c-neon_blue shadow border-0 p-3 text-light">
                <div class="card-icon card-icon-large"><i class="fa-solid fa-user-plus"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">GRADE 12</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                        <?php
                        $query = $conn->query("SELECT * FROM `tbl_student_info`WHERE year_level = '6'");
                        $count = $query->num_rows;
                        if ($query) {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                <?php echo $count ?>
                            </h2>
                        <?php
                        } else {
                        ?>
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <script src="assets/Charts/Chart.js"></script>
        <div class="card p-3 border-0 shadow">
            <canvas id="pie" style="width:100%;max-width:100%;height:300px;"></canvas>
        </div>
    </div>
    <div class="col">
        <div class="card p-3 border-0 shadow">
            <h5 class="text-center mb-5">Students Activity</h5>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>STUDENT NAME</th>
                        <th>ACTIVITY</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = $conn->query("SELECT * FROM `tbl_history_log` INNER JOIN tbl_student_info ON tbl_history_log.student_id = tbl_student_info.student_id  ORDER BY log_id DESC");
                    foreach ($query as $row) {
                    ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row['firstname'] . " " . $row['lastname']; ?>
                            </td>
                            <td>
                                <?= $row['transaction'] ?>
                            </td>
                            <td>
                                <?= $row['date_added'] ?>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>