<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Academic Records</li>
    </ol>
    <ol class="breadcrumb">
        <!-- <a type="button" id="sf-btn" class="btn btn-primary"><i class="fa-regular fa-file"></i> SF-10</a> -->
    </ol>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table">
    <thead>
        <tr style="font-size:14px;">
            <th>LRN No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Curriculum</th>
            <th style="width:auto;">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_student_info`");
        foreach ($query as $row) {
        ?>
            <tr>
                <td>
                    <?= $row['lrn_no'] ?>
                </td>
                <td>
                    <?= $row['lastname'] . " " . $row['firstname'] . " " . $row['middlename'] ?>
                </td>
                <td>
                    <?= $row['gender'] ?>
                </td>
                <td>
                    <?= $row['program'] ?>
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary view-record-btn" style="" href="dashboard.php?page=records&student_id=<?= $row['student_id'] ?>"><i class="fa fa-eye"></i>
                        View</a>
                    <button type="button" id="sf-btn" value="<?= $row['lrn_no'] ?>" class="btn btn-sm btn-info"><i class="fa fa-file"></i> SF-10</button>
                </td>
            </tr>
        <?php
        }

        ?>


    </tbody>
</table>