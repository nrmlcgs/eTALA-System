<nav aria-label="breadcrumb" style="display:flex;justify-content:space-between;padding:15px 10px 0px 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Subject List</li>
    </ol>
    <div class="add-student">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-subject-modal"><i
                class="fa fa-plus"></i>
            Add Subject</button>
    </div>
</nav>
<hr />
<table class="table table-bordered table-hover" id="table">
    <thead>
        <tr style="font-size:14px;">
            <th>Subject</th>
            <th>Description</th>
            <th style="width:20%;">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = $conn->query("SELECT * FROM `tbl_subject` where order_id = 0");
        foreach ($query as $row) {
            ?>
            <tr>
                <td>
                    <?= $row['subject_name'] ?>
                </td>
                <td>
                    <?= $row['description'] ?>
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary view-subject-btn" value="<?= $row['subject_id'] ?>"><i
                            class="fa fa-edit"></i>
                        Edit</button>

                    <a class="btn btn-sm btn-danger delete-subject-btn" onclick="return confirm('Are you want to delete?')"
                        href="action.php?delete-subject=<?= $row['subject_id'] ?>"><i class="fa fa-trash"></i>
                        Delete</a>
                </td>
            </tr>
            <?php
        }

        ?>


    </tbody>
</table>